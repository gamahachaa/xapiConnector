<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx
 */

namespace thx;

use \php\Boot;

/**
 * Helper class for `Array<String>`.
 */
class ArrayStrings {
	/**
	 * Filters out all null or empty strings in the array
	 * 
	 * @param string[]|\Array_hx $arr
	 * 
	 * @return string[]|\Array_hx
	 */
	public static function compact ($arr) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1522: characters 12-62
		$result = [];
		$data = $arr->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			if (!Strings::isEmpty($item)) {
				$result[] = $item;
			}
		}
		return \Array_hx::wrap($result);
	}

	/**
	 * Finds the max string element in the array.
	 * 
	 * @param string[]|\Array_hx $arr
	 * 
	 * @return string
	 */
	public static function max ($arr) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1528: characters 5-60
		return Options::getOrElse(Arrays::maxBy($arr, Strings::$order), null);
	}

	/**
	 * Finds the min string element in the array.
	 * 
	 * @param string[]|\Array_hx $arr
	 * 
	 * @return string
	 */
	public static function min ($arr) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1534: characters 5-60
		return Options::getOrElse(Arrays::minBy($arr, Strings::$order), null);
	}
}

Boot::registerClass(ArrayStrings::class, 'thx.ArrayStrings');
