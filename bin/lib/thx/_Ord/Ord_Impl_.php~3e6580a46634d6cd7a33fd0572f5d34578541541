<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:67: lines 67-69
		return function ($b0, $b1) use (&$f, &$this1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:68: characters 4-29
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:64: characters 3-28
		return $this1($a0, $a1) === OrderingImpl::EQ();
	}

	/**
	 * @return \Closure
	 */
	public static function forComparable () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:89: lines 89-91
		return function ($a, $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:90: characters 4-43
			return Ordering_Impl_::fromInt($a->compareTo($b));
		};
	}

	/**
	 * @return \Closure
	 */
	public static function forComparableOrd () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:94: lines 94-96
		return function ($a, $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:95: characters 4-25
			return $a->compareTo($b);
		};
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function fromIntComparison ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:84: lines 84-86
		return function ($a, $b) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:85: characters 4-36
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:77: characters 17-29
		$__hx__switch = ($this1($a0, $a1)->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:78: characters 13-15
			return -1;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:80: characters 13-14
			return 1;
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:79: characters 13-14
			return 0;
		}
	}

	/**
	 * @param \Closure $this
	 * 
	 * @return \Closure
	 */
	public static function inverse ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:72: lines 72-74
		return function ($a0, $a1) use (&$this1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:73: characters 4-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:52: characters 17-29
		$__hx__switch = ($this1($a0, $a1)->index);
		if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:54: characters 13-15
			return $a0;
		} else if ($__hx__switch === 0 || $__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:53: characters 18-20
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:58: characters 17-29
		$__hx__switch = ($this1($a0, $a1)->index);
		if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:60: characters 13-15
			return $a1;
		} else if ($__hx__switch === 0 || $__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:59: characters 18-20
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ord.hx:49: characters 3-22
		return $this1($a0, $a1);
	}
}

Boot::registerClass(Ord_Impl_::class, 'thx._Ord.Ord_Impl_');
