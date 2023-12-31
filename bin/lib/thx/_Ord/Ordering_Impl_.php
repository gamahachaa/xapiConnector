<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx
 */

namespace thx\_Ord;

use \php\Boot;
use \thx\OrderingImpl;

final class Ordering_Impl_ {
	/**
	 * @param float $value
	 * 
	 * @return OrderingImpl
	 */
	public static function fromFloat ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:12: characters 12-50
		if ($value < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:12: characters 24-26
			return OrderingImpl::LT();
		} else if ($value > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:12: characters 42-44
			return OrderingImpl::GT();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:12: characters 47-49
			return OrderingImpl::EQ();
		}
	}

	/**
	 * @param int $value
	 * 
	 * @return OrderingImpl
	 */
	public static function fromInt ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:9: characters 12-50
		if ($value < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:9: characters 24-26
			return OrderingImpl::LT();
		} else if ($value > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:9: characters 42-44
			return OrderingImpl::GT();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:9: characters 47-49
			return OrderingImpl::EQ();
		}
	}

	/**
	 * @param OrderingImpl $this
	 * 
	 * @return int
	 */
	public static function toInt ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:15: lines 15-19
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:16: characters 16-18
			return -1;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:17: characters 16-17
			return 1;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:18: characters 16-17
			return 0;
		}
	}
}

Boot::registerClass(Ordering_Impl_::class, 'thx._Ord.Ordering_Impl_');
