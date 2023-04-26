<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx
 */

namespace thx\_Eithers;

use \php\_Boot\HxAnon;
use \php\Boot;
use \thx\Either;
use \thx\Eithers;

final class EitherK_Impl_ {
	/**
	 * @param \Closure $this
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function andThen ($this1, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:215: characters 3-64
		return function ($a) use (&$f, &$this1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:215: characters 47-54
			$tmp = $this1($a);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:215: characters 56-63
			$_e = $f;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:215: characters 24-64
			return Eithers::flatMap($tmp, function ($a) use (&$_e) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:215: characters 56-63
				return EitherK_Impl_::apply($_e, $a);
			});
		};
	}

	/**
	 * @param \Closure $this
	 * @param \Closure $e
	 * 
	 * @return \Closure
	 */
	public static function ap ($this1, $e) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:227: characters 3-76
		return EitherK_Impl_::flatMap($this1, function ($r) use (&$e) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:227: characters 32-75
			return EitherK_Impl_::map($e, function ($f) use (&$r) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:227: characters 63-74
				return $f($r);
			});
		});
	}

	/**
	 * @param \Closure $this
	 * @param mixed $a
	 * 
	 * @return Either
	 */
	public static function apply ($this1, $a) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:208: characters 3-17
		return $this1($a);
	}

	/**
	 * @param \Closure $this
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function compose ($this1, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:211: characters 3-67
		return function ($a0) use (&$f, &$this1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:211: characters 26-67
			return Eithers::flatMap(EitherK_Impl_::apply($f, $a0), $this1);
		};
	}

	/**
	 * @param \Closure $this
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function flatMap ($this1, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:231: characters 3-91
		return function ($a) use (&$f, &$this1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:231: characters 24-91
			return Eithers::flatMap($this1($a), function ($r) use (&$f, &$a) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:231: characters 70-90
				return EitherK_Impl_::apply($f($r), $a);
			});
		};
	}

	/**
	 * @param \Closure $this
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function map ($this1, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:223: characters 18-33
		$fb = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:223: characters 3-34
		return EitherK_Impl_::flatMap($this1, function ($v) use (&$fb) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:223: characters 18-33
			return EitherK_Impl_::pure($fb($v));
		});
	}

	/**
	 * @return object
	 */
	public static function monoid () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:235: lines 235-240
		return new _HxAnon_EitherK_Impl_0(function ($r) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:236: characters 25-40
			return Either::Right($r);
		}, function ($f0, $f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:238: characters 5-71
			return function ($r) use (&$f1, &$f0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:238: characters 49-60
				$tmp = EitherK_Impl_::apply($f0, $r);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:238: characters 62-70
				$_e = $f1;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:238: characters 26-71
				return Eithers::flatMap($tmp, function ($a) use (&$_e) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:238: characters 62-70
					return EitherK_Impl_::apply($_e, $a);
				});
			};
		});
	}

	/**
	 * @param mixed $r
	 * 
	 * @return \Closure
	 */
	public static function pure ($r) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:219: characters 3-39
		return function ($a) use (&$r) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:219: characters 24-39
			return Either::Right($r);
		};
	}
}

class _HxAnon_EitherK_Impl_0 extends HxAnon {
	function __construct($zero, $append) {
		$this->zero = $zero;
		$this->append = $append;
	}
}

Boot::registerClass(EitherK_Impl_::class, 'thx._Eithers.EitherK_Impl_');
