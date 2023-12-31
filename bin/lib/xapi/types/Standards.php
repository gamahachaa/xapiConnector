<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Standards.hx
 */

namespace xapi\types;

use \php\Boot;

/**
 * ...
 * @author
 */
class Standards {
	/**
	 * @var \EReg
	 */
	static public $AUTH;
	/**
	 * @var \EReg
	 */
	static public $EMAIL;
	/**
	 * @var \EReg
	 */
	static public $ISO8601_DURATION;
	/**
	 * @var \EReg
	 */
	static public $ISO_8601;
	/**
	 * @var \EReg
	 */
	static public $ISO_8601_FULL;
	/**
	 * @var \EReg
	 */
	static public $UUID;


	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


		self::$EMAIL = new \EReg("^mailto:[^@]{1,64}@[^@]{1,255}\$", "i");
		self::$AUTH = new \EReg("^[0-9]{4}-[0-9]{2}-[0-9]{2}_[0-9]{4}-[0-9]{2}-[0-9]{2}_", "i");
		self::$UUID = new \EReg("[a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12}", "");
		self::$ISO8601_DURATION = new \EReg("^P(?!\$)(\\d+(?:\\.\\d+)?Y)?(\\d+(?:\\.\\d+)?M)?(\\d+(?:\\.\\d+)?W)?(\\d+(?:\\.\\d+)?D)?(T(?=\\d)(\\d+(?:\\.\\d+)?H)?(\\d+(?:\\.\\d+)?M)?(\\d+(?:\\.\\d+)?S)?)?\$", "");
		self::$ISO_8601 = new \EReg("^\\d{4}(-\\d\\d(-\\d\\d(T\\d\\d:\\d\\d(:\\d\\d)?(\\.\\d+)?(([+-]\\d\\d:\\d\\d)|Z)?)?)?)?\$", "i");
		self::$ISO_8601_FULL = new \EReg("^\\d{4}-\\d\\d-\\d\\dT\\d\\d:\\d\\d:\\d\\d(\\.\\d+)?(([+-]\\d\\d:\\d\\d)|Z)?\$", "i");
	}
}

Boot::registerClass(Standards::class, 'xapi.types.Standards');
Standards::__hx__init();
