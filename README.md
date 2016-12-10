# Payroll plugin for CakePHP

[![Latest Version](https://poser.pugx.org/ldsign/cake-payroll/v/stable)](https://packagist.org/packages/ldsign/cake-payroll)
[![Total Downloads](https://img.shields.io/packagist/dt/friendsofcake/CakePdf.svg?style=flat-square)](https://packagist.org/packages/ldsign/cake-payroll)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://packagist.org/packages/ldsign/cake-payroll)

Calculate german payroll data (taxes and social insurance)

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
http://localhost/ebsst_v4/payroll/taxes
```