<?php
/**
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
	const GET = "get";
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
	/**
	 * @var string
	 */
	const VOID = "void";

}

Boot::registerClass(Params::class, 'xapi.Params');
