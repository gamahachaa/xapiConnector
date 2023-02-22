<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nil.hx
 */

namespace thx;

use \php\Boot;
use \php\_Boot\HxEnum;

/**
 * A runtime value that describes the absence of a value.
 */
class Nil extends HxEnum {
	/**
	 * `nil` is the only value available for `Nil` and it is a constant value.
	 * 
	 * @return Nil
	 */
	static public function nil () {
		static $inst = null;
		if (!$inst) $inst = new Nil('nil', 0, []);
		return $inst;
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			0 => 'nil',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'nil' => 0,
		];
	}
}

Boot::registerClass(Nil::class, 'thx.Nil');
