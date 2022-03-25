<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx
 */

namespace thx;

use \php\_Boot\HxAnon;
use \php\Boot;
use \haxe\Exception;
use \php\_Boot\HxString;
use \haxe\NativeStackTrace;

/**
 * Extension methods for integer values.
 */
class Ints {
	/**
	 * @var string
	 */
	static public $BASE = "0123456789abcdefghijklmnopqrstuvwxyz";
	/**
	 * @var object
	 */
	static public $monoid;
	/**
	 * @var \Closure
	 */
	static public $order;
	/**
	 * @var \EReg
	 */
	static public $pattern_parse;

	/**
	 * `abs` returns the absolute integer value of the passed argument.
	 * 
	 * @param int $v
	 * 
	 * @return int
	 */
	public static function abs ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:21: characters 10-24
		if ($v < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:21: characters 18-20
			return -$v;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:21: characters 23-24
			return $v;
		}
	}

	/**
	 * `canParse` takes a string and return a boolean indicating if the argument can be safely transformed
	 * into a valid integer value.
	 * 
	 * @param string $s
	 * 
	 * @return bool
	 */
	public static function canParse ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:28: characters 3-32
		return Ints::$pattern_parse->match($s);
	}

	/**
	 * `clamp` restricts a value within the specified range.
	 * 
	 * @param int $v
	 * @param int $min
	 * @param int $max
	 * 
	 * @return int
	 */
	public static function clamp ($v, $min, $max) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:34: characters 10-45
		if ($v < $min) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:34: characters 20-23
			return $min;
		} else if ($v > $max) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:34: characters 37-40
			return $max;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:34: characters 43-44
			return $v;
		}
	}

	/**
	 * Like clamp but you only pass one argument (`max`) that is used as the upper limit
	 * and the opposite (additive inverse or `-max`) as the lower limit.
	 * 
	 * @param int $v
	 * @param int $max
	 * 
	 * @return int
	 */
	public static function clampSym ($v, $max) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:41: characters 10-29
		$min = -$max;
		if ($v < $min) {
			return $min;
		} else if ($v > $max) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:41: characters 25-28
			return $max;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:41: characters 16-17
			return $v;
		}
	}

	/**
	 * Return a comparison value between `a` and `b`. The number is negative if `a` is
	 * greater than `b`, positive if `a` is lesser than `b` or zero if `a` and `b` are
	 * equals.
	 * 
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function compare ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:49: characters 3-15
		return $a - $b;
	}

	/**
	 * Returns the greater common denominator
	 * 
	 * @param int $m
	 * @param int $n
	 * 
	 * @return int
	 */
	public static function gcd ($m, $n) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:55: characters 7-13
		if ($m < 0) {
			$m = -$m;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:56: characters 7-13
		if ($n < 0) {
			$n = -$n;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:57: characters 3-9
		$t = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:58: lines 58-64
		while (true) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:59: lines 59-60
			if ($n === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:60: characters 5-13
				return $m;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:61: characters 4-9
			$t = $m;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:62: characters 4-9
			$m = $n;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:63: characters 4-13
			$n = $t % $m;
		}
	}

	/**
	 * Given a value `t` between 0 and 1, it interpolates that value in the range between `a` and `b`.
	 * The returned value is a rounded integer.
	 * 
	 * @param float $f
	 * @param float $a
	 * @param float $b
	 * 
	 * @return int
	 */
	public static function interpolate ($f, $a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:73: characters 3-37
		return (int)(\floor($a + ($b - $a) * $f + 0.5));
	}

	/**
	 * `isEven` returns `true` if `v` is even, `false` otherwise.
	 * 
	 * @param int $v
	 * 
	 * @return bool
	 */
	public static function isEven ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:79: characters 3-20
		return ($v % 2) === 0;
	}

	/**
	 * `isOdd` returns `true` if `v` is odd, `false` otherwise.
	 * 
	 * @param int $v
	 * 
	 * @return bool
	 */
	public static function isOdd ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:85: characters 3-20
		return ($v % 2) !== 0;
	}

	/**
	 * Returns the least common multiple
	 * 
	 * @param int $m
	 * @param int $n
	 * 
	 * @return int
	 */
	public static function lcm ($m, $n) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:100: characters 7-13
		if ($m < 0) {
			$m = -$m;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:101: characters 7-13
		if ($n < 0) {
			$n = -$n;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:102: lines 102-103
		if ($n === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:103: characters 4-12
			return $m;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:104: characters 3-36
		return $m * (int)(($n / Ints::gcd($m, $n)));
	}

	/**
	 * @param int $v
	 * @param string $pad
	 * @param int $len
	 * 
	 * @return string
	 */
	public static function lpad ($v, $pad, $len) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:87: lines 87-94
		if ($pad === null) {
			$pad = "0";
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:88: characters 3-19
		$neg = false;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:89: lines 89-92
		if ($v < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:90: characters 4-14
			$neg = true;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:91: characters 4-10
			$v = -$v;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:93: characters 3-61
		return ((($neg ? "-" : ""))??'null') . (\StringTools::lpad("" . ($v??'null'), $pad, $len)??'null');
	}

	/**
	 * It returns the maximum value between `a` and `b`.
	 * 
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function max ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:114: characters 10-23
		if ($a > $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:114: characters 18-19
			return $a;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:114: characters 22-23
			return $b;
		}
	}

	/**
	 * It returns the minimum value between `a` and `b`.
	 * 
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function min ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:120: characters 10-23
		if ($a < $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:120: characters 18-19
			return $a;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:120: characters 22-23
			return $b;
		}
	}

	/**
	 * Parses a string into an Int value using the provided base. Default base is 16 for strings that begin with
	 * 0x (after optional sign) or 10 otherwise.
	 * 
	 * @param string $s
	 * @param int $base
	 * 
	 * @return int
	 */
	public static function parse ($s, $base = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:142: lines 142-143
		if (($base !== null) && (($base < 2) || ($base > mb_strlen(Ints::$BASE)))) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:143: characters 11-16
			throw Exception::thrown("invalid base " . ($base??'null') . ", it must be between 2 and " . (mb_strlen(Ints::$BASE)??'null'));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:145: characters 7-29
		$s = \mb_strtolower(\trim($s));
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:147: lines 147-155
		$sign = null;
		if (\StringTools::startsWith($s, "+")) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:148: characters 4-22
			$s = HxString::substring($s, 1);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:147: lines 147-155
			$sign = 1;
		} else if (\StringTools::startsWith($s, "-")) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:151: characters 4-22
			$s = HxString::substring($s, 1);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:147: lines 147-155
			$sign = -1;
		} else {
			$sign = 1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:157: lines 157-158
		if (mb_strlen($s) === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:158: characters 4-15
			return null;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:160: lines 160-167
		if (\StringTools::startsWith($s, "0x")) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:161: lines 161-162
			if ((null !== $base) && (16 !== $base)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:162: characters 5-16
				return null;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:163: characters 4-13
			$base = 16;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:164: characters 4-22
			$s = HxString::substring($s, 2);
		} else if (null === $base) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:166: characters 4-13
			$base = 10;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:169: characters 3-15
		$acc = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:170: lines 170-177
		try {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:171: lines 171-176
			Strings::map($s, function ($c) use (&$acc, &$base) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:172: characters 5-29
				$i = HxString::indexOf(Ints::$BASE, $c);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:173: lines 173-174
				if (($i < 0) || ($i >= $base)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:174: characters 6-11
					throw Exception::thrown("invalid");
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:175: characters 5-27
				$acc = $acc * $base + $i;
			});
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:177: characters 10-11
			NativeStackTrace::saveStack($_g);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:178: characters 3-20
		return $acc * $sign;
	}

	/**
	 * Integer random function that includes both upper and lower limits. A roll on a die with
	 * 6 sides would be the equivalent to the following:
	 * ```haxe
	 * var d6 = Ints.random(1, 6);
	 * ```
	 * 
	 * @param int $min
	 * @param int $max
	 * 
	 * @return int
	 */
	public static function random ($min, $max) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:191: characters 3-41
		if ($min === null) {
			$min = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:191: characters 10-35
		$x = $max - $min + 1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:191: characters 3-41
		return (($x <= 1 ? 0 : \mt_rand(0, $x - 1))) + $min;
	}

	/**
	 * `range` creates an array of integer containing values between  start (included) and stop (excluded)
	 * with a progression set by `step`. A negative value for `step` can be used but in that
	 * case start will need to be a greater value than stop.
	 * 
	 * @param int $start
	 * @param int $stop
	 * @param int $step
	 * 
	 * @return int[]|\Array_hx
	 */
	public static function range ($start, $stop = null, $step = 1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:198: lines 198-213
		if ($step === null) {
			$step = 1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:199: lines 199-202
		if (null === $stop) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:200: characters 4-16
			$stop = $start;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:201: characters 4-13
			$start = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:203: lines 203-204
		if (Boot::equal((($stop - $start) / $step), \Math::$POSITIVE_INFINITY)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:204: characters 4-9
			throw Exception::thrown("infinite range");
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:205: characters 3-29
		$range = new \Array_hx();
		$i = -1;
		$j = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:206: lines 206-211
		if ($step < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:207: lines 207-208
			while (true) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:207: characters 11-35
				$j = $start + $step * ++$i;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:207: lines 207-208
				if (!($j > $stop)) {
					break;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:208: characters 5-18
				$range->arr[$range->length++] = $j;
			}
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:210: lines 210-211
			while (true) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:210: characters 11-35
				$j = $start + $step * ++$i;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:210: lines 210-211
				if (!($j < $stop)) {
					break;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:211: characters 5-18
				$range->arr[$range->length++] = $j;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:212: characters 3-15
		return $range;
	}

	/**
	 * @param int $start
	 * @param int $stop
	 * @param int $step
	 * 
	 * @return object
	 */
	public static function rangeIter ($start, $stop = null, $step = 1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:216: characters 3-46
		if ($step === null) {
			$step = 1;
		}
		return new RangeIterator($start, $stop, $step);
	}

	/**
	 * @param int $v
	 * @param string $pad
	 * @param int $len
	 * 
	 * @return string
	 */
	public static function rpad ($v, $pad, $len) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:108: characters 3-42
		if ($pad === null) {
			$pad = "0";
		}
		return \StringTools::rpad("" . ($v??'null'), $pad, $len);
	}

	/**
	 * `sign` returns `-1` if `value` is a negative number, `1` otherwise.
	 * 
	 * @param int $value
	 * 
	 * @return int
	 */
	public static function sign ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:271: characters 10-28
		if ($value < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:271: characters 22-24
			return -1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:271: characters 27-28
			return 1;
		}
	}

	/**
	 * Alias for toString, mainly for disambig. with standard toString using mega Thx.
	 * Should toString just be renamed to this? At least with this, existing code
	 * doesn't break.
	 * 
	 * @param int $value
	 * @param int $base
	 * 
	 * @return string
	 */
	public static function toBase ($value, $base) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:253: characters 3-36
		return Ints::toString($value, $base);
	}

	/**
	 * Converts an integer value into a boolean. Any value different from `0` will evaluate to `true`.
	 * 
	 * @param int $v
	 * 
	 * @return bool
	 */
	public static function toBool ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:259: characters 3-16
		return $v !== 0;
	}

	/**
	 * Alias for parse, mainly for disambiguation with other parses using mega Thx.
	 * 
	 * @param string $s
	 * @param int $base
	 * 
	 * @return int
	 */
	public static function toInt ($s, $base = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:265: characters 3-29
		return Ints::parse($s, $base);
	}

	/**
	 * Transform an `Int` value to a `String` using the specified `base`
	 * 
	 * @param int $value
	 * @param int $base
	 * 
	 * @return string
	 */
	public static function toString ($value, $base) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:232: lines 232-233
		if (($base < 2) || ($base > mb_strlen(Ints::$BASE))) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:233: characters 11-16
			throw Exception::thrown("invalid base " . ($base??'null') . ", it must be between 2 and " . (mb_strlen(Ints::$BASE)??'null'));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:234: lines 234-235
		if (($base === 10) || ($value === 0)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:235: characters 4-19
			return "" . ($value??'null');
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:237: characters 3-39
		$buf = "";
		$abs = ($value < 0 ? -$value : $value);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:238: lines 238-241
		while ($abs > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:239: characters 10-33
			$index = $abs % $base;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:239: characters 4-39
			$buf = ((($index < 0 ? "" : \mb_substr(Ints::$BASE, $index, 1)))??'null') . ($buf??'null');
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:240: characters 4-29
			$abs = (int)(($abs / $base));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:243: characters 3-38
		return ((($value < 0 ? "-" : ""))??'null') . ($buf??'null');
	}

	/**
	 * Similar to `wrap`, it works for numbers between 0 and `max`.
	 * 
	 * @param int $v
	 * @param int $max
	 * 
	 * @return int
	 */
	public static function wrapCircular ($v, $max) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:277: characters 3-14
		$v %= $max;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:278: lines 278-279
		if ($v < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:279: characters 4-12
			$v += $max;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:280: characters 3-11
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


		self::$pattern_parse = new \EReg("^[ \x09\x0D\x0A]*[+-]?(\\d+|0x[0-9A-F]+)", "i");
		self::$order = function ($i0, $i1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:284: characters 10-55
			if ($i0 > $i1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:284: characters 23-25
				return OrderingImpl::GT();
			} else if ($i0 === $i1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:284: characters 45-47
				return OrderingImpl::EQ();
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:284: characters 53-55
				return OrderingImpl::LT();
			}
		};
		self::$monoid = new _HxAnon_Ints0(0, function ($a, $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:287: characters 98-110
			return $a + $b;
		});
	}
}

class _HxAnon_Ints0 extends HxAnon {
	function __construct($zero, $append) {
		$this->zero = $zero;
		$this->append = $append;
	}
}

Boot::registerClass(Ints::class, 'thx.Ints');
Ints::__hx__init();
