<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx
 */

namespace thx;

use \php\_Boot\HxAnon;
use \php\Boot;
use \thx\_Ord\Ord_Impl_;
use \php\_Boot\HxString;

/**
 * `Floats` contains helper methods to work with `Float` values.
 */
class Floats {
	/**
	 * @var float
	 * Constant value employed to see if two `Float` values are very close.
	 */
	const EPSILON = 1e-9;
	/**
	 * @var float
	 */
	const TOLERANCE = 10e-5;

	/**
	 * @var object
	 */
	static public $monoid;
	/**
	 * @var \Closure
	 * The ordering instance for floating-point values.
	 */
	static public $order;
	/**
	 * @var \EReg
	 */
	static public $pattern_inf;
	/**
	 * @var \EReg
	 */
	static public $pattern_neg_inf;
	/**
	 * @var \EReg
	 */
	static public $pattern_parse;

	/**
	 * Returns the angular distance between 2 angles.
	 * 
	 * @param float $a
	 * @param float $b
	 * @param float $turn
	 * 
	 * @return float
	 */
	public static function angleDifference ($a, $b, $turn = 360.0) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:21: lines 21-28
		if ($turn === null) {
			$turn = 360.0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:22: characters 3-26
		$r = fmod(($b - $a), $turn);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:23: lines 23-24
		if ($r < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:24: characters 4-13
			$r += $turn;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:25: lines 25-26
		if ($r > ($turn / 2)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:26: characters 4-13
			$r -= $turn;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:27: characters 3-11
		return $r;
	}

	/**
	 * `canParse` checks if a string value can be safely converted into a `Float` value.
	 * 
	 * @param string $s
	 * 
	 * @return bool
	 */
	public static function canParse ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:42: characters 10-84
		if (!(Floats::$pattern_parse->match($s) || Floats::$pattern_inf->match($s))) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:42: characters 60-84
			return Floats::$pattern_neg_inf->match($s);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:42: characters 10-84
			return true;
		}
	}

