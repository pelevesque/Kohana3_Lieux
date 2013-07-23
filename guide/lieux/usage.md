# Module Dependencies

 - Kohana database

# Installation

Install the database schemas from the schemas folder for the places you wish to use.

# Usage

## Countries

This method returns an array of countries. If you add translations, the country names will be returned in alphabetical order. The default table is 'countries'. It can be changed with the method's first parameter.

    // Get the countries from the 'countries' table.
    $countries = Model_Lieux::get_countries();

    // Get the countries from a specified table.
    $countries = Model_Lieux::get_countries('SomeTable');
