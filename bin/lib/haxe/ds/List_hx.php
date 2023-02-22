<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\std/haxe/ds/List.hx
 */

namespace haxe\ds;

use \php\Boot;
use \haxe\ds\_List\ListNode;

/**
 * A linked-list of elements. The list is composed of element container objects
 * that are chained together. It is optimized so that adding or removing an
 * element does not imply copying the whole list content every time.
 * @see https://haxe.org/manual/std-List.html
 */
class List_hx {
	/**
	 * @var ListNode
	 */
	public $h;
	/**
	 * @var int
	 * The length of `this` List.
	 */
	public $length;
	/**
	 * @var ListNode
	 */
	public $q;

	/**
	 * Creates a new empty list.
	 * 
	 * @return void
	 */
	public function __construct () {
		#C:\HaxeToolkit\haxe\std/haxe/ds/List.hx:45: characters 3-13
		$this->length = 0;
	}

	/**
	 * Adds element `item` at the end of `this` List.
	 * `this.length` increases by 1.
	 * 
	 * @param mixed $item
	 * 
	 * @return void
	 */
	public function add ($item) {
		#C:\HaxeToolkit\haxe\std/haxe/ds/List.hx:54: characters 3-39
		$x = new ListNode($item, null);
		#C:\HaxeToolkit\haxe\std/haxe/ds/List.hx:55: lines 55-58
		if ($this->h === null) {
			#C:\HaxeToolkit\haxe\std/haxe/ds/List.hx:56: characters 4-9
			$this->h = $x;
		} else {
			#C:\HaxeToolkit\haxe\std/haxe/ds/List.hx:58: characters 4-14
			$this->q->next = $x;
		}
		#C:\HaxeToolkit\haxe\std/haxe/ds/List.hx:59: characters 3-8
		$this->q = $x;
		#C:\HaxeToolkit\haxe\std/haxe/ds/List.hx:60: characters 3-11
		$this->length++;
	}
}

Boot::registerClass(List_hx::class, 'haxe.ds.List');
