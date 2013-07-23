<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Model_Lieux extends Model_Database {

	/**
	 * Gets the world's countries.
	 *
	 * @param    string   database table  [def: countries]
	 * @return   array    countries
	 */
	public static function get_countries($db_table = 'countries')
	{
		$countries = DB::select()
			->from($db_table)
			->execute()
			->as_array();

		if (I18n::$lang != 'en-us')
		{
			foreach($countries as $k => $country)
			{
				$countries[$k]['name'] = __($country['name']);
			}

			usort($countries, create_function('$a,$b', '$compare = strnatcmp(utf8::transliterate_to_ascii(utf8::strtolower($a["name"])), utf8::transliterate_to_ascii(utf8::strtolower($b["name"]))); return ($compare > 0) ? 1 : -1;'));
		}

		return $countries;
	}

} // End Kohana_Model_Lieux
