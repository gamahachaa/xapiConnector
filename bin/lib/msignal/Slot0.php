<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx
 */

namespace msignal;

use \php\Boot;

/**
 * A slot that executes a listener with no arguments.
 */
class Slot0 extends Slot {
	/**
	 * @param Signal0 $signal
	 * @param \Closure $listener
	 * @param bool $once
	 * @param int $priority
	 * 
	 * @return void
	 */
	public function __construct ($signal, $listener, $once = false, $priority = 0) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:117: characters 3-42
		if ($once === null) {
			$once = false;
		}
		if ($priority === null) {
			$priority = 0;
		}
		parent::__construct($signal, $listener, $once, $priority);
	}

	/**
	 * Executes a listener with no arguments.
	 * 
	 * @return void
	 */
	public function execute () {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:125: characters 3-23
		if (!$this->enabled) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:125: characters 17-23
			return;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:126: characters 3-21
		if ($this->once) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:126: characters 13-21
			$this->remove();
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:127: characters 3-13
		($this->listener)();
	}
}

Boot::registerClass(Slot0::class, 'msignal.Slot0');
