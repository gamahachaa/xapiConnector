<?php
/**
 * Haxe source file: ../_myPackages/utils/xapi/Params.hx
 */

namespace xapi;

use \php\Boot;

/**
 * ...
 * @author bb
 */
class Params {
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

Boot::registerClass(Params::class, 'xapi.Params');
