<?php
/**
 */

use \lrs\vendors\LearninLocker;
use \php\Boot;
use \php\Lib;
use \xapi\Statement;
use \php\_Boot\HxString;
use \haxe\Exception as HaxeException;
use \regex\ExpReg;
use \haxe\ds\StringMap;
use \haxe\Unserializer;
use \haxe\format\JsonParser;
use \haxe\format\JsonPrinter;
use \haxe\Serializer;

/**
 * ...
 * @author bb
 */
class App {
	/**
	 * @var bool
	 */
	public $_maindebug;
	/**
	 * @var LearninLocker
	 */
	public $lrs;
	/**
	 * @var StringMap
	 */
	public $params;
	/**
	 * @var StringMap
	 */
	public $resultMessageBack;
	/**
	 * @var string
	 */
	public $sentdata;

	/**
	 * @return void
	 */
	public function __construct () {
		#src/App.hx:38: characters 3-30
		Serializer::$USE_CACHE = true;
		#src/App.hx:40: characters 3-60
		$this->params = Lib::hashOfAssociativeArray($_REQUEST);
		#src/App.hx:41: characters 3-25
		$this->resultMessageBack = new StringMap();
		#src/App.hx:42: characters 3-62
		$this->resultMessageBack->data["status"] = "failed";
		#src/App.hx:46: characters 3-36
		$location = $_SERVER["SERVER_NAME"];
		#src/App.hx:47: characters 3-78
		$this->_maindebug = (HxString::indexOf($location, "test.salt.ch") > -1) || array_key_exists("debug", $this->params->data);
		#src/App.hx:50: lines 50-64
		if (!array_key_exists("lrs", $this->params->data)) {
			#src/App.hx:52: lines 52-59
			$this->lrs = ($this->_maindebug ? new LearninLocker("TM_TEST", "https://qast.test.salt.ch/data/xAPI/", "", "", "Basic NDdlYTQ5M2MyYjk5YTU0NjhmODEzYzliYWY1ODI1NWNmMmNiMThkZDo2MjMyNDFiZDg5MjNhYzAxYzFhMzI4NDcyYzU1YTA0YTBiZmU2ODI1") : new LearninLocker("tm", "https://qast.salt.ch/data/xAPI/", "a36cc73da2a8a79f20b36e7502c10ed7eebee98b", "c2d3b79c52e94a99c4e239a3de529ffd6a60d2b0"));
		} else {
			#src/App.hx:63: characters 4-71
			$this->lrs = Boot::typedCast(Boot::getClass(LearninLocker::class), Unserializer::run(($this->params->data["lrs"] ?? null)));
		}
		#src/App.hx:68: characters 3-27
		$this->lrs->get_httpData()->add(Boot::getInstanceClosure($this, 'onData'));
		#src/App.hx:69: characters 3-31
		$this->lrs->get_errorStatus()->add(Boot::getInstanceClosure($this, 'onError'));
		#src/App.hx:70: characters 3-33
		$this->lrs->get_signalStatus()->add(Boot::getInstanceClosure($this, 'onStatus'));
		#src/App.hx:71: characters 3-44
		$this->lrs->get_onStatementSignal()->add(Boot::getInstanceClosure($this, 'onGetStatement'));
		#src/App.hx:72: lines 72-73
		if ($this->_maindebug) {
			#src/App.hx:73: characters 4-30
			$this->lrs->get_debugData()->add(Boot::getInstanceClosure($this, 'onDebug'));
		}
		#src/App.hx:76: lines 76-101
		if (array_key_exists("statement", $this->params->data)) {
			#src/App.hx:78: characters 4-48
			$this->sendStatement(($this->params->data["statement"] ?? null));
		} else if (array_key_exists("statements", $this->params->data)) {
			#src/App.hx:82: characters 4-50
			$this->sendStatements(($this->params->data["statements"] ?? null));
		} else if (array_key_exists("get", $this->params->data)) {
			#src/App.hx:85: characters 4-44
			$get = trim(($this->params->data["get"] ?? null));
			#src/App.hx:86: lines 86-93
			if ((trim(($this->params->data["get"] ?? null)) === "") || !ExpReg::STRING_TO_REG("[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}", "gi")->match($get)) {
				#src/App.hx:88: characters 5-61
				$this->resultMessageBack->data["msg"] = "Missing UUID or bad format";
				#src/App.hx:89: characters 5-49
				echo(\Std::string(JsonPrinter::print($this->resultMessageBack, null, null)));
			} else {
				#src/App.hx:92: characters 5-30
				$this->lrs->getStatementById($get);
			}
		} else {
			#src/App.hx:98: characters 4-66
			$this->resultMessageBack->data["msg"] = "No significant param recieved";
			#src/App.hx:99: characters 4-48
			echo(\Std::string(JsonPrinter::print($this->resultMessageBack, null, null)));
		}
	}

