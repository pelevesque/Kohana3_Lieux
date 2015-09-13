<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * MySQL Lieux driver
 *
 * @author      Pierre-Emmanuel Lévesque
 * @email       pierre.e.levesque@gmail.com
 * @copyright   (c) 2013 Pierre-Emmanuel Lévesque
 * @license     MIT License (MIT), @see LICENSE.md
 */
class Kohana_Lieux_MySQL extends Lieux {

    /**
     * Fetches all the contents of a database table.
     *
     * @param    string   database table
     * @return   array    database table
     */
    protected function _fetch_all($table)
    {
        return DB::select()->from($table)->execute()->as_array();
    }

} // End Kohana_Lieux_MySQL
