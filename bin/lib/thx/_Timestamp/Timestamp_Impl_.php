<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx
 */

namespace thx\_Timestamp;

use \php\Boot;
use \thx\Dates;
use \thx\TimePeriod;

final class Timestamp_Impl_ {
	/**
	 * @param float $t
	 * @param float $v
	 * 
	 * @return float
	 */
	public static function c ($t, $v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:137: characters 3-31
		return \ceil($t / $v) * $v;
	}

	/**
	 * Creates a timestamp by using the passed year, month, day, hour, minute, second.
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
	 * @return float
	 */
	public static function create ($year, $month = null, $day = null, $hour = null, $minute = null, $second = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:24: characters 3-72
		return Dates::create($year, $month, $day, $hour, $minute, $second)->getTime();
	}

	/**
	 * @param float $t
	 * @param float $v
	 * 
	 * @return float
	 */
	public static function f ($t, $v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:134: characters 3-32
		return \floor($t / $v) * $v;
	}

	/**
	 * @param \Date $d
	 * 
	 * @return float
	 */
	public static function fromDate ($d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:30: characters 3-21
		return $d->getTime();
	}

	/**
	 * @param string $s
	 * 
	 * @return float
	 */
	public static function fromString ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:33: characters 3-38
		return \Date::fromString($s)->getTime();
	}

	/**
	 * @return float
	 */
	public static function now () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:27: characters 10-30
		return \Date::now()->getTime();
	}

	/**
	 * @param float $t
	 * @param float $v
	 * 
	 * @return float
	 */
	public static function r ($t, $v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:131: characters 3-32
		return \floor($t / $v + 0.5) * $v;
	}

	/**
	 * Snaps a time to the next second, minute, hour, day, week, month or year.
	 * @param time The unix time in milliseconds.  See date.getTime()
	 * @param period Either: Second, Minute, Hour, Day, Week, Month or Year
	 * @return The unix time of the snapped date (In milliseconds).
	 * 
	 * @param float $this
	 * @param TimePeriod $period
	 * 
	 * @return float
	 */
	public static function snapNext ($this1, $period) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:49: lines 49-68
		$__hx__switch = ($period->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:51: characters 5-20
			return \ceil($this1 / 1000.0) * 1000.0;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:53: characters 5-21
			return \ceil($this1 / 60000.0) * 60000.0;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:55: characters 5-23
			return \ceil($this1 / 3600000.0) * 3600000.0;
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:57: characters 5-22
			$d = \Date::fromTime($this1);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:58: characters 5-68
			return Dates::create($d->getFullYear(), $d->getMonth(), $d->getDate() + 1, 0, 0, 0)->getTime();
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:60: characters 5-39
			$d = \Date::fromTime($this1);
			$wd = $d->getDay();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:61: characters 5-73
			return Dates::create($d->getFullYear(), $d->getMonth(), $d->getDate() + 7 - $wd, 0, 0, 0)->getTime();
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:63: characters 5-22
			$d = \Date::fromTime($this1);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:64: characters 5-58
			return Dates::create($d->getFullYear(), $d->getMonth() + 1, 1, 0, 0, 0)->getTime();
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:66: characters 5-22
			$d = \Date::fromTime($this1);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:67: characters 5-47
			return Dates::create($d->getFullYear() + 1, 0, 1, 0, 0, 0)->getTime();
		}
	}

	/**
	 * Snaps a time to the previous second, minute, hour, day, week, month or year.
	 * @param time The unix time in milliseconds.  See date.getTime()
	 * @param period Either: Second, Minute, Hour, Day, Week, Month or Year
	 * @return The unix time of the snapped date (In milliseconds).
	 * 
	 * @param float $this
	 * @param TimePeriod $period
	 * 
	 * @return float
	 */
	public static function snapPrev ($this1, $period) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:78: lines 78-97
		$__hx__switch = ($period->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:80: characters 5-20
			return \floor($this1 / 1000.0) * 1000.0;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:82: characters 5-21
			return \floor($this1 / 60000.0) * 60000.0;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:84: characters 5-23
			return \floor($this1 / 3600000.0) * 3600000.0;
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:86: characters 5-22
			$d = \Date::fromTime($this1);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:87: characters 5-64
			return Dates::create($d->getFullYear(), $d->getMonth(), $d->getDate(), 0, 0, 0)->getTime();
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:89: characters 5-39
			$d = \Date::fromTime($this1);
			$wd = $d->getDay();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:90: characters 5-69
			return Dates::create($d->getFullYear(), $d->getMonth(), $d->getDate() - $wd, 0, 0, 0)->getTime();
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:92: characters 5-22
			$d = \Date::fromTime($this1);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:93: characters 5-54
			return Dates::create($d->getFullYear(), $d->getMonth(), 1, 0, 0, 0)->getTime();
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:95: characters 5-22
			$d = \Date::fromTime($this1);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:96: characters 5-43
			return Dates::create($d->getFullYear(), 0, 1, 0, 0, 0)->getTime();
		}
	}

	/**
	 * Snaps a time to the nearest second, minute, hour, day, week, month or year.
	 * @param period Either: Second, Minute, Hour, Day, Week, Month or Year
	 * 
	 * @param float $this
	 * @param TimePeriod $period
	 * 
	 * @return float
	 */
	public static function snapTo ($this1, $period) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:105: lines 105-128
		$__hx__switch = ($period->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:107: characters 5-20
			return \floor($this1 / 1000.0 + 0.5) * 1000.0;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:109: characters 5-21
			return \floor($this1 / 60000.0 + 0.5) * 60000.0;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:111: characters 5-23
			return \floor($this1 / 3600000.0 + 0.5) * 3600000.0;
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:113: characters 5-58
			$d = \Date::fromTime($this1);
			$mod = ($d->getHours() >= 12 ? 1 : 0);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:114: characters 5-70
			return Dates::create($d->getFullYear(), $d->getMonth(), $d->getDate() + $mod, 0, 0, 0)->getTime();
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:116: lines 116-118
			$d = \Date::fromTime($this1);
			$wd = $d->getDay();
			$mod = ($wd < 3 ? -$wd : ($wd > 3 ? 7 - $wd : ($d->getHours() < 12 ? -$wd : 7 - $wd)));
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:119: characters 5-70
			return Dates::create($d->getFullYear(), $d->getMonth(), $d->getDate() + $mod, 0, 0, 0)->getTime();
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:121: lines 121-122
			$d = \Date::fromTime($this1);
			$mod = ($d->getDate() > (int)(\floor(\DateTools::getMonthDays($d) / 2 + 0.5)) ? 1 : 0);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:123: characters 5-60
			return Dates::create($d->getFullYear(), $d->getMonth() + $mod, 1, 0, 0, 0)->getTime();
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:125: lines 125-126
			$d = \Date::fromTime($this1);
			$mod = ($this1 > (new \Date($d->getFullYear(), 6, 2, 0, 0, 0))->getTime() ? 1 : 0);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:127: characters 5-49
			return Dates::create($d->getFullYear() + $mod, 0, 1, 0, 0, 0)->getTime();
		}
	}

	/**
	 * @param float $this
	 * 
	 * @return \Date
	 */
	public static function toDate ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:36: characters 3-29
		return \Date::fromTime($this1);
	}

	/**
	 * @param float $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Timestamp.hx:39: characters 3-29
		return \Date::fromTime($this1)->toString();
	}
}

Boot::registerClass(Timestamp_Impl_::class, 'thx._Timestamp.Timestamp_Impl_');
