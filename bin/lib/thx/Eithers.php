<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx
 */

namespace thx;

use \php\_Boot\HxAnon;
use \haxe\ds\Option;
use \php\Boot;
use \haxe\Exception;
use \thx\_Nel\Nel_Impl_;
use \thx\_Monoid\Monoid_Impl_;

/**
 * Extension methods for the `thx.Either` type.
 */
class Eithers {
	/**
	 * `ap` transforms a value contained in `Either<E, RIn>` to `Either<E, ROut>` using a `callback`
	 * wrapped in the right side of another Either.
	 * 
	 * @param Either $either
	 * @param Either $fa
	 * 
	 * @return Either
	 */
	public static function ap ($either, $fa) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:81: lines 81-84
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:82: characters 17-18
			$l = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:82: characters 21-28
			return Either::Left($l);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:83: characters 18-19
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:83: characters 22-54
			return Eithers::map($fa, function ($f) use (&$v) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:83: characters 42-53
				return $f($v);
			});
		}
	}

	/**
	 * @param Either $either
	 * @param \Closure $l
	 * @param \Closure $r
	 * 
	 * @return Either
	 */
	public static function bimap ($either, $l, $r) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:121: lines 121-124
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:122: characters 17-19
			$l0 = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:122: characters 23-34
			return Either::Left($l($l0));
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:123: characters 18-20
			$r0 = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:123: characters 23-35
			return Either::Right($r($r0));
		}
	}

	/**
	 * @param Either $either
	 * @param \Closure $l
	 * @param \Closure $r
	 * 
	 * @return mixed
	 */
	public static function cata ($either, $l, $r) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:115: lines 115-118
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:116: characters 17-19
			$l0 = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:116: characters 23-28
			return $l($l0);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:117: characters 18-20
			$r0 = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:117: characters 23-28
			return $r($r0);
		}
	}

	/**
	 * @param Either $either
	 * @param \Closure $f
	 * 
	 * @return void
	 */
	public static function each ($either, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:169: lines 169-172
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:170: characters 17-18
			$l = $either->params[0];
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:171: characters 18-19
			$r = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:171: characters 22-26
			$f($r);
		}
	}

	/**
	 * @param Either $either
	 * @param \Closure $f
	 * 
	 * @return void
	 */
	public static function eachLeft ($either, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:176: lines 176-179
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:177: characters 17-18
			$l = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:177: characters 21-25
			$f($l);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:178: characters 18-19
			$r = $either->params[0];
		}
	}

	/**
	 * @param Either $either
	 * @param \Closure $p
	 * @param mixed $error
	 * 
	 * @return Either
	 */
	public static function ensure ($either, $p, $error) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:183: lines 183-186
		if ($either->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:184: characters 18-19
			$a = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:184: characters 22-55
			if ($p($a)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:184: characters 32-38
				return $either;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:184: characters 44-55
				return Either::Left($error);
			}
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:185: characters 15-21
			return $either;
		}
	}

	/**
	 * @param Either $either
	 * @param \Closure $p
	 * 
	 * @return bool
	 */
	public static function exists ($either, $p) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:190: lines 190-193
		if ($either->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:191: characters 18-19
			$a = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:191: characters 22-26
			return $p($a);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:192: characters 15-20
			return false;
		}
	}

	/**
	 * Maps an Either<L, RIn> to and Either<L, ROut>.
	 * 
	 * @param Either $either
	 * @param \Closure $f
	 * 
	 * @return Either
	 */
	public static function flatMap ($either, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:90: lines 90-93
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:91: characters 17-18
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:91: characters 22-29
			return Either::Left($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:92: characters 18-19
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:92: characters 23-27
			return $f($v);
		}
	}

	/**
	 * @param Either $either
	 * @param mixed $a
	 * @param \Closure $f
	 * 
	 * @return mixed
	 */
	public static function foldLeft ($either, $a, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:128: lines 128-131
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:129: characters 17-19
			$l0 = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:129: characters 23-24
			return $a;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:130: characters 18-20
			$r0 = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:130: characters 23-31
			return $f($a, $r0);
		}
	}

	/**
	 * Fold by mapping the contained value into some monoidal type and reducing with that monoid.
	 * 
	 * @param Either $either
	 * @param \Closure $f
	 * @param object $m
	 * 
	 * @return mixed
	 */
	public static function foldMap ($either, $f, $m) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:137: characters 45-53
		$_e = $m;
		$tmp = function ($a0, $a1) use (&$_e) {
			return Monoid_Impl_::append($_e, $a0, $a1);
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:137: characters 5-54
		return Eithers::foldLeft(Eithers::map($either, $f), Monoid_Impl_::get_zero($m), $tmp);
	}

	/**
	 * @param Either $either
	 * @param \Closure $p
	 * 
	 * @return bool
	 */
	public static function forall ($either, $p) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:197: lines 197-200
		if ($either->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:198: characters 18-19
			$a = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:198: characters 22-26
			return $p($a);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:199: characters 15-19
			return true;
		}
	}

	/**
	 * @param Either $e0
	 * @param mixed $v
	 * 
	 * @return mixed
	 */
	public static function getOrElse ($e0, $v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:141: lines 141-144
		$__hx__switch = ($e0->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:142: characters 17-18
			$_g = $e0->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:142: characters 22-23
			return $v;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:143: characters 18-19
			$v = $e0->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:143: characters 23-24
			return $v;
		}
	}

	/**
	 * @param Either $e0
	 * @param \Closure $f
	 * 
	 * @return mixed
	 */
	public static function getOrElseF ($e0, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:148: lines 148-151
		$__hx__switch = ($e0->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:149: characters 17-18
			$_g = $e0->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:149: characters 22-25
			return $f();
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:150: characters 18-19
			$v = $e0->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:150: characters 23-24
			return $v;
		}
	}

	/**
	 * Indicates if the either has a Left value
	 * 
	 * @param Either $either
	 * 
	 * @return bool
	 */
	public static function isLeft ($either) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:14: lines 14-17
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:15: characters 17-18
			$_g = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:15: characters 22-26
			return true;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:16: characters 18-19
			$_g = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:16: characters 22-27
			return false;
		}
	}

	/**
	 * Indicates if the either has a Right value
	 * 
	 * @param Either $either
	 * 
	 * @return bool
	 */
	public static function isRight ($either) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:24: lines 24-27
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:25: characters 17-18
			$_g = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:25: characters 22-27
			return false;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:26: characters 18-19
			$_g = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:26: characters 22-26
			return true;
		}
	}

	/**
	 * @param Either $either
	 * @param \Closure $f
	 * 
	 * @return Either
	 */
	public static function leftMap ($either, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:97: lines 97-100
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:98: characters 17-18
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:98: characters 22-32
			return Either::Left($f($v));
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:99: characters 18-19
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:99: characters 22-30
			return Either::Right($v);
		}
	}

	/**
	 * @param Either $either
	 * @param \Closure $f
	 * 
	 * @return Either
	 */
	public static function map ($either, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:71: lines 71-74
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:72: characters 17-18
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:72: characters 22-29
			return Either::Left($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:73: characters 18-19
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:73: characters 23-34
			return Either::Right($f($v));
		}
	}

	/**
	 * @param Either $e0
	 * @param Either $e1
	 * 
	 * @return Either
	 */
	public static function orElse ($e0, $e1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:155: lines 155-158
		if ($e0->index === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:156: characters 17-18
			$e = $e0->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:156: characters 21-23
			return $e1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:157: characters 12-13
			$r = $e0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:157: characters 15-16
			return $r;
		}
	}

	/**
	 * @param Either $e0
	 * @param \Closure $f
	 * 
	 * @return Either
	 */
	public static function orElseF ($e0, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:162: lines 162-165
		if ($e0->index === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:163: characters 17-18
			$e = $e0->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:163: characters 21-24
			return $f();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:164: characters 12-13
			$r = $e0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:164: characters 15-16
			return $r;
		}
	}

	/**
	 * @param Either $either
	 * @param string $message
	 * 
	 * @return mixed
	 */
	public static function orThrow ($either, $message) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:103: lines 103-106
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:104: characters 17-18
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:104: characters 43-55
			$tmp = "" . ($message??'null') . ": " . \Std::string($v);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:104: characters 22-27
			throw Exception::thrown(new Error($tmp, null, new _HxAnon_Eithers0("thx/Eithers.hx", 104, "thx.Eithers", "orThrow")));
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:105: characters 18-19
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:105: characters 22-23
			return $v;
		}
	}

	/**
	 * Converts the Either<L, R> to an Option<L> containing the Left value if Left, or None if Right.
	 * 
	 * @param Either $either
	 * 
	 * @return Option
	 */
	public static function toLeft ($either) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:34: lines 34-37
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:35: characters 17-18
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:35: characters 22-29
			return Option::Some($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:36: characters 18-19
			$_g = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:36: characters 23-27
			return Option::None();
		}
	}

	/**
	 * Extracts the left value if Left, or null if Right.
	 * 
	 * @param Either $either
	 * 
	 * @return mixed
	 */
	public static function toLeftUnsafe ($either) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:54: lines 54-57
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:55: characters 17-18
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:55: characters 22-23
			return $v;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:56: characters 18-19
			$_g = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:56: characters 23-27
			return null;
		}
	}

	/**
	 * Converts the Either<L, R> to an Option<R> containing the Right value if Right, or None if Left.
	 * 
	 * @param Either $either
	 * 
	 * @return Option
	 */
	public static function toRight ($either) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:44: lines 44-47
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:45: characters 17-18
			$_g = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:45: characters 22-26
			return Option::None();
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:46: characters 18-19
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:46: characters 23-30
			return Option::Some($v);
		}
	}

	/**
	 * Extracts the right value if Right, or null if Left.
	 * 
	 * @param Either $either
	 * 
	 * @return mixed
	 */
	public static function toRightUnsafe ($either) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:64: lines 64-67
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:65: characters 17-18
			$_g = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:65: characters 22-26
			return null;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:66: characters 18-19
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:66: characters 23-24
			return $v;
		}
	}

	/**
	 * @param Either $either
	 * 
	 * @return Either
	 */
	public static function toVNel ($either) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:112: characters 5-37
		return Eithers::leftMap($either, Boot::getStaticClosure(Nel_Impl_::class, 'pure'));
	}

	/**
	 * @param Either $either
	 * 
	 * @return Either
	 */
	public static function toValidation ($either) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Eithers.hx:109: characters 5-18
		return $either;
	}
}

class _HxAnon_Eithers0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(Eithers::class, 'thx.Eithers');
