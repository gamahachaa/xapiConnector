<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1469: characters 5-33
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1475: characters 5-47
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1481: characters 5-47
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1489: lines 1489-1494
		if ($fill === null) {
			$fill = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1490: lines 1490-1491
		while ($array->length < $length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1491: characters 7-23
			$array->arr[$array->length++] = $fill;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1492: characters 5-48
		$array->splice($length, $array->length - $length);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1493: characters 5-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1502: lines 1502-1505
		if ($fill === null) {
			$fill = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1503: characters 3-23
		$array = (clone $array);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1504: characters 3-37
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1511: characters 5-66
		return Arrays::reduce($arr, function ($tot, $v) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1511: characters 48-62
			return $tot + $v;
		}, 0);
	}
}

Boot::registerClass(ArrayInts::class, 'thx.ArrayInts');
