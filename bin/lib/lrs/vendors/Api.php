<?php
/**
 */

namespace lrs\vendors;

use \php\Boot;
use \php\_Boot\HxEnum;

/**
 * ...
 * @author
 */
class Api extends HxEnum {
	/**
	 * @return Api
	 */
	static public function aggregation_async () {
		static $inst = null;
		if (!$inst) $inst = new Api('aggregation_async', 3, []);
		return $inst;
	}

	/**
	 * @return Api
	 */
	static public function aggregation_sync () {
		static $inst = null;
		if (!$inst) $inst = new Api('aggregation_sync', 2, []);
		return $inst;
	}

	/**
	 * @return Api
	 */
	static public function ll () {
		static $inst = null;
		if (!$inst) $inst = new Api('ll', 1, []);
		return $inst;
	}

	/**
	 * @return Api
	 */
	static public function xapi () {
		static $inst = null;
		if (!$inst) $inst = new Api('xapi', 0, []);
		return $inst;
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			3 => 'aggregation_async',
			2 => 'aggregation_sync',
			1 => 'll',
			0 => 'xapi',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'aggregation_async' => 0,
			'aggregation_sync' => 0,
			'll' => 0,
			'xapi' => 0,
		];
	}
}

Boot::registerClass(Api::class, 'lrs.vendors.Api');
