<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1451: characters 3-31
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1458: characters 15-75
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1458: characters 3-75
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1464: characters 3-47
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1470: characters 3-47
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1478: lines 1478-1483
		if ($fill === null) {
			$fill = 0.0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1479: lines 1479-1480
		while ($array->length < $length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1480: characters 4-20
			$array->arr[$array->length++] = $fill;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1481: characters 3-46
		$array->splice($length, $array->length - $length);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1482: characters 3-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1491: lines 1491-1494
		if ($fill === null) {
			$fill = 0.0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1492: characters 3-23
		$array = (clone $array);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1493: characters 3-37
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1500: lines 1500-1501
		if ($array->length < 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1501: characters 4-14
			return 0.0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1502: lines 1502-1505
		$mean = ArrayFloats::average($array);
		$variance = Arrays::reduce($array, function ($acc, $val) use (&$mean) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1504: characters 5-41
			return $acc + (($val - $mean) ** 2);
		}, 0) / ($array->length - 1);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1506: characters 3-29
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1513: characters 3-66
		return Arrays::reduce($arr, function ($tot, $v) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1513: characters 46-60
			return $tot + $v;
		}, 0.0);
	}
}

Boot::registerClass(ArrayFloats::class, 'thx.ArrayFloats');
