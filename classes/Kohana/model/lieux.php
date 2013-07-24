<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Model_Lieux extends Model_Database {

	/**
	 * Gets the countries.
	 *
	 * @param    string   database table  [def: countries]
	 * @return   array    countries
	 */
	public static function get_countries($db_table = 'countries')
	{
		$countries = Model_lieux::fetch_all($db_table);
		$countries = Model_lieux::translate($countries);

		return $countries;
	}

	/**
	 * Fetches all the contents of a database table.
	 *
	 * @param    string   database table
	 * @return   array    database table
	 */
	protected static function fetch_all($db_table)
	{
		return DB::select()->from($db_table)->execute()->as_array();
	}

	/**
	 * Translates an array's name field.
	 *
	 * @param    array    array to translate
	 * @return   array    translated array
	 */
	protected static function translate($arr)
	{
		if (I18n::$lang != 'en-us')
		{
			foreach ($arr as $k => $v)
			{
				$arr[$k]['name'] = __($v['name']);
			}

			usort($arr, create_function('$a,$b', '$compare = strnatcmp(utf8::transliterate_to_ascii(utf8::strtolower($a["name"])), utf8::transliterate_to_ascii(utf8::strtolower($b["name"]))); return ($compare > 0) ? 1 : -1;'));
		}

		return $arr;
	}

} // End Kohana_Model_Lieux
