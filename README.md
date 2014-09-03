# Sentry Integration for Laravel 4

Sentry (getsentry.com) and Laravel 4 integration.
Automatically sent Laravel log messages to Sentry. This package integrates Sentry and Laravel 4 in a super simple way.Let's see how it works.

## Installation

The package can be installed via [Composer](http://getcomposer.org) by requiring the
`jcf/getsentry` package in your project's `composer.json`.

```json
{
    "require": {
        "jcf/getsentry": "1.0.0"
    }
}
```

Then run a composer update
```sh
php composer.phar update
```

After updating composer, add the ServiceProvider to the providers array in app/config/app.php

```php
'Jcf\Getsentry\GetsentryServiceProvider',
```

## Configuration

Run php artisan config:publish jcf/getsentry to publish the configuration file.

```sh
php artisan config:publish jcf/getsentry
```

Edit the configuration file at /app/config/packages/jcf/getsentry. You may also create environment specific configuration files for your package by placing them in app/config/packages/jcf/getsentry/dev by example.

### Configuration Options

Provide Sentry DSN of your project. You can grab this at Settings Tab / API Keys of your project on getsentry.com.

```php
    return array(
    
        'dsn' => 'https://1f68584cfb824d123432534ab452adb778:7e06629189c02355bd2b928881a4c1f1@app.getsentry.com/26241',
```

Then set the environments that should be reported to Sentry.
```php
    'environments' => ['stagging', 'production'],
```

Finally set the log levels that should be reported to Sentry.
```php
    'environments' => ['error', 'emergency', 'notice', 'info', 'debug'],
```

## Usage
Automatically every message that will be logged by Laravel and that fits in rules of configuration will be sent to Sentry.

If you need, you may also trigger Laravel log mannualy and pass extra data to Sentry.

```php
	// Debug with User and Extra Data 
    \Log::debug('Debugging', [
		'user' => [
			'id' => 99,
			'email' => 'joao@3eengenharia.com.br',
			'data' =>[
				'Member Since' => '2011-09-07' 
			]
		]
		, 'extra' => ['Ammount' => '142', 'Membership' => 'Activated']]);
	// Debug with User
    \Log::debug('Debug bug!', ['user' => 'jotafurtado']);

    // Info with User
    \Log::info('User has logged in.', ['user' => jotafurtado]);

    // Simple Error
    \Log::error('Image not saved.');
```
