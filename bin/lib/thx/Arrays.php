<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx
 */

namespace thx;

use \php\_Boot\HxAnon;
use \haxe\ds\Option;
use \php\Boot;
use \thx\fp\_Map\Map_Impl_;
use \haxe\Exception;
use \thx\_ReadonlyArray\ReadonlyArray_Impl_;
use \thx\_Ord\Ord_Impl_;
use \haxe\IMap;
use \thx\fp\MapImpl;
use \thx\_Nel\Nel_Impl_;
use \haxe\ds\StringMap;
use \thx\_Monoid\Monoid_Impl_;
use \thx\_Set\Set_Impl_;
use \thx\_Validation\Validation_Impl_;

/**
 * `Arrays` provides additional extension methods on top of the `Array` type.
 * Note that some of the examples imply `using thx.Arrays;`.
 */
class Arrays {
	/**
	 * Finds the first occurrance of `element` and returns all the elements after it.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param mixed $element
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function after ($array, $element) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:87: characters 3-49
		return $array->slice(ReadonlyArray_Impl_::indexOf($array, $element) + 1);
	}

	/**
	 * Checks if `predicate` returns true for all elements in the array.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param \Closure $predicate
	 * 
	 * @return bool
	 */
	public static function all ($arr, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:123: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:123: characters 17-27
		$_g1 = $arr->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:123: lines 123-125
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:123: characters 13-27
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:124: lines 124-125
			if (!$predicate(($arr->arr[$i] ?? null))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:125: characters 5-17
				return false;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:126: characters 3-14
		return true;
	}

	/**
	 * Checks if `predicate` returns true for at least one element in the array.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param \Closure $predicate
	 * 
	 * @return bool
	 */
	public static function any ($arr, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:133: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:133: characters 17-27
		$_g1 = $arr->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:133: lines 133-135
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:133: characters 13-27
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:134: lines 134-135
			if ($predicate(($arr->arr[$i] ?? null))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:135: characters 5-16
				return true;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:136: characters 3-15
		return false;
	}

	/**
	 * Arrays.add pushes an element at the end of the `array` and returns it. Practical
	 * for chaining push operations.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param mixed $element
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function append ($array, $element) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:31: characters 3-22
		$array->arr[$array->length++] = $element;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:32: characters 3-15
		return $array;
	}

	/**
	 * Arrays.addIf conditionaly pushes an element at the end of the `array` and returns it.
	 * Practical for chaining push operations.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param bool $cond
	 * @param mixed $element
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function appendIf ($array, $cond, $element) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:40: lines 40-41
		if ($cond) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:41: characters 4-23
			$array->arr[$array->length++] = $element;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:42: characters 3-15
		return $array;
	}

	/**
	 * Arrays.applyIndexes takes an `array` and returns a copy of it with its elements rearranged according to `indexes`.
	 * If the `indexes` array does not contain continuous values, you may want to set `incrementDuplicates` to `true`.
	 * var result = Arrays.applyIndexes(["B", "C", "A"], [1, 2, 0]);
	 * trace(result); // output ["A", "B", "C"]
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param int[]|\Array_hx $indexes
	 * @param bool $incrementDuplicates
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function applyIndexes ($array, $indexes, $incrementDuplicates = false) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:53: lines 53-72
		if ($incrementDuplicates === null) {
			$incrementDuplicates = false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:54: lines 54-55
		if ($indexes->length !== $array->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:55: characters 4-9
			throw Exception::thrown(new Error("`Arrays.applyIndexes` can only be applied to two arrays with the same length", null, new _HxAnon_Arrays0("thx/Arrays.hx", 55, "thx.Arrays", "applyIndexes")));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:56: characters 3-19
		$result = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:57: lines 57-70
		if ($incrementDuplicates) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:58: characters 4-42
			$usedIndexes = Set_Impl_::createInt();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:59: characters 14-18
			$_g = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:59: characters 18-30
			$_g1 = $array->length;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:59: lines 59-65
			while ($_g < $_g1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:59: characters 14-30
				$i = $_g++;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:60: characters 5-28
				$index = ($indexes->arr[$i] ?? null);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:61: lines 61-62
				while (\array_key_exists($index, $usedIndexes->data)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:62: characters 6-13
					++$index;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:63: characters 5-27
				Set_Impl_::add($usedIndexes, $index);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:64: characters 5-29
				$result->offsetSet($index, ($array->arr[$i] ?? null));
			}
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:67: characters 14-18
			$_g = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:67: characters 18-30
			$_g1 = $array->length;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:67: lines 67-69
			while ($_g < $_g1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:67: characters 14-30
				$i = $_g++;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:68: characters 5-34
				$result->offsetSet(($indexes->arr[$i] ?? null), ($array->arr[$i] ?? null));
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:71: characters 3-16
		return $result;
	}

	/**
	 * Creates an array of elements from the specified indexes.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param int[]|\Array_hx $indexes
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function at ($arr, $indexes) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:143: characters 10-48
		$result = [];
		$data = $indexes->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = ($arr->arr[$item] ?? null);
		}
		return \Array_hx::wrap($result);
	}

	/**
	 * Safe indexed access to array elements. Deprecated in favor of `getOption`.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param int $i
	 * 
	 * @return Option
	 */
	public static function atIndex ($array, $i) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:94: characters 10-66
		if (($i >= 0) && ($i < $array->length)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:94: characters 42-56
			return Option::Some(($array->arr[$i] ?? null));
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:94: characters 62-66
			return Option::None();
		}
	}

	/**
	 * Finds the first occurrance of `element` and returns all the elements before it.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param mixed $element
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function before ($array, $element) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:149: characters 3-48
		return $array->slice(0, ReadonlyArray_Impl_::indexOf($array, $element));
	}

	/**
	 * Traverse both arrays from the beginning and collect the elements that are the
	 * same. It stops as soon as the arrays differ.
	 * 
	 * @param mixed[]|\Array_hx $self
	 * @param mixed[]|\Array_hx $other
	 * @param \Closure $equality
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function commonsFromStart ($self, $other, $equality = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:156: lines 156-157
		if (null === $equality) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:157: characters 4-30
			$equality = Boot::getStaticClosure(Functions::class, 'equality');
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:158: characters 3-17
		$count = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:159: lines 159-163
		$_g = 0;
		$_g1 = Arrays::zip($self, $other);
		while ($_g < $_g1->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:159: characters 8-12
			$pair = ($_g1->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:159: lines 159-163
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:160: lines 160-163
			if ($equality($pair->_0, $pair->_1)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:161: characters 5-12
				++$count;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:163: characters 5-10
				break;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:164: characters 3-30
		return $self->slice(0, $count);
	}

	/**
	 * Filters out all null elements in the array
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function compact ($arr) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:180: characters 10-58
		$result = [];
		$data = $arr->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			if (null !== $item) {
				$result[] = $item;
			}
		}
		return \Array_hx::wrap($result);
	}

	/**
	 * Compares two arrays returning a negative integer, zero or a positive integer.
	 * The first comparison is made on the array length.
	 * If they match each pair of elements is compared using `thx.Dynamics.compare`.
	 * 
	 * @param mixed[]|\Array_hx $a
	 * @param mixed[]|\Array_hx $b
	 * 
	 * @return int
	 */
	public static function compare ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:192: characters 3-13
		$v = Ints::compare($a->length, $b->length);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:193: lines 193-194
		if ($v !== 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:194: characters 4-12
			return $v;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:195: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:195: characters 17-25
		$_g1 = $a->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:195: lines 195-198
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:195: characters 13-25
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:196: characters 8-42
			$v = Dynamics::compare(($a->arr[$i] ?? null), ($b->arr[$i] ?? null));
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:196: lines 196-197
			if ($v !== 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:197: characters 5-13
				return $v;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:199: characters 3-11
		return 0;
	}

	/**
	 * Returns `true` if all items in `elements` are found in the array.
	 * An optional equality function can be passed as the last argument. If not provided, strict equality is adopted.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param object $elements
	 * @param \Closure $eq
	 * 
	 * @return bool
	 */
	public static function containsAllEq ($array, $elements, $eq) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:255: characters 14-22
		$el = $elements->iterator();
		while ($el->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:255: lines 255-258
			$el1 = $el->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:256: lines 256-257
			if (!Arrays::containsEq($array, $el1, $eq)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:257: characters 5-17
				return false;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:259: characters 3-14
		return true;
	}

	/**
	 * Returns `true` if all items in `elements` are found in the array and they are a strict match or matched by the provided `eq` function.
	 * An optional equality function can be passed as the last argument. If not provided, strict equality is adopted.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param object $elements
	 * @param \Closure $eq
	 * 
	 * @return bool
	 */
	public static function containsAllExact ($array, $elements, $eq = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:242: characters 14-22
		$el = $elements->iterator();
		while ($el->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:242: lines 242-245
			$el1 = $el->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:243: lines 243-244
			if (!Arrays::containsExact($array, $el1, $eq)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:244: characters 5-17
				return false;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:246: characters 3-14
		return true;
	}

	/**
	 * Returns `true` if any element in `elements` is found in the array.
	 * An optional equality function can be passed as the last argument. If not provided, strict equality is adopted.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param object $elements
	 * @param \Closure $eq
	 * 
	 * @return bool
	 */
	public static function containsAnyEq ($array, $elements, $eq) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:281: characters 14-22
		$el = $elements->iterator();
		while ($el->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:281: lines 281-284
			$el1 = $el->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:282: lines 282-283
			if (Arrays::containsEq($array, $el1, $eq)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:283: characters 5-16
				return true;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:285: characters 3-15
		return false;
	}

	/**
	 * Returns `true` if any element in `elements` is found in the array and it is a strict match or matched by the provided `eq` function.
	 * An optional equality function can be passed as the last argument. If not provided, strict equality is adopted.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param object $elements
	 * @param \Closure $eq
	 * 
	 * @return bool
	 */
	public static function containsAnyExact ($array, $elements, $eq = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:268: characters 14-22
		$el = $elements->iterator();
		while ($el->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:268: lines 268-271
			$el1 = $el->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:269: lines 269-270
			if (Arrays::containsExact($array, $el1, $eq)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:270: characters 5-16
				return true;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:272: characters 3-15
		return false;
	}

	/**
	 * Returns `true` if `element` is found in the array.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param mixed $element
	 * @param \Closure $eq
	 * 
	 * @return bool
	 */
	public static function containsEq ($array, $element, $eq) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:230: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:230: characters 17-29
		$_g1 = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:230: lines 230-232
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:230: characters 13-29
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:231: lines 231-232
			if ($eq(($array->arr[$i] ?? null), $element)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:232: characters 5-16
				return true;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:233: characters 3-15
		return false;
	}

	/**
	 * Returns `true` if `element` is found in the array and it is a strict match or matched by the provided `eq` function.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param mixed $element
	 * @param \Closure $eq
	 * 
	 * @return bool
	 */
	public static function containsExact ($array, $element, $eq = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:216: lines 216-223
		if (null === $eq) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:217: characters 4-43
			return ReadonlyArray_Impl_::indexOf($array, $element) >= 0;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:219: characters 14-18
			$_g = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:219: characters 18-30
			$_g1 = $array->length;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:219: lines 219-221
			while ($_g < $_g1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:219: characters 14-30
				$i = $_g++;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:220: lines 220-221
				if ($eq(($array->arr[$i] ?? null), $element)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:221: characters 6-17
					return true;
				}
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:222: characters 4-16
			return false;
		}
	}

	/**
	 * Creates a new `Array` with `length` elements all set to `fillWith`.
	 * 
	 * @param int $length
	 * @param mixed $fillWith
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function create ($length, $fillWith) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:292: characters 3-88
		$arr = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:293: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:293: characters 17-23
		$_g1 = $length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:293: lines 293-294
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:293: characters 13-23
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:294: characters 4-21
			$arr->offsetSet($i, $fillWith);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:295: characters 3-13
		return $arr;
	}

	/**
	 * It returns the cross product between two arrays.
	 * ```haxe
	 * var r = [1,2,3].cross([4,5,6]);
	 * trace(r); // [[1,4],[1,5],[1,6],[2,4],[2,5],[2,6],[3,4],[3,5],[3,6]]
	 * ```
	 * 
	 * @param mixed[]|\Array_hx $a
	 * @param mixed[]|\Array_hx $b
	 * 
	 * @return \Array_hx[]|\Array_hx
	 */
	public static function cross ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:313: characters 3-14
		$r = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:314: characters 14-15
		$_g_current = 0;
		$_g_array = $a;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:314: lines 314-316
		while ($_g_current < $_g_array->length) {
			$va = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:315: characters 15-16
			$_g1_current = 0;
			$_g1_array = $b;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:315: lines 315-316
			while ($_g1_current < $_g1_array->length) {
				$vb = ($_g1_array->arr[$_g1_current++] ?? null);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:316: characters 5-21
				$r->arr[$r->length++] = \Array_hx::wrap([
					$va,
					$vb,
				]);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:317: characters 3-11
		return $r;
	}

	/**
	 * It produces the cross product of each array element.
	 * ```haxe
	 * var r = [[1,2],[3,4],[5,6]].crossMulti();
	 * trace(r); // [[1,3,5],[2,3,5],[1,4,5],[2,4,5],[1,3,6],[2,3,6],[1,4,6],[2,4,6]]
	 * ```
	 * 
	 * @param \Array_hx[]|\Array_hx $array
	 * 
	 * @return \Array_hx[]|\Array_hx
	 */
	public static function crossMulti ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:329: lines 329-330
		$acopy = (clone $array);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:330: characters 13-26
		if ($acopy->length > 0) {
			$acopy->length--;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:330: characters 13-54
		$_this = \array_shift($acopy->arr);
		$result = [];
		$data = $_this->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = \Array_hx::wrap([$item]);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:329: lines 329-330
		$result1 = \Array_hx::wrap($result);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:331: lines 331-341
		while ($acopy->length > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:332: characters 16-29
			if ($acopy->length > 0) {
				$acopy->length--;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:332: characters 4-48
			$array = \array_shift($acopy->arr);
			$tresult = $result1;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:333: characters 4-10
			$result1 = new \Array_hx();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:334: characters 14-19
			$_g_current = 0;
			$_g_array = $array;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:334: lines 334-340
			while ($_g_current < $_g_array->length) {
				$v = ($_g_array->arr[$_g_current++] ?? null);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:335: lines 335-339
				$_g = 0;
				while ($_g < $tresult->length) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:335: characters 10-12
					$ar = ($tresult->arr[$_g] ?? null);
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:335: lines 335-339
					++$_g;
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:336: characters 6-24
					$t = (clone $ar);
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:337: characters 6-15
					$t->arr[$t->length++] = $v;
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:338: characters 6-20
					$result1->arr[$result1->length++] = $t;
				}
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:342: characters 3-16
		return $result1;
	}

	/**
	 * Returns a new array containing only unique values from the input array.
	 * Input array does not need to be sorted.
	 * A predicate comparison function can be provided for comparing values.  Default
	 * comparison is ==.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $predicate
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function distinct ($array, $predicate = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:352: characters 3-19
		$result = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:354: lines 354-355
		if ($array->length <= 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:355: characters 4-26
			return (clone $array);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:357: lines 357-358
		if (null === $predicate) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:358: characters 4-13
			$predicate = Boot::getStaticClosure(Functions::class, 'equality');
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:360: characters 13-18
		$_g_current = 0;
		$_g_array = $array;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:360: lines 360-366
		while ($_g_current < $_g_array->length) {
			unset($v);
			$v = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:361: lines 361-363
			$keep = !Arrays::any($result, function ($r) use (&$predicate, &$v) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:362: characters 5-36
				return $predicate($r, $v);
			});
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:364: lines 364-365
			if ($keep) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:365: characters 5-19
				$result->arr[$result->length++] = $v;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:368: characters 3-16
		return $result;
	}

	/**
	 * Produces an Array from `a[n]` to the last element of `a`.
	 * 
	 * @param mixed[]|\Array_hx $a
	 * @param int $n
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function dropLeft ($a, $n) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1393: characters 10-47
		if ($n >= $a->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1393: characters 29-31
			return new \Array_hx();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1393: characters 37-47
			return $a->slice($n);
		}
	}

	/**
	 * Produces an Array from `a[0]` to a[a.length-n].
	 * 
	 * @param mixed[]|\Array_hx $a
	 * @param int $n
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function dropRight ($a, $n) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1400: characters 10-61
		if ($n >= $a->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1400: characters 29-31
			return new \Array_hx();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1400: characters 37-61
			return $a->slice(0, $a->length - $n);
		}
	}

	/**
	 * Drops values from Array `a` while the predicate returns true.
	 * 
	 * @param mixed[]|\Array_hx $a
	 * @param \Closure $p
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function dropWhile ($a, $p) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1407: characters 3-42
		$r = (new \Array_hx())->concat($a);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1409: characters 13-14
		$_g_current = 0;
		$_g_array = $a;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1409: lines 1409-1414
		while ($_g_current < $_g_array->length) {
			$e = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1410: lines 1410-1413
			if ($p($e)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1411: characters 5-14
				if ($r->length > 0) {
					$r->length--;
				}
				\array_shift($r->arr);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1413: characters 5-10
				break;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1416: characters 3-11
		return $r;
	}

	/**
	 * Applies a side-effect function to all elements in the array.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param \Closure $effect
	 * 
	 * @return void
	 */
	public static function each ($arr, $effect) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:107: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:107: characters 17-27
		$_g1 = $arr->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:107: lines 107-108
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:107: characters 13-27
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:108: characters 4-18
			$effect(($arr->arr[$i] ?? null));
		}
	}

	/**
	 * It allows to iterate an array pairing each element with every other element in the array.
	 * The iteration ends as soon as the `callback` returns `false`.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $callback
	 * 
	 * @return void
	 */
	public static function eachPair ($array, $callback) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:377: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:377: characters 17-29
		$_g1 = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:377: lines 377-380
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:377: characters 13-29
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:378: characters 14-15
			$_g2 = $i;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:378: characters 18-30
			$_g3 = $array->length;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:378: lines 378-380
			while ($_g2 < $_g3) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:378: characters 14-30
				$j = $_g2++;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:379: lines 379-380
				if (!$callback(($array->arr[$i] ?? null), ($array->arr[$j] ?? null))) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:380: characters 6-12
					return;
				}
			}
		}
	}

	/**
	 * Applies a side-effect function to all elements in the array.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param \Closure $effect
	 * 
	 * @return void
	 */
	public static function eachi ($arr, $effect) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:115: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:115: characters 17-27
		$_g1 = $arr->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:115: lines 115-116
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:115: characters 13-27
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:116: characters 4-21
			$effect(($arr->arr[$i] ?? null), $i);
		}
	}

	/**
	 * It compares the lengths and elements of two given arrays and returns `true` if all elements match.
	 * An optional equality function can be passed as the last argument. If not provided, strict equality is adopted.
	 * 
	 * @param mixed[]|\Array_hx $a
	 * @param mixed[]|\Array_hx $b
	 * @param \Closure $equality
	 * 
	 * @return bool
	 */
	public static function equals ($a, $b, $equality = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:388: lines 388-389
		if (($a === null) || ($b === null) || ($a->length !== $b->length)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:389: characters 4-16
			return false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:390: lines 390-391
		if (null === $equality) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:391: characters 4-30
			$equality = Boot::getStaticClosure(Functions::class, 'equality');
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:392: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:392: characters 17-25
		$_g1 = $a->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:392: lines 392-394
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:392: characters 13-25
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:393: lines 393-394
			if (!$equality(($a->arr[$i] ?? null), ($b->arr[$i] ?? null))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:394: characters 5-17
				return false;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:395: characters 3-14
		return true;
	}

	/**
	 * It finds an element in the array using `predicate` and returns it. The element is also
	 * removed from the original array.
	 * If no element satisfies `predicate` the array is left unmodified and `null` is returned.
	 * 
	 * @param mixed[]|\Array_hx $a
	 * @param \Closure $predicate
	 * 
	 * @return mixed
	 */
	public static function extract ($a, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:405: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:405: characters 17-25
		$_g1 = $a->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:405: lines 405-407
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:405: characters 13-25
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:406: lines 406-407
			if ($predicate(($a->arr[$i] ?? null))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:407: characters 5-29
				return ($a->splice($i, 1)->arr[0] ?? null);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:408: characters 3-14
		return null;
	}

	/**
	 * Fills `null` values in `arr` with `def`.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param mixed $def
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function fill ($arr, $def) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1435: lines 1435-1437
		$result = [];
		$data = $arr->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = ($item === null ? $def : $item);
		}
		return \Array_hx::wrap($result);
	}

	/**
	 * Performs a `filter` and `map` operation at once. It uses predicate to get either
	 * `None` or a transformed value `Some` of `TOut`.
	 * 
	 * @param mixed[]|\Array_hx $values
	 * @param \Closure $f
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function filterMap ($values, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:512: characters 3-16
		$acc = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:513: characters 17-23
		$_g_current = 0;
		$_g_array = $values;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:513: lines 513-519
		while ($_g_current < $_g_array->length) {
			$value = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:514: characters 11-19
			$_g = $f($value);
			$__hx__switch = ($_g->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:515: characters 15-16
				$v = $_g->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:516: characters 6-17
				$acc->arr[$acc->length++] = $v;
			} else if ($__hx__switch === 1) {
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:520: characters 3-13
		return $acc;
	}

	/**
	 * Filters out all `null` values from an array.
	 * 
	 * @param mixed[]|\Array_hx $a
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function filterNull ($a) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:415: characters 3-25
		$arr = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:416: characters 13-14
		$_g_current = 0;
		$_g_array = $a;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:416: lines 416-418
		while ($_g_current < $_g_array->length) {
			$v = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:417: lines 417-418
			if (null !== $v) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:418: characters 5-16
				$arr->arr[$arr->length++] = $v;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:419: characters 3-13
		return $arr;
	}

	/**
	 * Filters out all `None` values from an array and extracts `Some(value)` to `value`.
	 * 
	 * @param Option[]|\Array_hx $a
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function filterOption ($a) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:426: lines 426-433
		return Arrays::reduce($a, function ($acc, $maybeV) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:427: lines 427-431
			$__hx__switch = ($maybeV->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:428: characters 15-16
				$v = $maybeV->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:429: characters 6-17
				$acc->arr[$acc->length++] = $v;
			} else if ($__hx__switch === 1) {
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:432: characters 4-14
			return $acc;
		}, new \Array_hx());
	}

	/**
	 * It returns the first element of the array that matches the predicate function.
	 * If none is found it returns null.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $predicate
	 * 
	 * @return mixed
	 */
	public static function find ($array, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:457: characters 19-24
		$_g_current = 0;
		$_g_array = $array;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:457: lines 457-459
		while ($_g_current < $_g_array->length) {
			$element = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:458: lines 458-459
			if ($predicate($element)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:459: characters 5-19
				return $element;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:460: characters 3-14
		return null;
	}

	/**
	 * It returns the index of the first element of the array that matches the predicate function.
	 * If none is found it returns `-1`.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $predicate
	 * 
	 * @return int
	 */
	public static function findIndex ($array, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:539: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:539: characters 17-29
		$_g1 = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:539: lines 539-541
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:539: characters 13-29
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:540: lines 540-541
			if ($predicate(($array->arr[$i] ?? null))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:541: characters 5-13
				return $i;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:542: characters 3-12
		return -1;
	}

	/**
	 * It returns the last element of the array that matches the provided predicate function.
	 * If none is found it returns null.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $predicate
	 * 
	 * @return mixed
	 */
	public static function findLast ($array, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:550: characters 3-29
		$len = $array->length;
		$j = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:551: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:551: characters 17-20
		$_g1 = $len;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:551: lines 551-555
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:551: characters 13-20
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:552: characters 4-19
			$j = $len - $i - 1;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:553: lines 553-554
			if ($predicate(($array->arr[$j] ?? null))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:554: characters 5-20
				return ($array->arr[$j] ?? null);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:556: characters 3-14
		return null;
	}

	/**
	 * Finds the first item in an array where the given function `f` returns a `Option.Some` value.
	 * If no items map to `Some`, `None` is returned.
	 * 
	 * @param mixed[]|\Array_hx $values
	 * @param \Closure $f
	 * 
	 * @return Option
	 */
	public static function findMap ($values, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:499: characters 17-23
		$_g_current = 0;
		$_g_array = $values;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:499: lines 499-503
		while ($_g_current < $_g_array->length) {
			$value = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:500: characters 4-23
			$opt = $f($value);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:501: lines 501-502
			if (!Options::isNone($opt)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:502: characters 5-15
				return $opt;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:504: characters 3-14
		return Option::None();
	}

	/**
	 * It returns the first element of the array that matches the predicate function.
	 * If none is found it returns null.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $predicate
	 * 
	 * @return Option
	 */
	public static function findOption ($array, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:488: characters 19-24
		$_g_current = 0;
		$_g_array = $array;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:488: lines 488-490
		while ($_g_current < $_g_array->length) {
			$element = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:489: lines 489-490
			if ($predicate($element)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:490: characters 5-25
				return Option::Some($element);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:491: characters 3-14
		return Option::None();
	}

	/**
	 * Finds the first item in an `Array<Option<T>>` that is `Some`, otherwise `None`.
	 * 
	 * @param Option[]|\Array_hx $options
	 * 
	 * @return Option
	 */
	public static function findSome ($options) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:527: characters 18-25
		$_g_current = 0;
		$_g_array = $options;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:527: lines 527-530
		while ($_g_current < $_g_array->length) {
			$option = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:528: lines 528-529
			if (!Options::isNone($option)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:529: characters 5-18
				return $option;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:531: characters 3-14
		return Option::None();
	}

	/**
	 * Like `find`, but each item's index is also passed to the predicate.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $predicate
	 * 
	 * @return mixed
	 */
	public static function findi ($array, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:467: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:467: characters 17-29
		$_g1 = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:467: lines 467-469
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:467: characters 13-29
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:468: lines 468-469
			if ($predicate(($array->arr[$i] ?? null), $i)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:469: characters 5-20
				return ($array->arr[$i] ?? null);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:470: characters 3-14
		return null;
	}

	/**
	 * Like `findOption`, but each item's index is also passed to the predicate.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $predicate
	 * 
	 * @return Option
	 */
	public static function findiOption ($array, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:477: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:477: characters 17-29
		$_g1 = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:477: lines 477-479
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:477: characters 13-29
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:478: lines 478-479
			if ($predicate(($array->arr[$i] ?? null), $i)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:479: characters 5-26
				return Option::Some(($array->arr[$i] ?? null));
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:480: characters 3-14
		return Option::None();
	}

	/**
	 * It returns the first element of the array or null if the array is empty.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * 
	 * @return mixed
	 */
	public static function first ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:563: characters 3-18
		return ($array->arr[0] ?? null);
	}

	/**
	 * It returns an option of the first element or None if the array is empty.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * 
	 * @return Option
	 */
	public static function firstOption ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:569: characters 10-35
		$value = ($array->arr[0] ?? null);
		if (null === $value) {
			return Option::None();
		} else {
			return Option::Some($value);
		}
	}

	/**
	 * It traverses an array of elements. Each element is split using the `callback` function and a 'flattened' array is returned.
	 * ```haxe
	 * var chars = ['Hello', 'World'].flatMap(function(s) return s.split(''));
	 * trace(chars); // ['H','e','l','l','o','W','o','r','l','d']
	 * ```
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $callback
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function flatMap ($array, $callback) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:580: characters 18-37
		$result = [];
		$data = $array->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = $callback($item);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:580: characters 3-38
		return Arrays::flatten(\Array_hx::wrap($result));
	}

	/**
	 * It takes an array of arrays and 'flattens' it into an array.
	 * ```haxe
	 * var arr = [[1,2,3],[4,5,6],[7,8,9]];
	 * trace(arr); // [1,2,3,4,5,6,7,8,9]
	 * ```
	 * 
	 * @param \Array_hx[]|\Array_hx $array
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function flatten ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:594: characters 17-101
		return Arrays::reduce($array, function ($acc, $element) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:594: characters 70-96
			return $acc->concat($element);
		}, new \Array_hx());
	}

	/**
	 * Converts an `Array<Option<T>>` to `Option<Array<T>>` only if all elements in the input
	 * array contain a `Some` value. The input and the output array (if any) will have
	 * the same length.
	 * 
	 * @param Option[]|\Array_hx $a
	 * 
	 * @return Option
	 */
	public static function flattenOptions ($a) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:441: characters 3-16
		$acc = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:442: characters 13-14
		$_g_current = 0;
		$_g_array = $a;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:442: lines 442-448
		while ($_g_current < $_g_array->length) {
			$e = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:443: lines 443-448
			$__hx__switch = ($e->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:446: characters 15-16
				$v = $e->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:447: characters 6-17
				$acc->arr[$acc->length++] = $v;
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:445: characters 6-17
				return Option::None();
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:449: characters 3-19
		return Option::Some($acc);
	}

	/**
	 * Reduce with a monoid
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param object $m
	 * 
	 * @return mixed
	 */
	public static function fold ($array, $m) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:899: characters 3-47
		return Arrays::foldMap($array, Boot::getStaticClosure(Functions::class, 'identity'), $m);
	}

	/**
	 * Alias for reduce that puts the arguments in the proper order.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param mixed $init
	 * @param \Closure $f
	 * 
	 * @return mixed
	 */
	public static function foldLeft ($array, $init, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:860: characters 3-32
		return Arrays::reduce($array, $f, $init);
	}

	/**
	 * As with foldLeft, but uses first element as Init.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $f
	 * 
	 * @return Option
	 */
	public static function foldLeft1 ($array, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:866: characters 3-32
		$tail = Arrays::dropLeft($array, 1);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:867: characters 3-28
		$head = ($array->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:868: lines 868-872
		if ($head === null) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:869: characters 4-8
			return Option::None();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:871: characters 4-31
			return Option::Some(Arrays::reduce($tail, $f, $head));
		}
	}

	/**
	 * @param mixed[]|\Array_hx $array
	 * @param mixed $init
	 * @param \Closure $f
	 * 
	 * @return Either
	 */
	public static function foldLeftEither ($array, $init, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:876: characters 3-38
		$acc = Either::Right($init);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:877: characters 13-18
		$_g_current = 0;
		$_g_array = $array;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:877: lines 877-884
		while ($_g_current < $_g_array->length) {
			$a = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:878: lines 878-883
			$__hx__switch = ($acc->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:879: characters 15-20
				$error = $acc->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:880: characters 6-16
				return $acc;
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:881: characters 16-17
				$b = $acc->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:882: characters 6-9
				$acc = $f($b, $a);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:886: characters 3-13
		return $acc;
	}

	/**
	 * Fold by mapping the contained values into some monoidal type and reducing with that monoid.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $f
	 * @param object $m
	 * 
	 * @return mixed
	 */
	public static function foldMap ($array, $f, $m) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:893: characters 19-31
		$result = [];
		$data = $array->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = $f($item);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:893: characters 41-49
		$_e = $m;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:893: characters 10-50
		return Arrays::reduce(\Array_hx::wrap($result), function ($a0, $a1) use (&$_e) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:893: characters 41-49
			return Monoid_Impl_::append($_e, $a0, $a1);
		}, Monoid_Impl_::get_zero($m));
	}

	/**
	 * Reduce with a semigroup, returning None if the array is empty.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $s
	 * 
	 * @return Option
	 */
	public static function foldS ($array, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:911: characters 3-54
		return Options::map(Arrays::nel($array), function ($x) use (&$s) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:911: characters 37-53
			return Nel_Impl_::fold($x, $s);
		});
	}

	/**
	 * Finds the first occurrance of `element` and returns all the elements from that point on.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param mixed $element
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function from ($array, $element) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:600: characters 3-45
		return $array->slice(ReadonlyArray_Impl_::indexOf($array, $element));
	}

	/**
	 * Creates an `Array<T>` containing the given item
	 * 
	 * @param mixed $t
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function fromItem ($t) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:302: characters 3-13
		return \Array_hx::wrap([$t]);
	}

	/**
	 * Safe indexed access to array elements.
	 * Null values within `array` will also return `None` instead of `Some(null)`.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param int $i
	 * 
	 * @return Option
	 */
	public static function getOption ($array, $i) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:101: characters 10-35
		$value = ($array->arr[$i] ?? null);
		if (null === $value) {
			return Option::None();
		} else {
			return Option::Some($value);
		}
	}

	/**
	 * Each value in the array is passed to `resolver` that returns a key to use to group such element.
	 * Groups are appended to the passed map.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param \Closure $resolver
	 * @param IMap $map
	 * 
	 * @return IMap
	 */
	public static function groupByAppend ($arr, $resolver, $map) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:635: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:635: characters 17-27
		$_g1 = $arr->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:635: lines 635-644
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:635: characters 13-27
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:636: characters 4-19
			$v = ($arr->arr[$i] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:637: characters 4-65
			$key = $resolver($v);
			$acc = $map->get($key);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:639: lines 639-643
			if (null === $acc) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:640: characters 5-22
				$map->set($key, \Array_hx::wrap([$v]));
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:642: characters 5-16
				$acc->arr[$acc->length++] = $v;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:646: characters 3-13
		return $map;
	}

	/**
	 * Returns `true` if the array contains at least one element.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * 
	 * @return bool
	 */
	public static function hasElements ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:691: characters 10-43
		if (null !== $array) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:691: characters 27-43
			return $array->length > 0;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:691: characters 10-43
			return false;
		}
	}

	/**
	 * It returns the first element of the array or null if the array is empty. Same as `first`.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * 
	 * @return mixed
	 */
	public static function head ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:697: characters 3-18
		return ($array->arr[0] ?? null);
	}

	/**
	 * `ifEmpty` returns `array` if it is neither `null` or empty, otherwise it returns `alt`
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param mixed[]|\Array_hx $alt
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function ifEmpty ($array, $alt) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:703: characters 10-58
		if ((null !== $array) && (0 !== $array->length)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:703: characters 47-52
			return $array;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:703: characters 55-58
			return $alt;
		}
	}

	/**
	 * Get all the elements from `array` except for the last one.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function initial ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:709: characters 3-42
		return $array->slice(0, $array->length - 1);
	}

	/**
	 * Creates a new array that alternates the values in `array` with `value`.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param mixed $value
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function intersperse ($array, $value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:715: lines 715-718
		return Arrays::reducei($array, function ($acc, $v, $i) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:716: characters 4-18
			$acc->offsetSet($i * 2, $v);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:717: characters 4-14
			return $acc;
		}, Arrays::create($array->length * 2 - 1, $value));
	}

	/**
	 * Lazy version of `intersperse`. It creates a new array that alternates the values in `array` with the result of `f`.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $f
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function interspersef ($array, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:724: lines 724-725
		if ($array->length === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:725: characters 4-13
			return new \Array_hx();
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:726: characters 3-24
		$acc = \Array_hx::wrap([($array->arr[0] ?? null)]);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:727: characters 13-17
		$_g = 1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:727: characters 17-29
		$_g1 = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:727: lines 727-730
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:727: characters 13-29
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:728: characters 4-17
			$x = $f();
			$acc->arr[$acc->length++] = $x;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:729: characters 13-21
			$array1 = ($array->arr[$i] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:729: characters 4-22
			$acc->arr[$acc->length++] = $array1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:731: characters 3-13
		return $acc;
	}

	/**
	 * It returns `true` if the array contains zero elements.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * 
	 * @return bool
	 */
	public static function isEmpty ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:738: characters 10-44
		if (null !== $array) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:738: characters 27-44
			return $array->length === 0;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:738: characters 10-44
			return true;
		}
	}

	/**
	 * It returns the last element of the array or null if the array is empty.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * 
	 * @return mixed
	 */
	public static function last ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:744: characters 3-33
		return ($array->arr[$array->length - 1] ?? null);
	}

	/**
	 * It returns an option of the last element, `None` if the array is empty.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * 
	 * @return Option
	 */
	public static function lastOption ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:750: characters 10-38
		$value = ($array->arr[$array->length - 1] ?? null);
		if (null === $value) {
			return Option::None();
		} else {
			return Option::Some($value);
		}
	}

	/**
	 * Static wrapper for `Array` `map` function.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $callback
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function map ($array, $callback) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:759: characters 3-14
		$r = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:760: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:760: characters 17-29
		$_g1 = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:760: lines 760-761
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:760: characters 13-29
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:761: characters 4-30
			$x = $callback(($array->arr[$i] ?? null));
			$r->arr[$r->length++] = $x;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:762: characters 3-11
		return $r;
	}

	/**
	 * Same as `Array.map` but traverses the array from the last to the first element.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $callback
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function mapRight ($array, $callback) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:782: characters 3-37
		$i = $array->length;
		$result = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:783: lines 783-784
		while (--$i >= 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:784: characters 4-35
			$x = $callback(($array->arr[$i] ?? null));
			$result->arr[$result->length++] = $x;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:785: characters 3-16
		return $result;
	}

	/**
	 * Same as `Array.map` but it adds a second argument to the `callback` function with the current index value.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $callback
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function mapi ($array, $callback) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:772: characters 3-14
		$r = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:773: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:773: characters 17-29
		$_g1 = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:773: lines 773-774
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:773: characters 13-29
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:774: characters 4-33
			$x = $callback(($array->arr[$i] ?? null), $i);
			$r->arr[$r->length++] = $x;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:775: characters 3-11
		return $r;
	}

	/**
	 * Finds the min element of the array given the specified ordering.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param \Closure $ord
	 * 
	 * @return Option
	 */
	public static function maxBy ($arr, $ord) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1320: characters 10-69
		if ($arr->length === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1320: characters 28-32
			return Option::None();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1320: characters 52-59
			$_e = $ord;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1320: characters 35-69
			return Option::Some(Arrays::reduce($arr, function ($a0, $a1) use (&$_e) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1320: characters 52-59
				return Ord_Impl_::max($_e, $a0, $a1);
			}, ($arr->arr[0] ?? null)));
		}
	}

	/**
	 * Finds the min element of the array given the specified ordering.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param \Closure $ord
	 * 
	 * @return Option
	 */
	public static function minBy ($arr, $ord) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1326: characters 10-69
		if ($arr->length === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1326: characters 28-32
			return Option::None();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1326: characters 52-59
			$_e = $ord;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1326: characters 35-69
			return Option::Some(Arrays::reduce($arr, function ($a0, $a1) use (&$_e) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1326: characters 52-59
				return Ord_Impl_::min($_e, $a0, $a1);
			}, ($arr->arr[0] ?? null)));
		}
	}

	/**
	 * The concatenation monoid for arrays.
	 * 
	 * @return object
	 */
	public static function monoid () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:78: lines 78-81
		return new _HxAnon_Arrays1(new \Array_hx(), function ($a, $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:80: characters 45-63
			return $a->concat($b);
		});
	}

	/**
	 * Safely convert to a non-empty list.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * 
	 * @return Option
	 */
	public static function nel ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:905: characters 3-30
		return Nel_Impl_::fromArray($array);
	}

