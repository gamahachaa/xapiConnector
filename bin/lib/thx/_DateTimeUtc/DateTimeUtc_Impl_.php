<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx
 */

namespace thx\_DateTimeUtc;

use \thx\Strings;
use \haxe\_Int64\Int64_Impl_;
use \thx\_Time\Time_Impl_;
use \php\_Boot\HxAnon;
use \thx\Int64s;
use \haxe\_Int64\___Int64;
use \php\Boot;
use \thx\Either;
use \haxe\Exception;
use \thx\Ints;
use \thx\Error;
use \thx\_DateTime\DateTime_Impl_;
use \haxe\_Int32\Int32_Impl_;
use \haxe\NativeStackTrace;
use \thx\TimePeriod;

final class DateTimeUtc_Impl_ {
	/**
	 * @var int
	 */
	static public $DATE_PART_DAY = 3;
	/**
	 * @var int
	 */
	static public $DATE_PART_DAY_OF_YEAR = 1;
	/**
	 * @var int
	 */
	static public $DATE_PART_MONTH = 2;
	/**
	 * @var int
	 */
	static public $DATE_PART_YEAR = 0;
	/**
	 * @var int
	 */
	static public $daysPer100Years;
	/**
	 * @var int
	 */
	static public $daysPer400Years;
	/**
	 * @var int
	 */
	static public $daysPer4Years;
	/**
	 * @var int
	 */
	static public $daysPerYear = 365;
	/**
	 * @var int
	 */
	static public $daysTo1970;
	/**
	 * @var int[]|\Array_hx
	 */
	static public $daysToMonth365;
	/**
	 * @var int[]|\Array_hx
	 */
	static public $daysToMonth366;
	/**
	 * @var ___Int64
	 */
	static public $hundredI64;
	/**
	 * @var ___Int64
	 */
	static public $millionI64;
	/**
	 * @var int
	 */
	static public $millisPerDay;
	/**
	 * @var int
	 */
	static public $millisPerHour;
	/**
	 * @var int
	 */
	static public $millisPerMinute;
	/**
	 * @var int
	 */
	static public $millisPerSecond = 1000;
	/**
	 * @var ___Int64
	 */
	static public $tenI64;
	/**
	 * @var ___Int64
	 */
	static public $tenThousandI64;
	/**
	 * @var ___Int64
	 */
	static public $thousandI64;
	/**
	 * @var ___Int64
	 */
	static public $ticksPerDayI64;
	/**
	 * @var ___Int64
	 */
	static public $ticksPerHourI64;
	/**
	 * @var ___Int64
	 */
	static public $ticksPerMicrosecondI64;
	/**
	 * @var int
	 */
	static public $ticksPerMillisecond = 10000;
	/**
	 * @var ___Int64
	 */
	static public $ticksPerMillisecondI64;
	/**
	 * @var ___Int64
	 */
	static public $ticksPerMinuteI64;
	/**
	 * @var ___Int64
	 */
	static public $ticksPerSecondI64;
	/**
	 * @var ___Int64
	 */
	static public $unixEpochTicks;

