<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:213: characters 5-67
		return function ($a) use (&$f, &$this1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:213: characters 50-57
			$tmp = $this1($a);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:213: characters 59-66
			$_e = $f;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:213: characters 27-67
			return Eithers::flatMap($tmp, function ($a) use (&$_e) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:213: characters 59-66
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:225: characters 5-82
		return EitherK_Impl_::flatMap($this1, function ($r) use (&$e) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:225: characters 35-81
			return EitherK_Impl_::map($e, function ($f) use (&$r) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:225: characters 69-80
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:206: characters 31-45
		return $this1($a);
	}

	/**
	 * @param \Closure $this
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function compose ($this1, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:209: characters 5-70
		return function ($a0) use (&$f, &$this1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:209: characters 29-70
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:229: characters 5-95
		return function ($a) use (&$f, &$this1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:229: characters 27-95
			return Eithers::flatMap($this1($a), function ($r) use (&$f, &$a) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:229: characters 74-94
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:221: characters 20-35
		$fb = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:221: characters 5-36
		return EitherK_Impl_::flatMap($this1, function ($v) use (&$fb) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:221: characters 20-35
			return EitherK_Impl_::pure($fb($v));
		});
	}

	/**
	 * @return object
	 */
	public static function monoid () {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:233: lines 233-238
		return new _HxAnon_EitherK_Impl_0(function ($r) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:234: characters 29-44
			return Either::Right($r);
		}, function ($f0, $f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:236: characters 9-76
			return function ($r) use (&$f1, &$f0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:236: characters 54-65
				$tmp = EitherK_Impl_::apply($f0, $r);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:236: characters 67-75
				$_e = $f1;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:236: characters 31-76
				return Eithers::flatMap($tmp, function ($a) use (&$_e) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:236: characters 67-75
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:217: characters 5-42
		return function ($a) use (&$r) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:217: characters 27-42
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
