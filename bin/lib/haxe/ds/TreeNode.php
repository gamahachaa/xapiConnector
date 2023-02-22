<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\std/haxe/ds/BalancedTree.hx
 */

namespace haxe\ds;

use \php\Boot;

/**
 * A tree node of `haxe.ds.BalancedTree`.
 */
class TreeNode {
	/**
	 * @var int
	 */
	public $_height;
	/**
	 * @var mixed
	 */
	public $key;
	/**
	 * @var TreeNode
	 */
	public $left;
	/**
	 * @var TreeNode
	 */
	public $right;
	/**
	 * @var mixed
	 */
	public $value;

	/**
	 * @param TreeNode $l
	 * @param mixed $k
	 * @param mixed $v
	 * @param TreeNode $r
	 * @param int $h
	 * 
	 * @return void
	 */
	public function __construct ($l, $k, $v, $r, $h = -1) {
		#C:\HaxeToolkit\haxe\std/haxe/ds/BalancedTree.hx:252: lines 252-261
		if ($h === null) {
			$h = -1;
		}
		#C:\HaxeToolkit\haxe\std/haxe/ds/BalancedTree.hx:253: characters 3-11
		$this->left = $l;
		#C:\HaxeToolkit\haxe\std/haxe/ds/BalancedTree.hx:254: characters 3-10
		$this->key = $k;
		#C:\HaxeToolkit\haxe\std/haxe/ds/BalancedTree.hx:255: characters 3-12
		$this->value = $v;
		#C:\HaxeToolkit\haxe\std/haxe/ds/BalancedTree.hx:256: characters 3-12
		$this->right = $r;
		#C:\HaxeToolkit\haxe\std/haxe/ds/BalancedTree.hx:257: lines 257-260
		if ($h === -1) {
			#C:\HaxeToolkit\haxe\std/haxe/ds/BalancedTree.hx:258: characters 14-95
			$tmp = null;
			#C:\HaxeToolkit\haxe\std/haxe/ds/BalancedTree.hx:258: characters 15-32
			$_this = $this->left;
			#C:\HaxeToolkit\haxe\std/haxe/ds/BalancedTree.hx:258: characters 35-53
			$_this1 = $this->right;
			#C:\HaxeToolkit\haxe\std/haxe/ds/BalancedTree.hx:258: characters 14-95
			if ((($_this === null ? 0 : $_this->_height)) > (($_this1 === null ? 0 : $_this1->_height))) {
				#C:\HaxeToolkit\haxe\std/haxe/ds/BalancedTree.hx:258: characters 56-73
				$_this = $this->left;
				#C:\HaxeToolkit\haxe\std/haxe/ds/BalancedTree.hx:258: characters 14-95
				$tmp = ($_this === null ? 0 : $_this->_height);
			} else {
				#C:\HaxeToolkit\haxe\std/haxe/ds/BalancedTree.hx:258: characters 76-94
				$_this = $this->right;
				#C:\HaxeToolkit\haxe\std/haxe/ds/BalancedTree.hx:258: characters 14-95
				$tmp = ($_this === null ? 0 : $_this->_height);
			}
			#C:\HaxeToolkit\haxe\std/haxe/ds/BalancedTree.hx:258: characters 4-99
			$this->_height = $tmp + 1;
		} else {
			#C:\HaxeToolkit\haxe\std/haxe/ds/BalancedTree.hx:260: characters 4-15
			$this->_height = $h;
		}
	}
}

Boot::registerClass(TreeNode::class, 'haxe.ds.TreeNode');
