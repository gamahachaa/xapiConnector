<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:229: lines 229-232
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:231: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:231: characters 21-25
			return $f($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:230: characters 18-22
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:320: lines 320-323
		if ($a->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:321: characters 19-20
			$r = $b;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:321: characters 24-25
			return $r;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:322: characters 13-14
			$l = $a;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:322: characters 21-22
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:330: characters 12-31
		$a1 = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:330: characters 17-27
		if ($a->index === 1) {
			$r = $b;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:330: characters 12-31
			$a1 = $r;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:330: characters 17-27
			$l = $a;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:330: characters 12-31
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:337: characters 17-30
		$a1 = null;
		if ($a->index === 1) {
			$r = $b;
			$a1 = $r;
		} else {
			$l = $a;
			$a1 = $l;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:337: characters 12-34
		$a = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:337: characters 17-30
		if ($a1->index === 1) {
			$r = $c;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:337: characters 12-34
			$a = $r;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:337: characters 17-30
			$l = $a1;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:337: characters 12-34
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:344: characters 5-41
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:351: characters 5-44
		return Arrays::reduce($fs, Boot::getStaticClosure(Options::class, 'orElseF'), Option::None());
	}

	/**
	 * @param Option $option
	 * @param \Closure $f
	 * 
	 * @return bool
	 */
	public static function any ($option, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:235: lines 235-238
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:237: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:237: characters 21-25
			return $f($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:236: characters 18-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:56: lines 56-59
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:58: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:58: characters 21-55
			return Options::map($fopt, function ($f) use (&$v) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:58: characters 43-54
				return $f($v);
			});
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:57: characters 18-22
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:355: characters 5-48
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:358: characters 23-42
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:358: characters 5-52
		return Options::ap($v3, Options::ap($v2, Options::map($v1, Functions2::curry(function ($a, $b) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:358: characters 23-42
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:363: characters 23-42
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:363: characters 19-55
		$f = function ($a, $b, $c) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:363: characters 23-42
			return function ($d) use (&$f1, &$c, &$b, &$a) {
				return $f1($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:363: characters 5-56
		return Options::ap($v4, Options::ap($v3, Options::ap($v2, Options::map($v1, Functions2::curry(function ($a, $b) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:363: characters 19-55
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:368: characters 23-42
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:368: characters 19-59
		$f = function ($a, $b, $c, $d) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:368: characters 23-42
			return function ($e) use (&$f1, &$c, &$b, &$d, &$a) {
				return $f1($a, $b, $c, $d, $e);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:368: characters 19-59
		$f2 = function ($a, $b, $c) use (&$f) {
			return function ($d) use (&$f, &$c, &$b, &$a) {
				return $f($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:368: characters 5-60
		return Options::ap($v5, Options::ap($v4, Options::ap($v3, Options::ap($v2, Options::map($v1, Functions2::curry(function ($a, $b) use (&$f2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:368: characters 19-59
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:373: characters 23-42
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:373: characters 19-63
		$f = function ($a, $b, $c, $d, $e) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:373: characters 23-42
			return function ($f0) use (&$f1, &$c, &$e, &$b, &$d, &$a) {
				return $f1($a, $b, $c, $d, $e, $f0);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:373: characters 19-63
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:373: characters 5-64
		return Options::ap($v6, Options::ap($v5, Options::ap($v4, Options::ap($v3, Options::ap($v2, Options::map($v1, Functions2::curry(function ($a, $b) use (&$f3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:373: characters 19-63
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:378: characters 23-42
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:378: characters 19-67
		$f = function ($a, $b, $c, $d, $e, $f0) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:378: characters 23-42
			return function ($g) use (&$f1, &$c, &$e, &$f0, &$b, &$d, &$a) {
				return $f1($a, $b, $c, $d, $e, $f0, $g);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:378: characters 19-67
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:378: characters 5-68
		return Options::ap($v7, Options::ap($v6, Options::ap($v5, Options::ap($v4, Options::ap($v3, Options::ap($v2, Options::map($v1, Functions2::curry(function ($a, $b) use (&$f4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:378: characters 19-67
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:383: characters 23-42
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:383: characters 19-71
		$f = function ($a, $b, $c, $d, $e, $f0, $g) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:383: characters 23-42
			return function ($h) use (&$f1, &$g, &$c, &$e, &$f0, &$b, &$d, &$a) {
				return $f1($a, $b, $c, $d, $e, $f0, $g, $h);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:383: characters 19-71
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:383: characters 5-72
		return Options::ap($v8, Options::ap($v7, Options::ap($v6, Options::ap($v5, Options::ap($v4, Options::ap($v3, Options::ap($v2, Options::map($v1, Functions2::curry(function ($a, $b) use (&$f5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:383: characters 19-71
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:83: lines 83-86
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:85: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:85: characters 21-25
			return $f($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:84: characters 18-24
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:92: lines 92-95
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:94: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:94: characters 22-26
			return $f($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:93: characters 18-26
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:386: characters 5-32
		return Options::ap($b, Options::map($a, Functions2::curry(Boot::getStaticClosure(Tuple2_Impl_::class, 'of'))));
	}

	/**
	 * @param Option $a
	 * @param Option $b
	 * 
	 * @return Option
	 */
	public static function combine2 ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:389: characters 5-25
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:392: characters 12-35
		$f = Boot::getStaticClosure(Tuple3_Impl_::class, 'of');
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:392: characters 5-35
		return Options::ap($c, Options::ap($b, Options::map($a, Functions2::curry(function ($a, $b) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:392: characters 12-35
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:395: characters 12-38
		$f = Boot::getStaticClosure(Tuple4_Impl_::class, 'of');
		$f1 = function ($a, $b, $c) use (&$f) {
			return function ($d) use (&$f, &$c, &$b, &$a) {
				return $f($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:395: characters 5-38
		return Options::ap($d, Options::ap($c, Options::ap($b, Options::map($a, Functions2::curry(function ($a, $b) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:395: characters 12-38
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:398: characters 12-41
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:398: characters 5-41
		return Options::ap($e, Options::ap($d, Options::ap($c, Options::ap($b, Options::map($a, Functions2::curry(function ($a, $b) use (&$f2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:398: characters 12-41
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:401: characters 12-44
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:401: characters 5-44
		return Options::ap($f, Options::ap($e, Options::ap($d, Options::ap($c, Options::ap($b, Options::map($a, Functions2::curry(function ($a, $b) use (&$f4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:401: characters 12-44
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:309: lines 309-312
		$__hx__switch = ($o->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:311: characters 17-18
			$v = $o->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:311: characters 23-27
			$f($v);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:311: characters 29-30
			return $o;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:310: characters 23-24
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:24: lines 24-32
		$__hx__switch = ($a->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:24: characters 23-24
			if ($b->index === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:26: characters 27-28
				$b1 = $b->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:26: characters 18-19
				$a1 = $a->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:27: lines 27-28
				if (null === $eq) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:28: characters 11-44
					$eq = function ($a, $b) {
						#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:28: characters 31-44
						return Boot::equal($a, $b);
					};
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:29: characters 9-16
				return $eq($a1, $b1);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:31: characters 9-14
				return false;
			}
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:24: characters 23-24
			if ($b->index === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:25: characters 26-30
				return true;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:31: characters 9-14
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:39: characters 5-38
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:126: lines 126-129
		if ($option->index === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:127: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:127: lines 127-128
			if ($f($v)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:127: characters 31-37
				return $option;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:128: characters 15-19
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:65: lines 65-68
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:67: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:67: characters 21-32
			return $callback($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:66: characters 18-22
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:102: lines 102-105
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:104: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:104: characters 21-28
			return $f($b, $v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:103: characters 18-19
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:111: lines 111-114
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:113: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:113: characters 22-31
			return $f($b(), $v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:112: characters 18-21
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:120: characters 45-53
		$_e = $m;
		$tmp = function ($a0, $a1) use (&$_e) {
			return Monoid_Impl_::append($_e, $a0, $a1);
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:120: characters 5-54
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:170: lines 170-173
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:172: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:172: characters 22-23
			return $v;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:171: characters 18-22
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:179: lines 179-182
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:181: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:181: characters 22-23
			return $v;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:180: characters 18-21
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:188: lines 188-191
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:190: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:190: characters 22-23
			return $v;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:189: characters 18-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:208: characters 5-59
		return Options::getOrThrow($option, new Error($msg, null, $posInfo), new _HxAnon_Options0("thx/Options.hx", 208, "thx.Options", "getOrFail"));
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:197: characters 5-88
		if (null === $err) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:197: characters 21-88
			$err = new Error("Could not extract value from option", null, $posInfo);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:198: lines 198-201
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:200: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:200: characters 21-22
			return $v;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:199: characters 18-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:157: characters 5-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:74: lines 74-77
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:76: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:76: characters 21-22
			return $v;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:75: characters 18-22
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:46: lines 46-49
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:48: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:48: characters 21-38
			return Option::Some($callback($v));
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:47: characters 18-22
			return Option::None();
		}
	}

	/**
	 * @param mixed $value
	 * 
	 * @return Option
	 */
	public static function maybe ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:16: characters 12-46
		if (null === $value) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:16: characters 28-32
			return Option::None();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:16: characters 35-46
			return Option::Some($value);
		}
	}

	/**
	 * @param mixed $value
	 * 
	 * @return Option
	 */
	public static function ofValue ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:13: characters 12-46
		if (null === $value) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:13: characters 28-32
			return Option::None();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:13: characters 35-46
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:214: lines 214-217
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:216: characters 17-18
			$_g = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:216: characters 22-28
			return $option;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:215: characters 18-21
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:223: lines 223-226
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:225: characters 17-18
			$_g = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:225: characters 22-28
			return $option;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:224: characters 18-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:409: characters 12-25
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:404: lines 404-406
		return Options::map($v, function ($t) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:405: characters 7-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:412: lines 412-414
		return Options::map($v, function ($t) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:413: characters 7-33
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:417: lines 417-419
		return Options::map($v, function ($t) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:418: characters 7-39
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:422: lines 422-424
		return Options::map($v, function ($t) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:423: characters 7-45
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:427: lines 427-429
		return Options::map($v, function ($t) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:428: characters 7-51
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:136: lines 136-139
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:138: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:138: characters 22-25
			return \Array_hx::wrap([$v]);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:137: characters 18-20
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:147: lines 147-150
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:149: characters 17-18
			$_g = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:149: characters 22-26
			return true;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:148: characters 18-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:276: lines 276-279
		$__hx__switch = ($error->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:278: characters 17-18
			$e = $error->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:278: characters 21-42
			return Either::Left($e);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:277: characters 18-43
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:282: lines 282-285
		$__hx__switch = ($error->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:284: characters 17-18
			$e = $error->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:284: characters 21-45
			return Either::Left(Nel_Impl_::pure($e));
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:283: characters 18-46
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:294: lines 294-297
		$__hx__switch = ($opt->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:296: characters 17-18
			$r = $opt->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:296: characters 21-29
			return Either::Right($r);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:295: characters 18-30
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:258: lines 258-261
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:260: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:260: characters 21-42
			return Either::Right($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:259: characters 18-45
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:270: lines 270-273
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:272: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:272: characters 21-45
			return Either::Right($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:271: characters 18-48
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:300: lines 300-303
		$__hx__switch = ($opt->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:302: characters 17-18
			$l = $opt->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:302: characters 21-28
			return Either::Left($l);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:301: characters 18-30
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:164: characters 12-46
		if (null === $value) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:164: characters 28-32
			return Option::None();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:164: characters 35-46
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:288: lines 288-291
		$__hx__switch = ($opt->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:290: characters 17-18
			$r = $opt->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:290: characters 21-29
			return Either::Right($r);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:289: characters 18-28
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:252: lines 252-255
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:254: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:254: characters 21-42
			return Either::Right($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:253: characters 18-43
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:264: lines 264-267
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:266: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:266: characters 21-45
			return Either::Right($v);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:265: characters 18-46
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:246: lines 246-249
		$__hx__switch = ($option->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:247: characters 17-18
			$v = $option->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:247: characters 21-57
			return Validation_Impl_::map($f($v), function ($v) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:247: characters 42-56
				return Option::Some($v);
			});
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Options.hx:248: characters 18-42
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
