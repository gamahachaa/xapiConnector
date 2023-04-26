<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/IObject.hx
 */

namespace xapi\types;

use \php\Boot;
use \php\_Boot\HxEnum;

/**
 * ...
 * @author bb
 */
class ObjectTypes extends HxEnum {
	/**
	 * @return ObjectTypes
	 */
	static public function Activity () {
		static $inst = null;
		if (!$inst) $inst = new ObjectTypes('Activity', 0, []);
		return $inst;
	}

	/**
	 * @return ObjectTypes
	 */
	static public function Agent () {
		static $inst = null;
		if (!$inst) $inst = new ObjectTypes('Agent', 1, []);
		return $inst;
	}

	/**
	 * @return ObjectTypes
	 */
	static public function Group () {
		static $inst = null;
		if (!$inst) $inst = new ObjectTypes('Group', 2, []);
		return $inst;
	}

	/**
	 * @return ObjectTypes
	 */
	static public function StatementRef () {
		static $inst = null;
		if (!$inst) $inst = new ObjectTypes('StatementRef', 4, []);
		return $inst;
	}

	/**
	 * @return ObjectTypes
	 */
	static public function SubStatement () {
		static $inst = null;
		if (!$inst) $inst = new ObjectTypes('SubStatement', 3, []);
		return $inst;
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			0 => 'Activity',
			1 => 'Agent',
			2 => 'Group',
			4 => 'StatementRef',
			3 => 'SubStatement',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'Activity' => 0,
			'Agent' => 0,
			'Group' => 0,
			'StatementRef' => 0,
			'SubStatement' => 0,
		];
	}
}

Boot::registerClass(ObjectTypes::class, 'xapi.types.ObjectTypes');
