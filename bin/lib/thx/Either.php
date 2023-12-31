<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Either.hx
 */

namespace thx;

use \php\Boot;
use \php\_Boot\HxEnum;

/**
 * `Either` wraps one value of two possible types.
 */
class Either extends HxEnum {
	/**
	 * Left contructors wrapping a value of type L
	 * 
	 * @param mixed $value
	 * 
	 * @return Either
	 */
	static public function Left ($value) {
		return new Either('Left', 0, [$value]);
	}

	/**
	 * Right contructors wrapping a value of type R
	 * 
	 * @param mixed $value
	 * 
	 * @return Either
	 */
	static public function Right ($value) {
		return new Either('Right', 1, [$value]);
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			0 => 'Left',
			1 => 'Right',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'Left' => 1,
			'Right' => 1,
		];
	}
}

Boot::registerClass(Either::class, 'thx.Either');
