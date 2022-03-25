<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:22: characters 17-32
		$_g = \mb_strtolower($v);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:22: lines 22-23
		if ($_g === null) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:23: characters 55-59
			return true;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:22: characters 17-32
			if ($_g === "0" || $_g === "1" || $_g === "false" || $_g === "off" || $_g === "on" || $_g === "true") {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:23: characters 55-59
				return true;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:24: characters 12-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:10: characters 10-35
		if ($a === $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:10: characters 19-20
			return 0;
		} else if ($a) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:10: characters 28-30
			return -1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:10: characters 33-34
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:48: characters 10-37
		if ($cond) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:48: characters 20-27
			return Option::Some($a);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:48: characters 33-37
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:31: characters 17-32
		$_g = \mb_strtolower($v);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:31: lines 31-33
		if ($_g === null) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:33: characters 36-41
			return false;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:31: characters 17-32
			if ($_g === "1" || $_g === "on" || $_g === "true") {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:32: characters 28-32
				return true;
			} else if ($_g === "0" || $_g === "false" || $_g === "off") {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:33: characters 36-41
				return false;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:34: characters 9-10
				$v = $_g;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:34: characters 12-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:16: characters 10-19
		if ($v) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:16: characters 14-15
			return 1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:16: characters 18-19
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Bools.hx:41: characters 3-16
		return $a !== $b;
	}
}

Boot::registerClass(Bools::class, 'thx.Bools');
