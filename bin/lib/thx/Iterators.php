<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx
 */

namespace thx;

use \php\_Boot\HxAnon;
use \haxe\ds\Option;
use \php\Boot;
use \php\_Boot\HxClosure;
use \thx\_Monoid\Monoid_Impl_;

/**
 * Helper class to work with `Iterator`.
 * For documentation of specific methods refer to the equivalent methods in `thx.Arrays`;
 */
class Iterators {
	/**
	 * Checks if `predicate` returns true for all elements in the iterator.
	 * 
	 * @param object $it
	 * @param \Closure $predicate
	 * 
	 * @return bool
	 */
	public static function all ($it, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:20: characters 20-22
		$element = $it;
		while ($element->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:20: lines 20-22
			$element1 = $element->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:21: lines 21-22
			if (!$predicate($element1)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:22: characters 9-21
				return false;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:23: characters 5-16
		return true;
	}

	/**
	 * Checks if `predicate` returns true for at least one element in the iterator.
	 * 
	 * @param object $it
	 * @param \Closure $predicate
	 * 
	 * @return bool
	 */
	public static function any ($it, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:30: characters 20-22
		$element = $it;
		while ($element->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:30: lines 30-32
			$element1 = $element->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:31: lines 31-32
			if ($predicate($element1)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:32: characters 9-20
				return true;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:33: characters 5-17
		return false;
	}

	/**
	 * Drop values until the first time `fn` produces false.
	 * 
	 * @param object $it
	 * @param \Closure $f
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function dropUntil ($it, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:262: characters 5-23
		$done = false;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:263: characters 5-20
		$out = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:264: characters 14-16
		$v = $it;
		while ($v->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:264: lines 264-273
			$v1 = $v->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:265: lines 265-272
			if (!$done) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:266: lines 266-269
				if (!$f($v1)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:267: characters 11-22
					$done = true;
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:268: characters 11-22
					$out->arr[$out->length++] = $v1;
				}
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:271: characters 9-20
				$out->arr[$out->length++] = $v1;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:274: characters 5-15
		return $out;
	}

	/**
	 * Refer to `thx.Arrays.eachPair`.
	 * 
	 * @param object $it
	 * @param \Closure $handler
	 * 
	 * @return void
	 */
	public static function eachPair ($it, $handler) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:81: characters 5-42
		Arrays::eachPair(Iterators::toArray($it), $handler);
	}

	/**
	 * It compares the lengths and elements of two given iterators and returns `true` if they match.
	 * An optional equality function can be passed as the last argument. If not provided, strict equality is adopted.
	 * 
	 * @param object $a
	 * @param object $b
	 * @param \Closure $equality
	 * 
	 * @return bool
	 */
	public static function equals ($a, $b, $equality = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:42: characters 5-47
		if (null === $equality) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:42: characters 26-47
			$equality = Boot::getStaticClosure(Functions::class, 'equality');
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:43: characters 5-24
		$ae = null;
		$be = null;
		$an = null;
		$bn = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:44: lines 44-53
		while (true) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:45: characters 7-23
			$an = $a->hasNext();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:46: characters 7-23
			$bn = $b->hasNext();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:47: lines 47-48
			if (!$an && !$bn) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:48: characters 9-20
				return true;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:49: lines 49-50
			if (!$an || !$bn) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:50: characters 9-21
				return false;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:51: lines 51-52
			if (!$equality($a->next(), $b->next())) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:52: characters 9-21
				return false;
			}
		}
	}

	/**
	 * Refer to `Array.filter`.
	 * 
	 * @param object $it
	 * @param \Closure $predicate
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function filter ($it, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:87: lines 87-91
		return Iterators::reduce($it, function ($acc, $element) use (&$predicate) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:88: lines 88-89
			if ($predicate($element)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:89: characters 11-28
				$acc->arr[$acc->length++] = $element;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:90: characters 9-19
			return $acc;
		}, new \Array_hx());
	}

	/**
	 * Refer to `thx.Arrays.find`.
	 * 
	 * @param object $it
	 * @param \Closure $f
	 * 
	 * @return mixed
	 */
	public static function find ($it, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:97: characters 20-22
		$element = $it;
		while ($element->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:97: lines 97-99
			$element1 = $element->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:98: lines 98-99
			if ($f($element1)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:99: characters 9-23
				return $element1;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:100: characters 5-16
		return null;
	}

	/**
	 * Refer to `thx.Arrays.findOption`.
	 * 
	 * @param object $it
	 * @param \Closure $f
	 * 
	 * @return Option
	 */
	public static function findOption ($it, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:107: characters 12-40
		$value = Iterators::find($it, $f);
		if (null === $value) {
			return Option::None();
		} else {
			return Option::Some($value);
		}
	}

	/**
	 * Refer to `thx.Arrays.first`.
	 * 
	 * @param object $it
	 * 
	 * @return mixed
	 */
	public static function first ($it) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:113: characters 12-43
		if ($it->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:113: characters 27-36
			return $it->next();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:113: characters 39-43
			return null;
		}
	}

	/**
	 * Produce a new Iterator that lazily applies the provided function to
	 * each element of this iterator.
	 * 
	 * @param object $it
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function fmap ($it, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:186: characters 5-34
		return new MapIterator($it, $f);
	}

	/**
	 * Produce a new Iterator that lazily applies the provided function to
	 * each element of this iterator and an index value that increases with
	 * each application.
	 * 
	 * @param object $it
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function fmapi ($it, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:205: characters 5-35
		return new MapIIterator($it, $f);
	}

	/**
	 * @param object $it
	 * @param mixed $zero
	 * @param \Closure $f
	 * 
	 * @return mixed
	 */
	public static function foldLeft ($it, $zero, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:236: characters 5-31
		return Iterators::reduce($it, $f, $zero);
	}

	/**
	 * Fold by mapping the contained values into some monoidal type and reducing with that monoid.
	 * 
	 * @param object $it
	 * @param \Closure $f
	 * @param object $m
	 * 
	 * @return mixed
	 */
	public static function foldMap ($it, $f, $m) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:242: characters 42-50
		$_e = $m;
		$tmp = function ($a0, $a1) use (&$_e) {
			return Monoid_Impl_::append($_e, $a0, $a1);
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:242: characters 5-51
		return Iterators::foldLeft(Iterators::fmap($it, $f), Monoid_Impl_::get_zero($m), $tmp);
	}

	/**
	 * Effectful traversal. Use this instead of .map if producing side-effects.
	 * This method consumes the original iterator.
	 * 
	 * @param object $it
	 * @param \Closure $proc
	 * 
	 * @return void
	 */
	public static function forEach ($it, $proc) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:166: lines 166-168
		while ($it->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:167: characters 7-22
			$proc($it->next());
		}
	}

	/**
	 * Get the element at the `index` position.
	 * 
	 * @param object $it
	 * @param int $index
	 * 
	 * @return mixed
	 */
	public static function get ($it, $index) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:63: characters 5-17
		$pos = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:64: characters 14-16
		$i = $it;
		while ($i->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:64: lines 64-67
			$i1 = $i->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:65: lines 65-66
			if ($pos++ === $index) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:66: characters 9-17
				return $i1;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:68: characters 5-16
		return null;
	}

	/**
	 * Refer to `thx.Arrays.getOption`
	 * 
	 * @param object $it
	 * @param int $index
	 * 
	 * @return Option
	 */
	public static function getOption ($it, $index) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:75: characters 12-43
		$value = Iterators::get($it, $index);
		if (null === $value) {
			return Option::None();
		} else {
			return Option::Some($value);
		}
	}

