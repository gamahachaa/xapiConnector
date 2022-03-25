<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:82: lines 82-85
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:83: characters 14-15
			$l = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:83: characters 18-25
			return Either::Left($l);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:84: characters 15-16
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:84: characters 19-51
			return Eithers::map($fa, function ($f) use (&$v) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:84: characters 39-50
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:122: lines 122-125
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:123: characters 14-16
			$l0 = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:123: characters 19-30
			return Either::Left($l($l0));
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:124: characters 15-17
			$r0 = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:124: characters 20-32
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:116: lines 116-119
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:117: characters 14-16
			$l0 = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:117: characters 19-24
			return $l($l0);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:118: characters 15-17
			$r0 = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:118: characters 20-25
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:170: lines 170-173
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:171: characters 14-15
			$l = $either->params[0];
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:172: characters 15-16
			$r = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:172: characters 19-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:177: lines 177-180
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:178: characters 14-15
			$l = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:178: characters 18-22
			$f($l);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:179: characters 15-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:184: lines 184-187
		if ($either->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:185: characters 15-16
			$a = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:185: characters 19-52
			if ($p($a)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:185: characters 29-35
				return $either;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:185: characters 41-52
				return Either::Left($error);
			}
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:186: characters 12-18
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:191: lines 191-194
		if ($either->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:192: characters 15-16
			$a = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:192: characters 19-23
			return $p($a);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:193: characters 12-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:91: lines 91-94
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:92: characters 14-15
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:92: characters 18-25
			return Either::Left($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:93: characters 15-16
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:93: characters 19-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:129: lines 129-132
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:130: characters 14-16
			$l0 = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:130: characters 19-20
			return $a;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:131: characters 15-17
			$r0 = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:131: characters 20-28
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:138: characters 43-51
		$_e = $m;
		$tmp = function ($a0, $a1) use (&$_e) {
			return Monoid_Impl_::append($_e, $a0, $a1);
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:138: characters 3-52
		return Eithers::foldLeft(Eithers::map($either, $f), Monoid_Impl_::get_zero($m), $tmp);
	}

	/**
	 * @param Either $either
	 * @param \Closure $p
	 * 
	 * @return bool
	 */
	public static function forall ($either, $p) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:198: lines 198-201
		if ($either->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:199: characters 15-16
			$a = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:199: characters 19-23
			return $p($a);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:200: characters 12-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:142: lines 142-145
		$__hx__switch = ($e0->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:143: characters 14-15
			$_g = $e0->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:143: characters 18-19
			return $v;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:144: characters 15-16
			$v = $e0->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:144: characters 19-20
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:149: lines 149-152
		$__hx__switch = ($e0->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:150: characters 14-15
			$_g = $e0->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:150: characters 18-21
			return $f();
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:151: characters 15-16
			$v = $e0->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:151: characters 19-20
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:15: lines 15-18
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:16: characters 14-15
			$_g = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:16: characters 18-22
			return true;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:17: characters 15-16
			$_g = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:17: characters 19-24
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:25: lines 25-28
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:26: characters 14-15
			$_g = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:26: characters 18-23
			return false;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:27: characters 15-16
			$_g = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:27: characters 19-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:98: lines 98-101
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:99: characters 14-15
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:99: characters 18-28
			return Either::Left($f($v));
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:100: characters 15-16
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:100: characters 19-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:72: lines 72-75
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:73: characters 14-15
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:73: characters 18-25
			return Either::Left($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:74: characters 15-16
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:74: characters 19-30
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:156: lines 156-159
		if ($e0->index === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:157: characters 14-15
			$e = $e0->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:157: characters 18-20
			return $e1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:158: characters 9-10
			$r = $e0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:158: characters 12-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:163: lines 163-166
		if ($e0->index === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:164: characters 14-15
			$e = $e0->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:164: characters 18-21
			return $f();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:165: characters 9-10
			$r = $e0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:165: characters 12-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:104: lines 104-107
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:105: characters 14-15
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:105: characters 39-51
			$tmp = "" . ($message??'null') . ": " . \Std::string($v);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:105: characters 18-23
			throw Exception::thrown(new Error($tmp, null, new _HxAnon_Eithers0("thx/Eithers.hx", 105, "thx.Eithers", "orThrow")));
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:106: characters 15-16
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:106: characters 19-20
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:35: lines 35-38
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:36: characters 14-15
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:36: characters 18-25
			return Option::Some($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:37: characters 15-16
			$_g = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:37: characters 19-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:55: lines 55-58
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:56: characters 14-15
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:56: characters 18-19
			return $v;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:57: characters 15-16
			$_g = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:57: characters 19-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:45: lines 45-48
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:46: characters 14-15
			$_g = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:46: characters 18-22
			return Option::None();
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:47: characters 15-16
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:47: characters 19-26
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:65: lines 65-68
		$__hx__switch = ($either->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:66: characters 14-15
			$_g = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:66: characters 18-22
			return null;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:67: characters 15-16
			$v = $either->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:67: characters 19-20
			return $v;
		}
	}

	/**
	 * @param Either $either
	 * 
	 * @return Either
	 */
	public static function toVNel ($either) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:113: characters 3-35
		return Eithers::leftMap($either, Boot::getStaticClosure(Nel_Impl_::class, 'pure'));
	}

	/**
	 * @param Either $either
	 * 
	 * @return Either
	 */
	public static function toValidation ($either) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Eithers.hx:110: characters 3-16
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
