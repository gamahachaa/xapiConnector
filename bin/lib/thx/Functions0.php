<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

/**
 * Extension methods for functions with arity 0 (functions that do not take arguments).
 */
class Functions0 {
	/**
	 * Returns a function that invokes `callback` after being being invoked `n` times.
	 * 
	 * @param \Closure $callback
	 * @param int $n
	 * 
	 * @return \Closure
	 */
	public static function after ($callback, $n) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:16: lines 16-18
		return function () use (&$n, &$callback) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:17: lines 17-18
			if (($n -= 1) === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:18: characters 9-19
				$callback();
			}
		};
	}

	/**
	 * `join` creates a function that calls the 2 functions passed as arguments in sequence.
	 * 
	 * @param \Closure $fa
	 * @param \Closure $fb
	 * 
	 * @return \Closure
	 */
	public static function join ($fa, $fb) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:23: lines 23-26
		return function () use (&$fb, &$fa) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:24: characters 7-11
			$fa();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:25: characters 7-11
			$fb();
		};
	}

	/**
	 * `memoize` wraps `callback` and calls it only once storing the result for future needs.
	 * 
	 * @param \Closure $callback
	 * 
	 * @return \Closure
	 */
	public static function memoize ($callback) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:32: characters 5-30
		$result = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:33: lines 33-37
		return function () use (&$result, &$callback) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:34: lines 34-35
			if ($result === null) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:35: characters 9-28
				$result = $callback();
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:36: characters 7-20
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:55: lines 55-56
		return function () use (&$callback) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:56: characters 7-25
			return !$callback();
		};
	}

	/**
	 * `once` wraps and returns the argument function. `once` ensures that `f` will be called
	 * at most once even if the returned function is invoked multiple times.
	 * 
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function once ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:45: lines 45-49
		return function () use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:46: characters 7-17
			$t = $f;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:47: characters 7-25
			$f = Boot::getStaticClosure(Functions::class, 'noop');
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:48: characters 7-10
			$t();
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:62: lines 62-63
		return function () use (&$n, &$callback) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:63: characters 14-62
			$_this = Ints::range($n);
			$result = [];
			$data = $_this->arr;
			$_g_current = 0;
			$_g_length = \count($data);
			$_g_data = $data;
			while ($_g_current < $_g_length) {
				$item = $_g_data[$_g_current++];
				$result[] = $callback();
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:71: lines 71-72
		return function () use (&$n, &$callback) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:72: characters 14-63
			$_this = Ints::range($n);
			$result = [];
			$data = $_this->arr;
			$_g_current = 0;
			$_g_length = \count($data);
			$_g_data = $data;
			while ($_g_current < $_g_length) {
				$item = $_g_data[$_g_current++];
				$result[] = $callback($item);
			}
			return \Array_hx::wrap($result);
		};
	}
}

Boot::registerClass(Functions0::class, 'thx.Functions0');
