<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx
 */

namespace thx;

use \php\Boot;
use \php\_Boot\HxEnum;

class OrderingImpl extends HxEnum {
	/**
	 * @return OrderingImpl
	 */
	static public function EQ () {
		static $inst = null;
		if (!$inst) $inst = new OrderingImpl('EQ', 2, []);
		return $inst;
	}

	/**
	 * @return OrderingImpl
	 */
	static public function GT () {
		static $inst = null;
		if (!$inst) $inst = new OrderingImpl('GT', 1, []);
		return $inst;
	}

	/**
	 * @return OrderingImpl
	 */
	static public function LT () {
		static $inst = null;
		if (!$inst) $inst = new OrderingImpl('LT', 0, []);
		return $inst;
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			2 => 'EQ',
			1 => 'GT',
			0 => 'LT',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'EQ' => 0,
			'GT' => 0,
			'LT' => 0,
		];
	}
}

Boot::registerClass(OrderingImpl::class, 'thx.OrderingImpl');
