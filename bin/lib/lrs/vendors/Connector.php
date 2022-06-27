<?php
/**
 */

namespace lrs\vendors;

use \php\_Boot\HxDynamicStr;
use \php\_Boot\HxAnon;
use \haxe\io\_BytesData\Container;
use \signals\Signal1;
use \xapi\Agent;
use \php\Boot;
use \haxe\Exception;
use \haxe\Log;
use \xapi\Verb;
use \xapi\Statement;
use \xapi\Activity;
use \sys\Http;
use \php\_Boot\HxClosure;
use \haxe\format\JsonParser;
use \haxe\format\JsonPrinter;
use \haxe\io\Bytes;
use \haxe\NativeStackTrace;

/**
 * @author bb
 */
class Connector {
	/**
	 * @var string
	 */
	const VERSION = "1.0.3";

	/**
	 * @var string
	 */
	public $auth;
	/**
	 * @var Signal1
	 */
	public $debugData;
	/**
	 * @var string
	 */
	public $endpoint;
	/**
	 * @var Signal1
	 */
	public $errorStatus;
	/**
	 * @var Http
	 */
	public $http;
	/**
	 * @var Signal1
	 */
	public $httpData;
	/**
	 * @var Signal1
	 */
	public $onAgentActivtySignal;
	/**
	 * @var Signal1
	 */
	public $onLrsTestSignal;
	/**
	 * @var Signal1
	 */
	public $onStatementSignal;
	/**
	 * @var \Closure
	 */
	public $onStatus;
	/**
	 * @var string
	 */
	public $pwd;
	/**
	 * @var Signal1
	 */
	public $signalStatus;
	/**
	 * @var string
	 */
	public $user;

	/**
	 * @param string $lrsEndpoint
	 * @param string $lrsUser
	 * @param string $lrsUserPwd
	 * @param string $auth
	 * 
	 * @return void
	 */
	public function __construct ($lrsEndpoint, $lrsUser = "", $lrsUserPwd = "", $auth = "") {
		if (!$this->__hx__default__onStatus) {
			$this->__hx__default__onStatus = new HxClosure($this, 'onStatus');
			if ($this->onStatus === null) $this->onStatus = $this->__hx__default__onStatus;
		}
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:34: lines 34-71
		if ($lrsUser === null) {
			$lrsUser = "";
		}
		if ($lrsUserPwd === null) {
			$lrsUserPwd = "";
		}
		if ($auth === null) {
			$auth = "";
		}
		try {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:36: characters 4-46
			$this->onStatementSignal = new Signal1();
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:37: characters 4-49
			$this->onAgentActivtySignal = new Signal1();
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:38: characters 4-36
			$this->httpData = new Signal1();
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:39: characters 4-37
			$this->debugData = new Signal1();
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:40: characters 4-41
			$this->onLrsTestSignal = new Signal1();
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:41: characters 4-37
			$this->signalStatus = new Signal1();
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:42: characters 4-40
			$this->errorStatus = new Signal1();
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:43: characters 4-26
			$this->endpoint = $lrsEndpoint;
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:46: lines 46-66
			if ((($lrsUser === "") || ($lrsUserPwd === "") || ($lrsUser === null) || ($lrsUserPwd === null)) && ($auth === "")) {
				#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:47: characters 5-10
				throw Exception::thrown("Connector.Connector :: NO auth --> cannot connect to LRS)");
			} else {
				#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:50: characters 5-19
				$this->user = $lrsUser;
				#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:51: characters 5-21
				$this->pwd = $lrsUserPwd;
				#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:53: characters 5-30
				$this->http = new Http($this->get_endpoint());
				#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:55: characters 17-57
				$tmp = null;
				if ($auth === "") {
					#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:55: characters 31-50
					$s = ($this->get_user()??'null') . ":" . ($this->get_pwd()??'null');
					$bytes = \strlen($s);
					$result = \base64_encode((new Bytes($bytes, new Container($s)))->toString());
					#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:55: characters 17-57
					$tmp = "Basic " . ($result??'null');
				} else {
					$tmp = $auth;
				}
				#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:55: characters 5-57
				$this->auth = $tmp;
				#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:57: characters 5-52
				$this->http->addHeader("Authorization", $this->get_auth());
				#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:58: characters 5-61
				$this->http->addHeader("X-Experience-API-Version", "1.0.3");
				#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:59: characters 5-55
				$this->http->addHeader("Content-Type", "application/json");
				#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:60: characters 5-55
				$this->http->addHeader("Access-Control-Allow-Origin", "*");
				#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:61: characters 5-27
				$this->http->onError = Boot::getInstanceClosure($this, 'onError');
				#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:62: characters 5-29
				$this->http->onStatus = $this->onStatus;
			}
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:68: characters 10-11
			NativeStackTrace::saveStack($_g);
			$e = Exception::caught($_g)->unwrap();
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:70: characters 4-9
			(Log::$trace)($e, new _HxAnon_Connector0("lrs/vendors/Connector.hx", 70, "lrs.vendors.Connector", "new"));
		}
	}

