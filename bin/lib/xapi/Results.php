<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\utils/utils/xapi/Results.hx
 */

namespace xapi;

use \php\Boot;

/**
 * ...
 * @author bb
 */
class Results {
	/**
	 * @var string
	 */
	const BAD_UUID = "Missing UUID or bad format";
	/**
	 * @var string
	 */
	const DETAILS = "details";
	/**
	 * @var string
	 */
	const FAILED_404_VALUE = "failed404";
	/**
	 * @var string
	 ********************************************
	 * /****************  VALUES ********************
	 ********************************************
	 */
	const FAILED_VALUE = "failed";
	/**
	 * @var string
	 */
	const MESSAGE = "msg";
	/**
	 * @var string
	 */
	const NATIVE = "native";
	/**
	 * @var string
	 */
	const NO_PARAM_VALUE = "No significant param recieved";
	/**
	 * @var string
	 */
	const STAGE = "stage";
	/**
	 * @var string
	 */
	const STATEMENT = "statement";
	/**
	 * @var string
	 */
	const STATEMENT_IDS = "statementsIds";
	/**
	 * @var string
	 */
	const STATUS = "status";
	/**
	 * @var string
	 */
	const SUCCESS_VALUE = "success";

}

Boot::registerClass(Results::class, 'xapi.Results');
