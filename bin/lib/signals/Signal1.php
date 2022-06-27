<?php
/**
 */

namespace signals;

use \php\Boot;
use \haxe\Exception;

class Signal1 extends BaseSignal {
	/**
	 * @var mixed
	 */
	public $value;

	/**
	 * @return void
	 */
	public function __construct () {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal1.hx:14: characters 3-10
		parent::__construct();
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal1.hx:15: characters 3-32
		$this->defaultCallbackProps = 1;
	}

	/**
	 * @param mixed $value1
	 * 
	 * @return void
	 */
	public function dispatch ($value1) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal1.hx:19: characters 3-17
		if ($this->requiresSort) {
			\usort($this->callbacks->arr, Boot::getInstanceClosure($this, 'sortCallbacks'));
			$this->requiresSort = false;
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal1.hx:20: characters 3-22
		$this->value = $value1;
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal1.hx:21: characters 3-22
		$i = 0;
		while ($i < $this->callbacks->length) {
			$callbackData = ($this->callbacks->arr[$i] ?? null);
			if (($callbackData->repeat < 0) || ($callbackData->callCount <= $callbackData->repeat)) {
				$_this = $this->toTrigger;
				$_this->arr[$_this->length++] = $callbackData;
			} else {
				$callbackData->remove = true;
			}
			$callbackData->callCount++;
			++$i;
		}
		$j = $this->callbacks->length - 1;
		while ($j >= 0) {
			$callbackData = ($this->callbacks->arr[$j] ?? null);
			if ($callbackData->remove === true) {
				$this->callbacks->splice($j, 1);
			}
			--$j;
		}
		$_g = 0;
		$_g1 = $this->toTrigger->length;
		while ($_g < $_g1) {
			$l = $_g++;
			if (($this->toTrigger->arr[$l] ?? null) !== null) {
				($this->toTrigger->arr[$l] ?? null)->dispatchMethod(($this->toTrigger->arr[$l] ?? null)->callback, ($this->toTrigger->arr[$l] ?? null));
			}
		}
		$this->toTrigger = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal1.hx:22: characters 3-15
		$this->value = null;
	}

	/**
	 * @param \Closure $callback
	 * @param object $callbackData
	 * 
	 * @return void
	 */
	public function dispatchCallback ($callback, $callbackData) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal1.hx:26: characters 3-13
		$callback();
	}

	/**
	 * @param \Closure $callback
	 * @param object $callbackData
	 * 
	 * @return void
	 */
	public function dispatchCallback1 ($callback, $callbackData) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal1.hx:30: characters 3-18
		$callback($this->value);
	}

	/**
	 * @param \Closure $callback
	 * @param object $callbackData
	 * 
	 * @return void
	 */
	public function dispatchCallback2 ($callback, $callbackData) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal1.hx:34: characters 3-8
		throw Exception::thrown("Use Signal 2");
	}

	/**
	 * @param \Closure $callback
	 * @param object $callbackData
	 * 
	 * @return void
	 */
	public function dispatchCallback3 ($callback, $callbackData) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal1.hx:38: characters 3-8
		throw Exception::thrown("Use Signal 3");
	}
}

Boot::registerClass(Signal1::class, 'signals.Signal1');
