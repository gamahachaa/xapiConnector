<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:87: characters 5-49
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:121: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:121: characters 18-28
		$_g1 = $arr->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:121: lines 121-123
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:121: characters 14-28
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:122: lines 122-123
			if (!$predicate(($arr->arr[$i] ?? null))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:123: characters 9-21
				return false;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:124: characters 5-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:131: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:131: characters 18-28
		$_g1 = $arr->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:131: lines 131-133
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:131: characters 14-28
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:132: lines 132-133
			if ($predicate(($arr->arr[$i] ?? null))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:133: characters 9-20
				return true;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:134: characters 5-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:31: characters 5-24
		$array->arr[$array->length++] = $element;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:32: characters 5-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:40: lines 40-41
		if ($cond) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:41: characters 7-26
			$array->arr[$array->length++] = $element;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:42: characters 5-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:53: lines 53-72
		if ($incrementDuplicates === null) {
			$incrementDuplicates = false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:54: lines 54-55
		if ($indexes->length !== $array->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:55: characters 7-12
			throw Exception::thrown(new Error("`Arrays.applyIndexes` can only be applied to two arrays with the same length", null, new _HxAnon_Arrays0("thx/Arrays.hx", 55, "thx.Arrays", "applyIndexes")));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:56: characters 5-21
		$result = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:57: lines 57-70
		if ($incrementDuplicates) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:58: characters 7-45
			$usedIndexes = Set_Impl_::createInt();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:59: characters 16-20
			$_g = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:59: characters 20-32
			$_g1 = $array->length;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:59: lines 59-65
			while ($_g < $_g1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:59: characters 16-32
				$i = $_g++;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:60: characters 9-32
				$index = ($indexes->arr[$i] ?? null);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:61: lines 61-62
				while (\array_key_exists($index, $usedIndexes->data)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:62: characters 11-18
					++$index;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:63: characters 9-31
				Set_Impl_::add($usedIndexes, $index);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:64: characters 9-33
				$result->offsetSet($index, ($array->arr[$i] ?? null));
			}
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:67: characters 16-20
			$_g = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:67: characters 20-32
			$_g1 = $array->length;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:67: lines 67-69
			while ($_g < $_g1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:67: characters 16-32
				$i = $_g++;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:68: characters 9-38
				$result->offsetSet(($indexes->arr[$i] ?? null), ($array->arr[$i] ?? null));
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:71: characters 5-18
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:141: characters 12-50
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:94: characters 12-68
		if (($i >= 0) && ($i < $array->length)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:94: characters 44-58
			return Option::Some(($array->arr[$i] ?? null));
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:94: characters 64-68
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:147: characters 5-50
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:154: characters 5-52
		if (null === $equality) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:154: characters 26-52
			$equality = Boot::getStaticClosure(Functions::class, 'equality');
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:155: characters 5-19
		$count = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:156: lines 156-160
		$_g = 0;
		$_g1 = Arrays::zip($self, $other);
		while ($_g < $_g1->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:156: characters 9-13
			$pair = ($_g1->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:156: lines 156-160
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:157: lines 157-160
			if ($equality($pair->_0, $pair->_1)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:158: characters 9-16
				++$count;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:160: characters 9-14
				break;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:161: characters 5-32
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:176: characters 12-62
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:188: characters 5-17
		$v = Ints::compare($a->length, $b->length);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:189: lines 189-190
		if ($v !== 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:190: characters 7-15
			return $v;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:191: characters 15-19
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:191: characters 19-27
		$_g1 = $a->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:191: lines 191-194
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:191: characters 15-27
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:192: characters 11-45
			$v = Dynamics::compare(($a->arr[$i] ?? null), ($b->arr[$i] ?? null));
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:192: lines 192-193
			if ($v !== 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:193: characters 9-17
				return $v;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:195: characters 5-13
		return 0;
	}

	/**
	 * Returns `true` if `element` is found in the array.
	 * An optional equality function can be passed as the last argument. If not provided, strict equality is adopted.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param mixed $element
	 * @param \Closure $eq
	 * 
	 * @return bool
	 */
	public static function contains ($array, $element, $eq = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:216: lines 216-223
		if (null === $eq) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:217: characters 7-46
			return ReadonlyArray_Impl_::indexOf($array, $element) >= 0;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:219: characters 16-20
			$_g = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:219: characters 20-32
			$_g1 = $array->length;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:219: lines 219-221
			while ($_g < $_g1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:219: characters 16-32
				$i = $_g++;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:220: lines 220-221
				if ($eq(($array->arr[$i] ?? null), $element)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:221: characters 11-22
					return true;
				}
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:222: characters 7-19
			return false;
		}
	}

	/**
	 * Returns `true` if all elements in `elements` are found in the array.
	 * An optional equality function can be passed as the last argument. If not provided, strict equality is adopted.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param object $elements
	 * @param \Closure $eq
	 * 
	 * @return bool
	 */
	public static function containsAll ($array, $elements, $eq = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:232: characters 16-24
		$el = $elements->iterator();
		while ($el->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:232: lines 232-234
			$el1 = $el->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:233: characters 7-49
			if (!Arrays::contains($array, $el1, $eq)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:233: characters 37-49
				return false;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:235: characters 5-16
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
	public static function containsAny ($array, $elements, $eq = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:244: characters 16-24
		$el = $elements->iterator();
		while ($el->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:244: lines 244-246
			$el1 = $el->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:245: characters 7-47
			if (Arrays::contains($array, $el1, $eq)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:245: characters 36-47
				return true;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:247: characters 5-17
		return false;
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:254: characters 5-90
		$arr = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:255: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:255: characters 18-24
		$_g1 = $length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:255: lines 255-256
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:255: characters 14-24
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:256: characters 7-24
			$arr->offsetSet($i, $fillWith);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:257: characters 5-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:275: characters 5-16
		$r = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:276: characters 16-17
		$_g_current = 0;
		$_g_array = $a;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:276: lines 276-278
		while ($_g_current < $_g_array->length) {
			$va = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:277: characters 18-19
			$_g1_current = 0;
			$_g1_array = $b;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:277: lines 277-278
			while ($_g1_current < $_g1_array->length) {
				$vb = ($_g1_array->arr[$_g1_current++] ?? null);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:278: characters 9-25
				$r->arr[$r->length++] = \Array_hx::wrap([
					$va,
					$vb,
				]);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:279: characters 5-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:291: lines 291-292
		$acopy = (clone $array);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:292: characters 18-31
		if ($acopy->length > 0) {
			$acopy->length--;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:292: characters 18-59
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:291: lines 291-292
		$result1 = \Array_hx::wrap($result);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:293: lines 293-304
		while ($acopy->length > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:294: characters 19-32
			if ($acopy->length > 0) {
				$acopy->length--;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:294: lines 294-295
			$array = \array_shift($acopy->arr);
			$tresult = $result1;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:296: characters 7-13
			$result1 = new \Array_hx();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:297: characters 17-22
			$_g_current = 0;
			$_g_array = $array;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:297: lines 297-303
			while ($_g_current < $_g_array->length) {
				$v = ($_g_array->arr[$_g_current++] ?? null);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:298: lines 298-302
				$_g = 0;
				while ($_g < $tresult->length) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:298: characters 14-16
					$ar = ($tresult->arr[$_g] ?? null);
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:298: lines 298-302
					++$_g;
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:299: characters 11-29
					$t = (clone $ar);
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:300: characters 11-20
					$t->arr[$t->length++] = $v;
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:301: characters 11-25
					$result1->arr[$result1->length++] = $t;
				}
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:305: characters 5-18
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:315: characters 5-21
		$result = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:317: lines 317-318
		if ($array->length <= 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:318: characters 7-29
			return (clone $array);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:320: lines 320-321
		if (null === $predicate) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:321: characters 7-16
			$predicate = Boot::getStaticClosure(Functions::class, 'equality');
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:323: characters 15-20
		$_g_current = 0;
		$_g_array = $array;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:323: lines 323-328
		while ($_g_current < $_g_array->length) {
			unset($v);
			$v = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:324: lines 324-326
			$keep = !Arrays::any($result, function ($r) use (&$predicate, &$v) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:325: characters 4-35
				return $predicate($r, $v);
			});
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:327: characters 7-31
			if ($keep) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:327: characters 17-31
				$result->arr[$result->length++] = $v;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:330: characters 5-18
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1338: characters 12-49
		if ($n >= $a->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1338: characters 31-33
			return new \Array_hx();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1338: characters 39-49
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1344: characters 12-62
		if ($n >= $a->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1344: characters 31-33
			return new \Array_hx();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1344: characters 39-62
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1350: lines 1350-1352
		$r = (new \Array_hx())->concat($a);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1354: characters 15-16
		$_g_current = 0;
		$_g_array = $a;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1354: lines 1354-1356
		while ($_g_current < $_g_array->length) {
			$e = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1355: characters 7-38
			if ($p($e)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1355: characters 17-26
				if ($r->length > 0) {
					$r->length--;
				}
				\array_shift($r->arr);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1355: characters 33-38
				break;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1358: characters 5-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:107: characters 15-19
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:107: characters 19-29
		$_g1 = $arr->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:107: characters 5-45
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:107: characters 15-29
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:107: characters 31-45
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:339: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:339: characters 18-30
		$_g1 = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:339: lines 339-342
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:339: characters 14-30
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:340: characters 16-17
			$_g2 = $i;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:340: characters 20-32
			$_g3 = $array->length;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:340: lines 340-342
			while ($_g2 < $_g3) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:340: characters 16-32
				$j = $_g2++;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:341: lines 341-342
				if (!$callback(($array->arr[$i] ?? null), ($array->arr[$j] ?? null))) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:342: characters 11-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:114: characters 15-19
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:114: characters 19-29
		$_g1 = $arr->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:114: characters 5-48
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:114: characters 15-29
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:114: characters 31-48
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:350: characters 5-68
		if (($a === null) || ($b === null) || ($a->length !== $b->length)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:350: characters 56-68
			return false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:351: characters 5-52
		if (null === $equality) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:351: characters 26-52
			$equality = Boot::getStaticClosure(Functions::class, 'equality');
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:352: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:352: characters 18-26
		$_g1 = $a->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:352: lines 352-354
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:352: characters 14-26
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:353: lines 353-354
			if (!$equality(($a->arr[$i] ?? null), ($b->arr[$i] ?? null))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:354: characters 9-21
				return false;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:355: characters 5-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:365: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:365: characters 18-26
		$_g1 = $a->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:365: lines 365-367
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:365: characters 14-26
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:366: lines 366-367
			if ($predicate(($a->arr[$i] ?? null))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:367: characters 9-33
				return ($a->splice($i, 1)->arr[0] ?? null);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:368: characters 5-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1375: lines 1375-1379
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:467: characters 5-18
		$acc = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:468: characters 19-25
		$_g_current = 0;
		$_g_array = $values;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:468: lines 468-473
		while ($_g_current < $_g_array->length) {
			$value = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:469: characters 14-22
			$_g = $f($value);
			$__hx__switch = ($_g->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:470: characters 19-20
				$v = $_g->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:470: characters 23-34
				$acc->arr[$acc->length++] = $v;
			} else if ($__hx__switch === 1) {
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:474: characters 5-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:375: characters 5-29
		$arr = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:376: characters 14-15
		$_g_current = 0;
		$_g_array = $a;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:376: lines 376-377
		while ($_g_current < $_g_array->length) {
			$v = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:377: characters 7-32
			if (null !== $v) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:377: characters 21-32
				$arr->arr[$arr->length++] = $v;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:378: characters 5-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:385: lines 385-391
		return Arrays::reduce($a, function ($acc, $maybeV) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:386: lines 386-389
			$__hx__switch = ($maybeV->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:387: characters 19-20
				$v = $maybeV->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:387: characters 23-34
				$acc->arr[$acc->length++] = $v;
			} else if ($__hx__switch === 1) {
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:390: characters 7-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:412: characters 20-25
		$_g_current = 0;
		$_g_array = $array;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:412: lines 412-414
		while ($_g_current < $_g_array->length) {
			$element = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:413: lines 413-414
			if ($predicate($element)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:414: characters 9-23
				return $element;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:415: characters 5-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:492: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:492: characters 18-30
		$_g1 = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:492: lines 492-494
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:492: characters 14-30
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:493: lines 493-494
			if ($predicate(($array->arr[$i] ?? null))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:494: characters 9-17
				return $i;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:495: characters 5-14
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:503: lines 503-504
		$len = $array->length;
		$j = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:505: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:505: characters 18-21
		$_g1 = $len;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:505: lines 505-509
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:505: characters 14-21
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:506: characters 7-22
			$j = $len - $i - 1;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:507: lines 507-508
			if ($predicate(($array->arr[$j] ?? null))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:508: characters 9-24
				return ($array->arr[$j] ?? null);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:510: characters 5-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:455: characters 19-25
		$_g_current = 0;
		$_g_array = $values;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:455: lines 455-458
		while ($_g_current < $_g_array->length) {
			$value = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:456: characters 7-26
			$opt = $f($value);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:457: characters 7-36
			if (!Options::isNone($opt)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:457: characters 26-36
				return $opt;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:459: characters 5-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:444: characters 20-25
		$_g_current = 0;
		$_g_array = $array;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:444: lines 444-446
		while ($_g_current < $_g_array->length) {
			$element = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:445: lines 445-446
			if ($predicate($element)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:446: characters 9-29
				return Option::Some($element);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:447: characters 5-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:481: characters 20-27
		$_g_current = 0;
		$_g_array = $options;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:481: lines 481-483
		while ($_g_current < $_g_array->length) {
			$option = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:482: characters 7-42
			if (!Options::isNone($option)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:482: characters 29-42
				return $option;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:484: characters 5-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:422: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:422: characters 18-30
		$_g1 = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:422: lines 422-424
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:422: characters 14-30
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:423: lines 423-424
			if ($predicate(($array->arr[$i] ?? null), $i)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:424: characters 9-24
				return ($array->arr[$i] ?? null);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:425: characters 5-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:432: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:432: characters 18-30
		$_g1 = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:432: lines 432-434
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:432: characters 14-30
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:433: lines 433-434
			if ($predicate(($array->arr[$i] ?? null), $i)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:434: characters 9-30
				return Option::Some(($array->arr[$i] ?? null));
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:435: characters 5-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:517: characters 5-20
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:524: characters 12-37
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:535: characters 20-39
		$result = [];
		$data = $array->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = $callback($item);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:535: characters 5-40
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:550: characters 7-93
		return Arrays::reduce($array, function ($acc, $element) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:550: characters 62-88
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:399: characters 5-18
		$acc = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:400: characters 14-15
		$_g_current = 0;
		$_g_array = $a;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:400: lines 400-403
		while ($_g_current < $_g_array->length) {
			$e = ($_g_array->arr[$_g_current++] ?? null);
			$__hx__switch = ($e->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:402: characters 17-18
				$v = $e->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:402: characters 21-32
				$acc->arr[$acc->length++] = $v;
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:401: characters 18-29
				return Option::None();
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:404: characters 5-21
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:853: characters 5-49
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:815: characters 5-34
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:821: characters 7-36
		$tail = Arrays::dropLeft($array, 1);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:822: characters 7-32
		$head = ($array->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:823: lines 823-827
		if ($head === null) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:824: characters 9-13
			return Option::None();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:826: characters 9-34
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:832: characters 5-41
		$acc = Either::Right($init);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:833: characters 15-20
		$_g_current = 0;
		$_g_array = $array;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:833: lines 833-838
		while ($_g_current < $_g_array->length) {
			$a = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:834: lines 834-837
			$__hx__switch = ($acc->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:835: characters 19-24
				$error = $acc->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:835: characters 27-37
				return $acc;
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:836: characters 20-21
				$b = $acc->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:836: characters 24-27
				$acc = $f($b, $a);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:840: characters 5-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:847: characters 21-33
		$result = [];
		$data = $array->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = $f($item);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:847: characters 43-51
		$_e = $m;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:847: characters 12-52
		return Arrays::reduce(\Array_hx::wrap($result), function ($a0, $a1) use (&$_e) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:847: characters 43-51
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:865: characters 5-56
		return Options::map(Arrays::nel($array), function ($x) use (&$s) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:865: characters 39-55
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:557: characters 5-47
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:264: characters 5-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:101: characters 12-37
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:592: characters 15-19
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:592: characters 19-29
		$_g1 = $arr->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:592: lines 592-602
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:592: characters 15-29
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:593: characters 7-22
			$v = ($arr->arr[$i] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:594: lines 594-595
			$key = $resolver($v);
			$acc = $map->get($key);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:597: lines 597-601
			if (null === $acc) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:598: characters 9-26
				$map->set($key, \Array_hx::wrap([$v]));
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:600: characters 9-20
				$acc->arr[$acc->length++] = $v;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:604: characters 5-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:649: characters 12-45
		if (null !== $array) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:649: characters 29-45
			return $array->length > 0;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:649: characters 12-45
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:655: characters 5-20
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:661: characters 12-60
		if ((null !== $array) && (0 !== $array->length)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:661: characters 49-54
			return $array;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:661: characters 57-60
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:667: characters 5-44
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:673: lines 673-676
		return Arrays::reducei($array, function ($acc, $v, $i) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:674: characters 7-21
			$acc->offsetSet($i * 2, $v);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:675: characters 7-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:682: lines 682-683
		if ($array->length === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:683: characters 7-16
			return new \Array_hx();
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:684: characters 5-26
		$acc = \Array_hx::wrap([($array->arr[0] ?? null)]);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:685: characters 14-18
		$_g = 1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:685: characters 18-30
		$_g1 = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:685: lines 685-688
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:685: characters 14-30
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:686: characters 7-20
			$x = $f();
			$acc->arr[$acc->length++] = $x;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:687: characters 16-24
			$array1 = ($array->arr[$i] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:687: characters 7-25
			$acc->arr[$acc->length++] = $array1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:689: characters 5-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:696: characters 12-46
		if (null !== $array) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:696: characters 29-46
			return $array->length === 0;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:696: characters 12-46
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:702: characters 5-33
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:708: characters 12-40
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:715: characters 5-16
		$r = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:716: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:716: characters 18-30
		$_g1 = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:716: lines 716-717
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:716: characters 14-30
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:717: characters 7-33
			$x = $callback(($array->arr[$i] ?? null));
			$r->arr[$r->length++] = $x;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:718: characters 5-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:736: lines 736-737
		$i = $array->length;
		$result = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:738: lines 738-739
		while (--$i >= 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:739: characters 7-38
			$x = $callback(($array->arr[$i] ?? null));
			$result->arr[$result->length++] = $x;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:740: characters 5-18
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:726: characters 5-16
		$r = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:727: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:727: characters 18-30
		$_g1 = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:727: lines 727-728
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:727: characters 14-30
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:728: characters 7-36
			$x = $callback(($array->arr[$i] ?? null), $i);
			$r->arr[$r->length++] = $x;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:729: characters 5-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1263: characters 12-71
		if ($arr->length === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1263: characters 30-34
			return Option::None();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1263: characters 54-61
			$_e = $ord;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1263: characters 37-71
			return Option::Some(Arrays::reduce($arr, function ($a0, $a1) use (&$_e) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1263: characters 54-61
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1269: characters 12-71
		if ($arr->length === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1269: characters 30-34
			return Option::None();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1269: characters 54-61
			$_e = $ord;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1269: characters 37-71
			return Option::Some(Arrays::reduce($arr, function ($a0, $a1) use (&$_e) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1269: characters 54-61
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:78: lines 78-81
		return new _HxAnon_Arrays1(new \Array_hx(), function ($a, $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:80: characters 50-68
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:859: characters 5-32
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:747: characters 5-26
		$n = (clone $array);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:748: characters 5-17
		\usort($n->arr, $sort);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:749: characters 5-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1364: characters 5-33
		$len0 = $len - $arr->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1365: characters 5-19
		$arr0 = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1366: characters 15-19
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1366: characters 19-23
		$_g1 = $len0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1366: lines 1366-1368
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1366: characters 15-23
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1367: characters 7-21
			$arr0->arr[$arr0->length++] = $def;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1369: characters 5-37
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1304: characters 25-43
		$this1 = new _HxAnon_Arrays2(new \Array_hx(), new \Array_hx());
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1304: lines 1304-1310
		return Arrays::reduce($arr, function ($a, $b) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1305: lines 1305-1308
			if ($f($b)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1306: characters 9-21
				$_this = $a->_0;
				$_this->arr[$_this->length++] = $b;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1308: characters 9-21
				$_this = $a->_1;
				$_this->arr[$_this->length++] = $b;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1309: characters 7-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1318: characters 5-29
		$partitioning = true;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1320: characters 25-43
		$this1 = new _HxAnon_Arrays2(new \Array_hx(), new \Array_hx());
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1320: lines 1320-1332
		return Arrays::reduce($arr, function ($a, $b) use (&$f, &$partitioning) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1321: lines 1321-1330
			if ($partitioning) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1322: lines 1322-1327
				if ($f($b)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1323: characters 11-23
					$_this = $a->_0;
					$_this->arr[$_this->length++] = $b;
				} else {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1325: characters 11-31
					$partitioning = false;
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1326: characters 11-23
					$_this = $a->_1;
					$_this->arr[$_this->length++] = $b;
				}
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1330: characters 9-21
				$_this = $a->_1;
				$_this->arr[$_this->length++] = $b;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1331: characters 7-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:757: characters 20-28
		$_g_current = 0;
		$_g_array = $toRemove;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:757: lines 757-758
		while ($_g_current < $_g_array->length) {
			$element = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:758: characters 7-42
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:764: lines 764-765
		if ($condition) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:765: characters 7-24
			$array->arr[$array->length++] = $value;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:766: characters 5-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:780: lines 780-800
		if ($incrementDuplicates === null) {
			$incrementDuplicates = true;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:781: characters 5-72
		$arr = Arrays::mapi($array, function ($v, $i) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:781: characters 56-70
			$this1 = new _HxAnon_Arrays2($v, $i);
			return $this1;
		});
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:782: characters 5-68
		\usort($arr->arr, function ($a, $b) use (&$compare) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:782: characters 29-67
			return $compare($a->_0, $b->_0);
		});
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:783: lines 783-799
		if ($incrementDuplicates) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:784: characters 7-45
			$usedIndexes = Set_Impl_::createInt();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:785: lines 785-793
			return Arrays::reducei($arr, function ($acc, $x, $i) use (&$arr, &$compare, &$usedIndexes) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:786: characters 9-92
				$index = (($i > 0) && ($compare(($arr->arr[$i - 1] ?? null)->_0, $x->_0) === 0) ? ($acc->arr[($arr->arr[$i - 1] ?? null)->_1] ?? null) : $i);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:787: lines 787-789
				while (\array_key_exists($index, $usedIndexes->data)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:788: characters 11-18
					++$index;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:790: characters 9-31
				Set_Impl_::add($usedIndexes, $index);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:791: characters 9-29
				$acc->offsetSet($x->_1, $index);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:792: characters 9-19
				return $acc;
			}, new \Array_hx());
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:795: lines 795-798
			return Arrays::reducei($arr, function ($acc, $x, $i) use (&$arr, &$compare) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:796: characters 9-94
				$acc->offsetSet($x->_1, (($i > 0) && ($compare(($arr->arr[$i - 1] ?? null)->_0, $x->_0) === 0) ? ($acc->arr[($arr->arr[$i - 1] ?? null)->_1] ?? null) : $i));
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:797: characters 9-19
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:806: characters 14-19
		$_g_current = 0;
		$_g_array = $array;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:806: lines 806-807
		while ($_g_current < $_g_array->length) {
			$v = ($_g_array->arr[$_g_current++] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:807: characters 7-14
			$initial = $f($initial, $v);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:808: characters 5-19
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:904: characters 5-26
		$i = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:905: lines 905-906
		while (--$i >= 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:906: characters 7-37
			$initial = $f($initial, ($array->arr[$i] ?? null));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:907: characters 5-19
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:895: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:895: characters 18-30
		$_g1 = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:895: lines 895-896
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:895: characters 14-30
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:896: characters 7-40
			$initial = $f($initial, ($array->arr[$i] ?? null), $i);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:897: characters 5-19
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:915: lines 915-916
		if (null === $equality) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:916: characters 7-41
			$equality = Boot::getStaticClosure(Functions::class, 'equality');
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:917: characters 5-26
		$i = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:918: lines 918-920
		while (--$i >= 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:919: lines 919-920
			if ($equality(($array->arr[$i] ?? null), $element)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:920: characters 9-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:874: lines 874-875
		while ($array->length < $length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:875: characters 7-23
			$array->arr[$array->length++] = $fill;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:876: characters 5-48
		$array->splice($length, $array->length - $length);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:877: characters 5-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:887: characters 3-23
		$array = (clone $array);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:888: characters 3-37
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:927: characters 5-26
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:933: characters 5-31
		$result = (clone $array);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:934: characters 5-21
		$result->arr = \array_reverse($result->arr);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:935: characters 5-18
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1075: characters 5-21
		$result = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1076: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1076: characters 18-31
		$_g1 = ($arr->arr[0] ?? null)->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1076: lines 1076-1082
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1076: characters 14-31
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1077: characters 7-20
			$row = new \Array_hx();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1078: characters 7-23
			$result->arr[$result->length++] = $row;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1079: characters 16-20
			$_g2 = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1079: characters 20-30
			$_g3 = $arr->length;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1079: lines 1079-1081
			while ($_g2 < $_g3) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1079: characters 16-30
				$j = $_g2++;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1080: characters 18-27
				$arr1 = (($arr->arr[$j] ?? null)->arr[$i] ?? null);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1080: characters 9-28
				$row->arr[$row->length++] = $arr1;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1083: characters 5-18
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:943: characters 9-34
		$b = $array->length;
		if ($n >= $b) {
			$n = $b;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:944: lines 944-945
		$copy = (clone $array);
		$result = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:946: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:946: characters 18-19
		$_g1 = $n;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:946: lines 946-947
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:946: characters 14-19
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:947: characters 31-54
			$x = $copy->length;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:947: characters 7-62
			$x1 = ($copy->splice(($x <= 1 ? 0 : \mt_rand(0, $x - 1)), 1)->arr[0] ?? null);
			$result->arr[$result->length++] = $x1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:948: characters 5-18
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:955: characters 18-42
		$x = $array->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:955: characters 12-43
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:969: lines 969-970
		$t = Ints::range($a->length);
		$array = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:971: lines 971-976
		while ($t->length > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:972: characters 17-37
			$x = $t->length;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:972: lines 972-973
			$pos = ($x <= 1 ? 0 : \mt_rand(0, $x - 1));
			$index = ($t->arr[$pos] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:974: characters 7-23
			$t->splice($pos, 1);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:975: characters 18-26
			$a1 = ($a->arr[$index] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:975: characters 7-27
			$array->arr[$array->length++] = $a1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:977: characters 5-17
		return $array;
	}

	/**
	 * @param mixed[]|\Array_hx $arr
	 * @param \Closure $f
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function sliding2 ($arr, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1087: lines 1087-1095
		if ($arr->length < 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1088: characters 7-16
			return new \Array_hx();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1090: characters 7-23
			$result = new \Array_hx();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1091: characters 17-21
			$_g = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1091: characters 21-37
			$_g1 = $arr->length - 1;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1091: lines 1091-1093
			while ($_g < $_g1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1091: characters 17-37
				$i = $_g++;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1092: characters 9-43
				$x = $f(($arr->arr[$i] ?? null), ($arr->arr[$i + 1] ?? null));
				$result->arr[$result->length++] = $x;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1094: characters 7-20
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:628: characters 5-35
		$acc = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:629: characters 5-23
		$cur = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:630: characters 5-21
		$j = -1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:631: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:631: characters 18-28
		$_g1 = $arr->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:631: lines 631-641
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:631: characters 14-28
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:632: characters 7-29
			$k = $spanKey($i);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:633: characters 7-27
			if ($k === null) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:633: characters 22-27
				throw Exception::thrown(new Error("spanKey function returned null for index " . ($i??'null'), null, new _HxAnon_Arrays0("thx/Arrays.hx", 633, "thx.Arrays", "spanByIndex")));
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:634: lines 634-640
			if (Boot::equal($cur, $k)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:635: characters 9-28
				$_this = ($acc->arr[$j] ?? null);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:635: characters 21-27
				$arr1 = ($arr->arr[$i] ?? null);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:635: characters 9-28
				$_this->arr[$_this->length++] = $arr1;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:637: characters 9-16
				$cur = $k;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:638: characters 9-12
				++$j;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:639: characters 19-25
				$arr2 = ($arr->arr[$i] ?? null);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:639: characters 9-27
				$acc->arr[$acc->length++] = \Array_hx::wrap([$arr2]);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:642: characters 5-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:984: characters 5-47
		$len = (int)(\ceil($array->length / $parts));
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:985: characters 5-31
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:992: characters 5-18
		$res = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:993: characters 11-38
		$b = $array->length;
		if ($len >= $b) {
			$len = $b;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:994: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:994: characters 18-47
		$_g1 = (int)(\ceil($array->length / $len));
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:994: lines 994-996
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:994: characters 14-47
			$p = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:995: characters 7-50
			$x = $array->slice($p * $len, ($p + 1) * $len);
			$res->arr[$res->length++] = $x;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:997: characters 5-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1004: characters 5-40
		$res = Arrays::splitBy($arr, $len);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1005: lines 1005-1006
		while (($res->arr[$res->length - 1] ?? null)->length < $len) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1006: characters 7-33
			$_this = ($res->arr[$res->length - 1] ?? null);
			$_this->arr[$_this->length++] = $pad;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1007: characters 5-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:961: characters 35-59
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:961: characters 5-60
		$strings = \Array_hx::wrap($result);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:962: characters 5-42
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1014: characters 3-24
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1020: characters 5-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1025: characters 5-37
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1276: characters 5-32
		$m = MapImpl::Tip();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1277: characters 5-35
		$collisions = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1278: characters 15-19
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1278: characters 19-29
		$_g1 = $arr->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1278: lines 1278-1285
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1278: characters 15-29
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1279: characters 7-26
			$tuple = ($arr->arr[$i] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1280: lines 1280-1284
			if (Options::isNone(Map_Impl_::lookup($m, $tuple->_0, $keyOrder))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1281: characters 9-51
				$m = Map_Impl_::insert($m, $tuple->_0, $tuple->_1, $keyOrder);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1283: characters 9-34
				$collisions->arr[$collisions->length++] = $tuple->_0;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1287: characters 5-59
		return Options::toFailure(Nel_Impl_::fromArray($collisions), $m);
	}

	/**
	 * @param object[]|\Array_hx $arr
	 * 
	 * @return StringMap
	 */
	public static function toStringMap ($arr) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1291: lines 1291-1298
		return Arrays::reduce($arr, function ($acc, $t) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1294: characters 9-28
			$acc->data[$t->_0] = $t->_1;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1295: characters 9-19
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1046: lines 1046-1048
		return Arrays::reduce($arr, function ($acc, $t) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1047: characters 7-103
			return Eithers::ap($f($t), Eithers::map($acc, function ($ux) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1047: characters 53-101
				return function ($u) use (&$ux) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1047: characters 77-87
					$ux->arr[$ux->length++] = $u;
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1047: characters 89-98
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1033: lines 1033-1035
		return Arrays::reduce($arr, function ($acc, $t) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1034: characters 7-103
			return Options::ap($f($t), Options::map($acc, function ($ux) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1034: characters 53-101
				return function ($u) use (&$ux) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1034: characters 77-87
					$ux->arr[$ux->length++] = $u;
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1034: characters 89-98
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1056: lines 1056-1058
		return Arrays::reduce($arr, function ($acc, $t) use (&$f, &$s) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1057: characters 7-93
			return Validation_Impl_::ap($f($t), Validation_Impl_::map($acc, function ($ux) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1057: characters 43-88
				return function ($u) use (&$ux) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1057: characters 64-74
					$ux->arr[$ux->length++] = $u;
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1057: characters 76-85
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1066: lines 1066-1068
		return Arrays::reducei($arr, function ($acc, $t, $i) use (&$f, &$s) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1067: characters 7-96
			return Validation_Impl_::ap($f($t, $i), Validation_Impl_::map($acc, function ($ux) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1067: characters 46-91
				return function ($u) use (&$ux) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1067: characters 67-77
					$ux->arr[$ux->length++] = $u;
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1067: characters 79-88
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1102: characters 5-26
		$a1 = new \Array_hx();
		$a2 = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1103: lines 1103-1107
		$result = [];
		$data = $array->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1104: characters 7-20
			$a1->arr[$a1->length++] = Boot::dynamicField($item, '_0');
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1105: characters 7-20
			$a2->arr[$a2->length++] = Boot::dynamicField($item, '_1');
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1103: lines 1103-1107
			$result[] = null;
		}
		\Array_hx::wrap($result);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1108: characters 12-30
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1115: characters 5-35
		$a1 = new \Array_hx();
		$a2 = new \Array_hx();
		$a3 = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1116: lines 1116-1121
		$result = [];
		$data = $array->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1117: characters 7-20
			$a1->arr[$a1->length++] = Boot::dynamicField($item, '_0');
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1118: characters 7-20
			$a2->arr[$a2->length++] = Boot::dynamicField($item, '_1');
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1119: characters 7-20
			$a3->arr[$a3->length++] = Boot::dynamicField($item, '_2');
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1116: lines 1116-1121
			$result[] = null;
		}
		\Array_hx::wrap($result);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1122: characters 12-34
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1129: characters 5-44
		$a1 = new \Array_hx();
		$a2 = new \Array_hx();
		$a3 = new \Array_hx();
		$a4 = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1130: lines 1130-1136
		$result = [];
		$data = $array->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1131: characters 7-20
			$a1->arr[$a1->length++] = Boot::dynamicField($item, '_0');
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1132: characters 7-20
			$a2->arr[$a2->length++] = Boot::dynamicField($item, '_1');
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1133: characters 7-20
			$a3->arr[$a3->length++] = Boot::dynamicField($item, '_2');
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1134: characters 7-20
			$a4->arr[$a4->length++] = Boot::dynamicField($item, '_3');
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1130: lines 1130-1136
			$result[] = null;
		}
		\Array_hx::wrap($result);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1137: characters 12-38
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1144: characters 5-53
		$a1 = new \Array_hx();
		$a2 = new \Array_hx();
		$a3 = new \Array_hx();
		$a4 = new \Array_hx();
		$a5 = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1145: lines 1145-1152
		$result = [];
		$data = $array->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1146: characters 7-20
			$a1->arr[$a1->length++] = Boot::dynamicField($item, '_0');
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1147: characters 7-20
			$a2->arr[$a2->length++] = Boot::dynamicField($item, '_1');
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1148: characters 7-20
			$a3->arr[$a3->length++] = Boot::dynamicField($item, '_2');
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1149: characters 7-20
			$a4->arr[$a4->length++] = Boot::dynamicField($item, '_3');
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1150: characters 7-20
			$a5->arr[$a5->length++] = Boot::dynamicField($item, '_4');
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1145: lines 1145-1152
			$result[] = null;
		}
		\Array_hx::wrap($result);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1153: characters 12-42
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1245: characters 5-28
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1257: characters 5-65
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1239: characters 5-37
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1251: characters 5-88
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1160: characters 18-56
		$a = $array1->length;
		$b = $array2->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1160: lines 1160-1161
		$length = ($a < $b ? $a : $b);
		$array = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1162: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1162: characters 18-24
		$_g1 = $length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1162: lines 1162-1163
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1162: characters 14-24
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1163: characters 18-50
			$this1 = new _HxAnon_Arrays2(($array1->arr[$i] ?? null), ($array2->arr[$i] ?? null));
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1163: characters 7-51
			$array->arr[$array->length++] = $this1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1164: characters 5-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1215: characters 22-49
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1215: characters 5-50
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1171: lines 1171-1172
		$length = ArrayInts::min(\Array_hx::wrap([
			$array1->length,
			$array2->length,
			$array3->length,
		]));
		$array = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1173: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1173: characters 18-24
		$_g1 = $length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1173: lines 1173-1174
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1173: characters 14-24
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1174: characters 18-61
			$this1 = new _HxAnon_Arrays3(($array1->arr[$i] ?? null), ($array2->arr[$i] ?? null), ($array3->arr[$i] ?? null));
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1174: characters 7-62
			$array->arr[$array->length++] = $this1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1175: characters 5-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1221: characters 29-48
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1221: characters 5-58
		return Arrays::zipAp($cx, Arrays::zip2Ap(function ($a, $b) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1221: characters 29-48
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1182: lines 1182-1183
		$length = ArrayInts::min(\Array_hx::wrap([
			$array1->length,
			$array2->length,
			$array3->length,
			$array4->length,
		]));
		$array = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1184: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1184: characters 18-24
		$_g1 = $length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1184: lines 1184-1185
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1184: characters 14-24
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1185: characters 18-72
			$this1 = new _HxAnon_Arrays4(($array1->arr[$i] ?? null), ($array2->arr[$i] ?? null), ($array3->arr[$i] ?? null), ($array4->arr[$i] ?? null));
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1185: characters 7-73
			$array->arr[$array->length++] = $this1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1186: characters 5-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1227: characters 29-48
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1227: characters 5-62
		return Arrays::zipAp($dx, Arrays::zip3Ap(function ($a, $b, $c) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1227: characters 29-48
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1193: lines 1193-1194
		$length = ArrayInts::min(\Array_hx::wrap([
			$array1->length,
			$array2->length,
			$array3->length,
			$array4->length,
			$array5->length,
		]));
		$array = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1195: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1195: characters 18-24
		$_g1 = $length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1195: lines 1195-1196
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1195: characters 14-24
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1196: characters 18-83
			$this1 = new _HxAnon_Arrays5(($array1->arr[$i] ?? null), ($array2->arr[$i] ?? null), ($array3->arr[$i] ?? null), ($array4->arr[$i] ?? null), ($array5->arr[$i] ?? null));
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1196: characters 7-84
			$array->arr[$array->length++] = $this1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1197: characters 5-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1233: characters 29-48
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1233: characters 5-66
		return Arrays::zipAp($ex, Arrays::zip4Ap(function ($a, $b, $c, $d) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1233: characters 29-48
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1204: characters 5-21
		$result = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1205: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1205: characters 19-49
		$a = $ax->length;
		$b = $fx->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1205: characters 18-50
		$_g1 = ($a < $b ? $a : $b);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1205: lines 1205-1207
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1205: characters 14-50
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1206: characters 7-32
			$x = ($fx->arr[$i] ?? null)(($ax->arr[$i] ?? null));
			$result->arr[$result->length++] = $x;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Arrays.hx:1208: characters 5-18
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
