<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx
 */

namespace thx;

use \php\_Boot\HxAnon;
use \haxe\ds\Option;
use \thx\_Tuple\Tuple5_Impl_;
use \php\Boot;
use \haxe\Exception;
use \thx\_Tuple\Tuple2_Impl_;
use \thx\_Tuple\Tuple6_Impl_;
use \thx\_Tuple\Tuple3_Impl_;
use \thx\_Nel\Nel_Impl_;
use \thx\_Tuple\Tuple4_Impl_;
use \thx\_Monoid\Monoid_Impl_;
use \thx\_Validation\Validation_Impl_;

/**
 * Extension methods for the `haxe.ds.Option` type.
 */
class Options {
	/**
	 * @param Option $option
	 * @param \Closure $f
	 * 
	 * @return bool
	 */
	public static function all ($option, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:233: lines 233-236
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:235: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:235: characters 18-22
			return $f($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:234: characters 15-19
			return true;
		}
	}

	/**
	 * Returns the first Some value, or None
	 * Alias for `orElse`, but intended for static use, and leads into alt3, alt4, alts, etc.
	 * 
	 * @param Option $a
	 * @param Option $b
	 * 
	 * @return Option
	 */
	public static function alt2 ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:326: lines 326-329
		if ($a->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:327: characters 16-17
			$r = $b;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:327: characters 20-21
			return $r;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:328: characters 10-11
			$l = $a;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:328: characters 17-18
			return $l;
		}
	}

	/**
	 * Returns the first Some value, or None
	 * 
	 * @param Option $a
	 * @param Option $b
	 * @param Option $c
	 * 
	 * @return Option
	 */
	public static function alt3 ($a, $b, $c) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:336: characters 10-29
		$a1 = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:336: characters 15-25
		if ($a->index === 1) {
			$r = $b;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:336: characters 10-29
			$a1 = $r;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:336: characters 15-25
			$l = $a;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:336: characters 10-29
			$a1 = $l;
		}
		if ($a1->index === 1) {
			$r = $c;
			return $r;
		} else {
			$l = $a1;
			return $l;
		}
	}

	/**
	 * Returns the first Some value, or None
	 * 
	 * @param Option $a
	 * @param Option $b
	 * @param Option $c
	 * @param Option $d
	 * 
	 * @return Option
	 */
	public static function alt4 ($a, $b, $c, $d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:343: characters 15-28
		$a1 = null;
		if ($a->index === 1) {
			$r = $b;
			$a1 = $r;
		} else {
			$l = $a;
			$a1 = $l;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:343: characters 10-32
		$a = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:343: characters 15-28
		if ($a1->index === 1) {
			$r = $c;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:343: characters 10-32
			$a = $r;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:343: characters 15-28
			$l = $a1;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:343: characters 10-32
			$a = $l;
		}
		if ($a->index === 1) {
			$r = $d;
			return $r;
		} else {
			$l = $a;
			return $l;
		}
	}

	/**
	 * Returns the first Some value, or None
	 * 
	 * @param Option[]|\Array_hx $as
	 * 
	 * @return Option
	 */
	public static function alts ($as) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:350: characters 3-39
		return Arrays::reduce($as, Boot::getStaticClosure(Options::class, 'alt2'), Option::None());
	}

	/**
	 * Returns the result of the first function that produces a `Some` value, or `None`
	 * 
	 * @param \Closure[]|\Array_hx $fs
	 * 
	 * @return Option
	 */
	public static function altsF ($fs) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:357: characters 3-42
		return Arrays::reduce($fs, Boot::getStaticClosure(Options::class, 'orElseF'), Option::None());
	}

	/**
	 * @param Option $option
	 * @param \Closure $f
	 * 
	 * @return bool
	 */
	public static function any ($option, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:239: lines 239-242
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:241: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:241: characters 18-22
			return $f($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:240: characters 15-20
			return false;
		}
	}

	/**
	 * `ap` transforms a value contained in `Option<T>` to `Option<TOut>` using a `callback`
	 * wrapped in another Option.
	 * 
	 * @param Option $option
	 * @param Option $fopt
	 * 
	 * @return Option
	 */
	public static function ap ($option, $fopt) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:56: lines 56-59
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:58: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:58: characters 18-52
			return Options::map($fopt, function ($f) use (&$v) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:58: characters 40-51
				return $f($v);
			});
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:57: characters 15-19
			return Option::None();
		}
	}

	/**
	 * @param \Closure $f
	 * @param Option $v1
	 * @param Option $v2
	 * 
	 * @return Option
	 */
	public static function ap2 ($f, $v1, $v2) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:361: characters 3-46
		return Options::ap($v2, Options::map($v1, Functions2::curry($f)));
	}

	/**
	 * @param \Closure $f
	 * @param Option $v1
	 * @param Option $v2
	 * @param Option $v3
	 * 
	 * @return Option
	 */
	public static function ap3 ($f, $v1, $v2, $v3) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:364: characters 21-40
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:364: characters 3-50
		return Options::ap($v3, Options::ap($v2, Options::map($v1, Functions2::curry(function ($a, $b) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:364: characters 21-40
			return function ($c) use (&$f1, &$b, &$a) {
				return $f1($a, $b, $c);
			};
		}))));
	}

	/**
	 * @param \Closure $f
	 * @param Option $v1
	 * @param Option $v2
	 * @param Option $v3
	 * @param Option $v4
	 * 
	 * @return Option
	 */
	public static function ap4 ($f, $v1, $v2, $v3, $v4) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:367: characters 21-40
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:367: characters 17-53
		$f = function ($a, $b, $c) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:367: characters 21-40
			return function ($d) use (&$f1, &$c, &$b, &$a) {
				return $f1($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:367: characters 3-54
		return Options::ap($v4, Options::ap($v3, Options::ap($v2, Options::map($v1, Functions2::curry(function ($a, $b) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:367: characters 17-53
			return function ($c) use (&$f, &$b, &$a) {
				return $f($a, $b, $c);
			};
		})))));
	}

	/**
	 * @param \Closure $f
	 * @param Option $v1
	 * @param Option $v2
	 * @param Option $v3
	 * @param Option $v4
	 * @param Option $v5
	 * 
	 * @return Option
	 */
	public static function ap5 ($f, $v1, $v2, $v3, $v4, $v5) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:370: characters 21-40
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:370: characters 17-57
		$f = function ($a, $b, $c, $d) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:370: characters 21-40
			return function ($e) use (&$f1, &$c, &$b, &$d, &$a) {
				return $f1($a, $b, $c, $d, $e);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:370: characters 17-57
		$f2 = function ($a, $b, $c) use (&$f) {
			return function ($d) use (&$f, &$c, &$b, &$a) {
				return $f($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:370: characters 3-58
		return Options::ap($v5, Options::ap($v4, Options::ap($v3, Options::ap($v2, Options::map($v1, Functions2::curry(function ($a, $b) use (&$f2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:370: characters 17-57
			return function ($c) use (&$f2, &$b, &$a) {
				return $f2($a, $b, $c);
			};
		}))))));
	}

	/**
	 * @param \Closure $f
	 * @param Option $v1
	 * @param Option $v2
	 * @param Option $v3
	 * @param Option $v4
	 * @param Option $v5
	 * @param Option $v6
	 * 
	 * @return Option
	 */
	public static function ap6 ($f, $v1, $v2, $v3, $v4, $v5, $v6) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:374: characters 21-40
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:374: characters 17-61
		$f = function ($a, $b, $c, $d, $e) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:374: characters 21-40
			return function ($f0) use (&$f1, &$c, &$e, &$b, &$d, &$a) {
				return $f1($a, $b, $c, $d, $e, $f0);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:374: characters 17-61
		$f2 = function ($a, $b, $c, $d) use (&$f) {
			return function ($e) use (&$f, &$c, &$b, &$d, &$a) {
				return $f($a, $b, $c, $d, $e);
			};
		};
		$f3 = function ($a, $b, $c) use (&$f2) {
			return function ($d) use (&$f2, &$c, &$b, &$a) {
				return $f2($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:374: characters 3-62
		return Options::ap($v6, Options::ap($v5, Options::ap($v4, Options::ap($v3, Options::ap($v2, Options::map($v1, Functions2::curry(function ($a, $b) use (&$f3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:374: characters 17-61
			return function ($c) use (&$f3, &$b, &$a) {
				return $f3($a, $b, $c);
			};
		})))))));
	}

	/**
	 * @param \Closure $f
	 * @param Option $v1
	 * @param Option $v2
	 * @param Option $v3
	 * @param Option $v4
	 * @param Option $v5
	 * @param Option $v6
	 * @param Option $v7
	 * 
	 * @return Option
	 */
	public static function ap7 ($f, $v1, $v2, $v3, $v4, $v5, $v6, $v7) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:378: characters 21-40
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:378: characters 17-65
		$f = function ($a, $b, $c, $d, $e, $f0) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:378: characters 21-40
			return function ($g) use (&$f1, &$c, &$e, &$f0, &$b, &$d, &$a) {
				return $f1($a, $b, $c, $d, $e, $f0, $g);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:378: characters 17-65
		$f2 = function ($a, $b, $c, $d, $e) use (&$f) {
			return function ($f0) use (&$f, &$c, &$e, &$b, &$d, &$a) {
				return $f($a, $b, $c, $d, $e, $f0);
			};
		};
		$f3 = function ($a, $b, $c, $d) use (&$f2) {
			return function ($e) use (&$f2, &$c, &$b, &$d, &$a) {
				return $f2($a, $b, $c, $d, $e);
			};
		};
		$f4 = function ($a, $b, $c) use (&$f3) {
			return function ($d) use (&$f3, &$c, &$b, &$a) {
				return $f3($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:378: characters 3-66
		return Options::ap($v7, Options::ap($v6, Options::ap($v5, Options::ap($v4, Options::ap($v3, Options::ap($v2, Options::map($v1, Functions2::curry(function ($a, $b) use (&$f4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:378: characters 17-65
			return function ($c) use (&$f4, &$b, &$a) {
				return $f4($a, $b, $c);
			};
		}))))))));
	}

	/**
	 * @param \Closure $f
	 * @param Option $v1
	 * @param Option $v2
	 * @param Option $v3
	 * @param Option $v4
	 * @param Option $v5
	 * @param Option $v6
	 * @param Option $v7
	 * @param Option $v8
	 * 
	 * @return Option
	 */
	public static function ap8 ($f, $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:382: characters 21-40
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:382: characters 17-69
		$f = function ($a, $b, $c, $d, $e, $f0, $g) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:382: characters 21-40
			return function ($h) use (&$f1, &$g, &$c, &$e, &$f0, &$b, &$d, &$a) {
				return $f1($a, $b, $c, $d, $e, $f0, $g, $h);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:382: characters 17-69
		$f2 = function ($a, $b, $c, $d, $e, $f0) use (&$f) {
			return function ($g) use (&$f, &$c, &$e, &$f0, &$b, &$d, &$a) {
				return $f($a, $b, $c, $d, $e, $f0, $g);
			};
		};
		$f3 = function ($a, $b, $c, $d, $e) use (&$f2) {
			return function ($f0) use (&$f2, &$c, &$e, &$b, &$d, &$a) {
				return $f2($a, $b, $c, $d, $e, $f0);
			};
		};
		$f4 = function ($a, $b, $c, $d) use (&$f3) {
			return function ($e) use (&$f3, &$c, &$b, &$d, &$a) {
				return $f3($a, $b, $c, $d, $e);
			};
		};
		$f5 = function ($a, $b, $c) use (&$f4) {
			return function ($d) use (&$c, &$f4, &$b, &$a) {
				return $f4($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:382: characters 3-70
		return Options::ap($v8, Options::ap($v7, Options::ap($v6, Options::ap($v5, Options::ap($v4, Options::ap($v3, Options::ap($v2, Options::map($v1, Functions2::curry(function ($a, $b) use (&$f5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:382: characters 17-69
			return function ($c) use (&$f5, &$b, &$a) {
				return $f5($a, $b, $c);
			};
		})))))))));
	}

	/**
	 * `cata` the option catamorphism, useful for inline deconstruction.
	 * 
	 * @param Option $option
	 * @param mixed $ifNone
	 * @param \Closure $f
	 * 
	 * @return mixed
	 */
	public static function cata ($option, $ifNone, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:83: lines 83-86
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:85: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:85: characters 18-22
			return $f($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:84: characters 15-21
			return $ifNone;
		}
	}

	/**
	 * Lazy version of `thx.Options.cata`
	 * 
	 * @param Option $option
	 * @param \Closure $ifNone
	 * @param \Closure $f
	 * 
	 * @return mixed
	 */
	public static function cataf ($option, $ifNone, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:92: lines 92-95
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:94: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:94: characters 18-22
			return $f($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:93: characters 15-23
			return $ifNone();
		}
	}

	/**
	 * @param Option $a
	 * @param Option $b
	 * 
	 * @return Option
	 */
	public static function combine ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:385: characters 3-30
		return Options::ap($b, Options::map($a, Functions2::curry(Boot::getStaticClosure(Tuple2_Impl_::class, 'of'))));
	}

	/**
	 * @param Option $a
	 * @param Option $b
	 * 
	 * @return Option
	 */
	public static function combine2 ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:388: characters 3-23
		return Options::ap($b, Options::map($a, Functions2::curry(Boot::getStaticClosure(Tuple2_Impl_::class, 'of'))));
	}

	/**
	 * @param Option $a
	 * @param Option $b
	 * @param Option $c
	 * 
	 * @return Option
	 */
	public static function combine3 ($a, $b, $c) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:391: characters 10-33
		$f = Boot::getStaticClosure(Tuple3_Impl_::class, 'of');
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:391: characters 3-33
		return Options::ap($c, Options::ap($b, Options::map($a, Functions2::curry(function ($a, $b) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:391: characters 10-33
			return function ($c) use (&$f, &$b, &$a) {
				return $f($a, $b, $c);
			};
		}))));
	}

	/**
	 * @param Option $a
	 * @param Option $b
	 * @param Option $c
	 * @param Option $d
	 * 
	 * @return Option
	 */
	public static function combine4 ($a, $b, $c, $d) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:394: characters 10-36
		$f = Boot::getStaticClosure(Tuple4_Impl_::class, 'of');
		$f1 = function ($a, $b, $c) use (&$f) {
			return function ($d) use (&$f, &$c, &$b, &$a) {
				return $f($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:394: characters 3-36
		return Options::ap($d, Options::ap($c, Options::ap($b, Options::map($a, Functions2::curry(function ($a, $b) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:394: characters 10-36
			return function ($c) use (&$f1, &$b, &$a) {
				return $f1($a, $b, $c);
			};
		})))));
	}

	/**
	 * @param Option $a
	 * @param Option $b
	 * @param Option $c
	 * @param Option $d
	 * @param Option $e
	 * 
	 * @return Option
	 */
	public static function combine5 ($a, $b, $c, $d, $e) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:397: characters 10-39
		$f = Boot::getStaticClosure(Tuple5_Impl_::class, 'of');
		$f1 = function ($a, $b, $c, $d) use (&$f) {
			return function ($e) use (&$f, &$c, &$b, &$d, &$a) {
				return $f($a, $b, $c, $d, $e);
			};
		};
		$f2 = function ($a, $b, $c) use (&$f1) {
			return function ($d) use (&$f1, &$c, &$b, &$a) {
				return $f1($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:397: characters 3-39
		return Options::ap($e, Options::ap($d, Options::ap($c, Options::ap($b, Options::map($a, Functions2::curry(function ($a, $b) use (&$f2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:397: characters 10-39
			return function ($c) use (&$f2, &$b, &$a) {
				return $f2($a, $b, $c);
			};
		}))))));
	}

	/**
	 * @param Option $a
	 * @param Option $b
	 * @param Option $c
	 * @param Option $d
	 * @param Option $e
	 * @param Option $f
	 * 
	 * @return Option
	 */
	public static function combine6 ($a, $b, $c, $d, $e, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:401: characters 10-42
		$f1 = Boot::getStaticClosure(Tuple6_Impl_::class, 'of');
		$f2 = function ($a, $b, $c, $d, $e) use (&$f1) {
			return function ($f0) use (&$f1, &$c, &$e, &$b, &$d, &$a) {
				return $f1($a, $b, $c, $d, $e, $f0);
			};
		};
		$f3 = function ($a, $b, $c, $d) use (&$f2) {
			return function ($e) use (&$f2, &$c, &$b, &$d, &$a) {
				return $f2($a, $b, $c, $d, $e);
			};
		};
		$f4 = function ($a, $b, $c) use (&$f3) {
			return function ($d) use (&$f3, &$c, &$b, &$a) {
				return $f3($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:401: characters 3-42
		return Options::ap($f, Options::ap($e, Options::ap($d, Options::ap($c, Options::ap($b, Options::map($a, Functions2::curry(function ($a, $b) use (&$f4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:401: characters 10-42
			return function ($c) use (&$f4, &$b, &$a) {
				return $f4($a, $b, $c);
			};
		})))))));
	}

	/**
	 * Performs `f` on the contents of `o` if `o` != None
	 * 
	 * @param Option $o
	 * @param \Closure $f
	 * 
	 * @return Option
	 */
	public static function each ($o, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:313: lines 313-318
		$__hx__switch = ($o->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:315: characters 14-15
			$v = $o->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:316: characters 5-9
			$f($v);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:317: characters 5-6
			return $o;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:314: characters 15-16
			return $o;
		}
	}

	/**
	 * Equality function to campare two `Option` values of the same type. An optional equality
	 * function can be provided if values inside `Some` should be compared using something
	 * different than strict equality.
	 * 
	 * @param Option $a
	 * @param Option $b
	 * @param \Closure $eq
	 * 
	 * @return bool
	 */
	public static function equals ($a, $b, $eq = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:24: lines 24-32
		$__hx__switch = ($a->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:24: characters 21-22
			if ($b->index === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:26: characters 24-25
				$b1 = $b->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:26: characters 15-16
				$a1 = $a->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:27: lines 27-28
				if (null === $eq) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:28: characters 6-39
					$eq = function ($a, $b) {
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:28: characters 26-39
						return Boot::equal($a, $b);
					};
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:29: characters 5-13
				return $eq($a1, $b1);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:31: characters 5-10
				return false;
			}
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:24: characters 21-22
			if ($b->index === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:25: characters 23-27
				return true;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:31: characters 5-10
				return false;
			}
		}
	}

	/**
	 * `equalsValue` compares an `Option<T>` with a value `T`. The logic adopted to compare
	 * values is the same as in `Options.equals()`.
	 * 
	 * @param Option $a
	 * @param mixed $b
	 * @param \Closure $eq
	 * 
	 * @return bool
	 */
	public static function equalsValue ($a, $b, $eq = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:39: characters 3-36
		return Options::equals($a, (null === $b ? Option::None() : Option::Some($b)), $eq);
	}

	/**
	 * `filter` returns the current value if any contained value matches the predicate, None otherwise.
	 * 
	 * @param Option $option
	 * @param \Closure $f
	 * 
	 * @return Option
	 */
	public static function filter ($option, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:125: lines 125-128
		if ($option->index === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:126: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:126: lines 126-127
			if ($f($v)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:126: characters 28-34
				return $option;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:127: characters 12-16
				return Option::None();
			}
		} else {
			return Option::None();
		}
	}

	/**
	 * `flatMap` is shortcut for `map(cb).join()`
	 * 
	 * @param Option $option
	 * @param \Closure $callback
	 * 
	 * @return Option
	 */
	public static function flatMap ($option, $callback) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:65: lines 65-68
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:67: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:67: characters 18-29
			return $callback($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:66: characters 15-19
			return Option::None();
		}
	}

	/**
	 * `foldLeft` reduce using an accumulating function and an initial value.
	 * 
	 * @param Option $option
	 * @param mixed $b
	 * @param \Closure $f
	 * 
	 * @return mixed
	 */
	public static function foldLeft ($option, $b, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:101: lines 101-104
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:103: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:103: characters 18-25
			return $f($b, $v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:102: characters 15-16
			return $b;
		}
	}

	/**
	 * Lazy version of `thx.Options.foldLeft`
	 * 
	 * @param Option $option
	 * @param \Closure $b
	 * @param \Closure $f
	 * 
	 * @return mixed
	 */
	public static function foldLeftf ($option, $b, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:110: lines 110-113
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:112: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:112: characters 18-27
			return $f($b(), $v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:111: characters 15-18
			return $b();
		}
	}

	/**
	 * Fold by mapping the contained value into some monoidal type and reducing with that monoid.
	 * 
	 * @param Option $option
	 * @param \Closure $f
	 * @param object $m
	 * 
	 * @return mixed
	 */
	public static function foldMap ($option, $f, $m) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:119: characters 43-51
		$_e = $m;
		$tmp = function ($a0, $a1) use (&$_e) {
			return Monoid_Impl_::append($_e, $a0, $a1);
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:119: characters 3-52
		return Options::foldLeft(Options::map($option, $f), Monoid_Impl_::get_zero($m), $tmp);
	}

	/**
	 * `toValue` extracts the value from `Option`. If the `Option` is `None`, `null` is returned.
	 * 
	 * @param Option $option
	 * 
	 * @return mixed
	 */
	public static function get ($option) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:173: lines 173-176
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:175: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:175: characters 18-19
			return $v;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:174: characters 15-19
			return null;
		}
	}

	/**
	 * `getOrElse` extracts the value from `Option`. If the `Option` is `None`, `alt` value is returned.
	 * 
	 * @param Option $option
	 * @param mixed $alt
	 * 
	 * @return mixed
	 */
	public static function getOrElse ($option, $alt) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:182: lines 182-185
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:184: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:184: characters 18-19
			return $v;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:183: characters 15-18
			return $alt;
		}
	}

	/**
	 * `getOrElseF` extracts the value from `Option`. If the `Option` is `None`, `alt` function is called to produce a default value..
	 * 
	 * @param Option $option
	 * @param \Closure $alt
	 * 
	 * @return mixed
	 */
	public static function getOrElseF ($option, $alt) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:191: lines 191-194
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:193: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:193: characters 18-19
			return $v;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:192: characters 15-20
			return $alt();
		}
	}

	/**
	 * Extract the value from `Option` or throw a thx.Error with the provided message.
	 * 
	 * @param Option $option
	 * @param string $msg
	 * @param object $posInfo
	 * 
	 * @return mixed
	 */
	public static function getOrFail ($option, $msg, $posInfo = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:212: characters 3-57
		return Options::getOrThrow($option, new Error($msg, null, $posInfo), new _HxAnon_Options0("thx/Options.hx", 212, "thx.Options", "getOrFail"));
	}

	/**
	 * Extract the value from `Option` or throw a thx.Error if the `Option` is `None`.
	 * 
	 * @param Option $option
	 * @param Error $err
	 * @param object $posInfo
	 * 
	 * @return mixed
	 */
	public static function getOrThrow ($option, $err = null, $posInfo = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:200: lines 200-201
		if (null === $err) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:201: characters 4-71
			$err = new Error("Could not extract value from option", null, $posInfo);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:202: lines 202-205
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:204: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:204: characters 18-19
			return $v;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:203: characters 15-20
			throw Exception::thrown($err);
		}
	}

	/**
	 * `isNone` determines whether the option is a None
	 * 
	 * @param Option $option
	 * 
	 * @return bool
	 */
	public static function isNone ($option) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:160: characters 3-25
		return !Options::toBool($option);
	}

	/**
	 * `join` collapses a nested option into a single optional value.
	 * 
	 * @param Option $option
	 * 
	 * @return Option
	 */
	public static function join ($option) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:74: lines 74-77
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:76: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:76: characters 18-19
			return $v;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:75: characters 15-19
			return Option::None();
		}
	}

	/**
	 * `map` transforms a value contained in `Option<T>` to `Option<TOut>` using a `callback`.
	 * `callback` is used only if `Option` is `Some(value)`.
	 * 
	 * @param Option $option
	 * @param \Closure $callback
	 * 
	 * @return Option
	 */
	public static function map ($option, $callback) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:46: lines 46-49
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:48: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:48: characters 18-35
			return Option::Some($callback($v));
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:47: characters 15-19
			return Option::None();
		}
	}

	/**
	 * @param mixed $value
	 * 
	 * @return Option
	 */
	public static function maybe ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:16: characters 10-44
		if (null === $value) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:16: characters 26-30
			return Option::None();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:16: characters 33-44
			return Option::Some($value);
		}
	}

	/**
	 * @param mixed $value
	 * 
	 * @return Option
	 */
	public static function ofValue ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:13: characters 10-44
		if (null === $value) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:13: characters 26-30
			return Option::None();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:13: characters 33-44
			return Option::Some($value);
		}
	}

	/**
	 * `orElse` returns `option` if it holds a value or `alt` otherwise.
	 * 
	 * @param Option $option
	 * @param Option $alt
	 * 
	 * @return Option
	 */
	public static function orElse ($option, $alt) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:218: lines 218-221
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:220: characters 14-15
			$_g = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:220: characters 18-24
			return $option;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:219: characters 15-18
			return $alt;
		}
	}

	/**
	 * `orElseF` returns `option` if it holds a value or calls `alt` to produce a default `Option<T>`.
	 * 
	 * @param Option $option
	 * @param \Closure $alt
	 * 
	 * @return Option
	 */
	public static function orElseF ($option, $alt) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:227: lines 227-230
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:229: characters 14-15
			$_g = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:229: characters 18-24
			return $option;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:228: characters 15-20
			return $alt();
		}
	}

	/**
	 * @param Option $v
	 * @param \Closure $f
	 * 
	 * @return Option
	 */
	public static function spread ($v, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:409: characters 10-23
		$f1 = $f;
		return Options::map($v, function ($t) use (&$f1) {
			return $f1($t->_0, $t->_1);
		});
	}

	/**
	 * @param Option $v
	 * @param \Closure $f
	 * 
	 * @return Option
	 */
	public static function spread2 ($v, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:404: lines 404-406
		return Options::map($v, function ($t) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:405: characters 4-24
			return $f($t->_0, $t->_1);
		});
	}

	/**
	 * @param Option $v
	 * @param \Closure $f
	 * 
	 * @return Option
	 */
	public static function spread3 ($v, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:412: lines 412-414
		return Options::map($v, function ($t) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:413: characters 4-30
			return $f($t->_0, $t->_1, $t->_2);
		});
	}

	/**
	 * @param Option $v
	 * @param \Closure $f
	 * 
	 * @return Option
	 */
	public static function spread4 ($v, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:417: lines 417-419
		return Options::map($v, function ($t) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:418: characters 4-36
			return $f($t->_0, $t->_1, $t->_2, $t->_3);
		});
	}

	/**
	 * @param Option $v
	 * @param \Closure $f
	 * 
	 * @return Option
	 */
	public static function spread5 ($v, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:422: lines 422-424
		return Options::map($v, function ($t) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:423: characters 4-42
			return $f($t->_0, $t->_1, $t->_2, $t->_3, $t->_4);
		});
	}

	/**
	 * @param Option $v
	 * @param \Closure $f
	 * 
	 * @return Option
	 */
	public static function spread6 ($v, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:427: lines 427-429
		return Options::map($v, function ($t) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:428: characters 4-48
			return $f($t->_0, $t->_1, $t->_2, $t->_3, $t->_4, $t->_5);
		});
	}

	/**
	 * `toArray` transforms an `Option<T>` value into an `Array<T>` value. The result array
	 * will be empty if `Option` is `None` or will contain one value otherwise.
	 * 
	 * @param Option $option
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function toArray ($option) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:135: lines 135-138
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:137: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:137: characters 18-21
			return \Array_hx::wrap([$v]);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:136: characters 15-17
			return new \Array_hx();
		}
	}

	/**
	 * `toBool` transforms an `Option` value into a boolean: `None` maps to `false`, and
	 * `Some(_)` to `true`. The value in `Some` has no play in the conversion.
	 * 
	 * @param Option $option
	 * 
	 * @return bool
	 */
	public static function toBool ($option) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:148: lines 148-151
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:150: characters 14-15
			$_g = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:150: characters 18-22
			return true;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:149: characters 15-20
			return false;
		}
	}

	/**
	 * @param Option $error
	 * @param mixed $value
	 * 
	 * @return Either
	 */
	public static function toFailure ($error, $value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:280: lines 280-283
		$__hx__switch = ($error->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:282: characters 14-15
			$e = $error->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:282: characters 18-39
			return Either::Left($e);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:281: characters 15-40
			return Either::Right($value);
		}
	}

	/**
	 * @param Option $error
	 * @param mixed $value
	 * 
	 * @return Either
	 */
	public static function toFailureNel ($error, $value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:286: lines 286-289
		$__hx__switch = ($error->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:288: characters 14-15
			$e = $error->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:288: characters 18-42
			return Either::Left(Nel_Impl_::pure($e));
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:287: characters 15-43
			return Either::Right($value);
		}
	}

	/**
	 * @param Option $opt
	 * @param \Closure $left
	 * 
	 * @return Either
	 */
	public static function toLazyRight ($opt, $left) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:298: lines 298-301
		$__hx__switch = ($opt->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:300: characters 14-15
			$r = $opt->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:300: characters 18-26
			return Either::Right($r);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:299: characters 15-27
			return Either::Left($left());
		}
	}

	/**
	 * @param Option $option
	 * @param \Closure $error
	 * 
	 * @return Either
	 */
	public static function toLazySuccess ($option, $error) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:262: lines 262-265
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:264: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:264: characters 18-39
			return Either::Right($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:263: characters 15-42
			return Either::Left($error());
		}
	}

	/**
	 * @param Option $option
	 * @param \Closure $error
	 * 
	 * @return Either
	 */
	public static function toLazySuccessNel ($option, $error) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:274: lines 274-277
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:276: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:276: characters 18-42
			return Either::Right($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:275: characters 15-45
			return Either::Left(Nel_Impl_::pure($error()));
		}
	}

	/**
	 * @param Option $opt
	 * @param mixed $right
	 * 
	 * @return Either
	 */
	public static function toLeft ($opt, $right) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:304: lines 304-307
		$__hx__switch = ($opt->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:306: characters 14-15
			$l = $opt->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:306: characters 18-25
			return Either::Left($l);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:305: characters 15-27
			return Either::Right($right);
		}
	}

	/**
	 * `toOption` transforms any type T into `Option<T>`. If the value is null, the result
	 * is be `None`.
	 * 
	 * @param mixed $value
	 * 
	 * @return Option
	 */
	public static function toOption ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:167: characters 10-44
		if (null === $value) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:167: characters 26-30
			return Option::None();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:167: characters 33-44
			return Option::Some($value);
		}
	}

	/**
	 * @param Option $opt
	 * @param mixed $left
	 * 
	 * @return Either
	 */
	public static function toRight ($opt, $left) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:292: lines 292-295
		$__hx__switch = ($opt->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:294: characters 14-15
			$r = $opt->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:294: characters 18-26
			return Either::Right($r);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:293: characters 15-25
			return Either::Left($left);
		}
	}

	/**
	 * @param Option $option
	 * @param mixed $error
	 * 
	 * @return Either
	 */
	public static function toSuccess ($option, $error) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:256: lines 256-259
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:258: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:258: characters 18-39
			return Either::Right($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:257: characters 15-40
			return Either::Left($error);
		}
	}

	/**
	 * @param Option $option
	 * @param mixed $error
	 * 
	 * @return Either
	 */
	public static function toSuccessNel ($option, $error) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:268: lines 268-271
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:270: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:270: characters 18-42
			return Either::Right($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:269: characters 15-43
			return Either::Left(Nel_Impl_::pure($error));
		}
	}

	/**
	 * Traverse the array with a function that may return values wrapped in Validation.
	 * If any of the values are Failures, return a Failure that accumulates all errors
	 * from the failed values, otherwise return the array of mapped values in a Success.
	 * 
	 * @param Option $option
	 * @param \Closure $f
	 * 
	 * @return Either
	 */
	public static function traverseValidation ($option, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:250: lines 250-253
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:251: characters 14-15
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:251: characters 18-54
			return Validation_Impl_::map($f($v), function ($v) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:251: characters 39-53
				return Option::Some($v);
			});
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Options.hx:252: characters 15-39
			return Either::Right(Option::None());
		}
	}
}

class _HxAnon_Options0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(Options::class, 'thx.Options');
