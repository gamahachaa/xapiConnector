<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\std/haxe/ds/List.hx
 */

namespace haxe\ds\_List;

use \php\Boot;

class ListNode {
	/**
	 * @var mixed
	 */
	public $item;
	/**
	 * @var ListNode
	 */
	public $next;

	/**
	 * @param mixed $item
	 * @param ListNode $next
	 * 
	 * @return void
	 */
	public function __construct ($item, $next) {
		#C:\HaxeToolkit\haxe\std/haxe/ds/List.hx:267: characters 3-19
		$this->item = $item;
		#C:\HaxeToolkit\haxe\std/haxe/ds/List.hx:268: characters 3-19
		$this->next = $next;
	}
}

Boot::registerClass(ListNode::class, 'haxe.ds._List.ListNode');
