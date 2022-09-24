# Activity Logger for Laravel

[![GitHub Tests Action Status][icon-action-tests]][url-action-tests]
[![GitHub Code Analysis Action Status][icon-action-analysis]][url-action-analysis]
[![Software License][icon-license]][url-license]
[![Latest Version on Packagist][icon-packagist-version]][url-packagist]
[![Total Downloads][icon-packagist-downloads]][url-packagist]

An Activity Logger for Laravel Eloquent models.

## Installation

1. Install the package via Composer:

```shell
composer require neuecommerce/activity-logger
```

2. Publish the migrations (optional):

```shell
php artisan vendor:publish --tag="neuecommerce-addresses-migrations"
```

3. Publish the configuration file (optional):

```shell
php artisan vendor:publish --tag="neuecommerce-activity-logger-config"
```

4. Run the migrations:

```shell
php artisan migrate
```

## Implementation

...

## Usage

...

## Testing

```shell
composer test
```

## Contributing

Thank you for your interest. Here are some of the many ways to contribute.

- Check out our [contributing guide](/.github/CONTRIBUTING.md)
- Look at our [code of conduct](/.github/CODE_OF_CONDUCT.md)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

[url-action-tests]: https://github.com/neuecommerce/activity-logger/actions?query=workflow%3Atests
[url-action-analysis]: https://github.com/neuecommerce/activity-logger/actions?query=workflow%3Acode-analysis
[url-packagist]: https://github.com/neuecommerce/neuecommerce
[url-license]: https://opensource.org/licenses/MIT

[icon-action-tests]: https://github.com/neuecommerce/activity-logger/actions/workflows/tests.yml/badge.svg?branch=main
[icon-action-analysis]: https://github.com/neuecommerce/activity-logger/actions/workflows/code-analysis.yml/badge.svg?branch=main
[icon-license]: https://img.shields.io/github/license/neuecommerce/activity-logger?label=License
[icon-packagist-version]: https://img.shields.io/packagist/v/neuecommerce/activity-logger.svg?label=Packagist
[icon-packagist-downloads]: https://img.shields.io/packagist/dt/neuecommerce/activity-logger.svg?label=Downloads
