<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx
 */

namespace thx;

use \php\Boot;
use \haxe\Exception;
use \thx\_Ord\Ord_Impl_;
use \thx\_Timestamp\Timestamp_Impl_;
use \haxe\NativeStackTrace;

/**
 * `Dates` provides additional extension methods on top of the `Date` type.
 * ```
 * using Dates;
 * ```
 * @author Jason O'Neil
 * @author Franco Ponticelli
 */
class Dates {
	/**
	 * @var \Closure
	 */
	static public $order;

	/**
	 * It compares two dates.
	 * 
	 * @param \Date $a
	 * @param \Date $b
	 * 
	 * @return int
	 */
	public static function compare ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:20: characters 10-50
		$a1 = $a->getTime();
		$b1 = $b->getTime();
		if ($a1 < $b1) {
			return -1;
		} else if ($a1 > $b1) {
			return 1;
		} else {
			return 0;
		}
	}

	/**
	 * Creates a Date by using the passed year, month, day, hour, minute, second.
	 * Note that each argument can overflow its normal boundaries (e.g. a month value of `-33` is perfectly valid)
	 * and the method will normalize that value by offsetting the other arguments by the right amount.
	 * 
	 * @param int $year
	 * @param int $month
	 * @param int $day
	 * @param int $hour
	 * @param int $minute
	 * @param int $second
	 * 
	 * @return \Date
	 */
	public static function create ($year, $month = 0, $day = 1, $hour = 0, $minute = 0, $second = 0) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:29: lines 29-74
		if ($month === null) {
			$month = 0;
		}
		if ($day === null) {
			$day = 1;
		}
		if ($hour === null) {
			$hour = 0;
		}
		if ($minute === null) {
			$minute = 0;
		}
		if ($second === null) {
			$second = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:31: characters 3-36
		$minute += (int)(\floor($second / 60));
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:32: characters 3-23
		$second %= 60;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:33: lines 33-34
		if ($second < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:34: characters 4-16
			$second += 60;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:36: characters 3-34
		$hour += (int)(\floor($minute / 60));
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:37: characters 3-23
		$minute %= 60;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:38: lines 38-39
		if ($minute < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:39: characters 4-16
			$minute += 60;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:41: characters 3-31
		$day += (int)(\floor($hour / 24));
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:42: characters 3-19
		$hour %= 24;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:43: lines 43-44
		if ($hour < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:44: characters 4-14
			$hour += 24;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:46: lines 46-53
		if ($day === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:47: characters 4-14
			--$month;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:48: lines 48-51
			if ($month < 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:49: characters 5-15
				$month = 11;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:50: characters 5-14
				--$year;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:52: characters 4-34
			$day = Dates::daysInMonth($year, $month);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:55: characters 3-33
		$year += (int)(\floor($month / 12));
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:56: characters 3-21
		$month %= 12;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:57: lines 57-58
		if ($month < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:58: characters 4-15
			$month += 12;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:60: characters 3-39
		$days = Dates::daysInMonth($year, $month);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:61: lines 61-71
		while ($day > $days) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:62: lines 62-65
			if ($day > $days) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:63: characters 5-16
				$day -= $days;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:64: characters 5-12
				++$month;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:66: lines 66-69
			if ($month > 11) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:67: characters 5-16
				$month -= 12;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:68: characters 5-11
				++$year;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:70: characters 4-35
			$days = Dates::daysInMonth($year, $month);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:73: characters 3-58
		return new \Date($year, $month, $day, $hour, $minute, $second);
	}

	/**
	 * Returns the number of days in a month.
	 * @param month An integer representing the month. (Jan=0, Dec=11)
	 * @param year An 4 digit integer representing the year.
	 * @return Int, the number of days in the month.
	 * @throws Error if the month is not between 0 and 11.
	 * 
	 * @param int $year
	 * @param int $month
	 * 
	 * @return int
	 */
	public static function daysInMonth ($year, $month) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:189: lines 189-194
		if ($month === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:192: characters 12-38
			if (Dates::isLeapYear($year)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:192: characters 31-33
				return 29;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:192: characters 36-38
				return 28;
			}
		} else if ($month === 0 || $month === 2 || $month === 4 || $month === 6 || $month === 7 || $month === 9 || $month === 11) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:190: characters 31-33
			return 31;
		} else if ($month === 3 || $month === 5 || $month === 8 || $month === 10) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:191: characters 22-24
			return 30;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:193: characters 13-18
			throw Exception::thrown("Invalid month \"" . ($month??'null') . "\".  Month should be a number, Jan=0, Dec=11");
		}
	}

	/**
	 * Tells how many days in the month of the given date.
	 * @param date The date representing the month we are checking.
	 * @return Int, the number of days in the month.
	 * 
	 * @param \Date $d
	 * 
	 * @return int
	 */
	public static function daysInThisMonth ($d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:207: characters 3-52
		return Dates::daysInMonth($d->getFullYear(), $d->getMonth());
	}

	/**
	 * Creates an array of dates that begin at `start` and end at `end` included.
	 * Time values are pick from the `start` value except for the last value that will
	 * match `end`. No interpolation is made.
	 * 
	 * @param \Date $start
	 * @param \Date $end
	 * 
	 * @return \Date[]|\Array_hx
	 */
	public static function daysRange ($start, $end) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:83: lines 83-84
		if (Dates::compare($end, $start) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:84: characters 4-13
			return new \Array_hx();
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:85: characters 3-17
		$days = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:86: lines 86-89
		while (!Dates::sameDay($start, $end)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:87: characters 4-20
			$days->arr[$days->length++] = $start;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:88: characters 4-26
			$start = Dates::jump($start, TimePeriod::Day(), 1);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:90: characters 3-17
		$days->arr[$days->length++] = $end;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:91: characters 3-14
		return $days;
	}

	/**
	 * Returns `true` if the passed dates are the same.
	 * 
	 * @param \Date $self
	 * @param \Date $other
	 * 
	 * @return bool
	 */
	public static function equals ($self, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:98: characters 3-43
		return Boot::equal($self->getTime(), $other->getTime());
	}

	/**
	 * Returns `true` if the `self` date is greater than `other`.
	 * 
	 * @param \Date $self
	 * @param \Date $other
	 * 
	 * @return bool
	 */
	public static function greater ($self, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:120: characters 3-34
		return Dates::compare($self, $other) > 0;
	}

	/**
	 * Returns `true` if the `self` date is greater than or equal to `other`.
	 * 
	 * @param \Date $self
	 * @param \Date $other
	 * 
	 * @return bool
	 */
	public static function greaterEquals ($self, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:136: characters 3-35
		return Dates::compare($self, $other) >= 0;
	}

	/**
	 * Tells if the given date is inside a leap year.
	 * @param date The date object to check.
	 * @return True if it is in a leap year, false otherwise.
	 * 
	 * @param \Date $d
	 * 
	 * @return bool
	 */
	public static function isInLeapYear ($d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:176: characters 3-37
		return Dates::isLeapYear($d->getFullYear());
	}

	/**
	 * Tells if a year is a leap year.
	 * @param year The year, represented as a 4 digit integer
	 * @return True if a leap year, false otherwise.
	 * 
	 * @param int $year
	 * 
	 * @return bool
	 */
	public static function isLeapYear ($year) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:160: lines 160-161
		if (($year % 4) !== 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:161: characters 4-16
			return false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:163: lines 163-164
		if (($year % 100) === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:164: characters 4-30
			return ($year % 400) === 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:166: characters 3-14
		return true;
	}

	/**
	 * Get a date relative to the current date, shifting by a set period of time.
	 * Please note this works by constructing a new date object, rather than using `DateTools.delta()`.
	 * The key difference is that this allows us to jump over a period that may not be a set number of seconds.
	 * For example, jumping between months (which have different numbers of days), leap years, leap seconds, daylight savings time changes etc.
	 * @param date The starting date.
	 * @param period The TimePeriod you wish to jump by, Second, Minute, Hour, Day, Week, Month or Year.
	 * @param amount The multiple of `period` that you wish to jump by. A positive amount moves forward in time, a negative amount moves backward.
	 * 
	 * @param \Date $date
	 * @param TimePeriod $period
	 * @param int $amount
	 * 
	 * @return \Date
	 */
	public static function jump ($date, $period, $amount) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:285: lines 285-290
		$sec = $date->getSeconds();
		$min = $date->getMinutes();
		$hour = $date->getHours();
		$day = $date->getDate();
		$month = $date->getMonth();
		$year = $date->getFullYear();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:292: lines 292-307
		$__hx__switch = ($period->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:294: characters 5-18
			$sec += $amount;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:296: characters 5-18
			$min += $amount;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:298: characters 5-19
			$hour += $amount;
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:300: characters 5-18
			$day += $amount;
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:302: characters 5-22
			$day += $amount * 7;
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:304: characters 5-20
			$month += $amount;
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:306: characters 5-19
			$year += $amount;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:309: characters 3-50
		return Dates::create($year, $month, $day, $hour, $min, $sec);
	}

	/**
	 * Returns `true` if the `self` date is lesser than `other`.
	 * 
	 * @param \Date $self
	 * @param \Date $other
	 * 
	 * @return bool
	 */
	public static function less ($self, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:130: characters 3-34
		return Dates::compare($self, $other) < 0;
	}

	/**
	 * @param \Date $self
	 * @param \Date $other
	 * 
	 * @return bool
	 */
	public static function lessEqual ($self, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:150: characters 3-33
		return Dates::compare($self, $other) <= 0;
	}

	/**
	 * Returns `true` if the `self` date is lesser than or equal to `other`.
	 * 
	 * @param \Date $self
	 * @param \Date $other
	 * 
	 * @return bool
	 */
	public static function lessEquals ($self, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:146: characters 3-35
		return Dates::compare($self, $other) <= 0;
	}

	/**
	 * Finds and returns which of the two passed dates is the newest.
	 * 
	 * @param \Date $self
	 * @param \Date $other
	 * 
	 * @return \Date
	 */
	public static function max ($self, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:316: characters 10-57
		if ($self->getTime() > $other->getTime()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:316: characters 45-49
			return $self;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:316: characters 52-57
			return $other;
		}
	}

	/**
	 * Finds and returns which of the two passed dates is the oldest.
	 * 
	 * @param \Date $self
	 * @param \Date $other
	 * 
	 * @return \Date
	 */
	public static function min ($self, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:322: characters 10-57
		if ($self->getTime() < $other->getTime()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:322: characters 45-49
			return $self;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:322: characters 52-57
			return $other;
		}
	}

	/**
	 * @param \Date $self
	 * @param \Date $other
	 * 
	 * @return bool
	 */
	public static function more ($self, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:124: characters 3-30
		return Dates::compare($self, $other) > 0;
	}

	/**
	 * @param \Date $self
	 * @param \Date $other
	 * 
	 * @return bool
	 */
	public static function moreEqual ($self, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:140: characters 3-36
		return Dates::compare($self, $other) >= 0;
	}

	/**
	 * Returns `true` if the dates are approximately equals. The amount of delta
	 * allowed is determined by `units` and it spans that amount equally before and
	 * after the `self` date. The default `unit` value is `1`.
	 * The default `period` range is `Second`.
	 * 
	 * @param \Date $self
	 * @param \Date $other
	 * @param int $units
	 * @param TimePeriod $period
	 * 
	 * @return bool
	 */
	public static function nearEquals ($self, $other, $units = 1, $period = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:107: lines 107-114
		if ($units === null) {
			$units = 1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:108: lines 108-109
		if (null === $period) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:109: characters 4-19
			$period = TimePeriod::Second();
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:110: lines 110-111
		if ($units < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:111: characters 4-18
			$units = -$units;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:112: characters 3-73
		$min = Dates::jump($self, $period, -$units);
		$max = Dates::jump($self, $period, $units);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:113: characters 10-61
		if (Dates::compare($min, $other) <= 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:113: characters 36-61
			return Dates::compare($max, $other) >= 0;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:113: characters 10-61
			return false;
		}
	}

	/**
	 * Returns a new date, exactly 1 day after the given date/time.
	 * 
	 * @param \Date $d
	 * 
	 * @return \Date
	 */
	public static function nextDay ($d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:427: characters 3-25
		return Dates::jump($d, TimePeriod::Day(), 1);
	}

	/**
	 * Returns a new date, exactly 1 hour after the given date/time.
	 * 
	 * @param \Date $d
	 * 
	 * @return \Date
	 */
	public static function nextHour ($d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:439: characters 3-26
		return Dates::jump($d, TimePeriod::Hour(), 1);
	}

	/**
	 * Returns a new date, exactly 1 minute after the given date/time.
	 * 
	 * @param \Date $d
	 * 
	 * @return \Date
	 */
	public static function nextMinute ($d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:451: characters 3-28
		return Dates::jump($d, TimePeriod::Minute(), 1);
	}

	/**
	 * Returns a new date, exactly 1 month after the given date/time.
	 * 
	 * @param \Date $d
	 * 
	 * @return \Date
	 */
	public static function nextMonth ($d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:403: characters 3-27
		return Dates::jump($d, TimePeriod::Month(), 1);
	}

	/**
	 * Returns a new date, exactly 1 second after the given date/time.
	 * 
	 * @param \Date $d
	 * 
	 * @return \Date
	 */
	public static function nextSecond ($d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:463: characters 3-28
		return Dates::jump($d, TimePeriod::Second(), 1);
	}

	/**
	 * Returns a new date, exactly 1 week after the given date/time.
	 * 
	 * @param \Date $d
	 * 
	 * @return \Date
	 */
	public static function nextWeek ($d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:415: characters 3-26
		return Dates::jump($d, TimePeriod::Week(), 1);
	}

	/**
	 * Returns a new date, exactly 1 year after the given date/time.
	 * 
	 * @param \Date $d
	 * 
	 * @return \Date
	 */
	public static function nextYear ($d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:391: characters 3-26
		return Dates::jump($d, TimePeriod::Year(), 1);
	}

	/**
	 * @param int $month
	 * @param int $year
	 * 
	 * @return int
	 */
	public static function numDaysInMonth ($month, $year) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:198: characters 3-34
		return Dates::daysInMonth($year, $month);
	}

	/**
	 * @param \Date $d
	 * 
	 * @return int
	 */
	public static function numDaysInThisMonth ($d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:211: characters 3-28
		return Dates::daysInThisMonth($d);
	}

	/**
	 * Safely parse a string value to a date.
	 * 
	 * @param string $s
	 * 
	 * @return Either
	 */
	public static function parseDate ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:505: lines 505-509
		try {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:506: characters 4-36
			return Either::Right(\Date::fromString($s));
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:507: characters 12-13
			NativeStackTrace::saveStack($_g);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:508: characters 4-64
			return Either::Left("" . ($s??'null') . " could not be parsed to a valid Date value.");
		}
	}

	/**
	 * Returns a new date, exactly 1 day before the given date/time.
	 * 
	 * @param \Date $d
	 * 
	 * @return \Date
	 */
	public static function prevDay ($d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:421: characters 3-26
		return Dates::jump($d, TimePeriod::Day(), -1);
	}

	/**
	 * Returns a new date, exactly 1 hour before the given date/time.
	 * 
	 * @param \Date $d
	 * 
	 * @return \Date
	 */
	public static function prevHour ($d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:433: characters 3-27
		return Dates::jump($d, TimePeriod::Hour(), -1);
	}

	/**
	 * Returns a new date, exactly 1 minute before the given date/time.
	 * 
	 * @param \Date $d
	 * 
	 * @return \Date
	 */
	public static function prevMinute ($d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:445: characters 3-29
		return Dates::jump($d, TimePeriod::Minute(), -1);
	}

	/**
	 * Returns a new date, exactly 1 month before the given date/time.
	 * 
	 * @param \Date $d
	 * 
	 * @return \Date
	 */
	public static function prevMonth ($d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:397: characters 3-28
		return Dates::jump($d, TimePeriod::Month(), -1);
	}

	/**
	 * Returns a new date, exactly 1 second before the given date/time.
	 * 
	 * @param \Date $d
	 * 
	 * @return \Date
	 */
	public static function prevSecond ($d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:457: characters 3-29
		return Dates::jump($d, TimePeriod::Second(), -1);
	}

	/**
	 * Returns a new date, exactly 1 week before the given date/time.
	 * 
	 * @param \Date $d
	 * 
	 * @return \Date
	 */
	public static function prevWeek ($d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:409: characters 3-27
		return Dates::jump($d, TimePeriod::Week(), -1);
	}

	/**
	 * Returns a new date, exactly 1 year before the given date/time.
	 * 
	 * @param \Date $d
	 * 
	 * @return \Date
	 */
	public static function prevYear ($d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:385: characters 3-27
		return Dates::jump($d, TimePeriod::Year(), -1);
	}

	/**
	 * Returns true if the 2 dates share the same year, month and day.
	 * 
	 * @param \Date $self
	 * @param \Date $other
	 * 
	 * @return bool
	 */
	public static function sameDay ($self, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:229: characters 10-69
		if (Dates::sameMonth($self, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:229: characters 36-69
			return $self->getDate() === $other->getDate();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:229: characters 10-69
			return false;
		}
	}

	/**
	 * Returns true if the 2 dates share the same year, month, day and hour.
	 * 
	 * @param \Date $self
	 * @param \Date $other
	 * 
	 * @return bool
	 */
	public static function sameHour ($self, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:235: characters 10-69
		if (Dates::sameDay($self, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:235: characters 34-69
			return $self->getHours() === $other->getHours();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:235: characters 10-69
			return false;
		}
	}

	/**
	 * Returns true if the 2 dates share the same year, month, day, hour and minute.
	 * 
	 * @param \Date $self
	 * @param \Date $other
	 * 
	 * @return bool
	 */
	public static function sameMinute ($self, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:241: characters 10-74
		if (Dates::sameHour($self, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:241: characters 35-74
			return $self->getMinutes() === $other->getMinutes();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:241: characters 10-74
			return false;
		}
	}

	/**
	 * Returns true if the 2 dates share the same year and month.
	 * 
	 * @param \Date $self
	 * @param \Date $other
	 * 
	 * @return bool
	 */
	public static function sameMonth ($self, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:223: characters 10-70
		if (Dates::sameYear($self, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:223: characters 35-70
			return $self->getMonth() === $other->getMonth();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:223: characters 10-70
			return false;
		}
	}

	/**
	 * Returns true if the 2 dates share the same year.
	 * 
	 * @param \Date $self
	 * @param \Date $other
	 * 
	 * @return bool
	 */
	public static function sameYear ($self, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:217: characters 3-51
		return $self->getFullYear() === $other->getFullYear();
	}

	/**
	 * Snaps a Date to the next second, minute, hour, day, week, month or year.
	 * @param date The date to snap.  See Date.
	 * @param period Either: Second, Minute, Hour, Day, Week, Month or Year
	 * @return The snapped date.
	 * 
	 * @param \Date $date
	 * @param TimePeriod $period
	 * 
	 * @return \Date
	 */
	public static function snapNext ($date, $period) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:251: characters 3-45
		return \Date::fromTime(Timestamp_Impl_::snapNext($date->getTime(), $period));
	}

	/**
	 * Snaps a date to the next given weekday.  The time within the day will stay the same.
	 * If you are already on the given day, the date will not change.
	 * @param date The date value to snap
	 * @param day Day to snap to.  Either `Sunday`, `Monday`, `Tuesday` etc.
	 * @return The date of the day you have snapped to.
	 * 
	 * @param \Date $date
	 * @param int $day
	 * 
	 * @return \Date
	 */
	public static function snapNextWeekDay ($date, $day) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:355: characters 3-38
		$d = $date->getDay();
		$s = $day;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:358: lines 358-359
		if ($s < $d) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:359: characters 4-13
			$s += 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:360: characters 3-32
		return Dates::jump($date, TimePeriod::Day(), $s - $d);
	}

	/**
	 * Snaps a Date to the previous second, minute, hour, day, week, month or year.
	 * @param date The date to snap.  See Date.
	 * @param period Either: Second, Minute, Hour, Day, Week, Month or Year
	 * @return The snapped date.
	 * 
	 * @param \Date $date
	 * @param TimePeriod $period
	 * 
	 * @return \Date
	 */
	public static function snapPrev ($date, $period) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:261: characters 3-45
		return \Date::fromTime(Timestamp_Impl_::snapPrev($date->getTime(), $period));
	}

	/**
	 * Snaps a date to the previous given weekday.  The time within the day will stay the same.
	 * If you are already on the given day, the date will not change.
	 * @param date The date value to snap
	 * @param day Day to snap to.  Either `Sunday`, `Monday`, `Tuesday` etc.
	 * @return The date of the day you have snapped to.
	 * 
	 * @param \Date $date
	 * @param int $day
	 * 
	 * @return \Date
	 */
	public static function snapPrevWeekDay ($date, $day) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:373: characters 3-38
		$d = $date->getDay();
		$s = $day;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:376: lines 376-377
		if ($s > $d) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:377: characters 4-13
			$s -= 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:378: characters 3-32
		return Dates::jump($date, TimePeriod::Day(), $s - $d);
	}

	/**
	 * Snaps a Date to the nearest second, minute, hour, day, week, month or year.
	 * @param date The date to snap.  See Date.
	 * @param period Either: Second, Minute, Hour, Day, Week, Month or Year
	 * @return The snapped date.
	 * 
	 * @param \Date $date
	 * @param TimePeriod $period
	 * 
	 * @return \Date
	 */
	public static function snapTo ($date, $period) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:271: characters 3-43
		return \Date::fromTime(Timestamp_Impl_::snapTo($date->getTime(), $period));
	}

	/**
	 * Snaps a date to the given weekday inside the current week.  The time within the day will stay the same.
	 * If you are already on the given day, the date will not change.
	 * @param date The date value to snap
	 * @param day Day to snap to.  Either `Sunday`, `Monday`, `Tuesday` etc.
	 * @param firstDayOfWk The first day of the week.  Default to `Sunday`.
	 * @return The date of the day you have snapped to.
	 * 
	 * @param \Date $date
	 * @param int $day
	 * @param int $firstDayOfWk
	 * 
	 * @return \Date
	 */
	public static function snapToWeekDay ($date, $day, $firstDayOfWk = 0) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:334: lines 334-343
		if ($firstDayOfWk === null) {
			$firstDayOfWk = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:335: characters 3-38
		$d = $date->getDay();
		$s = $day;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:338: lines 338-339
		if ($s < $firstDayOfWk) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:339: characters 4-13
			$s += 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:340: lines 340-341
		if ($d < $firstDayOfWk) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:341: characters 4-13
			$d += 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:342: characters 3-32
		return Dates::jump($date, TimePeriod::Day(), $s - $d);
	}

	/**
	 * Returns a new date that is modified only by the day.
	 * 
	 * @param \Date $date
	 * @param int $day
	 * 
	 * @return \Date
	 */
	public static function withDay ($date, $day) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:481: characters 3-119
		return Dates::create($date->getFullYear(), $date->getMonth(), $day, $date->getHours(), $date->getMinutes(), $date->getSeconds());
	}

	/**
	 * Returns a new date that is modified only by the hour.
	 * 
	 * @param \Date $date
	 * @param int $hour
	 * 
	 * @return \Date
	 */
	public static function withHour ($date, $hour) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:487: characters 3-119
		return Dates::create($date->getFullYear(), $date->getMonth(), $date->getDate(), $hour, $date->getMinutes(), $date->getSeconds());
	}

	/**
	 * Returns a new date that is modified only by the minute.
	 * 
	 * @param \Date $date
	 * @param int $minute
	 * 
	 * @return \Date
	 */
	public static function withMinute ($date, $minute) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:493: characters 3-119
		return Dates::create($date->getFullYear(), $date->getMonth(), $date->getDate(), $date->getHours(), $minute, $date->getSeconds());
	}

	/**
	 * Returns a new date that is modified only by the month (remember that month indexes begin at zero).
	 * 
	 * @param \Date $date
	 * @param int $month
	 * 
	 * @return \Date
	 */
	public static function withMonth ($date, $month) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:475: characters 3-120
		return Dates::create($date->getFullYear(), $month, $date->getDate(), $date->getHours(), $date->getMinutes(), $date->getSeconds());
	}

	/**
	 * Returns a new date that is modified only by the second.
	 * 
	 * @param \Date $date
	 * @param int $second
	 * 
	 * @return \Date
	 */
	public static function withSecond ($date, $second) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:499: characters 3-119
		return Dates::create($date->getFullYear(), $date->getMonth(), $date->getDate(), $date->getHours(), $date->getMinutes(), $second);
	}

	/**
	 * Returns a new date that is modified only by the year.
	 * 
	 * @param \Date $date
	 * @param int $year
	 * 
	 * @return \Date
	 */
	public static function withYear ($date, $year) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dates.hx:469: characters 3-116
		return Dates::create($year, $date->getMonth(), $date->getDate(), $date->getHours(), $date->getMinutes(), $date->getSeconds());
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


		self::$order = Ord_Impl_::fromIntComparison(Boot::getStaticClosure(Dates::class, 'compare'));
	}
}

Boot::registerClass(Dates::class, 'thx.Dates');
Dates::__hx__init();
