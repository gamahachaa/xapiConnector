<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:20: characters 19-21
		$element = $it;
		while ($element->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:20: lines 20-22
			$element1 = $element->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:21: lines 21-22
			if (!$predicate($element1)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:22: characters 5-17
				return false;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:23: characters 3-14
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:30: characters 19-21
		$element = $it;
		while ($element->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:30: lines 30-32
			$element1 = $element->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:31: lines 31-32
			if ($predicate($element1)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:32: characters 5-16
				return true;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:33: characters 3-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:265: characters 3-20
		$done = false;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:266: characters 3-16
		$out = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:267: characters 13-15
		$v = $it;
		while ($v->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:267: lines 267-276
			$v1 = $v->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:268: lines 268-275
			if (!$done) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:269: lines 269-272
				if (!$f($v1)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:270: characters 6-17
					$done = true;
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:271: characters 6-17
					$out->arr[$out->length++] = $v1;
				}
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:274: characters 5-16
				$out->arr[$out->length++] = $v1;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:277: characters 3-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:82: characters 3-40
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:42: lines 42-43
		if (null === $equality) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:43: characters 4-25
			$equality = Boot::getStaticClosure(Functions::class, 'equality');
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:44: characters 3-22
		$ae = null;
		$be = null;
		$an = null;
		$bn = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:45: lines 45-54
		while (true) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:46: characters 4-20
			$an = $a->hasNext();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:47: characters 4-20
			$bn = $b->hasNext();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:48: lines 48-49
			if (!$an && !$bn) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:49: characters 5-16
				return true;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:50: lines 50-51
			if (!$an || !$bn) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:51: characters 5-17
				return false;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:52: lines 52-53
			if (!$equality($a->next(), $b->next())) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:53: characters 5-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:88: lines 88-92
		return Iterators::reduce($it, function ($acc, $element) use (&$predicate) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:89: lines 89-90
			if ($predicate($element)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:90: characters 5-22
				$acc->arr[$acc->length++] = $element;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:91: characters 4-14
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:98: characters 19-21
		$element = $it;
		while ($element->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:98: lines 98-100
			$element1 = $element->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:99: lines 99-100
			if ($f($element1)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:100: characters 5-19
				return $element1;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:101: characters 3-14
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:108: characters 10-38
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:114: characters 10-41
		if ($it->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:114: characters 25-34
			return $it->next();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:114: characters 37-41
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:189: characters 3-32
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:207: characters 3-33
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:238: characters 3-29
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:244: characters 40-48
		$_e = $m;
		$tmp = function ($a0, $a1) use (&$_e) {
			return Monoid_Impl_::append($_e, $a0, $a1);
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:244: characters 3-49
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:169: lines 169-171
		while ($it->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:170: characters 4-19
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:64: characters 3-15
		$pos = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:65: characters 13-15
		$i = $it;
		while ($i->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:65: lines 65-68
			$i1 = $i->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:66: lines 66-67
			if ($pos++ === $index) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:67: characters 5-13
				return $i1;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:69: characters 3-14
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:76: characters 10-41
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:120: characters 3-22
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:126: characters 3-15
		$pos = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:127: characters 13-15
		$v = $it;
		while ($v->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:127: lines 127-131
			$v1 = $v->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:128: lines 128-129
			if (Boot::equal($element, $v1)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:129: characters 5-15
				return $pos;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:130: characters 4-9
			++$pos;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:132: characters 3-12
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:139: characters 3-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:148: characters 3-106
		$fields = (\Reflect::isObject($v) && (null === \Type::getClass($v)) ? \Reflect::fields($v) : \Type::getInstanceFields(\Type::getClass($v)));
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:149: lines 149-150
		if (!\Lambda::has($fields, "next") || !\Lambda::has($fields, "hasNext")) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:150: characters 4-16
			return false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:151: characters 10-54
		$f = \Reflect::field($v, "next");
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:151: characters 10-105
		if (($f instanceof \Closure) || ($f instanceof HxClosure)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:151: characters 58-105
			$f = \Reflect::field($v, "hasNext");
			if (!($f instanceof \Closure)) {
				return ($f instanceof HxClosure);
			} else {
				return true;
			}
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:151: characters 10-105
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:158: characters 3-18
		$buf = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:159: lines 159-160
		while ($it->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:160: characters 4-19
			$buf = $it->next();
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:161: characters 3-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:178: characters 3-16
		$acc = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:179: characters 13-15
		$v = $it;
		while ($v->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:179: lines 179-180
			$v1 = $v->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:180: characters 4-18
			$x = $f($v1);
			$acc->arr[$acc->length++] = $x;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:181: characters 3-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:195: characters 3-23
		$acc = new \Array_hx();
		$i = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:196: characters 13-15
		$v = $it;
		while ($v->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:196: lines 196-197
			$v1 = $v->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:197: characters 4-23
			$x = $f($v1, $i++);
			$acc->arr[$acc->length++] = $x;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:198: characters 3-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:213: characters 3-33
		$n = Iterators::toArray($it);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:214: characters 3-15
		\usort($n->arr, $sort);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:215: characters 3-11
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:222: characters 3-24
		$result = $initial;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:223: lines 223-225
		while ($it->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:224: characters 4-40
			$result = $callback($result, $it->next());
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:226: characters 3-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:233: characters 3-61
		Iterators::mapi($it, function ($v, $i) use (&$initial, &$callback) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:233: characters 27-60
			$initial = $callback($initial, $v, $i);
		});
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:234: characters 3-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:250: characters 3-16
		$out = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:251: characters 13-15
		$v = $it;
		while ($v->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:251: lines 251-257
			$v1 = $v->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:252: lines 252-256
			if ($f($v1)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:253: characters 5-16
				$out->arr[$out->length++] = $v1;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:255: characters 5-10
				break;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:258: characters 3-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:284: characters 3-21
		$elements = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:285: characters 19-21
		$element = $it;
		while ($element->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:285: lines 285-286
			$element1 = $element->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:286: characters 4-26
			$elements->arr[$elements->length++] = $element1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:287: characters 3-18
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:294: characters 3-24
		$a1 = new \Array_hx();
		$a2 = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:295: lines 295-298
		Iterators::forEach($it, function ($t) use (&$a2, &$a1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:296: characters 4-17
			$a1->arr[$a1->length++] = $t->_0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:297: characters 4-17
			$a2->arr[$a2->length++] = $t->_1;
		});
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:299: characters 10-28
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:306: characters 3-33
		$a1 = new \Array_hx();
		$a2 = new \Array_hx();
		$a3 = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:307: lines 307-311
		Iterators::forEach($it, function ($t) use (&$a2, &$a1, &$a3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:308: characters 4-17
			$a1->arr[$a1->length++] = $t->_0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:309: characters 4-17
			$a2->arr[$a2->length++] = $t->_1;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:310: characters 4-17
			$a3->arr[$a3->length++] = $t->_2;
		});
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:312: characters 10-32
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:319: characters 3-42
		$a1 = new \Array_hx();
		$a2 = new \Array_hx();
		$a3 = new \Array_hx();
		$a4 = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:320: lines 320-325
		Iterators::forEach($it, function ($t) use (&$a2, &$a1, &$a3, &$a4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:321: characters 4-17
			$a1->arr[$a1->length++] = $t->_0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:322: characters 4-17
			$a2->arr[$a2->length++] = $t->_1;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:323: characters 4-17
			$a3->arr[$a3->length++] = $t->_2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:324: characters 4-17
			$a4->arr[$a4->length++] = $t->_3;
		});
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:326: characters 10-36
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:333: characters 3-51
		$a1 = new \Array_hx();
		$a2 = new \Array_hx();
		$a3 = new \Array_hx();
		$a4 = new \Array_hx();
		$a5 = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:334: lines 334-340
		Iterators::forEach($it, function ($t) use (&$a5, &$a2, &$a1, &$a3, &$a4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:335: characters 4-17
			$a1->arr[$a1->length++] = $t->_0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:336: characters 4-17
			$a2->arr[$a2->length++] = $t->_1;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:337: characters 4-17
			$a3->arr[$a3->length++] = $t->_2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:338: characters 4-17
			$a4->arr[$a4->length++] = $t->_3;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:339: characters 4-17
			$a5->arr[$a5->length++] = $t->_4;
		});
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:341: characters 10-40
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:348: characters 3-18
		$array = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:349: lines 349-350
		while ($it1->hasNext() && $it2->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:350: characters 15-49
			$_0 = $it1->next();
			$this1 = new _HxAnon_Iterators0($_0, $it2->next());
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:350: characters 4-50
			$array->arr[$array->length++] = $this1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:351: characters 3-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:358: characters 3-18
		$array = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:359: lines 359-360
		while ($it1->hasNext() && $it2->hasNext() && $it3->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:360: characters 15-61
			$_0 = $it1->next();
			$_1 = $it2->next();
			$this1 = new _HxAnon_Iterators1($_0, $_1, $it3->next());
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:360: characters 4-62
			$array->arr[$array->length++] = $this1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:361: characters 3-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:368: characters 3-18
		$array = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:369: lines 369-370
		while ($it1->hasNext() && $it2->hasNext() && $it3->hasNext() && $it4->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:370: characters 15-73
			$_0 = $it1->next();
			$_1 = $it2->next();
			$_2 = $it3->next();
			$this1 = new _HxAnon_Iterators2($_0, $_1, $_2, $it4->next());
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:370: characters 4-74
			$array->arr[$array->length++] = $this1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:371: characters 3-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:379: characters 3-18
		$array = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:380: lines 380-381
		while ($it1->hasNext() && $it2->hasNext() && $it3->hasNext() && $it4->hasNext() && $it5->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:381: characters 15-85
			$_0 = $it1->next();
			$_1 = $it2->next();
			$_2 = $it3->next();
			$_3 = $it4->next();
			$this1 = new _HxAnon_Iterators3($_0, $_1, $_2, $_3, $it5->next());
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:381: characters 4-86
			$array->arr[$array->length++] = $this1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:382: characters 3-15
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
