<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx
 */

namespace msignal;

use \php\Boot;

/**
 * A slot that executes a listener with one argument.
 */
class Slot1 extends Slot {
	/**
	 * @var mixed
	 * Allows the slot to inject the argument to dispatch.
	 */
	public $param;

	/**
	 * @param Signal1 $signal
	 * @param \Closure $listener
	 * @param bool $once
	 * @param int $priority
	 * 
	 * @return void
	 */
	public function __construct ($signal, $listener, $once = false, $priority = 0) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:143: characters 3-42
		if ($once === null) {
			$once = false;
		}
		if ($priority === null) {
			$priority = 0;
		}
		parent::__construct($signal, $listener, $once, $priority);
	}

	/**
	 * Executes a listener with one argument.
	 * If <code>param</code> is not null, it overrides the value provided.
	 * 
	 * @param mixed $value1
	 * 
	 * @return void
	 */
	public function execute ($value1) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:152: characters 3-23
		if (!$this->enabled) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:152: characters 17-23
			return;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:153: characters 3-21
		if ($this->once) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:153: characters 13-21
			$this->remove();
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:154: characters 3-36
		if ($this->param !== null) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:154: characters 22-36
			$value1 = $this->param;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:155: characters 3-19
		($this->listener)($value1);
	}
}

Boot::registerClass(Slot1::class, 'msignal.Slot1');
