<?php
/**
 * Haxe source file: src/App.hx
 */

use \lrs\vendors\LearninLocker;
use \php\Boot;
use \php\Lib;
use \xapi\Statement;
use \php\_Boot\HxString;
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
		#src/App.hx:44: characters 3-60
		$this->resultMessageBack->data["status"] = "failed";
		#src/App.hx:48: characters 3-36
		$location = $_SERVER["SERVER_NAME"];
		#src/App.hx:49: characters 3-52
		$this->_maindebug = HxString::indexOf($location, "test.salt.ch") > -1;
		#src/App.hx:50: lines 50-64
		if (!array_key_exists("lrs", $this->params->data)) {
			#src/App.hx:52: lines 52-59
			$this->lrs = ($this->_maindebug ? new LearninLocker("test", "https://qast.test.salt.ch/data/xAPI/", "a36cc73da2a8a79f20b36e7502c10ed7eebee98b", "c2d3b79c52e94a99c4e239a3de529ffd6a60d2b0") : new LearninLocker("tm", "https://qast.salt.ch/data/xAPI/", "a36cc73da2a8a79f20b36e7502c10ed7eebee98b", "c2d3b79c52e94a99c4e239a3de529ffd6a60d2b0"));
		} else {
			#src/App.hx:63: characters 4-70
			$this->lrs = Boot::typedCast(Boot::getClass(LearninLocker::class), Unserializer::run(($this->params->data["lrs"] ?? null)));
		}
		#src/App.hx:68: characters 3-27
		$this->lrs->get_httpData()->add(Boot::getInstanceClosure($this, 'onData'));
		#src/App.hx:69: characters 3-31
		$this->lrs->get_errorStatus()->add(Boot::getInstanceClosure($this, 'onError'));
		#src/App.hx:70: characters 3-33
		$this->lrs->get_signalStatus()->add(Boot::getInstanceClosure($this, 'onStatus'));
		#src/App.hx:73: lines 73-100
		if (array_key_exists("statement", $this->params->data)) {
			#src/App.hx:75: characters 4-47
			$this->sendStatement(($this->params->data["statement"] ?? null));
		} else if (array_key_exists("statements", $this->params->data)) {
			#src/App.hx:79: characters 4-49
			$this->sendStatements(($this->params->data["statements"] ?? null));
		}
	}

	/**
	 * @param string $data
	 * 
	 * @return void
	 */
	public function onData ($data) {
		#src/App.hx:214: characters 3-64
		$this1 = $this->resultMessageBack;
		$value = (new JsonParser($data))->doParse();
		$this1->data["statementsIds"] = $value;
		#src/App.hx:215: characters 3-47
		echo(\Std::string(JsonPrinter::print($this->resultMessageBack, null, null)));
	}

	/**
	 * @param mixed $msg
	 * 
	 * @return void
	 */
	public function onError ($msg) {
		#src/App.hx:205: characters 3-45
		$this->resultMessageBack->data["msg"] = $msg;
		#src/App.hx:206: characters 3-47
		echo(\Std::string(JsonPrinter::print($this->resultMessageBack, null, null)));
	}

	/**
	 * @param int $status
	 * 
	 * @return void
	 */
	public function onStatus ($status) {
		#src/App.hx:190: lines 190-197
		if ($status === 200) {
			#src/App.hx:192: characters 4-63
			$this->resultMessageBack->data["status"] = "success";
		} else {
			#src/App.hx:196: characters 4-62
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
		#src/App.hx:163: characters 3-17
		$stage = 0;
		#src/App.hx:164: lines 164-182
		try {
			#src/App.hx:166: characters 4-43
			$statement = Unserializer::run($stmt);
			#src/App.hx:167: characters 4-11
			++$stage;
			#src/App.hx:169: characters 4-49
			$this->lrs->postStatement(Boot::typedCast(Boot::getClass(Statement::class), $statement));
			#src/App.hx:171: characters 4-11
			++$stage;
		} catch(\Throwable $_g) {
			#src/App.hx:173: characters 10-11
			$e = HaxeException::caught($_g);
			#src/App.hx:176: characters 4-52
			$this1 = $this->resultMessageBack;
			$value = $e->get_message();
			$this1->data["msg"] = $value;
			#src/App.hx:177: characters 4-52
			$this->resultMessageBack->data["details"] = Boot::getInstanceClosure($e, 'details');
			#src/App.hx:178: characters 4-50
			$this1 = $this->resultMessageBack;
			$value = $e->get_native();
			$this1->data["native"] = $value;
			#src/App.hx:179: characters 4-46
			$this->resultMessageBack->data["stage"] = $stage;
			#src/App.hx:181: characters 4-48
			echo(\Std::string(JsonPrinter::print($this->resultMessageBack, null, null)));
		}
	}

	/**
	 * @param string $stmt
	 * 
	 * @return void
	 */
	public function sendStatements ($stmt) {
		#src/App.hx:131: characters 3-22
		$debugStage = 0;
		#src/App.hx:132: lines 132-155
		try {
			#src/App.hx:134: characters 4-67
			$statements = Boot::typedCast(Boot::getClass(\Array_hx::class), Unserializer::run($stmt));
			#src/App.hx:135: characters 4-36
			$stmts = new \Array_hx();
			#src/App.hx:136: lines 136-139
			$_g = 0;
			while ($_g < $statements->length) {
				#src/App.hx:136: characters 9-10
				$i = ($statements->arr[$_g] ?? null);
				#src/App.hx:136: lines 136-139
				++$_g;
				#src/App.hx:138: characters 5-35
				$stmts->arr[$stmts->length++] = Boot::typedCast(Boot::getClass(Statement::class), $i);
			}
			#src/App.hx:140: characters 4-16
			++$debugStage;
			#src/App.hx:142: characters 4-29
			$this->lrs->postStatements($stmts);
			#src/App.hx:144: characters 4-16
			++$debugStage;
		} catch(\Throwable $_g) {
			#src/App.hx:146: characters 10-11
			$e = HaxeException::caught($_g);
			#src/App.hx:149: characters 4-53
			$this1 = $this->resultMessageBack;
			$value = $e->get_message();
			$this1->data["msg"] = $value;
			#src/App.hx:150: characters 4-53
			$this->resultMessageBack->data["details"] = Boot::getInstanceClosure($e, 'details');
			#src/App.hx:151: characters 4-51
			$this1 = $this->resultMessageBack;
			$value = $e->get_native();
			$this1->data["native"] = $value;
			#src/App.hx:152: characters 4-52
			$this->resultMessageBack->data["stage"] = $debugStage;
			#src/App.hx:154: characters 4-48
			echo(\Std::string(JsonPrinter::print($this->resultMessageBack, null, null)));
		}
	}
}

Boot::registerClass(App::class, 'App');
