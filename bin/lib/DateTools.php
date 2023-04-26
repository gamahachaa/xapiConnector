<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\std/DateTools.hx
 */

use \php\Boot;

/**
 * The DateTools class contains some extra functionalities for handling `Date`
 * instances and timestamps.
 * In the context of Haxe dates, a timestamp is defined as the number of
 * milliseconds elapsed since 1st January 1970.
 */
class DateTools {
	/**
	 * @var int[]|\Array_hx
	 */
	static public $DAYS_OF_MONTH;

	/**
	 * Returns the number of days in the month of Date `d`.
	 * This method handles leap years.
	 * 
	 * @param \Date $d
	 * 
	 * @return int
	 */
	public static function getMonthDays ($d) {
		#C:\HaxeToolkit\haxe\std/DateTools.hx:172: characters 3-28
		$month = $d->getMonth();
		#C:\HaxeToolkit\haxe\std/DateTools.hx:173: characters 3-30
		$year = $d->getFullYear();
		#C:\HaxeToolkit\haxe\std/DateTools.hx:175: lines 175-176
		if ($month !== 1) {
			#C:\HaxeToolkit\haxe\std/DateTools.hx:176: characters 4-31
			return (DateTools::$DAYS_OF_MONTH->arr[$month] ?? null);
		}
		#C:\HaxeToolkit\haxe\std/DateTools.hx:178: characters 3-73
		$isB = ((($year % 4) === 0) && (($year % 100) !== 0)) || (($year % 400) === 0);
		#C:\HaxeToolkit\haxe\std/DateTools.hx:179: characters 10-29
		if ($isB) {
			#C:\HaxeToolkit\haxe\std/DateTools.hx:179: characters 19-21
			return 29;
		} else {
			#C:\HaxeToolkit\haxe\std/DateTools.hx:179: characters 27-29
			return 28;
		}
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


		self::$DAYS_OF_MONTH = \Array_hx::wrap([
			31,
			28,
			31,
			30,
			31,
			30,
			31,
			31,
			30,
			31,
			30,
			31,
		]);
	}
}

Boot::registerClass(DateTools::class, 'DateTools');
DateTools::__hx__init();