	/**
	 * It works the same as `Array.sort()` but doesn't change the original array and returns a sorted copy it.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $sort
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function order ($array, $sort) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:792: characters 3-24
		$n = (clone $array);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:793: characters 3-15
		\usort($n->arr, $sort);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:794: characters 3-11
		return $n;
	}

	/**
	 * Pads out to len with optional default `def`, ignores if len is less than Array length.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param int $len
	 * @param mixed $def
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function pad ($arr, $len, $def = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1423: characters 3-31
		$len0 = $len - $arr->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1424: characters 3-17
		$arr0 = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1425: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1425: characters 17-21
		$_g1 = $len0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1425: lines 1425-1427
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1425: characters 13-21
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1426: characters 4-18
			$arr0->arr[$arr0->length++] = $def;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1428: characters 3-35
		return $arr->concat($arr0);
	}

	/**
	 * Produces a `Tuple2` containing two `Array`, the left being elements where `f(e) == true`, the rest in the right.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function partition ($arr, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1358: characters 23-41
		$this1 = new _HxAnon_Arrays2(new \Array_hx(), new \Array_hx());
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1358: lines 1358-1364
		return Arrays::reduce($arr, function ($a, $b) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1359: lines 1359-1362
			if ($f($b)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1360: characters 5-17
				$_this = $a->_0;
				$_this->arr[$_this->length++] = $b;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1362: characters 5-17
				$_this = $a->_1;
				$_this->arr[$_this->length++] = $b;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1363: characters 4-12
			return $a;
		}, $this1);
	}

	/**
	 * Produces a `Tuple2` containing two `Arrays`, the difference from partition being that after the predicate
	 * returns true once, the rest of the elements will be in the right hand of the tuple, regardless of
	 * the result of the predicate.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function partitionWhile ($arr, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1373: characters 3-27
		$partitioning = true;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1375: characters 23-41
		$this1 = new _HxAnon_Arrays2(new \Array_hx(), new \Array_hx());
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1375: lines 1375-1386
		return Arrays::reduce($arr, function ($a, $b) use (&$f, &$partitioning) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1376: lines 1376-1384
			if ($partitioning) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1377: lines 1377-1382
				if ($f($b)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1378: characters 6-18
					$_this = $a->_0;
					$_this->arr[$_this->length++] = $b;
				} else {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1380: characters 6-26
					$partitioning = false;
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1381: characters 6-18
					$_this = $a->_1;
					$_this->arr[$_this->length++] = $b;
				}
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1384: characters 5-17
				$_this = $a->_1;
				$_this->arr[$_this->length++] = $b;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1385: characters 4-12
			return $a;
		}, $this1);
	}

	/**
	 * Pulls from `array` all occurrences of all the elements in `toRemove`. Optionally takes
	 * an `equality` function.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param mixed[]|\Array_hx $toRemove
	 * @param \Closure $equality
	 * 
	 * @return void
	 */
	public static function pull ($array, $toRemove, $equality = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:802: characters 19-27
		$_g_current = 0;
		$_g_array = $toRemove;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:802: lines 802-803
		while ($_g_current < $_g_array->length) {
			$element = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:803: characters 4-39
			Arrays::removeAll($array, $element, $equality);
		}
	}

