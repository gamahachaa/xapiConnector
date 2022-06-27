<?php
/**
 */

namespace signals;

use \php\_Boot\HxAnon;
use \php\Boot;
use \haxe\Exception;
use \haxe\Log;
use \haxe\NativeStackTrace;

class BaseSignal {
	/**
	 * @var bool
	 */
	public $_fireOnAdd;
	/**
	 * @var object[]|\Array_hx
	 */
	public $callbacks;
	/**
	 * @var object
	 */
	public $currentCallback;
	/**
	 * @var int
	 */
	public $defaultCallbackProps;
	/**
	 * @var bool
	 */
	public $hasListeners;
	/**
	 * @var bool
	 */
	public $mute;
	/**
	 * @var int
	 */
	public $numListeners;
	/**
	 * @var bool
	 */
	public $requiresSort;
	/**
	 * @var object[]|\Array_hx
	 */
	public $toTrigger;

	/**
	 * @param bool $fireOnAdd
	 * 
	 * @return void
	 */
	public function __construct ($fireOnAdd = false) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:53: lines 53-332
		if ($fireOnAdd === null) {
			$fireOnAdd = false;
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:80: characters 33-34
		$this->defaultCallbackProps = 0;
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:78: characters 26-31
		$this->requiresSort = false;
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:77: characters 44-46
		$this->toTrigger = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:76: characters 44-46
		$this->callbacks = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:73: characters 25-30
		$this->mute = false;
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:72: characters 31-36
		$this->_fireOnAdd = false;
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:83: characters 3-30
		$this->_fireOnAdd = $fireOnAdd;
	}

