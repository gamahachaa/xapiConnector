<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx
 */

namespace thx;

use \php\Boot;

/**
 * Helper class for `Array<Int>`.
 */
class ArrayInts {
	/**
	 * Finds the average of all the elements in the array.
	 * 
	 * @param int[]|\Array_hx $arr
	 * 
	 * @return float
	 */
	public static function average ($arr) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1524: characters 3-31
		return ArrayInts::sum($arr) / $arr->length;
	}

	/**
	 * Finds the max int element in the array.
	 * 
	 * @param int[]|\Array_hx $arr
	 * 
	 * @return int
	 */
	public static function max ($arr) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1530: characters 3-45
		return Options::get(Arrays::maxBy($arr, Ints::$order));
	}

	/**
	 * Finds the min int element in the array.
	 * 
	 * @param int[]|\Array_hx $arr
	 * 
	 * @return int
	 */
	public static function min ($arr) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1536: characters 3-45
		return Options::get(Arrays::minBy($arr, Ints::$order));
	}

	/**
	 * Resizes an array of `Int` to an arbitrary length by adding more elements (default is `0`)
	 * to its end or by removing extra elements.
	 * Note that the function changes the passed array and doesn't create a copy.
	 * 
	 * @param int[]|\Array_hx $array
	 * @param int $length
	 * @param int $fill
	 * 
	 * @return int[]|\Array_hx
	 */
	public static function resize ($array, $length, $fill = 0) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1544: lines 1544-1549
		if ($fill === null) {
			$fill = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1545: lines 1545-1546
		while ($array->length < $length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1546: characters 4-20
			$array->arr[$array->length++] = $fill;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1547: characters 3-46
		$array->splice($length, $array->length - $length);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1548: characters 3-15
		return $array;
	}

	/**
	 * Copies and resizes an array of `Int` to an arbitrary length by adding more
	 * elements (default is `0`) to its end or by removing extra elements.
	 * Note that the function creates and returns a copy of the passed array.
	 * 
	 * @param int[]|\Array_hx $array
	 * @param int $length
	 * @param int $fill
	 * 
	 * @return int[]|\Array_hx
	 */
	public static function resized ($array, $length, $fill = 0) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1557: lines 1557-1560
		if ($fill === null) {
			$fill = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1558: characters 3-23
		$array = (clone $array);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1559: characters 3-37
		return ArrayInts::resize($array, $length, $fill);
	}

	/**
	 * Finds the sum of all the elements in the array.
	 * 
	 * @param int[]|\Array_hx $arr
	 * 
	 * @return int
	 */
	public static function sum ($arr) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1566: characters 3-64
		return Arrays::reduce($arr, function ($tot, $v) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1566: characters 46-60
			return $tot + $v;
		}, 0);
	}
}

Boot::registerClass(ArrayInts::class, 'thx.ArrayInts');