	/**
	 * It pushes `value` onto the array if `condition` is true. Also returns the array for easy method chaining.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param bool $condition
	 * @param mixed $value
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function pushIf ($array, $condition, $value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:809: lines 809-810
		if ($condition) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:810: characters 4-21
			$array->arr[$array->length++] = $value;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:811: characters 3-15
		return $array;
	}

	/**
	 * Given an array of values, it returns an array of indexes permutated applying the function `compare`.
	 * By default `rank` will return continuous values. If you know that your set does not contain duplicates you might want to turn off that feature by setting `incrementDuplicates` to `false`.
	 * ```
	 * var arr = ["C","A","B"];
	 * var indexes = Arrays.rank(arr, Strings.compare);
	 * trace(indexes); // output [2,0,1]
	 * ```
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $compare
	 * @param bool $incrementDuplicates
	 * 
	 * @return int[]|\Array_hx
	 */
	public static function rank ($array, $compare, $incrementDuplicates = true) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:825: lines 825-845
		if ($incrementDuplicates === null) {
			$incrementDuplicates = true;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:826: characters 3-70
		$arr = Arrays::mapi($array, function ($v, $i) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:826: characters 54-68
			$this1 = new _HxAnon_Arrays2($v, $i);
			return $this1;
		});
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:827: characters 3-66
		\usort($arr->arr, function ($a, $b) use (&$compare) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:827: characters 27-65
			return $compare($a->_0, $b->_0);
		});
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:828: lines 828-844
		if ($incrementDuplicates) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:829: characters 4-42
			$usedIndexes = Set_Impl_::createInt();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:830: lines 830-838
			return Arrays::reducei($arr, function ($acc, $x, $i) use (&$arr, &$compare, &$usedIndexes) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:831: characters 5-92
				$index = (($i > 0) && ($compare(($arr->arr[$i - 1] ?? null)->_0, $x->_0) === 0) ? ($acc->arr[($arr->arr[$i - 1] ?? null)->_1] ?? null) : $i);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:832: lines 832-834
				while (\array_key_exists($index, $usedIndexes->data)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:833: characters 6-13
					++$index;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:835: characters 5-27
				Set_Impl_::add($usedIndexes, $index);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:836: characters 5-25
				$acc->offsetSet($x->_1, $index);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:837: characters 5-15
				return $acc;
			}, new \Array_hx());
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:840: lines 840-843
			return Arrays::reducei($arr, function ($acc, $x, $i) use (&$arr, &$compare) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:841: characters 5-94
				$acc->offsetSet($x->_1, (($i > 0) && ($compare(($arr->arr[$i - 1] ?? null)->_0, $x->_0) === 0) ? ($acc->arr[($arr->arr[$i - 1] ?? null)->_1] ?? null) : $i));
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:842: characters 5-15
				return $acc;
			}, new \Array_hx());
		}
	}

	/**
	 * It applies a function against an accumulator and each value of the array (from left-to-right) has to reduce it to a single value.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $f
	 * @param mixed $initial
	 * 
	 * @return mixed
	 */
	public static function reduce ($array, $f, $initial) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:851: characters 13-18
		$_g_current = 0;
		$_g_array = $array;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:851: lines 851-852
		while ($_g_current < $_g_array->length) {
			$v = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:852: characters 4-11
			$initial = $f($initial, $v);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:853: characters 3-17
		return $initial;
	}

	/**
	 * Same as `Arrays.reduce` but starting from the last element and traversing to the first
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $f
	 * @param mixed $initial
	 * 
	 * @return mixed
	 */
	public static function reduceRight ($array, $f, $initial) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:950: characters 3-24
		$i = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:951: lines 951-952
		while (--$i >= 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:952: characters 4-34
			$initial = $f($initial, ($array->arr[$i] ?? null));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:953: characters 3-17
		return $initial;
	}

	/**
	 * It is the same as `reduce` but with the extra integer `index` parameter.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $f
	 * @param mixed $initial
	 * 
	 * @return mixed
	 */
	public static function reducei ($array, $f, $initial) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:941: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:941: characters 17-29
		$_g1 = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:941: lines 941-942
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:941: characters 13-29
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:942: characters 4-37
			$initial = $f($initial, ($array->arr[$i] ?? null), $i);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:943: characters 3-17
		return $initial;
	}

	/**
	 * Remove every occurrance of `element` from `array`. If `equality` is not specified, strict equality
	 * will be adopted.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param mixed $element
	 * @param \Closure $equality
	 * 
	 * @return void
	 */
	public static function removeAll ($array, $element, $equality = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:961: lines 961-962
		if (null === $equality) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:962: characters 4-38
			$equality = Boot::getStaticClosure(Functions::class, 'equality');
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:963: characters 3-24
		$i = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:964: lines 964-966
		while (--$i >= 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:965: lines 965-966
			if ($equality(($array->arr[$i] ?? null), $element)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:966: characters 5-23
				$array->splice($i, 1);
			}
		}
	}

	/**
	 * Resizes an array of `T` to an arbitrary length by adding more elements to its end
	 * or by removing extra elements.
	 * Note that the function changes the passed array and doesn't create a copy.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param int $length
	 * @param mixed $fill
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function resize ($array, $length, $fill) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:920: lines 920-921
		while ($array->length < $length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:921: characters 4-20
			$array->arr[$array->length++] = $fill;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:922: characters 3-46
		$array->splice($length, $array->length - $length);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:923: characters 3-15
		return $array;
	}

	/**
	 * Copies and resizes an array of `T` to an arbitrary length by adding more
	 * elements to its end or by removing extra elements.
	 * Note that the function creates and returns a copy of the passed array.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param int $length
	 * @param mixed $fill
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function resized ($array, $length, $fill) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:933: characters 3-23
		$array = (clone $array);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:934: characters 3-37
		return Arrays::resize($array, $length, $fill);
	}

	/**
	 * Returns all but the first element of the array
	 * 
	 * @param mixed[]|\Array_hx $array
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function rest ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:973: characters 3-24
		return $array->slice(1);
	}

	/**
	 * Creates a copy of the array with its elements in reverse order.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function reversed ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:979: characters 3-29
		$result = (clone $array);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:980: characters 3-19
		$result->arr = \array_reverse($result->arr);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:981: characters 3-16
		return $result;
	}

	/**
	 * Transforms an array like `[[a0,b0],[a1,b1],[a2,b2]]` into
	 * `[[a0,a1,a2],[b0,b1,b2]]`.
	 * 
	 * @param \Array_hx[]|\Array_hx $arr
	 * 
	 * @return \Array_hx[]|\Array_hx
	 */
	public static function rotate ($arr) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1130: characters 3-19
		$result = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1131: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1131: characters 17-30
		$_g1 = ($arr->arr[0] ?? null)->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1131: lines 1131-1137
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1131: characters 13-30
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1132: characters 4-17
			$row = new \Array_hx();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1133: characters 4-20
			$result->arr[$result->length++] = $row;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1134: characters 14-18
			$_g2 = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1134: characters 18-28
			$_g3 = $arr->length;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1134: lines 1134-1136
			while ($_g2 < $_g3) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1134: characters 14-28
				$j = $_g2++;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1135: characters 14-23
				$arr1 = (($arr->arr[$j] ?? null)->arr[$i] ?? null);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1135: characters 5-24
				$row->arr[$row->length++] = $arr1;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1138: characters 3-16
		return $result;
	}

	/**
	 * Returns `n` elements at random from the array. Elements will not be repeated.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param int $n
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function sample ($array, $n) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:988: characters 7-32
		$b = $array->length;
		if ($n >= $b) {
			$n = $b;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:989: characters 3-40
		$copy = (clone $array);
		$result = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:990: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:990: characters 17-18
		$_g1 = $n;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:990: lines 990-991
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:990: characters 13-18
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:991: characters 28-51
			$x = $copy->length;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:991: characters 4-59
			$x1 = ($copy->splice(($x <= 1 ? 0 : \mt_rand(0, $x - 1)), 1)->arr[0] ?? null);
			$result->arr[$result->length++] = $x1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:992: characters 3-16
		return $result;
	}

	/**
	 * Returns one element at random from the array or null if the array is empty.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * 
	 * @return mixed
	 */
	public static function sampleOne ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:999: characters 16-40
		$x = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:999: characters 10-41
		return ($array->arr[($x <= 1 ? 0 : \mt_rand(0, $x - 1))] ?? null);
	}

	/**
	 * It returns a copy of the array with its elements randomly changed in position.
	 * 
	 * @param mixed[]|\Array_hx $a
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function shuffle ($a) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1013: characters 3-44
		$t = Ints::range($a->length);
		$array = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1014: lines 1014-1018
		while ($t->length > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1015: characters 14-34
			$x = $t->length;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1015: characters 4-51
			$pos = ($x <= 1 ? 0 : \mt_rand(0, $x - 1));
			$index = ($t->arr[$pos] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1016: characters 4-20
			$t->splice($pos, 1);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1017: characters 15-23
			$a1 = ($a->arr[$index] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1017: characters 4-24
			$array->arr[$array->length++] = $a1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1019: characters 3-15
		return $array;
	}

	/**
	 * @param mixed[]|\Array_hx $arr
	 * @param \Closure $f
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function sliding2 ($arr, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1142: lines 1142-1150
		if ($arr->length < 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1143: characters 4-13
			return new \Array_hx();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1145: characters 4-20
			$result = new \Array_hx();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1146: characters 14-18
			$_g = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1146: characters 18-34
			$_g1 = $arr->length - 1;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1146: lines 1146-1148
			while ($_g < $_g1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1146: characters 14-34
				$i = $_g++;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1147: characters 5-39
				$x = $f(($arr->arr[$i] ?? null), ($arr->arr[$i + 1] ?? null));
				$result->arr[$result->length++] = $x;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1149: characters 4-17
			return $result;
		}
	}

	/**
	 * @param mixed[]|\Array_hx $arr
	 * @param \Closure $spanKey
	 * 
	 * @return \Array_hx[]|\Array_hx
	 */
	public static function spanByIndex ($arr, $spanKey) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:669: characters 3-32
		$acc = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:670: characters 3-20
		$cur = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:671: characters 3-18
		$j = -1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:672: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:672: characters 17-27
		$_g1 = $arr->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:672: lines 672-683
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:672: characters 13-27
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:673: characters 4-25
			$k = $spanKey($i);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:674: lines 674-675
			if ($k === null) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:675: characters 5-10
				throw Exception::thrown(new Error("spanKey function returned null for index " . ($i??'null'), null, new _HxAnon_Arrays0("thx/Arrays.hx", 675, "thx.Arrays", "spanByIndex")));
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:676: lines 676-682
			if (Boot::equal($cur, $k)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:677: characters 5-24
				$_this = ($acc->arr[$j] ?? null);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:677: characters 17-23
				$arr1 = ($arr->arr[$i] ?? null);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:677: characters 5-24
				$_this->arr[$_this->length++] = $arr1;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:679: characters 5-12
				$cur = $k;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:680: characters 5-8
				++$j;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:681: characters 15-21
				$arr2 = ($arr->arr[$i] ?? null);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:681: characters 5-23
				$acc->arr[$acc->length++] = \Array_hx::wrap([$arr2]);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:684: characters 3-13
		return $acc;
	}

	/**
	 * Splits an array into a specified number of `parts`.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param int $parts
	 * 
	 * @return \Array_hx[]|\Array_hx
	 */
	public static function split ($array, $parts) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1026: characters 3-45
		$len = (int)(\ceil($array->length / $parts));
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1027: characters 3-29
		return Arrays::splitBy($array, $len);
	}

	/**
	 * Splits an array into smaller arrays at most of length equal to `len`.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param int $len
	 * 
	 * @return \Array_hx[]|\Array_hx
	 */
	public static function splitBy ($array, $len) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1034: characters 3-16
		$res = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1035: characters 9-36
		$b = $array->length;
		if ($len >= $b) {
			$len = $b;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1036: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1036: characters 17-46
		$_g1 = (int)(\ceil($array->length / $len));
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1036: lines 1036-1038
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1036: characters 13-46
			$p = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1037: characters 4-49
			$x = $array->slice($p * $len, ($p + 1) * $len);
			$res->arr[$res->length++] = $x;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1039: characters 3-13
		return $res;
	}

	/**
	 * Splits an array by the given number and pads last group with the given element if necessary.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param int $len
	 * @param mixed $pad
	 * 
	 * @return \Array_hx[]|\Array_hx
	 */
	public static function splitByPad ($arr, $len, $pad) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1046: characters 3-38
		$res = Arrays::splitBy($arr, $len);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1047: lines 1047-1048
		while (($res->arr[$res->length - 1] ?? null)->length < $len) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1048: characters 4-30
			$_this = ($res->arr[$res->length - 1] ?? null);
			$_this->arr[$_this->length++] = $pad;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1049: characters 3-13
		return $res;
	}

	/**
	 * Converts an `Array<T>` into a string.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * 
	 * @return string
	 */
	public static function string ($arr) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1005: characters 31-55
		$f = Boot::getStaticClosure(Dynamics::class, 'string');
		$result = [];
		$data = $arr->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = $f($item);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1005: characters 3-56
		$strings = \Array_hx::wrap($result);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1006: characters 3-40
		return "[" . ($strings->join(", ")??'null') . "]";
	}

	/**
	 * It returns the elements of the array after the first.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function tail ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1056: characters 3-24
		return $array->slice(1);
	}

	/**
	 * Returns the first `n` elements from the array.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param int $n
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function take ($arr, $n) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1062: characters 3-25
		return $arr->slice(0, $n);
	}

	/**
	 * Returns the last `n` elements from the array.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param int $n
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function takeLast ($arr, $n) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1068: characters 3-35
		return $arr->slice($arr->length - $n);
	}

	/**
	 * Convert an array of tuples to a map. If there are collisions between keys,
	 * return an error.
	 * 
	 * @param object[]|\Array_hx $arr
	 * @param \Closure $keyOrder
	 * 
	 * @return Either
	 */
	public static function toMap ($arr, $keyOrder) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1333: characters 3-30
		$m = MapImpl::Tip();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1334: characters 3-32
		$collisions = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1335: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1335: characters 17-27
		$_g1 = $arr->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1335: lines 1335-1342
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1335: characters 13-27
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1336: characters 4-23
			$tuple = ($arr->arr[$i] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1337: lines 1337-1341
			if (Options::isNone(Map_Impl_::lookup($m, $tuple->_0, $keyOrder))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1338: characters 5-47
				$m = Map_Impl_::insert($m, $tuple->_0, $tuple->_1, $keyOrder);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1340: characters 5-30
				$collisions->arr[$collisions->length++] = $tuple->_0;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1344: characters 3-57
		return Options::toFailure(Nel_Impl_::fromArray($collisions), $m);
	}

	/**
	 * @param object[]|\Array_hx $arr
	 * 
	 * @return StringMap
	 */
	public static function toStringMap ($arr) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1348: lines 1348-1351
		return Arrays::reduce($arr, function ($acc, $t) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1349: characters 4-23
			$acc->data[$t->_0] = $t->_1;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1350: characters 4-14
			return $acc;
		}, new StringMap());
	}

	/**
	 * Traverse the array with a function that may return values wrapped in Either.
	 * If any result is in Left, the first such value is returned; if all results
	 * are in Right, then the array of those results is returned in Right.
	 * If you want to instead collect errors rather than fail on the first error,
	 * see traverseValidation.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param \Closure $f
	 * 
	 * @return Either
	 */
	public static function traverseEither ($arr, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1092: lines 1092-1097
		return Arrays::reduce($arr, function ($acc, $t) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1093: lines 1093-1096
			return Eithers::ap($f($t), Eithers::map($acc, function ($ux) {
				return function ($u) use (&$ux) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1094: characters 5-15
					$ux->arr[$ux->length++] = $u;
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1095: characters 5-14
					return $ux;
				};
			}));
		}, Either::Right(new \Array_hx()));
	}

	/**
	 * Traverse the array with a function that may return values wrapped in Option.
	 * If any of the values are None, return None, otherwise return the array of mapped
	 * values in a Some.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param \Closure $f
	 * 
	 * @return Option
	 */
	public static function traverseOption ($arr, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1076: lines 1076-1081
		return Arrays::reduce($arr, function ($acc, $t) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1077: lines 1077-1080
			return Options::ap($f($t), Options::map($acc, function ($ux) {
				return function ($u) use (&$ux) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1078: characters 5-15
					$ux->arr[$ux->length++] = $u;
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1079: characters 5-14
					return $ux;
				};
			}));
		}, Option::Some(new \Array_hx()));
	}

	/**
	 * Traverse the array with a function that may return values wrapped in Validation.
	 * If any of the values are Failures, return a Failure that accumulates all errors
	 * from the failed values, otherwise return the array of mapped values in a Success.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param \Closure $f
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function traverseValidation ($arr, $f, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1105: lines 1105-1110
		return Arrays::reduce($arr, function ($acc, $t) use (&$f, &$s) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1106: lines 1106-1109
			return Validation_Impl_::ap($f($t), Validation_Impl_::map($acc, function ($ux) {
				return function ($u) use (&$ux) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1107: characters 5-15
					$ux->arr[$ux->length++] = $u;
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1108: characters 5-14
					return $ux;
				};
			}), $s);
		}, Either::Right(new \Array_hx()));
	}

	/**
	 * Traverse the array with a function that may return values wrapped in Validation.
	 * If any of the values are Failures, return a Failure that accumulates all errors
	 * from the failed values, otherwise return the array of mapped values in a Success.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param \Closure $f
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function traverseValidationIndexed ($arr, $f, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1118: lines 1118-1123
		return Arrays::reducei($arr, function ($acc, $t, $i) use (&$f, &$s) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1119: lines 1119-1122
			return Validation_Impl_::ap($f($t, $i), Validation_Impl_::map($acc, function ($ux) {
				return function ($u) use (&$ux) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1120: characters 5-15
					$ux->arr[$ux->length++] = $u;
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1121: characters 5-14
					return $ux;
				};
			}), $s);
		}, Either::Right(new \Array_hx()));
	}

	/**
	 * Unzip an array of Tuple2<T1, T2> to a Tuple2<Array<T1>, Array<T2>>.
	 * 
	 * @param object[]|\Array_hx $array
	 * 
	 * @return object
	 */
	public static function unzip ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1157: characters 3-24
		$a1 = new \Array_hx();
		$a2 = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1158: lines 1158-1162
		$result = [];
		$data = $array->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1159: characters 4-17
			$a1->arr[$a1->length++] = Boot::dynamicField($item, '_0');
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1160: characters 4-17
			$a2->arr[$a2->length++] = Boot::dynamicField($item, '_1');
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1158: lines 1158-1162
			$result[] = null;
		}
		\Array_hx::wrap($result);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1163: characters 10-28
		$this1 = new _HxAnon_Arrays2($a1, $a2);
		return $this1;
	}

	/**
	 * Unzip an array of Tuple3<T1, T2, T3> to a Tuple3<Array<T1>, Array<T2>, Array<T3>>.
	 * 
	 * @param object[]|\Array_hx $array
	 * 
	 * @return object
	 */
	public static function unzip3 ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1170: characters 3-33
		$a1 = new \Array_hx();
		$a2 = new \Array_hx();
		$a3 = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1171: lines 1171-1176
		$result = [];
		$data = $array->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1172: characters 4-17
			$a1->arr[$a1->length++] = Boot::dynamicField($item, '_0');
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1173: characters 4-17
			$a2->arr[$a2->length++] = Boot::dynamicField($item, '_1');
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1174: characters 4-17
			$a3->arr[$a3->length++] = Boot::dynamicField($item, '_2');
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1171: lines 1171-1176
			$result[] = null;
		}
		\Array_hx::wrap($result);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1177: characters 10-32
		$this1 = new _HxAnon_Arrays3($a1, $a2, $a3);
		return $this1;
	}

	/**
	 * Unzip an array of Tuple4<T1, T2, T3, T4> to a Tuple4<Array<T1>, Array<T2>, Array<T3>, Array<T4>>.
	 * 
	 * @param object[]|\Array_hx $array
	 * 
	 * @return object
	 */
	public static function unzip4 ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1184: characters 3-42
		$a1 = new \Array_hx();
		$a2 = new \Array_hx();
		$a3 = new \Array_hx();
		$a4 = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1185: lines 1185-1191
		$result = [];
		$data = $array->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1186: characters 4-17
			$a1->arr[$a1->length++] = Boot::dynamicField($item, '_0');
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1187: characters 4-17
			$a2->arr[$a2->length++] = Boot::dynamicField($item, '_1');
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1188: characters 4-17
			$a3->arr[$a3->length++] = Boot::dynamicField($item, '_2');
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1189: characters 4-17
			$a4->arr[$a4->length++] = Boot::dynamicField($item, '_3');
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1185: lines 1185-1191
			$result[] = null;
		}
		\Array_hx::wrap($result);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1192: characters 10-36
		$this1 = new _HxAnon_Arrays4($a1, $a2, $a3, $a4);
		return $this1;
	}

	/**
	 * Unzip an array of Tuple5<T1, T2, T3, T4, T5> to a Tuple5<Array<T1>, Array<T2>, Array<T3>, Array<T4>, Array<T5>>.
	 * 
	 * @param object[]|\Array_hx $array
	 * 
	 * @return object
	 */
	public static function unzip5 ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1199: characters 3-51
		$a1 = new \Array_hx();
		$a2 = new \Array_hx();
		$a3 = new \Array_hx();
		$a4 = new \Array_hx();
		$a5 = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1200: lines 1200-1207
		$result = [];
		$data = $array->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1201: characters 4-17
			$a1->arr[$a1->length++] = Boot::dynamicField($item, '_0');
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1202: characters 4-17
			$a2->arr[$a2->length++] = Boot::dynamicField($item, '_1');
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1203: characters 4-17
			$a3->arr[$a3->length++] = Boot::dynamicField($item, '_2');
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1204: characters 4-17
			$a4->arr[$a4->length++] = Boot::dynamicField($item, '_3');
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1205: characters 4-17
			$a5->arr[$a5->length++] = Boot::dynamicField($item, '_4');
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1200: lines 1200-1207
			$result[] = null;
		}
		\Array_hx::wrap($result);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1208: characters 10-40
		$this1 = new _HxAnon_Arrays5($a1, $a2, $a3, $a4, $a5);
		return $this1;
	}

	/**
	 * Returns a copy of the array with the new element added to the end.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param mixed $el
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function with ($arr, $el) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1302: characters 3-26
		return $arr->concat(\Array_hx::wrap([$el]));
	}

	/**
	 * Returns a copy of the array with the new element inserted at position `pos`.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param mixed $el
	 * @param int $pos
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function withInsert ($arr, $el, $pos) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1314: characters 3-63
		return $arr->slice(0, $pos)->concat(\Array_hx::wrap([$el]))->concat($arr->slice($pos));
	}

	/**
	 * Returns a copy of the array with the new element added to the beginning.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param mixed $el
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function withPrepend ($arr, $el) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1296: characters 3-35
		return (\Array_hx::wrap([$el]))->concat($arr);
	}

	/**
	 * Returns a copy of the array with the `other` elements inserted at `start`. The `length` elements after `start` are going to be removed.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * @param mixed[]|\Array_hx $other
	 * @param int $start
	 * @param int $length
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function withSlice ($arr, $other, $start, $length = 0) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1308: characters 3-86
		if ($length === null) {
			$length = 0;
		}
		return $arr->slice(0, $start)->concat($other)->concat($arr->slice($start + $length));
	}

	/**
	 * Pairs the elements of two arrays in an array of `Tuple2`.
	 * 
	 * @param mixed[]|\Array_hx $array1
	 * @param mixed[]|\Array_hx $array2
	 * 
	 * @return object[]|\Array_hx
	 */
	public static function zip ($array1, $array2) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1215: characters 16-54
		$a = $array1->length;
		$b = $array2->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1215: characters 3-67
		$length = ($a < $b ? $a : $b);
		$array = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1216: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1216: characters 17-23
		$_g1 = $length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1216: lines 1216-1217
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1216: characters 13-23
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1217: characters 15-47
			$this1 = new _HxAnon_Arrays2(($array1->arr[$i] ?? null), ($array2->arr[$i] ?? null));
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1217: characters 4-48
			$array->arr[$array->length++] = $this1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1218: characters 3-15
		return $array;
	}

	/**
	 * Zip two arrays by applying the provided function to the aligned members.
	 * 
	 * @param \Closure $f
	 * @param mixed[]|\Array_hx $ax
	 * @param mixed[]|\Array_hx $bx
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function zip2Ap ($f, $ax, $bx) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1271: characters 20-47
		$f1 = Functions2::curry($f);
		$result = [];
		$data = $ax->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = $f1($item);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1271: characters 3-48
		return Arrays::zipAp($bx, \Array_hx::wrap($result));
	}

	/**
	 * Pairs the elements of three arrays in an array of `Tuple3`.
	 * 
	 * @param mixed[]|\Array_hx $array1
	 * @param mixed[]|\Array_hx $array2
	 * @param mixed[]|\Array_hx $array3
	 * 
	 * @return object[]|\Array_hx
	 */
	public static function zip3 ($array1, $array2, $array3) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1225: lines 1225-1226
		$length = ArrayInts::min(\Array_hx::wrap([
			$array1->length,
			$array2->length,
			$array3->length,
		]));
		$array = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1227: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1227: characters 17-23
		$_g1 = $length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1227: lines 1227-1228
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1227: characters 13-23
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1228: characters 15-58
			$this1 = new _HxAnon_Arrays3(($array1->arr[$i] ?? null), ($array2->arr[$i] ?? null), ($array3->arr[$i] ?? null));
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1228: characters 4-59
			$array->arr[$array->length++] = $this1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1229: characters 3-15
		return $array;
	}

	/**
	 * Zip three arrays by applying the provided function to the aligned members.
	 * 
	 * @param \Closure $f
	 * @param mixed[]|\Array_hx $ax
	 * @param mixed[]|\Array_hx $bx
	 * @param mixed[]|\Array_hx $cx
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function zip3Ap ($f, $ax, $bx, $cx) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1277: characters 27-46
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1277: characters 3-56
		return Arrays::zipAp($cx, Arrays::zip2Ap(function ($a, $b) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1277: characters 27-46
			return function ($c) use (&$f1, &$b, &$a) {
				return $f1($a, $b, $c);
			};
		}, $ax, $bx));
	}

	/**
	 * Pairs the elements of four arrays in an array of `Tuple4`.
	 * 
	 * @param mixed[]|\Array_hx $array1
	 * @param mixed[]|\Array_hx $array2
	 * @param mixed[]|\Array_hx $array3
	 * @param mixed[]|\Array_hx $array4
	 * 
	 * @return object[]|\Array_hx
	 */
	public static function zip4 ($array1, $array2, $array3, $array4) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1237: lines 1237-1238
		$length = ArrayInts::min(\Array_hx::wrap([
			$array1->length,
			$array2->length,
			$array3->length,
			$array4->length,
		]));
		$array = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1239: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1239: characters 17-23
		$_g1 = $length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1239: lines 1239-1240
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1239: characters 13-23
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1240: characters 15-69
			$this1 = new _HxAnon_Arrays4(($array1->arr[$i] ?? null), ($array2->arr[$i] ?? null), ($array3->arr[$i] ?? null), ($array4->arr[$i] ?? null));
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1240: characters 4-70
			$array->arr[$array->length++] = $this1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1241: characters 3-15
		return $array;
	}

	/**
	 * Zip four arrays by applying the provided function to the aligned members.
	 * 
	 * @param \Closure $f
	 * @param mixed[]|\Array_hx $ax
	 * @param mixed[]|\Array_hx $bx
	 * @param mixed[]|\Array_hx $cx
	 * @param mixed[]|\Array_hx $dx
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function zip4Ap ($f, $ax, $bx, $cx, $dx) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1283: characters 27-46
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1283: characters 3-60
		return Arrays::zipAp($dx, Arrays::zip3Ap(function ($a, $b, $c) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1283: characters 27-46
			return function ($d) use (&$f1, &$c, &$b, &$a) {
				return $f1($a, $b, $c, $d);
			};
		}, $ax, $bx, $cx));
	}

	/**
	 * Pairs the elements of five arrays in an array of `Tuple5`.
	 * 
	 * @param mixed[]|\Array_hx $array1
	 * @param mixed[]|\Array_hx $array2
	 * @param mixed[]|\Array_hx $array3
	 * @param mixed[]|\Array_hx $array4
	 * @param mixed[]|\Array_hx $array5
	 * 
	 * @return object[]|\Array_hx
	 */
	public static function zip5 ($array1, $array2, $array3, $array4, $array5) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1249: lines 1249-1250
		$length = ArrayInts::min(\Array_hx::wrap([
			$array1->length,
			$array2->length,
			$array3->length,
			$array4->length,
			$array5->length,
		]));
		$array = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1251: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1251: characters 17-23
		$_g1 = $length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1251: lines 1251-1252
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1251: characters 13-23
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1252: characters 15-80
			$this1 = new _HxAnon_Arrays5(($array1->arr[$i] ?? null), ($array2->arr[$i] ?? null), ($array3->arr[$i] ?? null), ($array4->arr[$i] ?? null), ($array5->arr[$i] ?? null));
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1252: characters 4-81
			$array->arr[$array->length++] = $this1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1253: characters 3-15
		return $array;
	}

	/**
	 * Zip five arrays by applying the provided function to the aligned members.
	 * 
	 * @param \Closure $f
	 * @param mixed[]|\Array_hx $ax
	 * @param mixed[]|\Array_hx $bx
	 * @param mixed[]|\Array_hx $cx
	 * @param mixed[]|\Array_hx $dx
	 * @param mixed[]|\Array_hx $ex
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function zip5Ap ($f, $ax, $bx, $cx, $dx, $ex) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1290: characters 27-46
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1290: characters 3-64
		return Arrays::zipAp($ex, Arrays::zip4Ap(function ($a, $b, $c, $d) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1290: characters 27-46
			return function ($e) use (&$f1, &$c, &$b, &$d, &$a) {
				return $f1($a, $b, $c, $d, $e);
			};
		}, $ax, $bx, $cx, $dx));
	}

	/**
	 * The 'zip' applicative functor operation.
	 * 
	 * @param mixed[]|\Array_hx $ax
	 * @param \Closure[]|\Array_hx $fx
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function zipAp ($ax, $fx) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1260: characters 3-19
		$result = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1261: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1261: characters 18-48
		$a = $ax->length;
		$b = $fx->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1261: characters 17-49
		$_g1 = ($a < $b ? $a : $b);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1261: lines 1261-1263
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1261: characters 13-49
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1262: characters 4-29
			$x = ($fx->arr[$i] ?? null)(($ax->arr[$i] ?? null));
			$result->arr[$result->length++] = $x;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Arrays.hx:1264: characters 3-16
		return $result;
	}
}

class _HxAnon_Arrays0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

class _HxAnon_Arrays1 extends HxAnon {
	function __construct($zero, $append) {
		$this->zero = $zero;
		$this->append = $append;
	}
}

class _HxAnon_Arrays2 extends HxAnon {
	function __construct($_0, $_1) {
		$this->_0 = $_0;
		$this->_1 = $_1;
	}
}

class _HxAnon_Arrays3 extends HxAnon {
	function __construct($_0, $_1, $_2) {
		$this->_0 = $_0;
		$this->_1 = $_1;
		$this->_2 = $_2;
	}
}

class _HxAnon_Arrays4 extends HxAnon {
	function __construct($_0, $_1, $_2, $_3) {
		$this->_0 = $_0;
		$this->_1 = $_1;
		$this->_2 = $_2;
		$this->_3 = $_3;
	}
}

class _HxAnon_Arrays5 extends HxAnon {
	function __construct($_0, $_1, $_2, $_3, $_4) {
		$this->_0 = $_0;
		$this->_1 = $_1;
		$this->_2 = $_2;
		$this->_3 = $_3;
		$this->_4 = $_4;
	}
}

Boot::registerClass(Arrays::class, 'thx.Arrays');
