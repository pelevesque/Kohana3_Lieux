# Xcountry

Xcountry is a module for displaying a list of countries.

# Installation

 - Install the database table found in MYSQL_schema.sql

## Module Dependencies

 - Kohana database
 
## Usage

Xcountry has one public static method called get_countries. If a translation file is found which matches the current system language, the countries will be translated to that language. Countries are always sorted by name.


	// Get the countries from the 'countries' table.
	$countries = Xcountries::get_countries();
	
	// Get the countries from a specified table.
	$countries = Xcountries::get_countries('some_table_name');

Countries are returned as an array.
