<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx
 */

namespace thx\_DateTime;

use \haxe\_Int64\Int64_Impl_;
use \thx\Strings;
use \thx\_Time\Time_Impl_;
use \php\_Boot\HxAnon;
use \thx\Int64s;
use \haxe\_Int64\___Int64;
use \php\Boot;
use \thx\Either;
use \haxe\Exception;
use \thx\Ints;
use \thx\_Ord\Ord_Impl_;
use \thx\Error;
use \php\_Boot\HxString;
use \thx\_DateTimeUtc\DateTimeUtc_Impl_;
use \thx\Arrays;
use \haxe\_Int32\Int32_Impl_;
use \haxe\NativeStackTrace;
use \thx\TimePeriod;

final class DateTime_Impl_ {

	/**
	 * DateTime constructor, requires a utc value and an offset.
	 * 
	 * @param ___Int64 $dateTime
	 * @param ___Int64 $offset
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function _new ($dateTime, $offset) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:188: character 2
		$this1 = \Array_hx::wrap([
			$dateTime,
			$offset,
		]);
		return $this1;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64 $time
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function add ($this1, $time) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:534: characters 45-54
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:534: characters 45-67
		$a = $this2;
		$b = $time;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this2 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:534: characters 10-77
		$dateTime = DateTimeUtc_Impl_::fromInt64($this2);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:534: characters 70-76
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:534: characters 10-77
		$this1 = \Array_hx::wrap([
			$dateTime,
			$this2,
		]);
		return $this1;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param float $days
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function addDays ($this1, $days) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:549: characters 23-34
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:549: characters 10-49
		$dateTime = DateTimeUtc_Impl_::addScaled($this2, $days, DateTimeUtc_Impl_::$millisPerDay);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:549: characters 42-48
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:549: characters 10-49
		$this1 = \Array_hx::wrap([
			$dateTime,
			$this2,
		]);
		return $this1;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param float $hours
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function addHours ($this1, $hours) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:552: characters 23-35
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:552: characters 10-51
		$dateTime = DateTimeUtc_Impl_::addScaled($this2, $hours, DateTimeUtc_Impl_::$millisPerHour);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:552: characters 44-50
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:552: characters 10-51
		$this1 = \Array_hx::wrap([
			$dateTime,
			$this2,
		]);
		return $this1;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param int $milliseconds
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function addMilliseconds ($this1, $milliseconds) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:555: characters 23-42
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:555: characters 10-65
		$dateTime = DateTimeUtc_Impl_::addScaled($this2, $milliseconds, 1);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:555: characters 58-64
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:555: characters 10-65
		$this1 = \Array_hx::wrap([
			$dateTime,
			$this2,
		]);
		return $this1;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param float $minutes
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function addMinutes ($this1, $minutes) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:558: characters 23-37
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:558: characters 10-55
		$dateTime = DateTimeUtc_Impl_::addScaled($this2, $minutes, DateTimeUtc_Impl_::$millisPerMinute);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:558: characters 48-54
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:558: characters 10-55
		$this1 = \Array_hx::wrap([
			$dateTime,
			$this2,
		]);
		return $this1;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param int $months
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function addMonths ($this1, $months) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:561: characters 23-36
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:561: characters 10-53
		$dateTime = DateTimeUtc_Impl_::addMonths($this2, $months);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:561: characters 46-52
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:561: characters 10-53
		$this1 = \Array_hx::wrap([
			$dateTime,
			$this2,
		]);
		return $this1;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param float $seconds
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function addSeconds ($this1, $seconds) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:564: characters 23-37
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:564: characters 10-55
		$dateTime = DateTimeUtc_Impl_::addScaled($this2, $seconds, DateTimeUtc_Impl_::$millisPerSecond);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:564: characters 48-54
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:564: characters 10-55
		$this1 = \Array_hx::wrap([
			$dateTime,
			$this2,
		]);
		return $this1;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64 $ticks
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function addTicks ($this1, $ticks) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:537: characters 45-54
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:537: characters 45-62
		$a = $this2;
		$high = (($a->high + $ticks->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $ticks->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this2 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:537: characters 10-72
		$dateTime = DateTimeUtc_Impl_::fromInt64($this2);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:537: characters 65-71
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:537: characters 10-72
		$this1 = \Array_hx::wrap([
			$dateTime,
			$this2,
		]);
		return $this1;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param int $years
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function addYears ($this1, $years) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:567: characters 23-35
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:567: characters 10-51
		$dateTime = DateTimeUtc_Impl_::addMonths($this2, $years * 12);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:567: characters 44-50
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:567: characters 10-51
		$this1 = \Array_hx::wrap([
			$dateTime,
			$this2,
		]);
		return $this1;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64 $newoffset
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function changeOffset ($this1, $newoffset) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:632: characters 23-38
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:632: characters 23-38
		$a_high = $high;
		$a_low = $low;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:632: characters 23-50
		$b = $newoffset;
		$high = (($a_high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a_low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a_low, $b->low) < 0) {
			$ret = $high--;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:632: characters 23-50
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:632: characters 10-62
		$this1 = \Array_hx::wrap([
			$this2,
			$newoffset,
		]);
		return $this1;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64
	 */
	public static function clockDateTime ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:638: characters 26-35
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:638: characters 26-50
		$a = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:638: characters 38-50
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:638: characters 26-50
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:638: characters 10-51
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param ___Int64[]|\Array_hx $a
	 * @param ___Int64[]|\Array_hx $b
	 * 
	 * @return int
	 */
	public static function compare ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:171: characters 3-24
		return DateTime_Impl_::compareTo($a, $b);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $other
	 * 
	 * @return int
	 */
	public static function compareTo ($this1, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:571: lines 571-572
		if ((null === $other) && ($this1 === null)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:572: characters 4-12
			return 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:573: lines 573-576
		if (null === $this1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:574: characters 4-13
			return -1;
		} else if (null === $other) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:576: characters 4-12
			return 1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:577: characters 25-34
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:577: characters 36-51
		$this1 = ($other->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:577: characters 3-52
		return Int64s::compare($this2, $this1);
	}

	/**
	 * Creates a DateTime instance from its components (year, month, day, hour, minute,
	 * second, millisecond and time offset).
	 * All time components are optionals.
	 * 
	 * @param int $year
	 * @param int $month
	 * @param int $day
	 * @param int $hour
	 * @param int $minute
	 * @param int $second
	 * @param int $millisecond
	 * @param ___Int64 $offset
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function create ($year, $month, $day, $hour, $minute, $second, $millisecond, $offset) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:183: characters 3-120
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:183: characters 10-103
		$this_0 = DateTimeUtc_Impl_::create($year, $month, $day, $hour, $minute, $second, $millisecond);
		$this_1 = $offset;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:183: characters 10-120
		$this1 = $this_0;
		$a = $this1;
		$b = $offset;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:183: characters 10-120
		$this1 = new ___Int64($high, $low);
		$this2 = $this_1;
		$this3 = \Array_hx::wrap([
			DateTimeUtc_Impl_::fromInt64($this1),
			$this2,
		]);
		return $this3;
	}

	/**
	 * Tells how many days in the month of this date.
	 * @return Int, the number of days in the month.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function daysInThisMonth ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:259: characters 22-26
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		$tmp = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:259: characters 28-33
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:259: characters 3-34
		return DateTimeUtc_Impl_::daysInMonth($tmp, DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_MONTH));
	}

	/**
	 * Creates an array of dates that begin at `start` and end at `end` included.
	 * Time values are pick from the `start` value except for the last value that will
	 * match `end`. No interpolation is made.
	 * 
	 * @param ___Int64[]|\Array_hx $start
	 * @param ___Int64[]|\Array_hx $end
	 * 
	 * @return \Array_hx[]|\Array_hx
	 */
	public static function daysRange ($start, $end) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:159: lines 159-160
		if (DateTime_Impl_::compareTo($end, $start) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:160: characters 4-13
			return new \Array_hx();
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:161: characters 3-17
		$days = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:162: lines 162-165
		while (!DateTime_Impl_::sameDay($start, $end)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:163: characters 4-20
			$days->arr[$days->length++] = $start;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:164: characters 4-27
			$start = DateTime_Impl_::jump($start, TimePeriod::Day(), 1);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:166: characters 3-17
		$days->arr[$days->length++] = $end;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:167: characters 3-14
		return $days;
	}

	/**
	 * @param ___Int64[]|\Array_hx $self
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function equals ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:587: characters 10-24
		$this1 = ($self->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:587: characters 10-42
		$a = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:587: characters 28-42
		$this1 = ($that->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:587: characters 10-42
		$b = $this1;
		if ($a->high === $b->high) {
			return $a->low === $b->low;
		} else {
			return false;
		}
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function equalsTo ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:581: characters 10-19
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:581: characters 10-37
		$a = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:581: characters 23-37
		$this1 = ($that->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:581: characters 10-37
		$b = $this1;
		if ($a->high === $b->high) {
			return $a->low === $b->low;
		} else {
			return false;
		}
	}

	/**
	 * Converts a `Date` type into a `DateTime` type.
	 * It uses the local server time offset.
	 * 
	 * @param \Date $date
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function fromDate ($date) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:65: characters 10-75
		$dateTime = DateTimeUtc_Impl_::fromTime($date->getTime());
		$this1 = \Array_hx::wrap([
			$dateTime,
			DateTime_Impl_::localOffset(),
		]);
		return $this1;
	}

	/**
	 * Converts a `Date` type into a `DateTime` type with a given offset.
	 * 
	 * @param \Date $date
	 * @param ___Int64 $offset
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function fromDateWithOffset ($date, $offset) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:71: characters 10-68
		$this1 = \Array_hx::wrap([
			DateTimeUtc_Impl_::fromTime($date->getTime()),
			$offset,
		]);
		return $this1;
	}

	/**
	 * Converts a string into a `DateTime` value. The accepted format looks like this:
	 * ```
	 * 2016-08-07T23:18:22.123Z
	 * ```
	 * The decimals of seconds can be omitted (and so should be dot separator `.`).
	 * `T` can also be replaced with a whitespace ` `. `Z` represents the `UTC`
	 * timezone and can be replaced with a time offset in the format:
	 * ```
	 * -06:00
	 * ```
	 * In this case the sign (`+`/`-`) is not optional and seconds cannot be used.
	 * 
	 * @param string $s
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function fromString ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:98: lines 98-99
		if ($s === null) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:99: characters 4-9
			throw Exception::thrown(new Error("null String cannot be parsed to DateTime", null, new _HxAnon_DateTime_Impl_0("thx/DateTime.hx", 99, "thx._DateTime.DateTime_Impl_", "fromString")));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:100: characters 3-128
		$pattern = new \EReg("^([-])?(\\d+)[-](\\d{2})[-](\\d{2})(?:[T ](\\d{2})[:](\\d{2})[:](\\d{2})(?:\\.(\\d+))?(Z|([+-]\\d{2})[:](\\d{2}))?)?\$", "");
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:101: lines 101-102
		if (!$pattern->match($s)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:102: characters 4-9
			throw Exception::thrown(new Error("unable to parse DateTime string: \"" . ($s??'null') . "\"", null, new _HxAnon_DateTime_Impl_0("thx/DateTime.hx", 102, "thx._DateTime.DateTime_Impl_", "fromString")));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:104: characters 3-48
		$smticks = $pattern->matched(8);
		$mticks = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:105: lines 105-108
		if (null !== $smticks) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:106: characters 4-11
			$smticks = "1" . (HxString::substring(Strings::rpad($smticks, "0", 7), 0, 7)??'null');
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:107: characters 4-10
			$mticks = \Std::parseInt($smticks) - 10000000;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:110: characters 3-55
		$time = Time_Impl_::$zero;
		$timepart = $pattern->matched(9);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:111: lines 111-116
		if ((null !== $timepart) && ("Z" !== $timepart)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:112: characters 4-36
			$hours = $pattern->matched(10);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:113: lines 113-114
			if (HxString::substring($hours, 0, 1) === "+") {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:114: characters 5-10
				$hours = HxString::substring($hours, 1);
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:115: characters 4-8
			$time = Time_Impl_::create(\Std::parseInt($hours), \Std::parseInt($pattern->matched(11)), 0);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:118: lines 118-119
		$year = \Std::parseInt($pattern->matched(2));
		$month = \Std::parseInt($pattern->matched(3));
		$day = \Std::parseInt($pattern->matched(4));
		$hour = \Std::parseInt($pattern->matched(5));
		$minute = \Std::parseInt($pattern->matched(6));
		$second = \Std::parseInt($pattern->matched(7));
		$millisecond = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:119: characters 106-107
		if ($millisecond === null) {
			$millisecond = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:119: characters 72-104
		if ($second === null) {
			$second = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:119: characters 38-70
		if ($minute === null) {
			$minute = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:119: characters 4-36
		if ($hour === null) {
			$hour = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:118: lines 118-119
		$this_0 = DateTimeUtc_Impl_::create($year, $month, $day, $hour, $minute, $second, $millisecond);
		$this_1 = $time;
		$this1 = $this_0;
		$a = $this1;
		$b = $time;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:118: lines 118-119
		$this1 = new ___Int64($high, $low);
		$this2 = $this_1;
		$this_0 = DateTimeUtc_Impl_::fromInt64($this1);
		$this_1 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:118: lines 118-120
		$ticks_high = $mticks >> 31;
		$ticks_low = $mticks;
		$this1 = $this_0;
		$a = $this1;
		$high = (($a->high + $ticks_high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $ticks_low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:118: lines 118-120
		$this1 = new ___Int64($high, $low);
		$this2 = $this_1;
		$this3 = \Array_hx::wrap([
			DateTimeUtc_Impl_::fromInt64($this1),
			$this2,
		]);
		$date = $this3;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:121: lines 121-122
		if ($pattern->matched(1) === "-") {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:122: characters 47-61
			$this1 = ($date->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:122: characters 46-61
			$x = $this1;
			$high = (~$x->high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = ((~$x->low + 1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if ($low === 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:225: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:122: characters 46-61
			$this1 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:122: characters 11-69
			$this2 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this1),
				$time,
			]);
			return $this2;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:123: characters 3-14
		return $date;
	}

	/**
	 * Converts a `Float` value representing the number of millisecond since Epoch into
	 * a `DateTime` type.
	 * 
	 * @param float $timestamp
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function fromTime ($timestamp) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:78: characters 10-66
		$dateTime = DateTimeUtc_Impl_::fromTime($timestamp);
		$this1 = \Array_hx::wrap([
			$dateTime,
			Time_Impl_::$zero,
		]);
		return $this1;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_day ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:665: characters 10-25
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:665: characters 10-29
		return DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_DAY);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_dayOfWeek ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:674: characters 10-25
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:674: characters 3-35
		return DateTimeUtc_Impl_::get_dayOfWeek($this2);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_dayOfYear ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:677: characters 10-25
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:677: characters 10-35
		return DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_DAY_OF_YEAR);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_hour ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:668: characters 10-25
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:668: characters 3-30
		return DateTimeUtc_Impl_::get_hour($this2);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return bool
	 */
	public static function get_isInLeapYear ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:695: characters 21-25
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:695: characters 3-26
		return DateTimeUtc_Impl_::isLeapYear(DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_YEAR));
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_microsecond ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:683: characters 10-25
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:683: characters 3-37
		return DateTimeUtc_Impl_::get_microsecond($this2);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_millisecond ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:680: characters 10-25
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:680: characters 3-37
		return DateTimeUtc_Impl_::get_millisecond($this2);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_minute ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:671: characters 10-25
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:671: characters 3-32
		return DateTimeUtc_Impl_::get_minute($this2);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_month ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:662: characters 10-25
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:662: characters 10-31
		return DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_MONTH);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_monthDays ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:698: characters 22-26
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		$tmp = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:698: characters 28-33
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:698: characters 3-34
		return DateTimeUtc_Impl_::daysInMonth($tmp, DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_MONTH));
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64
	 */
	public static function get_offset ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:656: characters 10-27
		$this2 = ($this1->arr[1] ?? null);
		return $this2;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_second ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:689: characters 10-25
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:689: characters 3-32
		return DateTimeUtc_Impl_::get_second($this2);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_tickInSecond ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:686: characters 10-25
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:686: characters 3-38
		return DateTimeUtc_Impl_::get_tickInSecond($this2);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64
	 */
	public static function get_timeOfDay ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:692: characters 10-25
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:692: characters 10-35
		$this1 = Int64_Impl_::divMod($this2, DateTimeUtc_Impl_::$ticksPerDayI64)->modulus;
		return $this1;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64
	 */
	public static function get_utc ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:653: characters 10-34
		$this2 = ($this1->arr[0] ?? null);
		return $this2;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_year ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:659: characters 10-25
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:659: characters 10-30
		return DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_YEAR);
	}

	/**
	 * @param ___Int64[]|\Array_hx $self
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function greater ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:608: characters 3-34
		return DateTime_Impl_::compareTo($self, $that) > 0;
	}

	/**
	 * @param ___Int64[]|\Array_hx $self
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function greaterEquals ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:615: characters 3-35
		return DateTime_Impl_::compareTo($self, $that) >= 0;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function greaterEqualsTo ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:611: characters 3-30
		return DateTime_Impl_::compareTo($this1, $that) >= 0;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function greaterThan ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:604: characters 3-29
		return DateTime_Impl_::compareTo($this1, $that) > 0;
	}

	/**
	 * Checks if a Dynamic value is an instance of DateTime
	 * Note: because thx.DateTime is an abstract of Array<haxe.Int64>, any array of exactly 2 haxe.Int64s will be considered to be a thx.DateTime
	 * 
	 * @param mixed $v
	 * 
	 * @return bool
	 */
	public static function is ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:131: lines 131-132
		if ($v === null) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:132: characters 4-16
			return false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:133: lines 133-134
		if (!($v instanceof \Array_hx)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:134: characters 4-16
			return false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:135: characters 3-29
		$vs = $v;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:136: lines 136-137
		if ($vs->length !== 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:137: characters 4-16
			return false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:138: characters 3-48
		return Arrays::all($vs, Boot::getStaticClosure(Int64_Impl_::class, 'isInt64'));
	}

	/**
	 * Get a date relative to the current date, shifting by a set period of time.
	 * Please note this works by constructing a new date object, rather than using `DateTools.delta()`.
	 * The key difference is that this allows us to jump over a period that may not be a set number of seconds.
	 * For example, jumping between months (which have different numbers of days), leap years, leap seconds, daylight savings time changes etc.
	 * @param period The TimePeriod you wish to jump by, Second, Minute, Hour, Day, Week, Month or Year.
	 * @param amount The multiple of `period` that you wish to jump by. A positive amount moves forward in time, a negative amount moves backward.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * @param TimePeriod $period
	 * @param int $amount
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function jump ($this1, $period, $amount) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:226: characters 13-19
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:226: characters 13-19
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:226: lines 226-231
		$sec = DateTimeUtc_Impl_::get_second($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:227: characters 10-16
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:227: characters 10-16
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:226: lines 226-231
		$min = DateTimeUtc_Impl_::get_minute($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:228: characters 9-13
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:228: characters 9-13
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:226: lines 226-231
		$hr = DateTimeUtc_Impl_::get_hour($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:229: characters 10-13
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:229: characters 10-13
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:226: lines 226-231
		$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:230: characters 14-19
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:230: characters 14-19
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:226: lines 226-231
		$mon = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:231: characters 9-13
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:231: characters 9-13
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:226: lines 226-231
		$yr = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:233: lines 233-248
		$__hx__switch = ($period->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:235: characters 5-18
			$sec += $amount;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:237: characters 5-18
			$min += $amount;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:239: characters 5-17
			$hr += $amount;
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:241: characters 5-18
			$day += $amount;
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:243: characters 5-22
			$day += $amount * 7;
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:245: characters 5-18
			$mon += $amount;
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:247: characters 5-17
			$yr += $amount;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:250: characters 10-65
		$hour = $hr;
		$minute = $min;
		$second = $sec;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:250: characters 45-56
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:250: characters 45-56
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:250: characters 10-65
		$millisecond = DateTimeUtc_Impl_::get_millisecond($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:250: characters 58-64
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:250: characters 10-65
		$offset = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:250: characters 45-56
		if ($millisecond === null) {
			$millisecond = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:250: characters 40-43
		if ($second === null) {
			$second = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:250: characters 35-38
		if ($minute === null) {
			$minute = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:250: characters 31-33
		if ($hour === null) {
			$hour = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:250: characters 10-65
		$this_0 = DateTimeUtc_Impl_::create($yr, $mon, $day, $hour, $minute, $second, $millisecond);
		$this_1 = $offset;
		$this1 = $this_0;
		$a = $this1;
		$b = $offset;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:250: characters 10-65
		$this1 = new ___Int64($high, $low);
		$this2 = $this_1;
		$this3 = \Array_hx::wrap([
			DateTimeUtc_Impl_::fromInt64($this1),
			$this2,
		]);
		return $this3;
	}

	/**
	 * @param ___Int64[]|\Array_hx $self
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function less ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:622: characters 3-34
		return DateTime_Impl_::compareTo($self, $that) < 0;
	}

	/**
	 * @param ___Int64[]|\Array_hx $self
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function lessEquals ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:629: characters 3-35
		return DateTime_Impl_::compareTo($self, $that) <= 0;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function lessEqualsTo ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:625: characters 3-30
		return DateTime_Impl_::compareTo($this1, $that) <= 0;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function lessTo ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:618: characters 3-29
		return DateTime_Impl_::compareTo($this1, $that) < 0;
	}

	/**
	 * @return ___Int64
	 */
	public static function localOffset () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:35: lines 35-37
		$now = DateTimeUtc_Impl_::now();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:36: characters 21-29
		$local = DateTimeUtc_Impl_::getDatePart($now, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:36: characters 31-44
		$local1 = DateTimeUtc_Impl_::getDatePart($now, DateTimeUtc_Impl_::$DATE_PART_MONTH) - 1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:36: characters 46-53
		$local2 = DateTimeUtc_Impl_::getDatePart($now, DateTimeUtc_Impl_::$DATE_PART_DAY);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:36: characters 55-63
		$local3 = DateTimeUtc_Impl_::get_hour($now);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:36: characters 65-75
		$local4 = DateTimeUtc_Impl_::get_minute($now);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:35: lines 35-37
		$local5 = new \Date($local, $local1, $local2, $local3, $local4, DateTimeUtc_Impl_::get_second($now));
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:37: characters 24-36
		$a = $now;
		$b = DateTimeUtc_Impl_::$unixEpochTicks;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:35: lines 35-37
		$delta = \floor(Int64s::toFloat(Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerMillisecondI64)->quotient) / 1000) * 1000 - $local5->getTime();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:38: characters 19-67
		$a = Int64s::fromFloat($delta);
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
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:38: characters 10-68
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $other
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function max ($this1, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:215: characters 10-23
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:215: characters 24-33
		$this3 = ($other->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:215: characters 10-56
		if (DateTimeUtc_Impl_::compareTo($this2, $this3) >= 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:215: characters 42-48
			return $this1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:215: characters 51-56
			return $other;
		}
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $other
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function min ($this1, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:212: characters 10-23
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:212: characters 24-33
		$this3 = ($other->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:212: characters 10-56
		if (DateTimeUtc_Impl_::compareTo($this2, $this3) <= 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:212: characters 42-48
			return $this1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:212: characters 51-56
			return $other;
		}
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $other
	 * @param ___Int64 $span
	 * 
	 * @return bool
	 */
	public static function nearEqualsTo ($this1, $other, $span) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:599: characters 26-41
		$this2 = ($other->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:599: characters 26-53
		$a = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:599: characters 44-53
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:599: characters 26-53
		$b = $this2;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:599: characters 3-55
		$ticks = Int64s::abs($this1);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:600: characters 10-35
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
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function nextDay ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:307: characters 3-22
		return DateTime_Impl_::jump($this1, TimePeriod::Day(), 1);
	}

	/**
	 * Returns a new date, exactly 1 hour after the given date/time.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function nextHour ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:319: characters 3-23
		return DateTime_Impl_::jump($this1, TimePeriod::Hour(), 1);
	}

	/**
	 * Returns a new date, exactly 1 minute after the given date/time.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function nextMinute ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:331: characters 3-25
		return DateTime_Impl_::jump($this1, TimePeriod::Minute(), 1);
	}

	/**
	 * Returns a new date, exactly 1 month after the given date/time.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function nextMonth ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:283: characters 3-24
		return DateTime_Impl_::jump($this1, TimePeriod::Month(), 1);
	}

	/**
	 * Returns a new date, exactly 1 second after the given date/time.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function nextSecond ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:343: characters 3-25
		return DateTime_Impl_::jump($this1, TimePeriod::Second(), 1);
	}

	/**
	 * Returns a new date, exactly 1 week after the given date/time.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function nextWeek ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:295: characters 3-23
		return DateTime_Impl_::jump($this1, TimePeriod::Week(), 1);
	}

	/**
	 * Returns a new date, exactly 1 year after the given date/time.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function nextYear ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:271: characters 3-23
		return DateTime_Impl_::jump($this1, TimePeriod::Year(), 1);
	}

	/**
	 * @param ___Int64[]|\Array_hx $self
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function notEquals ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:595: characters 10-24
		$this1 = ($self->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:595: characters 10-42
		$a = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:595: characters 28-42
		$this1 = ($that->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:595: characters 10-42
		$b = $this1;
		if ($a->high === $b->high) {
			return $a->low !== $b->low;
		} else {
			return true;
		}
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function notEqualsTo ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:591: characters 10-19
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:591: characters 10-37
		$a = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:591: characters 23-37
		$this1 = ($that->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:591: characters 10-37
		$b = $this1;
		if ($a->high === $b->high) {
			return $a->low !== $b->low;
		} else {
			return true;
		}
	}

	/**
	 * Generates an instance of `DateTime` for the current instant and with an offset
	 * as set on your local machine.
	 * Note that PHP requires a configuration setting to setup a specific timezone or
	 * it will default to UTC.
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function now () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:50: characters 10-56
		$dateTime = DateTimeUtc_Impl_::now();
		$this1 = \Array_hx::wrap([
			$dateTime,
			DateTime_Impl_::localOffset(),
		]);
		return $this1;
	}

	/**
	 * Same as `now` but it returns the current instant as if the time zone was set to
	 * UTC.
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function nowUtc () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:57: characters 10-52
		$dateTime = DateTimeUtc_Impl_::now();
		$this1 = \Array_hx::wrap([
			$dateTime,
			Time_Impl_::$zero,
		]);
		return $this1;
	}

	/**
	 * @return \Closure
	 */
	public static function ord () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:174: characters 3-40
		return Ord_Impl_::fromIntComparison(Boot::getStaticClosure(DateTime_Impl_::class, 'compare'));
	}

	/**
	 * Alternative to fromString that returns the result in an Either rather than
	 * a value or a thrown error.
	 * 
	 * @param string $s
	 * 
	 * @return Either
	 */
	public static function parse ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:146: lines 146-150
		try {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:147: characters 4-24
			return Either::Right(DateTime_Impl_::fromString($s));
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:148: characters 12-13
			NativeStackTrace::saveStack($_g);
			$e = Exception::caught($_g)->unwrap();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:149: characters 4-42
			return Either::Left(Error::fromDynamic($e, new _HxAnon_DateTime_Impl_0("thx/DateTime.hx", 149, "thx._DateTime.DateTime_Impl_", "parse"))->message);
		}
	}

	/**
	 * Returns a new date, exactly 1 day before the given date/time.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function prevDay ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:301: characters 3-23
		return DateTime_Impl_::jump($this1, TimePeriod::Day(), -1);
	}

	/**
	 * Returns a new date, exactly 1 hour before the given date/time.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function prevHour ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:313: characters 3-24
		return DateTime_Impl_::jump($this1, TimePeriod::Hour(), -1);
	}

	/**
	 * Returns a new date, exactly 1 minute before the given date/time.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function prevMinute ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:325: characters 3-26
		return DateTime_Impl_::jump($this1, TimePeriod::Minute(), -1);
	}

	/**
	 * Returns a new date, exactly 1 month before the given date/time.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function prevMonth ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:277: characters 3-25
		return DateTime_Impl_::jump($this1, TimePeriod::Month(), -1);
	}

	/**
	 * Returns a new date, exactly 1 second before the given date/time.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function prevSecond ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:337: characters 3-26
		return DateTime_Impl_::jump($this1, TimePeriod::Second(), -1);
	}

	/**
	 * Returns a new date, exactly 1 week before the given date/time.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function prevWeek ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:289: characters 3-24
		return DateTime_Impl_::jump($this1, TimePeriod::Week(), -1);
	}

	/**
	 * Returns a new date, exactly 1 year before the given date/time.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function prevYear ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:265: characters 3-24
		return DateTime_Impl_::jump($this1, TimePeriod::Year(), -1);
	}

	/**
	 * Returns true if this date and the `other` date share the same year, month and day.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $other
	 * 
	 * @return bool
	 */
	public static function sameDay ($this1, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:489: characters 10-46
		if (DateTime_Impl_::sameMonth($this1, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:489: characters 30-33
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$this1 = new ___Int64($high, $low);
			$this2 = $this1;
			$tmp = DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_DAY);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:489: characters 37-46
			$this1 = ($other->arr[0] ?? null);
			$a = $this1;
			$this1 = ($other->arr[1] ?? null);
			$b = $this1;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$this1 = new ___Int64($high, $low);
			$this2 = $this1;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:489: characters 30-46
			return $tmp === DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_DAY);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:489: characters 10-46
			return false;
		}
	}

	/**
	 * Returns true if this date and the `other` date share the same year, month, day and hour.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $other
	 * 
	 * @return bool
	 */
	public static function sameHour ($this1, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:495: characters 10-46
		if (DateTime_Impl_::sameDay($this1, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:495: characters 28-32
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$this1 = new ___Int64($high, $low);
			$this2 = $this1;
			$tmp = DateTimeUtc_Impl_::get_hour($this2);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:495: characters 36-46
			$this1 = ($other->arr[0] ?? null);
			$a = $this1;
			$this1 = ($other->arr[1] ?? null);
			$b = $this1;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$this1 = new ___Int64($high, $low);
			$this2 = $this1;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:495: characters 28-46
			return $tmp === DateTimeUtc_Impl_::get_hour($this2);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:495: characters 10-46
			return false;
		}
	}

	/**
	 * Returns true if this date and the `other` date share the same year, month, day, hour and minute.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $other
	 * 
	 * @return bool
	 */
	public static function sameMinute ($this1, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:501: characters 10-51
		if (DateTime_Impl_::sameHour($this1, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:501: characters 29-35
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$this1 = new ___Int64($high, $low);
			$this2 = $this1;
			$tmp = DateTimeUtc_Impl_::get_minute($this2);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:501: characters 39-51
			$this1 = ($other->arr[0] ?? null);
			$a = $this1;
			$this1 = ($other->arr[1] ?? null);
			$b = $this1;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$this1 = new ___Int64($high, $low);
			$this2 = $this1;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:501: characters 29-51
			return $tmp === DateTimeUtc_Impl_::get_minute($this2);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:501: characters 10-51
			return false;
		}
	}

	/**
	 * Returns true if this date and the `other` date share the same year and month.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $other
	 * 
	 * @return bool
	 */
	public static function sameMonth ($this1, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:483: characters 10-49
		if (DateTime_Impl_::sameYear($this1, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:483: characters 29-34
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$this1 = new ___Int64($high, $low);
			$this2 = $this1;
			$tmp = DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_MONTH);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:483: characters 38-49
			$this1 = ($other->arr[0] ?? null);
			$a = $this1;
			$this1 = ($other->arr[1] ?? null);
			$b = $this1;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$this1 = new ___Int64($high, $low);
			$this2 = $this1;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:483: characters 29-49
			return $tmp === DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_MONTH);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:483: characters 10-49
			return false;
		}
	}

	/**
	 * Returns true if this date and the `other` date share the same year, month, day, hour, minute and second.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $other
	 * 
	 * @return bool
	 */
	public static function sameSecond ($this1, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:507: characters 10-53
		if (DateTime_Impl_::sameMinute($this1, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:507: characters 31-37
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$this1 = new ___Int64($high, $low);
			$this2 = $this1;
			$tmp = DateTimeUtc_Impl_::get_second($this2);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:507: characters 41-53
			$this1 = ($other->arr[0] ?? null);
			$a = $this1;
			$this1 = ($other->arr[1] ?? null);
			$b = $this1;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$this1 = new ___Int64($high, $low);
			$this2 = $this1;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:507: characters 31-53
			return $tmp === DateTimeUtc_Impl_::get_second($this2);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:507: characters 10-53
			return false;
		}
	}

	/**
	 * Returns true if this date and the `other` date share the same year.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $other
	 * 
	 * @return bool
	 */
	public static function sameYear ($this1, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:477: characters 10-14
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		$tmp = DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:477: characters 18-28
		$this1 = ($other->arr[0] ?? null);
		$a = $this1;
		$this1 = ($other->arr[1] ?? null);
		$b = $this1;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:477: characters 3-28
		return $tmp === DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_YEAR);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function self ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:701: characters 3-19
		return $this1;
	}

	/**
	 * Snaps a time to the next second, minute, hour, day, week, month or year.
	 * @param period Either: Second, Minute, Hour, Day, Week, Month or Year
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * @param TimePeriod $period
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function snapNext ($this1, $period) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:402: lines 402-418
		$__hx__switch = ($period->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:404: characters 34-43
			$this2 = ($this1->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:404: characters 34-90
			$a = Int64s::divCeil($this2, DateTimeUtc_Impl_::$ticksPerSecondI64);
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
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:302: characters 3-6
			$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:303: characters 3-6
			$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:404: characters 34-90
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:404: characters 34-90
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:404: characters 34-90
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:404: characters 18-91
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:404: characters 93-99
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:404: characters 5-100
			$this4 = \Array_hx::wrap([
				$this3,
				$this2,
			]);
			return $this4;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:406: characters 34-43
			$this2 = ($this1->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:406: characters 34-90
			$a = Int64s::divCeil($this2, DateTimeUtc_Impl_::$ticksPerMinuteI64);
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
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:302: characters 3-6
			$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:303: characters 3-6
			$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:406: characters 34-90
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:406: characters 34-90
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:406: characters 34-90
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:406: characters 18-91
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:406: characters 93-99
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:406: characters 5-100
			$this4 = \Array_hx::wrap([
				$this3,
				$this2,
			]);
			return $this4;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:408: characters 34-43
			$this2 = ($this1->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:408: characters 34-86
			$a = Int64s::divCeil($this2, DateTimeUtc_Impl_::$ticksPerHourI64);
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
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:302: characters 3-6
			$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:303: characters 3-6
			$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:408: characters 34-86
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:408: characters 34-86
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:408: characters 34-86
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:408: characters 18-87
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:408: characters 89-95
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:408: characters 5-96
			$this4 = \Array_hx::wrap([
				$this3,
				$this2,
			]);
			return $this4;
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:410: characters 12-16
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:410: characters 12-16
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:410: characters 5-50
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:410: characters 18-23
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:410: characters 18-23
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:410: characters 5-50
			$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:410: characters 25-28
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:410: characters 25-28
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:410: characters 5-50
			$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY) + 1;
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:410: characters 43-49
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:410: characters 5-50
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:410: characters 40-41
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:410: characters 37-38
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:410: characters 34-35
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:410: characters 5-50
			$this_0 = DateTimeUtc_Impl_::create($year, $month, $day, $hour, $minute, $second, 0);
			$this_1 = $offset;
			$this2 = $this_0;
			$a = $this2;
			$b = $offset;
			$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
				$ret = $high--;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:410: characters 5-50
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			return $this4;
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:412: characters 18-27
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:412: characters 18-27
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:412: characters 5-28
			$wd = DateTimeUtc_Impl_::get_dayOfWeek($this3);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:413: characters 12-16
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:413: characters 12-16
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:413: characters 5-55
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:413: characters 18-23
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:413: characters 18-23
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:413: characters 5-55
			$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:413: characters 25-28
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:413: characters 25-28
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:413: characters 5-55
			$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY) + 7 - $wd;
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:413: characters 48-54
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:413: characters 5-55
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:413: characters 45-46
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:413: characters 42-43
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:413: characters 39-40
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:413: characters 5-55
			$this_0 = DateTimeUtc_Impl_::create($year, $month, $day, $hour, $minute, $second, 0);
			$this_1 = $offset;
			$this2 = $this_0;
			$a = $this2;
			$b = $offset;
			$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
				$ret = $high--;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:413: characters 5-55
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			return $this4;
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:415: characters 12-16
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:415: characters 12-16
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:415: characters 5-48
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:415: characters 18-23
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:415: characters 18-23
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:415: characters 5-48
			$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH) + 1;
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:415: characters 41-47
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:415: characters 5-48
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:415: characters 38-39
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:415: characters 35-36
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:415: characters 32-33
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:415: characters 5-48
			$this_0 = DateTimeUtc_Impl_::create($year, $month, 1, $hour, $minute, $second, 0);
			$this_1 = $offset;
			$this2 = $this_0;
			$a = $this2;
			$b = $offset;
			$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
				$ret = $high--;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:415: characters 5-48
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			return $this4;
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:417: characters 12-16
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:417: characters 12-16
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:417: characters 5-44
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR) + 1;
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:417: characters 37-43
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:417: characters 5-44
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:417: characters 34-35
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:417: characters 31-32
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:417: characters 28-29
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:417: characters 5-44
			$this_0 = DateTimeUtc_Impl_::create($year, 1, 1, $hour, $minute, $second, 0);
			$this_1 = $offset;
			$this1 = $this_0;
			$a = $this1;
			$b = $offset;
			$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
				$ret = $high--;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:417: characters 5-44
			$this1 = new ___Int64($high, $low);
			$this2 = $this_1;
			$this3 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this1),
				$this2,
			]);
			return $this3;
		}
	}

	/**
	 * Snaps a date to the next given weekday.  The time within the day will stay the same.
	 * If you are already on the given day, the date will not change.
	 * @param date The date value to snap
	 * @param day Day to snap to.  Either `Sunday`, `Monday`, `Tuesday` etc.
	 * @return The date of the day you have snapped to.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * @param int $weekday
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function snapNextWeekDay ($this1, $weekday) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:372: characters 15-24
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:372: characters 3-42
		$d = DateTimeUtc_Impl_::get_dayOfWeek($this3);
		$s = $weekday;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:375: lines 375-376
		if ($s < $d) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:376: characters 4-13
			$s += 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:377: characters 3-26
		return DateTime_Impl_::jump($this1, TimePeriod::Day(), $s - $d);
	}

	/**
	 * Snaps a time to the previous second, minute, hour, day, week, month or year.
	 * @param period Either: Second, Minute, Hour, Day, Week, Month or Year
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * @param TimePeriod $period
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function snapPrev ($this1, $period) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:426: lines 426-442
		$__hx__switch = ($period->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:428: characters 34-43
			$this2 = ($this1->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:428: characters 34-91
			$a = Int64s::divFloor($this2, DateTimeUtc_Impl_::$ticksPerSecondI64);
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
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:302: characters 3-6
			$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:303: characters 3-6
			$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:428: characters 34-91
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:428: characters 34-91
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:428: characters 34-91
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:428: characters 18-92
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:428: characters 94-100
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:428: characters 5-101
			$this4 = \Array_hx::wrap([
				$this3,
				$this2,
			]);
			return $this4;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:430: characters 34-43
			$this2 = ($this1->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:430: characters 34-91
			$a = Int64s::divFloor($this2, DateTimeUtc_Impl_::$ticksPerMinuteI64);
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
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:302: characters 3-6
			$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:303: characters 3-6
			$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:430: characters 34-91
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:430: characters 34-91
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:430: characters 34-91
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:430: characters 18-92
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:430: characters 94-100
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:430: characters 5-101
			$this4 = \Array_hx::wrap([
				$this3,
				$this2,
			]);
			return $this4;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:432: characters 34-43
			$this2 = ($this1->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:432: characters 34-87
			$a = Int64s::divFloor($this2, DateTimeUtc_Impl_::$ticksPerHourI64);
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
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:302: characters 3-6
			$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:303: characters 3-6
			$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:432: characters 34-87
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:432: characters 34-87
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:432: characters 34-87
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:432: characters 18-88
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:432: characters 90-96
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:432: characters 5-97
			$this4 = \Array_hx::wrap([
				$this3,
				$this2,
			]);
			return $this4;
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:434: characters 12-16
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:434: characters 12-16
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:434: characters 5-46
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:434: characters 18-23
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:434: characters 18-23
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:434: characters 5-46
			$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:434: characters 25-28
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:434: characters 25-28
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:434: characters 5-46
			$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY);
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:434: characters 39-45
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:434: characters 5-46
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:434: characters 36-37
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:434: characters 33-34
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:434: characters 30-31
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:434: characters 5-46
			$this_0 = DateTimeUtc_Impl_::create($year, $month, $day, $hour, $minute, $second, 0);
			$this_1 = $offset;
			$this2 = $this_0;
			$a = $this2;
			$b = $offset;
			$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
				$ret = $high--;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:434: characters 5-46
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			return $this4;
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:436: characters 18-27
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:436: characters 18-27
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:436: characters 5-28
			$wd = DateTimeUtc_Impl_::get_dayOfWeek($this3);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:437: characters 12-16
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:437: characters 12-16
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:437: characters 5-51
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:437: characters 18-23
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:437: characters 18-23
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:437: characters 5-51
			$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:437: characters 25-28
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:437: characters 25-28
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:437: characters 5-51
			$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY) - $wd;
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:437: characters 44-50
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:437: characters 5-51
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:437: characters 41-42
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:437: characters 38-39
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:437: characters 35-36
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:437: characters 5-51
			$this_0 = DateTimeUtc_Impl_::create($year, $month, $day, $hour, $minute, $second, 0);
			$this_1 = $offset;
			$this2 = $this_0;
			$a = $this2;
			$b = $offset;
			$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
				$ret = $high--;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:437: characters 5-51
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			return $this4;
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:439: characters 12-16
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:439: characters 12-16
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:439: characters 5-44
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:439: characters 18-23
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:439: characters 18-23
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:439: characters 5-44
			$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:439: characters 37-43
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:439: characters 5-44
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:439: characters 34-35
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:439: characters 31-32
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:439: characters 28-29
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:439: characters 5-44
			$this_0 = DateTimeUtc_Impl_::create($year, $month, 1, $hour, $minute, $second, 0);
			$this_1 = $offset;
			$this2 = $this_0;
			$a = $this2;
			$b = $offset;
			$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
				$ret = $high--;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:439: characters 5-44
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			return $this4;
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:441: characters 12-16
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:441: characters 12-16
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:441: characters 5-40
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:441: characters 33-39
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:441: characters 5-40
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:441: characters 30-31
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:441: characters 27-28
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:441: characters 24-25
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:441: characters 5-40
			$this_0 = DateTimeUtc_Impl_::create($year, 1, 1, $hour, $minute, $second, 0);
			$this_1 = $offset;
			$this1 = $this_0;
			$a = $this1;
			$b = $offset;
			$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
				$ret = $high--;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:441: characters 5-40
			$this1 = new ___Int64($high, $low);
			$this2 = $this_1;
			$this3 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this1),
				$this2,
			]);
			return $this3;
		}
	}

	/**
	 * Snaps a date to the previous given weekday.  The time within the day will stay the same.
	 * If you are already on the given day, the date will not change.
	 * @param date The date value to snap
	 * @param day Day to snap to.  Either `Sunday`, `Monday`, `Tuesday` etc.
	 * @return The date of the day you have snapped to.
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * @param int $weekday
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function snapPrevWeekDay ($this1, $weekday) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:388: characters 15-24
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:388: characters 3-42
		$d = DateTimeUtc_Impl_::get_dayOfWeek($this3);
		$s = $weekday;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:391: lines 391-392
		if ($s > $d) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:392: characters 4-13
			$s -= 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:393: characters 3-26
		return DateTime_Impl_::jump($this1, TimePeriod::Day(), $s - $d);
	}

	/**
	 * Snaps a time to the nearest second, minute, hour, day, week, month or year.
	 * @param period Either: Second, Minute, Hour, Day, Week, Month or Year
	 * 
	 * @param ___Int64[]|\Array_hx $this
	 * @param TimePeriod $period
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function snapTo ($this1, $period) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:450: lines 450-471
		$__hx__switch = ($period->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:452: characters 34-43
			$this2 = ($this1->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:452: characters 34-91
			$a = Int64s::divRound($this2, DateTimeUtc_Impl_::$ticksPerSecondI64);
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
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:302: characters 3-6
			$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:303: characters 3-6
			$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:452: characters 34-91
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:452: characters 34-91
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:452: characters 34-91
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:452: characters 18-92
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:452: characters 94-100
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:452: characters 5-101
			$this4 = \Array_hx::wrap([
				$this3,
				$this2,
			]);
			return $this4;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:454: characters 34-43
			$this2 = ($this1->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:454: characters 34-91
			$a = Int64s::divRound($this2, DateTimeUtc_Impl_::$ticksPerMinuteI64);
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
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:302: characters 3-6
			$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:303: characters 3-6
			$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:454: characters 34-91
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:454: characters 34-91
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:454: characters 34-91
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:454: characters 18-92
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:454: characters 94-100
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:454: characters 5-101
			$this4 = \Array_hx::wrap([
				$this3,
				$this2,
			]);
			return $this4;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:456: characters 34-43
			$this2 = ($this1->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:456: characters 34-87
			$a = Int64s::divRound($this2, DateTimeUtc_Impl_::$ticksPerHourI64);
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
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:302: characters 3-6
			$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:303: characters 3-6
			$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:456: characters 34-87
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:456: characters 34-87
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:456: characters 34-87
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:456: characters 18-88
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:456: characters 90-96
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:456: characters 5-97
			$this4 = \Array_hx::wrap([
				$this3,
				$this2,
			]);
			return $this4;
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:458: characters 16-20
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:458: characters 16-20
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:458: characters 5-36
			$mod = (DateTimeUtc_Impl_::get_hour($this3) >= 12 ? 1 : 0);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:459: characters 12-16
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:459: characters 12-16
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:459: characters 5-52
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:459: characters 18-23
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:459: characters 18-23
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:459: characters 5-52
			$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:459: characters 25-28
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:459: characters 25-28
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:459: characters 5-52
			$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY) + $mod;
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:459: characters 45-51
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:459: characters 5-52
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:459: characters 42-43
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:459: characters 39-40
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:459: characters 36-37
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:459: characters 5-52
			$this_0 = DateTimeUtc_Impl_::create($year, $month, $day, $hour, $minute, $second, 0);
			$this_1 = $offset;
			$this2 = $this_0;
			$a = $this2;
			$b = $offset;
			$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
				$ret = $high--;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:459: characters 5-52
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			return $this4;
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:461: characters 18-27
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:461: characters 18-27
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:461: lines 461-462
			$wd = DateTimeUtc_Impl_::get_dayOfWeek($this3);
			$mod = null;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:462: characters 12-71
			if ($wd < 3) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:461: lines 461-462
				$mod = -$wd;
			} else if ($wd > 3) {
				$mod = 7 - $wd;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:462: characters 46-50
				$this2 = ($this1->arr[0] ?? null);
				$a = $this2;
				$this2 = ($this1->arr[1] ?? null);
				$b = $this2;
				$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				if (Int32_Impl_::ucompare($low, $a->low) < 0) {
					$ret = $high++;
					#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
					$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:462: characters 46-50
				$this2 = new ___Int64($high, $low);
				$this3 = $this2;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:461: lines 461-462
				$mod = (DateTimeUtc_Impl_::get_hour($this3) < 12 ? -$wd : 7 - $wd);
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:463: characters 12-16
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:463: characters 12-16
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:463: characters 5-52
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:463: characters 18-23
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:463: characters 18-23
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:463: characters 5-52
			$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:463: characters 25-28
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:463: characters 25-28
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:463: characters 5-52
			$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY) + $mod;
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:463: characters 45-51
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:463: characters 5-52
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:463: characters 42-43
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:463: characters 39-40
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:463: characters 36-37
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:463: characters 5-52
			$this_0 = DateTimeUtc_Impl_::create($year, $month, $day, $hour, $minute, $second, 0);
			$this_1 = $offset;
			$this2 = $this_0;
			$a = $this2;
			$b = $offset;
			$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
				$ret = $high--;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:463: characters 5-52
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			return $this4;
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:465: characters 15-18
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:465: characters 15-18
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			$mod = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:465: characters 44-48
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:465: characters 44-48
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			$v = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:465: characters 50-55
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:465: characters 50-55
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:465: characters 5-70
			$mod1 = ($mod > (int)(\floor(DateTimeUtc_Impl_::daysInMonth($v, DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH)) / 2 + 0.5)) ? 1 : 0);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:466: characters 12-16
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:466: characters 12-16
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:466: characters 5-50
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:466: characters 18-23
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:466: characters 18-23
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:466: characters 5-50
			$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH) + $mod1;
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:466: characters 43-49
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:466: characters 5-50
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:466: characters 40-41
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:466: characters 37-38
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:466: characters 34-35
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:466: characters 5-50
			$this_0 = DateTimeUtc_Impl_::create($year, $month, 1, $hour, $minute, $second, 0);
			$this_1 = $offset;
			$this2 = $this_0;
			$a = $this2;
			$b = $offset;
			$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
				$ret = $high--;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:466: characters 5-50
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			return $this4;
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:468: characters 24-28
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:468: characters 24-28
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:468: characters 17-52
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:468: characters 45-51
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:468: characters 17-52
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:468: characters 42-43
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:468: characters 39-40
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:468: characters 36-37
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:468: characters 17-52
			$this_0 = DateTimeUtc_Impl_::create($year, 6, 2, $hour, $minute, $second, 0);
			$this_1 = $offset;
			$this2 = $this_0;
			$a = $this2;
			$b = $offset;
			$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
				$ret = $high--;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:468: characters 17-52
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:468: lines 468-469
			$other = $this4;
			$mod = (DateTime_Impl_::compareTo($this1, $other) > 0 ? 1 : 0);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:470: characters 12-16
			$this2 = ($this1->arr[0] ?? null);
			$a = $this2;
			$this2 = ($this1->arr[1] ?? null);
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:470: characters 12-16
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:470: characters 5-46
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR) + $mod;
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:470: characters 39-45
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:470: characters 5-46
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:470: characters 36-37
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:470: characters 33-34
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:470: characters 30-31
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:470: characters 5-46
			$this_0 = DateTimeUtc_Impl_::create($year, 1, 1, $hour, $minute, $second, 0);
			$this_1 = $offset;
			$this1 = $this_0;
			$a = $this1;
			$b = $offset;
			$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
				$ret = $high--;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:470: characters 5-46
			$this1 = new ___Int64($high, $low);
			$this2 = $this_1;
			$this3 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this1),
				$this2,
			]);
			return $this3;
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
	 * @param ___Int64[]|\Array_hx $this
	 * @param int $weekday
	 * @param int $firstDayOfWk
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function snapToWeekDay ($this1, $weekday, $firstDayOfWk = 0) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:353: lines 353-362
		if ($firstDayOfWk === null) {
			$firstDayOfWk = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:354: characters 15-24
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:354: characters 3-42
		$d = DateTimeUtc_Impl_::get_dayOfWeek($this3);
		$s = $weekday;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:357: lines 357-358
		if ($s < $firstDayOfWk) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:358: characters 4-13
			$s += 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:359: lines 359-360
		if ($d < $firstDayOfWk) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:360: characters 4-13
			$d += 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:361: characters 3-26
		return DateTime_Impl_::jump($this1, TimePeriod::Day(), $s - $d);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64 $time
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function subtract ($this1, $time) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:540: characters 45-54
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:540: characters 45-67
		$a = $this2;
		$b = $time;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this2 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:540: characters 10-77
		$dateTime = DateTimeUtc_Impl_::fromInt64($this2);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:540: characters 70-76
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:540: characters 10-77
		$this1 = \Array_hx::wrap([
			$dateTime,
			$this2,
		]);
		return $this1;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $date
	 * 
	 * @return ___Int64
	 */
	public static function subtractDate ($this1, $date) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:543: characters 36-45
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:543: characters 36-62
		$a = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:543: characters 48-62
		$this2 = ($date->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:543: characters 36-62
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:543: characters 36-62
		$this2 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:543: lines 543-544
		$base = DateTimeUtc_Impl_::fromInt64($this2);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:544: characters 30-36
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:544: characters 11-37
		$date_0 = $base;
		$date_1 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:545: characters 19-33
		$this1 = $date_0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:545: characters 10-34
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:642: lines 642-643
		if (null === $this1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:643: characters 4-13
			return "";
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:644: characters 42-51
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:644: characters 26-58
		$this3 = Int64s::abs($this2);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:644: characters 60-66
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:644: characters 13-67
		$abs_0 = $this3;
		$abs_1 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:645: characters 3-103
		$decimals = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:645: characters 18-34
		$this2 = $abs_0;
		$a = $this2;
		$this2 = $abs_1;
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:645: characters 18-34
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:645: characters 18-102
		if (DateTimeUtc_Impl_::get_tickInSecond($this3) !== 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:645: characters 48-69
			$this2 = $abs_0;
			$a = $this2;
			$this2 = $abs_1;
			$b = $this2;
			$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:645: characters 48-69
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:645: characters 3-103
			$decimals = "." . (Strings::trimCharsRight(Ints::lpad(DateTimeUtc_Impl_::get_tickInSecond($this3), "0", 7), ")")??'null');
		} else {
			$decimals = "";
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:646: characters 15-24
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:646: characters 15-38
		$a = $this2;
		$b = Int64s::$zero;
		$v = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b->low);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:646: characters 3-39
		$isneg = (($a->high < 0 ? ($b->high < 0 ? $v : -1) : ($b->high >= 0 ? $v : 1))) < 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:649: characters 7-15
		$this2 = $abs_0;
		$a = $this2;
		$this2 = $abs_1;
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:649: characters 7-15
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:649: characters 5-17
		$tmp = "" . (DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR)??'null') . "-";
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:649: characters 19-33
		$this2 = $abs_0;
		$a = $this2;
		$this2 = $abs_1;
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:649: characters 19-33
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:649: characters 5-43
		$tmp1 = ($tmp??'null') . (Ints::lpad(DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH), "0", 2)??'null') . "-";
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:649: characters 45-57
		$this2 = $abs_0;
		$a = $this2;
		$this2 = $abs_1;
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:649: characters 45-57
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:649: characters 5-67
		$tmp = ($tmp1??'null') . (Ints::lpad(DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY), "0", 2)??'null') . "T";
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:649: characters 69-82
		$this2 = $abs_0;
		$a = $this2;
		$this2 = $abs_1;
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:649: characters 69-82
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:649: characters 5-92
		$tmp1 = ($tmp??'null') . (Ints::lpad(DateTimeUtc_Impl_::get_hour($this3), "0", 2)??'null') . ":";
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:649: characters 94-109
		$this2 = $abs_0;
		$a = $this2;
		$this2 = $abs_1;
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:649: characters 94-109
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:649: characters 5-119
		$tmp = ($tmp1??'null') . (Ints::lpad(DateTimeUtc_Impl_::get_minute($this3), "0", 2)??'null') . ":";
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:649: characters 121-136
		$this2 = $abs_0;
		$a = $this2;
		$this2 = $abs_1;
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:649: characters 121-136
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:649: characters 5-155
		$tmp1 = ($tmp??'null') . (Ints::lpad(DateTimeUtc_Impl_::get_second($this3), "0", 2)??'null') . ($decimals??'null');
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:649: characters 158-176
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:647: lines 647-649
		return ((($isneg ? "-" : ""))??'null') . (($tmp1??'null') . (Time_Impl_::toGmtString($this2)??'null'));
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64
	 */
	public static function toUtc ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:635: characters 10-13
		$this2 = ($this1->arr[0] ?? null);
		return $this2;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param int $day
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function withDay ($this1, $day) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 17-21
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 17-21
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 10-77
		$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 23-28
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 23-28
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 10-77
		$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 35-39
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 35-39
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 10-77
		$hour = DateTimeUtc_Impl_::get_hour($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 41-47
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 41-47
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 10-77
		$minute = DateTimeUtc_Impl_::get_minute($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 49-55
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 49-55
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 10-77
		$second = DateTimeUtc_Impl_::get_second($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 57-68
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 57-68
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 10-77
		$millisecond = DateTimeUtc_Impl_::get_millisecond($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 70-76
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 10-77
		$offset = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 57-68
		if ($millisecond === null) {
			$millisecond = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 49-55
		if ($second === null) {
			$second = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 41-47
		if ($minute === null) {
			$minute = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 35-39
		if ($hour === null) {
			$hour = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 10-77
		$this_0 = DateTimeUtc_Impl_::create($year, $month, $day, $hour, $minute, $second, $millisecond);
		$this_1 = $offset;
		$this1 = $this_0;
		$a = $this1;
		$b = $offset;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:516: characters 10-77
		$this1 = new ___Int64($high, $low);
		$this2 = $this_1;
		$this3 = \Array_hx::wrap([
			DateTimeUtc_Impl_::fromInt64($this1),
			$this2,
		]);
		return $this3;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param int $hour
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function withHour ($this1, $hour) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 17-21
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 17-21
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 10-77
		$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 23-28
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 23-28
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 10-77
		$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 30-33
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 30-33
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 10-77
		$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY);
		$hour1 = $hour;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 41-47
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 41-47
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 10-77
		$minute = DateTimeUtc_Impl_::get_minute($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 49-55
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 49-55
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 10-77
		$second = DateTimeUtc_Impl_::get_second($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 57-68
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 57-68
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 10-77
		$millisecond = DateTimeUtc_Impl_::get_millisecond($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 70-76
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 10-77
		$offset = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 57-68
		if ($millisecond === null) {
			$millisecond = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 49-55
		if ($second === null) {
			$second = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 41-47
		if ($minute === null) {
			$minute = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 35-39
		if ($hour1 === null) {
			$hour1 = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 10-77
		$this_0 = DateTimeUtc_Impl_::create($year, $month, $day, $hour1, $minute, $second, $millisecond);
		$this_1 = $offset;
		$this1 = $this_0;
		$a = $this1;
		$b = $offset;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:519: characters 10-77
		$this1 = new ___Int64($high, $low);
		$this2 = $this_1;
		$this3 = \Array_hx::wrap([
			DateTimeUtc_Impl_::fromInt64($this1),
			$this2,
		]);
		return $this3;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param int $millisecond
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function withMillisecond ($this1, $millisecond) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 17-21
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 17-21
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 10-77
		$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 23-28
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 23-28
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 10-77
		$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 30-33
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 30-33
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 10-77
		$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 35-39
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 35-39
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 10-77
		$hour = DateTimeUtc_Impl_::get_hour($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 41-47
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 41-47
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 10-77
		$minute = DateTimeUtc_Impl_::get_minute($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 49-55
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 49-55
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 10-77
		$second = DateTimeUtc_Impl_::get_second($this3);
		$millisecond1 = $millisecond;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 70-76
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 10-77
		$offset = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 57-68
		if ($millisecond1 === null) {
			$millisecond1 = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 49-55
		if ($second === null) {
			$second = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 41-47
		if ($minute === null) {
			$minute = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 35-39
		if ($hour === null) {
			$hour = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 10-77
		$this_0 = DateTimeUtc_Impl_::create($year, $month, $day, $hour, $minute, $second, $millisecond1);
		$this_1 = $offset;
		$this1 = $this_0;
		$a = $this1;
		$b = $offset;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:528: characters 10-77
		$this1 = new ___Int64($high, $low);
		$this2 = $this_1;
		$this3 = \Array_hx::wrap([
			DateTimeUtc_Impl_::fromInt64($this1),
			$this2,
		]);
		return $this3;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param int $minute
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function withMinute ($this1, $minute) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 17-21
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 17-21
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 10-77
		$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 23-28
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 23-28
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 10-77
		$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 30-33
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 30-33
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 10-77
		$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 35-39
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 35-39
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 10-77
		$hour = DateTimeUtc_Impl_::get_hour($this3);
		$minute1 = $minute;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 49-55
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 49-55
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 10-77
		$second = DateTimeUtc_Impl_::get_second($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 57-68
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 57-68
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 10-77
		$millisecond = DateTimeUtc_Impl_::get_millisecond($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 70-76
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 10-77
		$offset = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 57-68
		if ($millisecond === null) {
			$millisecond = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 49-55
		if ($second === null) {
			$second = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 41-47
		if ($minute1 === null) {
			$minute1 = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 35-39
		if ($hour === null) {
			$hour = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 10-77
		$this_0 = DateTimeUtc_Impl_::create($year, $month, $day, $hour, $minute1, $second, $millisecond);
		$this_1 = $offset;
		$this1 = $this_0;
		$a = $this1;
		$b = $offset;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:522: characters 10-77
		$this1 = new ___Int64($high, $low);
		$this2 = $this_1;
		$this3 = \Array_hx::wrap([
			DateTimeUtc_Impl_::fromInt64($this1),
			$this2,
		]);
		return $this3;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param int $month
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function withMonth ($this1, $month) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 17-21
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 17-21
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 10-77
		$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 30-33
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 30-33
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 10-77
		$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 35-39
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 35-39
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 10-77
		$hour = DateTimeUtc_Impl_::get_hour($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 41-47
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 41-47
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 10-77
		$minute = DateTimeUtc_Impl_::get_minute($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 49-55
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 49-55
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 10-77
		$second = DateTimeUtc_Impl_::get_second($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 57-68
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 57-68
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 10-77
		$millisecond = DateTimeUtc_Impl_::get_millisecond($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 70-76
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 10-77
		$offset = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 57-68
		if ($millisecond === null) {
			$millisecond = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 49-55
		if ($second === null) {
			$second = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 41-47
		if ($minute === null) {
			$minute = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 35-39
		if ($hour === null) {
			$hour = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 10-77
		$this_0 = DateTimeUtc_Impl_::create($year, $month, $day, $hour, $minute, $second, $millisecond);
		$this_1 = $offset;
		$this1 = $this_0;
		$a = $this1;
		$b = $offset;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:513: characters 10-77
		$this1 = new ___Int64($high, $low);
		$this2 = $this_1;
		$this3 = \Array_hx::wrap([
			DateTimeUtc_Impl_::fromInt64($this1),
			$this2,
		]);
		return $this3;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64 $offset
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function withOffset ($this1, $offset) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:531: characters 23-26
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:531: characters 10-35
		$this1 = \Array_hx::wrap([
			$this2,
			$offset,
		]);
		return $this1;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param int $second
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function withSecond ($this1, $second) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 17-21
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 17-21
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 10-77
		$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 23-28
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 23-28
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 10-77
		$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 30-33
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 30-33
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 10-77
		$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 35-39
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 35-39
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 10-77
		$hour = DateTimeUtc_Impl_::get_hour($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 41-47
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 41-47
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 10-77
		$minute = DateTimeUtc_Impl_::get_minute($this3);
		$second1 = $second;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 57-68
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 57-68
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 10-77
		$millisecond = DateTimeUtc_Impl_::get_millisecond($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 70-76
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 10-77
		$offset = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 57-68
		if ($millisecond === null) {
			$millisecond = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 49-55
		if ($second1 === null) {
			$second1 = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 41-47
		if ($minute === null) {
			$minute = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 35-39
		if ($hour === null) {
			$hour = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 10-77
		$this_0 = DateTimeUtc_Impl_::create($year, $month, $day, $hour, $minute, $second1, $millisecond);
		$this_1 = $offset;
		$this1 = $this_0;
		$a = $this1;
		$b = $offset;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:525: characters 10-77
		$this1 = new ___Int64($high, $low);
		$this2 = $this_1;
		$this3 = \Array_hx::wrap([
			DateTimeUtc_Impl_::fromInt64($this1),
			$this2,
		]);
		return $this3;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param int $year
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function withYear ($this1, $year) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 23-28
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 23-28
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 10-77
		$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 30-33
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 30-33
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 10-77
		$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 35-39
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 35-39
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 10-77
		$hour = DateTimeUtc_Impl_::get_hour($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 41-47
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 41-47
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 10-77
		$minute = DateTimeUtc_Impl_::get_minute($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 49-55
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 49-55
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 10-77
		$second = DateTimeUtc_Impl_::get_second($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 57-68
		$this2 = ($this1->arr[0] ?? null);
		$a = $this2;
		$this2 = ($this1->arr[1] ?? null);
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 57-68
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 10-77
		$millisecond = DateTimeUtc_Impl_::get_millisecond($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 70-76
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 10-77
		$offset = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 57-68
		if ($millisecond === null) {
			$millisecond = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 49-55
		if ($second === null) {
			$second = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 41-47
		if ($minute === null) {
			$minute = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 35-39
		if ($hour === null) {
			$hour = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 10-77
		$this_0 = DateTimeUtc_Impl_::create($year, $month, $day, $hour, $minute, $second, $millisecond);
		$this_1 = $offset;
		$this1 = $this_0;
		$a = $this1;
		$b = $offset;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/DateTime.hx:510: characters 10-77
		$this1 = new ___Int64($high, $low);
		$this2 = $this_1;
		$this3 = \Array_hx::wrap([
			DateTimeUtc_Impl_::fromInt64($this1),
			$this2,
		]);
		return $this3;
	}
}

class _HxAnon_DateTime_Impl_0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(DateTime_Impl_::class, 'thx._DateTime.DateTime_Impl_');
Boot::registerGetters('thx\\_DateTime\\DateTime_Impl_', [
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
	'offset' => true,
	'utc' => true
]);
