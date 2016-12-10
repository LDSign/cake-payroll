# Payroll plugin for CakePHP

[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://packagist.org/packages/ldsign/cake-payroll)

Calculate german payroll data (taxes and social insurance).

This plugin uses standalone and cake independent classes for tax calculations. This was done for staying as close as possible to the official programming flowchart of the german finance authority. See:

https://www.bmf-steuerrechner.de/pruefdaten/pap2017.pdf

## Requirements

* CakePHP 3.0+
* PHP 5.5+

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require ldsign/cake-payroll
```

Then in your `config\bootstrap.php`:
```php
Plugin::load('Payroll', ['bootstrap' => false, 'routes' => true]);
```

## Usage

For a quick calculation navigate to

```
/payroll/taxes
```

## ToDo

* Extend documentation
* Unit tests
* Check results against official webservice
* Social insurance component

## Support

For bugs and feature requests, please use the [issues](https://github.com/ldsign/cake-payroll/issues) section of this repository.

## License

Licensed under the [MIT](http://www.opensource.org/licenses/mit-license.php) License. Redistributions of the source code included in this repository must retain the copyright notice found in each file.
