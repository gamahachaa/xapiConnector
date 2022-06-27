<?php
/**
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:198: character 3
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:536: characters 47-56
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:536: characters 47-69
		$a = $this2;
		$b = $time;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this2 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:536: characters 12-79
		$dateTime = DateTimeUtc_Impl_::fromInt64($this2);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:536: characters 72-78
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:536: characters 12-79
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:551: characters 25-36
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:551: characters 12-51
		$dateTime = DateTimeUtc_Impl_::addScaled($this2, $days, DateTimeUtc_Impl_::$millisPerDay);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:551: characters 44-50
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:551: characters 12-51
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:554: characters 25-37
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:554: characters 12-53
		$dateTime = DateTimeUtc_Impl_::addScaled($this2, $hours, DateTimeUtc_Impl_::$millisPerHour);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:554: characters 46-52
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:554: characters 12-53
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:557: characters 25-44
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:557: characters 12-67
		$dateTime = DateTimeUtc_Impl_::addScaled($this2, $milliseconds, 1);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:557: characters 60-66
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:557: characters 12-67
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:560: characters 25-39
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:560: characters 12-57
		$dateTime = DateTimeUtc_Impl_::addScaled($this2, $minutes, DateTimeUtc_Impl_::$millisPerMinute);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:560: characters 50-56
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:560: characters 12-57
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:563: characters 25-38
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:563: characters 12-55
		$dateTime = DateTimeUtc_Impl_::addMonths($this2, $months);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:563: characters 48-54
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:563: characters 12-55
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:566: characters 25-39
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:566: characters 12-57
		$dateTime = DateTimeUtc_Impl_::addScaled($this2, $seconds, DateTimeUtc_Impl_::$millisPerSecond);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:566: characters 50-56
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:566: characters 12-57
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:539: characters 47-56
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:539: characters 47-64
		$a = $this2;
		$high = (($a->high + $ticks->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $ticks->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this2 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:539: characters 12-74
		$dateTime = DateTimeUtc_Impl_::fromInt64($this2);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:539: characters 67-73
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:539: characters 12-74
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:569: characters 25-37
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:569: characters 12-53
		$dateTime = DateTimeUtc_Impl_::addMonths($this2, $years * 12);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:569: characters 46-52
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:569: characters 12-53
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:629: characters 25-40
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:629: characters 25-40
		$a_high = $high;
		$a_low = $low;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:629: characters 25-52
		$b = $newoffset;
		$high = (($a_high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a_low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a_low, $b->low) < 0) {
			$ret = $high--;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:629: characters 25-52
		$this1 = new ___Int64($high, $low);
		$this2 = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:629: characters 12-64
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:635: characters 28-37
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:635: characters 28-52
		$a = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:635: characters 40-52
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:635: characters 28-52
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:635: characters 12-53
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:178: characters 5-26
		return DateTime_Impl_::compareTo($a, $b);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $other
	 * 
	 * @return int
	 */
	public static function compareTo ($this1, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:573: characters 5-47
		if ((null === $other) && ($this1 === null)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:573: characters 39-47
			return 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:574: lines 574-575
		if (null === $this1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:574: characters 22-31
			return -1;
		} else if (null === $other) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:575: characters 28-36
			return 1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:576: characters 27-36
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:576: characters 38-53
		$this1 = ($other->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:576: characters 5-54
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:190: lines 190-193
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:190: lines 190-193
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:262: characters 24-28
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:262: characters 30-35
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:262: characters 5-36
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:167: characters 5-35
		if (DateTime_Impl_::compareTo($end, $start) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:167: characters 26-35
			return new \Array_hx();
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:168: characters 5-19
		$days = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:169: lines 169-172
		while (!DateTime_Impl_::sameDay($start, $end)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:170: characters 7-23
			$days->arr[$days->length++] = $start;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:171: characters 7-30
			$start = DateTime_Impl_::jump($start, TimePeriod::Day(), 1);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:173: characters 5-19
		$days->arr[$days->length++] = $end;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:174: characters 5-16
		return $days;
	}

	/**
	 * @param ___Int64[]|\Array_hx $self
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function equals ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:584: characters 12-26
		$this1 = ($self->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:584: characters 12-44
		$a = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:584: characters 30-44
		$this1 = ($that->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:584: characters 12-44
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:580: characters 12-21
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:580: characters 12-39
		$a = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:580: characters 25-39
		$this1 = ($that->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:580: characters 12-39
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:63: characters 12-77
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:69: characters 12-70
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:96: lines 96-97
		if ($s === null) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:97: characters 7-12
			throw Exception::thrown(new Error("null String cannot be parsed to DateTime", null, new _HxAnon_DateTime_Impl_0("thx/DateTime.hx", 97, "thx._DateTime.DateTime_Impl_", "fromString")));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:98: characters 5-130
		$pattern = new \EReg("^([-])?(\\d+)[-](\\d{2})[-](\\d{2})(?:[T ](\\d{2})[:](\\d{2})[:](\\d{2})(?:\\.(\\d+))?(Z|([+-]\\d{2})[:](\\d{2}))?)?\$", "");
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:99: lines 99-100
		if (!$pattern->match($s)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:100: characters 7-12
			throw Exception::thrown(new Error("unable to parse DateTime string: \"" . ($s??'null') . "\"", null, new _HxAnon_DateTime_Impl_0("thx/DateTime.hx", 100, "thx._DateTime.DateTime_Impl_", "fromString")));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:102: lines 102-103
		$smticks = $pattern->matched(8);
		$mticks = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:104: lines 104-107
		if (null !== $smticks) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:105: characters 7-14
			$smticks = "1" . (HxString::substring(Strings::rpad($smticks, "0", 7), 0, 7)??'null');
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:106: characters 7-13
			$mticks = \Std::parseInt($smticks) - 10000000;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:109: lines 109-110
		$time = Time_Impl_::$zero;
		$timepart = $pattern->matched(9);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:111: lines 111-120
		if ((null !== $timepart) && ("Z" !== $timepart)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:112: characters 7-39
			$hours = $pattern->matched(10);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:113: lines 113-114
			if (HxString::substring($hours, 0, 1) === "+") {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:114: characters 9-14
				$hours = HxString::substring($hours, 1);
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:115: characters 7-11
			$time = Time_Impl_::create(\Std::parseInt($hours), \Std::parseInt($pattern->matched(11)), 0);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:122: lines 122-131
		$year = \Std::parseInt($pattern->matched(2));
		$month = \Std::parseInt($pattern->matched(3));
		$day = \Std::parseInt($pattern->matched(4));
		$hour = \Std::parseInt($pattern->matched(5));
		$minute = \Std::parseInt($pattern->matched(6));
		$second = \Std::parseInt($pattern->matched(7));
		$millisecond = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:129: characters 9-10
		if ($millisecond === null) {
			$millisecond = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:128: characters 9-41
		if ($second === null) {
			$second = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:127: characters 9-41
		if ($minute === null) {
			$minute = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:126: characters 9-41
		if ($hour === null) {
			$hour = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:122: lines 122-131
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:122: lines 122-131
		$this1 = new ___Int64($high, $low);
		$this2 = $this_1;
		$this_0 = DateTimeUtc_Impl_::fromInt64($this1);
		$this_1 = $this2;
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:122: lines 122-131
		$this1 = new ___Int64($high, $low);
		$this2 = $this_1;
		$this3 = \Array_hx::wrap([
			DateTimeUtc_Impl_::fromInt64($this1),
			$this2,
		]);
		$date = $this3;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:132: lines 132-133
		if ($pattern->matched(1) === "-") {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:133: characters 50-64
			$this1 = ($date->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:133: characters 49-64
			$x = $this1;
			$high = (~$x->high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = ((~$x->low + 1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if ($low === 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:225: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:133: characters 49-64
			$this1 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:133: characters 14-72
			$this2 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this1),
				$time,
			]);
			return $this2;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:134: characters 5-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:76: characters 12-68
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:660: characters 12-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:660: characters 12-31
		return DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_DAY);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_dayOfWeek ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:669: characters 12-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:669: characters 5-37
		return DateTimeUtc_Impl_::get_dayOfWeek($this2);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_dayOfYear ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:672: characters 12-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:672: characters 12-37
		return DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_DAY_OF_YEAR);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_hour ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:663: characters 12-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:663: characters 5-32
		return DateTimeUtc_Impl_::get_hour($this2);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return bool
	 */
	public static function get_isInLeapYear ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:690: characters 23-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:690: characters 5-28
		return DateTimeUtc_Impl_::isLeapYear(DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_YEAR));
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_microsecond ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:678: characters 12-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:678: characters 5-39
		return DateTimeUtc_Impl_::get_microsecond($this2);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_millisecond ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:675: characters 12-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:675: characters 5-39
		return DateTimeUtc_Impl_::get_millisecond($this2);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_minute ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:666: characters 12-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:666: characters 5-34
		return DateTimeUtc_Impl_::get_minute($this2);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_month ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:657: characters 12-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:657: characters 12-33
		return DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_MONTH);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_monthDays ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:693: characters 24-28
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:693: characters 30-35
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:693: characters 5-36
		return DateTimeUtc_Impl_::daysInMonth($tmp, DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_MONTH));
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64
	 */
	public static function get_offset ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:651: characters 12-29
		$this2 = ($this1->arr[1] ?? null);
		return $this2;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_second ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:684: characters 12-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:684: characters 5-34
		return DateTimeUtc_Impl_::get_second($this2);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_tickInSecond ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:681: characters 12-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:681: characters 5-40
		return DateTimeUtc_Impl_::get_tickInSecond($this2);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64
	 */
	public static function get_timeOfDay ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:687: characters 12-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:687: characters 12-37
		$this1 = Int64_Impl_::divMod($this2, DateTimeUtc_Impl_::$ticksPerDayI64)->modulus;
		return $this1;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64
	 */
	public static function get_utc ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:648: characters 12-36
		$this2 = ($this1->arr[0] ?? null);
		return $this2;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_year ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:654: characters 12-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:654: characters 12-32
		return DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_YEAR);
	}

	/**
	 * @param ___Int64[]|\Array_hx $self
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function greater ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:605: characters 5-36
		return DateTime_Impl_::compareTo($self, $that) > 0;
	}

	/**
	 * @param ___Int64[]|\Array_hx $self
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function greaterEquals ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:612: characters 5-37
		return DateTime_Impl_::compareTo($self, $that) >= 0;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function greaterEqualsTo ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:608: characters 5-32
		return DateTime_Impl_::compareTo($this1, $that) >= 0;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function greaterThan ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:601: characters 5-31
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:142: characters 5-32
		if ($v === null) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:142: characters 20-32
			return false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:143: characters 5-40
		if (!($v instanceof \Array_hx)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:143: characters 28-40
			return false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:144: characters 5-33
		$vs = $v;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:145: characters 5-37
		if ($vs->length !== 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:145: characters 25-37
			return false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:146: characters 5-50
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:236: characters 15-21
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:236: characters 15-21
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:236: lines 236-241
		$sec = DateTimeUtc_Impl_::get_second($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:237: characters 15-21
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:237: characters 15-21
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:236: lines 236-241
		$min = DateTimeUtc_Impl_::get_minute($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:238: characters 15-19
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:238: characters 15-19
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:236: lines 236-241
		$hr = DateTimeUtc_Impl_::get_hour($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:239: characters 15-18
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:239: characters 15-18
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:236: lines 236-241
		$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:240: characters 21-26
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:240: characters 21-26
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:236: lines 236-241
		$mon = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:241: characters 15-19
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:241: characters 15-19
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:236: lines 236-241
		$yr = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:243: lines 243-251
		$__hx__switch = ($period->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:244: characters 20-33
			$sec += $amount;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:245: characters 20-33
			$min += $amount;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:246: characters 20-33
			$hr += $amount;
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:247: characters 20-33
			$day += $amount;
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:248: characters 20-37
			$day += $amount * 7;
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:249: characters 20-33
			$mon += $amount;
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:250: characters 20-33
			$yr += $amount;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:253: characters 12-67
		$hour = $hr;
		$minute = $min;
		$second = $sec;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:253: characters 47-58
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:253: characters 47-58
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:253: characters 12-67
		$millisecond = DateTimeUtc_Impl_::get_millisecond($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:253: characters 60-66
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:253: characters 12-67
		$offset = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:253: characters 47-58
		if ($millisecond === null) {
			$millisecond = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:253: characters 42-45
		if ($second === null) {
			$second = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:253: characters 37-40
		if ($minute === null) {
			$minute = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:253: characters 33-35
		if ($hour === null) {
			$hour = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:253: characters 12-67
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:253: characters 12-67
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:619: characters 5-36
		return DateTime_Impl_::compareTo($self, $that) < 0;
	}

	/**
	 * @param ___Int64[]|\Array_hx $self
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function lessEquals ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:626: characters 5-37
		return DateTime_Impl_::compareTo($self, $that) <= 0;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function lessEqualsTo ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:622: characters 5-32
		return DateTime_Impl_::compareTo($this1, $that) <= 0;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function lessTo ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:615: characters 5-31
		return DateTime_Impl_::compareTo($this1, $that) < 0;
	}

	/**
	 * @return ___Int64
	 */
	public static function localOffset () {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:33: lines 33-35
		$now = DateTimeUtc_Impl_::now();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:34: characters 26-34
		$local = DateTimeUtc_Impl_::getDatePart($now, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:34: characters 36-49
		$local1 = DateTimeUtc_Impl_::getDatePart($now, DateTimeUtc_Impl_::$DATE_PART_MONTH) - 1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:34: characters 51-58
		$local2 = DateTimeUtc_Impl_::getDatePart($now, DateTimeUtc_Impl_::$DATE_PART_DAY);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:34: characters 60-68
		$local3 = DateTimeUtc_Impl_::get_hour($now);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:34: characters 70-80
		$local4 = DateTimeUtc_Impl_::get_minute($now);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:33: lines 33-35
		$local5 = new \Date($local, $local1, $local2, $local3, $local4, DateTimeUtc_Impl_::get_second($now));
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:35: characters 29-41
		$a = $now;
		$b = DateTimeUtc_Impl_::$unixEpochTicks;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:33: lines 33-35
		$delta = \floor(Int64s::toFloat(Int64_Impl_::divMod($this1, DateTimeUtc_Impl_::$ticksPerMillisecondI64)->quotient) / 1000) * 1000 - $local5->getTime();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:36: characters 21-69
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:36: characters 12-70
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:225: characters 12-25
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:225: characters 26-35
		$this3 = ($other->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:225: characters 12-58
		if (DateTimeUtc_Impl_::compareTo($this2, $this3) >= 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:225: characters 44-50
			return $this1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:225: characters 53-58
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:222: characters 12-25
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:222: characters 26-35
		$this3 = ($other->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:222: characters 12-58
		if (DateTimeUtc_Impl_::compareTo($this2, $this3) <= 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:222: characters 44-50
			return $this1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:222: characters 53-58
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:596: characters 28-43
		$this2 = ($other->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:596: characters 28-55
		$a = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:596: characters 46-55
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:596: characters 28-55
		$b = $this2;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this1 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:596: characters 5-57
		$ticks = Int64s::abs($this1);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:597: characters 12-37
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:310: characters 5-24
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:322: characters 5-25
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:334: characters 5-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:286: characters 5-26
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:346: characters 5-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:298: characters 5-25
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:274: characters 5-25
		return DateTime_Impl_::jump($this1, TimePeriod::Year(), 1);
	}

	/**
	 * @param ___Int64[]|\Array_hx $self
	 * @param ___Int64[]|\Array_hx $that
	 * 
	 * @return bool
	 */
	public static function notEquals ($self, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:592: characters 12-26
		$this1 = ($self->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:592: characters 12-44
		$a = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:592: characters 30-44
		$this1 = ($that->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:592: characters 12-44
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:588: characters 12-21
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:588: characters 12-39
		$a = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:588: characters 25-39
		$this1 = ($that->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:588: characters 12-39
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:48: characters 12-58
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:55: characters 12-54
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:181: characters 5-42
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:154: lines 154-158
		try {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:155: characters 7-27
			return Either::Right(DateTime_Impl_::fromString($s));
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:156: characters 14-15
			NativeStackTrace::saveStack($_g);
			$e = Exception::caught($_g)->unwrap();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:157: characters 7-45
			return Either::Left(Error::fromDynamic($e, new _HxAnon_DateTime_Impl_0("thx/DateTime.hx", 157, "thx._DateTime.DateTime_Impl_", "parse"))->message);
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:304: characters 5-25
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:316: characters 5-26
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:328: characters 5-28
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:280: characters 5-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:340: characters 5-28
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:292: characters 5-26
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:268: characters 5-26
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:491: characters 12-48
		if (DateTime_Impl_::sameMonth($this1, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:491: characters 32-35
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:491: characters 39-48
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:491: characters 32-48
			return $tmp === DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_DAY);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:491: characters 12-48
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:497: characters 12-48
		if (DateTime_Impl_::sameDay($this1, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:497: characters 30-34
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:497: characters 38-48
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:497: characters 30-48
			return $tmp === DateTimeUtc_Impl_::get_hour($this2);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:497: characters 12-48
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:503: characters 12-53
		if (DateTime_Impl_::sameHour($this1, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:503: characters 31-37
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:503: characters 41-53
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:503: characters 31-53
			return $tmp === DateTimeUtc_Impl_::get_minute($this2);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:503: characters 12-53
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:485: characters 12-51
		if (DateTime_Impl_::sameYear($this1, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:485: characters 31-36
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:485: characters 40-51
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:485: characters 31-51
			return $tmp === DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_MONTH);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:485: characters 12-51
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:509: characters 12-55
		if (DateTime_Impl_::sameMinute($this1, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:509: characters 33-39
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:509: characters 43-55
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:509: characters 33-55
			return $tmp === DateTimeUtc_Impl_::get_second($this2);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:509: characters 12-55
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:479: characters 12-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:479: characters 20-30
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:479: characters 5-30
		return $tmp === DateTimeUtc_Impl_::getDatePart($this2, DateTimeUtc_Impl_::$DATE_PART_YEAR);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function self ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:696: characters 5-21
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:404: lines 404-420
		$__hx__switch = ($period->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:406: characters 38-47
			$this2 = ($this1->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:406: characters 38-94
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:406: characters 38-94
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:406: characters 38-94
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:406: characters 38-94
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:406: characters 22-95
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:406: characters 97-103
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:406: characters 9-104
			$this4 = \Array_hx::wrap([
				$this3,
				$this2,
			]);
			return $this4;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:408: characters 38-47
			$this2 = ($this1->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:408: characters 38-94
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:408: characters 38-94
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:408: characters 38-94
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:408: characters 38-94
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:408: characters 22-95
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:408: characters 97-103
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:408: characters 9-104
			$this4 = \Array_hx::wrap([
				$this3,
				$this2,
			]);
			return $this4;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:410: characters 38-47
			$this2 = ($this1->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:410: characters 38-90
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:410: characters 38-90
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:410: characters 38-90
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:410: characters 38-90
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:410: characters 22-91
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:410: characters 93-99
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:410: characters 9-100
			$this4 = \Array_hx::wrap([
				$this3,
				$this2,
			]);
			return $this4;
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:412: characters 16-20
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:412: characters 16-20
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:412: characters 9-54
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:412: characters 22-27
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:412: characters 22-27
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:412: characters 9-54
			$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:412: characters 29-32
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:412: characters 29-32
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:412: characters 9-54
			$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY) + 1;
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:412: characters 47-53
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:412: characters 9-54
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:412: characters 44-45
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:412: characters 41-42
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:412: characters 38-39
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:412: characters 9-54
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:412: characters 9-54
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			return $this4;
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:414: characters 24-33
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:414: characters 24-33
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:414: characters 9-34
			$wd = DateTimeUtc_Impl_::get_dayOfWeek($this3);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:415: characters 16-20
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:415: characters 16-20
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:415: characters 9-59
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:415: characters 22-27
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:415: characters 22-27
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:415: characters 9-59
			$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:415: characters 29-32
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:415: characters 29-32
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:415: characters 9-59
			$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY) + 7 - $wd;
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:415: characters 52-58
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:415: characters 9-59
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:415: characters 49-50
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:415: characters 46-47
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:415: characters 43-44
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:415: characters 9-59
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:415: characters 9-59
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			return $this4;
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:417: characters 16-20
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:417: characters 16-20
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:417: characters 9-52
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:417: characters 22-27
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:417: characters 22-27
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:417: characters 9-52
			$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH) + 1;
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:417: characters 45-51
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:417: characters 9-52
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:417: characters 42-43
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:417: characters 39-40
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:417: characters 36-37
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:417: characters 9-52
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:417: characters 9-52
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			return $this4;
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:419: characters 16-20
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:419: characters 16-20
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:419: characters 9-48
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR) + 1;
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:419: characters 41-47
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:419: characters 9-48
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:419: characters 38-39
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:419: characters 35-36
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:419: characters 32-33
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:419: characters 9-48
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:419: characters 9-48
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:374: characters 19-28
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:374: lines 374-375
		$d = DateTimeUtc_Impl_::get_dayOfWeek($this3);
		$s = $weekday;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:378: characters 5-25
		if ($s < $d) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:378: characters 16-25
			$s += 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:379: characters 5-28
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:428: lines 428-444
		$__hx__switch = ($period->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:430: characters 38-47
			$this2 = ($this1->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:430: characters 38-95
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:430: characters 38-95
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:430: characters 38-95
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:430: characters 38-95
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:430: characters 22-96
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:430: characters 98-104
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:430: characters 9-105
			$this4 = \Array_hx::wrap([
				$this3,
				$this2,
			]);
			return $this4;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:432: characters 38-47
			$this2 = ($this1->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:432: characters 38-95
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:432: characters 38-95
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:432: characters 38-95
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:432: characters 38-95
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:432: characters 22-96
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:432: characters 98-104
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:432: characters 9-105
			$this4 = \Array_hx::wrap([
				$this3,
				$this2,
			]);
			return $this4;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:434: characters 38-47
			$this2 = ($this1->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:434: characters 38-91
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:434: characters 38-91
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:434: characters 38-91
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:434: characters 38-91
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:434: characters 22-92
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:434: characters 94-100
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:434: characters 9-101
			$this4 = \Array_hx::wrap([
				$this3,
				$this2,
			]);
			return $this4;
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:436: characters 16-20
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:436: characters 16-20
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:436: characters 9-50
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:436: characters 22-27
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:436: characters 22-27
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:436: characters 9-50
			$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:436: characters 29-32
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:436: characters 29-32
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:436: characters 9-50
			$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY);
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:436: characters 43-49
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:436: characters 9-50
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:436: characters 40-41
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:436: characters 37-38
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:436: characters 34-35
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:436: characters 9-50
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:436: characters 9-50
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			return $this4;
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:438: characters 24-33
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:438: characters 24-33
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:438: characters 9-34
			$wd = DateTimeUtc_Impl_::get_dayOfWeek($this3);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:439: characters 16-20
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:439: characters 16-20
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:439: characters 9-55
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:439: characters 22-27
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:439: characters 22-27
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:439: characters 9-55
			$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:439: characters 29-32
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:439: characters 29-32
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:439: characters 9-55
			$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY) - $wd;
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:439: characters 48-54
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:439: characters 9-55
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:439: characters 45-46
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:439: characters 42-43
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:439: characters 39-40
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:439: characters 9-55
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:439: characters 9-55
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			return $this4;
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:441: characters 16-20
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:441: characters 16-20
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:441: characters 9-48
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:441: characters 22-27
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:441: characters 22-27
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:441: characters 9-48
			$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:441: characters 41-47
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:441: characters 9-48
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:441: characters 38-39
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:441: characters 35-36
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:441: characters 32-33
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:441: characters 9-48
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:441: characters 9-48
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			return $this4;
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:443: characters 16-20
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:443: characters 16-20
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:443: characters 9-44
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:443: characters 37-43
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:443: characters 9-44
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:443: characters 34-35
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:443: characters 31-32
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:443: characters 28-29
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:443: characters 9-44
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:443: characters 9-44
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:390: characters 19-28
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:390: lines 390-391
		$d = DateTimeUtc_Impl_::get_dayOfWeek($this3);
		$s = $weekday;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:394: characters 5-25
		if ($s > $d) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:394: characters 16-25
			$s -= 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:395: characters 5-28
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:452: lines 452-473
		$__hx__switch = ($period->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:454: characters 38-47
			$this2 = ($this1->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:454: characters 38-95
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:454: characters 38-95
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:454: characters 38-95
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:454: characters 38-95
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:454: characters 22-96
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:454: characters 98-104
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:454: characters 9-105
			$this4 = \Array_hx::wrap([
				$this3,
				$this2,
			]);
			return $this4;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:456: characters 38-47
			$this2 = ($this1->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:456: characters 38-95
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:456: characters 38-95
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:456: characters 38-95
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:456: characters 38-95
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:456: characters 22-96
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:456: characters 98-104
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:456: characters 9-105
			$this4 = \Array_hx::wrap([
				$this3,
				$this2,
			]);
			return $this4;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:458: characters 38-47
			$this2 = ($this1->arr[0] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:458: characters 38-91
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:458: characters 38-91
			if (Int32_Impl_::ucompare($low, $p01) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:458: characters 38-91
			if (Int32_Impl_::ucompare($low, $p10) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:458: characters 38-91
			$high = (($high + (((Int32_Impl_::mul($a->low, $b->high) + Int32_Impl_::mul($a->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:458: characters 22-92
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:458: characters 94-100
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:458: characters 9-101
			$this4 = \Array_hx::wrap([
				$this3,
				$this2,
			]);
			return $this4;
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:460: characters 20-24
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:460: characters 20-24
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:460: characters 9-40
			$mod = (DateTimeUtc_Impl_::get_hour($this3) >= 12 ? 1 : 0);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:461: characters 16-20
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:461: characters 16-20
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:461: characters 9-56
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:461: characters 22-27
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:461: characters 22-27
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:461: characters 9-56
			$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:461: characters 29-32
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:461: characters 29-32
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:461: characters 9-56
			$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY) + $mod;
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:461: characters 49-55
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:461: characters 9-56
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:461: characters 46-47
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:461: characters 43-44
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:461: characters 40-41
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:461: characters 9-56
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:461: characters 9-56
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			return $this4;
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:463: characters 24-33
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:463: characters 24-33
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:463: lines 463-464
			$wd = DateTimeUtc_Impl_::get_dayOfWeek($this3);
			$mod = null;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:464: characters 19-78
			if ($wd < 3) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:463: lines 463-464
				$mod = -$wd;
			} else if ($wd > 3) {
				$mod = 7 - $wd;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:464: characters 53-57
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
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:464: characters 53-57
				$this2 = new ___Int64($high, $low);
				$this3 = $this2;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:463: lines 463-464
				$mod = (DateTimeUtc_Impl_::get_hour($this3) < 12 ? -$wd : 7 - $wd);
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:465: characters 16-20
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:465: characters 16-20
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:465: characters 9-56
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:465: characters 22-27
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:465: characters 22-27
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:465: characters 9-56
			$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:465: characters 29-32
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:465: characters 29-32
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:465: characters 9-56
			$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY) + $mod;
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:465: characters 49-55
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:465: characters 9-56
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:465: characters 46-47
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:465: characters 43-44
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:465: characters 40-41
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:465: characters 9-56
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:465: characters 9-56
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			return $this4;
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:467: characters 19-22
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:467: characters 19-22
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			$mod = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:467: characters 48-52
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:467: characters 48-52
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			$v = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:467: characters 54-59
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:467: characters 54-59
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:467: characters 9-74
			$mod1 = ($mod > (int)(\floor(DateTimeUtc_Impl_::daysInMonth($v, DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH)) / 2 + 0.5)) ? 1 : 0);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:468: characters 16-20
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:468: characters 16-20
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:468: characters 9-54
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:468: characters 22-27
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:468: characters 22-27
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:468: characters 9-54
			$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH) + $mod1;
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:468: characters 47-53
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:468: characters 9-54
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:468: characters 44-45
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:468: characters 41-42
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:468: characters 38-39
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:468: characters 9-54
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:468: characters 9-54
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			return $this4;
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:470: characters 28-32
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:470: characters 28-32
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:470: characters 21-56
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:470: characters 49-55
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:470: characters 21-56
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:470: characters 46-47
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:470: characters 43-44
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:470: characters 40-41
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:470: characters 21-56
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:470: characters 21-56
			$this2 = new ___Int64($high, $low);
			$this3 = $this_1;
			$this4 = \Array_hx::wrap([
				DateTimeUtc_Impl_::fromInt64($this2),
				$this3,
			]);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:470: lines 470-471
			$other = $this4;
			$mod = (DateTime_Impl_::compareTo($this1, $other) > 0 ? 1 : 0);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:472: characters 16-20
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:472: characters 16-20
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:472: characters 9-50
			$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR) + $mod;
			$hour = 0;
			$minute = 0;
			$second = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:472: characters 43-49
			$this2 = ($this1->arr[1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:472: characters 9-50
			$offset = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:472: characters 40-41
			if ($second === null) {
				$second = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:472: characters 37-38
			if ($minute === null) {
				$minute = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:472: characters 34-35
			if ($hour === null) {
				$hour = 0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:472: characters 9-50
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:472: characters 9-50
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:356: lines 356-364
		if ($firstDayOfWk === null) {
			$firstDayOfWk = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:357: characters 19-28
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:357: lines 357-358
		$d = DateTimeUtc_Impl_::get_dayOfWeek($this3);
		$s = $weekday;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:361: characters 5-44
		if ($s < $firstDayOfWk) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:361: characters 35-44
			$s += 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:362: characters 5-44
		if ($d < $firstDayOfWk) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:362: characters 35-44
			$d += 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:363: characters 5-28
		return DateTime_Impl_::jump($this1, TimePeriod::Day(), $s - $d);
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * @param ___Int64 $time
	 * 
	 * @return ___Int64[]|\Array_hx
	 */
	public static function subtract ($this1, $time) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:542: characters 47-56
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:542: characters 47-69
		$a = $this2;
		$b = $time;
		$high = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b->low) < 0) {
			$ret = $high--;
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		$this2 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:542: characters 12-79
		$dateTime = DateTimeUtc_Impl_::fromInt64($this2);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:542: characters 72-78
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:542: characters 12-79
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:545: characters 38-47
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:545: characters 38-64
		$a = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:545: characters 50-64
		$this2 = ($date->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:545: characters 38-64
		$b = $this2;
		$high = (($a->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($low, $a->low) < 0) {
			$ret = $high++;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:545: characters 38-64
		$this2 = new ___Int64($high, $low);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:545: lines 545-546
		$base = DateTimeUtc_Impl_::fromInt64($this2);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:546: characters 35-41
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:546: characters 16-42
		$date_0 = $base;
		$date_1 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:547: characters 21-35
		$this1 = $date_0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:547: characters 12-36
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:639: lines 639-640
		if (null === $this1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:640: characters 7-16
			return "";
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:641: characters 44-53
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:641: characters 28-60
		$this3 = Int64s::abs($this2);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:641: characters 62-68
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:641: characters 15-69
		$abs_0 = $this3;
		$abs_1 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:642: characters 5-105
		$decimals = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:642: characters 20-36
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:642: characters 20-36
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:642: characters 20-104
		if (DateTimeUtc_Impl_::get_tickInSecond($this3) !== 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:642: characters 50-71
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:642: characters 50-71
			$this2 = new ___Int64($high, $low);
			$this3 = $this2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:642: characters 5-105
			$decimals = "." . (Strings::trimCharsRight(Ints::lpad(DateTimeUtc_Impl_::get_tickInSecond($this3), "0", 7), ")")??'null');
		} else {
			$decimals = "";
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:643: characters 17-26
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:643: characters 17-40
		$a = $this2;
		$b = Int64s::$zero;
		$v = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b->low);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:643: characters 5-41
		$isneg = (($a->high < 0 ? ($b->high < 0 ? $v : -1) : ($b->high >= 0 ? $v : 1))) < 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 36-44
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 36-44
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 34-46
		$tmp = "" . (DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR)??'null') . "-";
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 48-62
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 48-62
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 34-72
		$tmp1 = ($tmp??'null') . (Ints::lpad(DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH), "0", 2)??'null') . "-";
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 74-86
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 74-86
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 34-96
		$tmp = ($tmp1??'null') . (Ints::lpad(DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY), "0", 2)??'null') . "T";
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 98-111
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 98-111
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 34-121
		$tmp1 = ($tmp??'null') . (Ints::lpad(DateTimeUtc_Impl_::get_hour($this3), "0", 2)??'null') . ":";
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 123-138
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 123-138
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 34-148
		$tmp = ($tmp1??'null') . (Ints::lpad(DateTimeUtc_Impl_::get_minute($this3), "0", 2)??'null') . ":";
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 150-165
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 150-165
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 34-184
		$tmp1 = ($tmp??'null') . (Ints::lpad(DateTimeUtc_Impl_::get_second($this3), "0", 2)??'null') . ($decimals??'null');
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 187-205
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:644: characters 5-209
		return ((($isneg ? "-" : ""))??'null') . (($tmp1??'null') . (Time_Impl_::toGmtString($this2)??'null'));
	}

	/**
	 * @param ___Int64[]|\Array_hx $this
	 * 
	 * @return ___Int64
	 */
	public static function toUtc ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:632: characters 12-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 19-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 19-23
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 12-79
		$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 25-30
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 25-30
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 12-79
		$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 37-41
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 37-41
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 12-79
		$hour = DateTimeUtc_Impl_::get_hour($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 43-49
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 43-49
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 12-79
		$minute = DateTimeUtc_Impl_::get_minute($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 51-57
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 51-57
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 12-79
		$second = DateTimeUtc_Impl_::get_second($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 59-70
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 59-70
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 12-79
		$millisecond = DateTimeUtc_Impl_::get_millisecond($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 72-78
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 12-79
		$offset = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 59-70
		if ($millisecond === null) {
			$millisecond = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 51-57
		if ($second === null) {
			$second = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 43-49
		if ($minute === null) {
			$minute = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 37-41
		if ($hour === null) {
			$hour = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 12-79
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:518: characters 12-79
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 19-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 19-23
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 12-79
		$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 25-30
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 25-30
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 12-79
		$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 32-35
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 32-35
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 12-79
		$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY);
		$hour1 = $hour;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 43-49
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 43-49
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 12-79
		$minute = DateTimeUtc_Impl_::get_minute($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 51-57
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 51-57
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 12-79
		$second = DateTimeUtc_Impl_::get_second($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 59-70
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 59-70
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 12-79
		$millisecond = DateTimeUtc_Impl_::get_millisecond($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 72-78
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 12-79
		$offset = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 59-70
		if ($millisecond === null) {
			$millisecond = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 51-57
		if ($second === null) {
			$second = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 43-49
		if ($minute === null) {
			$minute = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 37-41
		if ($hour1 === null) {
			$hour1 = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 12-79
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:521: characters 12-79
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 19-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 19-23
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 12-79
		$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 25-30
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 25-30
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 12-79
		$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 32-35
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 32-35
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 12-79
		$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 37-41
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 37-41
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 12-79
		$hour = DateTimeUtc_Impl_::get_hour($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 43-49
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 43-49
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 12-79
		$minute = DateTimeUtc_Impl_::get_minute($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 51-57
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 51-57
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 12-79
		$second = DateTimeUtc_Impl_::get_second($this3);
		$millisecond1 = $millisecond;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 72-78
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 12-79
		$offset = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 59-70
		if ($millisecond1 === null) {
			$millisecond1 = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 51-57
		if ($second === null) {
			$second = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 43-49
		if ($minute === null) {
			$minute = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 37-41
		if ($hour === null) {
			$hour = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 12-79
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:530: characters 12-79
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 19-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 19-23
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 12-79
		$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 25-30
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 25-30
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 12-79
		$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 32-35
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 32-35
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 12-79
		$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 37-41
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 37-41
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 12-79
		$hour = DateTimeUtc_Impl_::get_hour($this3);
		$minute1 = $minute;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 51-57
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 51-57
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 12-79
		$second = DateTimeUtc_Impl_::get_second($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 59-70
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 59-70
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 12-79
		$millisecond = DateTimeUtc_Impl_::get_millisecond($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 72-78
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 12-79
		$offset = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 59-70
		if ($millisecond === null) {
			$millisecond = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 51-57
		if ($second === null) {
			$second = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 43-49
		if ($minute1 === null) {
			$minute1 = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 37-41
		if ($hour === null) {
			$hour = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 12-79
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:524: characters 12-79
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 19-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 19-23
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 12-79
		$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 32-35
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 32-35
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 12-79
		$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 37-41
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 37-41
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 12-79
		$hour = DateTimeUtc_Impl_::get_hour($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 43-49
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 43-49
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 12-79
		$minute = DateTimeUtc_Impl_::get_minute($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 51-57
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 51-57
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 12-79
		$second = DateTimeUtc_Impl_::get_second($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 59-70
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 59-70
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 12-79
		$millisecond = DateTimeUtc_Impl_::get_millisecond($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 72-78
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 12-79
		$offset = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 59-70
		if ($millisecond === null) {
			$millisecond = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 51-57
		if ($second === null) {
			$second = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 43-49
		if ($minute === null) {
			$minute = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 37-41
		if ($hour === null) {
			$hour = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 12-79
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:515: characters 12-79
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:533: characters 25-28
		$this2 = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:533: characters 12-37
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 19-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 19-23
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 12-79
		$year = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_YEAR);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 25-30
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 25-30
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 12-79
		$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 32-35
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 32-35
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 12-79
		$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 37-41
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 37-41
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 12-79
		$hour = DateTimeUtc_Impl_::get_hour($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 43-49
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 43-49
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 12-79
		$minute = DateTimeUtc_Impl_::get_minute($this3);
		$second1 = $second;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 59-70
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 59-70
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 12-79
		$millisecond = DateTimeUtc_Impl_::get_millisecond($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 72-78
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 12-79
		$offset = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 59-70
		if ($millisecond === null) {
			$millisecond = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 51-57
		if ($second1 === null) {
			$second1 = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 43-49
		if ($minute === null) {
			$minute = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 37-41
		if ($hour === null) {
			$hour = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 12-79
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:527: characters 12-79
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 25-30
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 25-30
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 12-79
		$month = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_MONTH);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 32-35
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 32-35
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 12-79
		$day = DateTimeUtc_Impl_::getDatePart($this3, DateTimeUtc_Impl_::$DATE_PART_DAY);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 37-41
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 37-41
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 12-79
		$hour = DateTimeUtc_Impl_::get_hour($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 43-49
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 43-49
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 12-79
		$minute = DateTimeUtc_Impl_::get_minute($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 51-57
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 51-57
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 12-79
		$second = DateTimeUtc_Impl_::get_second($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 59-70
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 59-70
		$this2 = new ___Int64($high, $low);
		$this3 = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 12-79
		$millisecond = DateTimeUtc_Impl_::get_millisecond($this3);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 72-78
		$this2 = ($this1->arr[1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 12-79
		$offset = $this2;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 59-70
		if ($millisecond === null) {
			$millisecond = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 51-57
		if ($second === null) {
			$second = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 43-49
		if ($minute === null) {
			$minute = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 37-41
		if ($hour === null) {
			$hour = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 12-79
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/DateTime.hx:512: characters 12-79
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
