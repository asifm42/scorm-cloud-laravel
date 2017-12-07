# scorm-cloud-laravel
Provides a ScormCloud API gateway for Laravel applications.

## Requirements

This package can be used in Laravel 5.4 or higher.

## Installation

This library is available [via Composer][1].

Command Line:
```sh
composer require asifm42/scorm-cloud-laravel
```

Composer.json:
```json
{
    "require": {
        "asifm42/scorm-cloud-laravel": "dev-master"
    }
}
```

In Laravel 5.5 the service provider will automatically get registered. In older versions of the framework just add the service provider in config/app.php file:
```php
'providers' => [
    // ...
    AsifM42\ScormCloudGateway\ScormCloudServiceProvider::class,
];
```

### Configuration

You can configure your credentials and by publishing the config file or adding the appropriate environment variables.

##### Environment variables:

 * SCORMCLOUD_URL - This attribute is a relic of a previous Rustici ScormCloud product iteration. It will most likely not need to be overriden. But its there for instances such as when HTTPS cannot be supported, etc. (Default: "https://cloud.scorm.com/EngineWebServices")

 * SCORMCLOUD_APPID - The app id (required)

 * SCORMCLOUD_KEY - The secret key associated with the app id (required)

 * SCORMCLOUD_ORGANIZATION - The name of the organization associated with the app (Default: "scl")

 * SCORMCLOUD_APP_NAME - The app name (Default: "app")

 * SCORMCLOUD_VERSION - The version number (Default: "1.0")

The organization name, the app name, and version number are used to create an origin string. The origin string is useful for debugging on the SCORM Cloud developers’ side but is not required. The default string will be "scl.app.1.0".

You can publish the configuration file with:
```php
php artisan vendor:publish --provider="AsifM42\ScormCloudGateway\ScormCloudServiceProvider" --tag="config"
```

When published, [the `config/scormcloud.php` config file](https://github.com/asifm42/scorm-cloud-laravel/blob/master/config/scormcloud.php) contains:
```php
return [

    /**
     * The scorm engine service url.
     *
     * This attribute is a relic of a previous Rustici ScormCloud product
     * iteration. It will most likely not need to be overriden. But its
     * there for instances such as when HTTPS cannot be supported, etc.
     */
    'url' => env('SCORMCLOUD_URL', 'https://cloud.scorm.com/EngineWebServices'),

    /**
     * The application id
     *
     * Required
     */
    'app_id' => env('SCORMCLOUD_APPID', ''),

    /**
     * Any secret key associated with the app id
     *
     * Required
     */
    'key' => env('SCORMCLOUD_KEY', ''),

    /**
     * The organization name.
     *
     * This will be used to create an origin string which is useful
     * for debugging on the SCORM Cloud developers’ side
     *
     * optional
     */
    'organization' => env('SCORMCLOUD_ORGANIZATION', 'scl'),

    /**
     * The app name.
     *
     * This will be used to create an origin string which is useful
     * for debugging on the SCORM Cloud developers’ side
     *
     * optional
     */
    'app_name' => env('SCORMCLOUD_APP_NAME', 'app'),

    /**
     * The version number.
     *
     * This will be used to create an origin string which is useful
     * for debugging on the SCORM Cloud developers’ side
     *
     * optional
     */
    'version' => env('SCORMCLOUD_VERSION','1.0')
];
```

### Usage

You can use the provided helper to access the gateway:
```php
scormcloud()
```

You can get a list of the courses by:
```php
scormcloud()->getCourses()
```


[1]: https://packagist.org/packages/asifm42/scorm-cloud-php
