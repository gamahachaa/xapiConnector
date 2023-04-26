<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

/**
 * Helper class for functions that take 3 arguments
 */
class Functions3 {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function curry ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:254: characters 5-78
		return function ($a, $b) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:254: characters 35-76
			return function ($c) use (&$f, &$b, &$a) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:254: characters 56-73
				return $f($a, $b, $c);
			};
		};
	}

	/**
	 * `memoize` wraps `callback` and calls it only once storing the result for future needs.
	 * Computed results are stored in an internal map. The keys to this map are generated by
	 * the resolver function that by default directly converts the arguments into a string.
	 * 
	 * @param \Closure $callback
	 * @param \Closure $resolver
	 * 
	 * @return \Closure
	 */
	public static function memoize ($callback, $resolver = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:233: lines 233-234
		if (null === $resolver) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:234: characters 7-15
			$resolver = function ($v1, $v2, $v3) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:234: characters 54-74
				return "" . \Std::string($v1) . ":" . \Std::string($v2) . ":" . \Std::string($v3);
			};
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:235: characters 15-38
		$map_data = null;
		$this1 = [];
		$map_data = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:236: lines 236-243
		return function ($v1, $v2, $v3) use (&$map_data, &$callback, &$resolver) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:237: characters 7-38
			$key = $resolver($v1, $v2, $v3);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:238: lines 238-239
			if (\array_key_exists($key, $map_data)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:239: characters 9-28
				return ($map_data[$key] ?? null);
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:240: characters 7-41
			$result = $callback($v1, $v2, $v3);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:241: characters 7-27
			$map_data[$key] = $result;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:242: characters 7-20
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:250: lines 250-251
		return function ($v1, $v2, $v3) use (&$callback) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:251: characters 7-35
			return !$callback($v1, $v2, $v3);
		};
	}
}

Boot::registerClass(Functions3::class, 'thx.Functions3');
