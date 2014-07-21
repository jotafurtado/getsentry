<?php namespace Jcf\Getsentry;

use Illuminate\Support\ServiceProvider;

class GetsentryServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('jcf/getsentry');

		$dsn = \Config::get('services.raven.dsn') ?: \Config::get('getsentry::dsn');
		$environments = \Config::get('services.raven.environments') ?: \Config::get('getsentry::environments');
		$levels = \Config::get('services.raven.levels') ?: \Config::get('getsentry::levels');

	    if( in_array(\App::environment(), $environments))
	    {
			$raven = new \Raven_Client($dsn);
			\Event::listen('illuminate.log', function($level, $message, $context) use ($raven, $levels){

				if (in_array($level, $levels) ){
		            $context['level'] = $level;

		            if(isset($context['user'])){	            	
			            if (is_array($context['user'])){
			            	$raven->user_context($context['user']);
			            }
			            else{
			            	$raven->set_user_data($context['user']);
			            }
						if ($message instanceof Exception){
				        	$raven->captureException($message, $context);
						}
		            }
			    	else{
			    		$raven->captureMessage($message, null, $context);
			    	}
				}

		    });
		}
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
