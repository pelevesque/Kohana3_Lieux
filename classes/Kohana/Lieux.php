<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Lieux - Displays lists of places
 *
 * @author      Pierre-Emmanuel Lévesque
 * @email       pierre.e.levesque@gmail.com
 * @copyright   (c) 2013 Pierre-Emmanuel Lévesque
 * @license     MIT License (MIT), @see LICENSE.md
 */
abstract class Kohana_Lieux {

	// Lieux instances
	protected static $_instance;

	/**
	 * Singleton pattern
	 *
	 * @return Lieux
	 */
	public static function instance()
	{
		if ( ! isset(Lieux::$_instance))
		{
			// Load the configuration for this type.
			$config = Kohana::$config->load('lieux');

			// Set the default type.
			if ( ! $type = $config->get('driver'))
			{
				$type = 'MySQL';
			}

			// Set the session class name.
			$class = 'Lieux_'.ucfirst($type);

			// Create a new session instance.
			Lieux::$_instance = new $class();
		}

		return Lieux::$_instance;
	}

	/**
	 * Gets the countries.
	 *
	 * @param    string   table       [def: countries]
	 * @return   array    countries
	 */
	public function get_countries($table = 'countries')
	{
		$countries = $this->_fetch_all($table);
		$countries = $this->_translate($countries);

		return $countries;
	}

	abstract protected function _fetch_all($table);

	/**
	 * Translates an array's name field.
	 *
	 * @param    array    array to translate
	 * @return   array    translated array
	 */
	protected function _translate($arr)
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

} // End Kohana_Lieux
