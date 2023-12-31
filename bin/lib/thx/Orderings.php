<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:36: lines 36-40
		$__hx__switch = ($o->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:37: characters 14-16
			return OrderingImpl::GT();
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:39: characters 14-16
			return OrderingImpl::LT();
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:38: characters 14-16
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:29: lines 29-33
			$__hx__switch = ($o0->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:30: characters 16-18
				return OrderingImpl::LT();
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:32: characters 16-18
				return OrderingImpl::GT();
			} else if ($__hx__switch === 2) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:31: characters 16-18
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
