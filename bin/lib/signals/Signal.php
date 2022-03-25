<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx
 */

namespace signals;

use \php\Boot;
use \haxe\Exception;

/**
 *  The API is based off massiveinteractive's msignal and Robert Penner’s AS3 Signals, however is greatly simplified.
 */
class Signal extends BaseSignal {
	/**
	 * @param bool $fireOnAdd
	 * 
	 * @return void
	 */
	public function __construct ($fireOnAdd = false) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:25: characters 3-19
		if ($fireOnAdd === null) {
			$fireOnAdd = false;
		}
		parent::__construct($fireOnAdd);
	}

	/**
	 * @return void
	 */
	public function dispatch () {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:29: lines 29-30
		if ($this->mute) {
			#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:30: characters 4-10
			return;
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:31: characters 3-17
		if ($this->requiresSort) {
			\usort($this->callbacks->arr, Boot::getInstanceClosure($this, 'sortCallbacks'));
			$this->requiresSort = false;
		}
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:32: characters 3-22
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
	}

	/**
	 * @param \Closure $callback
	 * @param object $callbackData
	 * 
	 * @return void
	 */
	public function dispatchCallback ($callback, $callbackData) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:36: characters 3-13
		$callback();
	}

	/**
	 * @param \Closure $callback
	 * @param object $callbackData
	 * 
	 * @return void
	 */
	public function dispatchCallback1 ($callback, $callbackData) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:40: characters 3-8
		throw Exception::thrown("Use Signal 1");
	}

	/**
	 * @param \Closure $callback
	 * @param object $callbackData
	 * 
	 * @return void
	 */
	public function dispatchCallback2 ($callback, $callbackData) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:44: characters 3-8
		throw Exception::thrown("Use Signal 2");
	}

	/**
	 * @param \Closure $callback
	 * @param object $callbackData
	 * 
	 * @return void
	 */
	public function dispatchCallback3 ($callback, $callbackData) {
		#C:\HaxeToolkit\haxe\lib\signals/1,3,2/src/signals/Signal.hx:48: characters 3-8
		throw Exception::thrown("Use Signal 3");
	}
}

Boot::registerClass(Signal::class, 'signals.Signal');
