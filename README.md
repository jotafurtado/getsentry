# Super Simple Sentry Integration for Laravel 4

Sentry (getsentry.com) and Laravel 4 integration.

This package integrates Sentry and Laravel 4 in a super simple way. Let's see how it works.

## Installation (to be finished)

The package can be installed via [Composer](http://getcomposer.org) by requiring the
`jcf/getsentry` package in your project's `composer.json`.

```json
{
    "require": {
        "jcf/getsentry": "dev-master"
    }
}
```

Then run a composer update
```sh
php composer.phar update
```


After updating composer, add the ServiceProvider to the providers array in app/config/app.php

```php
'Jcf\Getsentry\GeocodeServiceProvider',
```

## Usage

```php
	// To be finished.
	\Log::debug('DebugWithUserData', [
		'user' => [
			'id' => 99,
			'email' => 'joao@3eengenharia.com.br',
			'data' =>[
				'member Since' => '2011-09-07' 
			]
		]
		, 'extra' => ['Ammount' => '142', 'Membership' => 'Activated']]);
	// \Log::debug('DebugWithUser', ['user' => 'joao_carlos']);`
```