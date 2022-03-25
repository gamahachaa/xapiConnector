<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx
 */

namespace thx;

use \php\_Boot\HxAnon;
use \php\Boot;

class Orderings {
	/**
	 * @var object
	 */
	static public $monoid;

	/**
	 * @param OrderingImpl $o
	 * 
	 * @return OrderingImpl
	 */
	public static function negate ($o) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:39: lines 39-43
		$__hx__switch = ($o->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:40: characters 13-15
			return OrderingImpl::GT();
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:42: characters 13-15
			return OrderingImpl::LT();
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:41: characters 13-15
			return OrderingImpl::EQ();
		}
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


		self::$monoid = new _HxAnon_Orderings0(OrderingImpl::EQ(), function ($o0, $o1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:31: lines 31-35
			$__hx__switch = ($o0->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:32: characters 13-15
				return OrderingImpl::LT();
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:34: characters 13-15
				return OrderingImpl::GT();
			} else if ($__hx__switch === 2) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:33: characters 13-15
				return $o1;
			}
		});
	}
}

class _HxAnon_Orderings0 extends HxAnon {
	function __construct($zero, $append) {
		$this->zero = $zero;
		$this->append = $append;
	}
}

Boot::registerClass(Orderings::class, 'thx.Orderings');
Orderings::__hx__init();
