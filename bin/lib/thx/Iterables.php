<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx
 */

namespace thx;

use \php\_Boot\HxAnon;
use \haxe\ds\Option;
use \php\Boot;
use \thx\_Ord\Ord_Impl_;
use \php\_Boot\HxClosure;

/**
 * Helper class for `Iterable`. Implementations usually fallback on `thx.Iterators`.
 * For documentation of specific methods refer to the equivalent methods in `thx.Arrays`;
 */
class Iterables {
	/**
	 * Checks if `predicate` returns true for all elements in the iterable.
	 * 
	 * @param object $it
	 * @param \Closure $predicate
	 * 
	 * @return bool
	 */
	public static function all ($it, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:24: characters 3-49
		return Iterators::all($it->iterator(), $predicate);
	}

	/**
	 * Checks if `predicate` returns true for at least one element in the iterable.
	 * 
	 * @param object $it
	 * @param \Closure $predicate
	 * 
	 * @return bool
	 */
	public static function any ($it, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:30: characters 3-49
		return Iterators::any($it->iterator(), $predicate);
	}

	/**
	 * Returns an Array that contains all elements from a which are not elements of b.
	 * If a contains duplicates, the resulting Array contains duplicates.
	 * 
	 * @param object $a
	 * @param object $b
	 * @param \Closure $eq
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function differenceBy ($a, $b, $eq) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:283: characters 3-25
		$res = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:284: characters 13-25
		$e = $a->iterator();
		while ($e->hasNext()) {
			unset($e1);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:284: lines 284-287
			$e1 = $e->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:285: lines 285-286
			if (!Iterables::any($b, function ($x) use (&$e1, &$eq) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:285: characters 30-54
				return $eq($x, $e1);
			})) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:286: characters 5-16
				$res->arr[$res->length++] = $e1;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:288: characters 3-13
		return $res;
	}

	/**
	 * Produces an Array from `a[n]` to the last element of `a`.
	 * 
	 * @param object $itr
	 * @param int $n
	 * 
	 * @return object
	 */
	public static function dropLeft ($itr, $n) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:238: lines 238-252
		return new _HxAnon_Iterables0(function () use (&$itr, &$n) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:240: characters 5-30
			$itr1 = $itr->iterator();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:241: characters 5-19
			$count = $n;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:242: lines 242-246
			while ($count > 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:243: lines 243-245
				if ($itr1->hasNext()) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:244: characters 7-17
					$itr1->next();
				}
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:247: lines 247-250
			return new _HxAnon_Iterables1(Boot::getInstanceClosure($itr1, 'next'), Boot::getInstanceClosure($itr1, 'hasNext'));
		});
	}

	/**
	 * Drop values until the first time `fn` produced false.
	 * 
	 * @param object $it
	 * @param \Closure $fn
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function dropUntil ($it, $fn) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:259: characters 3-48
		return Iterators::dropUntil($it->iterator(), $fn);
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:36: characters 10-52
		Iterators::eachPair($it->iterator(), $handler);
	}

	/**
	 * It compares the lengths and elements of two given iterables and returns `true` if they match.
	 * An optional equality function can be passed as the last argument. If not provided, strict equality is adopted.
	 * 
	 * @param object $a
	 * @param object $b
	 * @param \Closure $equality
	 * 
	 * @return bool
	 */
	public static function equals ($a, $b, $equality = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:44: characters 3-64
		return Iterators::equals($a->iterator(), $b->iterator(), $equality);
	}

	/**
	 * `extrema` finds both the minimum and maximum value included in the iterable,
	 * as compared by the specified ordering.
	 * 
	 * @param object $it
	 * @param \Closure $ord
	 * 
	 * @return Option
	 */
	public static function extrema ($it, $ord) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:225: characters 3-48
		return Iterables::extremaBy($it, Boot::getStaticClosure(Functions::class, 'identity'), $ord);
	}

	/**
	 * `extremaBy` finds both the minimum and maximum value included in the iterable,
	 * as compared by some function of the values contained within the iterable and
	 * the specified ordering.
	 * 
	 * @param object $it
	 * @param \Closure $f
	 * @param \Closure $ord
	 * 
	 * @return Option
	 */
	public static function extremaBy ($it, $f, $ord) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:208: characters 3-41
		$found = Option::None();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:209: characters 13-15
		$a = $it->iterator();
		while ($a->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:209: lines 209-216
			$a1 = $a->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:210: lines 210-215
			$__hx__switch = ($found->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:213: characters 15-16
				$_g = $found->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:212: characters 15-16
				$t = $_g;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:212: lines 212-214
				if ($ord($f($a1), $f($t->_0)) === OrderingImpl::LT()) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:212: characters 54-72
					$this1 = new _HxAnon_Iterables2($a1, $t->_1);
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:212: characters 49-73
					$found = Option::Some($this1);
				} else {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:213: characters 15-16
					$t1 = $_g;
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:213: lines 213-214
					if ($ord($f($a1), $f($t1->_1)) === OrderingImpl::GT()) {
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:213: characters 54-72
						$this2 = new _HxAnon_Iterables2($t1->_0, $a1);
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:213: characters 49-73
						$found = Option::Some($this2);
					}
				}
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:211: characters 21-36
				$this3 = new _HxAnon_Iterables2($a1, $a1);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:211: characters 16-37
				$found = Option::Some($this3);
			} else {
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:217: characters 3-15
		return $found;
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:50: characters 3-52
		return Iterators::filter($it->iterator(), $predicate);
	}

	/**
	 * Refer to `thx.Arrays.find`.
	 * 
	 * @param object $it
	 * @param \Closure $predicate
	 * 
	 * @return mixed
	 */
	public static function find ($it, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:56: characters 3-50
		return Iterators::find($it->iterator(), $predicate);
	}

	/**
	 * Refer to `thx.Arrays.findOption`.
	 * 
	 * @param object $it
	 * @param \Closure $predicate
	 * 
	 * @return Option
	 */
	public static function findOption ($it, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:62: characters 10-46
		$value = Iterators::find($it->iterator(), $predicate);
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:68: characters 3-40
		return Iterators::first($it->iterator());
	}

	/**
	 * A proper Functor-like map function that preverses iterable structure.
	 * 
	 * @param object $it
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function fmap ($it, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:129: characters 3-72
		return new _HxAnon_Iterables0(function () use (&$f, &$it) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:129: characters 32-71
			return Iterators::fmap($it->iterator(), $f);
		});
	}

	/**
	 * A proper Functor-like mapi function that preverses iterable structure, with index information.
	 * 
	 * @param object $it
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function fmapi ($it, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:141: characters 3-73
		return new _HxAnon_Iterables0(function () use (&$f, &$it) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:141: characters 32-72
			return Iterators::fmapi($it->iterator(), $f);
		});
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:74: characters 3-45
		return Iterators::get($it->iterator(), $index);
	}

	/**
	 * Refer to `thx.Arrays.getOption`.
	 * 
	 * @param object $it
	 * @param int $index
	 * 
	 * @return Option
	 */
	public static function getOption ($it, $index) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:80: characters 10-41
		$value = Iterators::get($it->iterator(), $index);
		if (null === $value) {
			return Option::None();
		} else {
			return Option::Some($value);
		}
	}

	/**
	 * Returns `true` if the iterable contains at least one element.
	 * 
	 * @param object $it
	 * 
	 * @return bool
	 */
	public static function hasElements ($it) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:92: characters 10-46
		return $it->iterator()->hasNext();
	}

	/**
	 * Returns the position of element in the iterable. It returns -1 if not found.
	 * 
	 * @param object $it
	 * @param mixed $element
	 * 
	 * @return int
	 */
	public static function indexOf ($it, $element) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:98: characters 3-51
		return Iterators::indexOf($it->iterator(), $element);
	}

	/**
	 * Refer to `thx.Arrays.isEmpty`.
	 * 
	 * @param object $it
	 * 
	 * @return bool
	 */
	public static function isEmpty ($it) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:104: characters 10-42
		return !$it->iterator()->hasNext();
	}

	/**
	 * `isIterable` checks that the passed argument has all the requirements to be an `Iterable`.
	 * Note that no type checking is performed at runtime, only if a method `iterator` exists regardless
	 * of its signature.
	 * 
	 * @param mixed $v
	 * 
	 * @return bool
	 */
	public static function isIterable ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:113: characters 3-106
		$fields = (\Reflect::isObject($v) && (null === \Type::getClass($v)) ? \Reflect::fields($v) : \Type::getInstanceFields(\Type::getClass($v)));
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:114: lines 114-115
		if (!\Lambda::has($fields, "iterator")) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:115: characters 4-16
			return false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:116: characters 10-58
		$f = \Reflect::field($v, "iterator");
		if (!($f instanceof \Closure)) {
			return ($f instanceof HxClosure);
		} else {
			return true;
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:86: characters 3-39
		return Iterators::last($it->iterator());
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:123: characters 3-41
		return Iterators::map($it->iterator(), $f);
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:135: characters 3-42
		return Iterators::mapi($it->iterator(), $f);
	}

	/**
	 * `max` finds the maximum value included in the iterable, accorrding
	 * to the specified ordering.
	 * 
	 * @param object $it
	 * @param \Closure $ord
	 * 
	 * @return Option
	 */
	public static function max ($it, $ord) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:200: characters 10-32
		return Iterables::minBy($it, Boot::getStaticClosure(Functions::class, 'identity'), Ord_Impl_::inverse($ord));
	}

	/**
	 * `maxBy` finds the maximum value included in the iterable, as compared by some
	 * function of the values contained within the iterable.
	 * 
	 * @param object $it
	 * @param \Closure $f
	 * @param \Closure $ord
	 * 
	 * @return Option
	 */
	public static function maxBy ($it, $f, $ord) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:186: characters 3-37
		return Iterables::minBy($it, $f, Ord_Impl_::inverse($ord));
	}

	/**
	 * `min` finds the minimum value included in the iterable, accorrding
	 * to the specified ordering.
	 * 
	 * @param object $it
	 * @param \Closure $ord
	 * 
	 * @return Option
	 */
	public static function min ($it, $ord) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:193: characters 3-44
		return Iterables::minBy($it, Boot::getStaticClosure(Functions::class, 'identity'), $ord);
	}

	/**
	 * `minBy` finds the minimum value included in the iterable, as compared by some
	 * function of the values contained within the iterable.
	 * 
	 * @param object $it
	 * @param \Closure $f
	 * @param \Closure $ord
	 * 
	 * @return Option
	 */
	public static function minBy ($it, $f, $ord) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:172: characters 3-30
		$found = Option::None();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:173: characters 13-15
		$a = $it->iterator();
		while ($a->hasNext()) {
			unset($a1);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:173: lines 173-177
			$a1 = $a->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:174: lines 174-176
			if (!Options::any($found, function ($a0) use (&$f, &$ord, &$a1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:175: characters 5-34
				return $ord($f($a0), $f($a1)) === OrderingImpl::LT();
			})) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:176: characters 17-24
				$found = Option::Some($a1);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:178: characters 3-15
		return $found;
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:147: characters 3-46
		return Iterators::order($it->iterator(), $sort);
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:153: characters 3-60
		return Iterators::reduce($it->iterator(), $callback, $initial);
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:159: characters 3-61
		return Iterators::reducei($it->iterator(), $callback, $initial);
	}

	/**
	 * Take values until the first time `fn` produced false.
	 * 
	 * @param object $it
	 * @param \Closure $fn
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function takeUntil ($it, $fn) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:231: characters 3-48
		return Iterators::takeUntil($it->iterator(), $fn);
	}

	/**
	 * `toArray` transforms an `Iterable<T>` into an `Array<T>`.
	 * 
	 * @param object $it
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function toArray ($it) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:165: characters 3-42
		return Iterators::toArray($it->iterator());
	}

	/**
	 * Returns an Array that contains all elements from `a` which are also elements of `b`.
	 * If `a` contains duplicates, so will the result.
	 * 
	 * @param object $a
	 * @param object $b
	 * @param \Closure $eq
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function unionBy ($a, $b, $eq) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:267: characters 3-25
		$res = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:268: characters 13-25
		$e = $a->iterator();
		while ($e->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:268: lines 268-270
			$e1 = $e->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:269: characters 4-15
			$res->arr[$res->length++] = $e1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:271: characters 13-25
		$e = $b->iterator();
		while ($e->hasNext()) {
			unset($e1);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:271: lines 271-274
			$e1 = $e->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:272: lines 272-273
			if (!Iterables::any($res, function ($x) use (&$e1, &$eq) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:272: characters 32-56
				return $eq($x, $e1);
			})) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:273: characters 5-16
				$res->arr[$res->length++] = $e1;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:275: characters 3-13
		return $res;
	}

	/**
	 * Unzip an iterable of Tuple2<T1, T2> to a Tuple2<Array<T1>, Array<T2>>.
	 * 
	 * @param object $it
	 * 
	 * @return object
	 */
	public static function unzip ($it) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:295: characters 3-40
		return Iterators::unzip($it->iterator());
	}

	/**
	 * Unzip an iterable of Tuple3<T1, T2, T3> to a Tuple3<Array<T1>, Array<T2>, Array<T3>>.
	 * 
	 * @param object $it
	 * 
	 * @return object
	 */
	public static function unzip3 ($it) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:301: characters 3-41
		return Iterators::unzip3($it->iterator());
	}

	/**
	 * Unzip an iterable of Tuple4<T1, T2, T3, T4> to a Tuple4<Array<T1>, Array<T2>, Array<T3>, Array<T4>>.
	 * 
	 * @param object $it
	 * 
	 * @return object
	 */
	public static function unzip4 ($it) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:307: characters 3-41
		return Iterators::unzip4($it->iterator());
	}

	/**
	 * Unzip an iterable of Tuple5<T1, T2, T3, T4, T5> to a Tuple5<Array<T1>, Array<T2>, Array<T3>, Array<T4>, Array<T5>>.
	 * 
	 * @param object $it
	 * 
	 * @return object
	 */
	public static function unzip5 ($it) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:313: characters 3-41
		return Iterators::unzip5($it->iterator());
	}

	/**
	 * Pairs the elements of two iterables in an array of `Tuple2`.
	 * 
	 * @param object $it1
	 * @param object $it2
	 * 
	 * @return object[]|\Array_hx
	 */
	public static function zip ($it1, $it2) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:319: characters 3-55
		return Iterators::zip($it1->iterator(), $it2->iterator());
	}

	/**
	 * Pairs the elements of three iterables in an array of `Tuple3`.
	 * 
	 * @param object $it1
	 * @param object $it2
	 * @param object $it3
	 * 
	 * @return object[]|\Array_hx
	 */
	public static function zip3 ($it1, $it2, $it3) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:325: characters 3-72
		return Iterators::zip3($it1->iterator(), $it2->iterator(), $it3->iterator());
	}

	/**
	 * Pairs the elements of four iterables in an array of `Tuple4`.
	 * 
	 * @param object $it1
	 * @param object $it2
	 * @param object $it3
	 * @param object $it4
	 * 
	 * @return object[]|\Array_hx
	 */
	public static function zip4 ($it1, $it2, $it3, $it4) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:331: characters 3-88
		return Iterators::zip4($it1->iterator(), $it2->iterator(), $it3->iterator(), $it4->iterator());
	}

	/**
	 * Pairs the elements of five iterables in an array of `Tuple5`.
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterables.hx:338: characters 3-104
		return Iterators::zip5($it1->iterator(), $it2->iterator(), $it3->iterator(), $it4->iterator(), $it5->iterator());
	}
}

class _HxAnon_Iterables1 extends HxAnon {
	function __construct($next, $hasNext) {
		$this->next = $next;
		$this->hasNext = $hasNext;
	}
}

class _HxAnon_Iterables0 extends HxAnon {
	function __construct($iterator) {
		$this->iterator = $iterator;
	}
}

class _HxAnon_Iterables2 extends HxAnon {
	function __construct($_0, $_1) {
		$this->_0 = $_0;
		$this->_1 = $_1;
	}
}

Boot::registerClass(Iterables::class, 'thx.Iterables');
