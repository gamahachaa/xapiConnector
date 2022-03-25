<?php
/**
 * Haxe source file: ../_myPackages/utils/xapi/Result.hx
 */

namespace xapi;

use \php\Boot;

/**
 * ...
 * @author bb
 */
class Result {
	/**
	 * @var string
	 */
	const DETAILS = "details";
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
	const STAGE = "stage";
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

Boot::registerClass(Result::class, 'xapi.Result');