	/**
	 * @param string $data
	 * 
	 * @return void
	 */
	public function onData ($data) {
		#src/App.hx:208: characters 3-65
		$this1 = $this->resultMessageBack;
		$value = (new JsonParser($data))->doParse();
		$this1->data["statementsIds"] = $value;
		#src/App.hx:209: characters 3-47
		echo(\Std::string(JsonPrinter::print($this->resultMessageBack, null, null)));
	}

	/**
	 * @param string $s
	 * 
	 * @return void
	 */
	public function onDebug ($s) {
		#src/App.hx:114: characters 3-39
		$this->resultMessageBack->data["sentData"] = $s;
	}

	/**
	 * @param mixed $msg
	 * 
	 * @return void
	 */
	public function onError ($msg) {
		#src/App.hx:199: characters 3-46
		$this->resultMessageBack->data["msg"] = $msg;
		#src/App.hx:200: characters 3-47
		echo(\Std::string(JsonPrinter::print($this->resultMessageBack, null, null)));
	}

	/**
	 * @param mixed $d
	 * 
	 * @return void
	 */
	public function onGetStatement ($d) {
		#src/App.hx:107: characters 3-46
		$this->resultMessageBack->data["statement"] = $d;
		#src/App.hx:108: characters 3-63
		$this->resultMessageBack->data["status"] = "success";
		#src/App.hx:109: characters 3-47
		echo(\Std::string(JsonPrinter::print($this->resultMessageBack, null, null)));
	}

	/**
	 * @param int $status
	 * 
	 * @return void
	 */
	public function onStatus ($status) {
		#src/App.hx:184: lines 184-191
		if ($status === 200) {
			#src/App.hx:186: characters 4-65
			$this->resultMessageBack->data["status"] = "success";
		} else {
			#src/App.hx:190: characters 4-73
			$this->resultMessageBack->data["status"] = "failed" . ($status??'null');
		}
	}

	/**
	 * @todo use send statements
	 * @param	stmt
	 * 
	 * @param string $stmt
	 * 
	 * @return void
	 */
	public function sendStatement ($stmt) {
		#src/App.hx:156: characters 3-17
		$stage = 0;
		#src/App.hx:157: lines 157-176
		try {
			#src/App.hx:159: characters 4-55
			$statement = Unserializer::run(urldecode($stmt));
			#src/App.hx:160: characters 4-11
			++$stage;
			#src/App.hx:162: characters 4-49
			$this->lrs->postStatement(Boot::typedCast(Boot::getClass(Statement::class), $statement));
			#src/App.hx:163: characters 4-47
			$this->resultMessageBack->data["sentData"] = $this->sentdata;
			#src/App.hx:165: characters 4-11
			++$stage;
		} catch(\Throwable $_g) {
			#src/App.hx:167: characters 10-11
			$e = HaxeException::caught($_g);
			#src/App.hx:170: characters 4-53
			$this1 = $this->resultMessageBack;
			$value = $e->get_message();
			$this1->data["msg"] = $value;
			#src/App.hx:171: characters 4-53
			$this->resultMessageBack->data["details"] = Boot::getInstanceClosure($e, 'details');
			#src/App.hx:172: characters 4-51
			$this1 = $this->resultMessageBack;
			$value = $e->get_native();
			$this1->data["native"] = $value;
			#src/App.hx:173: characters 4-47
			$this->resultMessageBack->data["stage"] = $stage;
			#src/App.hx:175: characters 4-48
			echo(\Std::string(JsonPrinter::print($this->resultMessageBack, null, null)));
		}
	}

	/**
	 * @param string $stmt
	 * 
	 * @return void
	 */
	public function sendStatements ($stmt) {
		#src/App.hx:121: characters 3-22
		$debugStage = 0;
		#src/App.hx:122: lines 122-147
		try {
			#src/App.hx:131: characters 4-16
			++$debugStage;
			#src/App.hx:133: characters 4-58
			$this->lrs->postStatements(Unserializer::run(urldecode($stmt)));
			#src/App.hx:134: characters 14-57
			$this->resultMessageBack->data["sentData"] = $this->sentdata;
			#src/App.hx:136: characters 4-16
			++$debugStage;
		} catch(\Throwable $_g) {
			#src/App.hx:138: characters 10-11
			$e = HaxeException::caught($_g);
			#src/App.hx:141: characters 4-54
			$this1 = $this->resultMessageBack;
			$value = $e->get_message();
			$this1->data["msg"] = $value;
			#src/App.hx:142: characters 4-54
			$this->resultMessageBack->data["details"] = Boot::getInstanceClosure($e, 'details');
			#src/App.hx:143: characters 4-52
			$this1 = $this->resultMessageBack;
			$value = $e->get_native();
			$this1->data["native"] = $value;
			#src/App.hx:144: characters 4-53
			$this->resultMessageBack->data["stage"] = $debugStage;
			#src/App.hx:146: characters 4-48
			echo(\Std::string(JsonPrinter::print($this->resultMessageBack, null, null)));
		}
	}
}

Boot::registerClass(App::class, 'App');
