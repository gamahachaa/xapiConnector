<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:12: characters 10-48
		if ($value < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:12: characters 22-24
			return OrderingImpl::LT();
		} else if ($value > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:12: characters 40-42
			return OrderingImpl::GT();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:12: characters 45-47
			return OrderingImpl::EQ();
		}
	}

	/**
	 * @param int $value
	 * 
	 * @return OrderingImpl
	 */
	public static function fromInt ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:9: characters 10-48
		if ($value < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:9: characters 22-24
			return OrderingImpl::LT();
		} else if ($value > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:9: characters 40-42
			return OrderingImpl::GT();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:9: characters 45-47
			return OrderingImpl::EQ();
		}
	}

	/**
	 * @param OrderingImpl $this
	 * 
	 * @return int
	 */
	public static function toInt ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:15: lines 15-19
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:16: characters 13-15
			return -1;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:17: characters 13-14
			return 1;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:18: characters 13-14
			return 0;
		}
	}
}

Boot::registerClass(Ordering_Impl_::class, 'thx._Ord.Ordering_Impl_');
