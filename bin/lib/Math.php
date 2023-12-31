<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\std/php/_std/Math.hx
 */

use \php\Boot;

/**
 * This class defines mathematical functions and constants.
 * @see https://haxe.org/manual/std-math.html
 */
class Math {
	/**
	 * @var float
	 * A special `Float` constant which denotes negative infinity.
	 * For example, this is the result of `-1.0 / 0.0`.
	 * Operations with `NEGATIVE_INFINITY` as an operand may result in
	 * `NEGATIVE_INFINITY`, `POSITIVE_INFINITY` or `NaN`.
	 * If this constant is converted to an `Int`, e.g. through `Std.int()`, the
	 * result is unspecified.
	 */
	static public $NEGATIVE_INFINITY;
	/**
	 * @var float
	 * A special `Float` constant which denotes an invalid number.
	 * `NaN` stands for "Not a Number". It occurs when a mathematically incorrect
	 * operation is executed, such as taking the square root of a negative
	 * number: `Math.sqrt(-1)`.
	 * All further operations with `NaN` as an operand will result in `NaN`.
	 * If this constant is converted to an `Int`, e.g. through `Std.int()`, the
	 * result is unspecified.
	 * In order to test if a value is `NaN`, you should use `Math.isNaN()` function.
	 */
	static public $NaN;
	/**
	 * @var float
	 * A special `Float` constant which denotes positive infinity.
	 * For example, this is the result of `1.0 / 0.0`.
	 * Operations with `POSITIVE_INFINITY` as an operand may result in
	 * `NEGATIVE_INFINITY`, `POSITIVE_INFINITY` or `NaN`.
	 * If this constant is converted to an `Int`, e.g. through `Std.int()`, the
	 * result is unspecified.
	 */
	static public $POSITIVE_INFINITY;


	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


		self::$NaN = NAN;
		self::$POSITIVE_INFINITY = INF;
		self::$NEGATIVE_INFINITY = -INF;
	}
}

Boot::registerClass(Math::class, 'Math');
Math::__hx__init();
