<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx
 */

namespace msignal;

use \php\Boot;
use \haxe\Exception;

class SlotList {
	/**
	 * @var SlotList
	 * Represents an empty list. Used as the list terminator.
	 */
	static public $NIL;

	/**
	 * @var mixed
	 */
	public $head;
	/**
	 * @var int
	 * The number of slots in the list.
	 */
	public $length;
	/**
	 * @var bool
	 */
	public $nonEmpty;
	/**
	 * @var SlotList
	 */
	public $tail;

	/**
	 * Creates and returns a new SlotList object.
	 * <p>A user never has to create a SlotList manually.
	 * Use the <code>NIL</code> element to represent an empty list.
	 * <code>NIL.prepend(value)</code> would create a list containing
	 * <code>value</code></p>.
	 * @param head The first slot in the list.
	 * @param tail A list containing all slots except head.
	 * 
	 * @param mixed $head
	 * @param SlotList $tail
	 * 
	 * @return void
	 */
	public function __construct ($head, $tail = null) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:52: characters 3-19
		$this->nonEmpty = false;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:54: lines 54-74
		if (($head === null) && ($tail === null)) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:57: characters 4-26
			if (SlotList::$NIL !== null) {
				#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:57: characters 21-26
				throw Exception::thrown("Parameters head and tail are null. Use the NIL element instead.");
			}
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:61: characters 4-20
			$this->nonEmpty = false;
		} else if ($head === null) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:66: characters 4-9
			throw Exception::thrown("Parameter head cannot be null.");
		} else {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:71: characters 4-20
			$this->head = $head;
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:72: characters 4-48
			$this->tail = ($tail === null ? SlotList::$NIL : $tail);
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:73: characters 4-19
			$this->nonEmpty = true;
		}
	}

	/**
	 * Appends a slot to this list.
	 * Note: appending is O(n). Where possible, prepend which is O(1).
	 * In some cases, many list items must be cloned to
	 * avoid changing existing lists.
	 * @param	slot The item to be appended.
	 * @return	A list consisting of all elements of this list followed by slot.
	 * 
	 * @param mixed $slot
	 * 
	 * @return SlotList
	 */
	public function append ($slot) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:122: characters 3-32
		if ($slot === null) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:122: characters 21-32
			return $this;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:123: characters 3-61
		if (!$this->nonEmpty) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:123: characters 18-61
			return new SlotList($slot);
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:126: lines 126-129
		if ($this->tail === SlotList::$NIL) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:128: characters 4-61
			return (new SlotList($slot))->prepend($this->head);
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:133: characters 3-57
		$wholeClone = new SlotList($this->head);
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:134: characters 3-29
		$subClone = $wholeClone;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:135: characters 3-22
		$current = $this->tail;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:137: lines 137-141
		while ($current->nonEmpty) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:139: characters 4-75
			$subClone = $subClone->tail = new SlotList($current->head);
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:140: characters 4-26
			$current = $current->tail;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:144: characters 3-55
		$subClone->tail = new SlotList($slot);
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:145: characters 3-20
		return $wholeClone;
	}

	/**
	 * Determines whether the supplied listener Function is contained
	 * within this list
	 * 
	 * @param mixed $listener
	 * 
	 * @return bool
	 */
	public function contains ($listener) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:226: characters 3-30
		if (!$this->nonEmpty) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:226: characters 18-30
			return false;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:228: characters 3-16
		$p = $this;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:229: lines 229-233
		while ($p->nonEmpty) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:231: characters 4-70
			if (\Reflect::compareMethods($p->head->listener, $listener)) {
				#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:231: characters 59-70
				return true;
			}
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:232: characters 4-14
			$p = $p->tail;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:235: characters 3-15
		return false;
	}

	/**
	 * Returns the slots in this list that do not contain the supplied
	 * listener. Note: assumes the listener is not repeated within the list.
	 * @param	listener The function to remove.
	 * @return A list consisting of all elements of this list that do not
	 * have listener.
	 * 
	 * @param mixed $listener
	 * 
	 * @return SlotList
	 */
	public function filterNot ($listener) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:194: characters 3-49
		if (!$this->nonEmpty || ($listener === null)) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:194: characters 38-49
			return $this;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:196: characters 3-67
		if (\Reflect::compareMethods($this->head->listener, $listener)) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:196: characters 56-67
			return $this->tail;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:199: characters 3-57
		$wholeClone = new SlotList($this->head);
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:200: characters 3-29
		$subClone = $wholeClone;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:201: characters 3-22
		$current = $this->tail;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:203: lines 203-214
		while ($current->nonEmpty) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:205: lines 205-210
			if (\Reflect::compareMethods($current->head->listener, $listener)) {
				#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:208: characters 5-33
				$subClone->tail = $current->tail;
				#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:209: characters 5-22
				return $wholeClone;
			}
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:212: characters 4-75
			$subClone = $subClone->tail = new SlotList($current->head);
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:213: characters 4-26
			$current = $current->tail;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:217: characters 3-14
		return $this;
	}

	/**
	 * Retrieves the Slot associated with a supplied listener within the SlotList.
	 * @param   listener The Function being searched for
	 * @return  The ISlot in this list associated with the listener parameter
	 * through the ISlot.listener property. Returns null if no such
	 * ISlot instance exists or the list is empty.
	 * 
	 * @param mixed $listener
	 * 
	 * @return mixed
	 */
	public function find ($listener) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:247: characters 3-29
		if (!$this->nonEmpty) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:247: characters 18-29
			return null;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:249: characters 3-16
		$p = $this;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:250: lines 250-254
		while ($p->nonEmpty) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:252: characters 4-72
			if (\Reflect::compareMethods($p->head->listener, $listener)) {
				#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:252: characters 59-72
				return $p->head;
			}
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:253: characters 4-14
			$p = $p->tail;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:256: characters 3-14
		return null;
	}

	/**
	 * @return int
	 */
	public function get_length () {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:83: characters 3-26
		if (!$this->nonEmpty) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:83: characters 18-26
			return 0;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:84: characters 3-28
		if ($this->tail === SlotList::$NIL) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:84: characters 20-28
			return 1;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:90: characters 3-18
		$result = 0;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:91: characters 3-16
		$p = $this;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:93: lines 93-97
		while ($p->nonEmpty) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:95: characters 4-12
			++$result;
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:96: characters 4-14
			$p = $p->tail;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:99: characters 3-16
		return $result;
	}

	/**
	 * Insert a slot into the list in a position according to its priority.
	 * The higher the priority, the closer the item will be inserted to the
	 * list head.
	 * @param slot The item to be inserted.
	 * 
	 * @param mixed $slot
	 * 
	 * @return SlotList
	 */
	public function insertWithPriority ($slot) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:156: characters 3-61
		if (!$this->nonEmpty) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:156: characters 18-61
			return new SlotList($slot);
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:158: characters 3-36
		$priority = $slot->priority;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:161: characters 3-59
		if ($priority >= $this->head->priority) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:161: characters 39-59
			return $this->prepend($slot);
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:163: characters 3-57
		$wholeClone = new SlotList($this->head);
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:164: characters 3-29
		$subClone = $wholeClone;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:165: characters 3-22
		$current = $this->tail;
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:168: lines 168-178
		while ($current->nonEmpty) {
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:170: lines 170-174
			if ($priority > $current->head->priority) {
				#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:172: characters 5-42
				$subClone->tail = $current->prepend($slot);
				#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:173: characters 5-22
				return $wholeClone;
			}
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:176: characters 4-75
			$subClone = $subClone->tail = new SlotList($current->head);
			#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:177: characters 4-26
			$current = $current->tail;
		}
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:181: characters 3-55
		$subClone->tail = new SlotList($slot);
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:182: characters 3-20
		return $wholeClone;
	}

	/**
	 * Prepends a slot to this list.
	 * @param	slot The item to be prepended.
	 * @return	A list consisting of slot followed by all elements of this list.
	 * 
	 * @param mixed $slot
	 * 
	 * @return SlotList
	 */
	public function prepend ($slot) {
		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:109: characters 3-52
		return new SlotList($slot, $this);
	}

	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;

		#C:\HaxeToolkit\haxe\lib\msignal/1,2,5/msignal/SlotList.hx:28: characters 31-79
		SlotList::$NIL = new SlotList(null, null);

	}
}

Boot::registerClass(SlotList::class, 'msignal.SlotList');
Boot::registerGetters('msignal\\SlotList', [
	'length' => true
]);
SlotList::__hx__init();
