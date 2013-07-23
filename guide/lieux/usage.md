# Module Dependencies

 - Kohana database

# Installation

Install the database schemas from the schemas folder for the places you wish to use.

# Usage

## Countries

This method returns an array of countries.

If you add translations, the country names will be returned in alphabetical order.

NOTE: You must install the 'countries' table to use this method.

    // Get the countries from the 'countries' table.
    $countries = Model_Lieux::get_countries();

    // Get the countries from a specified table.
    // (In case you changed the DB table name.)
    $countries = Model_Lieux::get_countries('SomeTable');
