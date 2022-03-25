<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx
 */

namespace msignal;

use \php\Boot;

/**
 * Signal that executes listeners with one arguments.
 */
class Signal1 extends Signal {
	/**
	 * @param mixed $type
	 * 
	 * @return void
	 */
	public function __construct ($type = null) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:215: characters 3-16
		parent::__construct(\Array_hx::wrap([$type]));
	}

	/**
	 * @param \Closure $listener
	 * @param bool $once
	 * @param int $priority
	 * 
	 * @return Slot1
	 */
	public function createSlot ($listener, $once = false, $priority = 0) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:234: characters 3-59
		if ($once === null) {
			$once = false;
		}
		if ($priority === null) {
			$priority = 0;
		}
		return new Slot1($this, $listener, $once, $priority);
	}

	/**
	 * Executes the signals listeners with one arguement.
	 * 
	 * @param mixed $value
	 * 
	 * @return void
	 */
	public function dispatch ($value) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:223: characters 3-30
		$slotsToProcess = $this->slots;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:225: lines 225-229
		while ($slotsToProcess->nonEmpty) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:227: characters 4-38
			$slotsToProcess->head->execute($value);
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:228: characters 4-40
			$slotsToProcess = $slotsToProcess->tail;
		}
	}
}

Boot::registerClass(Signal1::class, 'msignal.Signal1');
