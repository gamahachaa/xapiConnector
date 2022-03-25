<?php
/**
 * Haxe source file: ../_myPackages/utils/xapi/Param.hx
 */

namespace xapi;

use \php\Boot;

/**
 * ...
 * @author bb
 */
class Param {
	/**
	 * @var string
	 */
	const LRS = "lrs";
	/**
	 * @var string
	 */
	const STATEMENT = "statement";
	/**
	 * @var string
	 */
	const STATEMENTS = "statements";

}

Boot::registerClass(Param::class, 'xapi.Param');
