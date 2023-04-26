<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx
 */

namespace thx\fp;

use \php\Boot;
use \php\_Boot\HxEnum;

class MapImpl extends HxEnum {
	/**
	 * @param int $size
	 * @param mixed $key
	 * @param mixed $value
	 * @param MapImpl $lhs
	 * @param MapImpl $rhs
	 * 
	 * @return MapImpl
	 */
	static public function Bin ($size, $key, $value, $lhs, $rhs) {
		return new MapImpl('Bin', 1, [$size, $key, $value, $lhs, $rhs]);
	}

	/**
	 * @return MapImpl
	 */
	static public function Tip () {
		static $inst = null;
		if (!$inst) $inst = new MapImpl('Tip', 0, []);
		return $inst;
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			1 => 'Bin',
			0 => 'Tip',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'Bin' => 5,
			'Tip' => 0,
		];
	}
}

Boot::registerClass(MapImpl::class, 'thx.fp.MapImpl');
