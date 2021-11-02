<?php
/**
 * Generated by Haxe 4.1.5
 * Haxe source file: C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx
 */

namespace lrs\vendors;

use \php\_Boot\HxDynamicStr;
use \php\_Boot\HxAnon;
use \haxe\io\_BytesData\Container;
use \msignal\Signal1;
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
	public $auth;
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
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:31: lines 31-67
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
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:33: characters 4-46
			$this->onStatementSignal = new Signal1();
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:34: characters 4-49
			$this->onAgentActivtySignal = new Signal1();
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:35: characters 4-36
			$this->httpData = new Signal1();
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:36: characters 4-41
			$this->onLrsTestSignal = new Signal1();
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:37: characters 4-37
			$this->signalStatus = new Signal1();
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:38: characters 4-40
			$this->errorStatus = new Signal1();
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:39: characters 4-26
			$this->endpoint = $lrsEndpoint;
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:42: lines 42-62
			if ((($lrsUser === "") || ($lrsUserPwd === "") || ($lrsUser === null) || ($lrsUserPwd === null)) && ($auth === "")) {
				#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:43: characters 5-10
				throw Exception::thrown("Connector.Connector :: NO auth --> cannot connect to LRS)");
			} else {
				#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:46: characters 5-19
				$this->user = $lrsUser;
				#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:47: characters 5-21
				$this->pwd = $lrsUserPwd;
				#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:49: characters 5-30
				$this->http = new Http($this->get_endpoint());
				#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:51: characters 17-57
				$tmp = null;
				if ($auth === "") {
					#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:51: characters 31-50
					$s = ($this->get_user()??'null') . ":" . ($this->get_pwd()??'null');
					$bytes = \strlen($s);
					$result = \base64_encode((new Bytes($bytes, new Container($s)))->toString());
					#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:51: characters 17-57
					$tmp = "Basic " . ($result??'null');
				} else {
					$tmp = $auth;
				}
				#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:51: characters 5-57
				$this->auth = $tmp;
				#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:53: characters 5-52
				$this->http->addHeader("Authorization", $this->get_auth());
				#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:54: characters 5-61
				$this->http->addHeader("X-Experience-API-Version", "1.0.1");
				#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:55: characters 5-55
				$this->http->addHeader("Content-Type", "application/json");
				#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:56: characters 5-55
				$this->http->addHeader("Access-Control-Allow-Origin", "*");
				#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:57: characters 5-27
				$this->http->onError = Boot::getInstanceClosure($this, 'onError');
				#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:58: characters 5-29
				$this->http->onStatus = $this->onStatus;
			}
		} catch(\Throwable $_g) {
			NativeStackTrace::saveStack($_g);
			$e = Exception::caught($_g)->unwrap();
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:66: characters 4-9
			(Log::$trace)($e, new HxAnon([
				"fileName" => "lrs/vendors/Connector.hx",
				"lineNumber" => 66,
				"className" => "lrs.vendors.Connector",
				"methodName" => "new",
			]));
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
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:116: characters 3-96
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
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:120: characters 3-117
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
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:125: characters 3-61
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
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:95: characters 3-57
		$this->getStatements("", ($callBack === null ? Boot::getInstanceClosure($this, 'onData') : $callBack));
	}

	/**
	 * @param string $id
	 * 
	 * @return void
	 */
	public function getStatementById ($id) {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:129: characters 3-58
		$this->getStatements($this->prepareStatementID($id), Boot::getInstanceClosure($this, 'onStatementID'), 1);
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
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:132: lines 132-136
		if ($limit === null) {
			$limit = 0;
		}
		if ($offset === null) {
			$offset = 0;
		}
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:133: characters 14-36
		$limit1 = $limit;
		$offset1 = $offset;
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:133: characters 29-35
		if ($offset1 === null) {
			$offset1 = 0;
		}
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:133: characters 22-27
		if ($limit1 === null) {
			$limit1 = 0;
		}
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:133: characters 14-36
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
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:133: characters 3-45
		$this->http->url = ($u??'null') . ($params??'null');
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:134: characters 3-25
		$this->http->onData = $callBack;
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:135: characters 3-22
		$this->http->request(false);
	}

	/**
	 * @return string
	 */
	public function get_auth () {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:230: characters 3-14
		return $this->auth;
	}

	/**
	 * @return string
	 */
	public function get_endpoint () {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:220: characters 3-18
		return $this->endpoint;
	}

	/**
	 * @return Signal1
	 */
	public function get_errorStatus () {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:293: characters 3-21
		return $this->errorStatus;
	}

	/**
	 * @return Signal1
	 */
	public function get_httpData () {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:234: characters 3-18
		return $this->httpData;
	}

	/**
	 * @return Signal1
	 */
	public function get_onAgentActivtySignal () {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:273: characters 3-30
		return $this->onAgentActivtySignal;
	}

	/**
	 * @return Signal1
	 */
	public function get_onLrsTestSignal () {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:278: characters 3-25
		return $this->onLrsTestSignal;
	}

	/**
	 * @return Signal1
	 */
	public function get_onStatementSignal () {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:283: characters 3-27
		return $this->onStatementSignal;
	}

	/**
	 * @return string
	 */
	public function get_pwd () {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:298: characters 3-13
		return $this->pwd;
	}

	/**
	 * @return Signal1
	 */
	public function get_signalStatus () {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:303: characters 3-22
		return $this->signalStatus;
	}

	/**
	 * @return string
	 */
	public function get_user () {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:288: characters 3-14
		return $this->user;
	}

	/**
	 * @param int $limit
	 * @param int $offset
	 * 
	 * @return string
	 */
	public function initUrl ($limit = 0, $offset = 0) {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:74: lines 74-85
		if ($limit === null) {
			$limit = 0;
		}
		if ($offset === null) {
			$offset = 0;
		}
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:75: characters 3-37
		$u = ($this->get_endpoint()??'null') . "/statements?";
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:77: lines 77-78
		if ($limit > 0) {
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:78: characters 4-23
			$u = ($u??'null') . "limit=" . ($limit??'null');
		}
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:79: lines 79-80
		if (($limit > 0) && ($offset > 0)) {
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:80: characters 4-12
			$u = ($u??'null') . "&";
		}
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:81: lines 81-82
		if ($offset > 0) {
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:82: characters 4-25
			$u = ($u??'null') . "offset=" . ($offset??'null');
		}
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:83: characters 3-11
		return $u;
	}

	/**
	 * @param string $data
	 * 
	 * @return void
	 */
	public function onAgentActivty ($data) {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:201: lines 201-210
		try {
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:202: characters 4-35
			$decoded = (new JsonParser($data))->doParse();
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:203: characters 4-42
			$this->get_onAgentActivtySignal()->dispatch($decoded);
		} catch(\Throwable $_g) {
			NativeStackTrace::saveStack($_g);
		}
	}

	/**
	 * @param string $data
	 * 
	 * @return void
	 */
	public function onData ($data) {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:239: characters 3-26
		$this->get_httpData()->dispatch($data);
	}

	/**
	 * @param mixed $msg
	 * 
	 * @return void
	 */
	public function onError ($msg) {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:247: lines 247-253
		try {
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:248: characters 4-29
			$this->get_errorStatus()->dispatch($msg);
		} catch(\Throwable $_g) {
			NativeStackTrace::saveStack($_g);
			$e = Exception::caught($_g)->unwrap();
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:252: characters 4-9
			(Log::$trace)($e, new HxAnon([
				"fileName" => "lrs/vendors/Connector.hx",
				"lineNumber" => 252,
				"className" => "lrs.vendors.Connector",
				"methodName" => "onError",
			]));
		}
	}

	/**
	 * @param string $data
	 * 
	 * @return void
	 */
	public function onLRSTest ($data) {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:185: characters 4-9
		(Log::$trace)("onLRSTest", new HxAnon([
			"fileName" => "lrs/vendors/Connector.hx",
			"lineNumber" => 185,
			"className" => "lrs.vendors.Connector",
			"methodName" => "onLRSTest",
		]));
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:187: characters 3-34
		$decoded = (new JsonParser($data))->doParse();
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:188: characters 3-34
		$stmts = $decoded->statements;
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:189: characters 3-26
		$cnxOK = false;
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:190: lines 190-193
		if (($stmts instanceof \Array_hx)) {
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:192: characters 4-28
			$cnxOK = HxDynamicStr::wrap($stmts)->length > 0;
		}
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:194: characters 3-34
		$this->get_onLrsTestSignal()->dispatch($cnxOK);
	}

	/**
	 * @param string $data
	 * 
	 * @return void
	 */
	public function onStatementID ($data) {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:215: characters 3-48
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
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:262: characters 3-32
		$this->get_signalStatus()->dispatch($status);
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:266: characters 8-21
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
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:179: characters 3-37
		$this->postStatements(\Array_hx::wrap([$stmt]), $callback);
	}

	/**
	 * @param \Array_hx $stmts
	 * @param \Closure $callback
	 * 
	 * @return void
	 */
	public function postStatements ($stmts, $callback = null) {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:165: characters 11-20
		$u = ($this->get_endpoint()??'null') . "/statements?";
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:165: characters 3-21
		$u1 = $u;
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:166: characters 3-41
		$data = $this->prepareStatement($stmts);
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:167: characters 3-15
		$this->http->url = $u1;
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:168: characters 3-27
		$this->http->setPostData($data);
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:169: characters 3-52
		$this->http->onData = ($callback === null ? Boot::getInstanceClosure($this, 'onData') : $callback);
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:171: characters 4-22
		$this->http->request(true);
	}

	/**
	 * @param Activity $activity
	 * 
	 * @return string
	 */
	public function prepareActivity ($activity) {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:104: characters 3-36
		return "&activity=" . ($activity->get_id()??'null');
	}

	/**
	 * @param Agent $actor
	 * 
	 * @return string
	 */
	public function prepareAgent ($actor) {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:100: characters 3-43
		return "&agent=" . (JsonPrinter::print($actor, null, null)??'null');
	}

	/**
	 * @param \Array_hx $stmts
	 * 
	 * @return string
	 */
	public function prepareStatement ($stmts) {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:140: characters 3-20
		$s = "";
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:141: lines 141-157
		try {
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:143: characters 8-29
			$s = JsonPrinter::print($stmts, null, null);
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:146: characters 4-51
			$ereg = new \EReg(",\\s*\"[^\"]+\":null|\"[^\"]+\":null,?", "g");
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:147: characters 4-52
			$ereg2 = new \EReg(",\\s*\"[^\"]+\":\\[\\]|\"[^\"]+\":\\[\\],?", "g");
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:148: characters 4-52
			$ereg3 = new \EReg(",\\s*\"[^\"]+\":\\{\\}|\"[^\"]+\":\\{\\},?", "g");
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:150: characters 4-27
			$s = $ereg->replace($s, "");
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:151: characters 4-28
			$s = $ereg2->replace($s, "");
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:152: characters 4-28
			$s = $ereg3->replace($s, "");
		} catch(\Throwable $_g) {
			NativeStackTrace::saveStack($_g);
			$e = Exception::caught($_g)->unwrap();
			#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:156: characters 4-9
			(Log::$trace)($e, new HxAnon([
				"fileName" => "lrs/vendors/Connector.hx",
				"lineNumber" => 156,
				"className" => "lrs.vendors.Connector",
				"methodName" => "prepareStatement",
			]));
		}
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:161: characters 3-11
		return $s;
	}

	/**
	 * @param string $id
	 * 
	 * @return string
	 */
	public function prepareStatementID ($id) {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:112: characters 3-28
		return "&statementId=" . ($id??'null');
	}

	/**
	 * @param Verb $verb
	 * 
	 * @return string
	 */
	public function prepareVerb ($verb) {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:108: characters 3-28
		return "&verb=" . ($verb->get_id()??'null');
	}

	/**
	 * @param string $u
	 * @param string $p
	 * 
	 * @return string
	 */
	public function setAuth ($u, $p) {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:71: characters 35-62
		$s = ($u??'null') . ":" . ($p??'null');
		$bytes = \strlen($s);
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:71: characters 21-63
		$result = \base64_encode((new Bytes($bytes, new Container($s)))->toString());
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:71: characters 3-63
		return "Basic " . ($result??'null');
	}

	/**
	 * @param string $value
	 * 
	 * @return string
	 */
	public function set_endpoint ($value) {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:225: characters 3-26
		return $this->endpoint = $value;
	}

	/**
	 * @return void
	 */
	public function testConnection () {
		#C:\_mesDocs\_git\_haxelibs\lrs\lrs/vendors/Connector.hx:91: characters 3-31
		$this->getStatements("", Boot::getInstanceClosure($this, 'onData'), 1);
	}
}

Boot::registerClass(Connector::class, 'lrs.vendors.Connector');
Boot::registerGetters('lrs\\vendors\\Connector', [
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