	/**
	 * @param ___Int64 $ticks
	 * 
	 * @return ___Int64
	 */
	public static function _new ($ticks) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:240: character 3
		$this1 = $ticks;
		return $this1;
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $time
	 * 
	 * @return ___Int64
	 */
	public static function add ($this1, $time) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:573: characters 28-46
		$a = $this1;
		$b = $time;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:573: characters 12-47
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param ___Int64 $this
	 * @param float $days
	 * 
	 * @return ___Int64
	 */
	public static function addDays ($this1, $days) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:590: characters 5-41
		return DateTimeUtc_Impl_::addScaled($this1, $days, DateTimeUtc_Impl_::$millisPerDay);
	}

	/**
	 * @param ___Int64 $this
	 * @param float $hours
	 * 
	 * @return ___Int64
	 */
	public static function addHours ($this1, $hours) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:593: characters 5-43
		return DateTimeUtc_Impl_::addScaled($this1, $hours, DateTimeUtc_Impl_::$millisPerHour);
	}

	/**
	 * @param ___Int64 $this
	 * @param int $milliseconds
	 * 
	 * @return ___Int64
	 */
	public static function addMilliseconds ($this1, $milliseconds) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:596: characters 5-38
		return DateTimeUtc_Impl_::addScaled($this1, $milliseconds, 1);
	}

	/**
	 * @param ___Int64 $this
	 * @param float $minutes
	 * 
	 * @return ___Int64
	 */
	public static function addMinutes ($this1, $minutes) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:599: characters 5-47
		return DateTimeUtc_Impl_::addScaled($this1, $minutes, DateTimeUtc_Impl_::$millisPerMinute);
	}

	/**
	 * @param ___Int64 $this
	 * @param int $months
	 * 
	 * @return ___Int64
	 */
	public static function addMonths ($this1, $months) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:602: lines 602-605
		$y = DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		$m = DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH);
		$d = DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_DAY);
		$i = $m - 1 + $months;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:606: lines 606-612
		if ($i >= 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:607: characters 7-30
			$m = (int)((($i % 12) + 1));
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:608: characters 7-30
			$y = (int)(($y + $i / 12));
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:610: characters 7-37
			$m = (int)((12 + (($i + 1) % 12)));
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:611: characters 7-37
			$y = (int)(($y + ($i - 11) / 12));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:613: characters 5-34
		$days = DateTimeUtc_Impl_::daysInMonth($y, $m);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:614: lines 614-615
		if ($d > $days) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:615: characters 7-15
			$d = $days;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:616: characters 28-73
		$a = DateTimeUtc_Impl_::dateToTicks($y, $m, $d);
		$b = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerDayI64)->modulus;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:616: characters 12-74
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param ___Int64 $this
	 * @param float $value
	 * @param int $scale
	 * 
	 * @return ___Int64
	 */
	public static function addScaled ($this1, $value, $scale) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:585: characters 5-75
		$x = (int)(($value * $scale + (($value >= 0 ? 0.5 : -0.5))));
		$millis_high = $x >> 31;
		$millis_low = $x;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:586: characters 28-67
		$a = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:586: characters 36-67
		$b = DateTimeUtc_Impl_::$ticksPerMillisecondI64;
		$mask = 65535;
		$al = $millis_low & $mask;
		$ah = Boot::shiftRightUnsigned($millis_low, 16);
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:586: characters 36-67
		if (Int32_Impl_::ucompare($low, $p01) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
		$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
		$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:586: characters 36-67
		if (Int32_Impl_::ucompare($low, $p10) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:586: characters 36-67
		$high = (($high + (((Int32_Impl_::mul($millis_low, $b->high) + Int32_Impl_::mul($millis_high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$b_high = $high;
		$b_low = $low;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:586: characters 28-67
		$high = (($a->high + $b_high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b_low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:586: characters 28-67
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:586: characters 12-68
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param ___Int64 $this
	 * @param float $seconds
	 * 
	 * @return ___Int64
	 */
	public static function addSeconds ($this1, $seconds) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:620: characters 5-47
		return DateTimeUtc_Impl_::addScaled($this1, $seconds, DateTimeUtc_Impl_::$millisPerSecond);
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $tickstoadd
	 * 
	 * @return ___Int64
	 */
	public static function addTicks ($this1, $tickstoadd) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:576: characters 28-46
		$a = $this1;
		$high = (($a->high + $tickstoadd->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $tickstoadd->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:576: characters 12-47
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param ___Int64 $this
	 * @param int $years
	 * 
	 * @return ___Int64
	 */
	public static function addYears ($this1, $years) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:623: characters 5-33
		return DateTimeUtc_Impl_::addMonths($this1, $years * 12);
	}

	/**
	 * @param ___Int64 $a
	 * @param ___Int64 $b
	 * 
	 * @return int
	 */
	public static function compare ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:114: characters 5-26
		return DateTimeUtc_Impl_::compareTo($a, $b);
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $other
	 * 
	 * @return int
	 */
	public static function compareTo ($this1, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:627: characters 5-47
		if ((null === $other) && ($this1 === null)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:627: characters 39-47
			return 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:628: lines 628-629
		if (null === $this1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:628: characters 22-31
			return -1;
		} else if (null === $other) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:629: characters 28-36
			return 1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:631: characters 5-46
		return Int64s::compare($this1, $other);
	}

	/**
	 * Creates a DateTime instance from its components (year, month, day, hour, minute
	 * second and millisecond).
	 * All time components are optionals.
	 * 
	 * @param int $year
	 * @param int $month
	 * @param int $day
	 * @param int $hour
	 * @param int $minute
	 * @param int $second
	 * @param int $millisecond
	 * 
	 * @return ___Int64
	 */
	public static function create ($year, $month, $day, $hour = 0, $minute = 0, $second = 0, $millisecond = 0) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:122: lines 122-133
		if ($hour === null) {
			$hour = 0;
		}
		if ($minute === null) {
			$minute = 0;
		}
		if ($second === null) {
			$second = 0;
		}
		if ($millisecond === null) {
			$millisecond = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:123: characters 5-45
		$second += (int)(\floor($millisecond / 1000));
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:124: characters 5-16
		$millisecond %= 1000;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:125: lines 125-126
		if ($millisecond < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:126: characters 7-26
			$millisecond += 1000;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:128: lines 128-129
		$a = DateTimeUtc_Impl_::dateToTicks($year, $month, $day);
		$b = Time_Impl_::timeToTicks($hour, $minute, $second);
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:128: lines 128-129
		$a_high = $high;
		$a_low = $low;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:130: characters 18-54
		$a_high1 = $millisecond >> 31;
		$a_low1 = $millisecond;
		$b = DateTimeUtc_Impl_::$ticksPerMillisecondI64;
		$mask = 65535;
		$al = $a_low1 & $mask;
		$ah = Boot::shiftRightUnsigned($a_low1, 16);
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:130: characters 18-54
		if (Int32_Impl_::ucompare($low, $p01) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
		$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
		$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:130: characters 18-54
		if (Int32_Impl_::ucompare($low, $p10) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:130: characters 18-54
		$high = (($high + (((Int32_Impl_::mul($a_low1, $b->high) + Int32_Impl_::mul($a_high1, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$b_high = $high;
		$b_low = $low;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:128: lines 128-130
		$high = (($a_high + $b_high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a_low + $b_low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a_low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:128: lines 128-130
		$this1 = new ___Int64($high, $low);
		$ticks = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:132: characters 12-34
		$this1 = $ticks;
		return $this1;
	}

	/**
	 * @param int $year
	 * @param int $month
	 * @param int $day
	 * 
	 * @return ___Int64
	 */
	public static function dateToTicks ($year, $month, $day) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:139: lines 139-153
		$fixMonthYear = function () use (&$month, &$year) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:140: lines 140-152
			if ($month === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:141: characters 9-15
				$year -= 1;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:142: characters 9-19
				$month = 12;
			} else if ($month < 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:144: characters 9-23
				$month = -$month;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:145: characters 9-43
				$years = (int)(\ceil($month / 12));
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:146: characters 9-22
				$year -= $years;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:147: characters 9-35
				$month = $years * 12 - $month;
			} else if ($month > 12) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:149: characters 9-44
				$years = (int)(\floor($month / 12));
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:150: characters 9-22
				$year += $years;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:151: characters 9-35
				$month -= $years * 12;
			}
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:155: lines 155-159
		while ($day < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:156: characters 7-14
			$month -= 1;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:157: characters 7-21
			$fixMonthYear();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:158: characters 7-38
			$day += DateTimeUtc_Impl_::daysInMonth($year, $month);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:161: characters 5-19
		$fixMonthYear();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:162: characters 5-14
		$days = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:163: lines 163-167
		while (true) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:163: characters 17-50
			$days = DateTimeUtc_Impl_::daysInMonth($year, $month);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:163: lines 163-167
			if (!($day > $days)) {
				break;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:164: characters 7-14
			$month += 1;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:165: characters 7-21
			$fixMonthYear();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:166: characters 7-18
			$day -= $days;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:169: lines 169-173
		if ($day === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:170: characters 7-17
			$month -= 1;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:171: characters 7-21
			$fixMonthYear();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:172: characters 7-37
			$day = DateTimeUtc_Impl_::daysInMonth($year, $month);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:175: characters 5-19
		$fixMonthYear();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:177: characters 5-44
		return DateTimeUtc_Impl_::rawDateToTicks($year, $month, $day);
	}

	/**
	 * @param int $year
	 * @param int $month
	 * 
	 * @return int
	 */
	public static function daysInMonth ($year, $month) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:191: characters 5-67
		$days = (DateTimeUtc_Impl_::isLeapYear($year) ? DateTimeUtc_Impl_::$daysToMonth366 : DateTimeUtc_Impl_::$daysToMonth365);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:192: characters 5-41
		return ($days->arr[$month] ?? null) - ($days->arr[$month - 1] ?? null);
	}

	/**
	 * Tells how many days in the month of this date.
	 * @return Int, the number of days in the month.
	 * 
	 * @param ___Int64 $this
	 * 
	 * @return int
	 */
	public static function daysInThisMonth ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:303: characters 5-36
		return DateTimeUtc_Impl_::daysInMonth(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH));
	}

	/**
	 * Creates an array of dates that begin at `start` and end at `end` included.
	 * Time values are pick from the `start` value except for the last value that will
	 * match `end`. No interpolation is made.
	 * 
	 * @param ___Int64 $start
	 * @param ___Int64 $end
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function daysRange ($start, $end) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:201: characters 8-24
		$a = $end;
		$b = $start;
		$v = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b->low);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:201: characters 5-35
		if ((($a->high < 0 ? ($b->high < 0 ? $v : -1) : ($b->high >= 0 ? $v : 1))) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:201: characters 26-35
			return new \Array_hx();
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:202: characters 5-19
		$days = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:203: lines 203-206
		while (!DateTimeUtc_Impl_::sameDay($start, $end)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:204: characters 7-23
			$days->arr[$days->length++] = $start;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:205: characters 7-30
			$start = DateTimeUtc_Impl_::jump($start, TimePeriod::Day(), 1);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:207: characters 5-19
		$days->arr[$days->length++] = $end;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:208: characters 5-16
		return $days;
	}

	/**
	 * @param ___Int64 $self
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function equals ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:639: characters 12-36
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:635: characters 12-31
		$a = $this1;
		$b = $that;
		if ($a->high === $b->high) {
			return $a->low === $b->low;
		} else {
			return false;
		}
	}

	/**
	 * Transforms a Haxe native `Date` instance into `DateTimeUtc`.
	 * 
	 * @param \Date $date
	 * 
	 * @return ___Int64
	 */
	public static function fromDate ($date) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:77: characters 5-36
		return DateTimeUtc_Impl_::fromTime($date->getTime());
	}

	/**
	 * Returns a date/time from an `Int64` value. The value is the number of ticks
	 * (tenth of microseconds) since 1 C.E. (A.D.).
	 * 
	 * @param ___Int64 $ticks
	 * 
	 * @return ___Int64
	 */
	public static function fromInt64 ($ticks) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:68: characters 12-34
		$this1 = $ticks;
		return $this1;
	}

	/**
	 * Parses a string into a `DateTimeUtc` value. If parsing is not possible an
	 * exception is thrown.
	 * 
	 * @param string $s
	 * 
	 * @return ___Int64
	 */
	public static function fromString ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:91: characters 12-38
		$this1 = (DateTime_Impl_::fromString($s)->arr[0] ?? null);
		return $this1;
	}

	/**
	 * Transforms an epoch time value in milliconds into `DateTimeUtc`.
	 * 
	 * @param float $timestamp
	 * 
	 * @return ___Int64
	 */
	public static function fromTime ($timestamp) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:84: characters 28-83
		$a = Int64s::fromFloat($timestamp);
		$b = DateTimeUtc_Impl_::$ticksPerMillisecondI64;
		$mask = 65535;
		$al = $a->low & $mask;
		$ah = Boot::shiftRightUnsigned($a->low, 16);
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:84: characters 28-83
		if (Int32_Impl_::ucompare($low, $p01) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
		$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
		$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:84: characters 28-83
		if (Int32_Impl_::ucompare($low, $p10) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:84: characters 28-83
		$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$a_high = $high;
		$a_low = $low;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:84: characters 28-103
		$b = DateTimeUtc_Impl_::$unixEpochTicks;
		$high = (($a_high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a_low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a_low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:84: characters 28-103
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:84: characters 12-104
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param ___Int64 $this
	 * @param int $part
	 * 
	 * @return int
	 */
	public static function getDatePart ($this1, $part) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:212: characters 13-46
		$x = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerDayI64)->quotient;
		if ($x->high !== ((($x->low >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) {
			throw Exception::thrown("Overflow");
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:212: characters 5-47
		$n = $x->low;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:213: characters 5-45
		$y400 = (int)(($n / DateTimeUtc_Impl_::$daysPer400Years));
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:214: characters 5-32
		$n -= $y400 * DateTimeUtc_Impl_::$daysPer400Years;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:215: characters 5-45
		$y100 = (int)(($n / DateTimeUtc_Impl_::$daysPer100Years));
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:216: lines 216-217
		if ($y100 === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:217: characters 7-15
			$y100 = 3;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:218: characters 5-32
		$n -= $y100 * DateTimeUtc_Impl_::$daysPer100Years;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:219: characters 5-41
		$y4 = (int)(($n / DateTimeUtc_Impl_::$daysPer4Years));
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:220: characters 5-28
		$n -= $y4 * DateTimeUtc_Impl_::$daysPer4Years;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:221: characters 5-39
		$y1 = (int)(($n / DateTimeUtc_Impl_::$daysPerYear));
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:222: lines 222-223
		if ($y1 === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:223: characters 7-13
			$y1 = 3;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:224: lines 224-226
		if ($part === DateTimeUtc_Impl_::$DATE_PART_YEAR) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:225: characters 7-55
			return $y400 * 400 + $y100 * 100 + $y4 * 4 + $y1 + 1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:227: characters 5-26
		$n -= $y1 * DateTimeUtc_Impl_::$daysPerYear;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:228: lines 228-229
		if ($part === DateTimeUtc_Impl_::$DATE_PART_DAY_OF_YEAR) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:229: characters 7-19
			return $n + 1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:230: lines 230-232
		$leapYear = ($y1 === 3) && (($y4 !== 24) || ($y100 === 3));
		$days = ($leapYear ? DateTimeUtc_Impl_::$daysToMonth366 : DateTimeUtc_Impl_::$daysToMonth365);
		$m = $n >> 6;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:233: lines 233-234
		while ($n >= ($days->arr[$m] ?? null)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:234: characters 7-10
			++$m;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:235: lines 235-236
		if ($part === DateTimeUtc_Impl_::$DATE_PART_MONTH) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:236: characters 7-15
			return $m;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:237: characters 5-31
		return $n - ($days->arr[$m - 1] ?? null) + 1;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return int
	 */
	public static function get_day ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:719: characters 5-38
		return DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_DAY);
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return int
	 */
	public static function get_dayOfWeek ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:728: characters 12-44
		$a = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerDayI64)->quotient;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:728: characters 42-43
		$b_high = 0;
		$b_low = 1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:728: characters 12-44
		$high = (($a->high + $b_high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b_low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:728: characters 12-44
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:728: characters 49-50
		$this2 = new ___Int64(0, 7);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:728: characters 12-59
		$x = Int64_Impl_::divMod($this1, $this2)->modulus;
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
	public static function get_dayOfYear ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:731: characters 5-46
		return DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_DAY_OF_YEAR);
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return int
	 */
	public static function get_hour ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:722: characters 12-46
		$a = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerHourI64)->quotient;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:722: characters 43-45
		$this1 = new ___Int64(0, 24);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:722: characters 12-54
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
	public static function get_isInLeapYear ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:749: characters 5-28
		return DateTimeUtc_Impl_::isLeapYear(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR));
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return int
	 */
	public static function get_microsecond ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:737: characters 12-69
		$x = Int64_Impl_::divMod(Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerMicrosecondI64)->quotient, DateTimeUtc_Impl_::$millionI64)->modulus;
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
	public static function get_millisecond ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:734: characters 12-70
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
	public static function get_minute ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:725: characters 12-48
		$a = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerMinuteI64)->quotient;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:725: characters 45-47
		$this1 = new ___Int64(0, 60);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:725: characters 12-56
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
	public static function get_month ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:716: characters 5-40
		return DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH);
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return int
	 */
	public static function get_monthDays ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:752: characters 5-36
		return DateTimeUtc_Impl_::daysInMonth(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH));
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return int
	 */
	public static function get_second ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:743: characters 12-48
		$a = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerSecondI64)->quotient;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:743: characters 45-47
		$this1 = new ___Int64(0, 60);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:743: characters 12-56
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
	public static function get_tickInSecond ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:740: characters 22-30
		$this2 = new ___Int64(0, 10000000);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:740: characters 12-39
		$x = Int64_Impl_::divMod($this1, $this2)->modulus;
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:710: characters 5-16
		return $this1;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function get_timeOfDay ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:746: characters 12-44
		$this2 = Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerDayI64)->modulus;
		return $this2;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return int
	 */
	public static function get_year ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:713: characters 5-39
		return DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR);
	}

	/**
	 * @param ___Int64 $self
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function greater ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:658: characters 12-42
		$a = $self;
		$b = $that;
		$v = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b->low);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:658: characters 5-46
		return (($a->high < 0 ? ($b->high < 0 ? $v : -1) : ($b->high >= 0 ? $v : 1))) > 0;
	}

	/**
	 * @param ___Int64 $self
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function greaterEquals ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:665: characters 12-42
		$a = $self;
		$b = $that;
		$v = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b->low);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:665: characters 5-47
		return (($a->high < 0 ? ($b->high < 0 ? $v : -1) : ($b->high >= 0 ? $v : 1))) >= 0;
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function greaterEqualsTo ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:661: characters 12-37
		$a = $this1;
		$b = $that;
		$v = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b->low);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:661: characters 5-42
		return (($a->high < 0 ? ($b->high < 0 ? $v : -1) : ($b->high >= 0 ? $v : 1))) >= 0;
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function greaterThan ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:654: characters 12-37
		$a = $this1;
		$b = $that;
		$v = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b->low);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:654: characters 5-41
		return (($a->high < 0 ? ($b->high < 0 ? $v : -1) : ($b->high >= 0 ? $v : 1))) > 0;
	}

	/**
	 * Checks if a dynamic value is an instance of DateTimeUtc.
	 * Note: because thx.DateTimeUtc is an abstract of haxe.Int64, any haxe.Int64 will be considered to be a thx.DateTimeUtc
	 * 
	 * @param mixed $v
	 * 
	 * @return bool
	 */
	public static function is ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:98: characters 5-33
		return ($v instanceof ___Int64);
	}

	/**
	 * @param int $year
	 * 
	 * @return bool
	 */
	public static function isLeapYear ($year) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:136: characters 12-65
		if (($year % 4) === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:136: characters 29-65
			if (($year % 100) === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:136: characters 49-64
				return ($year % 400) === 0;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:136: characters 29-65
				return true;
			}
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:136: characters 12-65
			return false;
		}
	}

	/**
	 * Get a date relative to the current date, shifting by a set period of time.
	 * Please note this works by constructing a new date object, rather than using `DateTools.delta()`.
	 * The key difference is that this allows us to jump over a period that may not be a set number of seconds.
	 * For example, jumping between months (which have different numbers of days), leap years, leap seconds, daylight savings time changes etc.
	 * @param period The TimePeriod you wish to jump by, Second, Minute, Hour, Day, Week, Month or Year.
	 * @param amount The multiple of `period` that you wish to jump by. A positive amount moves forward in time, a negative amount moves backward.
	 * 
	 * @param ___Int64 $this
	 * @param TimePeriod $period
	 * @param int $amount
	 * 
	 * @return ___Int64
	 */
	public static function jump ($this1, $period, $amount) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:277: lines 277-282
		$sec = DateTimeUtc_Impl_::get_second($this1);
		$min = DateTimeUtc_Impl_::get_minute($this1);
		$hr = DateTimeUtc_Impl_::get_hour($this1);
		$day = DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_DAY);
		$mon = DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH);
		$yr = DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:284: lines 284-292
		$__hx__switch = ($period->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:285: characters 20-33
			$sec += $amount;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:286: characters 20-33
			$min += $amount;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:287: characters 20-33
			$hr += $amount;
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:288: characters 20-33
			$day += $amount;
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:289: characters 20-37
			$day += $amount * 7;
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:290: characters 20-33
			$mon += $amount;
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:291: characters 20-33
			$yr += $amount;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:294: characters 5-59
		return DateTimeUtc_Impl_::create($yr, $mon, $day, $hr, $min, $sec, DateTimeUtc_Impl_::get_millisecond($this1));
	}

	/**
	 * @param ___Int64 $self
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function less ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:672: characters 12-42
		$a = $self;
		$b = $that;
		$v = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b->low);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:672: characters 5-46
		return (($a->high < 0 ? ($b->high < 0 ? $v : -1) : ($b->high >= 0 ? $v : 1))) < 0;
	}

	/**
	 * @param ___Int64 $self
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function lessEquals ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:679: characters 12-42
		$a = $self;
		$b = $that;
		$v = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b->low);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:679: characters 5-47
		return (($a->high < 0 ? ($b->high < 0 ? $v : -1) : ($b->high >= 0 ? $v : 1))) <= 0;
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function lessEqualsTo ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:675: characters 12-37
		$a = $this1;
		$b = $that;
		$v = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b->low);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:675: characters 5-42
		return (($a->high < 0 ? ($b->high < 0 ? $v : -1) : ($b->high >= 0 ? $v : 1))) <= 0;
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function lessThan ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:668: characters 12-37
		$a = $this1;
		$b = $that;
		$v = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b->low);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:668: characters 5-41
		return (($a->high < 0 ? ($b->high < 0 ? $v : -1) : ($b->high >= 0 ? $v : 1))) < 0;
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $other
	 * 
	 * @return ___Int64
	 */
	public static function max ($this1, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:266: characters 12-50
		if (DateTimeUtc_Impl_::compareTo($this1, $other) >= 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:266: characters 36-42
			return $this1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:266: characters 45-50
			return $other;
		}
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $other
	 * 
	 * @return ___Int64
	 */
	public static function min ($this1, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:263: characters 12-50
		if (DateTimeUtc_Impl_::compareTo($this1, $other) <= 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:263: characters 36-42
			return $this1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:263: characters 45-50
			return $other;
		}
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $other
	 * @param ___Int64 $span
	 * 
	 * @return bool
	 */
	public static function nearEqualsTo ($this1, $other, $span) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:649: characters 28-47
		$a = $other;
		$b = $this1;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:649: characters 5-49
		$ticks = Int64s::abs($this1);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:650: characters 12-37
		$b = Time_Impl_::abs($span);
		$v = (($ticks->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($ticks->low, $b->low);
		}
		return (($ticks->high < 0 ? ($b->high < 0 ? $v : -1) : ($b->high >= 0 ? $v : 1))) <= 0;
	}

	/**
	 * Returns a new date, exactly 1 day after the given date/time.
	 * 
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function nextDay ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:351: characters 5-24
		return DateTimeUtc_Impl_::jump($this1, TimePeriod::Day(), 1);
	}

	/**
	 * Returns a new date, exactly 1 hour after the given date/time.
	 * 
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function nextHour ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:363: characters 5-25
		return DateTimeUtc_Impl_::jump($this1, TimePeriod::Hour(), 1);
	}

	/**
	 * Returns a new date, exactly 1 minute after the given date/time.
	 * 
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function nextMinute ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:375: characters 5-27
		return DateTimeUtc_Impl_::jump($this1, TimePeriod::Minute(), 1);
	}

	/**
	 * Returns a new date, exactly 1 month after the given date/time.
	 * 
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function nextMonth ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:327: characters 5-26
		return DateTimeUtc_Impl_::jump($this1, TimePeriod::Month(), 1);
	}

	/**
	 * Returns a new date, exactly 1 second after the given date/time.
	 * 
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function nextSecond ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:387: characters 5-27
		return DateTimeUtc_Impl_::jump($this1, TimePeriod::Second(), 1);
	}

	/**
	 * Returns a new date, exactly 1 week after the given date/time.
	 * 
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function nextWeek ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:339: characters 5-25
		return DateTimeUtc_Impl_::jump($this1, TimePeriod::Week(), 1);
	}

	/**
	 * Returns a new date, exactly 1 year after the given date/time.
	 * 
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function nextYear ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:315: characters 5-25
		return DateTimeUtc_Impl_::jump($this1, TimePeriod::Year(), 1);
	}

	/**
	 * @param ___Int64 $self
	 * @param ___Int64 $that
	 * 
	 * @return bool
	 */
	public static function notEquals ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:646: characters 12-36
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
	 * @return bool
	 */
	public static function notEqualsTo ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:642: characters 12-31
		$a = $this1;
		$b = $that;
		if ($a->high === $b->high) {
			return $a->low !== $b->low;
		} else {
			return true;
		}
	}

	/**
	 * Returns the system date/time relative to UTC.
	 * 
	 * @return ___Int64
	 */
	public static function now () {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:60: characters 5-32
		return DateTimeUtc_Impl_::fromDate(\Date::now());
	}

	/**
	 * Alternative to fromString that returns the result in an Either, rather than
	 * a value or a thrown error.
	 * 
	 * @param string $s
	 * 
	 * @return Either
	 */
	public static function parse ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:106: lines 106-110
		try {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:107: characters 7-27
			return Either::Right(DateTimeUtc_Impl_::fromString($s));
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:108: characters 14-15
			NativeStackTrace::saveStack($_g);
			$e = Exception::caught($_g)->unwrap();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:109: characters 7-45
			return Either::Left(Error::fromDynamic($e, new _HxAnon_DateTimeUtc_Impl_0("thx/DateTimeUtc.hx", 109, "thx._DateTimeUtc.DateTimeUtc_Impl_", "parse"))->message);
		}
	}

	/**
	 * Returns a new date, exactly 1 day before the given date/time.
	 * 
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function prevDay ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:345: characters 5-25
		return DateTimeUtc_Impl_::jump($this1, TimePeriod::Day(), -1);
	}

	/**
	 * Returns a new date, exactly 1 hour before the given date/time.
	 * 
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function prevHour ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:357: characters 5-26
		return DateTimeUtc_Impl_::jump($this1, TimePeriod::Hour(), -1);
	}

	/**
	 * Returns a new date, exactly 1 minute before the given date/time.
	 * 
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function prevMinute ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:369: characters 5-28
		return DateTimeUtc_Impl_::jump($this1, TimePeriod::Minute(), -1);
	}

	/**
	 * Returns a new date, exactly 1 month before the given date/time.
	 * 
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function prevMonth ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:321: characters 5-27
		return DateTimeUtc_Impl_::jump($this1, TimePeriod::Month(), -1);
	}

	/**
	 * Returns a new date, exactly 1 second before the given date/time.
	 * 
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function prevSecond ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:381: characters 5-28
		return DateTimeUtc_Impl_::jump($this1, TimePeriod::Second(), -1);
	}

	/**
	 * Returns a new date, exactly 1 week before the given date/time.
	 * 
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function prevWeek ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:333: characters 5-26
		return DateTimeUtc_Impl_::jump($this1, TimePeriod::Week(), -1);
	}

	/**
	 * Returns a new date, exactly 1 year before the given date/time.
	 * 
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function prevYear ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:309: characters 5-26
		return DateTimeUtc_Impl_::jump($this1, TimePeriod::Year(), -1);
	}

	/**
	 * @param int $year
	 * @param int $month
	 * @param int $day
	 * 
	 * @return ___Int64
	 */
	public static function rawDateToTicks ($year, $month, $day) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:181: characters 5-66
		$days = (DateTimeUtc_Impl_::isLeapYear($year) ? DateTimeUtc_Impl_::$daysToMonth366 : DateTimeUtc_Impl_::$daysToMonth365);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:182: lines 182-186
		if (($day >= 1) && ($day <= (($days->arr[$month] ?? null) - ($days->arr[$month - 1] ?? null)))) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:183: characters 7-24
			$y = $year - 1;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:184: characters 7-106
			$n = $y * 365 + (int)(($y / 4)) - (int)(($y / 100)) + (int)(($y / 400)) + ($days->arr[$month - 1] ?? null) + $day - 1;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:185: characters 14-32
			$a_high = $n >> 31;
			$a_low = $n;
			$b = DateTimeUtc_Impl_::$ticksPerDayI64;
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:185: characters 14-32
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:185: characters 14-32
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:185: characters 14-32
			$high = (($high + (((Int32_Impl_::mul($a_low, $b->high) + Int32_Impl_::mul($a_high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this1 = new ___Int64($high, $low);
			return $this1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:187: characters 12-17
		throw Exception::thrown(new Error("bad year/month/day " . ($year??'null') . "/" . ($month??'null') . "/" . ($day??'null'), null, new _HxAnon_DateTimeUtc_Impl_0("thx/DateTimeUtc.hx", 187, "thx._DateTimeUtc.DateTimeUtc_Impl_", "rawDateToTicks")));
	}

	/**
	 * Returns true if this date and the `other` date share the same year, month and day.
	 * 
	 * @param ___Int64 $this
	 * @param ___Int64 $other
	 * 
	 * @return bool
	 */
	public static function sameDay ($this1, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:531: characters 12-48
		if (DateTimeUtc_Impl_::sameMonth($this1, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:531: characters 32-48
			return DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_DAY) === DateTimeUtc_Impl_::getDatePart($other, DateTimeUtc_Impl_::$DATE_PART_DAY);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:531: characters 12-48
			return false;
		}
	}

	/**
	 * Returns true if this date and the `other` date share the same year, month, day and hour.
	 * 
	 * @param ___Int64 $this
	 * @param ___Int64 $other
	 * 
	 * @return bool
	 */
	public static function sameHour ($this1, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:537: characters 12-48
		if (DateTimeUtc_Impl_::sameDay($this1, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:537: characters 30-48
			return DateTimeUtc_Impl_::get_hour($this1) === DateTimeUtc_Impl_::get_hour($other);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:537: characters 12-48
			return false;
		}
	}

	/**
	 * Returns true if this date and the `other` date share the same year, month, day, hour and minute.
	 * 
	 * @param ___Int64 $this
	 * @param ___Int64 $other
	 * 
	 * @return bool
	 */
	public static function sameMinute ($this1, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:543: characters 12-53
		if (DateTimeUtc_Impl_::sameHour($this1, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:543: characters 31-53
			return DateTimeUtc_Impl_::get_minute($this1) === DateTimeUtc_Impl_::get_minute($other);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:543: characters 12-53
			return false;
		}
	}

	/**
	 * Returns true if this date and the `other` date share the same year and month.
	 * 
	 * @param ___Int64 $this
	 * @param ___Int64 $other
	 * 
	 * @return bool
	 */
	public static function sameMonth ($this1, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:525: characters 12-51
		if (DateTimeUtc_Impl_::sameYear($this1, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:525: characters 31-51
			return DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH) === DateTimeUtc_Impl_::getDatePart($other, DateTimeUtc_Impl_::$DATE_PART_MONTH);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:525: characters 12-51
			return false;
		}
	}

	/**
	 * Returns true if this date and the `other` date share the same year, month, day, hour, minute and second.
	 * 
	 * @param ___Int64 $this
	 * @param ___Int64 $other
	 * 
	 * @return bool
	 */
	public static function sameSecond ($this1, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:549: characters 12-55
		if (DateTimeUtc_Impl_::sameMinute($this1, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:549: characters 33-55
			return DateTimeUtc_Impl_::get_second($this1) === DateTimeUtc_Impl_::get_second($other);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:549: characters 12-55
			return false;
		}
	}

	/**
	 * Returns true if this date and the `other` date share the same year.
	 * 
	 * @param ___Int64 $this
	 * @param ___Int64 $other
	 * 
	 * @return bool
	 */
	public static function sameYear ($this1, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:519: characters 5-30
		return DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR) === DateTimeUtc_Impl_::getDatePart($other, DateTimeUtc_Impl_::$DATE_PART_YEAR);
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64
	 */
	public static function self ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:755: characters 5-21
		return $this1;
	}

	/**
	 * Snaps a time to the next second, minute, hour, day, week, month or year.
	 * @param period Either: Second, Minute, Hour, Day, Week, Month or Year
	 * 
	 * @param ___Int64 $this
	 * @param TimePeriod $period
	 * 
	 * @return ___Int64
	 */
	public static function snapNext ($this1, $period) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:445: lines 445-461
		$__hx__switch = ($period->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:447: characters 25-77
			$a = Int64s::divCeil($this1, DateTimeUtc_Impl_::$ticksPerSecondI64);
			$b = DateTimeUtc_Impl_::$ticksPerSecondI64;
			$mask = 65535;
			$al = $a->low & $mask;
			$ah = Boot::shiftRightUnsigned($a->low, 16);
			$bl = $b->low & $mask;
			$bh = Boot::shiftRightUnsigned($b->low, 16);
			$p00 = Int32_Impl_::mul($al, $bl);
			$p10 = Int32_Impl_::mul($ah, $bl);
			$p01 = Int32_Impl_::mul($al, $bh);
			$p11 = Int32_Impl_::mul($ah, $bh);
			$low = $p00;
			$high = ((((($p11 + (Boot::shiftRightUnsigned($p01, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) + (Boot::shiftRightUnsigned($p10, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:447: characters 9-78
			$this3 = $this2;
			return $this3;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:449: characters 25-77
			$a = Int64s::divCeil($this1, DateTimeUtc_Impl_::$ticksPerMinuteI64);
			$b = DateTimeUtc_Impl_::$ticksPerMinuteI64;
			$mask = 65535;
			$al = $a->low & $mask;
			$ah = Boot::shiftRightUnsigned($a->low, 16);
			$bl = $b->low & $mask;
			$bh = Boot::shiftRightUnsigned($b->low, 16);
			$p00 = Int32_Impl_::mul($al, $bl);
			$p10 = Int32_Impl_::mul($ah, $bl);
			$p01 = Int32_Impl_::mul($al, $bh);
			$p11 = Int32_Impl_::mul($ah, $bh);
			$low = $p00;
			$high = ((((($p11 + (Boot::shiftRightUnsigned($p01, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) + (Boot::shiftRightUnsigned($p10, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:449: characters 9-78
			$this3 = $this2;
			return $this3;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:451: characters 25-73
			$a = Int64s::divCeil($this1, DateTimeUtc_Impl_::$ticksPerHourI64);
			$b = DateTimeUtc_Impl_::$ticksPerHourI64;
			$mask = 65535;
			$al = $a->low & $mask;
			$ah = Boot::shiftRightUnsigned($a->low, 16);
			$bl = $b->low & $mask;
			$bh = Boot::shiftRightUnsigned($b->low, 16);
			$p00 = Int32_Impl_::mul($al, $bl);
			$p10 = Int32_Impl_::mul($ah, $bl);
			$p01 = Int32_Impl_::mul($al, $bh);
			$p11 = Int32_Impl_::mul($ah, $bh);
			$low = $p00;
			$high = ((((($p11 + (Boot::shiftRightUnsigned($p01, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) + (Boot::shiftRightUnsigned($p10, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:451: characters 9-74
			$this3 = $this2;
			return $this3;
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:453: characters 9-46
			return DateTimeUtc_Impl_::create(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_DAY) + 1, 0, 0, 0);
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:455: characters 9-34
			$wd = DateTimeUtc_Impl_::get_dayOfWeek($this1);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:456: characters 9-51
			return DateTimeUtc_Impl_::create(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_DAY) + 7 - $wd, 0, 0, 0);
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:458: characters 9-44
			return DateTimeUtc_Impl_::create(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH) + 1, 1, 0, 0, 0);
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:460: characters 9-40
			return DateTimeUtc_Impl_::create(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR) + 1, 1, 1, 0, 0, 0);
		}
	}

	/**
	 * Snaps a date to the next given weekday.  The time within the day will stay the same.
	 * If you are already on the given day, the date will not change.
	 * @param date The date value to snap
	 * @param day Day to snap to.  Either `Sunday`, `Monday`, `Tuesday` etc.
	 * @return The date of the day you have snapped to.
	 * 
	 * @param ___Int64 $this
	 * @param int $weekday
	 * 
	 * @return ___Int64
	 */
	public static function snapNextWeekDay ($this1, $weekday) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:415: lines 415-416
		$d = DateTimeUtc_Impl_::get_dayOfWeek($this1);
		$s = $weekday;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:419: characters 5-25
		if ($s < $d) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:419: characters 16-25
			$s += 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:420: characters 5-28
		return DateTimeUtc_Impl_::jump($this1, TimePeriod::Day(), $s - $d);
	}

	/**
	 * Snaps a time to the previous second, minute, hour, day, week, month or year.
	 * @param period Either: Second, Minute, Hour, Day, Week, Month or Year
	 * 
	 * @param ___Int64 $this
	 * @param TimePeriod $period
	 * 
	 * @return ___Int64
	 */
	public static function snapPrev ($this1, $period) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:469: lines 469-485
		$__hx__switch = ($period->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:471: characters 25-78
			$a = Int64s::divFloor($this1, DateTimeUtc_Impl_::$ticksPerSecondI64);
			$b = DateTimeUtc_Impl_::$ticksPerSecondI64;
			$mask = 65535;
			$al = $a->low & $mask;
			$ah = Boot::shiftRightUnsigned($a->low, 16);
			$bl = $b->low & $mask;
			$bh = Boot::shiftRightUnsigned($b->low, 16);
			$p00 = Int32_Impl_::mul($al, $bl);
			$p10 = Int32_Impl_::mul($ah, $bl);
			$p01 = Int32_Impl_::mul($al, $bh);
			$p11 = Int32_Impl_::mul($ah, $bh);
			$low = $p00;
			$high = ((((($p11 + (Boot::shiftRightUnsigned($p01, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) + (Boot::shiftRightUnsigned($p10, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:471: characters 9-79
			$this3 = $this2;
			return $this3;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:473: characters 25-78
			$a = Int64s::divFloor($this1, DateTimeUtc_Impl_::$ticksPerMinuteI64);
			$b = DateTimeUtc_Impl_::$ticksPerMinuteI64;
			$mask = 65535;
			$al = $a->low & $mask;
			$ah = Boot::shiftRightUnsigned($a->low, 16);
			$bl = $b->low & $mask;
			$bh = Boot::shiftRightUnsigned($b->low, 16);
			$p00 = Int32_Impl_::mul($al, $bl);
			$p10 = Int32_Impl_::mul($ah, $bl);
			$p01 = Int32_Impl_::mul($al, $bh);
			$p11 = Int32_Impl_::mul($ah, $bh);
			$low = $p00;
			$high = ((((($p11 + (Boot::shiftRightUnsigned($p01, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) + (Boot::shiftRightUnsigned($p10, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:473: characters 9-79
			$this3 = $this2;
			return $this3;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:475: characters 25-74
			$a = Int64s::divFloor($this1, DateTimeUtc_Impl_::$ticksPerHourI64);
			$b = DateTimeUtc_Impl_::$ticksPerHourI64;
			$mask = 65535;
			$al = $a->low & $mask;
			$ah = Boot::shiftRightUnsigned($a->low, 16);
			$bl = $b->low & $mask;
			$bh = Boot::shiftRightUnsigned($b->low, 16);
			$p00 = Int32_Impl_::mul($al, $bl);
			$p10 = Int32_Impl_::mul($ah, $bl);
			$p01 = Int32_Impl_::mul($al, $bh);
			$p11 = Int32_Impl_::mul($ah, $bh);
			$low = $p00;
			$high = ((((($p11 + (Boot::shiftRightUnsigned($p01, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) + (Boot::shiftRightUnsigned($p10, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:475: characters 9-75
			$this3 = $this2;
			return $this3;
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:477: characters 9-42
			return DateTimeUtc_Impl_::create(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_DAY), 0, 0, 0);
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:479: characters 9-34
			$wd = DateTimeUtc_Impl_::get_dayOfWeek($this1);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:480: characters 9-47
			return DateTimeUtc_Impl_::create(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_DAY) - $wd, 0, 0, 0);
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:482: characters 9-40
			return DateTimeUtc_Impl_::create(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH), 1, 0, 0, 0);
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:484: characters 9-36
			return DateTimeUtc_Impl_::create(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), 1, 1, 0, 0, 0);
		}
	}

	/**
	 * Snaps a date to the previous given weekday.  The time within the day will stay the same.
	 * If you are already on the given day, the date will not change.
	 * @param date The date value to snap
	 * @param day Day to snap to.  Either `Sunday`, `Monday`, `Tuesday` etc.
	 * @return The date of the day you have snapped to.
	 * 
	 * @param ___Int64 $this
	 * @param int $weekday
	 * 
	 * @return ___Int64
	 */
	public static function snapPrevWeekDay ($this1, $weekday) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:431: lines 431-432
		$d = DateTimeUtc_Impl_::get_dayOfWeek($this1);
		$s = $weekday;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:435: characters 5-25
		if ($s > $d) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:435: characters 16-25
			$s -= 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:436: characters 5-28
		return DateTimeUtc_Impl_::jump($this1, TimePeriod::Day(), $s - $d);
	}

	/**
	 * Snaps a time to the nearest second, minute, hour, day, week, month or year.
	 * @param period Either: Second, Minute, Hour, Day, Week, Month or Year
	 * 
	 * @param ___Int64 $this
	 * @param TimePeriod $period
	 * 
	 * @return ___Int64
	 */
	public static function snapTo ($this1, $period) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:493: lines 493-513
		$__hx__switch = ($period->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:495: characters 25-78
			$a = Int64s::divRound($this1, DateTimeUtc_Impl_::$ticksPerSecondI64);
			$b = DateTimeUtc_Impl_::$ticksPerSecondI64;
			$mask = 65535;
			$al = $a->low & $mask;
			$ah = Boot::shiftRightUnsigned($a->low, 16);
			$bl = $b->low & $mask;
			$bh = Boot::shiftRightUnsigned($b->low, 16);
			$p00 = Int32_Impl_::mul($al, $bl);
			$p10 = Int32_Impl_::mul($ah, $bl);
			$p01 = Int32_Impl_::mul($al, $bh);
			$p11 = Int32_Impl_::mul($ah, $bh);
			$low = $p00;
			$high = ((((($p11 + (Boot::shiftRightUnsigned($p01, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) + (Boot::shiftRightUnsigned($p10, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:495: characters 9-79
			$this3 = $this2;
			return $this3;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:497: characters 25-78
			$a = Int64s::divRound($this1, DateTimeUtc_Impl_::$ticksPerMinuteI64);
			$b = DateTimeUtc_Impl_::$ticksPerMinuteI64;
			$mask = 65535;
			$al = $a->low & $mask;
			$ah = Boot::shiftRightUnsigned($a->low, 16);
			$bl = $b->low & $mask;
			$bh = Boot::shiftRightUnsigned($b->low, 16);
			$p00 = Int32_Impl_::mul($al, $bl);
			$p10 = Int32_Impl_::mul($ah, $bl);
			$p01 = Int32_Impl_::mul($al, $bh);
			$p11 = Int32_Impl_::mul($ah, $bh);
			$low = $p00;
			$high = ((((($p11 + (Boot::shiftRightUnsigned($p01, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) + (Boot::shiftRightUnsigned($p10, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:497: characters 9-79
			$this3 = $this2;
			return $this3;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:499: characters 25-74
			$a = Int64s::divRound($this1, DateTimeUtc_Impl_::$ticksPerHourI64);
			$b = DateTimeUtc_Impl_::$ticksPerHourI64;
			$mask = 65535;
			$al = $a->low & $mask;
			$ah = Boot::shiftRightUnsigned($a->low, 16);
			$bl = $b->low & $mask;
			$bh = Boot::shiftRightUnsigned($b->low, 16);
			$p00 = Int32_Impl_::mul($al, $bl);
			$p10 = Int32_Impl_::mul($ah, $bl);
			$p01 = Int32_Impl_::mul($al, $bh);
			$p11 = Int32_Impl_::mul($ah, $bh);
			$low = $p00;
			$high = ((((($p11 + (Boot::shiftRightUnsigned($p01, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) + (Boot::shiftRightUnsigned($p10, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:499: characters 9-75
			$this3 = $this2;
			return $this3;
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:501: characters 9-40
			$mod = (DateTimeUtc_Impl_::get_hour($this1) >= 12 ? 1 : 0);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:502: characters 9-48
			return DateTimeUtc_Impl_::create(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_DAY) + $mod, 0, 0, 0);
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:504: lines 504-505
			$wd = DateTimeUtc_Impl_::get_dayOfWeek($this1);
			$mod = ($wd < 3 ? -$wd : ($wd > 3 ? 7 - $wd : (DateTimeUtc_Impl_::get_hour($this1) < 12 ? -$wd : 7 - $wd)));
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:506: characters 9-48
			return DateTimeUtc_Impl_::create(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_DAY) + $mod, 0, 0, 0);
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:508: characters 9-74
			$mod = (DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_DAY) > (int)(\floor(DateTimeUtc_Impl_::daysInMonth(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH)) / 2 + 0.5)) ? 1 : 0);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:509: characters 9-46
			return DateTimeUtc_Impl_::create(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH) + $mod, 1, 0, 0, 0);
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:511: characters 19-55
			$a = $this1;
			$b = DateTimeUtc_Impl_::create(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), 6, 2, 0, 0, 0);
			$v = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if ($v === 0) {
				$v = Int32_Impl_::ucompare($a->low, $b->low);
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:511: characters 9-64
			$mod = ((($a->high < 0 ? ($b->high < 0 ? $v : -1) : ($b->high >= 0 ? $v : 1))) > 0 ? 1 : 0);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:512: characters 9-42
			return DateTimeUtc_Impl_::create(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR) + $mod, 1, 1, 0, 0, 0);
		}
	}

	/**
	 * Snaps a date to the given weekday inside the current week.  The time within the day will stay the same.
	 * If you are already on the given day, the date will not change.
	 * @param date The date value to snap
	 * @param day Day to snap to.  Either `Sunday`, `Monday`, `Tuesday` etc.
	 * @param firstDayOfWk The first day of the week.  Default to `Sunday`.
	 * @return The date of the day you have snapped to.
	 * 
	 * @param ___Int64 $this
	 * @param int $weekday
	 * @param int $firstDayOfWk
	 * 
	 * @return ___Int64
	 */
	public static function snapToWeekDay ($this1, $weekday, $firstDayOfWk = 0) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:397: lines 397-405
		if ($firstDayOfWk === null) {
			$firstDayOfWk = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:398: lines 398-399
		$d = DateTimeUtc_Impl_::get_dayOfWeek($this1);
		$s = $weekday;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:402: characters 5-44
		if ($s < $firstDayOfWk) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:402: characters 35-44
			$s += 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:403: characters 5-44
		if ($d < $firstDayOfWk) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:403: characters 35-44
			$d += 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:404: characters 5-28
		return DateTimeUtc_Impl_::jump($this1, TimePeriod::Day(), $s - $d);
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $time
	 * 
	 * @return ___Int64
	 */
	public static function subtract ($this1, $time) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:579: characters 28-46
		$a = $this1;
		$b = $time;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:579: characters 12-47
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $date
	 * 
	 * @return ___Int64
	 */
	public static function subtractDate ($this1, $date) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:582: characters 21-39
		$a = $this1;
		$b = $date;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:582: characters 12-40
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return \Date
	 */
	public static function toDate ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:688: characters 26-34
		$a = $this1;
		$b = DateTimeUtc_Impl_::$unixEpochTicks;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:688: characters 5-35
		return \Date::fromTime(Int64s::toFloat(Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerMillisecondI64)->quotient));
	}

	/**
	 * @param ___Int64 $this
	 * @param ___Int64 $offset
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function toDateTime ($this1, $offset = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:692: characters 12-69
		$this2 = \Array_hx::wrap([
			$this1,
			(null === $offset ? Time_Impl_::$zero : $offset),
		]);
		return $this2;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function toLocalDateTime ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:695: characters 12-56
		$this2 = \Array_hx::wrap([
			$this1,
			DateTime_Impl_::localOffset(),
		]);
		return $this2;
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:700: lines 700-701
		if (null === $this1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:701: characters 7-16
			return "";
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:703: characters 5-50
		$abs = DateTimeUtc_Impl_::fromInt64(Int64s::abs($this1));
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:704: characters 5-105
		$decimals = (DateTimeUtc_Impl_::get_tickInSecond($abs) !== 0 ? "." . (Strings::trimCharsRight(Ints::lpad(DateTimeUtc_Impl_::get_tickInSecond($abs), "0", 7), ")")??'null') : "");
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:705: characters 17-36
		$a = $this1;
		$b = Int64s::$zero;
		$v = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b->low);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:705: characters 5-37
		$isneg = (($a->high < 0 ? ($b->high < 0 ? $v : -1) : ($b->high >= 0 ? $v : 1))) < 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:706: characters 5-187
		return ((($isneg ? "-" : ""))??'null') . ("" . (DateTimeUtc_Impl_::getDatePart($abs, DateTimeUtc_Impl_::$DATE_PART_YEAR)??'null') . "-" . (Ints::lpad(DateTimeUtc_Impl_::getDatePart($abs, DateTimeUtc_Impl_::$DATE_PART_MONTH), "0", 2)??'null') . "-" . (Ints::lpad(DateTimeUtc_Impl_::getDatePart($abs, DateTimeUtc_Impl_::$DATE_PART_DAY), "0", 2)??'null') . "T" . (Ints::lpad(DateTimeUtc_Impl_::get_hour($abs), "0", 2)??'null') . ":" . (Ints::lpad(DateTimeUtc_Impl_::get_minute($abs), "0", 2)??'null') . ":" . (Ints::lpad(DateTimeUtc_Impl_::get_second($abs), "0", 2)??'null') . ($decimals??'null') . "Z");
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return float
	 */
	public static function toTime ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:682: characters 12-37
		$a = $this1;
		$b = DateTimeUtc_Impl_::$unixEpochTicks;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:682: characters 5-75
		return Int64s::toFloat(Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerMillisecondI64)->quotient);
	}

	/**
	 * @param ___Int64 $this
	 * @param int $day
	 * 
	 * @return ___Int64
	 */
	public static function withDay ($this1, $day) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:558: characters 5-71
		return DateTimeUtc_Impl_::create(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH), $day, DateTimeUtc_Impl_::get_hour($this1), DateTimeUtc_Impl_::get_minute($this1), DateTimeUtc_Impl_::get_second($this1), DateTimeUtc_Impl_::get_millisecond($this1));
	}

	/**
	 * @param ___Int64 $this
	 * @param int $hour
	 * 
	 * @return ___Int64
	 */
	public static function withHour ($this1, $hour) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:561: characters 5-71
		return DateTimeUtc_Impl_::create(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_DAY), $hour, DateTimeUtc_Impl_::get_minute($this1), DateTimeUtc_Impl_::get_second($this1), DateTimeUtc_Impl_::get_millisecond($this1));
	}

	/**
	 * @param ___Int64 $this
	 * @param int $millisecond
	 * 
	 * @return ___Int64
	 */
	public static function withMillisecond ($this1, $millisecond) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:570: characters 5-71
		return DateTimeUtc_Impl_::create(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_DAY), DateTimeUtc_Impl_::get_hour($this1), DateTimeUtc_Impl_::get_minute($this1), DateTimeUtc_Impl_::get_second($this1), $millisecond);
	}

	/**
	 * @param ___Int64 $this
	 * @param int $minute
	 * 
	 * @return ___Int64
	 */
	public static function withMinute ($this1, $minute) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:564: characters 5-71
		return DateTimeUtc_Impl_::create(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_DAY), DateTimeUtc_Impl_::get_hour($this1), $minute, DateTimeUtc_Impl_::get_second($this1), DateTimeUtc_Impl_::get_millisecond($this1));
	}

	/**
	 * @param ___Int64 $this
	 * @param int $month
	 * 
	 * @return ___Int64
	 */
	public static function withMonth ($this1, $month) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:555: characters 5-71
		return DateTimeUtc_Impl_::create(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), $month, DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_DAY), DateTimeUtc_Impl_::get_hour($this1), DateTimeUtc_Impl_::get_minute($this1), DateTimeUtc_Impl_::get_second($this1), DateTimeUtc_Impl_::get_millisecond($this1));
	}

	/**
	 * @param ___Int64 $this
	 * @param int $second
	 * 
	 * @return ___Int64
	 */
	public static function withSecond ($this1, $second) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:567: characters 5-71
		return DateTimeUtc_Impl_::create(DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_YEAR), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_DAY), DateTimeUtc_Impl_::get_hour($this1), DateTimeUtc_Impl_::get_minute($this1), $second, DateTimeUtc_Impl_::get_millisecond($this1));
	}

	/**
	 * @param ___Int64 $this
	 * @param int $year
	 * 
	 * @return ___Int64
	 */
	public static function withYear ($this1, $year) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:552: characters 5-71
		return DateTimeUtc_Impl_::create($year, DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_MONTH), DateTimeUtc_Impl_::getDatePart($this1, DateTimeUtc_Impl_::$DATE_PART_DAY), DateTimeUtc_Impl_::get_hour($this1), DateTimeUtc_Impl_::get_minute($this1), DateTimeUtc_Impl_::get_second($this1), DateTimeUtc_Impl_::get_millisecond($this1));
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


		self::$millisPerMinute = DateTimeUtc_Impl_::$millisPerSecond * 60;
		self::$millisPerHour = DateTimeUtc_Impl_::$millisPerMinute * 60;
		self::$millisPerDay = DateTimeUtc_Impl_::$millisPerHour * 24;
		$this1 = new ___Int64(0, 10);
		self::$tenI64 = $this1;
		$this1 = new ___Int64(0, 100);
		self::$hundredI64 = $this1;
		$this1 = new ___Int64(0, 1000);
		self::$thousandI64 = $this1;
		$this1 = new ___Int64(0, 10000);
		self::$tenThousandI64 = $this1;
		$this1 = new ___Int64(0, 1000000);
		self::$millionI64 = $this1;
		self::$ticksPerMicrosecondI64 = DateTimeUtc_Impl_::$tenI64;
		$x = DateTimeUtc_Impl_::$ticksPerMillisecond;
		$this1 = new ___Int64($x >> 31, $x);
		self::$ticksPerMillisecondI64 = $this1;
		$a = DateTimeUtc_Impl_::$ticksPerMillisecondI64;
		$b_high = 0;
		$b_low = 1000;
		$mask = 65535;
		$al = $a->low & $mask;
		$ah = Boot::shiftRightUnsigned($a->low, 16);
		$bl = $b_low & $mask;
		$bh = Boot::shiftRightUnsigned($b_low, 16);
		$p00 = Int32_Impl_::mul($al, $bl);
		$p10 = Int32_Impl_::mul($ah, $bl);
		$p01 = Int32_Impl_::mul($al, $bh);
		$p11 = Int32_Impl_::mul($ah, $bh);
		$low = $p00;
		$high = ((((($p11 + (Boot::shiftRightUnsigned($p01, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) + (Boot::shiftRightUnsigned($p10, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $p01) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:31: characters 42-71
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		};
		$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $p10) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:31: characters 42-71
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		};
		$high = (($high + (((Int32_Impl_::mul($a->low, $b_high) + Int32_Impl_::mul($a->high, $b_low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$this1 = new ___Int64($high, $low);
		self::$ticksPerSecondI64 = $this1;
		$a = DateTimeUtc_Impl_::$ticksPerSecondI64;
		$b_high = 0;
		$b_low = 60;
		$mask = 65535;
		$al = $a->low & $mask;
		$ah = Boot::shiftRightUnsigned($a->low, 16);
		$bl = $b_low & $mask;
		$bh = Boot::shiftRightUnsigned($b_low, 16);
		$p00 = Int32_Impl_::mul($al, $bl);
		$p10 = Int32_Impl_::mul($ah, $bl);
		$p01 = Int32_Impl_::mul($al, $bh);
		$p11 = Int32_Impl_::mul($ah, $bh);
		$low = $p00;
		$high = ((((($p11 + (Boot::shiftRightUnsigned($p01, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) + (Boot::shiftRightUnsigned($p10, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $p01) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:32: characters 42-64
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		};
		$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $p10) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:32: characters 42-64
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		};
		$high = (($high + (((Int32_Impl_::mul($a->low, $b_high) + Int32_Impl_::mul($a->high, $b_low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$this1 = new ___Int64($high, $low);
		self::$ticksPerMinuteI64 = $this1;
		$a = DateTimeUtc_Impl_::$ticksPerMinuteI64;
		$b_high = 0;
		$b_low = 60;
		$mask = 65535;
		$al = $a->low & $mask;
		$ah = Boot::shiftRightUnsigned($a->low, 16);
		$bl = $b_low & $mask;
		$bh = Boot::shiftRightUnsigned($b_low, 16);
		$p00 = Int32_Impl_::mul($al, $bl);
		$p10 = Int32_Impl_::mul($ah, $bl);
		$p01 = Int32_Impl_::mul($al, $bh);
		$p11 = Int32_Impl_::mul($ah, $bh);
		$low = $p00;
		$high = ((((($p11 + (Boot::shiftRightUnsigned($p01, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) + (Boot::shiftRightUnsigned($p10, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $p01) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:33: characters 40-62
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		};
		$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $p10) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:33: characters 40-62
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		};
		$high = (($high + (((Int32_Impl_::mul($a->low, $b_high) + Int32_Impl_::mul($a->high, $b_low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$this1 = new ___Int64($high, $low);
		self::$ticksPerHourI64 = $this1;
		$a = DateTimeUtc_Impl_::$ticksPerHourI64;
		$b_high = 0;
		$b_low = 24;
		$mask = 65535;
		$al = $a->low & $mask;
		$ah = Boot::shiftRightUnsigned($a->low, 16);
		$bl = $b_low & $mask;
		$bh = Boot::shiftRightUnsigned($b_low, 16);
		$p00 = Int32_Impl_::mul($al, $bl);
		$p10 = Int32_Impl_::mul($ah, $bl);
		$p01 = Int32_Impl_::mul($al, $bh);
		$p11 = Int32_Impl_::mul($ah, $bh);
		$low = $p00;
		$high = ((((($p11 + (Boot::shiftRightUnsigned($p01, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) + (Boot::shiftRightUnsigned($p10, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $p01) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:34: characters 39-59
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		};
		$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $p10) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:34: characters 39-59
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		};
		$high = (($high + (((Int32_Impl_::mul($a->low, $b_high) + Int32_Impl_::mul($a->high, $b_low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$this1 = new ___Int64($high, $low);
		self::$ticksPerDayI64 = $this1;
		self::$daysPer4Years = DateTimeUtc_Impl_::$daysPerYear * 4 + 1;
		self::$daysPer100Years = DateTimeUtc_Impl_::$daysPer4Years * 25 - 1;
		self::$daysPer400Years = DateTimeUtc_Impl_::$daysPer100Years * 4 + 1;
		self::$daysTo1970 = DateTimeUtc_Impl_::$daysPer400Years * 4 + DateTimeUtc_Impl_::$daysPer100Years * 3 + DateTimeUtc_Impl_::$daysPer4Years * 17 + DateTimeUtc_Impl_::$daysPerYear;
		$a = DateTimeUtc_Impl_::$ticksPerDayI64;
		$x = DateTimeUtc_Impl_::$daysTo1970;
		$b_high = $x >> 31;
		$b_low = $x;
		$mask = 65535;
		$al = $a->low & $mask;
		$ah = Boot::shiftRightUnsigned($a->low, 16);
		$bl = $b_low & $mask;
		$bh = Boot::shiftRightUnsigned($b_low, 16);
		$p00 = Int32_Impl_::mul($al, $bl);
		$p10 = Int32_Impl_::mul($ah, $bl);
		$p01 = Int32_Impl_::mul($al, $bh);
		$p11 = Int32_Impl_::mul($ah, $bh);
		$low = $p00;
		$high = ((((($p11 + (Boot::shiftRightUnsigned($p01, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) + (Boot::shiftRightUnsigned($p10, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $p01) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:42: characters 39-66
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		};
		$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $p10) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTimeUtc.hx:42: characters 39-66
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		};
		$high = (($high + (((Int32_Impl_::mul($a->low, $b_high) + Int32_Impl_::mul($a->high, $b_low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$this1 = new ___Int64($high, $low);
		self::$unixEpochTicks = $this1;
		self::$daysToMonth365 = \Array_hx::wrap([
			0,
			31,
			59,
			90,
			120,
			151,
			181,
			212,
			243,
			273,
			304,
			334,
			365,
		]);
		self::$daysToMonth366 = \Array_hx::wrap([
			0,
			31,
			60,
			91,
			121,
			152,
			182,
			213,
			244,
			274,
			305,
			335,
			366,
		]);
	}
}

class _HxAnon_DateTimeUtc_Impl_0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(DateTimeUtc_Impl_::class, 'thx._DateTimeUtc.DateTimeUtc_Impl_');
Boot::registerGetters('thx\\_DateTimeUtc\\DateTimeUtc_Impl_', [
	'timeOfDay' => true,
	'dayOfYear' => true,
	'dayOfWeek' => true,
	'monthDays' => true,
	'isInLeapYear' => true,
	'tickInSecond' => true,
	'microsecond' => true,
	'millisecond' => true,
	'second' => true,
	'minute' => true,
	'hour' => true,
	'day' => true,
	'month' => true,
	'year' => true,
	'ticks' => true
]);
DateTimeUtc_Impl_::__hx__init();
