<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\utils/utils/xapi/Params.hx
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
	const SUBJECT = "subjet";
	/**
	 * @var string
	 */
	const VOID = "void";
	/**
	 * @var string
	 */
	const XAPI_COMMON_LIBS = "https://qook.test.salt.ch/commonlibs/xapi-new/";

}

Boot::registerClass(Params::class, 'xapi.Params');
