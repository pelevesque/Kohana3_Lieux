# Lieux

## About

Lieux is a module for displaying lists of places.

## Configuration

Lieux uses a MySQL driver by default.

If you wish to save the data in another format, you can make your own driver. In this case, you'll have to change Lieux's configuration file to reflect this.

## Module Dependencies

 - Kohana database (if using the MySQL driver)

## Installation

If you are using the default MySQL driver, install the database schemas from the schemas folder for the places you wish to use.

## Usage

### Countries

This method returns an array of countries.

If you add translations to the i18n folder, the country names will be returned in alphabetical order.

NOTE: You must install the *countries* table to use this method.

```php
// Get the countries from the 'countries' table.
$countries = Lieux::instance()->get_countries();

// Get the countries from a custom table.
$countries = Lieux::instance()->get_countries('custom_table');
```
