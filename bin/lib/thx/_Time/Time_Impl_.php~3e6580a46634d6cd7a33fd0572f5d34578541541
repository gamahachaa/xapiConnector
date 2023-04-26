<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx
 */

namespace thx\_Time;

use \haxe\_Int64\Int64_Impl_;
use \thx\Strings;
use \php\_Boot\HxAnon;
use \thx\Int64s;
use \haxe\_Int64\___Int64;
use \php\Boot;
use \haxe\Exception;
use \thx\Ints;
use \thx\Error;
use \php\_Boot\HxString;
use \thx\_DateTimeUtc\DateTimeUtc_Impl_;
use \haxe\_Int32\Int32_Impl_;

final class Time_Impl_ {
	/**
	 * @var ___Int64
	 */
	static public $oneDay;
	/**
	 * @var ___Int64
	 */
	static public $zero;

	/**
	 * @param ___Int64 $ticks
	 * 
	 * @return ___Int64
	 */
	public static function _new ($ticks) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:81: character 2
		$this1 = $ticks;
		return $this1;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function abs ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:102: characters 10-19
		$a = $this1;
		$b_high = 0;
		$b_low = 0;
		$v = (($a->high - $b_high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b_low);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:102: characters 10-56
		if ((($a->high < 0 ? ($b_high < 0 ? $v : -1) : ($b_high >= 0 ? $v : 1))) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:102: characters 31-37
			$x = $this1;
			$high = (~$x->high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = ((~$x->low + 1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if ($low === 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:225: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:102: characters 31-37
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:102: characters 22-38
			$this3 = $this2;
			return $this3;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:102: characters 41-56
			$this2 = $this1;
			return $this2;
		}
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $that
	 * 
	 * @return ___Int64
	 */
	public static function add ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:120: characters 19-37
		$a = $this1;
		$b = $that;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:120: characters 10-38
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $that
	 * 
	 * @return ___Int64
	 */
	public static function addTicks ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:123: characters 19-31
		$a = $this1;
		$high = (($a->high + $that->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $that->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:123: characters 10-32
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param ___Int64 $a
	 * @param ___Int64 $b
	 * 
	 * @return int
	 */
	public static function compare ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:73: characters 3-24
		return Int64s::compare($a, $b);
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $that
	 * 
	 * @return int
	 */
	public static function compareTo ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:129: characters 3-43
		return Int64s::compare($this1, $that);
	}

	/**
	 * @param int $hours
	 * @param int $minutes
	 * @param int $seconds
	 * @param int $milliseconds
	 * 
	 * @return ___Int64
	 */
	public static function create ($hours, $minutes = 0, $seconds = 0, $milliseconds = 0) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:76: characters 3-98
		if ($minutes === null) {
			$minutes = 0;
		}
		if ($seconds === null) {
			$seconds = 0;
		}
		if ($milliseconds === null) {
			$milliseconds = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:76: characters 19-97
		$a = Time_Impl_::timeToTicks($hours, $minutes, $seconds);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:76: characters 59-96
		$a_high = $milliseconds >> 31;
		$a_low = $milliseconds;
		$b = DateTimeUtc_Impl_::$ticksPerMillisecondI64;
		$mask = 65535;
		$al = $a_low & $mask;
		$ah = Boot::shiftRightUnsigned($a_low, 16);
		$bl = $b->low & $mask;
		$bh = Boot::shiftRightUnsigned($b->low, 16);
		$p00 = Int32_Impl_::mul($al, $bl);
		$p10 = Int32_Impl_::mul($ah, $bl);
		$p01 = Int32_Impl_::mul($al, $bh);
		$p11 = Int32_Impl_::mul($ah, $bh);
		$low = $p00;
		$high = ((((($p11 + (Boot::shiftRightUnsigned($p01, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) + (Boot::shiftRightUnsigned($p10, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:302: characters 3-6
		$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:303: characters 3-6
		$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:76: characters 59-96
		if (Int32_Impl_::ucompare($low, $p01) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
		$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
		$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:76: characters 59-96
		if (Int32_Impl_::ucompare($low, $p10) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:76: characters 59-96
		$high = (($high + (((Int32_Impl_::mul($a_low, $b->high) + Int32_Impl_::mul($a_high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$b_high = $high;
		$b_low = $low;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:76: characters 19-97
		$high = (($a->high + $b_high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b_low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:76: characters 19-97
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:76: characters 10-98
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param int $days
	 * @param int $hours
	 * @param int $minutes
	 * @param int $seconds
	 * @param int $milliseconds
	 * 
	 * @return ___Int64
	 */
	public static function createDays ($days, $hours = 0, $minutes = 0, $seconds = 0, $milliseconds = 0) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:79: characters 3-67
		if ($hours === null) {
			$hours = 0;
		}
		if ($minutes === null) {
			$minutes = 0;
		}
		if ($seconds === null) {
			$seconds = 0;
		}
		if ($milliseconds === null) {
			$milliseconds = 0;
		}
		return Time_Impl_::create($days * 24 + $hours, $minutes, $seconds, $milliseconds);
	}

	/**
	 * @param ___Int64 $self
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function equals ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:136: characters 10-34
		$a = $self;
		$b = $that;
		if ($a->high === $b->high) {
			return $a->low === $b->low;
		} else {
			return false;
		}
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function equalsTo ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:132: characters 10-29
		$a = $this1;
		$b = $that;
		if ($a->high === $b->high) {
			return $a->low === $b->low;
		} else {
			return false;
		}
	}

	/**
	 * @param int $days
	 * 
	 * @return ___Int64
	 */
	public static function fromDays ($days) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:15: characters 3-36
		return Time_Impl_::create(24 * $days, 0, 0, 0);
	}

	/**
	 * @param int $hours
	 * 
	 * @return ___Int64
	 */
	public static function fromHours ($hours) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:18: characters 3-32
		return Time_Impl_::create($hours, 0, 0, 0);
	}

	/**
	 * @param int $milliseconds
	 * 
	 * @return ___Int64
	 */
	public static function fromMilliseconds ($milliseconds) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:27: characters 3-39
		return Time_Impl_::create(0, 0, 0, $milliseconds);
	}

	/**
	 * @param int $minutes
	 * 
	 * @return ___Int64
	 */
	public static function fromMinutes ($minutes) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:21: characters 3-34
		return Time_Impl_::create(0, $minutes, 0, 0);
	}

	/**
	 * @param int $seconds
	 * 
	 * @return ___Int64
	 */
	public static function fromSeconds ($seconds) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:24: characters 3-34
		return Time_Impl_::create(0, 0, $seconds, 0);
	}

	/**
	 * @param string $s
	 * 
	 * @return ___Int64
	 */
	public static function fromString ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:43: characters 3-94
		$pattern = new \EReg("^([-+])?(?:(\\d+)[.](\\d{1,2})|(\\d+))[:](\\d{2})(?:[:](\\d{2})(?:\\.(\\d+))?)?\$", "");
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:44: lines 44-45
		if (!$pattern->match($s)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:45: characters 4-9
			throw Exception::thrown(new Error("unable to parse Time string: \"" . ($s??'null') . "\"", null, new _HxAnon_Time_Impl_0("thx/Time.hx", 45, "thx._Time.Time_Impl_", "fromString")));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:46: characters 3-48
		$smticks = $pattern->matched(7);
		$mticks = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:47: lines 47-50
		if (null !== $smticks) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:48: characters 4-11
			$smticks = "1" . (HxString::substring(Strings::rpad($smticks, "0", 7), 0, 7)??'null');
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:49: characters 4-10
			$mticks = \Std::parseInt($smticks) - 10000000;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:52: lines 52-55
		$days = 0;
		$hours = 0;
		$minutes = \Std::parseInt($pattern->matched(5));
		$seconds = \Std::parseInt($pattern->matched(6));
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:56: lines 56-61
		if (null !== $pattern->matched(2)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:57: characters 4-8
			$days = \Std::parseInt($pattern->matched(2));
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:58: characters 4-9
			$hours = \Std::parseInt($pattern->matched(3));
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:60: characters 4-9
			$hours = \Std::parseInt($pattern->matched(4));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:63: characters 14-66
		$that_high = $mticks >> 31;
		$that_low = $mticks;
		$a = Time_Impl_::create($days * 24 + $hours, $minutes, $seconds);
		$high = (($a->high + $that_high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $that_low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:63: characters 14-66
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:63: characters 3-67
		$time = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:65: lines 65-69
		if ($pattern->matched(1) === "-") {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:66: characters 11-24
			$x = $time;
			$high = (~$x->high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = ((~$x->low + 1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if ($low === 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:225: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:66: characters 11-24
			$this1 = new ___Int64($high, $low);
			$this2 = $this1;
			return $this2;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:68: characters 4-15
			return $time;
		}
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return int
	 */
	public static function get_days ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:195: characters 10-41
		$x = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerDayI64)->quotient;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		return $x->low;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return int
	 */
	public static function get_hours ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:198: characters 11-40
		$a = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerHourI64)->quotient;
		$this1 = new ___Int64(0, 24);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:198: characters 10-49
		$x = Int64_Impl_::divMod($a, $this1)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		return $x->low;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return bool
	 */
	public static function get_isNegative ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:234: characters 10-19
		$a = $this1;
		$b_high = 0;
		$b_low = 0;
		$v = (($a->high - $b_high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b_low);
		}
		return (($a->high < 0 ? ($b_high < 0 ? $v : -1) : ($b_high >= 0 ? $v : 1))) < 0;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return int
	 */
	public static function get_microseconds ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:210: characters 10-68
		$x = Int64_Impl_::divMod(Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerMicrosecondI64)->quotient, DateTimeUtc_Impl_::$tenThousandI64)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		return $x->low;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return int
	 */
	public static function get_milliseconds ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:207: characters 10-65
		$x = Int64_Impl_::divMod(Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerMillisecondI64)->quotient, DateTimeUtc_Impl_::$thousandI64)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		return $x->low;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return int
	 */
	public static function get_minutes ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:201: characters 11-42
		$a = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerMinuteI64)->quotient;
		$this1 = new ___Int64(0, 60);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:201: characters 10-51
		$x = Int64_Impl_::divMod($a, $this1)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		return $x->low;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return int
	 */
	public static function get_seconds ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:204: characters 11-42
		$a = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerSecondI64)->quotient;
		$this1 = new ___Int64(0, 60);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:204: characters 10-51
		$x = Int64_Impl_::divMod($a, $this1)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		return $x->low;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function get_ticks ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:192: characters 3-14
		return $this1;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return int
	 */
	public static function get_ticksInSecond ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:213: characters 10-44
		$x = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerSecondI64)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		return $x->low;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function get_totalDays ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:216: characters 10-31
		return Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerDayI64)->quotient;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function get_totalHours ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:219: characters 10-32
		return Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerHourI64)->quotient;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function get_totalMicroseconds ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:231: characters 10-39
		return Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerMicrosecondI64)->quotient;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function get_totalMilliseconds ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:228: characters 10-39
		return Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerMillisecondI64)->quotient;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function get_totalMinutes ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:222: characters 10-34
		return Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerMinuteI64)->quotient;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function get_totalSeconds ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:225: characters 10-34
		return Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerSecondI64)->quotient;
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function greater ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:150: characters 3-29
		return Int64s::compare($this1, $that) > 0;
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function greaterEquals ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:157: characters 3-30
		return Int64s::compare($this1, $that) >= 0;
	}

	/**
	 * @param ___Int64 $self
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function greaterEqualsTo ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:154: characters 10-40
		$a = $self;
		$b = $that;
		$v = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b->low);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:154: characters 3-45
		return (($a->high < 0 ? ($b->high < 0 ? $v : -1) : ($b->high >= 0 ? $v : 1))) >= 0;
	}

	/**
	 * @param ___Int64 $self
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function greaterThan ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:147: characters 10-40
		$a = $self;
		$b = $that;
		$v = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b->low);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:147: characters 3-44
		return (($a->high < 0 ? ($b->high < 0 ? $v : -1) : ($b->high >= 0 ? $v : 1))) > 0;
	}

	/**
	 * Checks if a dynamic value is an instance of Time.
	 * Note: because thx.Time is an abstract of haxe.Int64, any haxe.Int64 will be considered to be a thx.Time
	 * 
	 * @param mixed $v
	 * 
	 * @return bool
	 */
	public static function is ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:39: characters 3-31
		return ($v instanceof ___Int64);
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function less ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:164: characters 3-29
		return Int64s::compare($this1, $that) < 0;
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function lessEquals ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:171: characters 3-30
		return Int64s::compare($this1, $that) <= 0;
	}

	/**
	 * @param ___Int64 $self
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function lessEqualsTo ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:168: characters 10-40
		$a = $self;
		$b = $that;
		$v = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b->low);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:168: characters 3-45
		return (($a->high < 0 ? ($b->high < 0 ? $v : -1) : ($b->high >= 0 ? $v : 1))) <= 0;
	}

	/**
	 * @param ___Int64 $self
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function lessThan ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:161: characters 10-40
		$a = $self;
		$b = $that;
		$v = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b->low);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:161: characters 3-44
		return (($a->high < 0 ? ($b->high < 0 ? $v : -1) : ($b->high >= 0 ? $v : 1))) < 0;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function negate ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:117: characters 19-25
		$x = $this1;
		$high = (~$x->high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = ((~$x->low + 1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($low === 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:117: characters 10-26
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function notEquals ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:143: characters 10-29
		$a = $this1;
		$b = $that;
		if ($a->high === $b->high) {
			return $a->low !== $b->low;
		} else {
			return true;
		}
	}

	/**
	 * @param ___Int64 $self
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function notEqualsTo ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:140: characters 10-34
		$a = $self;
		$b = $that;
		if ($a->high === $b->high) {
			return $a->low !== $b->low;
		} else {
			return true;
		}
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $that
	 * 
	 * @return ___Int64
	 */
	public static function subtract ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:126: characters 19-37
		$a = $this1;
		$b = $that;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:126: characters 10-38
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param int $hours
	 * @param int $minutes
	 * @param int $seconds
	 * 
	 * @return ___Int64
	 */
	public static function timeToTicks ($hours, $minutes, $seconds) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:30: characters 22-44
		$x = $hours * 3600;
		$a_high = $x >> 31;
		$a_low = $x;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:30: characters 22-59
		$x = $minutes * 60;
		$b_high = $x >> 31;
		$b_low = $x;
		$high = (($a_high + $b_high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a_low + $b_low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a_low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:30: characters 22-59
		$a_high = $high;
		$a_low = $low;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:30: characters 22-69
		$b_high = $seconds >> 31;
		$b_low = $seconds;
		$high = (($a_high + $b_high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a_low + $b_low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a_low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:30: characters 22-69
		$totalSeconds_high = $high;
		$totalSeconds_low = $low;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:31: characters 10-42
		$b = DateTimeUtc_Impl_::$ticksPerSecondI64;
		$mask = 65535;
		$al = $totalSeconds_low & $mask;
		$ah = Boot::shiftRightUnsigned($totalSeconds_low, 16);
		$bl = $b->low & $mask;
		$bh = Boot::shiftRightUnsigned($b->low, 16);
		$p00 = Int32_Impl_::mul($al, $bl);
		$p10 = Int32_Impl_::mul($ah, $bl);
		$p01 = Int32_Impl_::mul($al, $bh);
		$p11 = Int32_Impl_::mul($ah, $bh);
		$low = $p00;
		$high = ((((($p11 + (Boot::shiftRightUnsigned($p01, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) + (Boot::shiftRightUnsigned($p10, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:302: characters 3-6
		$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:303: characters 3-6
		$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:31: characters 10-42
		if (Int32_Impl_::ucompare($low, $p01) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
		$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
		$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:31: characters 10-42
		if (Int32_Impl_::ucompare($low, $p10) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:31: characters 10-42
		$high = (($high + (((Int32_Impl_::mul($totalSeconds_low, $b->high) + Int32_Impl_::mul($totalSeconds_high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$this1 = new ___Int64($high, $low);
		return $this1;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function toDateTimeUtc ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:174: characters 10-32
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return string
	 */
	public static function toGmtString ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:185: characters 11-29
		$x = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerHourI64)->quotient;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:185: characters 3-43
		$h = Ints::lpad($x->low, "0", 2);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:186: characters 7-17
		$a = $this1;
		$b_high = 0;
		$b_low = 0;
		$v = (($a->high - $b_high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b_low);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:186: lines 186-187
		if ((($a->high < 0 ? ($b_high < 0 ? $v : -1) : ($b_high >= 0 ? $v : 1))) >= 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:187: characters 4-5
			$h = "+" . ($h??'null');
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:188: characters 18-30
		$a = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerMinuteI64)->quotient;
		$this1 = new ___Int64(0, 60);
		$x = Int64_Impl_::divMod($a, $this1)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:188: characters 3-40
		return "" . ($h??'null') . ":" . (Ints::lpad($x->low, "0", 2)??'null');
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:177: lines 177-179
		$timeAbs = Time_Impl_::abs($this1);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:178: characters 23-44
		$x = Int64_Impl_::divMod($timeAbs, DateTimeUtc_Impl_::$ticksPerSecondI64)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:177: lines 177-179
		$ticksInSecondAbs = $x->low;
		$decimals = ($ticksInSecondAbs !== 0 ? "." . (Strings::trimCharsRight(Ints::lpad($ticksInSecondAbs, "0", 7), "0")??'null') : "");
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:181: characters 11-21
		$a = $this1;
		$b_high = 0;
		$b_low = 0;
		$v = (($a->high - $b_high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b_low);
		}
		$tmp = ($a->high < 0 ? ($b_high < 0 ? $v : -1) : ($b_high >= 0 ? $v : 1));
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:181: characters 39-57
		$tmp1 = Int64_Impl_::divMod($timeAbs, DateTimeUtc_Impl_::$ticksPerHourI64)->quotient;
		$tmp2 = ($tmp1 === null ? "null" : Int64_Impl_::toString($tmp1));
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:181: characters 61-81
		$a = Int64_Impl_::divMod($timeAbs, DateTimeUtc_Impl_::$ticksPerMinuteI64)->quotient;
		$this1 = new ___Int64(0, 60);
		$x = Int64_Impl_::divMod($a, $this1)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:181: characters 37-91
		$tmp1 = "" . ($tmp2??'null') . ":" . (Ints::lpad($x->low, "0", 2)??'null') . ":";
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:181: characters 93-113
		$a = Int64_Impl_::divMod($timeAbs, DateTimeUtc_Impl_::$ticksPerSecondI64)->quotient;
		$this1 = new ___Int64(0, 60);
		$x = Int64_Impl_::divMod($a, $this1)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:181: characters 3-134
		return ((($tmp < 0 ? "-" : ""))??'null') . (($tmp1??'null') . (Ints::lpad($x->low, "0", 2)??'null')) . ($decimals??'null');
	}

	/**
	 * @param ___Int64 $this
	 * @param int $hours
	 * 
	 * @return ___Int64
	 */
	public static function withHours ($this1, $hours) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:105: characters 24-31
		$a = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerMinuteI64)->quotient;
		$this2 = new ___Int64(0, 60);
		$x = Int64_Impl_::divMod($a, $this2)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		$tmp = $x->low;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:105: characters 33-40
		$a = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerSecondI64)->quotient;
		$this2 = new ___Int64(0, 60);
		$x = Int64_Impl_::divMod($a, $this2)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		$tmp1 = $x->low;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:105: characters 42-54
		$x = Int64_Impl_::divMod(Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerMillisecondI64)->quotient, DateTimeUtc_Impl_::$thousandI64)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:105: characters 3-55
		return Time_Impl_::create($hours, $tmp, $tmp1, $x->low);
	}

	/**
	 * @param ___Int64 $this
	 * @param int $milliseconds
	 * 
	 * @return ___Int64
	 */
	public static function withMilliseconds ($this1, $milliseconds) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:114: characters 17-22
		$a = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerHourI64)->quotient;
		$this2 = new ___Int64(0, 24);
		$x = Int64_Impl_::divMod($a, $this2)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		$tmp = $x->low;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:114: characters 24-31
		$a = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerMinuteI64)->quotient;
		$this2 = new ___Int64(0, 60);
		$x = Int64_Impl_::divMod($a, $this2)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		$tmp1 = $x->low;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:114: characters 33-40
		$a = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerSecondI64)->quotient;
		$this1 = new ___Int64(0, 60);
		$x = Int64_Impl_::divMod($a, $this1)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:114: characters 3-55
		return Time_Impl_::create($tmp, $tmp1, $x->low, $milliseconds);
	}

	/**
	 * @param ___Int64 $this
	 * @param int $minutes
	 * 
	 * @return ___Int64
	 */
	public static function withMinutes ($this1, $minutes) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:108: characters 17-22
		$a = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerHourI64)->quotient;
		$this2 = new ___Int64(0, 24);
		$x = Int64_Impl_::divMod($a, $this2)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		$tmp = $x->low;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:108: characters 33-40
		$a = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerSecondI64)->quotient;
		$this2 = new ___Int64(0, 60);
		$x = Int64_Impl_::divMod($a, $this2)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		$tmp1 = $x->low;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:108: characters 42-54
		$x = Int64_Impl_::divMod(Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerMillisecondI64)->quotient, DateTimeUtc_Impl_::$thousandI64)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:108: characters 3-55
		return Time_Impl_::create($tmp, $minutes, $tmp1, $x->low);
	}

	/**
	 * @param ___Int64 $this
	 * @param int $seconds
	 * 
	 * @return ___Int64
	 */
	public static function withSeconds ($this1, $seconds) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:111: characters 17-22
		$a = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerHourI64)->quotient;
		$this2 = new ___Int64(0, 24);
		$x = Int64_Impl_::divMod($a, $this2)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		$tmp = $x->low;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:111: characters 24-31
		$a = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerMinuteI64)->quotient;
		$this2 = new ___Int64(0, 60);
		$x = Int64_Impl_::divMod($a, $this2)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		$tmp1 = $x->low;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:111: characters 42-54
		$x = Int64_Impl_::divMod(Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerMillisecondI64)->quotient, DateTimeUtc_Impl_::$thousandI64)->modulus;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Time.hx:111: characters 3-55
		return Time_Impl_::create($tmp, $tmp1, $seconds, $x->low);
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


		$this1 = new ___Int64(0, 0);
		$this2 = $this1;
		self::$zero = $this2;
		$this1 = new ___Int64(0, 24);
		$this2 = $this1;
		self::$oneDay = $this2;
	}
}

class _HxAnon_Time_Impl_0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(Time_Impl_::class, 'thx._Time.Time_Impl_');
Boot::registerGetters('thx\\_Time\\Time_Impl_', [
	'isNegative' => true,
	'totalMicroseconds' => true,
	'totalMilliseconds' => true,
	'totalSeconds' => true,
	'totalMinutes' => true,
	'totalHours' => true,
	'totalDays' => true,
	'ticksInSecond' => true,
	'microseconds' => true,
	'milliseconds' => true,
	'seconds' => true,
	'minutes' => true,
	'hours' => true,
	'days' => true,
	'ticks' => true
]);
Time_Impl_::__hx__init();
