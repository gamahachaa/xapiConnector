<?php
/**
 */

namespace thx;

use \haxe\ds\Option;
use \php\Boot;
use \haxe\Exception;

class Bools {
	/**
	 * Returns `true` if the passed value is either `true` or `false` (case insensitive).
	 * 
	 * @param string $v
	 * 
	 * @return bool
	 */
	public static function canParse ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:21: characters 61-76
		$_g = \mb_strtolower($v);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:21: lines 21-22
		if ($_g === null) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:22: characters 56-60
			return true;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:21: characters 61-76
			if ($_g === "0" || $_g === "1" || $_g === "false" || $_g === "off" || $_g === "on" || $_g === "true") {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:22: characters 56-60
				return true;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:23: characters 13-18
				return false;
			}
		}
	}

	/**
	 * Returns a comparison value (`Int`) from two boolean values.
	 * 
	 * @param bool $a
	 * @param bool $b
	 * 
	 * @return int
	 */
	public static function compare ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:10: characters 12-37
		if ($a === $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:10: characters 21-22
			return 0;
		} else if ($a) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:10: characters 30-32
			return -1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:10: characters 35-36
			return 1;
		}
	}

	/**
	 * Depending upon the condition, return the provided value wrapped
	 * in a Some, or None if the condition is false.
	 * 
	 * @param bool $cond
	 * @param mixed $a
	 * 
	 * @return Option
	 */
	public static function option ($cond, $a) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:46: characters 12-39
		if ($cond) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:46: characters 22-29
			return Option::Some($a);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:46: characters 35-39
			return Option::None();
		}
	}

	/**
	 * Returns `true`/`false` if the passed value is `true`/`false` (case insensitive); with any other value it will return null.
	 * 
	 * @param string $v
	 * 
	 * @return bool
	 */
	public static function parse ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:29: characters 65-80
		$_g = \mb_strtolower($v);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:29: lines 29-31
		if ($_g === null) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:31: characters 37-42
			return false;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:29: characters 65-80
			if ($_g === "1" || $_g === "on" || $_g === "true") {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:30: characters 29-33
				return true;
			} else if ($_g === "0" || $_g === "false" || $_g === "off") {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:31: characters 37-42
				return false;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:32: characters 10-11
				$v = $_g;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:32: characters 13-18
				throw Exception::thrown("unable to parse \"" . ($v??'null') . "\"");
			}
		}
	}

	/**
	 * Converts a boolean to an integer value (`true` => `1`, `false` => `0`).
	 * 
	 * @param bool $v
	 * 
	 * @return int
	 */
	public static function toInt ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:16: characters 12-21
		if ($v) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:16: characters 16-17
			return 1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:16: characters 20-21
			return 0;
		}
	}

	/**
	 * Returns `true` when arguments are different.
	 * 
	 * @param bool $a
	 * @param bool $b
	 * 
	 * @return bool
	 */
	public static function xor ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Bools.hx:39: characters 5-18
		return $a !== $b;
	}
}

Boot::registerClass(Bools::class, 'thx.Bools');