	/**
	 * Rounds a number up to the specified number of decimals.
	 * 
	 * @param float $f
	 * @param int $decimals
	 * 
	 * @return float
	 */
	public static function ceilTo ($f, $decimals) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:34: characters 3-34
		$p = (10 ** $decimals);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:35: characters 3-31
		return \ceil($f * $p) / $p;
	}

	/**
	 * `clamp` restricts a value within the specified range.
	 * ```haxe
	 * trace(1.3.clamp(0, 1)); // prints 1
	 * trace(0.8.clamp(0, 1)); // prints 0.8
	 * trace(-0.5.clamp(0, 1)); // prints 0.0
	 * ```
	 * 
	 * @param float $v
	 * @param float $min
	 * @param float $max
	 * 
	 * @return float
	 */
	public static function clamp ($v, $min, $max) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:54: characters 10-45
		if ($v < $min) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:54: characters 20-23
			return $min;
		} else if ($v > $max) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:54: characters 37-40
			return $max;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:54: characters 43-44
			return $v;
		}
	}

	/**
	 * Like clamp but you only pass one argument (`max`) that is used as the upper limit
	 * and the opposite (additive inverse or `-max`) as the lower limit.
	 * 
	 * @param float $v
	 * @param float $max
	 * 
	 * @return float
	 */
	public static function clampSym ($v, $max) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:61: characters 10-29
		$min = -$max;
		if ($v < $min) {
			return $min;
		} else if ($v > $max) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:61: characters 25-28
			return $max;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:61: characters 16-17
			return $v;
		}
	}

	/**
	 * It returns the comparison value (an integer number) between two `float` values.
	 * 
	 * @param float $a
	 * @param float $b
	 * 
	 * @return int
	 */
	public static function compare ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:67: characters 10-38
		if ($a < $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:67: characters 18-20
			return -1;
		} else if ($a > $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:67: characters 32-33
			return 1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:67: characters 36-37
			return 0;
		}
	}

	/**
	 * Rounds a number down to the specified number of decimals.
	 * 
	 * @param float $f
	 * @param int $decimals
	 * 
	 * @return float
	 */
	public static function floorTo ($f, $decimals) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:73: characters 3-34
		$p = (10 ** $decimals);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:74: characters 3-32
		return \floor($f * $p) / $p;
	}

	/**
	 * @param float $value
	 * 
	 * @return float
	 */
	public static function ftrunc ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:221: characters 10-62
		if ($value < 0.0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:221: characters 24-41
			return \ceil($value);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:221: characters 44-62
			return \floor($value);
		}
	}

	/**
	 * `interpolate` returns a value between `a` and `b` for any value of `f` between 0 and 1.
	 * 
	 * @param float $f
	 * @param float $a
	 * @param float $b
	 * 
	 * @return float
	 */
	public static function interpolate ($f, $a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:81: characters 3-25
		return ($b - $a) * $f + $a;
	}

	/**
	 * Interpolates values in a polar coordinate system looking for the narrowest delta angle.
	 * It can be either clock-wise or counter-clock-wise.
	 * 
	 * @param float $f
	 * @param float $a
	 * @param float $b
	 * @param float $turn
	 * 
	 * @return float
	 */
	public static function interpolateAngle ($f, $a, $b, $turn = 360) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:89: characters 3-80
		if ($turn === null) {
			$turn = 360;
		}
		return Floats::wrapCircular(Floats::interpolate($f, $a, $a + Floats::angleDifference($a, $b, $turn)), $turn);
	}

	/**
	 * Interpolates values in a polar coordinate system always in counter-clock-wise direction.
	 * 
	 * @param float $f
	 * @param float $a
	 * @param float $b
	 * @param float $turn
	 * 
	 * @return float
	 */
	public static function interpolateAngleCCW ($f, $a, $b, $turn = 360) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:114: lines 114-120
		if ($turn === null) {
			$turn = 360;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:115: characters 3-28
		$a = Floats::wrapCircular($a, $turn);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:116: characters 3-28
		$b = Floats::wrapCircular($b, $turn);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:117: lines 117-118
		if ($b > $a) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:118: characters 4-13
			$b -= $turn;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:119: characters 3-50
		return Floats::wrapCircular(Floats::interpolate($f, $a, $b), $turn);
	}

	/**
	 * Interpolates values in a polar coordinate system always in clock-wise direction.
	 * 
	 * @param float $f
	 * @param float $a
	 * @param float $b
	 * @param float $turn
	 * 
	 * @return float
	 */
	public static function interpolateAngleCW ($f, $a, $b, $turn = 360) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:103: lines 103-109
		if ($turn === null) {
			$turn = 360;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:104: characters 3-28
		$a = Floats::wrapCircular($a, $turn);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:105: characters 3-28
		$b = Floats::wrapCircular($b, $turn);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:106: lines 106-107
		if ($b < $a) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:107: characters 4-13
			$b += $turn;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:108: characters 3-50
		return Floats::wrapCircular(Floats::interpolate($f, $a, $b), $turn);
	}

	/**
	 * Interpolates values in a polar coordinate system looking for the wideset delta angle.
	 * It can be either clock-wise or counter-clock-wise.
	 * 
	 * @param float $f
	 * @param float $a
	 * @param float $b
	 * @param float $turn
	 * 
	 * @return float
	 */
	public static function interpolateAngleWidest ($f, $a, $b, $turn = 360) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:97: characters 3-72
		if ($turn === null) {
			$turn = 360;
		}
		return Floats::wrapCircular(Floats::interpolateAngle($f, $a, $b, $turn) - $turn / 2, $turn);
	}

	/**
	 * Return the maximum value between two integers or floats.
	 * 
	 * @param mixed $a
	 * @param mixed $b
	 * 
	 * @return mixed
	 */
	public static function max ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:126: characters 10-23
		if ($a > $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:126: characters 18-19
			return $a;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:126: characters 22-23
			return $b;
		}
	}

	/**
	 * Return the minimum value between two integers or floats.
	 * 
	 * @param mixed $a
	 * @param mixed $b
	 * 
	 * @return mixed
	 */
	public static function min ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:132: characters 10-23
		if ($a < $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:132: characters 18-19
			return $a;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:132: characters 22-23
			return $b;
		}
	}

	/**
	 * Float numbers can sometime introduce tiny errors even for simple operations.
	 * `nearEqualAngles` compares two angles (default is 360deg) using a tiny
	 * tollerance (last optional argument). By default the tollerance is defined as
	 * `EPSILON`.
	 * 
	 * @param float $a
	 * @param float $b
	 * @param float $turn
	 * @param float $tollerance
	 * 
	 * @return bool
	 */
	public static function nearEqualAngles ($a, $b, $turn = 360.0, $tollerance = 1e-9) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:164: characters 3-61
		if ($turn === null) {
			$turn = 360.0;
		}
		if ($tollerance === null) {
			$tollerance = 1e-9;
		}
		return \abs(Floats::angleDifference($a, $b, $turn)) <= $tollerance;
	}

	/**
	 * Float numbers can sometime introduce tiny errors even for simple operations.
	 * `nearEquals` compares two floats using a tiny tollerance (last optional
	 * argument). By default it is defined as `EPSILON`.
	 * 
	 * @param float $a
	 * @param float $b
	 * @param float $tollerance
	 * 
	 * @return bool
	 */
	public static function nearEquals ($a, $b, $tollerance = 1e-9) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:139: lines 139-155
		if ($tollerance === null) {
			$tollerance = 1e-9;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:140: lines 140-146
		if (\is_finite($a)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:142: lines 142-143
			if (!\is_finite($b)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:143: characters 5-17
				return false;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:145: characters 4-40
			return \abs($a - $b) <= $tollerance;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:147: lines 147-148
		if (\is_nan($a)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:148: characters 4-24
			return \is_nan($b);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:149: lines 149-150
		if (\is_nan($b)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:150: characters 4-16
			return false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:151: lines 151-152
		if (!\is_finite($b)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:152: characters 4-29
			return ($a > 0) === ($b > 0);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:154: characters 3-15
		return false;
	}

	/**
	 * `nearZero` finds if the passed number is zero or very close to it. By default
	 * `EPSILON` is used as the tollerance value.
	 * 
	 * @param float $n
	 * @param float $tollerance
	 * 
	 * @return bool
	 */
	public static function nearZero ($n, $tollerance = 1e-9) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:171: characters 3-35
		if ($tollerance === null) {
			$tollerance = 1e-9;
		}
		return \abs($n) <= $tollerance;
	}

	/**
	 * `normalize` clamps the passwed value between 0 and 1.
	 * 
	 * @param float $v
	 * 
	 * @return float
	 */
	public static function normalize ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:177: characters 10-24
		if ($v < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:177: characters 19-20
			return 0;
		} else if ($v > 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:177: characters 22-23
			return 1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:177: characters 16-17
			return $v;
		}
	}

	/**
	 * `parse` can parse a string and tranform it into a `Float` value.
	 * 
	 * @param string $s
	 * 
	 * @return float
	 */
	public static function parse ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:183: lines 183-184
		if (HxString::substring($s, 0, 1) === "+") {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:184: characters 4-22
			$s = HxString::substring($s, 1);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:185: characters 10-139
		if (Floats::$pattern_inf->match($s)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:185: characters 36-58
			return \Math::$POSITIVE_INFINITY;
		} else if (Floats::$pattern_neg_inf->match($s)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:185: characters 94-116
			return \Math::$NEGATIVE_INFINITY;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:185: characters 122-139
			return \Std::parseFloat($s);
		}
	}

	/**
	 * Computes the nth root (`index`) of `base`.
	 * 
	 * @param float $base
	 * @param float $index
	 * 
	 * @return float
	 */
	public static function root ($base, $index) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:192: characters 3-35
		return ($base ** (1 / $index));
	}

	/**
	 * Rounds a number to the specified number of decimals.
	 * 
	 * @param float $f
	 * @param int $decimals
	 * 
	 * @return float
	 */
	public static function roundTo ($f, $decimals) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:198: characters 3-34
		$p = (10 ** $decimals);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:199: characters 3-32
		return \floor($f * $p + 0.5) / $p;
	}

	/**
	 * `sign` returns `-1` if `value` is a negative number, `1` otherwise.
	 * 
	 * @param mixed $value
	 * 
	 * @return int
	 */
	public static function sign ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:206: characters 10-28
		if ($value < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:206: characters 22-24
			return -1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:206: characters 27-28
			return 1;
		}
	}

	/**
	 * Alias for parse, mainly for disambiguation with other parses using mega Thx.
	 * 
	 * @param string $s
	 * 
	 * @return float
	 */
	public static function toFloat ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:215: characters 3-25
		return Floats::parse($s);
	}

	/**
	 * @param float $v
	 * 
	 * @return string
	 */
	public static function toString ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:209: characters 3-14
		return "" . ($v??'null');
	}

	/**
	 * @param float $value
	 * 
	 * @return int
	 */
	public static function trunc ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:218: characters 10-60
		if ($value < 0.0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:218: characters 24-40
			return (int)(\ceil($value));
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:218: characters 43-60
			return (int)(\floor($value));
		}
	}

	/**
	 * Passed two boundaries values (`min`, `max`), `wrap` ensures that the passed value `v` will
	 * be included in the boundaries. If the value exceeds `max`, the value is reduced by `min`
	 * repeatedely until it falls within the range. Similar and inverted treatment is performed if
	 * the value is below `min`.
	 * 
	 * @param float $v
	 * @param float $min
	 * @param float $max
	 * 
	 * @return float
	 */
	public static function wrap ($v, $min, $max) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:230: characters 3-29
		$range = $max - $min + 1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:231: lines 231-232
		if ($v < $min) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:232: characters 4-40
			$v += $range * (($min - $v) / $range + 1);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:233: characters 3-33
		return $min + fmod(($v - $min), $range);
	}

	/**
	 * Similar to `wrap`, it works for numbers between 0 and `max`.
	 * 
	 * @param float $v
	 * @param float $max
	 * 
	 * @return float
	 */
	public static function wrapCircular ($v, $max) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:240: characters 3-14
		$v = fmod($v, $max);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:241: lines 241-242
		if ($v < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:242: characters 4-12
			$v += $max;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:243: characters 3-11
		return $v;
	}

	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


		self::$pattern_parse = new \EReg("^(\\+|-)?(:?\\d+(\\.\\d+)?(e-?\\d+)?|nan|NaN|NAN)\$", "");
		self::$pattern_inf = new \EReg("^\\+?(inf|Inf|INF)\$", "");
		self::$pattern_neg_inf = new \EReg("^-(inf|Inf|INF)\$", "");
		self::$order = Ord_Impl_::fromIntComparison(Boot::getStaticClosure(Floats::class, 'compare'));
		self::$monoid = new _HxAnon_Floats0(0.0, function ($a, $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Floats.hx:251: characters 106-118
			return $a + $b;
		});
	}
}

class _HxAnon_Floats0 extends HxAnon {
	function __construct($zero, $append) {
		$this->zero = $zero;
		$this->append = $append;
	}
}

Boot::registerClass(Floats::class, 'thx.Floats');
Floats::__hx__init();
