<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx
 */

namespace msignal;

use \php\Boot;

/**
 * Signal that executes listeners with no arguments.
 */
class Signal0 extends Signal {
	/**
	 * @return void
	 */
	public function __construct () {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:185: characters 3-10
		parent::__construct();
	}

	/**
	 * @param \Closure $listener
	 * @param bool $once
	 * @param int $priority
	 * 
	 * @return Slot0
	 */
	public function createSlot ($listener, $once = false, $priority = 0) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:204: characters 3-51
		if ($once === null) {
			$once = false;
		}
		if ($priority === null) {
			$priority = 0;
		}
		return new Slot0($this, $listener, $once, $priority);
	}

	/**
	 * Executes the signals listeners with no arguements.
	 * 
	 * @return void
	 */
	public function dispatch () {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:193: characters 3-30
		$slotsToProcess = $this->slots;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:195: lines 195-199
		while ($slotsToProcess->nonEmpty) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:197: characters 4-33
			$slotsToProcess->head->execute();
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:198: characters 4-40
			$slotsToProcess = $slotsToProcess->tail;
		}
	}
}

Boot::registerClass(Signal0::class, 'msignal.Signal0');