	/**
	 * @param Agent $actor
	 * @param Activity $activity
	 * @param int $limit
	 * @param int $offset
	 * 
	 * @return void
	 */
	public function getAgentActivity ($actor, $activity, $limit = 0, $offset = 0) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:120: characters 3-96
		if ($limit === null) {
			$limit = 0;
		}
		if ($offset === null) {
			$offset = 0;
		}
		$this->getStatements(($this->prepareAgent($actor)??'null') . ($this->prepareActivity($activity)??'null'), Boot::getInstanceClosure($this, 'onAgentActivty'), $limit, $offset);
	}

	/**
	 * @param Agent $actor
	 * @param Activity $activity
	 * @param Verb $verb
	 * @param int $limit
	 * @param int $offset
	 * 
	 * @return void
	 */
	public function getAgentActivityVerb ($actor, $activity, $verb, $limit = 0, $offset = 0) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:124: characters 3-117
		if ($limit === null) {
			$limit = 0;
		}
		if ($offset === null) {
			$offset = 0;
		}
		$this->getStatements(($this->prepareAgent($actor)??'null') . ($this->prepareActivity($activity)??'null') . ($this->prepareVerb($verb)??'null'), Boot::getInstanceClosure($this, 'onAgentActivty'), $limit, $offset);
	}

	/**
	 * @param Agent $actor
	 * @param int $limit
	 * @param int $offset
	 * 
	 * @return void
	 */
	public function getAgentAllStatements ($actor, $limit = 0, $offset = 0) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:129: characters 3-61
		if ($limit === null) {
			$limit = 0;
		}
		if ($offset === null) {
			$offset = 0;
		}
		$this->getStatements($this->prepareAgent($actor), Boot::getInstanceClosure($this, 'onData'), $limit, $offset);
	}

	/**
	 * @param \Closure $callBack
	 * 
	 * @return void
	 */
	public function getAllStatements ($callBack = null) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:99: characters 3-57
		$this->getStatements("", ($callBack === null ? Boot::getInstanceClosure($this, 'onData') : $callBack));
	}

	/**
	 * @param string $id
	 * 
	 * @return void
	 */
	public function getStatementById ($id) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:133: characters 3-58
		$this->getStatements($this->prepareStatementID($id), Boot::getInstanceClosure($this, 'onStatementID'), 0);
	}

	/**
	 * @param string $params
	 * @param \Closure $callBack
	 * @param int $limit
	 * @param int $offset
	 * 
	 * @return void
	 */
	public function getStatements ($params, $callBack = null, $limit = 0, $offset = 0) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:136: lines 136-141
		if ($limit === null) {
			$limit = 0;
		}
		if ($offset === null) {
			$offset = 0;
		}
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:137: characters 14-36
		$limit1 = $limit;
		$offset1 = $offset;
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:137: characters 29-35
		if ($offset1 === null) {
			$offset1 = 0;
		}
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:137: characters 22-27
		if ($limit1 === null) {
			$limit1 = 0;
		}
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:137: characters 14-36
		$u = ($this->get_endpoint()??'null') . "/statements?";
		if ($limit1 > 0) {
			$u = ($u??'null') . "limit=" . ($limit1??'null');
		}
		if (($limit1 > 0) && ($offset1 > 0)) {
			$u = ($u??'null') . "&";
		}
		if ($offset1 > 0) {
			$u = ($u??'null') . "offset=" . ($offset1??'null');
		}
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:137: characters 3-45
		$this->http->url = ($u??'null') . ($params??'null');
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:139: characters 3-25
		$this->http->onData = $callBack;
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:140: characters 3-22
		$this->http->request(false);
	}

	/**
	 * @return string
	 */
	public function get_auth () {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:242: characters 3-14
		return $this->auth;
	}

	/**
	 * @return Signal1
	 */
	public function get_debugData () {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:314: characters 3-19
		return $this->debugData;
	}

	/**
	 * @return string
	 */
	public function get_endpoint () {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:232: characters 3-18
		return $this->endpoint;
	}

	/**
	 * @return Signal1
	 */
	public function get_errorStatus () {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:309: characters 3-21
		return $this->errorStatus;
	}

	/**
	 * @return Signal1
	 */
	public function get_httpData () {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:246: characters 3-18
		return $this->httpData;
	}

	/**
	 * @return Signal1
	 */
	public function get_onAgentActivtySignal () {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:285: characters 3-30
		return $this->onAgentActivtySignal;
	}

	/**
	 * @return Signal1
	 */
	public function get_onLrsTestSignal () {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:290: characters 3-25
		return $this->onLrsTestSignal;
	}

	/**
	 * @return Signal1
	 */
	public function get_onStatementSignal () {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:295: characters 3-27
		return $this->onStatementSignal;
	}

	/**
	 * @return string
	 */
	public function get_pwd () {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:304: characters 3-13
		return $this->pwd;
	}

	/**
	 * @return Signal1
	 */
	public function get_signalStatus () {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:319: characters 3-22
		return $this->signalStatus;
	}

	/**
	 * @return string
	 */
	public function get_user () {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:300: characters 3-14
		return $this->user;
	}

	/**
	 * @param int $limit
	 * @param int $offset
	 * 
	 * @return string
	 */
	public function initUrl ($limit = 0, $offset = 0) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:78: lines 78-89
		if ($limit === null) {
			$limit = 0;
		}
		if ($offset === null) {
			$offset = 0;
		}
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:79: characters 3-37
		$u = ($this->get_endpoint()??'null') . "/statements?";
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:81: lines 81-82
		if ($limit > 0) {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:82: characters 4-23
			$u = ($u??'null') . "limit=" . ($limit??'null');
		}
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:83: lines 83-84
		if (($limit > 0) && ($offset > 0)) {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:84: characters 4-12
			$u = ($u??'null') . "&";
		}
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:85: lines 85-86
		if ($offset > 0) {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:86: characters 4-25
			$u = ($u??'null') . "offset=" . ($offset??'null');
		}
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:87: characters 3-11
		return $u;
	}

	/**
	 * @param string $data
	 * 
	 * @return void
	 */
	public function onAgentActivty ($data) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:213: lines 213-222
		try {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:214: characters 4-35
			$decoded = (new JsonParser($data))->doParse();
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:215: characters 4-42
			$this->get_onAgentActivtySignal()->dispatch($decoded);
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:217: characters 10-11
			NativeStackTrace::saveStack($_g);
		}
	}

	/**
	 * @param string $data
	 * 
	 * @return void
	 */
	public function onData ($data) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:251: characters 3-26
		$this->get_httpData()->dispatch($data);
	}

	/**
	 * @param mixed $msg
	 * 
	 * @return void
	 */
	public function onError ($msg) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:259: lines 259-265
		try {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:260: characters 4-29
			$this->get_errorStatus()->dispatch($msg);
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:262: characters 10-11
			NativeStackTrace::saveStack($_g);
			$e = Exception::caught($_g)->unwrap();
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:264: characters 4-9
			(Log::$trace)($e, new _HxAnon_Connector0("lrs/vendors/Connector.hx", 264, "lrs.vendors.Connector", "onError"));
		}
	}

	/**
	 * @param string $data
	 * 
	 * @return void
	 */
	public function onLRSTest ($data) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:199: characters 3-34
		$decoded = (new JsonParser($data))->doParse();
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:200: characters 3-34
		$stmts = $decoded->statements;
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:201: characters 3-26
		$cnxOK = false;
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:202: lines 202-205
		if (($stmts instanceof \Array_hx)) {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:204: characters 4-28
			$cnxOK = HxDynamicStr::wrap($stmts)->length > 0;
		}
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:206: characters 3-34
		$this->get_onLrsTestSignal()->dispatch($cnxOK);
	}

	/**
	 * @param string $data
	 * 
	 * @return void
	 */
	public function onStatementID ($data) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:227: characters 3-48
		$this->get_onStatementSignal()->dispatch((new JsonParser($data))->doParse());
	}

	/**
	 * @param int $status
	 * 
	 * @return void
	 */
	public function onStatus ($status)
	{
		if ($this->onStatus !== $this->__hx__default__onStatus) return call_user_func_array($this->onStatus, func_get_args());
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:274: characters 3-32
		$this->get_signalStatus()->dispatch($status);
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:278: characters 8-21
		$tmp = $status === 400;
	}
	protected $__hx__default__onStatus;

	/**
	 * @param Statement $stmt
	 * @param \Closure $callback
	 * 
	 * @return void
	 */
	public function postStatement ($stmt, $callback = null) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:191: characters 3-37
		$this->postStatements(\Array_hx::wrap([$stmt]), $callback);
	}

	/**
	 * @param Statement[]|\Array_hx $stmts
	 * @param \Closure $callback
	 * 
	 * @return void
	 */
	public function postStatements ($stmts, $callback = null) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:170: characters 11-20
		$u = ($this->get_endpoint()??'null') . "/statements?";
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:170: characters 3-21
		$u1 = $u;
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:171: characters 3-41
		$data = $this->prepareStatement($stmts);
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:172: characters 3-27
		$this->get_debugData()->dispatch($data);
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:179: characters 3-15
		$this->http->url = $u1;
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:180: characters 3-27
		$this->http->setPostData($data);
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:181: characters 3-52
		$this->http->onData = ($callback === null ? Boot::getInstanceClosure($this, 'onData') : $callback);
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:183: characters 4-22
		$this->http->request(true);
	}

	/**
	 * @param Activity $activity
	 * 
	 * @return string
	 */
	public function prepareActivity ($activity) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:108: characters 3-36
		return "&activity=" . ($activity->get_id()??'null');
	}

	/**
	 * @param Agent $actor
	 * 
	 * @return string
	 */
	public function prepareAgent ($actor) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:104: characters 3-43
		return "&agent=" . (JsonPrinter::print($actor, null, null)??'null');
	}

	/**
	 * @param Statement[]|\Array_hx $stmts
	 * 
	 * @return string
	 */
	public function prepareStatement ($stmts) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:145: characters 3-20
		$s = "";
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:146: lines 146-162
		try {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:148: characters 8-29
			$s = JsonPrinter::print($stmts, null, null);
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:151: characters 4-51
			$ereg = new \EReg(",\\s*\"[^\"]+\":null|\"[^\"]+\":null,?", "g");
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:152: characters 4-52
			$ereg2 = new \EReg(",\\s*\"[^\"]+\":\\[\\]|\"[^\"]+\":\\[\\],?", "g");
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:153: characters 4-52
			$ereg3 = new \EReg(",\\s*\"[^\"]+\":\\{\\}|\"[^\"]+\":\\{\\},?", "g");
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:155: characters 4-27
			$s = $ereg->replace($s, "");
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:156: characters 4-28
			$s = $ereg2->replace($s, "");
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:157: characters 4-28
			$s = $ereg3->replace($s, "");
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:159: characters 10-11
			NativeStackTrace::saveStack($_g);
			$e = Exception::caught($_g)->unwrap();
			#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:161: characters 4-9
			(Log::$trace)($e, new _HxAnon_Connector0("lrs/vendors/Connector.hx", 161, "lrs.vendors.Connector", "prepareStatement"));
		}
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:166: characters 3-11
		return $s;
	}

	/**
	 * @param string $id
	 * 
	 * @return string
	 */
	public function prepareStatementID ($id) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:116: characters 3-28
		return "&statementId=" . ($id??'null');
	}

	/**
	 * @param Verb $verb
	 * 
	 * @return string
	 */
	public function prepareVerb ($verb) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:112: characters 3-28
		return "&verb=" . ($verb->get_id()??'null');
	}

	/**
	 * @param string $u
	 * @param string $p
	 * 
	 * @return string
	 */
	public function setAuth ($u, $p) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:75: characters 35-62
		$s = ($u??'null') . ":" . ($p??'null');
		$bytes = \strlen($s);
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:75: characters 21-63
		$result = \base64_encode((new Bytes($bytes, new Container($s)))->toString());
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:75: characters 3-63
		return "Basic " . ($result??'null');
	}

	/**
	 * @param string $value
	 * 
	 * @return string
	 */
	public function set_endpoint ($value) {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:237: characters 3-26
		return $this->endpoint = $value;
	}

	/**
	 * @return void
	 */
	public function testConnection () {
		#C:\HaxeToolkit\haxe\lib\lrs/git/lrs/vendors/Connector.hx:95: characters 3-31
		$this->getStatements("", Boot::getInstanceClosure($this, 'onData'), 1);
	}
}

class _HxAnon_Connector0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(Connector::class, 'lrs.vendors.Connector');
Boot::registerGetters('lrs\\vendors\\Connector', [
	'debugData' => true,
	'httpData' => true,
	'onLrsTestSignal' => true,
	'onAgentActivtySignal' => true,
	'onStatementSignal' => true,
	'auth' => true,
	'endpoint' => true,
	'errorStatus' => true,
	'signalStatus' => true,
	'pwd' => true,
	'user' => true
]);
