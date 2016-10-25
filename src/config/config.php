<?php
return array(

    /*
    |--------------------------------------------------------------------------
    | Raven DSN
    |--------------------------------------------------------------------------
    |
    | Your project's Raven DSN.
    |
    */
	'dsn' => '',

	/*
    |--------------------------------------------------------------------------
    | Environments
    |--------------------------------------------------------------------------
    |
    | Environments that should report logs to Sentry
    |
    */
	'environments' => ['environment'],

	/*
    |--------------------------------------------------------------------------
    | Levels
    |--------------------------------------------------------------------------
    |
    | Log levels that should be reported to Sentry
    |
    */
	'levels' => ['debug', 'info', 'error', 'notice', 'warning', 'error', 'critical', 'alert', 'emergency'],

    /*
    |--------------------------------------------------------------------------
    | Save Event ID
    |--------------------------------------------------------------------------
    |
    | If the event ID is going to be saved in session. To retrieve use \Session::get('sentryEventId');
    |
    */
	'saveEventId' => false,


);
