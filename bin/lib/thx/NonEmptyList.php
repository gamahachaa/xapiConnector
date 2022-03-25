<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Nel.hx
 */

namespace thx;

use \php\Boot;
use \php\_Boot\HxEnum;

class NonEmptyList extends HxEnum {
	/**
	 * @param mixed $x
	 * @param NonEmptyList $xs
	 * 
	 * @return NonEmptyList
	 */
	static public function ConsNel ($x, $xs) {
		return new NonEmptyList('ConsNel', 1, [$x, $xs]);
	}

	/**
	 * @param mixed $x
	 * 
	 * @return NonEmptyList
	 */
	static public function Single ($x) {
		return new NonEmptyList('Single', 0, [$x]);
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			1 => 'ConsNel',
			0 => 'Single',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'ConsNel' => 2,
			'Single' => 1,
		];
	}
}

Boot::registerClass(NonEmptyList::class, 'thx.NonEmptyList');
