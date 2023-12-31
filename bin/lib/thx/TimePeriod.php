<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/TimePeriod.hx
 */

namespace thx;

use \php\Boot;
use \php\_Boot\HxEnum;

class TimePeriod extends HxEnum {
	/**
	 * @return TimePeriod
	 */
	static public function Day () {
		static $inst = null;
		if (!$inst) $inst = new TimePeriod('Day', 3, []);
		return $inst;
	}

	/**
	 * @return TimePeriod
	 */
	static public function Hour () {
		static $inst = null;
		if (!$inst) $inst = new TimePeriod('Hour', 2, []);
		return $inst;
	}

	/**
	 * @return TimePeriod
	 */
	static public function Minute () {
		static $inst = null;
		if (!$inst) $inst = new TimePeriod('Minute', 1, []);
		return $inst;
	}

	/**
	 * @return TimePeriod
	 */
	static public function Month () {
		static $inst = null;
		if (!$inst) $inst = new TimePeriod('Month', 5, []);
		return $inst;
	}

	/**
	 * @return TimePeriod
	 */
	static public function Second () {
		static $inst = null;
		if (!$inst) $inst = new TimePeriod('Second', 0, []);
		return $inst;
	}

	/**
	 * @return TimePeriod
	 */
	static public function Week () {
		static $inst = null;
		if (!$inst) $inst = new TimePeriod('Week', 4, []);
		return $inst;
	}

	/**
	 * @return TimePeriod
	 */
	static public function Year () {
		static $inst = null;
		if (!$inst) $inst = new TimePeriod('Year', 6, []);
		return $inst;
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			3 => 'Day',
			2 => 'Hour',
			1 => 'Minute',
			5 => 'Month',
			0 => 'Second',
			4 => 'Week',
			6 => 'Year',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'Day' => 0,
			'Hour' => 0,
			'Minute' => 0,
			'Month' => 0,
			'Second' => 0,
			'Week' => 0,
			'Year' => 0,
		];
	}
}

Boot::registerClass(TimePeriod::class, 'thx.TimePeriod');
