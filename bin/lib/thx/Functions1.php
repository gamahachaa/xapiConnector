<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

/**
 * Extension methods for functions with arity 1 (functions that take exactly 1 argument).
 */
class Functions1 {
	/**
	 * `compose` returns a function that calls the first argument function with the result
	 * of the following one.
	 * 
	 * @param \Closure $fa
	 * @param \Closure $fb
	 * 
	 * @return \Closure
	 */
	public static function compose ($fa, $fb) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:81: characters 3-42
		return function ($v) use (&$fb, &$fa) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:81: characters 26-42
			return $fa($fb($v));
		};
	}

	/**
	 * The contravariant functor for Function1<_, B>. Equivalent to compose.
	 * 
	 * @param \Closure $fbc
	 * @param \Closure $fab
	 * 
	 * @return \Closure
	 */
	public static function contramap ($fbc, $fab) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:93: characters 3-42
		return function ($a) use (&$fbc, &$fab) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:93: characters 24-42
			return $fbc($fab($a));
		};
	}

	/**
	 * `join` creates a function that calls the 2 functions passed as arguments in sequence
	 * and passes the same argument value to the both of them.
	 * 
	 * @param \Closure $fa
	 * @param \Closure $fb
	 * 
	 * @return \Closure
	 */
	public static function join ($fa, $fb) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:100: lines 100-103
		return function ($v) use (&$fb, &$fa) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:101: characters 4-9
			$fa($v);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:102: characters 4-9
			$fb($v);
		};
	}

	/**
	 * The covariant functor for Function1<A, _>
	 * 
	 * @param \Closure $fab
	 * @param \Closure $fbc
	 * 
	 * @return \Closure
	 */
	public static function map ($fab, $fbc) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:87: characters 3-42
		return function ($a) use (&$fbc, &$fab) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:87: characters 24-42
			return $fbc($fab($a));
		};
	}

	/**
	 * `memoize` wraps `callback` and calls it only once storing the result for future needs.
	 * Computed results are stored in an internal map. The keys to this map are generated by
	 * the resolver function that by default directly converts the first argument into a string.
	 * 
	 * @param \Closure $callback
	 * @param \Closure $resolver
	 * 
	 * @return \Closure
	 */
	public static function memoize ($callback, $resolver = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:112: lines 112-113
		if (null === $resolver) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:113: characters 4-12
			$resolver = function ($v) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:113: characters 31-42
				return "" . \Std::string($v);
			};
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:114: characters 13-36
		$map_data = null;
		$this1 = [];
		$map_data = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:115: lines 115-122
		return function ($v) use (&$map_data, &$callback, &$resolver) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:116: characters 4-26
			$key = $resolver($v);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:117: lines 117-118
			if (\array_key_exists($key, $map_data)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:118: characters 5-24
				return ($map_data[$key] ?? null);
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:119: characters 4-29
			$result = $callback($v);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:120: characters 4-24
			$map_data[$key] = $result;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:121: characters 4-17
			return $result;
		};
	}

	/**
	 * Wraps `callback` in a function that negates its results.
	 * 
	 * @param \Closure $callback
	 * 
	 * @return \Closure
	 */
	public static function negate ($callback) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:129: characters 3-44
		return function ($v) use (&$callback) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:129: characters 25-44
			return !$callback($v);
		};
	}

	/**
	 * `noop` is a function that has no side effects and doesn't return any value.
	 * 
	 * @param mixed $_
	 * 
	 * @return void
	 */
	public static function noop ($_) {
	}

	/**
	 * Returns a function that behaves the same as `callback` but has its arguments inverted.
	 * 
	 * @param \Closure $callback
	 * 
	 * @return \Closure
	 */
	public static function swapArguments ($callback) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:154: characters 3-56
		return function ($a2, $a1) use (&$callback) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:154: characters 33-56
			return $callback($a1, $a2);
		};
	}

	/**
	 * Creates a function that calls `callback` `n` times and returns an array of results.
	 * 
	 * @param int $n
	 * @param \Closure $callback
	 * 
	 * @return \Closure
	 */
	public static function times ($n, $callback) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:140: characters 3-90
		return function ($value) use (&$n, &$callback) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:140: characters 37-90
			$_this = Ints::range($n);
			$result = [];
			$data = $_this->arr;
			$_g_current = 0;
			$_g_length = \count($data);
			$_g_data = $data;
			while ($_g_current < $_g_length) {
				$item = $_g_data[$_g_current++];
				$result[] = $callback($value);
			}
			return \Array_hx::wrap($result);
		};
	}

	/**
	 * Creates a function that calls `callback` `n` times and returns an array of results.
	 * Callback takes an additional argument `index`.
	 * 
	 * @param int $n
	 * @param \Closure $callback
	 * 
	 * @return \Closure
	 */
	public static function timesi ($n, $callback) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:148: characters 3-93
		return function ($value) use (&$n, &$callback) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:148: characters 37-93
			$_this = Ints::range($n);
			$result = [];
			$data = $_this->arr;
			$_g_current = 0;
			$_g_length = \count($data);
			$_g_data = $data;
			while ($_g_current < $_g_length) {
				$item = $_g_data[$_g_current++];
				$result[] = $callback($value, $item);
			}
			return \Array_hx::wrap($result);
		};
	}
}

Boot::registerClass(Functions1::class, 'thx.Functions1');
