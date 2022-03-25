<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx
 */

namespace thx\fp\_Map;

use \php\_Boot\HxAnon;
use \haxe\ds\Option;
use \php\Boot;
use \haxe\Exception;
use \thx\Error;
use \haxe\IMap;
use \thx\fp\MapImpl;

final class Map_Impl_ {
	/**
	 * @var int
	 */
	const delta = 5;
	/**
	 * @var int
	 */
	const ratio = 2;

	/**
	 * @param mixed $k
	 * @param mixed $x
	 * @param MapImpl $lhs
	 * @param MapImpl $rhs
	 * 
	 * @return MapImpl
	 */
	public static function balance ($k, $x, $lhs, $rhs) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:140: characters 3-58
		$ls = Map_Impl_::size($lhs);
		$rs = Map_Impl_::size($rhs);
		$xs = $ls + $rs + 1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:141: lines 141-148
		if (($ls + $rs) <= 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:142: characters 4-34
			return MapImpl::Bin($xs, $k, $x, $lhs, $rhs);
		} else if ($rs >= (5 * $ls)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:144: characters 4-37
			return Map_Impl_::rotateLeft($k, $x, $lhs, $rhs);
		} else if ($ls >= (5 * $rs)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:146: characters 4-38
			return Map_Impl_::rotateRight($k, $x, $lhs, $rhs);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:148: characters 4-34
			return MapImpl::Bin($xs, $k, $x, $lhs, $rhs);
		}
	}

	/**
	 * @param mixed $k
	 * @param mixed $v
	 * @param MapImpl $lhs
	 * @param MapImpl $rhs
	 * 
	 * @return MapImpl
	 */
	public static function bin ($k, $v, $lhs, $rhs) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:19: characters 3-58
		return MapImpl::Bin(Map_Impl_::size($lhs) + Map_Impl_::size($rhs) + 1, $k, $v, $lhs, $rhs);
	}

	/**
	 * @param MapImpl $this
	 * @param mixed $key
	 * @param \Closure $comparator
	 * 
	 * @return MapImpl
	 */
	public static function delete ($this1, $key, $comparator) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:62: lines 62-71
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:64: characters 5-8
			return MapImpl::Tip();
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:65: characters 13-17
			$size = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:65: characters 19-21
			$kx = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:65: characters 23-24
			$x = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:65: characters 26-29
			$lhs = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:65: characters 31-34
			$rhs = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:66: characters 12-31
			$__hx__switch = ($comparator($key, $kx)->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:67: characters 15-63
				return Map_Impl_::balance($kx, $x, Map_Impl_::delete($lhs, $key, $comparator), $rhs);
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:68: characters 15-63
				return Map_Impl_::balance($kx, $x, $lhs, Map_Impl_::delete($rhs, $key, $comparator));
			} else if ($__hx__switch === 2) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:69: characters 15-28
				return Map_Impl_::glue($lhs, $rhs);
			}
		}
	}

	/**
	 * @param MapImpl $map
	 * 
	 * @return object
	 */
	public static function deleteFindMax ($map) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:175: lines 175-183
		$__hx__switch = ($map->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:182: characters 5-10
			throw Exception::thrown(new Error("can not return the maximal element of an empty map", null, new _HxAnon_Map_Impl_0("thx/fp/Map.hx", 182, "thx.fp._Map.Map_Impl_", "deleteFindMax")));
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:178: characters 13-14
			$_g = $map->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:178: characters 16-17
			$_g = $map->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:178: characters 19-20
			$_g1 = $map->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:178: characters 22-23
			$_g2 = $map->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:178: characters 25-26
			$_g3 = $map->params[4];
			if ($_g3->index === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:176: characters 22-23
				$l = $_g2;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:176: characters 19-20
				$x = $_g1;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:176: characters 16-17
				$k = $_g;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:177: characters 5-23
				return new _HxAnon_Map_Impl_1($k, $x, $l);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:178: characters 25-26
				$r = $_g3;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:178: characters 22-23
				$l = $_g2;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:178: characters 19-20
				$x = $_g1;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:178: characters 16-17
				$k = $_g;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:179: characters 5-30
				$t = Map_Impl_::deleteFindMax($r);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:180: characters 9-12
				$t1 = $t->k;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:180: characters 17-20
				$t2 = $t->x;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:180: characters 5-47
				return new _HxAnon_Map_Impl_1($t1, $t2, Map_Impl_::balance($k, $x, $l, $t->t));
			}
		}
	}

	/**
	 * @param MapImpl $map
	 * 
	 * @return object
	 */
	public static function deleteFindMin ($map) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:164: lines 164-172
		$__hx__switch = ($map->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:171: characters 5-10
			throw Exception::thrown(new Error("can not return the minimal element of an empty map", null, new _HxAnon_Map_Impl_0("thx/fp/Map.hx", 171, "thx.fp._Map.Map_Impl_", "deleteFindMin")));
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:167: characters 13-14
			$_g = $map->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:167: characters 16-17
			$_g = $map->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:167: characters 19-20
			$_g1 = $map->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:167: characters 22-23
			$_g2 = $map->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:167: characters 25-26
			$_g3 = $map->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:167: characters 22-23
			if ($_g2->index === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:165: characters 19-20
				$x = $_g1;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:165: characters 16-17
				$k = $_g;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:165: characters 27-28
				$r = $_g3;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:166: characters 5-23
				return new _HxAnon_Map_Impl_1($k, $x, $r);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:167: characters 22-23
				$l = $_g2;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:167: characters 19-20
				$x = $_g1;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:167: characters 16-17
				$k = $_g;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:167: characters 25-26
				$r = $_g3;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:168: characters 5-30
				$t = Map_Impl_::deleteFindMin($l);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:169: characters 9-12
				$t1 = $t->k;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:169: characters 17-20
				$t2 = $t->x;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:169: characters 5-47
				return new _HxAnon_Map_Impl_1($t1, $t2, Map_Impl_::balance($k, $x, $t->t, $r));
			}
		}
	}

	/**
	 * @param mixed $k1
	 * @param mixed $x1
	 * @param MapImpl $t1
	 * @param MapImpl $rhs
	 * 
	 * @return MapImpl
	 */
	public static function doubleLeft ($k1, $x1, $t1, $rhs) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:214: lines 214-218
		if ($rhs->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:215: characters 13-14
			$_g = $rhs->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:215: characters 24-46
			$_g = $rhs->params[3];
			if ($_g->index === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:215: characters 28-29
				$_g1 = $_g->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:215: characters 31-33
				$k3 = $_g->params[1];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:215: characters 35-37
				$x3 = $_g->params[2];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:215: characters 39-41
				$t2 = $_g->params[3];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:215: characters 43-45
				$t3 = $_g->params[4];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:215: characters 20-22
				$x2 = $rhs->params[2];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:215: characters 16-18
				$k2 = $rhs->params[1];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:215: characters 48-50
				$t4 = $rhs->params[4];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:216: characters 5-58
				$lhs = MapImpl::Bin(Map_Impl_::size($t1) + Map_Impl_::size($t2) + 1, $k1, $x1, $t1, $t2);
				$rhs = MapImpl::Bin(Map_Impl_::size($t3) + Map_Impl_::size($t4) + 1, $k2, $x2, $t3, $t4);
				return MapImpl::Bin(Map_Impl_::size($lhs) + Map_Impl_::size($rhs) + 1, $k3, $x3, $lhs, $rhs);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:217: characters 12-17
				throw Exception::thrown(new Error("damn it, this should never happen", null, new _HxAnon_Map_Impl_0("thx/fp/Map.hx", 217, "thx.fp._Map.Map_Impl_", "doubleLeft")));
			}
		} else {
			throw Exception::thrown(new Error("damn it, this should never happen", null, new _HxAnon_Map_Impl_0("thx/fp/Map.hx", 217, "thx.fp._Map.Map_Impl_", "doubleLeft")));
		}
	}

	/**
	 * @param mixed $k1
	 * @param mixed $x1
	 * @param MapImpl $lhs
	 * @param MapImpl $t4
	 * 
	 * @return MapImpl
	 */
	public static function doubleRight ($k1, $x1, $lhs, $t4) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:221: lines 221-225
		if ($lhs->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:222: characters 13-14
			$_g = $lhs->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:222: characters 28-50
			$_g = $lhs->params[4];
			if ($_g->index === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:222: characters 32-33
				$_g1 = $_g->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:222: characters 35-37
				$k3 = $_g->params[1];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:222: characters 39-41
				$x3 = $_g->params[2];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:222: characters 43-45
				$t2 = $_g->params[3];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:222: characters 47-49
				$t3 = $_g->params[4];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:222: characters 24-26
				$t1 = $lhs->params[3];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:222: characters 20-22
				$x2 = $lhs->params[2];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:222: characters 16-18
				$k2 = $lhs->params[1];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:223: characters 5-58
				$lhs = MapImpl::Bin(Map_Impl_::size($t1) + Map_Impl_::size($t2) + 1, $k2, $x2, $t1, $t2);
				$rhs = MapImpl::Bin(Map_Impl_::size($t3) + Map_Impl_::size($t4) + 1, $k1, $x1, $t3, $t4);
				return MapImpl::Bin(Map_Impl_::size($lhs) + Map_Impl_::size($rhs) + 1, $k3, $x3, $lhs, $rhs);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:224: characters 12-17
				throw Exception::thrown(new Error("damn it, this should never happen", null, new _HxAnon_Map_Impl_0("thx/fp/Map.hx", 224, "thx.fp._Map.Map_Impl_", "doubleRight")));
			}
		} else {
			throw Exception::thrown(new Error("damn it, this should never happen", null, new _HxAnon_Map_Impl_0("thx/fp/Map.hx", 224, "thx.fp._Map.Map_Impl_", "doubleRight")));
		}
	}

	/**
	 * @return MapImpl
	 */
	public static function empty () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:13: characters 3-13
		return MapImpl::Tip();
	}

	/**
	 * @param MapImpl $this
	 * @param mixed $b
	 * @param \Closure $f
	 * 
	 * @return mixed
	 */
	public static function foldLeft ($this1, $b, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:86: lines 86-91
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:88: characters 5-6
			return $b;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:89: characters 13-14
			$_g = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:89: characters 16-17
			$_g = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:89: characters 19-20
			$x = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:89: characters 22-23
			$l = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:89: characters 25-26
			$r = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:90: characters 5-42
			return Map_Impl_::foldLeft($r, Map_Impl_::foldLeft($l, $f($b, $x), $f), $f);
		}
	}

	/**
	 * @param MapImpl $this
	 * @param mixed $b
	 * @param \Closure $f
	 * 
	 * @return mixed
	 */
	public static function foldLeftAll ($this1, $b, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:114: lines 114-119
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:116: characters 5-6
			return $b;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:117: characters 13-14
			$_g = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:117: characters 16-18
			$kx = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:117: characters 20-21
			$x = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:117: characters 23-24
			$l = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:117: characters 26-27
			$r = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:118: characters 5-52
			return Map_Impl_::foldLeftAll($r, Map_Impl_::foldLeftAll($l, $f($b, $kx, $x), $f), $f);
		}
	}

	/**
	 * @param MapImpl $this
	 * @param mixed $b
	 * @param \Closure $f
	 * 
	 * @return mixed
	 */
	public static function foldLeftKeys ($this1, $b, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:106: lines 106-111
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:108: characters 5-6
			return $b;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:109: characters 13-14
			$_g = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:109: characters 20-21
			$_g = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:109: characters 16-18
			$kx = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:109: characters 23-24
			$l = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:109: characters 26-27
			$r = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:110: characters 5-51
			return Map_Impl_::foldLeftKeys($r, Map_Impl_::foldLeftKeys($l, $f($b, $kx), $f), $f);
		}
	}

	/**
	 * @param MapImpl $this
	 * @param mixed $b
	 * @param \Closure $f
	 * 
	 * @return mixed
	 */
	public static function foldLeftTuples ($this1, $b, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:122: lines 122-127
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:124: characters 5-6
			return $b;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:125: characters 13-14
			$_g = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:125: characters 16-18
			$kx = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:125: characters 20-21
			$x = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:125: characters 23-24
			$l = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:125: characters 26-27
			$r = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:126: characters 44-60
			$this1 = new _HxAnon_Map_Impl_2($kx, $x);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:126: characters 5-69
			return Map_Impl_::foldLeftTuples($r, Map_Impl_::foldLeftTuples($l, $f($b, $this1), $f), $f);
		}
	}

	/**
	 * @param IMap $map
	 * @param \Closure $comparator
	 * 
	 * @return MapImpl
	 */
	public static function fromNative ($map, $comparator) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:22: characters 3-19
		$r = MapImpl::Tip();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:23: characters 15-25
		$key = $map->keys();
		while ($key->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:23: lines 23-24
			$key1 = $key->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:24: characters 4-47
			$r = Map_Impl_::insert($r, $key1, $map->get($key1), $comparator);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:25: characters 3-11
		return $r;
	}

	/**
	 * @param MapImpl $this
	 * @param MapImpl $that
	 * 
	 * @return MapImpl
	 */
	public static function glue ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:152: lines 152-161
		if ($this1->index === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:153: characters 19-23
			return $that;
		} else if ($that->index === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:154: characters 19-23
			return $this1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:155: characters 10-11
			$l = $this1;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:155: characters 13-14
			$r = $that;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:155: lines 155-160
			if (Map_Impl_::size($l) > Map_Impl_::size($r)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:156: characters 5-30
				$t = Map_Impl_::deleteFindMax($l);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:157: characters 5-30
				return Map_Impl_::balance($t->k, $t->x, $t->t, $r);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:158: characters 10-11
				$l = $this1;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:158: characters 13-14
				$r = $that;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:159: characters 5-30
				$t = Map_Impl_::deleteFindMin($r);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:160: characters 5-30
				return Map_Impl_::balance($t->k, $t->x, $l, $t->t);
			}
		}
	}

	/**
	 * @param MapImpl $this
	 * @param mixed $kx
	 * @param mixed $x
	 * @param \Closure $comparator
	 * 
	 * @return MapImpl
	 */
	public static function insert ($this1, $kx, $x, $comparator) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:74: lines 74-83
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:76: characters 5-21
			return MapImpl::Bin(1, $kx, $x, MapImpl::Tip(), MapImpl::Tip());
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:77: characters 13-15
			$sz = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:77: characters 17-19
			$ky = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:77: characters 21-22
			$y = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:77: characters 24-27
			$lhs = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:77: characters 29-32
			$rhs = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:78: characters 12-30
			$__hx__switch = ($comparator($kx, $ky)->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:79: characters 15-65
				return Map_Impl_::balance($ky, $y, Map_Impl_::insert($lhs, $kx, $x, $comparator), $rhs);
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:80: characters 15-65
				return Map_Impl_::balance($ky, $y, $lhs, Map_Impl_::insert($rhs, $kx, $x, $comparator));
			} else if ($__hx__switch === 2) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:81: characters 15-39
				return MapImpl::Bin($sz, $kx, $x, $lhs, $rhs);
			}
		}
	}

	/**
	 * @param MapImpl $this
	 * @param mixed $key
	 * @param \Closure $comparator
	 * 
	 * @return Option
	 */
	public static function lookup ($this1, $key, $comparator) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:29: lines 29-42
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:31: characters 5-16
			return Option::None();
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:32: characters 13-17
			$size = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:32: characters 19-23
			$xkey = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:32: characters 25-31
			$xvalue = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:32: characters 33-36
			$lhs = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:32: characters 38-41
			$rhs = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:33: characters 5-35
			$c = $comparator($key, $xkey);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:34: lines 34-41
			$__hx__switch = ($c->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:36: characters 7-41
				return Map_Impl_::lookup($lhs, $key, $comparator);
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:38: characters 7-41
				return Map_Impl_::lookup($rhs, $key, $comparator);
			} else if ($__hx__switch === 2) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:40: characters 7-26
				return Option::Some($xvalue);
			}
		}
	}

	/**
	 * @param MapImpl $this
	 * @param mixed $key
	 * @param \Closure $comparator
	 * 
	 * @return Option
	 */
	public static function lookupTuple ($this1, $key, $comparator) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:46: lines 46-59
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:48: characters 5-16
			return Option::None();
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:49: characters 13-17
			$size = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:49: characters 19-23
			$xkey = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:49: characters 25-31
			$xvalue = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:49: characters 33-36
			$lhs = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:49: characters 38-41
			$rhs = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:50: characters 5-35
			$c = $comparator($key, $xkey);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:51: lines 51-58
			$__hx__switch = ($c->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:53: characters 7-46
				return Map_Impl_::lookupTuple($lhs, $key, $comparator);
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:55: characters 7-46
				return Map_Impl_::lookupTuple($rhs, $key, $comparator);
			} else if ($__hx__switch === 2) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:57: characters 19-42
				$this1 = new _HxAnon_Map_Impl_2($xkey, $xvalue);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:57: characters 7-43
				return Option::Some($this1);
			}
		}
	}

	/**
	 * @param MapImpl $this
	 * @param \Closure $f
	 * 
	 * @return MapImpl
	 */
	public static function map ($this1, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:94: lines 94-97
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:95: characters 14-17
			return MapImpl::Tip();
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:96: characters 13-15
			$sz = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:96: characters 17-19
			$ky = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:96: characters 21-22
			$y = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:96: characters 24-27
			$lhs = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:96: characters 29-32
			$rhs = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:96: characters 47-51
			$tmp = $f($y);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:96: characters 53-63
			$tmp1 = Map_Impl_::map($lhs, $f);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:96: characters 35-76
			return MapImpl::Bin($sz, $ky, $tmp, $tmp1, Map_Impl_::map($rhs, $f));
		}
	}

	/**
	 * @param mixed $k
	 * @param mixed $x
	 * @param MapImpl $lhs
	 * @param MapImpl $rhs
	 * 
	 * @return MapImpl
	 */
	public static function rotateLeft ($k, $x, $lhs, $rhs) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:186: lines 186-191
		if ($rhs->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:187: characters 13-14
			$_g = $rhs->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:187: characters 16-17
			$_g = $rhs->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:187: characters 19-20
			$_g = $rhs->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:187: characters 22-24
			$ly = $rhs->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:187: characters 26-28
			$ry = $rhs->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:187: lines 187-190
			if (Map_Impl_::size($ly) < (2 * Map_Impl_::size($ry))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:188: characters 5-31
				return Map_Impl_::singleLeft($k, $x, $lhs, $rhs);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:190: characters 5-31
				return Map_Impl_::doubleLeft($k, $x, $lhs, $rhs);
			}
		} else {
			return Map_Impl_::doubleLeft($k, $x, $lhs, $rhs);
		}
	}

	/**
	 * @param mixed $k
	 * @param mixed $x
	 * @param MapImpl $lhs
	 * @param MapImpl $rhs
	 * 
	 * @return MapImpl
	 */
	public static function rotateRight ($k, $x, $lhs, $rhs) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:194: lines 194-199
		if ($lhs->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:195: characters 13-14
			$_g = $lhs->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:195: characters 16-17
			$_g = $lhs->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:195: characters 19-20
			$_g = $lhs->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:195: characters 22-24
			$ly = $lhs->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:195: characters 26-28
			$ry = $lhs->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:195: lines 195-198
			if (Map_Impl_::size($ry) < (2 * Map_Impl_::size($ly))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:196: characters 5-32
				return Map_Impl_::singleRight($k, $x, $lhs, $rhs);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:198: characters 5-32
				return Map_Impl_::doubleRight($k, $x, $lhs, $rhs);
			}
		} else {
			return Map_Impl_::doubleRight($k, $x, $lhs, $rhs);
		}
	}

	/**
	 * @param mixed $k1
	 * @param mixed $x1
	 * @param MapImpl $t1
	 * @param MapImpl $rhs
	 * 
	 * @return MapImpl
	 */
	public static function singleLeft ($k1, $x1, $t1, $rhs) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:202: lines 202-205
		if ($rhs->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:203: characters 13-14
			$_g = $rhs->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:203: characters 16-18
			$k2 = $rhs->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:203: characters 20-22
			$x2 = $rhs->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:203: characters 24-26
			$t2 = $rhs->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:203: characters 28-30
			$t3 = $rhs->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:203: characters 33-69
			$lhs = MapImpl::Bin(Map_Impl_::size($t1) + Map_Impl_::size($t2) + 1, $k1, $x1, $t1, $t2);
			return MapImpl::Bin(Map_Impl_::size($lhs) + Map_Impl_::size($t3) + 1, $k2, $x2, $lhs, $t3);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:204: characters 12-17
			throw Exception::thrown(new Error("damn it, this should never happen", null, new _HxAnon_Map_Impl_0("thx/fp/Map.hx", 204, "thx.fp._Map.Map_Impl_", "singleLeft")));
		}
	}

	/**
	 * @param mixed $k1
	 * @param mixed $x1
	 * @param MapImpl $lhs
	 * @param MapImpl $t3
	 * 
	 * @return MapImpl
	 */
	public static function singleRight ($k1, $x1, $lhs, $t3) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:208: lines 208-211
		if ($lhs->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:209: characters 13-14
			$_g = $lhs->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:209: characters 16-18
			$k2 = $lhs->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:209: characters 20-22
			$x2 = $lhs->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:209: characters 24-26
			$t1 = $lhs->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:209: characters 28-30
			$t2 = $lhs->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:209: characters 33-69
			$rhs = MapImpl::Bin(Map_Impl_::size($t2) + Map_Impl_::size($t3) + 1, $k1, $x1, $t2, $t3);
			return MapImpl::Bin(Map_Impl_::size($t1) + Map_Impl_::size($rhs) + 1, $k2, $x2, $t1, $rhs);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:210: characters 12-17
			throw Exception::thrown(new Error("damn it, this should never happen", null, new _HxAnon_Map_Impl_0("thx/fp/Map.hx", 210, "thx.fp._Map.Map_Impl_", "singleRight")));
		}
	}

	/**
	 * @param mixed $k
	 * @param mixed $v
	 * 
	 * @return MapImpl
	 */
	public static function singleton ($k, $v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:16: characters 3-32
		return MapImpl::Bin(1, $k, $v, MapImpl::Tip(), MapImpl::Tip());
	}

	/**
	 * @param MapImpl $this
	 * 
	 * @return int
	 */
	public static function size ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:130: lines 130-133
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:131: characters 14-15
			return 0;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:132: characters 19-20
			$_g = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:132: characters 22-23
			$_g = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:132: characters 25-26
			$_g = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:132: characters 28-29
			$_g = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:132: characters 13-17
			$size = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:132: characters 32-36
			return $size;
		}
	}

	/**
	 * @param MapImpl $this
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function values ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:100: lines 100-103
		return Map_Impl_::foldLeft($this1, new \Array_hx(), function ($acc, $v) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:101: characters 4-15
			$acc->arr[$acc->length++] = $v;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/fp/Map.hx:102: characters 4-14
			return $acc;
		});
	}
}

class _HxAnon_Map_Impl_0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

class _HxAnon_Map_Impl_1 extends HxAnon {
	function __construct($k, $x, $t) {
		$this->k = $k;
		$this->x = $x;
		$this->t = $t;
	}
}

class _HxAnon_Map_Impl_2 extends HxAnon {
	function __construct($_0, $_1) {
		$this->_0 = $_0;
		$this->_1 = $_1;
	}
}

Boot::registerClass(Map_Impl_::class, 'thx.fp._Map.Map_Impl_');
