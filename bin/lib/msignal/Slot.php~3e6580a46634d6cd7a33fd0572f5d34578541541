<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx
 */

namespace msignal;

use \php\Boot;
use \haxe\Exception;

/**
 * Defines the basic properties of a listener associated with a Signal.
 */
class Slot {
	/**
	 * @var bool
	 * Whether the listener is called on execution. Defaults to true.
	 */
	public $enabled;
	/**
	 * @var mixed
	 * The listener associated with this slot.
	 * Note: for hxcpp 2.10 this requires a getter method to compile
	 */
	public $listener;
	/**
	 * @var bool
	 * Whether this slot is automatically removed after it has been used once.
	 */
	public $once;
	/**
	 * @var int
	 * The priority of this slot should be given in the execution order.
	 * An Signal will call higher numbers before lower ones.
	 * Defaults to 0.
	 */
	public $priority;
	/**
	 * @var mixed
	 */
	public $signal;

	/**
	 * @param mixed $signal
	 * @param mixed $listener
	 * @param bool $once
	 * @param int $priority
	 * 
	 * @return void
	 */
	public function __construct ($signal, $listener, $once = false, $priority = 0) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:74: lines 74-80
		if ($once === null) {
			$once = false;
		}
		if ($priority === null) {
			$priority = 0;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:75: characters 3-23
		$this->signal = $signal;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:76: characters 3-27
		$this->set_listener($listener);
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:77: characters 3-19
		$this->once = $once;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:78: characters 3-27
		$this->priority = $priority;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:79: characters 3-22
		$this->enabled = true;
	}

	/**
	 * Removes the slot from its signal.
	 * 
	 * @return void
	 */
	public function remove () {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:87: characters 3-26
		$this->signal->remove($this->listener);
	}

	/**
	 * @param mixed $value
	 * 
	 * @return mixed
	 */
	public function set_listener ($value) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:104: characters 3-27
		if ($value === null) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:104: characters 22-27
			throw Exception::thrown("listener cannot be null");
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Slot.hx:106: characters 3-26
		return $this->listener = $value;
	}
}

Boot::registerClass(Slot::class, 'msignal.Slot');
Boot::registerSetters('msignal\\Slot', [
	'listener' => true
]);
