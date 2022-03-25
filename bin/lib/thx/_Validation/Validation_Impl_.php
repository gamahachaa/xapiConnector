<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx
 */

namespace thx\_Validation;

use \thx\_Semigroup\Semigroup_Impl_;
use \php\Boot;
use \thx\Either;
use \thx\_Nel\Nel_Impl_;
use \thx\Functions2;
use \thx\Eithers;

final class Validation_Impl_ {

	/**
	 * @param Either $this
	 * @param Either $v
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function ap ($this1, $v, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:49: lines 49-60
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:50: characters 14-16
			$e0 = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:51: characters 12-20
			$_g = $v;
			$__hx__switch = ($_g->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:52: characters 16-18
				$e1 = $_g->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:52: characters 21-43
				return Either::Left(Semigroup_Impl_::get_append($s)($e0, $e1));
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:53: characters 17-18
				$b = $_g->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:53: characters 21-29
				return Either::Left($e0);
			}
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:55: characters 15-16
			$a = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:56: characters 12-20
			$_g = $v;
			$__hx__switch = ($_g->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:57: characters 16-17
				$e = $_g->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:57: characters 20-27
				return Either::Left($e);
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:58: characters 17-18
				$f = $_g->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:58: characters 21-32
				return Either::Right($f($a));
			}
		}
	}

	/**
	 * @param Either $this
	 * @param \Closure $p
	 * @param mixed $error
	 * 
	 * @return Either
	 */
	public static function ensure ($this1, $p, $error) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:97: characters 3-40
		return Eithers::ensure($this1, $p, $error);
	}

	/**
	 * @param mixed $e
	 * 
	 * @return Either
	 */
	public static function failure ($e) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:29: characters 3-17
		return Either::Left($e);
	}

	/**
	 * @param mixed $e
	 * 
	 * @return Either
	 */
	public static function failureNel ($e) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:35: characters 3-27
		return Either::Left(Nel_Impl_::pure($e));
	}

	/**
	 * This is not simply flatMap because it is not consistent with ap,
	 * as should be the case in other monads. It is equivalent to
	 * `this.either.flatMap(f).validation`
	 * 
	 * @param Either $this
	 * @param \Closure $f
	 * 
	 * @return Either
	 */
	public static function flatMapV ($this1, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:68: lines 68-71
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:69: characters 14-15
			$a = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:69: characters 18-25
			return Either::Left($a);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:70: characters 15-16
			$b = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:70: characters 19-23
			return $f($b);
		}
	}

	/**
	 * @param Either $this
	 * @param mixed $b
	 * @param \Closure $f
	 * 
	 * @return mixed
	 */
	public static function foldLeft ($this1, $b, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:85: characters 3-38
		return Eithers::foldLeft($this1, $b, $f);
	}

	/**
	 * @param Either $this
	 * @param \Closure $f
	 * @param object $m
	 * 
	 * @return mixed
	 */
	public static function foldMap ($this1, $f, $m) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:88: characters 3-37
		return Eithers::foldMap($this1, $f, $m);
	}

	/**
	 * @param Either $this
	 * 
	 * @return Either
	 */
	public static function get_either ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:20: characters 3-14
		return $this1;
	}

	/**
	 * @param Either $this
	 * @param \Closure $f
	 * 
	 * @return Either
	 */
	public static function leftMap ($this1, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:91: characters 3-34
		return Eithers::leftMap($this1, $f);
	}

	/**
	 * @param Either $this
	 * @param \Closure $f
	 * 
	 * @return Either
	 */
	public static function map ($this1, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:46: characters 3-30
		return Eithers::map($this1, $f);
	}

	/**
	 * @param mixed $a
	 * @param mixed $e
	 * 
	 * @return Either
	 */
	public static function nn ($a, $e) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:39: characters 10-47
		if ($a === null) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:39: characters 24-34
			return Either::Left($e);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:39: characters 37-47
			return Either::Right($a);
		}
	}

	/**
	 * @param mixed $a
	 * @param mixed $e
	 * 
	 * @return Either
	 */
	public static function nnNel ($a, $e) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:43: characters 10-53
		if ($a === null) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:43: characters 24-37
			return Either::Left(Nel_Impl_::pure($e));
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:43: characters 40-53
			return Either::Right($a);
		}
	}

	/**
	 * If `this` validation is a Right, keep it. Otherwise, try `other` as an
	 * alternative, merging their errors if both are Left.
	 * 
	 * @param Either $this
	 * @param Either $other
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function orElseV ($this1, $other, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:78: characters 24-36
		$_g = $other;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:78: characters 18-22
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:81: characters 15-17
			$_g1 = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:78: characters 24-36
			$__hx__switch = ($_g->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:81: characters 25-27
				$e2 = $_g->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:81: characters 15-17
				$e1 = $_g1;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:81: characters 31-53
				return Either::Left(Semigroup_Impl_::get_append($s)($e1, $e2));
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:80: characters 19-20
				$_g1 = $_g->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:80: characters 24-29
				return $other;
			}
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:79: characters 16-17
			$_g = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:79: characters 24-28
			return $this1;
		}
	}

	/**
	 * @param mixed $a
	 * 
	 * @return Either
	 */
	public static function pure ($a) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:23: characters 3-18
		return Either::Right($a);
	}

	/**
	 * @param mixed $a
	 * 
	 * @return Either
	 */
	public static function success ($a) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:26: characters 3-17
		return Either::Right($a);
	}

	/**
	 * @param mixed $a
	 * 
	 * @return Either
	 */
	public static function successNel ($a) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:32: characters 3-17
		return Either::Right($a);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * 
	 * @return Either
	 */
	public static function val1 ($f, $v1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:104: characters 3-19
		return Validation_Impl_::map($v1, $f);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * @param Either $v2
	 * @param Either $v3
	 * @param Either $v4
	 * @param Either $v5
	 * @param Either $v6
	 * @param Either $v7
	 * @param Either $v8
	 * @param Either $v9
	 * @param Either $v10
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function val10 ($f, $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, $v10, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:142: characters 22-31
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:142: characters 17-71
		$f = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:142: characters 22-31
			return function ($j) use (&$f1, &$g, &$c, &$e, &$f0, &$i, &$b, &$d, &$a, &$h) {
				return $f1($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:142: characters 17-71
		$f2 = function ($a, $b, $c, $d, $e, $f0, $g, $h) use (&$f) {
			return function ($i) use (&$f, &$g, &$c, &$e, &$f0, &$b, &$d, &$a, &$h) {
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i);
			};
		};
		$f3 = function ($a, $b, $c, $d, $e, $f0, $g) use (&$f2) {
			return function ($h) use (&$g, &$f2, &$c, &$e, &$f0, &$b, &$d, &$a) {
				return $f2($a, $b, $c, $d, $e, $f0, $g, $h);
			};
		};
		$f4 = function ($a, $b, $c, $d, $e, $f0) use (&$f3) {
			return function ($g) use (&$f3, &$c, &$e, &$f0, &$b, &$d, &$a) {
				return $f3($a, $b, $c, $d, $e, $f0, $g);
			};
		};
		$f5 = function ($a, $b, $c, $d, $e) use (&$f4) {
			return function ($f0) use (&$c, &$e, &$f4, &$b, &$d, &$a) {
				return $f4($a, $b, $c, $d, $e, $f0);
			};
		};
		$f6 = function ($a, $b, $c, $d) use (&$f5) {
			return function ($e) use (&$f5, &$c, &$b, &$d, &$a) {
				return $f5($a, $b, $c, $d, $e);
			};
		};
		$f7 = function ($a, $b, $c) use (&$f6) {
			return function ($d) use (&$c, &$b, &$f6, &$a) {
				return $f6($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:142: characters 3-75
		return Validation_Impl_::ap($v10, Validation_Impl_::ap($v9, Validation_Impl_::ap($v8, Validation_Impl_::ap($v7, Validation_Impl_::ap($v6, Validation_Impl_::ap($v5, Validation_Impl_::ap($v4, Validation_Impl_::ap($v3, Validation_Impl_::ap($v2, Validation_Impl_::map($v1, Functions2::curry(function ($a, $b) use (&$f7) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:142: characters 17-71
			return function ($c) use (&$b, &$f7, &$a) {
				return $f7($a, $b, $c);
			};
		})), $s), $s), $s), $s), $s), $s), $s), $s), $s);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * @param Either $v2
	 * @param Either $v3
	 * @param Either $v4
	 * @param Either $v5
	 * @param Either $v6
	 * @param Either $v7
	 * @param Either $v8
	 * @param Either $v9
	 * @param Either $v10
	 * @param Either $v11
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function val11 ($f, $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, $v10, $v11, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:147: characters 23-32
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:147: characters 17-77
		$f = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:147: characters 23-32
			return function ($k) use (&$f1, &$g, &$c, &$e, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f1($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:147: characters 17-77
		$f2 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i) use (&$f) {
			return function ($j) use (&$f, &$g, &$c, &$e, &$f0, &$i, &$b, &$d, &$a, &$h) {
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j);
			};
		};
		$f3 = function ($a, $b, $c, $d, $e, $f0, $g, $h) use (&$f2) {
			return function ($i) use (&$g, &$f2, &$c, &$e, &$f0, &$b, &$d, &$a, &$h) {
				return $f2($a, $b, $c, $d, $e, $f0, $g, $h, $i);
			};
		};
		$f4 = function ($a, $b, $c, $d, $e, $f0, $g) use (&$f3) {
			return function ($h) use (&$g, &$f3, &$c, &$e, &$f0, &$b, &$d, &$a) {
				return $f3($a, $b, $c, $d, $e, $f0, $g, $h);
			};
		};
		$f5 = function ($a, $b, $c, $d, $e, $f0) use (&$f4) {
			return function ($g) use (&$c, &$e, &$f0, &$f4, &$b, &$d, &$a) {
				return $f4($a, $b, $c, $d, $e, $f0, $g);
			};
		};
		$f6 = function ($a, $b, $c, $d, $e) use (&$f5) {
			return function ($f0) use (&$f5, &$c, &$e, &$b, &$d, &$a) {
				return $f5($a, $b, $c, $d, $e, $f0);
			};
		};
		$f7 = function ($a, $b, $c, $d) use (&$f6) {
			return function ($e) use (&$c, &$b, &$f6, &$d, &$a) {
				return $f6($a, $b, $c, $d, $e);
			};
		};
		$f8 = function ($a, $b, $c) use (&$f7) {
			return function ($d) use (&$c, &$b, &$f7, &$a) {
				return $f7($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:147: characters 3-81
		return Validation_Impl_::ap($v11, Validation_Impl_::ap($v10, Validation_Impl_::ap($v9, Validation_Impl_::ap($v8, Validation_Impl_::ap($v7, Validation_Impl_::ap($v6, Validation_Impl_::ap($v5, Validation_Impl_::ap($v4, Validation_Impl_::ap($v3, Validation_Impl_::ap($v2, Validation_Impl_::map($v1, Functions2::curry(function ($a, $b) use (&$f8) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:147: characters 17-77
			return function ($c) use (&$f8, &$b, &$a) {
				return $f8($a, $b, $c);
			};
		})), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * @param Either $v2
	 * @param Either $v3
	 * @param Either $v4
	 * @param Either $v5
	 * @param Either $v6
	 * @param Either $v7
	 * @param Either $v8
	 * @param Either $v9
	 * @param Either $v10
	 * @param Either $v11
	 * @param Either $v12
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function val12 ($f, $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, $v10, $v11, $v12, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:152: characters 23-32
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:152: characters 17-82
		$f = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:152: characters 23-32
			return function ($l) use (&$f1, &$g, &$c, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f1($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:152: characters 17-82
		$f2 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j) use (&$f) {
			return function ($k) use (&$f, &$g, &$c, &$e, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k);
			};
		};
		$f3 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i) use (&$f2) {
			return function ($j) use (&$g, &$f2, &$c, &$e, &$f0, &$i, &$b, &$d, &$a, &$h) {
				return $f2($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j);
			};
		};
		$f4 = function ($a, $b, $c, $d, $e, $f0, $g, $h) use (&$f3) {
			return function ($i) use (&$g, &$f3, &$c, &$e, &$f0, &$b, &$d, &$a, &$h) {
				return $f3($a, $b, $c, $d, $e, $f0, $g, $h, $i);
			};
		};
		$f5 = function ($a, $b, $c, $d, $e, $f0, $g) use (&$f4) {
			return function ($h) use (&$g, &$c, &$e, &$f0, &$f4, &$b, &$d, &$a) {
				return $f4($a, $b, $c, $d, $e, $f0, $g, $h);
			};
		};
		$f6 = function ($a, $b, $c, $d, $e, $f0) use (&$f5) {
			return function ($g) use (&$f5, &$c, &$e, &$f0, &$b, &$d, &$a) {
				return $f5($a, $b, $c, $d, $e, $f0, $g);
			};
		};
		$f7 = function ($a, $b, $c, $d, $e) use (&$f6) {
			return function ($f0) use (&$c, &$e, &$b, &$f6, &$d, &$a) {
				return $f6($a, $b, $c, $d, $e, $f0);
			};
		};
		$f8 = function ($a, $b, $c, $d) use (&$f7) {
			return function ($e) use (&$c, &$b, &$d, &$f7, &$a) {
				return $f7($a, $b, $c, $d, $e);
			};
		};
		$f9 = function ($a, $b, $c) use (&$f8) {
			return function ($d) use (&$c, &$f8, &$b, &$a) {
				return $f8($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:152: characters 3-86
		return Validation_Impl_::ap($v12, Validation_Impl_::ap($v11, Validation_Impl_::ap($v10, Validation_Impl_::ap($v9, Validation_Impl_::ap($v8, Validation_Impl_::ap($v7, Validation_Impl_::ap($v6, Validation_Impl_::ap($v5, Validation_Impl_::ap($v4, Validation_Impl_::ap($v3, Validation_Impl_::ap($v2, Validation_Impl_::map($v1, Functions2::curry(function ($a, $b) use (&$f9) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:152: characters 17-82
			return function ($c) use (&$f9, &$b, &$a) {
				return $f9($a, $b, $c);
			};
		})), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * @param Either $v2
	 * @param Either $v3
	 * @param Either $v4
	 * @param Either $v5
	 * @param Either $v6
	 * @param Either $v7
	 * @param Either $v8
	 * @param Either $v9
	 * @param Either $v10
	 * @param Either $v11
	 * @param Either $v12
	 * @param Either $v13
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function val13 ($f, $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, $v10, $v11, $v12, $v13, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:157: characters 23-32
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:157: characters 17-87
		$f = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:157: characters 23-32
			return function ($m) use (&$f1, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f1($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:157: characters 17-87
		$f2 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k) use (&$f) {
			return function ($l) use (&$f, &$g, &$c, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l);
			};
		};
		$f3 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j) use (&$f2) {
			return function ($k) use (&$g, &$f2, &$c, &$e, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f2($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k);
			};
		};
		$f4 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i) use (&$f3) {
			return function ($j) use (&$g, &$f3, &$c, &$e, &$f0, &$i, &$b, &$d, &$a, &$h) {
				return $f3($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j);
			};
		};
		$f5 = function ($a, $b, $c, $d, $e, $f0, $g, $h) use (&$f4) {
			return function ($i) use (&$g, &$c, &$e, &$f0, &$f4, &$b, &$d, &$a, &$h) {
				return $f4($a, $b, $c, $d, $e, $f0, $g, $h, $i);
			};
		};
		$f6 = function ($a, $b, $c, $d, $e, $f0, $g) use (&$f5) {
			return function ($h) use (&$f5, &$g, &$c, &$e, &$f0, &$b, &$d, &$a) {
				return $f5($a, $b, $c, $d, $e, $f0, $g, $h);
			};
		};
		$f7 = function ($a, $b, $c, $d, $e, $f0) use (&$f6) {
			return function ($g) use (&$c, &$e, &$f0, &$b, &$f6, &$d, &$a) {
				return $f6($a, $b, $c, $d, $e, $f0, $g);
			};
		};
		$f8 = function ($a, $b, $c, $d, $e) use (&$f7) {
			return function ($f0) use (&$c, &$e, &$b, &$d, &$f7, &$a) {
				return $f7($a, $b, $c, $d, $e, $f0);
			};
		};
		$f9 = function ($a, $b, $c, $d) use (&$f8) {
			return function ($e) use (&$c, &$f8, &$b, &$d, &$a) {
				return $f8($a, $b, $c, $d, $e);
			};
		};
		$f10 = function ($a, $b, $c) use (&$f9) {
			return function ($d) use (&$c, &$f9, &$b, &$a) {
				return $f9($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:157: characters 3-91
		return Validation_Impl_::ap($v13, Validation_Impl_::ap($v12, Validation_Impl_::ap($v11, Validation_Impl_::ap($v10, Validation_Impl_::ap($v9, Validation_Impl_::ap($v8, Validation_Impl_::ap($v7, Validation_Impl_::ap($v6, Validation_Impl_::ap($v5, Validation_Impl_::ap($v4, Validation_Impl_::ap($v3, Validation_Impl_::ap($v2, Validation_Impl_::map($v1, Functions2::curry(function ($a, $b) use (&$f10) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:157: characters 17-87
			return function ($c) use (&$f10, &$b, &$a) {
				return $f10($a, $b, $c);
			};
		})), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * @param Either $v2
	 * @param Either $v3
	 * @param Either $v4
	 * @param Either $v5
	 * @param Either $v6
	 * @param Either $v7
	 * @param Either $v8
	 * @param Either $v9
	 * @param Either $v10
	 * @param Either $v11
	 * @param Either $v12
	 * @param Either $v13
	 * @param Either $v14
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function val14 ($f, $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, $v10, $v11, $v12, $v13, $v14, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:163: characters 23-32
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:163: characters 17-92
		$f = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:163: characters 23-32
			return function ($n) use (&$m, &$f1, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f1($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:163: characters 17-92
		$f2 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l) use (&$f) {
			return function ($m) use (&$f, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m);
			};
		};
		$f3 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k) use (&$f2) {
			return function ($l) use (&$g, &$f2, &$c, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f2($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l);
			};
		};
		$f4 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j) use (&$f3) {
			return function ($k) use (&$g, &$f3, &$c, &$e, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f3($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k);
			};
		};
		$f5 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i) use (&$f4) {
			return function ($j) use (&$g, &$c, &$e, &$f0, &$i, &$f4, &$b, &$d, &$a, &$h) {
				return $f4($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j);
			};
		};
		$f6 = function ($a, $b, $c, $d, $e, $f0, $g, $h) use (&$f5) {
			return function ($i) use (&$f5, &$g, &$c, &$e, &$f0, &$b, &$d, &$a, &$h) {
				return $f5($a, $b, $c, $d, $e, $f0, $g, $h, $i);
			};
		};
		$f7 = function ($a, $b, $c, $d, $e, $f0, $g) use (&$f6) {
			return function ($h) use (&$g, &$c, &$e, &$f0, &$b, &$f6, &$d, &$a) {
				return $f6($a, $b, $c, $d, $e, $f0, $g, $h);
			};
		};
		$f8 = function ($a, $b, $c, $d, $e, $f0) use (&$f7) {
			return function ($g) use (&$c, &$e, &$f0, &$b, &$d, &$f7, &$a) {
				return $f7($a, $b, $c, $d, $e, $f0, $g);
			};
		};
		$f9 = function ($a, $b, $c, $d, $e) use (&$f8) {
			return function ($f0) use (&$c, &$e, &$f8, &$b, &$d, &$a) {
				return $f8($a, $b, $c, $d, $e, $f0);
			};
		};
		$f10 = function ($a, $b, $c, $d) use (&$f9) {
			return function ($e) use (&$c, &$f9, &$b, &$d, &$a) {
				return $f9($a, $b, $c, $d, $e);
			};
		};
		$f11 = function ($a, $b, $c) use (&$f10) {
			return function ($d) use (&$c, &$f10, &$b, &$a) {
				return $f10($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:163: characters 3-96
		return Validation_Impl_::ap($v14, Validation_Impl_::ap($v13, Validation_Impl_::ap($v12, Validation_Impl_::ap($v11, Validation_Impl_::ap($v10, Validation_Impl_::ap($v9, Validation_Impl_::ap($v8, Validation_Impl_::ap($v7, Validation_Impl_::ap($v6, Validation_Impl_::ap($v5, Validation_Impl_::ap($v4, Validation_Impl_::ap($v3, Validation_Impl_::ap($v2, Validation_Impl_::map($v1, Functions2::curry(function ($a, $b) use (&$f11) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:163: characters 17-92
			return function ($c) use (&$f11, &$b, &$a) {
				return $f11($a, $b, $c);
			};
		})), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * @param Either $v2
	 * @param Either $v3
	 * @param Either $v4
	 * @param Either $v5
	 * @param Either $v6
	 * @param Either $v7
	 * @param Either $v8
	 * @param Either $v9
	 * @param Either $v10
	 * @param Either $v11
	 * @param Either $v12
	 * @param Either $v13
	 * @param Either $v14
	 * @param Either $v15
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function val15 ($f, $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, $v10, $v11, $v12, $v13, $v14, $v15, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:169: characters 23-32
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:169: characters 17-97
		$f = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:169: characters 23-32
			return function ($o) use (&$m, &$f1, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$n, &$d, &$a, &$h) {
				return $f1($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:169: characters 17-97
		$f2 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m) use (&$f) {
			return function ($n) use (&$m, &$f, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n);
			};
		};
		$f3 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l) use (&$f2) {
			return function ($m) use (&$g, &$f2, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f2($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m);
			};
		};
		$f4 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k) use (&$f3) {
			return function ($l) use (&$g, &$f3, &$c, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f3($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l);
			};
		};
		$f5 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j) use (&$f4) {
			return function ($k) use (&$g, &$c, &$e, &$f0, &$i, &$f4, &$j, &$b, &$d, &$a, &$h) {
				return $f4($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k);
			};
		};
		$f6 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i) use (&$f5) {
			return function ($j) use (&$f5, &$g, &$c, &$e, &$f0, &$i, &$b, &$d, &$a, &$h) {
				return $f5($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j);
			};
		};
		$f7 = function ($a, $b, $c, $d, $e, $f0, $g, $h) use (&$f6) {
			return function ($i) use (&$g, &$c, &$e, &$f0, &$b, &$f6, &$d, &$a, &$h) {
				return $f6($a, $b, $c, $d, $e, $f0, $g, $h, $i);
			};
		};
		$f8 = function ($a, $b, $c, $d, $e, $f0, $g) use (&$f7) {
			return function ($h) use (&$g, &$c, &$e, &$f0, &$b, &$d, &$f7, &$a) {
				return $f7($a, $b, $c, $d, $e, $f0, $g, $h);
			};
		};
		$f9 = function ($a, $b, $c, $d, $e, $f0) use (&$f8) {
			return function ($g) use (&$c, &$e, &$f0, &$f8, &$b, &$d, &$a) {
				return $f8($a, $b, $c, $d, $e, $f0, $g);
			};
		};
		$f10 = function ($a, $b, $c, $d, $e) use (&$f9) {
			return function ($f0) use (&$c, &$f9, &$e, &$b, &$d, &$a) {
				return $f9($a, $b, $c, $d, $e, $f0);
			};
		};
		$f11 = function ($a, $b, $c, $d) use (&$f10) {
			return function ($e) use (&$c, &$f10, &$b, &$d, &$a) {
				return $f10($a, $b, $c, $d, $e);
			};
		};
		$f12 = function ($a, $b, $c) use (&$f11) {
			return function ($d) use (&$f11, &$c, &$b, &$a) {
				return $f11($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:169: characters 3-101
		return Validation_Impl_::ap($v15, Validation_Impl_::ap($v14, Validation_Impl_::ap($v13, Validation_Impl_::ap($v12, Validation_Impl_::ap($v11, Validation_Impl_::ap($v10, Validation_Impl_::ap($v9, Validation_Impl_::ap($v8, Validation_Impl_::ap($v7, Validation_Impl_::ap($v6, Validation_Impl_::ap($v5, Validation_Impl_::ap($v4, Validation_Impl_::ap($v3, Validation_Impl_::ap($v2, Validation_Impl_::map($v1, Functions2::curry(function ($a, $b) use (&$f12) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:169: characters 17-97
			return function ($c) use (&$f12, &$b, &$a) {
				return $f12($a, $b, $c);
			};
		})), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * @param Either $v2
	 * @param Either $v3
	 * @param Either $v4
	 * @param Either $v5
	 * @param Either $v6
	 * @param Either $v7
	 * @param Either $v8
	 * @param Either $v9
	 * @param Either $v10
	 * @param Either $v11
	 * @param Either $v12
	 * @param Either $v13
	 * @param Either $v14
	 * @param Either $v15
	 * @param Either $v16
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function val16 ($f, $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, $v10, $v11, $v12, $v13, $v14, $v15, $v16, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:175: characters 23-32
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:175: characters 17-102
		$f = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:175: characters 23-32
			return function ($p) use (&$o, &$m, &$f1, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$n, &$d, &$a, &$h) {
				return $f1($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:175: characters 17-102
		$f2 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n) use (&$f) {
			return function ($o) use (&$m, &$f, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$n, &$d, &$a, &$h) {
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o);
			};
		};
		$f3 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m) use (&$f2) {
			return function ($n) use (&$m, &$g, &$f2, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f2($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n);
			};
		};
		$f4 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l) use (&$f3) {
			return function ($m) use (&$g, &$f3, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f3($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m);
			};
		};
		$f5 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k) use (&$f4) {
			return function ($l) use (&$g, &$c, &$e, &$k, &$f0, &$i, &$f4, &$j, &$b, &$d, &$a, &$h) {
				return $f4($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l);
			};
		};
		$f6 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j) use (&$f5) {
			return function ($k) use (&$f5, &$g, &$c, &$e, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f5($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k);
			};
		};
		$f7 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i) use (&$f6) {
			return function ($j) use (&$g, &$c, &$e, &$f0, &$i, &$b, &$f6, &$d, &$a, &$h) {
				return $f6($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j);
			};
		};
		$f8 = function ($a, $b, $c, $d, $e, $f0, $g, $h) use (&$f7) {
			return function ($i) use (&$g, &$c, &$e, &$f0, &$b, &$d, &$f7, &$a, &$h) {
				return $f7($a, $b, $c, $d, $e, $f0, $g, $h, $i);
			};
		};
		$f9 = function ($a, $b, $c, $d, $e, $f0, $g) use (&$f8) {
			return function ($h) use (&$g, &$c, &$e, &$f0, &$f8, &$b, &$d, &$a) {
				return $f8($a, $b, $c, $d, $e, $f0, $g, $h);
			};
		};
		$f10 = function ($a, $b, $c, $d, $e, $f0) use (&$f9) {
			return function ($g) use (&$c, &$f9, &$e, &$f0, &$b, &$d, &$a) {
				return $f9($a, $b, $c, $d, $e, $f0, $g);
			};
		};
		$f11 = function ($a, $b, $c, $d, $e) use (&$f10) {
			return function ($f0) use (&$c, &$e, &$f10, &$b, &$d, &$a) {
				return $f10($a, $b, $c, $d, $e, $f0);
			};
		};
		$f12 = function ($a, $b, $c, $d) use (&$f11) {
			return function ($e) use (&$f11, &$c, &$b, &$d, &$a) {
				return $f11($a, $b, $c, $d, $e);
			};
		};
		$f13 = function ($a, $b, $c) use (&$f12) {
			return function ($d) use (&$f12, &$c, &$b, &$a) {
				return $f12($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:175: characters 3-106
		return Validation_Impl_::ap($v16, Validation_Impl_::ap($v15, Validation_Impl_::ap($v14, Validation_Impl_::ap($v13, Validation_Impl_::ap($v12, Validation_Impl_::ap($v11, Validation_Impl_::ap($v10, Validation_Impl_::ap($v9, Validation_Impl_::ap($v8, Validation_Impl_::ap($v7, Validation_Impl_::ap($v6, Validation_Impl_::ap($v5, Validation_Impl_::ap($v4, Validation_Impl_::ap($v3, Validation_Impl_::ap($v2, Validation_Impl_::map($v1, Functions2::curry(function ($a, $b) use (&$f13) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:175: characters 17-102
			return function ($c) use (&$f13, &$b, &$a) {
				return $f13($a, $b, $c);
			};
		})), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * @param Either $v2
	 * @param Either $v3
	 * @param Either $v4
	 * @param Either $v5
	 * @param Either $v6
	 * @param Either $v7
	 * @param Either $v8
	 * @param Either $v9
	 * @param Either $v10
	 * @param Either $v11
	 * @param Either $v12
	 * @param Either $v13
	 * @param Either $v14
	 * @param Either $v15
	 * @param Either $v16
	 * @param Either $v17
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function val17 ($f, $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, $v10, $v11, $v12, $v13, $v14, $v15, $v16, $v17, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:181: characters 23-32
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:181: characters 17-107
		$f = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:181: characters 23-32
			return function ($q) use (&$o, &$m, &$f1, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$n, &$d, &$p, &$a, &$h) {
				return $f1($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:181: characters 17-107
		$f2 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o) use (&$f) {
			return function ($p) use (&$o, &$m, &$f, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$n, &$d, &$a, &$h) {
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p);
			};
		};
		$f3 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n) use (&$f2) {
			return function ($o) use (&$m, &$g, &$f2, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$n, &$d, &$a, &$h) {
				return $f2($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o);
			};
		};
		$f4 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m) use (&$f3) {
			return function ($n) use (&$m, &$g, &$f3, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f3($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n);
			};
		};
		$f5 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l) use (&$f4) {
			return function ($m) use (&$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$f4, &$j, &$b, &$d, &$a, &$h) {
				return $f4($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m);
			};
		};
		$f6 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k) use (&$f5) {
			return function ($l) use (&$f5, &$g, &$c, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f5($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l);
			};
		};
		$f7 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j) use (&$f6) {
			return function ($k) use (&$g, &$c, &$e, &$f0, &$i, &$j, &$b, &$f6, &$d, &$a, &$h) {
				return $f6($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k);
			};
		};
		$f8 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i) use (&$f7) {
			return function ($j) use (&$g, &$c, &$e, &$f0, &$i, &$b, &$d, &$f7, &$a, &$h) {
				return $f7($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j);
			};
		};
		$f9 = function ($a, $b, $c, $d, $e, $f0, $g, $h) use (&$f8) {
			return function ($i) use (&$g, &$c, &$e, &$f0, &$f8, &$b, &$d, &$a, &$h) {
				return $f8($a, $b, $c, $d, $e, $f0, $g, $h, $i);
			};
		};
		$f10 = function ($a, $b, $c, $d, $e, $f0, $g) use (&$f9) {
			return function ($h) use (&$g, &$c, &$f9, &$e, &$f0, &$b, &$d, &$a) {
				return $f9($a, $b, $c, $d, $e, $f0, $g, $h);
			};
		};
		$f11 = function ($a, $b, $c, $d, $e, $f0) use (&$f10) {
			return function ($g) use (&$c, &$e, &$f0, &$f10, &$b, &$d, &$a) {
				return $f10($a, $b, $c, $d, $e, $f0, $g);
			};
		};
		$f12 = function ($a, $b, $c, $d, $e) use (&$f11) {
			return function ($f0) use (&$f11, &$c, &$e, &$b, &$d, &$a) {
				return $f11($a, $b, $c, $d, $e, $f0);
			};
		};
		$f13 = function ($a, $b, $c, $d) use (&$f12) {
			return function ($e) use (&$f12, &$c, &$b, &$d, &$a) {
				return $f12($a, $b, $c, $d, $e);
			};
		};
		$f14 = function ($a, $b, $c) use (&$f13) {
			return function ($d) use (&$c, &$f13, &$b, &$a) {
				return $f13($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:181: characters 3-111
		return Validation_Impl_::ap($v17, Validation_Impl_::ap($v16, Validation_Impl_::ap($v15, Validation_Impl_::ap($v14, Validation_Impl_::ap($v13, Validation_Impl_::ap($v12, Validation_Impl_::ap($v11, Validation_Impl_::ap($v10, Validation_Impl_::ap($v9, Validation_Impl_::ap($v8, Validation_Impl_::ap($v7, Validation_Impl_::ap($v6, Validation_Impl_::ap($v5, Validation_Impl_::ap($v4, Validation_Impl_::ap($v3, Validation_Impl_::ap($v2, Validation_Impl_::map($v1, Functions2::curry(function ($a, $b) use (&$f14) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:181: characters 17-107
			return function ($c) use (&$b, &$f14, &$a) {
				return $f14($a, $b, $c);
			};
		})), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * @param Either $v2
	 * @param Either $v3
	 * @param Either $v4
	 * @param Either $v5
	 * @param Either $v6
	 * @param Either $v7
	 * @param Either $v8
	 * @param Either $v9
	 * @param Either $v10
	 * @param Either $v11
	 * @param Either $v12
	 * @param Either $v13
	 * @param Either $v14
	 * @param Either $v15
	 * @param Either $v16
	 * @param Either $v17
	 * @param Either $v18
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function val18 ($f, $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, $v10, $v11, $v12, $v13, $v14, $v15, $v16, $v17, $v18, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:187: characters 23-32
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:187: characters 17-112
		$f = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:187: characters 23-32
			return function ($r) use (&$o, &$m, &$f1, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$n, &$d, &$q, &$p, &$a, &$h) {
				return $f1($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:187: characters 17-112
		$f2 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p) use (&$f) {
			return function ($q) use (&$o, &$m, &$f, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$n, &$d, &$p, &$a, &$h) {
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q);
			};
		};
		$f3 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o) use (&$f2) {
			return function ($p) use (&$o, &$m, &$g, &$f2, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$n, &$d, &$a, &$h) {
				return $f2($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p);
			};
		};
		$f4 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n) use (&$f3) {
			return function ($o) use (&$m, &$g, &$f3, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$n, &$d, &$a, &$h) {
				return $f3($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o);
			};
		};
		$f5 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m) use (&$f4) {
			return function ($n) use (&$m, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$f4, &$j, &$b, &$d, &$a, &$h) {
				return $f4($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n);
			};
		};
		$f6 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l) use (&$f5) {
			return function ($m) use (&$f5, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f5($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m);
			};
		};
		$f7 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k) use (&$f6) {
			return function ($l) use (&$g, &$c, &$e, &$k, &$f0, &$i, &$j, &$b, &$f6, &$d, &$a, &$h) {
				return $f6($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l);
			};
		};
		$f8 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j) use (&$f7) {
			return function ($k) use (&$g, &$c, &$e, &$f0, &$i, &$j, &$b, &$d, &$f7, &$a, &$h) {
				return $f7($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k);
			};
		};
		$f9 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i) use (&$f8) {
			return function ($j) use (&$g, &$c, &$e, &$f0, &$i, &$f8, &$b, &$d, &$a, &$h) {
				return $f8($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j);
			};
		};
		$f10 = function ($a, $b, $c, $d, $e, $f0, $g, $h) use (&$f9) {
			return function ($i) use (&$g, &$c, &$f9, &$e, &$f0, &$b, &$d, &$a, &$h) {
				return $f9($a, $b, $c, $d, $e, $f0, $g, $h, $i);
			};
		};
		$f11 = function ($a, $b, $c, $d, $e, $f0, $g) use (&$f10) {
			return function ($h) use (&$g, &$c, &$e, &$f0, &$f10, &$b, &$d, &$a) {
				return $f10($a, $b, $c, $d, $e, $f0, $g, $h);
			};
		};
		$f12 = function ($a, $b, $c, $d, $e, $f0) use (&$f11) {
			return function ($g) use (&$f11, &$c, &$e, &$f0, &$b, &$d, &$a) {
				return $f11($a, $b, $c, $d, $e, $f0, $g);
			};
		};
		$f13 = function ($a, $b, $c, $d, $e) use (&$f12) {
			return function ($f0) use (&$f12, &$c, &$e, &$b, &$d, &$a) {
				return $f12($a, $b, $c, $d, $e, $f0);
			};
		};
		$f14 = function ($a, $b, $c, $d) use (&$f13) {
			return function ($e) use (&$c, &$f13, &$b, &$d, &$a) {
				return $f13($a, $b, $c, $d, $e);
			};
		};
		$f15 = function ($a, $b, $c) use (&$f14) {
			return function ($d) use (&$c, &$b, &$f14, &$a) {
				return $f14($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:187: characters 3-116
		return Validation_Impl_::ap($v18, Validation_Impl_::ap($v17, Validation_Impl_::ap($v16, Validation_Impl_::ap($v15, Validation_Impl_::ap($v14, Validation_Impl_::ap($v13, Validation_Impl_::ap($v12, Validation_Impl_::ap($v11, Validation_Impl_::ap($v10, Validation_Impl_::ap($v9, Validation_Impl_::ap($v8, Validation_Impl_::ap($v7, Validation_Impl_::ap($v6, Validation_Impl_::ap($v5, Validation_Impl_::ap($v4, Validation_Impl_::ap($v3, Validation_Impl_::ap($v2, Validation_Impl_::map($v1, Functions2::curry(function ($a, $b) use (&$f15) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:187: characters 17-112
			return function ($c) use (&$b, &$f15, &$a) {
				return $f15($a, $b, $c);
			};
		})), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * @param Either $v2
	 * @param Either $v3
	 * @param Either $v4
	 * @param Either $v5
	 * @param Either $v6
	 * @param Either $v7
	 * @param Either $v8
	 * @param Either $v9
	 * @param Either $v10
	 * @param Either $v11
	 * @param Either $v12
	 * @param Either $v13
	 * @param Either $v14
	 * @param Either $v15
	 * @param Either $v16
	 * @param Either $v17
	 * @param Either $v18
	 * @param Either $v19
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function val19 ($f, $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, $v10, $v11, $v12, $v13, $v14, $v15, $v16, $v17, $v18, $v19, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:194: characters 23-32
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:194: characters 17-117
		$f = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:194: characters 23-32
			return function ($s) use (&$o, &$m, &$f1, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$r, &$j, &$b, &$n, &$d, &$q, &$p, &$a, &$h) {
				return $f1($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:194: characters 17-117
		$f2 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q) use (&$f) {
			return function ($r) use (&$o, &$m, &$f, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$n, &$d, &$q, &$p, &$a, &$h) {
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r);
			};
		};
		$f3 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p) use (&$f2) {
			return function ($q) use (&$o, &$m, &$g, &$f2, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$n, &$d, &$p, &$a, &$h) {
				return $f2($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q);
			};
		};
		$f4 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o) use (&$f3) {
			return function ($p) use (&$o, &$m, &$g, &$f3, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$n, &$d, &$a, &$h) {
				return $f3($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p);
			};
		};
		$f5 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n) use (&$f4) {
			return function ($o) use (&$m, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$f4, &$j, &$b, &$n, &$d, &$a, &$h) {
				return $f4($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o);
			};
		};
		$f6 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m) use (&$f5) {
			return function ($n) use (&$m, &$f5, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f5($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n);
			};
		};
		$f7 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l) use (&$f6) {
			return function ($m) use (&$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$f6, &$d, &$a, &$h) {
				return $f6($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m);
			};
		};
		$f8 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k) use (&$f7) {
			return function ($l) use (&$g, &$c, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$f7, &$a, &$h) {
				return $f7($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l);
			};
		};
		$f9 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j) use (&$f8) {
			return function ($k) use (&$g, &$c, &$e, &$f0, &$i, &$f8, &$j, &$b, &$d, &$a, &$h) {
				return $f8($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k);
			};
		};
		$f10 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i) use (&$f9) {
			return function ($j) use (&$g, &$c, &$f9, &$e, &$f0, &$i, &$b, &$d, &$a, &$h) {
				return $f9($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j);
			};
		};
		$f11 = function ($a, $b, $c, $d, $e, $f0, $g, $h) use (&$f10) {
			return function ($i) use (&$g, &$c, &$e, &$f0, &$f10, &$b, &$d, &$a, &$h) {
				return $f10($a, $b, $c, $d, $e, $f0, $g, $h, $i);
			};
		};
		$f12 = function ($a, $b, $c, $d, $e, $f0, $g) use (&$f11) {
			return function ($h) use (&$f11, &$g, &$c, &$e, &$f0, &$b, &$d, &$a) {
				return $f11($a, $b, $c, $d, $e, $f0, $g, $h);
			};
		};
		$f13 = function ($a, $b, $c, $d, $e, $f0) use (&$f12) {
			return function ($g) use (&$f12, &$c, &$e, &$f0, &$b, &$d, &$a) {
				return $f12($a, $b, $c, $d, $e, $f0, $g);
			};
		};
		$f14 = function ($a, $b, $c, $d, $e) use (&$f13) {
			return function ($f0) use (&$c, &$e, &$f13, &$b, &$d, &$a) {
				return $f13($a, $b, $c, $d, $e, $f0);
			};
		};
		$f15 = function ($a, $b, $c, $d) use (&$f14) {
			return function ($e) use (&$c, &$b, &$f14, &$d, &$a) {
				return $f14($a, $b, $c, $d, $e);
			};
		};
		$f16 = function ($a, $b, $c) use (&$f15) {
			return function ($d) use (&$c, &$b, &$f15, &$a) {
				return $f15($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:194: characters 3-121
		return Validation_Impl_::ap($v19, Validation_Impl_::ap($v18, Validation_Impl_::ap($v17, Validation_Impl_::ap($v16, Validation_Impl_::ap($v15, Validation_Impl_::ap($v14, Validation_Impl_::ap($v13, Validation_Impl_::ap($v12, Validation_Impl_::ap($v11, Validation_Impl_::ap($v10, Validation_Impl_::ap($v9, Validation_Impl_::ap($v8, Validation_Impl_::ap($v7, Validation_Impl_::ap($v6, Validation_Impl_::ap($v5, Validation_Impl_::ap($v4, Validation_Impl_::ap($v3, Validation_Impl_::ap($v2, Validation_Impl_::map($v1, Functions2::curry(function ($a, $b) use (&$f16) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:194: characters 17-117
			return function ($c) use (&$f16, &$b, &$a) {
				return $f16($a, $b, $c);
			};
		})), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * @param Either $v2
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function val2 ($f, $v1, $v2, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:107: characters 3-37
		return Validation_Impl_::ap($v2, Validation_Impl_::map($v1, Functions2::curry($f)), $s);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * @param Either $v2
	 * @param Either $v3
	 * @param Either $v4
	 * @param Either $v5
	 * @param Either $v6
	 * @param Either $v7
	 * @param Either $v8
	 * @param Either $v9
	 * @param Either $v10
	 * @param Either $v11
	 * @param Either $v12
	 * @param Either $v13
	 * @param Either $v14
	 * @param Either $v15
	 * @param Either $v16
	 * @param Either $v17
	 * @param Either $v18
	 * @param Either $v19
	 * @param Either $v20
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function val20 ($f, $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, $v10, $v11, $v12, $v13, $v14, $v15, $v16, $v17, $v18, $v19, $v20, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:201: characters 23-32
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:201: characters 17-122
		$f = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:201: characters 23-32
			return function ($t) use (&$o, &$m, &$f1, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$r, &$j, &$b, &$n, &$s, &$d, &$q, &$p, &$a, &$h) {
				return $f1($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:201: characters 17-122
		$f2 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r) use (&$f) {
			return function ($s) use (&$o, &$m, &$f, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$r, &$j, &$b, &$n, &$d, &$q, &$p, &$a, &$h) {
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s);
			};
		};
		$f3 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q) use (&$f2) {
			return function ($r) use (&$o, &$m, &$g, &$f2, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$n, &$d, &$q, &$p, &$a, &$h) {
				return $f2($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r);
			};
		};
		$f4 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p) use (&$f3) {
			return function ($q) use (&$o, &$m, &$g, &$f3, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$n, &$d, &$p, &$a, &$h) {
				return $f3($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q);
			};
		};
		$f5 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o) use (&$f4) {
			return function ($p) use (&$o, &$m, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$f4, &$j, &$b, &$n, &$d, &$a, &$h) {
				return $f4($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p);
			};
		};
		$f6 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n) use (&$f5) {
			return function ($o) use (&$m, &$f5, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$n, &$d, &$a, &$h) {
				return $f5($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o);
			};
		};
		$f7 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m) use (&$f6) {
			return function ($n) use (&$m, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$f6, &$d, &$a, &$h) {
				return $f6($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n);
			};
		};
		$f8 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l) use (&$f7) {
			return function ($m) use (&$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$f7, &$a, &$h) {
				return $f7($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m);
			};
		};
		$f9 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k) use (&$f8) {
			return function ($l) use (&$g, &$c, &$e, &$k, &$f0, &$i, &$f8, &$j, &$b, &$d, &$a, &$h) {
				return $f8($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l);
			};
		};
		$f10 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j) use (&$f9) {
			return function ($k) use (&$g, &$c, &$f9, &$e, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				return $f9($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k);
			};
		};
		$f11 = function ($a, $b, $c, $d, $e, $f0, $g, $h, $i) use (&$f10) {
			return function ($j) use (&$g, &$c, &$e, &$f0, &$i, &$f10, &$b, &$d, &$a, &$h) {
				return $f10($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j);
			};
		};
		$f12 = function ($a, $b, $c, $d, $e, $f0, $g, $h) use (&$f11) {
			return function ($i) use (&$f11, &$g, &$c, &$e, &$f0, &$b, &$d, &$a, &$h) {
				return $f11($a, $b, $c, $d, $e, $f0, $g, $h, $i);
			};
		};
		$f13 = function ($a, $b, $c, $d, $e, $f0, $g) use (&$f12) {
			return function ($h) use (&$f12, &$g, &$c, &$e, &$f0, &$b, &$d, &$a) {
				return $f12($a, $b, $c, $d, $e, $f0, $g, $h);
			};
		};
		$f14 = function ($a, $b, $c, $d, $e, $f0) use (&$f13) {
			return function ($g) use (&$c, &$e, &$f0, &$f13, &$b, &$d, &$a) {
				return $f13($a, $b, $c, $d, $e, $f0, $g);
			};
		};
		$f15 = function ($a, $b, $c, $d, $e) use (&$f14) {
			return function ($f0) use (&$c, &$e, &$b, &$f14, &$d, &$a) {
				return $f14($a, $b, $c, $d, $e, $f0);
			};
		};
		$f16 = function ($a, $b, $c, $d) use (&$f15) {
			return function ($e) use (&$c, &$b, &$d, &$f15, &$a) {
				return $f15($a, $b, $c, $d, $e);
			};
		};
		$f17 = function ($a, $b, $c) use (&$f16) {
			return function ($d) use (&$c, &$f16, &$b, &$a) {
				return $f16($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:201: characters 3-126
		return Validation_Impl_::ap($v20, Validation_Impl_::ap($v19, Validation_Impl_::ap($v18, Validation_Impl_::ap($v17, Validation_Impl_::ap($v16, Validation_Impl_::ap($v15, Validation_Impl_::ap($v14, Validation_Impl_::ap($v13, Validation_Impl_::ap($v12, Validation_Impl_::ap($v11, Validation_Impl_::ap($v10, Validation_Impl_::ap($v9, Validation_Impl_::ap($v8, Validation_Impl_::ap($v7, Validation_Impl_::ap($v6, Validation_Impl_::ap($v5, Validation_Impl_::ap($v4, Validation_Impl_::ap($v3, Validation_Impl_::ap($v2, Validation_Impl_::map($v1, Functions2::curry(function ($a, $b) use (&$f17) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:201: characters 17-122
			return function ($c) use (&$f17, &$b, &$a) {
				return $f17($a, $b, $c);
			};
		})), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s), $s);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * @param Either $v2
	 * @param Either $v3
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function val3 ($f, $v1, $v2, $v3, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:111: characters 21-30
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:111: characters 3-46
		return Validation_Impl_::ap($v3, Validation_Impl_::ap($v2, Validation_Impl_::map($v1, Functions2::curry(function ($a, $b) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:111: characters 21-30
			return function ($c) use (&$f1, &$b, &$a) {
				return $f1($a, $b, $c);
			};
		})), $s), $s);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * @param Either $v2
	 * @param Either $v3
	 * @param Either $v4
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function val4 ($f, $v1, $v2, $v3, $v4, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:115: characters 21-30
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:115: characters 16-46
		$f = function ($a, $b, $c) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:115: characters 21-30
			return function ($d) use (&$f1, &$c, &$b, &$a) {
				return $f1($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:115: characters 3-50
		return Validation_Impl_::ap($v4, Validation_Impl_::ap($v3, Validation_Impl_::ap($v2, Validation_Impl_::map($v1, Functions2::curry(function ($a, $b) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:115: characters 16-46
			return function ($c) use (&$f, &$b, &$a) {
				return $f($a, $b, $c);
			};
		})), $s), $s), $s);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * @param Either $v2
	 * @param Either $v3
	 * @param Either $v4
	 * @param Either $v5
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function val5 ($f, $v1, $v2, $v3, $v4, $v5, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:119: characters 21-30
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:119: characters 16-50
		$f = function ($a, $b, $c, $d) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:119: characters 21-30
			return function ($e) use (&$f1, &$c, &$b, &$d, &$a) {
				return $f1($a, $b, $c, $d, $e);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:119: characters 16-50
		$f2 = function ($a, $b, $c) use (&$f) {
			return function ($d) use (&$f, &$c, &$b, &$a) {
				return $f($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:119: characters 3-54
		return Validation_Impl_::ap($v5, Validation_Impl_::ap($v4, Validation_Impl_::ap($v3, Validation_Impl_::ap($v2, Validation_Impl_::map($v1, Functions2::curry(function ($a, $b) use (&$f2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:119: characters 16-50
			return function ($c) use (&$f2, &$b, &$a) {
				return $f2($a, $b, $c);
			};
		})), $s), $s), $s), $s);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * @param Either $v2
	 * @param Either $v3
	 * @param Either $v4
	 * @param Either $v5
	 * @param Either $v6
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function val6 ($f, $v1, $v2, $v3, $v4, $v5, $v6, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:123: characters 21-30
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:123: characters 16-54
		$f = function ($a, $b, $c, $d, $e) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:123: characters 21-30
			return function ($f0) use (&$f1, &$c, &$e, &$b, &$d, &$a) {
				return $f1($a, $b, $c, $d, $e, $f0);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:123: characters 16-54
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:123: characters 3-58
		return Validation_Impl_::ap($v6, Validation_Impl_::ap($v5, Validation_Impl_::ap($v4, Validation_Impl_::ap($v3, Validation_Impl_::ap($v2, Validation_Impl_::map($v1, Functions2::curry(function ($a, $b) use (&$f3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:123: characters 16-54
			return function ($c) use (&$f3, &$b, &$a) {
				return $f3($a, $b, $c);
			};
		})), $s), $s), $s), $s), $s);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * @param Either $v2
	 * @param Either $v3
	 * @param Either $v4
	 * @param Either $v5
	 * @param Either $v6
	 * @param Either $v7
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function val7 ($f, $v1, $v2, $v3, $v4, $v5, $v6, $v7, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:127: characters 21-30
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:127: characters 16-58
		$f = function ($a, $b, $c, $d, $e, $f0) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:127: characters 21-30
			return function ($g) use (&$f1, &$c, &$e, &$f0, &$b, &$d, &$a) {
				return $f1($a, $b, $c, $d, $e, $f0, $g);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:127: characters 16-58
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:127: characters 3-62
		return Validation_Impl_::ap($v7, Validation_Impl_::ap($v6, Validation_Impl_::ap($v5, Validation_Impl_::ap($v4, Validation_Impl_::ap($v3, Validation_Impl_::ap($v2, Validation_Impl_::map($v1, Functions2::curry(function ($a, $b) use (&$f4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:127: characters 16-58
			return function ($c) use (&$f4, &$b, &$a) {
				return $f4($a, $b, $c);
			};
		})), $s), $s), $s), $s), $s), $s);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * @param Either $v2
	 * @param Either $v3
	 * @param Either $v4
	 * @param Either $v5
	 * @param Either $v6
	 * @param Either $v7
	 * @param Either $v8
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function val8 ($f, $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:132: characters 21-30
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:132: characters 16-62
		$f = function ($a, $b, $c, $d, $e, $f0, $g) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:132: characters 21-30
			return function ($h) use (&$f1, &$g, &$c, &$e, &$f0, &$b, &$d, &$a) {
				return $f1($a, $b, $c, $d, $e, $f0, $g, $h);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:132: characters 16-62
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:132: characters 3-66
		return Validation_Impl_::ap($v8, Validation_Impl_::ap($v7, Validation_Impl_::ap($v6, Validation_Impl_::ap($v5, Validation_Impl_::ap($v4, Validation_Impl_::ap($v3, Validation_Impl_::ap($v2, Validation_Impl_::map($v1, Functions2::curry(function ($a, $b) use (&$f5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:132: characters 16-62
			return function ($c) use (&$f5, &$b, &$a) {
				return $f5($a, $b, $c);
			};
		})), $s), $s), $s), $s), $s), $s), $s);
	}

	/**
	 * @param \Closure $f
	 * @param Either $v1
	 * @param Either $v2
	 * @param Either $v3
	 * @param Either $v4
	 * @param Either $v5
	 * @param Either $v6
	 * @param Either $v7
	 * @param Either $v8
	 * @param Either $v9
	 * @param \Closure $s
	 * 
	 * @return Either
	 */
	public static function val9 ($f, $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, $s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:137: characters 21-30
		$f1 = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:137: characters 16-66
		$f = function ($a, $b, $c, $d, $e, $f0, $g, $h) use (&$f1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:137: characters 21-30
			return function ($i) use (&$f1, &$g, &$c, &$e, &$f0, &$b, &$d, &$a, &$h) {
				return $f1($a, $b, $c, $d, $e, $f0, $g, $h, $i);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:137: characters 16-66
		$f2 = function ($a, $b, $c, $d, $e, $f0, $g) use (&$f) {
			return function ($h) use (&$f, &$g, &$c, &$e, &$f0, &$b, &$d, &$a) {
				return $f($a, $b, $c, $d, $e, $f0, $g, $h);
			};
		};
		$f3 = function ($a, $b, $c, $d, $e, $f0) use (&$f2) {
			return function ($g) use (&$f2, &$c, &$e, &$f0, &$b, &$d, &$a) {
				return $f2($a, $b, $c, $d, $e, $f0, $g);
			};
		};
		$f4 = function ($a, $b, $c, $d, $e) use (&$f3) {
			return function ($f0) use (&$f3, &$c, &$e, &$b, &$d, &$a) {
				return $f3($a, $b, $c, $d, $e, $f0);
			};
		};
		$f5 = function ($a, $b, $c, $d) use (&$f4) {
			return function ($e) use (&$c, &$f4, &$b, &$d, &$a) {
				return $f4($a, $b, $c, $d, $e);
			};
		};
		$f6 = function ($a, $b, $c) use (&$f5) {
			return function ($d) use (&$f5, &$c, &$b, &$a) {
				return $f5($a, $b, $c, $d);
			};
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:137: characters 3-70
		return Validation_Impl_::ap($v9, Validation_Impl_::ap($v8, Validation_Impl_::ap($v7, Validation_Impl_::ap($v6, Validation_Impl_::ap($v5, Validation_Impl_::ap($v4, Validation_Impl_::ap($v3, Validation_Impl_::ap($v2, Validation_Impl_::map($v1, Functions2::curry(function ($a, $b) use (&$f6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:137: characters 16-66
			return function ($c) use (&$b, &$f6, &$a) {
				return $f6($a, $b, $c);
			};
		})), $s), $s), $s), $s), $s), $s), $s), $s);
	}

	/**
	 * @param Either $e
	 * 
	 * @return Either
	 */
	public static function vnel ($e) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:101: characters 3-11
		return $e;
	}

	/**
	 * @param Either $this
	 * 
	 * @return Either
	 */
	public static function wrapNel ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:94: characters 3-41
		return Eithers::leftMap($this1, Boot::getStaticClosure(Nel_Impl_::class, 'pure'));
	}
}

Boot::registerClass(Validation_Impl_::class, 'thx._Validation.Validation_Impl_');
Boot::registerGetters('thx\\_Validation\\Validation_Impl_', [
	'either' => true
]);
