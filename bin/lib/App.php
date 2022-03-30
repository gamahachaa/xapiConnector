<?php
/**
 * Haxe source file: src/App.hx
 */

use \lrs\vendors\LearninLocker;
use \php\_Boot\HxAnon;
use \php\Boot;
use \haxe\Log;
use \php\Lib;
use \xapi\Statement;
use \haxe\Exception as HaxeException;
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
	 * @return void
	 */
	public function __construct () {
		#src/App.hx:40: characters 3-30
		Serializer::$USE_CACHE = true;
		#src/App.hx:42: characters 3-60
		$this->params = Lib::hashOfAssociativeArray($_REQUEST);
		#src/App.hx:43: characters 3-25
		$this->resultMessageBack = new StringMap();
		#src/App.hx:44: characters 3-62
		$this->resultMessageBack->data["status"] = "failed";
		#src/App.hx:48: characters 3-36
		$location = $_SERVER["SERVER_NAME"];
		#src/App.hx:50: characters 3-38
		$this->_maindebug = array_key_exists("debug", $this->params->data);
		#src/App.hx:51: characters 3-33
		if ($this->_maindebug) {
			#src/App.hx:51: characters 19-24
			(Log::$trace)("debug", new _HxAnon_App0("src/App.hx", 51, "App", "new"));
		}
		#src/App.hx:52: lines 52-66
		if (!array_key_exists("lrs", $this->params->data)) {
			#src/App.hx:54: lines 54-61
			$this->lrs = ($this->_maindebug ? new LearninLocker("test", "https://qast.test.salt.ch/data/xAPI/", "a36cc73da2a8a79f20b36e7502c10ed7eebee98b", "c2d3b79c52e94a99c4e239a3de529ffd6a60d2b0") : new LearninLocker("tm", "https://qast.salt.ch/data/xAPI/", "a36cc73da2a8a79f20b36e7502c10ed7eebee98b", "c2d3b79c52e94a99c4e239a3de529ffd6a60d2b0"));
		} else {
			#src/App.hx:65: characters 4-71
			$this->lrs = Boot::typedCast(Boot::getClass(LearninLocker::class), Unserializer::run(($this->params->data["lrs"] ?? null)));
		}
		#src/App.hx:70: characters 3-27
		$this->lrs->get_httpData()->add(Boot::getInstanceClosure($this, 'onData'));
		#src/App.hx:71: characters 3-31
		$this->lrs->get_errorStatus()->add(Boot::getInstanceClosure($this, 'onError'));
		#src/App.hx:72: characters 3-33
		$this->lrs->get_signalStatus()->add(Boot::getInstanceClosure($this, 'onStatus'));
		#src/App.hx:75: lines 75-102
		if (array_key_exists("statement", $this->params->data)) {
			#src/App.hx:77: characters 4-48
			$this->sendStatement(($this->params->data["statement"] ?? null));
		} else if (array_key_exists("statements", $this->params->data)) {
			#src/App.hx:81: characters 4-50
			$this->sendStatements(($this->params->data["statements"] ?? null));
		}
	}

	/**
	 * @param string $data
	 * 
	 * @return void
	 */
	public function onData ($data) {
		#src/App.hx:221: characters 3-65
		$this1 = $this->resultMessageBack;
		$value = (new JsonParser($data))->doParse();
		$this1->data["statementsIds"] = $value;
		#src/App.hx:222: characters 3-47
		echo(\Std::string(JsonPrinter::print($this->resultMessageBack, null, null)));
	}

	/**
	 * @param mixed $msg
	 * 
	 * @return void
	 */
	public function onError ($msg) {
		#src/App.hx:212: characters 3-46
		$this->resultMessageBack->data["msg"] = $msg;
		#src/App.hx:213: characters 3-47
		echo(\Std::string(JsonPrinter::print($this->resultMessageBack, null, null)));
	}

	/**
	 * @param int $status
	 * 
	 * @return void
	 */
	public function onStatus ($status) {
		#src/App.hx:197: lines 197-204
		if ($status === 200) {
			#src/App.hx:199: characters 4-65
			$this->resultMessageBack->data["status"] = "success";
		} else {
			#src/App.hx:203: characters 4-64
			$this->resultMessageBack->data["status"] = "failed";
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
		#src/App.hx:170: characters 3-17
		$stage = 0;
		#src/App.hx:171: lines 171-189
		try {
			#src/App.hx:173: characters 4-43
			$statement = Unserializer::run($stmt);
			#src/App.hx:174: characters 4-11
			++$stage;
			#src/App.hx:176: characters 4-49
			$this->lrs->postStatement(Boot::typedCast(Boot::getClass(Statement::class), $statement));
			#src/App.hx:178: characters 4-11
			++$stage;
		} catch(\Throwable $_g) {
			#src/App.hx:180: characters 10-11
			$e = HaxeException::caught($_g);
			#src/App.hx:183: characters 4-53
			$this1 = $this->resultMessageBack;
			$value = $e->get_message();
			$this1->data["msg"] = $value;
			#src/App.hx:184: characters 4-53
			$this->resultMessageBack->data["details"] = Boot::getInstanceClosure($e, 'details');
			#src/App.hx:185: characters 4-51
			$this1 = $this->resultMessageBack;
			$value = $e->get_native();
			$this1->data["native"] = $value;
			#src/App.hx:186: characters 4-47
			$this->resultMessageBack->data["stage"] = $stage;
			#src/App.hx:188: characters 4-48
			echo(\Std::string(JsonPrinter::print($this->resultMessageBack, null, null)));
		}
	}

	/**
	 * @param string $stmt
	 * 
	 * @return void
	 */
	public function sendStatements ($stmt) {
		#src/App.hx:135: characters 3-22
		$debugStage = 0;
		#src/App.hx:136: lines 136-161
		try {
			#src/App.hx:138: characters 4-79
			$statements = Boot::typedCast(Boot::getClass(\Array_hx::class), Unserializer::run(urldecode($stmt)));
			#src/App.hx:140: characters 4-36
			$stmts = new \Array_hx();
			#src/App.hx:141: lines 141-144
			$_g = 0;
			while ($_g < $statements->length) {
				#src/App.hx:141: characters 9-10
				$i = ($statements->arr[$_g] ?? null);
				#src/App.hx:141: lines 141-144
				++$_g;
				#src/App.hx:143: characters 5-35
				$stmts->arr[$stmts->length++] = Boot::typedCast(Boot::getClass(Statement::class), $i);
			}
			#src/App.hx:145: characters 4-16
			++$debugStage;
			#src/App.hx:147: characters 4-29
			$this->lrs->postStatements($stmts);
			#src/App.hx:150: characters 4-16
			++$debugStage;
		} catch(\Throwable $_g) {
			#src/App.hx:152: characters 10-11
			$e = HaxeException::caught($_g);
			#src/App.hx:155: characters 4-54
			$this1 = $this->resultMessageBack;
			$value = $e->get_message();
			$this1->data["msg"] = $value;
			#src/App.hx:156: characters 4-54
			$this->resultMessageBack->data["details"] = Boot::getInstanceClosure($e, 'details');
			#src/App.hx:157: characters 4-52
			$this1 = $this->resultMessageBack;
			$value = $e->get_native();
			$this1->data["native"] = $value;
			#src/App.hx:158: characters 4-53
			$this->resultMessageBack->data["stage"] = $debugStage;
			#src/App.hx:160: characters 4-48
			echo(\Std::string(JsonPrinter::print($this->resultMessageBack, null, null)));
		}
	}
}

class _HxAnon_App0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(App::class, 'App');
