<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:20: lines 20-27
		if ($turn === null) {
			$turn = 360.0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:21: characters 5-28
		$r = fmod(($b - $a), $turn);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:22: lines 22-23
		if ($r < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:23: characters 7-16
			$r += $turn;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:24: lines 24-25
		if ($r > ($turn / 2)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:25: characters 7-16
			$r -= $turn;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:26: characters 5-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:41: characters 12-86
		if (!(Floats::$pattern_parse->match($s) || Floats::$pattern_inf->match($s))) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:41: characters 62-86
			return Floats::$pattern_neg_inf->match($s);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:41: characters 12-86
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:33: characters 5-36
		$p = (10 ** $decimals);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:34: characters 5-33
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:53: characters 12-47
		if ($v < $min) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:53: characters 22-25
			return $min;
		} else if ($v > $max) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:53: characters 39-42
			return $max;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:53: characters 45-46
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:60: characters 12-31
		$min = -$max;
		if ($v < $min) {
			return $min;
		} else if ($v > $max) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:60: characters 27-30
			return $max;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:60: characters 18-19
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:66: characters 12-40
		if ($a < $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:66: characters 20-22
			return -1;
		} else if ($a > $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:66: characters 34-35
			return 1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:66: characters 38-39
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:72: characters 5-36
		$p = (10 ** $decimals);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:73: characters 5-34
		return \floor($f * $p) / $p;
	}

	/**
	 * @param float $value
	 * 
	 * @return float
	 */
	public static function ftrunc ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:220: characters 12-64
		if ($value < 0.0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:220: characters 26-43
			return \ceil($value);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:220: characters 46-64
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:80: characters 5-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:88: characters 5-82
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:113: lines 113-119
		if ($turn === null) {
			$turn = 360;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:114: characters 5-30
		$a = Floats::wrapCircular($a, $turn);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:115: characters 5-30
		$b = Floats::wrapCircular($b, $turn);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:116: lines 116-117
		if ($b > $a) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:117: characters 7-16
			$b -= $turn;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:118: characters 5-52
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:102: lines 102-108
		if ($turn === null) {
			$turn = 360;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:103: characters 5-30
		$a = Floats::wrapCircular($a, $turn);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:104: characters 5-30
		$b = Floats::wrapCircular($b, $turn);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:105: lines 105-106
		if ($b < $a) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:106: characters 7-16
			$b += $turn;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:107: characters 5-52
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:96: characters 5-74
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:125: characters 12-25
		if ($a > $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:125: characters 20-21
			return $a;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:125: characters 24-25
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:131: characters 12-25
		if ($a < $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:131: characters 20-21
			return $a;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:131: characters 24-25
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:163: characters 5-63
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:138: lines 138-154
		if ($tollerance === null) {
			$tollerance = 1e-9;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:139: lines 139-145
		if (\is_finite($a)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:141: lines 141-142
			if (!\is_finite($b)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:142: characters 9-21
				return false;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:144: characters 7-43
			return \abs($a - $b) <= $tollerance;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:146: lines 146-147
		if (\is_nan($a)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:147: characters 7-27
			return \is_nan($b);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:148: lines 148-149
		if (\is_nan($b)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:149: characters 7-19
			return false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:150: lines 150-151
		if (!\is_finite($b)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:151: characters 7-32
			return ($a > 0) === ($b > 0);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:153: characters 5-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:170: characters 5-37
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:176: characters 12-26
		if ($v < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:176: characters 21-22
			return 0;
		} else if ($v > 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:176: characters 24-25
			return 1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:176: characters 18-19
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:182: lines 182-183
		if (HxString::substring($s, 0, 1) === "+") {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:183: characters 7-25
			$s = HxString::substring($s, 1);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:184: characters 12-141
		if (Floats::$pattern_inf->match($s)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:184: characters 38-60
			return \Math::$POSITIVE_INFINITY;
		} else if (Floats::$pattern_neg_inf->match($s)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:184: characters 96-118
			return \Math::$NEGATIVE_INFINITY;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:184: characters 124-141
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:191: characters 5-37
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:197: characters 5-36
		$p = (10 ** $decimals);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:198: characters 5-34
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:205: characters 12-30
		if ($value < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:205: characters 24-26
			return -1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:205: characters 29-30
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:214: characters 5-27
		return Floats::parse($s);
	}

	/**
	 * @param float $v
	 * 
	 * @return string
	 */
	public static function toString ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:208: characters 5-16
		return "" . ($v??'null');
	}

	/**
	 * @param float $value
	 * 
	 * @return int
	 */
	public static function trunc ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:217: characters 12-62
		if ($value < 0.0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:217: characters 26-42
			return (int)(\ceil($value));
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:217: characters 45-62
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:229: characters 5-31
		$range = $max - $min + 1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:230: characters 5-54
		if ($v < $min) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:230: characters 18-54
			$v += $range * (($min - $v) / $range + 1);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:231: characters 5-35
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:238: characters 5-16
		$v = fmod($v, $max);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:239: lines 239-240
		if ($v < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:240: characters 7-15
			$v += $max;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:241: characters 5-13
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Floats.hx:250: characters 55-67
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
