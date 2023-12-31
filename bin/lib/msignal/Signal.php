<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx
 */

namespace msignal;

use \php\Boot;
use \haxe\Exception;

/**
 * A Signal manages a list of listeners, which are executed when the signal is
 * dispatched.
 */
class Signal {
	/**
	 * @var int
	 * The current number of listeners for the signal.
	 */
	public $numListeners;
	/**
	 * @var bool
	 */
	public $priorityBased;
	/**
	 * @var SlotList
	 */
	public $slots;
	/**
	 * @var mixed[]|\Array_hx
	 */
	public $valueClasses;

	/**
	 * @param mixed[]|\Array_hx $valueClasses
	 * 
	 * @return void
	 */
	public function __construct ($valueClasses = null) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:51: characters 3-46
		if ($valueClasses === null) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:51: characters 29-46
			$valueClasses = new \Array_hx();
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:52: characters 3-35
		$this->valueClasses = $valueClasses;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:53: characters 3-28
		$this->slots = SlotList::$NIL;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:54: characters 3-24
		$this->priorityBased = false;
	}

	/**
	 * Subscribes a listener for the signal.
	 * @param listener A function matching the signature of TListener
	 * @return The added listener slot
	 * 
	 * @param mixed $listener
	 * 
	 * @return mixed
	 */
	public function add ($listener) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:65: characters 3-36
		return $this->registerListener($listener);
	}

	/**
	 * Subscribes a one-time listener for this signal.
	 * The signal will remove the listener automatically the first time it is called,
	 * after the dispatch to all listeners is complete.
	 * @param listener A function matching the signature of TListener
	 * @return The added listener slot
	 * 
	 * @param mixed $listener
	 * 
	 * @return mixed
	 */
	public function addOnce ($listener) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:78: characters 3-42
		return $this->registerListener($listener, true);
	}

	/**
	 * Subscribes a one-time listener for this signal.
	 * The signal will remove the listener automatically the first time it is
	 * called, after the dispatch to all listeners is complete.
	 * @param listener A function matching the signature of TListener
	 * @return The added listener slot
	 * 
	 * @param mixed $listener
	 * @param int $priority
	 * 
	 * @return mixed
	 */
	public function addOnceWithPriority ($listener, $priority = 0) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:106: characters 3-52
		if ($priority === null) {
			$priority = 0;
		}
		return $this->registerListener($listener, true, $priority);
	}

	/**
	 * Subscribes a listener for the signal.
	 * After you successfully register an event listener,
	 * you cannot change its priority through additional calls to add().
	 * To change a listener's priority, you must first call remove().
	 * Then you can register the listener again with the new priority level.
	 * @param listener A function matching the signature of TListener
	 * @return The added listener slot
	 * 
	 * @param mixed $listener
	 * @param int $priority
	 * 
	 * @return mixed
	 */
	public function addWithPriority ($listener, $priority = 0) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:93: characters 3-53
		if ($priority === null) {
			$priority = 0;
		}
		return $this->registerListener($listener, false, $priority);
	}

	/**
	 * @param mixed $listener
	 * @param bool $once
	 * @param int $priority
	 * 
	 * @return mixed
	 */
	public function createSlot ($listener, $once = false, $priority = 0) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:169: characters 3-14
		if ($once === null) {
			$once = false;
		}
		if ($priority === null) {
			$priority = 0;
		}
		return null;
	}

	/**
	 * @return int
	 */
	public function get_numListeners () {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:174: characters 3-22
		return $this->slots->get_length();
	}

	/**
	 * @param mixed $listener
	 * @param bool $once
	 * @param int $priority
	 * 
	 * @return mixed
	 */
	public function registerListener ($listener, $once = false, $priority = 0) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:133: lines 133-146
		if ($once === null) {
			$once = false;
		}
		if ($priority === null) {
			$priority = 0;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:134: lines 134-143
		if ($this->registrationPossible($listener, $once)) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:136: characters 4-55
			$newSlot = $this->createSlot($listener, $once, $priority);
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:138: characters 4-61
			if (!$this->priorityBased && ($priority !== 0)) {
				#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:138: characters 41-61
				$this->priorityBased = true;
			}
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:139: lines 139-140
			if (!$this->priorityBased && ($priority === 0)) {
				#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:139: characters 41-71
				$this->slots = $this->slots->prepend($newSlot);
			} else {
				#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:140: characters 9-50
				$this->slots = $this->slots->insertWithPriority($newSlot);
			}
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:142: characters 4-18
			return $newSlot;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:145: characters 3-30
		return $this->slots->find($listener);
	}

	/**
	 * @param mixed $listener
	 * @param bool $once
	 * 
	 * @return bool
	 */
	public function registrationPossible ($listener, $once) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:150: characters 3-35
		if (!$this->slots->nonEmpty) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:150: characters 24-35
			return true;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:152: characters 3-43
		$existingSlot = $this->slots->find($listener);
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:153: characters 3-40
		if ($existingSlot === null) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:153: characters 29-40
			return true;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:156: lines 156-161
		if ($existingSlot->once !== $once) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:160: characters 4-9
			throw Exception::thrown("You cannot addOnce() then add() the same listener without removing the relationship first.");
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:164: characters 3-15
		return false;
	}

	/**
	 * Unsubscribes a listener from the signal.
	 * @param listener The listener to remove
	 * @return The removed listener slot
	 * 
	 * @param mixed $listener
	 * 
	 * @return mixed
	 */
	public function remove ($listener) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:117: characters 3-35
		$slot = $this->slots->find($listener);
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:118: characters 3-32
		if ($slot === null) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:118: characters 21-32
			return null;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:120: characters 3-36
		$this->slots = $this->slots->filterNot($listener);
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:121: characters 3-14
		return $slot;
	}

	/**
	 * Unsubscribes all listeners from the signal.
	 * 
	 * @return void
	 */
	public function removeAll () {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/Signal.hx:129: characters 3-28
		$this->slots = SlotList::$NIL;
	}
}

Boot::registerClass(Signal::class, 'msignal.Signal');
Boot::registerGetters('msignal\\Signal', [
	'numListeners' => true
]);
