<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:18: characters 12-26
		if ($v < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:18: characters 20-22
			return -$v;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:18: characters 25-26
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:25: characters 5-34
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:31: characters 12-47
		if ($v < $min) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:31: characters 22-25
			return $min;
		} else if ($v > $max) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:31: characters 39-42
			return $max;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:31: characters 45-46
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:38: characters 12-31
		$min = -$max;
		if ($v < $min) {
			return $min;
		} else if ($v > $max) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:38: characters 27-30
			return $max;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:38: characters 18-19
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:46: characters 5-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:52: characters 9-15
		if ($m < 0) {
			$m = -$m;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:53: characters 9-15
		if ($n < 0) {
			$n = -$n;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:54: characters 5-11
		$t = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:55: lines 55-60
		while (true) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:56: characters 7-26
			if ($n === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:56: characters 18-26
				return $m;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:57: characters 7-12
			$t = $m;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:58: characters 7-12
			$m = $n;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:59: characters 7-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:69: characters 5-39
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:75: characters 5-22
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:81: characters 5-22
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:96: characters 9-15
		if ($m < 0) {
			$m = -$m;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:97: characters 9-15
		if ($n < 0) {
			$n = -$n;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:98: characters 5-24
		if ($n === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:98: characters 16-24
			return $m;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:99: characters 5-38
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:83: lines 83-90
		if ($pad === null) {
			$pad = "0";
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:84: characters 5-21
		$neg = false;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:85: lines 85-88
		if ($v < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:86: characters 7-17
			$neg = true;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:87: characters 7-13
			$v = -$v;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:89: characters 5-63
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:109: characters 12-25
		if ($a > $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:109: characters 20-21
			return $a;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:109: characters 24-25
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:115: characters 12-25
		if ($a < $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:115: characters 20-21
			return $a;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:115: characters 24-25
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:137: lines 137-138
		if (($base !== null) && (($base < 2) || ($base > mb_strlen(Ints::$BASE)))) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:138: characters 14-19
			throw Exception::thrown("invalid base " . ($base??'null') . ", it must be between 2 and " . (mb_strlen(Ints::$BASE)??'null'));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:140: characters 9-31
		$s = \mb_strtolower(\trim($s));
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:142: lines 142-150
		$sign = null;
		if (\StringTools::startsWith($s, "+")) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:143: characters 11-29
			$s = HxString::substring($s, 1);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:142: lines 142-150
			$sign = 1;
		} else if (\StringTools::startsWith($s, "-")) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:146: characters 11-29
			$s = HxString::substring($s, 1);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:142: lines 142-150
			$sign = -1;
		} else {
			$sign = 1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:152: lines 152-153
		if (mb_strlen($s) === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:153: characters 7-18
			return null;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:155: lines 155-162
		if (\StringTools::startsWith($s, "0x")) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:156: lines 156-157
			if ((null !== $base) && (16 !== $base)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:157: characters 9-20
				return null;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:158: characters 7-16
			$base = 16;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:159: characters 7-25
			$s = HxString::substring($s, 2);
		} else if (null === $base) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:161: characters 7-16
			$base = 10;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:164: characters 5-17
		$acc = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:165: lines 165-169
		try {
			Strings::map($s, function ($c) use (&$acc, &$base) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:166: characters 7-31
				$i = HxString::indexOf(Ints::$BASE, $c);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:167: characters 7-35
				if (($i < 0) || ($i >= $base)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:167: characters 30-35
					throw Exception::thrown("invalid");
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:168: characters 7-29
				$acc = $acc * $base + $i;
			});
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:169: characters 14-15
			NativeStackTrace::saveStack($_g);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:170: characters 5-22
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:183: characters 5-43
		if ($min === null) {
			$min = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:183: characters 12-37
		$x = $max - $min + 1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:183: characters 5-43
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:190: lines 190-202
		if ($step === null) {
			$step = 1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:191: lines 191-194
		if (null === $stop) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:192: characters 7-19
			$stop = $start;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:193: characters 7-16
			$start = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:195: characters 5-62
		if (Boot::equal((($stop - $start) / $step), \Math::$POSITIVE_INFINITY)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:195: characters 57-62
			throw Exception::thrown("infinite range");
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:196: characters 5-31
		$range = new \Array_hx();
		$i = -1;
		$j = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:197: lines 197-200
		if ($step < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:198: characters 7-60
			while (true) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:198: characters 14-38
				$j = $start + $step * ++$i;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:198: characters 7-60
				if (!($j > $stop)) {
					break;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:198: characters 47-60
				$range->arr[$range->length++] = $j;
			}
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:200: characters 7-60
			while (true) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:200: characters 14-38
				$j = $start + $step * ++$i;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:200: characters 7-60
				if (!($j < $stop)) {
					break;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:200: characters 47-60
				$range->arr[$range->length++] = $j;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:201: characters 5-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:205: characters 5-48
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:103: characters 5-44
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:260: characters 12-30
		if ($value < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:260: characters 24-26
			return -1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:260: characters 29-30
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:242: characters 5-38
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:248: characters 5-18
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:254: characters 5-31
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:220: lines 220-221
		if (($base < 2) || ($base > mb_strlen(Ints::$BASE))) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:221: characters 14-19
			throw Exception::thrown("invalid base " . ($base??'null') . ", it must be between 2 and " . (mb_strlen(Ints::$BASE)??'null'));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:222: lines 222-223
		if (($base === 10) || ($value === 0)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:223: characters 7-22
			return "" . ($value??'null');
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:225: lines 225-226
		$buf = "";
		$abs = ($value < 0 ? -$value : $value);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:227: lines 227-230
		while ($abs > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:228: characters 13-36
			$index = $abs % $base;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:228: characters 7-42
			$buf = ((($index < 0 ? "" : \mb_substr(Ints::$BASE, $index, 1)))??'null') . ($buf??'null');
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:229: characters 7-32
			$abs = (int)(($abs / $base));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:232: characters 5-40
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:266: characters 5-16
		$v %= $max;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:267: lines 267-268
		if ($v < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:268: characters 7-15
			$v += $max;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:269: characters 5-13
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:273: characters 31-76
			if ($i0 > $i1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:273: characters 44-46
				return OrderingImpl::GT();
			} else if ($i0 === $i1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:273: characters 66-68
				return OrderingImpl::EQ();
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:273: characters 74-76
				return OrderingImpl::LT();
			}
		};
		self::$monoid = new _HxAnon_Ints0(0, function ($a, $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:276: characters 49-61
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
