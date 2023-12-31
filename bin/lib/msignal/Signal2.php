<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx
 */

namespace msignal;

use \php\Boot;

/**
 * Signal that executes listeners with two arguments.
 */
class Signal2 extends Signal {
	/**
	 * @param mixed $type1
	 * @param mixed $type2
	 * 
	 * @return void
	 */
	public function __construct ($type1 = null, $type2 = null) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:245: characters 3-24
		parent::__construct(\Array_hx::wrap([
			$type1,
			$type2,
		]));
	}

	/**
	 * @param \Closure $listener
	 * @param bool $once
	 * @param int $priority
	 * 
	 * @return Slot2
	 */
	public function createSlot ($listener, $once = false, $priority = 0) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:264: characters 3-69
		if ($once === null) {
			$once = false;
		}
		if ($priority === null) {
			$priority = 0;
		}
		return new Slot2($this, $listener, $once, $priority);
	}

	/**
	 * Executes the signals listeners with two arguements.
	 * 
	 * @param mixed $value1
	 * @param mixed $value2
	 * 
	 * @return void
	 */
	public function dispatch ($value1, $value2) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:253: characters 3-30
		$slotsToProcess = $this->slots;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:255: lines 255-259
		while ($slotsToProcess->nonEmpty) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:257: characters 4-47
			$slotsToProcess->head->execute($value1, $value2);
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:258: characters 4-40
			$slotsToProcess = $slotsToProcess->tail;
		}
	}
}

Boot::registerClass(Signal2::class, 'msignal.Signal2');
