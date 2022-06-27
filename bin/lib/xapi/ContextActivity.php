<?php
/**
 */

namespace xapi;

use \php\Boot;
use \php\_Boot\HxEnum;

/**
 * ...
 * @author bb
 */
class ContextActivity extends HxEnum {
	/**
	 * @return ContextActivity
	 */
	static public function category () {
		static $inst = null;
		if (!$inst) $inst = new ContextActivity('category', 2, []);
		return $inst;
	}

	/**
	 * @return ContextActivity
	 */
	static public function grouping () {
		static $inst = null;
		if (!$inst) $inst = new ContextActivity('grouping', 1, []);
		return $inst;
	}

	/**
	 * @return ContextActivity
	 */
	static public function other () {
		static $inst = null;
		if (!$inst) $inst = new ContextActivity('other', 3, []);
		return $inst;
	}

	/**
	 * @return ContextActivity
	 */
	static public function parent () {
		static $inst = null;
		if (!$inst) $inst = new ContextActivity('parent', 0, []);
		return $inst;
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			2 => 'category',
			1 => 'grouping',
			3 => 'other',
			0 => 'parent',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'category' => 0,
			'grouping' => 0,
			'other' => 0,
			'parent' => 0,
		];
	}
}

Boot::registerClass(ContextActivity::class, 'xapi.ContextActivity');