	/**
	 * Use the .add method to register callbacks to be fired upon signal.dispatch
	 *
	 * @param callback A callback function which will be called when the signal's ditpatch method is fired.
	 * @param fireOnAdd An optional Bool that if set to true will immediately call the callback. The default value is false.
	 * @param repeat An optional Int that defines the number of times the callback should be triggered before removing itself. Default value = -1 which means it will not remove itself.
	 * @param priority An optional Int that specifies the priority the order in which callbacks are fired, higher values will be triggered first.
	 *
	 * @return BaseSignal<Callback>
	 * 
	 * @param mixed $callback
	 * @param bool $fireOnce
	 * @param int $priority
	 * @param bool $fireOnAdd
	 * 
	 * @return BaseSignal
	 */
	public function add ($callback, $fireOnce = false, $priority = 0, $fireOnAdd = null) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:221: lines 221-264
		if ($fireOnce === null) {
			$fireOnce = false;
		}
		if ($priority === null) {
			$priority = 0;
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:222: lines 222-229
		if (($fireOnce !== false) || ($priority !== 0) || ($fireOnAdd !== null)) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:223: characters 4-230
			$warningMessage = "\x0AWARNING: fireOnce, priority and fireOnAdd params will be removed from 'Signals' in a future release\x0AInstead use daisy chain methods, eg: obj.add(callback).repeat(5).priority(1000).fireOnAdd();";
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:227: characters 4-9
			(Log::$trace)($warningMessage, new _HxAnon_BaseSignal0("signals/Signal.hx", 227, "signals.BaseSignal", "add"));
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:231: characters 3-46
		$numParams = $this->getNumParams($callback);
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:232: characters 3-23
		$repeat = -1;
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:233: lines 233-234
		if ($fireOnce === true) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:234: characters 4-14
			$repeat = 0;
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:235: lines 235-242
		$this->currentCallback = new _HxAnon_BaseSignal1($numParams, $callback, 0, $repeat, $priority, false);
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:244: lines 244-252
		if ($numParams === 0) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:245: characters 4-50
			$this->currentCallback->dispatchMethod = Boot::getInstanceClosure($this, 'dispatchCheck');
		} else if ($numParams === 1) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:247: characters 4-51
			$this->currentCallback->dispatchMethod = Boot::getInstanceClosure($this, 'dispatchCheck1');
		} else if ($numParams === 2) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:249: characters 4-51
			$this->currentCallback->dispatchMethod = Boot::getInstanceClosure($this, 'dispatchCheck2');
		} else if ($numParams === 3) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:251: characters 4-51
			$this->currentCallback->dispatchMethod = Boot::getInstanceClosure($this, 'dispatchCheck3');
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:254: characters 3-34
		$_this = $this->callbacks;
		$_this->arr[$_this->length++] = $this->currentCallback;
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:256: lines 256-257
		if ($priority !== 0) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:257: characters 4-23
			$this->requiresSort = true;
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:259: lines 259-261
		if (($fireOnAdd === true) || ($this->_fireOnAdd === true)) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:260: characters 4-61
			$this->currentCallback->dispatchMethod($callback, $this->currentCallback);
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:263: characters 3-14
		return $this;
	}

	/**
	 * @param \Closure $callback
	 * @param object $callbackData
	 * 
	 * @return void
	 */
	public function dispatchCallback ($callback, $callbackData) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:125: characters 3-8
		throw Exception::thrown("implement in override");
	}

	/**
	 * @param \Closure $callback
	 * @param object $callbackData
	 * 
	 * @return void
	 */
	public function dispatchCallback1 ($callback, $callbackData) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:129: characters 3-8
		throw Exception::thrown("implement in override");
	}

	/**
	 * @param \Closure $callback
	 * @param object $callbackData
	 * 
	 * @return void
	 */
	public function dispatchCallback2 ($callback, $callbackData) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:133: characters 3-8
		throw Exception::thrown("implement in override");
	}

	/**
	 * @param \Closure $callback
	 * @param object $callbackData
	 * 
	 * @return void
	 */
	public function dispatchCallback3 ($callback, $callbackData) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:137: characters 3-8
		throw Exception::thrown("implement in override");
	}

	/**
	 * @return void
	 */
	public function dispatchCallbacks () {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:94: characters 3-17
		$i = 0;
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:95: lines 95-104
		while ($i < $this->callbacks->length) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:96: characters 4-36
			$callbackData = ($this->callbacks->arr[$i] ?? null);
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:97: lines 97-101
			if (($callbackData->repeat < 0) || ($callbackData->callCount <= $callbackData->repeat)) {
				#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:98: characters 5-33
				$_this = $this->toTrigger;
				$_this->arr[$_this->length++] = $callbackData;
			} else {
				#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:100: characters 5-31
				$callbackData->remove = true;
			}
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:102: characters 4-28
			$callbackData->callCount++;
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:103: characters 4-7
			++$i;
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:107: characters 3-36
		$j = $this->callbacks->length - 1;
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:108: lines 108-114
		while ($j >= 0) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:109: characters 4-36
			$callbackData = ($this->callbacks->arr[$j] ?? null);
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:110: lines 110-112
			if ($callbackData->remove === true) {
				#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:111: characters 5-27
				$this->callbacks->splice($j, 1);
			}
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:113: characters 4-7
			--$j;
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:116: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:116: characters 17-33
		$_g1 = $this->toTrigger->length;
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:116: lines 116-120
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:116: characters 13-33
			$l = $_g++;
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:117: lines 117-119
			if (($this->toTrigger->arr[$l] ?? null) !== null) {
				#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:118: characters 5-69
				($this->toTrigger->arr[$l] ?? null)->dispatchMethod(($this->toTrigger->arr[$l] ?? null)->callback, ($this->toTrigger->arr[$l] ?? null));
			}
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:121: characters 3-17
		$this->toTrigger = new \Array_hx();
	}

	/**
	 * @param \Closure $callback
	 * @param object $callbackData
	 * 
	 * @return void
	 */
	public function dispatchCheck ($callback, $callbackData) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:141: lines 141-148
		try {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:142: characters 4-44
			$this->dispatchCallback($callback, $callbackData);
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:143: characters 12-13
			NativeStackTrace::saveStack($_g);
			$e = Exception::caught($_g)->unwrap();
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:144: lines 144-147
			if ($e === "Invalid call") {
				#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:146: characters 5-11
				return;
			}
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:149: characters 3-49
		$callbackData->dispatchMethod = Boot::getInstanceClosure($this, 'dispatchCallback');
	}

	/**
	 * @param \Closure $callback
	 * @param object $callbackData
	 * 
	 * @return void
	 */
	public function dispatchCheck1 ($callback, $callbackData) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:153: lines 153-162
		try {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:154: characters 4-45
			$this->dispatchCallback1($callback, $callbackData);
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:155: characters 12-13
			NativeStackTrace::saveStack($_g);
			$e = Exception::caught($_g)->unwrap();
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:156: lines 156-161
			if ($e === "Invalid call") {
				#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:159: characters 5-53
				$this->dispatchCallback($callback, $callbackData);
				#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:160: characters 5-11
				return;
			}
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:163: characters 3-50
		$callbackData->dispatchMethod = Boot::getInstanceClosure($this, 'dispatchCallback1');
	}

	/**
	 * @param \Closure $callback
	 * @param object $callbackData
	 * 
	 * @return void
	 */
	public function dispatchCheck2 ($callback, $callbackData) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:167: lines 167-176
		try {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:168: characters 4-45
			$this->dispatchCallback2($callback, $callbackData);
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:169: characters 12-13
			NativeStackTrace::saveStack($_g);
			$e = Exception::caught($_g)->unwrap();
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:170: lines 170-175
			if ($e === "Invalid call") {
				#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:173: characters 5-51
				$this->dispatchCheck1($callback, $callbackData);
				#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:174: characters 5-11
				return;
			}
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:177: characters 3-50
		$callbackData->dispatchMethod = Boot::getInstanceClosure($this, 'dispatchCallback2');
	}

	/**
	 * @param \Closure $callback
	 * @param object $callbackData
	 * 
	 * @return void
	 */
	public function dispatchCheck3 ($callback, $callbackData) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:181: lines 181-190
		try {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:182: characters 4-45
			$this->dispatchCallback3($callback, $callbackData);
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:183: characters 12-13
			NativeStackTrace::saveStack($_g);
			$e = Exception::caught($_g)->unwrap();
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:184: lines 184-189
			if ($e === "Invalid call") {
				#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:187: characters 5-51
				$this->dispatchCheck2($callback, $callbackData);
				#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:188: characters 5-11
				return;
			}
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:191: characters 3-50
		$callbackData->dispatchMethod = Boot::getInstanceClosure($this, 'dispatchCallback3');
	}

	/**
	 * Use the .fireOnAdd method that if called will immediately call the most recently added callback.
	 *
	 * @return Void
	 * 
	 * @return void
	 */
	public function fireOnAdd () {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:312: lines 312-313
		if ($this->currentCallback === null) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:313: characters 4-10
			return;
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:314: characters 3-30
		$this->currentCallback->callCount++;
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:315: characters 3-76
		$this->currentCallback->dispatchMethod($this->currentCallback->callback, $this->currentCallback);
	}

	/**
	 * @param mixed $callback
	 * 
	 * @return int
	 */
	public function getNumParams ($callback) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:268: characters 3-66
		$length = \Reflect::getProperty($callback, "length");
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:269: lines 269-271
		if ($length !== null) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:270: characters 4-17
			return $length;
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:273: characters 3-35
		return $this->defaultCallbackProps;
	}

	/**
	 * @return bool
	 */
	public function get_hasListeners () {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:208: characters 3-26
		return $this->get_numListeners() > 0;
	}

	/**
	 * @return int
	 */
	public function get_numListeners () {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:204: characters 3-26
		return $this->callbacks->length;
	}

	/**
	 * Use the .priority method to specifies the priority the order in which callbacks are fired, higher values will be triggered first.
	 *
	 * @param value An optional Int that specifies the priority the order in which callbacks are fired, higher values will be triggered first.
	 *
	 * @return BaseSignal<Callback>
	 * 
	 * @param int $value
	 * 
	 * @return BaseSignal
	 */
	public function priority ($value) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:284: lines 284-285
		if ($this->currentCallback === null) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:285: characters 4-15
			return $this;
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:286: characters 3-35
		$this->currentCallback->priority = $value;
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:288: characters 3-22
		$this->requiresSort = true;
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:289: characters 3-14
		return $this;
	}

	/**
	 * @param mixed $callback
	 * 
	 * @return void
	 */
	public function remove ($callback = false) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:319: lines 319-330
		if ($callback === null) {
			$callback = false;
		}
		if ($callback === true) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:320: characters 4-18
			$this->callbacks = new \Array_hx();
		} else {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:322: characters 4-18
			$j = 0;
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:323: lines 323-329
			while ($j < $this->callbacks->length) {
				#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:324: lines 324-328
				if (Boot::equal(($this->callbacks->arr[$j] ?? null)->callback, $callback)) {
					#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:325: characters 6-28
					$this->callbacks->splice($j, 1);
				} else {
					#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:327: characters 6-9
					++$j;
				}
			}
		}
	}

	/**
	 * Use the .repeat method to define the number of times the callback should be triggered before removing itself. Default value = -1 which means it will not remove itself.
	 *
	 * @param value An Int that specifies the number of repeats before automatically removing itself.
	 *
	 * @return BaseSignal<Callback>
	 * 
	 * @param int $value
	 * 
	 * @return BaseSignal
	 */
	public function repeat ($value = -1) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:299: lines 299-304
		if ($value === null) {
			$value = -1;
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:300: lines 300-301
		if ($this->currentCallback === null) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:301: characters 4-15
			return $this;
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:302: characters 3-33
		$this->currentCallback->repeat = $value;
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:303: characters 3-14
		return $this;
	}

	/**
	 * @param object $s1
	 * @param object $s2
	 * 
	 * @return int
	 */
	public function sortCallbacks ($s1, $s2) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:195: lines 195-200
		if ($s1->priority > $s2->priority) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:196: characters 4-13
			return -1;
		} else if ($s1->priority < $s2->priority) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:198: characters 4-12
			return 1;
		} else {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:200: characters 4-12
			return 0;
		}
	}

	/**
	 * @return void
	 */
	public function sortPriority () {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:87: lines 87-90
		if ($this->requiresSort) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:88: characters 4-33
			\usort($this->callbacks->arr, Boot::getInstanceClosure($this, 'sortCallbacks'));
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:89: characters 4-24
			$this->requiresSort = false;
		}
	}
}

class _HxAnon_BaseSignal0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

class _HxAnon_BaseSignal1 extends HxAnon {
	function __construct($params, $callback, $callCount, $repeat, $priority, $remove) {
		$this->params = $params;
		$this->callback = $callback;
		$this->callCount = $callCount;
		$this->repeat = $repeat;
		$this->priority = $priority;
		$this->remove = $remove;
	}
}

Boot::registerClass(BaseSignal::class, 'signals.BaseSignal');
Boot::registerGetters('signals\\BaseSignal', [
	'hasListeners' => true,
	'numListeners' => true
]);
