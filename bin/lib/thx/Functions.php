<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

/**
 * Generic helper for functions.
 */
class Functions {
	/**
	 * Extension method for function application with a function to an argument.
	 * 
	 * @param \Closure $f
	 * @param mixed $a
	 * 
	 * @return mixed
	 */
	public static function applyTo ($f, $a) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:400: characters 5-16
		return $f($a);
	}

	/**
	 * It provides strict equality between the two arguments `a` and `b`.
	 * 
	 * @param mixed $a
	 * @param mixed $b
	 * 
	 * @return bool
	 */
	public static function equality ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:365: characters 5-18
		return Boot::equal($a, $b);
	}

	/**
	 * The `identity` function returns the value of its argument.
	 * 
	 * @param mixed $value
	 * 
	 * @return mixed
	 */
	public static function identity ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:371: characters 5-17
		return $value;
	}

	/**
	 * `noop` is a function that has no side effects and doesn't return any value.
	 * 
	 * @return void
	 */
	public static function noop () {
	}

	/**
	 * Extension method for function application to an argument with a function.
	 * 
	 * @param mixed $a
	 * @param \Closure $f
	 * 
	 * @return mixed
	 */
	public static function passTo ($a, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:393: characters 5-16
		return $f($a);
	}
}

Boot::registerClass(Functions::class, 'thx.Functions');
