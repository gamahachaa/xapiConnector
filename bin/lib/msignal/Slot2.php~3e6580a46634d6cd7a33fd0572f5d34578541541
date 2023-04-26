<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx
 */

namespace msignal;

use \php\Boot;

/**
 * A slot that executes a listener with two arguments.
 */
class Slot2 extends Slot {
	/**
	 * @var mixed
	 * Allows the slot to inject the first argument to dispatch.
	 */
	public $param1;
	/**
	 * @var mixed
	 * Allows the slot to inject the second argument to dispatch.
	 */
	public $param2;

	/**
	 * @param Signal2 $signal
	 * @param \Closure $listener
	 * @param bool $once
	 * @param int $priority
	 * 
	 * @return void
	 */
	public function __construct ($signal, $listener, $once = false, $priority = 0) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:176: characters 3-42
		if ($once === null) {
			$once = false;
		}
		if ($priority === null) {
			$priority = 0;
		}
		parent::__construct($signal, $listener, $once, $priority);
	}

	/**
	 * Executes a listener with two arguments.
	 * If <code>param1</code> or <code>param2</code> is set,
	 * they override the values provided.
	 * 
	 * @param mixed $value1
	 * @param mixed $value2
	 * 
	 * @return void
	 */
	public function execute ($value1, $value2) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:186: characters 3-23
		if (!$this->enabled) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:186: characters 17-23
			return;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:187: characters 3-21
		if ($this->once) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:187: characters 13-21
			$this->remove();
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:189: characters 3-38
		if ($this->param1 !== null) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:189: characters 23-38
			$value1 = $this->param1;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:190: characters 3-38
		if ($this->param2 !== null) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:190: characters 23-38
			$value2 = $this->param2;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:192: characters 3-27
		($this->listener)($value1, $value2);
	}
}

Boot::registerClass(Slot2::class, 'msignal.Slot2');