	/**
	 * Returns `true` if the iterator contains at least one element.
	 * 
	 * @param object $it
	 * 
	 * @return bool
	 */
	public static function hasElements ($it) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:119: characters 5-24
		return $it->hasNext();
	}

	/**
	 * Returns the position of element in the iterator. It returns -1 if not found.
	 * 
	 * @param object $it
	 * @param mixed $element
	 * 
	 * @return int
	 */
	public static function indexOf ($it, $element) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:125: characters 5-17
		$pos = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:126: characters 14-16
		$v = $it;
		while ($v->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:126: lines 126-130
			$v1 = $v->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:127: lines 127-128
			if (Boot::equal($element, $v1)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:128: characters 9-19
				return $pos;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:129: characters 7-12
			++$pos;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:131: characters 5-14
		return -1;
	}

	/**
	 * Refer to `thx.Arrays.isEmpty`.
	 * 
	 * @param object $it
	 * 
	 * @return bool
	 */
	public static function isEmpty ($it) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:138: characters 5-25
		return !$it->hasNext();
	}

	/**
	 * `isIterator` checks that the passed argument has all the requirements to be an `Iterator`.
	 * Note that no type checking is performed at runtime, the method only checks that the value
	 * has two fields `next` and `hasNext` and that they are both functions.
	 * 
	 * @param mixed $v
	 * 
	 * @return bool
	 */
	public static function isIterator ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:147: characters 5-108
		$fields = (\Reflect::isObject($v) && (null === \Type::getClass($v)) ? \Reflect::fields($v) : \Type::getInstanceFields(\Type::getClass($v)));
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:148: characters 5-83
		if (!\Lambda::has($fields, "next") || !\Lambda::has($fields, "hasNext")) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:148: characters 71-83
			return false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:149: characters 12-56
		$f = \Reflect::field($v, "next");
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:149: characters 12-107
		if (($f instanceof \Closure) || ($f instanceof HxClosure)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:149: characters 60-107
			$f = \Reflect::field($v, "hasNext");
			if (!($f instanceof \Closure)) {
				return ($f instanceof HxClosure);
			} else {
				return true;
			}
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:149: characters 12-107
			return false;
		}
	}

	/**
	 * Refer to `thx.Arrays.last`.
	 * 
	 * @param object $it
	 * 
	 * @return mixed
	 */
	public static function last ($it) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:156: characters 5-20
		$buf = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:157: characters 5-40
		while ($it->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:157: characters 25-40
			$buf = $it->next();
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:158: characters 5-15
		return $buf;
	}

	/**
	 * Refer to `Array.map`.
	 * 
	 * @param object $it
	 * @param \Closure $f
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function map ($it, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:175: characters 5-18
		$acc = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:176: characters 14-16
		$v = $it;
		while ($v->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:176: lines 176-177
			$v1 = $v->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:177: characters 7-21
			$x = $f($v1);
			$acc->arr[$acc->length++] = $x;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:178: characters 5-15
		return $acc;
	}

	/**
	 * Refer to `thx.Arrays.mapi`.
	 * 
	 * @param object $it
	 * @param \Closure $f
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function mapi ($it, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:192: lines 192-193
		$acc = new \Array_hx();
		$i = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:194: characters 14-16
		$v = $it;
		while ($v->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:194: lines 194-195
			$v1 = $v->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:195: characters 7-26
			$x = $f($v1, $i++);
			$acc->arr[$acc->length++] = $x;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:196: characters 5-15
		return $acc;
	}

	/**
	 * Refer to `thx.Arrays.order`.
	 * 
	 * @param object $it
	 * @param \Closure $sort
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function order ($it, $sort) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:211: characters 5-35
		$n = Iterators::toArray($it);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:212: characters 5-17
		\usort($n->arr, $sort);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:213: characters 5-13
		return $n;
	}

	/**
	 * Refer to `thx.Arrays.reduce`.
	 * 
	 * @param object $it
	 * @param \Closure $callback
	 * @param mixed $initial
	 * 
	 * @return mixed
	 */
	public static function reduce ($it, $callback, $initial) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:220: characters 5-26
		$result = $initial;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:221: lines 221-223
		while ($it->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:222: characters 7-43
			$result = $callback($result, $it->next());
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:224: characters 5-18
		return $result;
	}

	/**
	 * Refer to `thx.Arrays.reducei`.
	 * 
	 * @param object $it
	 * @param \Closure $callback
	 * @param mixed $initial
	 * 
	 * @return mixed
	 */
	public static function reducei ($it, $callback, $initial) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:231: characters 5-63
		Iterators::mapi($it, function ($v, $i) use (&$initial, &$callback) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:231: characters 29-62
			$initial = $callback($initial, $v, $i);
		});
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:232: characters 5-19
		return $initial;
	}

	/**
	 * Take values until the first time `fn` produced false.
	 * 
	 * @param object $it
	 * @param \Closure $f
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function takeUntil ($it, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:248: characters 5-18
		$out = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:249: characters 14-16
		$v = $it;
		while ($v->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:249: lines 249-255
			$v1 = $v->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:250: lines 250-254
			if ($f($v1)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:251: characters 9-20
				$out->arr[$out->length++] = $v1;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:253: characters 9-14
				break;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:256: characters 5-15
		return $out;
	}

	/**
	 * `toArray` transforms an `Iterator<T>` into an `Array<T>`.
	 * 
	 * @param object $it
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function toArray ($it) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:281: characters 5-23
		$elements = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:282: characters 20-22
		$element = $it;
		while ($element->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:282: lines 282-283
			$element1 = $element->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:283: characters 7-29
			$elements->arr[$elements->length++] = $element1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:284: characters 5-20
		return $elements;
	}

	/**
	 * Unzip an iterator of Tuple2<T1, T2> to a Tuple2<Array<T1>, Array<T2>>.
	 * 
	 * @param object $it
	 * 
	 * @return object
	 */
	public static function unzip ($it) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:291: characters 5-26
		$a1 = new \Array_hx();
		$a2 = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:292: lines 292-295
		Iterators::forEach($it, function ($t) use (&$a2, &$a1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:293: characters 7-20
			$a1->arr[$a1->length++] = $t->_0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:294: characters 7-20
			$a2->arr[$a2->length++] = $t->_1;
		});
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:296: characters 12-30
		$this1 = new _HxAnon_Iterators0($a1, $a2);
		return $this1;
	}

	/**
	 * Unzip an iterator of Tuple3<T1, T2, T3> to a Tuple3<Array<T1>, Array<T2>, Array<T3>>.
	 * 
	 * @param object $it
	 * 
	 * @return object
	 */
	public static function unzip3 ($it) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:303: characters 5-35
		$a1 = new \Array_hx();
		$a2 = new \Array_hx();
		$a3 = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:304: lines 304-308
		Iterators::forEach($it, function ($t) use (&$a2, &$a1, &$a3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:305: characters 7-20
			$a1->arr[$a1->length++] = $t->_0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:306: characters 7-20
			$a2->arr[$a2->length++] = $t->_1;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:307: characters 7-20
			$a3->arr[$a3->length++] = $t->_2;
		});
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:309: characters 12-34
		$this1 = new _HxAnon_Iterators1($a1, $a2, $a3);
		return $this1;
	}

	/**
	 * Unzip an iterator of Tuple4<T1, T2, T3, T4> to a Tuple4<Array<T1>, Array<T2>, Array<T3>, Array<T4>>.
	 * 
	 * @param object $it
	 * 
	 * @return object
	 */
	public static function unzip4 ($it) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:316: characters 5-44
		$a1 = new \Array_hx();
		$a2 = new \Array_hx();
		$a3 = new \Array_hx();
		$a4 = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:317: lines 317-322
		Iterators::forEach($it, function ($t) use (&$a2, &$a1, &$a3, &$a4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:318: characters 7-20
			$a1->arr[$a1->length++] = $t->_0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:319: characters 7-20
			$a2->arr[$a2->length++] = $t->_1;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:320: characters 7-20
			$a3->arr[$a3->length++] = $t->_2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:321: characters 7-20
			$a4->arr[$a4->length++] = $t->_3;
		});
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:323: characters 12-38
		$this1 = new _HxAnon_Iterators2($a1, $a2, $a3, $a4);
		return $this1;
	}

	/**
	 * Unzip an iterator of Tuple5<T1, T2, T3, T4, T5> to a Tuple5<Array<T1>, Array<T2>, Array<T3>, Array<T4>, Array<T5>>.
	 * 
	 * @param object $it
	 * 
	 * @return object
	 */
	public static function unzip5 ($it) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:330: characters 5-53
		$a1 = new \Array_hx();
		$a2 = new \Array_hx();
		$a3 = new \Array_hx();
		$a4 = new \Array_hx();
		$a5 = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:331: lines 331-337
		Iterators::forEach($it, function ($t) use (&$a5, &$a2, &$a1, &$a3, &$a4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:332: characters 7-20
			$a1->arr[$a1->length++] = $t->_0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:333: characters 7-20
			$a2->arr[$a2->length++] = $t->_1;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:334: characters 7-20
			$a3->arr[$a3->length++] = $t->_2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:335: characters 7-20
			$a4->arr[$a4->length++] = $t->_3;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:336: characters 7-20
			$a5->arr[$a5->length++] = $t->_4;
		});
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:338: characters 12-42
		$this1 = new _HxAnon_Iterators3($a1, $a2, $a3, $a4, $a5);
		return $this1;
	}

	/**
	 * Pairs the elements of two iterators in an array of `Tuple2`.
	 * 
	 * @param object $it1
	 * @param object $it2
	 * 
	 * @return object[]|\Array_hx
	 */
	public static function zip ($it1, $it2) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:345: characters 5-21
		$array = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:346: lines 346-347
		while ($it1->hasNext() && $it2->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:347: characters 18-52
			$_0 = $it1->next();
			$this1 = new _HxAnon_Iterators0($_0, $it2->next());
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:347: characters 7-53
			$array->arr[$array->length++] = $this1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:348: characters 5-17
		return $array;
	}

	/**
	 * Pairs the elements of three iterators in an array of `Tuple3`.
	 * 
	 * @param object $it1
	 * @param object $it2
	 * @param object $it3
	 * 
	 * @return object[]|\Array_hx
	 */
	public static function zip3 ($it1, $it2, $it3) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:355: characters 5-21
		$array = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:356: lines 356-357
		while ($it1->hasNext() && $it2->hasNext() && $it3->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:357: characters 18-64
			$_0 = $it1->next();
			$_1 = $it2->next();
			$this1 = new _HxAnon_Iterators1($_0, $_1, $it3->next());
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:357: characters 7-65
			$array->arr[$array->length++] = $this1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:358: characters 5-17
		return $array;
	}

	/**
	 * Pairs the elements of four iterators in an array of `Tuple4`.
	 * 
	 * @param object $it1
	 * @param object $it2
	 * @param object $it3
	 * @param object $it4
	 * 
	 * @return object[]|\Array_hx
	 */
	public static function zip4 ($it1, $it2, $it3, $it4) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:365: characters 5-21
		$array = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:366: lines 366-367
		while ($it1->hasNext() && $it2->hasNext() && $it3->hasNext() && $it4->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:367: characters 18-76
			$_0 = $it1->next();
			$_1 = $it2->next();
			$_2 = $it3->next();
			$this1 = new _HxAnon_Iterators2($_0, $_1, $_2, $it4->next());
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:367: characters 7-77
			$array->arr[$array->length++] = $this1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:368: characters 5-17
		return $array;
	}

	/**
	 * Pairs the elements of five iterators in an array of `Tuple5`.
	 * 
	 * @param object $it1
	 * @param object $it2
	 * @param object $it3
	 * @param object $it4
	 * @param object $it5
	 * 
	 * @return object[]|\Array_hx
	 */
	public static function zip5 ($it1, $it2, $it3, $it4, $it5) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:375: characters 5-21
		$array = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:376: lines 376-377
		while ($it1->hasNext() && $it2->hasNext() && $it3->hasNext() && $it4->hasNext() && $it5->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:377: characters 18-88
			$_0 = $it1->next();
			$_1 = $it2->next();
			$_2 = $it3->next();
			$_3 = $it4->next();
			$this1 = new _HxAnon_Iterators3($_0, $_1, $_2, $_3, $it5->next());
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:377: characters 7-89
			$array->arr[$array->length++] = $this1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:378: characters 5-17
		return $array;
	}
}

class _HxAnon_Iterators0 extends HxAnon {
	function __construct($_0, $_1) {
		$this->_0 = $_0;
		$this->_1 = $_1;
	}
}

class _HxAnon_Iterators1 extends HxAnon {
	function __construct($_0, $_1, $_2) {
		$this->_0 = $_0;
		$this->_1 = $_1;
		$this->_2 = $_2;
	}
}

class _HxAnon_Iterators2 extends HxAnon {
	function __construct($_0, $_1, $_2, $_3) {
		$this->_0 = $_0;
		$this->_1 = $_1;
		$this->_2 = $_2;
		$this->_3 = $_3;
	}
}

class _HxAnon_Iterators3 extends HxAnon {
	function __construct($_0, $_1, $_2, $_3, $_4) {
		$this->_0 = $_0;
		$this->_1 = $_1;
		$this->_2 = $_2;
		$this->_3 = $_3;
		$this->_4 = $_4;
	}
}

Boot::registerClass(Iterators::class, 'thx.Iterators');
