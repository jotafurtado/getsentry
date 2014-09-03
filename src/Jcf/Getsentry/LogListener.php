<?php
namespace Jcf\Getsentry;

class LogListener
{

    public static function getConfigs()
    {
        $config['dsn'] = \Config::get('services.raven.dsn') ?: \Config::get('getsentry::dsn');
        $config['environments'] = \Config::get('services.raven.environments') ?: \Config::get('getsentry::environments');
        $config['levels'] = \Config::get('services.raven.levels') ?: \Config::get('getsentry::levels');
        return $config;
    }

    public static function register()
    {

        $config = self::getConfigs();

        if (in_array(\App::environment(), $config['environments'])) {
            $raven = new \Raven_Client($config['dsn']);
            $levels = $config['levels'];
            \Event::listen('illuminate.log', function ($level, $message, $context) use ($raven, $levels) {

                if (in_array($level, $levels)) {
                    $context['level'] = $level;

                    if (isset($context['user'])) {
                        if (is_array($context['user'])) {
                            $raven->user_context($context['user']);
                        } else {
                            $raven->set_user_data($context['user']);
                        }
                        if ($message instanceof Exception) {
                            $raven->captureException($message, $context);
                        }
                    } else {
                        $raven->captureMessage($message, null, $context);
                    }
                }

            });
        }

    }
}
