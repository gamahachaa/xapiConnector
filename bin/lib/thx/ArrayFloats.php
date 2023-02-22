<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx
 */

namespace thx;

use \php\Boot;

/**
 * Helper class for `Array<Float>`.
 */
class ArrayFloats {
	/**
	 * Finds the average of all the elements in the array.
	 * It returns `NaN` if the array is empty.
	 * 
	 * @param float[]|\Array_hx $arr
	 * 
	 * @return float
	 */
	public static function average ($arr) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1393: characters 5-33
		return ArrayFloats::sum($arr) / $arr->length;
	}

	/**
	 * Filters out all null or Math.NaN floats in the array
	 * 
	 * @param float[]|\Array_hx $arr
	 * 
	 * @return float[]|\Array_hx
	 */
	public static function compact ($arr) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1401: characters 17-77
		$result = [];
		$data = $arr->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			if ((null !== $item) && \is_finite($item)) {
				$result[] = $item;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1401: characters 5-77
		return \Array_hx::wrap($result);
	}

	/**
	 * Finds the max float element in the array.
	 * 
	 * @param float[]|\Array_hx $arr
	 * 
	 * @return float
	 */
	public static function max ($arr) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1407: characters 5-49
		return Options::get(Arrays::maxBy($arr, Floats::$order));
	}

	/**
	 * Finds the min float element in the array.
	 * 
	 * @param float[]|\Array_hx $arr
	 * 
	 * @return float
	 */
	public static function min ($arr) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1413: characters 5-49
		return Options::get(Arrays::minBy($arr, Floats::$order));
	}

	/**
	 * Resizes an array of `Float` to an arbitrary length by adding more elements (default is `0.0`)
	 * to its end or by removing extra elements.
	 * Note that the function changes the passed array and doesn't create a copy.
	 * 
	 * @param float[]|\Array_hx $array
	 * @param int $length
	 * @param float $fill
	 * 
	 * @return float[]|\Array_hx
	 */
	public static function resize ($array, $length, $fill = 0.0) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1421: lines 1421-1426
		if ($fill === null) {
			$fill = 0.0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1422: lines 1422-1423
		while ($array->length < $length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1423: characters 7-23
			$array->arr[$array->length++] = $fill;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1424: characters 5-48
		$array->splice($length, $array->length - $length);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1425: characters 5-17
		return $array;
	}

	/**
	 * Copies and resizes an array of `Float` to an arbitrary length by adding more
	 * elements (default is `0.0`) to its end or by removing extra elements.
	 * Note that the function creates and returns a copy of the passed array.
	 * 
	 * @param float[]|\Array_hx $array
	 * @param int $length
	 * @param float $fill
	 * 
	 * @return float[]|\Array_hx
	 */
	public static function resized ($array, $length, $fill = 0.0) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1436: lines 1436-1439
		if ($fill === null) {
			$fill = 0.0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1437: characters 5-25
		$array = (clone $array);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1438: characters 5-39
		return ArrayFloats::resize($array, $length, $fill);
	}

	/**
	 * Returns the sample standard deviation of the sampled values.
	 * 
	 * @param float[]|\Array_hx $array
	 * 
	 * @return float
	 */
	public static function standardDeviation ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1445: lines 1445-1446
		if ($array->length < 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1446: characters 7-17
			return 0.0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1447: lines 1447-1450
		$mean = ArrayFloats::average($array);
		$variance = Arrays::reduce($array, function ($acc, $val) use (&$mean) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1449: characters 13-49
			return $acc + (($val - $mean) ** 2);
		}, 0) / ($array->length - 1);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1451: characters 5-31
		return \sqrt($variance);
	}

	/**
	 * Finds the sum of all the elements in the array.
	 * 
	 * @param float[]|\Array_hx $arr
	 * 
	 * @return float
	 */
	public static function sum ($arr) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1458: characters 5-68
		return Arrays::reduce($arr, function ($tot, $v) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1458: characters 48-62
			return $tot + $v;
		}, 0.0);
	}
}

Boot::registerClass(ArrayFloats::class, 'thx.ArrayFloats');
