<?php
/**
 */

namespace thx\_Nel;

use \php\_Boot\HxAnon;
use \haxe\ds\Option;
use \php\Boot;
use \thx\Ints;
use \thx\NonEmptyList;
use \thx\Arrays;

final class Nel_Impl_ {
	/**
	 * Appends another non-empty list to this `Nel<A>`.
	 * Warning: this operation is `O(n)`
	 * 
	 * @param NonEmptyList $this
	 * @param NonEmptyList $nel
	 * 
	 * @return NonEmptyList
	 */
	public static function append ($this1, $nel) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:80: lines 80-83
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:81: characters 19-20
			$x = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:81: characters 23-38
			return NonEmptyList::ConsNel($x, $nel);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:82: characters 20-21
			$x = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:82: characters 23-25
			$xs = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:82: characters 28-54
			return NonEmptyList::ConsNel($x, Nel_Impl_::append($xs, $nel));
		}
	}

	/**
	 * @param NonEmptyList $this
	 * @param mixed[]|\Array_hx $xs
	 * 
	 * @return NonEmptyList
	 */
	public static function concat ($this1, $xs) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:86: characters 19-36
		$_g = Nel_Impl_::fromArray($xs);
		$__hx__switch = ($_g->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:87: characters 17-22
			$other = $_g->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:87: characters 25-53
			return Nel_Impl_::append($this1, $other);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:88: characters 18-22
			return $this1;
		}
	}

	/**
	 * Constructs a `Nel<A>` from a head element and tail `Nel<A>`
	 * 
	 * @param mixed $a
	 * @param NonEmptyList $nl
	 * 
	 * @return NonEmptyList
	 */
	public static function cons ($a, $nl) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:32: characters 5-26
		return NonEmptyList::ConsNel($a, $nl);
	}

	/**
	 * Applies an `A -> Nel<B>` function to each element in this `Nel<A>` and flattens the result to create a new `Nel<B>`
	 * 
	 * @param NonEmptyList $this
	 * @param \Closure $f
	 * 
	 * @return NonEmptyList
	 */
	public static function flatMap ($this1, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:58: lines 58-61
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:59: characters 19-20
			$x = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:59: characters 23-27
			return $f($x);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:60: characters 20-21
			$x = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:60: characters 23-25
			$xs = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:60: characters 28-58
			return Nel_Impl_::append($f($x), Nel_Impl_::flatMap($xs, $f));
		}
	}

	/**
	 * Applies a reducing function to this `Nel<A>`
	 * 
	 * @param NonEmptyList $this
	 * @param \Closure $f
	 * 
	 * @return mixed
	 */
	public static function fold ($this1, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:67: lines 67-70
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:68: characters 19-20
			$x = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:68: characters 23-24
			return $x;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:69: characters 20-21
			$x = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:69: characters 23-25
			$xs = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:69: characters 28-44
			return $f($x, Nel_Impl_::fold($xs, $f));
		}
	}

	/**
	 * Attempts to construct a `Nel<A>` from a possibly-empty `Array<A>`.  If the array
	 * is empty, `None` is returned.
	 * 
	 * @param mixed[]|\Array_hx $arr
	 * 
	 * @return Option
	 */
	public static function fromArray ($arr) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:40: lines 40-46
		if ($arr->length === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:40: characters 28-32
			return Option::None();
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:41: characters 9-55
			$res = NonEmptyList::Single(($arr->arr[$arr->length - 1] ?? null));
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:42: characters 19-57
			$i = Ints::rangeIter($arr->length - 2, -1, -1);
			while ($i->hasNext()) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:42: lines 42-44
				$i1 = $i->next();
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:43: characters 11-37
				$res = NonEmptyList::ConsNel(($arr->arr[$i1] ?? null), $res);
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:45: characters 9-18
			return Option::Some($res);
		}
	}

	/**
	 * Gets the head item of this `Nel<A>`, which is guaranteed to exist
	 * 
	 * @param NonEmptyList $this
	 * 
	 * @return mixed
	 */
	public static function head ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:96: lines 96-99
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:97: characters 19-20
			$x = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:97: characters 24-25
			return $x;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:98: characters 20-21
			$x = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:98: characters 23-25
			$xs = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:98: characters 29-30
			return $x;
		}
	}

	/**
	 * Gets the initial elements (all but the last element) of the `Nel<A>` as a possibly-empty `ReadonlyArray<A>`
	 * Warning: this operation is `O(n)`
	 * 
	 * @param NonEmptyList $this
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function init ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:118: lines 118-121
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:119: characters 19-20
			$x = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:119: characters 24-26
			return new \Array_hx();
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:120: characters 20-21
			$x = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:120: characters 23-25
			$xs = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:120: characters 29-70
			return (\Array_hx::wrap([$x]))->concat(Nel_Impl_::init($xs));
		}
	}

	/**
	 * @param NonEmptyList $this
	 * @param mixed $a
	 * 
	 * @return NonEmptyList
	 */
	public static function intersperse ($this1, $a) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:192: lines 192-195
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:193: characters 19-20
			$x = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:193: characters 23-32
			return NonEmptyList::Single($x);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:194: characters 20-21
			$x = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:194: characters 23-25
			$xs = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:194: characters 28-69
			return NonEmptyList::ConsNel($x, NonEmptyList::ConsNel($a, Nel_Impl_::intersperse($xs, $a)));
		}
	}

	/**
	 * Gets the last item of the `Nel<A>`, which is guaranteed to exist.
	 * Warning: this operation is `O(n)`
	 * 
	 * @param NonEmptyList $this
	 * 
	 * @return mixed
	 */
	public static function last ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:130: lines 130-133
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:131: characters 19-20
			$x = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:131: characters 24-25
			return $x;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:132: characters 20-21
			$x = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:132: characters 23-25
			$xs = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:132: characters 29-38
			return Nel_Impl_::last($xs);
		}
	}

	/**
	 * Applies an `A -> B` function to each element in this `Nel<A>` to create a new `Nel<B>`
	 * 
	 * @param NonEmptyList $this
	 * @param \Closure $f
	 * 
	 * @return NonEmptyList
	 */
	public static function map ($this1, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:52: characters 20-35
		$fb = $f;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:52: characters 5-36
		return Nel_Impl_::flatMap($this1, function ($v) use (&$fb) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:52: characters 20-35
			return Nel_Impl_::pure($fb($v));
		});
	}

	/**
	 * Constructs a `Nel<A>` from a head element and tail `Array<A>`
	 * 
	 * @param mixed $hd
	 * @param mixed[]|\Array_hx $tl
	 * 
	 * @return NonEmptyList
	 */
	public static function nel ($hd, $tl) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:16: characters 19-32
		$_g = Nel_Impl_::fromArray($tl);
		$__hx__switch = ($_g->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:17: characters 17-20
			$nel = $_g->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:17: characters 23-36
			return Nel_Impl_::cons($hd, $nel);
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:18: characters 18-26
			return Nel_Impl_::pure($hd);
		}
	}

	/**
	 * Returns the last item of the `Nel<A>` and a new `Nel<A>` with the last item removed.
	 * Does not modify this `Nel<A>`.
	 * Warning: this operation is `O(n)`
	 * 
	 * @param NonEmptyList $this
	 * 
	 * @return object
	 */
	public static function pop ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:155: characters 12-37
		$_0 = Nel_Impl_::last($this1);
		$this2 = new _HxAnon_Nel_Impl_0($_0, Nel_Impl_::init($this1));
		return $this2;
	}

	/**
	 * Constructs a `Nel<A>` from a head element
	 * 
	 * @param mixed $a
	 * 
	 * @return NonEmptyList
	 */
	public static function pure ($a) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:26: characters 5-21
		return NonEmptyList::Single($a);
	}

	/**
	 * Returns a new `Nel<A>` with the given item added at the end.
	 * Does not modify this `Nel<A>`.
	 * Warning: this operation is `O(n)`
	 * 
	 * @param NonEmptyList $this
	 * @param mixed $a
	 * 
	 * @return NonEmptyList
	 */
	public static function push ($this1, $a) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:144: characters 5-29
		return Nel_Impl_::append($this1, NonEmptyList::Single($a));
	}

	/**
	 * Gets a `Semigroup` instance for `Nel<A>`, using the `append` method of `Nel<A>`.
	 * 
	 * @return \Closure
	 */
	public static function semigroup () {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:202: characters 5-90
		return function ($nl, $nr) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:202: characters 47-87
			return Nel_Impl_::append($nl, $nr);
		};
	}

	/**
	 * Returns the first item of the `Nel<A>` and a new `Nel<A>` with the first item removed.
	 * Does not modify this `Nel<A>`.
	 * 
	 * @param NonEmptyList $this
	 * 
	 * @return object
	 */
	public static function shift ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:173: characters 12-37
		$_0 = Nel_Impl_::head($this1);
		$this2 = new _HxAnon_Nel_Impl_0($_0, Nel_Impl_::tail($this1));
		return $this2;
	}

	/**
	 * Gets the tail (all but the first element) of the `Nel<A>` as a possibly-empty `ReadonlyArray<A>`
	 * 
	 * @param NonEmptyList $this
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function tail ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:106: lines 106-109
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:107: characters 19-20
			$x = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:107: characters 24-26
			return new \Array_hx();
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:108: characters 20-21
			$x = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:108: characters 23-25
			$xs = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:108: characters 29-41
			return Nel_Impl_::toArray($xs);
		}
	}

	/**
	 * Converts the `Nel<A>` to a `ReadonlyArray<A>`
	 * Warning: this operation is `O(n)`
	 * 
	 * @param NonEmptyList $this
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function toArray ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:182: lines 182-187
		$go = null;
		$go = function ($acc, $xs) use (&$go) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:183: lines 183-186
			$__hx__switch = ($xs->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:184: characters 21-22
				$x = $xs->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:184: characters 25-38
				return Arrays::append($acc, $x);
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:185: characters 22-23
				$x = $xs->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:185: characters 25-27
				$xs1 = $xs->params[1];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:185: characters 30-51
				return $go(Arrays::append($acc, $x), $xs1);
			}
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:188: characters 5-24
		return $go(new \Array_hx(), $this1);
	}

	/**
	 * Returns a new `Nel<A>` with the given item added at the front.
	 * Does not modify this `Nel<A>`.
	 * 
	 * @param NonEmptyList $this
	 * @param mixed $a
	 * 
	 * @return NonEmptyList
	 */
	public static function unshift ($this1, $a) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Nel.hx:164: characters 5-28
		return NonEmptyList::ConsNel($a, $this1);
	}
}

class _HxAnon_Nel_Impl_0 extends HxAnon {
	function __construct($_0, $_1) {
		$this->_0 = $_0;
		$this->_1 = $_1;
	}
}

Boot::registerClass(Nel_Impl_::class, 'thx._Nel.Nel_Impl_');
