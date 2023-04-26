<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx
 */

namespace lrs\vendors;

use \php\Boot;
use \haxe\Exception;
use \haxe\ds\StringMap;
use \haxe\io\Path;

class LearninLocker extends Connector {
	/**
	 * @var string
	 */
	const AGGREGATION_API_ASYNC = "api/statements/aggregateAsync";
	/**
	 * @var string
	 */
	const AGGREGATION_API_SYNC = "api/statements/aggregate";
	/**
	 * @var string
	 */
	const LL_API = "api/v2";
	/**
	 * @var string
	 * @todo add name identifier and collect statics
	 * @param	lrsEndpoint
	 * @param	lrsUser
	 * @param	lrsUserPwd
	 * @param	auth
	 */
	const XAPI = "data/xAPI";

	/**
	 * @var StringMap
	 */
	static public $CLIENTS;

	/**
	 * @var string
	 */
	public $_root;

	/**
	 * @param string $client
	 * 
	 * @return LearninLocker
	 */
	public static function FIND_LRS ($client) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:48: lines 48-50
		if (\array_key_exists($client, LearninLocker::$CLIENTS->data)) {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:48: characters 38-57
			return (LearninLocker::$CLIENTS->data[$client] ?? null);
		} else if (\array_key_exists("default", LearninLocker::$CLIENTS->data)) {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:49: characters 46-68
			return (LearninLocker::$CLIENTS->data["default"] ?? null);
		} else {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:50: characters 8-13
			throw Exception::thrown("LearninLocker Error : client " . ($client??'null') . " not found and no default set");
		}
	}

	/**
	 * @param string $name
	 * @param string $lrsEndpoint
	 * @param string $lrsUser
	 * @param string $lrsUserPwd
	 * @param string $auth
	 * @param Api $api
	 * 
	 * @return void
	 */
	public function __construct ($name, $lrsEndpoint, $lrsUser = "", $lrsUserPwd = "", $auth = "", $api = null) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:34: lines 34-45
		if ($lrsUser === null) {
			$lrsUser = "";
		}
		if ($lrsUserPwd === null) {
			$lrsUserPwd = "";
		}
		if ($auth === null) {
			$auth = "";
		}
		if ($api === null) {
			$api = Api::xapi();
		}
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:35: characters 31-72
		$tmp = Path::removeTrailingSlashes($lrsEndpoint);
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:35: characters 74-92
		$tmp1 = null;
		$__hx__switch = ($api->index);
		if ($__hx__switch === 0) {
			$tmp1 = "data/xAPI";
		} else if ($__hx__switch === 1) {
			$tmp1 = "api/v2";
		} else if ($__hx__switch === 2) {
			$tmp1 = "api/statements/aggregate";
		} else if ($__hx__switch === 3) {
			$tmp1 = "api/statements/aggregateAsync";
		}
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:35: characters 3-97
		$this->_root = \StringTools::replace($tmp, $tmp1, "");
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:36: characters 3-63
		parent::__construct($this->getEndPointForApi($api), $lrsUser, $lrsUserPwd, $auth);
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:37: lines 37-44
		if (\array_key_exists($name, LearninLocker::$CLIENTS->data)) {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:39: characters 4-9
			throw Exception::thrown("Error client " . ($name??'null') . " already exisits");
		} else {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:43: characters 4-27
			LearninLocker::$CLIENTS->data[$name] = $this;
		}
	}

	/**
	 * @param Api $api
	 * 
	 * @return string
	 */
	public function apiToString ($api) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:54: lines 54-60
		$__hx__switch = ($api->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:56: characters 16-20
			return "data/xAPI";
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:57: characters 14-20
			return "api/v2";
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:58: characters 28-48
			return "api/statements/aggregate";
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:59: characters 29-50
			return "api/statements/aggregateAsync";
		}
	}

	/**
	 * @param Api $api
	 * 
	 * @return string
	 */
	public function getEndPointForApi ($api) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:64: characters 10-21
		$tmp = ($this->_root??'null') . "/";
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:64: characters 24-40
		$tmp1 = null;
		$__hx__switch = ($api->index);
		if ($__hx__switch === 0) {
			$tmp1 = "data/xAPI";
		} else if ($__hx__switch === 1) {
			$tmp1 = "api/v2";
		} else if ($__hx__switch === 2) {
			$tmp1 = "api/statements/aggregate";
		} else if ($__hx__switch === 3) {
			$tmp1 = "api/statements/aggregateAsync";
		}
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/LearninLocker.hx:64: characters 3-40
		return ($tmp??'null') . ($tmp1??'null');
	}

	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


		self::$CLIENTS = new StringMap();
	}
}

Boot::registerClass(LearninLocker::class, 'lrs.vendors.LearninLocker');
LearninLocker::__hx__init();
