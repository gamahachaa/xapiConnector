<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx
 */

namespace thx\_Ord;

use \php\Boot;
use \thx\OrderingImpl;

final class Ord_Impl_ {
	/**
	 * @param \Closure $this
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function contramap ($this1, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:64: characters 5-59
		return function ($b0, $b1) use (&$f, &$this1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:64: characters 31-56
			return $this1($f($b0), $f($b1));
		};
	}

	/**
	 * @param \Closure $this
	 * @param mixed $a0
	 * @param mixed $a1
	 * 
	 * @return bool
	 */
	public static function equal ($this1, $a0, $a1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:61: characters 5-30
		return $this1($a0, $a1) === OrderingImpl::EQ();
	}

	/**
	 * @return \Closure
	 */
	public static function forComparable () {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:80: characters 5-77
		return function ($a, $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:80: characters 35-74
			return Ordering_Impl_::fromInt($a->compareTo($b));
		};
	}

	/**
	 * @return \Closure
	 */
	public static function forComparableOrd () {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:83: characters 5-59
		return function ($a, $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:83: characters 35-56
			return $a->compareTo($b);
		};
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function fromIntComparison ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:77: characters 5-72
		return function ($a, $b) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:77: characters 37-69
			return Ordering_Impl_::fromInt($f($a, $b));
		};
	}

	/**
	 * @param \Closure $this
	 * @param mixed $a0
	 * @param mixed $a1
	 * 
	 * @return int
	 */
	public static function intComparison ($this1, $a0, $a1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:70: characters 19-31
		$__hx__switch = ($this1($a0, $a1)->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:71: characters 16-18
			return -1;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:73: characters 16-17
			return 1;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:72: characters 16-17
			return 0;
		}
	}

	/**
	 * @param \Closure $this
	 * 
	 * @return \Closure
	 */
	public static function inverse ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:67: characters 5-59
		return function ($a0, $a1) use (&$this1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:67: characters 37-56
			return $this1($a1, $a0);
		};
	}

	/**
	 * @param \Closure $this
	 * @param mixed $a0
	 * @param mixed $a1
	 * 
	 * @return mixed
	 */
	public static function max ($this1, $a0, $a1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:49: characters 19-31
		$__hx__switch = ($this1($a0, $a1)->index);
		if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:51: characters 16-18
			return $a0;
		} else if ($__hx__switch === 0 || $__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:50: characters 21-23
			return $a1;
		}
	}

	/**
	 * @param \Closure $this
	 * @param mixed $a0
	 * @param mixed $a1
	 * 
	 * @return mixed
	 */
	public static function min ($this1, $a0, $a1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:55: characters 19-31
		$__hx__switch = ($this1($a0, $a1)->index);
		if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:57: characters 16-18
			return $a1;
		} else if ($__hx__switch === 0 || $__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:56: characters 21-23
			return $a0;
		}
	}

	/**
	 * @param \Closure $this
	 * @param mixed $a0
	 * @param mixed $a1
	 * 
	 * @return OrderingImpl
	 */
	public static function order ($this1, $a0, $a1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ord.hx:46: characters 5-24
		return $this1($a0, $a1);
	}
}

Boot::registerClass(Ord_Impl_::class, 'thx._Ord.Ord_Impl_');
