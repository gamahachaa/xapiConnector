<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:20: characters 12-52
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:29: lines 29-70
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:31: characters 5-38
		$minute += (int)(\floor($second / 60));
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:32: characters 5-25
		$second %= 60;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:33: characters 5-32
		if ($second < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:33: characters 20-32
			$second += 60;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:35: characters 5-36
		$hour += (int)(\floor($minute / 60));
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:36: characters 5-25
		$minute %= 60;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:37: characters 5-32
		if ($minute < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:37: characters 20-32
			$minute += 60;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:39: characters 5-33
		$day += (int)(\floor($hour / 24));
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:40: characters 5-21
		$hour %= 24;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:41: characters 5-28
		if ($hour < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:41: characters 18-28
			$hour += 24;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:43: lines 43-50
		if ($day === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:44: characters 7-16
			--$month;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:45: lines 45-48
			if ($month < 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:46: characters 9-19
				$month = 11;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:47: characters 9-17
				--$year;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:49: characters 7-37
			$day = Dates::daysInMonth($year, $month);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:52: characters 5-35
		$year += (int)(\floor($month / 12));
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:53: characters 5-23
		$month %= 12;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:54: characters 5-30
		if ($month < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:54: characters 19-30
			$month += 12;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:56: characters 5-41
		$days = Dates::daysInMonth($year, $month);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:57: lines 57-67
		while ($day > $days) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:58: lines 58-61
			if ($day > $days) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:59: characters 13-24
				$day -= $days;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:60: characters 13-20
				++$month;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:62: lines 62-65
			if ($month > 11) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:63: characters 13-24
				$month -= 12;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:64: characters 13-19
				++$year;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:66: characters 9-40
			$days = Dates::daysInMonth($year, $month);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:69: characters 5-60
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:184: lines 184-189
		if ($month === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:187: characters 15-41
			if (Dates::isLeapYear($year)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:187: characters 34-36
				return 29;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:187: characters 39-41
				return 28;
			}
		} else if ($month === 0 || $month === 2 || $month === 4 || $month === 6 || $month === 7 || $month === 9 || $month === 11) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:185: characters 34-36
			return 31;
		} else if ($month === 3 || $month === 5 || $month === 8 || $month === 10) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:186: characters 25-27
			return 30;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:188: characters 16-21
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:202: characters 5-54
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:79: characters 5-35
		if (Dates::compare($end, $start) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:79: characters 26-35
			return new \Array_hx();
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:80: characters 5-19
		$days = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:81: lines 81-84
		while (!Dates::sameDay($start, $end)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:82: characters 7-23
			$days->arr[$days->length++] = $start;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:83: characters 7-29
			$start = Dates::jump($start, TimePeriod::Day(), 1);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:85: characters 5-19
		$days->arr[$days->length++] = $end;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:86: characters 5-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:93: characters 5-45
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:116: characters 5-36
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:132: characters 5-37
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:170: characters 56-90
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:156: characters 5-38
		if (($year % 4) !== 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:156: characters 26-38
			return false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:158: lines 158-159
		if (($year % 100) === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:159: characters 7-33
			return ($year % 400) === 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:161: characters 5-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:280: lines 280-285
		$sec = $date->getSeconds();
		$min = $date->getMinutes();
		$hour = $date->getHours();
		$day = $date->getDate();
		$month = $date->getMonth();
		$year = $date->getFullYear();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:287: lines 287-295
		$__hx__switch = ($period->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:288: characters 20-35
			$sec += $amount;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:289: characters 20-35
			$min += $amount;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:290: characters 20-35
			$hour += $amount;
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:291: characters 20-35
			$day += $amount;
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:292: characters 20-39
			$day += $amount * 7;
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:293: characters 20-35
			$month += $amount;
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:294: characters 20-35
			$year += $amount;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:297: characters 5-52
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:126: characters 5-36
		return Dates::compare($self, $other) < 0;
	}

	/**
	 * @param \Date $self
	 * @param \Date $other
	 * 
	 * @return bool
	 */
	public static function lessEqual ($self, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:146: characters 5-35
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:142: characters 5-37
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:304: characters 12-59
		if ($self->getTime() > $other->getTime()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:304: characters 47-51
			return $self;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:304: characters 54-59
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:310: characters 12-59
		if ($self->getTime() < $other->getTime()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:310: characters 47-51
			return $self;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:310: characters 54-59
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:120: characters 5-32
		return Dates::compare($self, $other) > 0;
	}

	/**
	 * @param \Date $self
	 * @param \Date $other
	 * 
	 * @return bool
	 */
	public static function moreEqual ($self, $other) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:136: characters 5-38
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:102: lines 102-110
		if ($units === null) {
			$units = 1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:103: lines 103-104
		if (null === $period) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:104: characters 7-22
			$period = TimePeriod::Second();
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:105: lines 105-106
		if ($units < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:106: characters 7-21
			$units = -$units;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:107: lines 107-108
		$min = Dates::jump($self, $period, -$units);
		$max = Dates::jump($self, $period, $units);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:109: characters 12-63
		if (Dates::compare($min, $other) <= 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:109: characters 38-63
			return Dates::compare($max, $other) >= 0;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:109: characters 12-63
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:414: characters 5-25
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:426: characters 5-26
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:438: characters 5-28
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:390: characters 5-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:450: characters 5-28
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:402: characters 5-26
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:378: characters 5-26
		return Dates::jump($d, TimePeriod::Year(), 1);
	}

	/**
	 * @param int $month
	 * @param int $year
	 * 
	 * @return int
	 */
	public static function numDaysInMonth ($month, $year) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:193: characters 5-36
		return Dates::daysInMonth($year, $month);
	}

	/**
	 * @param \Date $d
	 * 
	 * @return int
	 */
	public static function numDaysInThisMonth ($d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:206: characters 5-30
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:492: lines 492-496
		try {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:493: characters 7-39
			return Either::Right(\Date::fromString($s));
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:494: characters 13-14
			NativeStackTrace::saveStack($_g);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:495: characters 7-67
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:408: characters 5-26
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:420: characters 5-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:432: characters 5-29
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:384: characters 5-28
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:444: characters 5-29
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:396: characters 5-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:372: characters 5-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:224: characters 12-71
		if (Dates::sameMonth($self, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:224: characters 38-71
			return $self->getDate() === $other->getDate();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:224: characters 12-71
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:230: characters 12-71
		if (Dates::sameDay($self, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:230: characters 36-71
			return $self->getHours() === $other->getHours();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:230: characters 12-71
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:236: characters 12-76
		if (Dates::sameHour($self, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:236: characters 37-76
			return $self->getMinutes() === $other->getMinutes();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:236: characters 12-76
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:218: characters 14-74
		if (Dates::sameYear($self, $other)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:218: characters 39-74
			return $self->getMonth() === $other->getMonth();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:218: characters 14-74
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:212: characters 7-55
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:246: characters 5-47
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:342: lines 342-343
		$d = $date->getDay();
		$s = $day;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:346: characters 5-25
		if ($s < $d) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:346: characters 16-25
			$s += 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:347: characters 5-34
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:256: characters 5-47
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:360: lines 360-361
		$d = $date->getDay();
		$s = $day;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:364: characters 5-25
		if ($s > $d) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:364: characters 16-25
			$s -= 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:365: characters 5-34
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:266: characters 5-45
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:322: lines 322-330
		if ($firstDayOfWk === null) {
			$firstDayOfWk = 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:323: lines 323-324
		$d = $date->getDay();
		$s = $day;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:327: characters 5-44
		if ($s < $firstDayOfWk) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:327: characters 35-44
			$s += 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:328: characters 5-44
		if ($d < $firstDayOfWk) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:328: characters 35-44
			$d += 7;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:329: characters 5-34
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:468: characters 5-121
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:474: characters 5-121
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:480: characters 5-121
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:462: characters 5-122
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:486: characters 5-121
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Dates.hx:456: characters 5-118
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
