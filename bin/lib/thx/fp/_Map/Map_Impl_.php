<?php
/**
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:130: lines 130-132
		$ls = Map_Impl_::size($lhs);
		$rs = Map_Impl_::size($rhs);
		$xs = $ls + $rs + 1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:133: lines 133-140
		if (($ls + $rs) <= 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:134: characters 7-37
			return MapImpl::Bin($xs, $k, $x, $lhs, $rhs);
		} else if ($rs >= (5 * $ls)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:136: characters 7-40
			return Map_Impl_::rotateLeft($k, $x, $lhs, $rhs);
		} else if ($ls >= (5 * $rs)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:138: characters 7-41
			return Map_Impl_::rotateRight($k, $x, $lhs, $rhs);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:140: characters 7-37
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:17: characters 5-60
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:58: lines 58-67
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:60: characters 7-10
			return MapImpl::Tip();
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:61: characters 14-18
			$size = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:61: characters 20-22
			$kx = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:61: characters 24-25
			$x = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:61: characters 27-30
			$lhs = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:61: characters 32-35
			$rhs = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:62: characters 14-33
			$__hx__switch = ($comparator($key, $kx)->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:63: characters 18-66
				return Map_Impl_::balance($kx, $x, Map_Impl_::delete($lhs, $key, $comparator), $rhs);
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:64: characters 18-66
				return Map_Impl_::balance($kx, $x, $lhs, Map_Impl_::delete($rhs, $key, $comparator));
			} else if ($__hx__switch === 2) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:65: characters 18-31
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:164: lines 164-172
		$__hx__switch = ($map->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:171: characters 7-12
			throw Exception::thrown(new Error("can not return the maximal element of an empty map", null, new _HxAnon_Map_Impl_0("thx/fp/Map.hx", 171, "thx.fp._Map.Map_Impl_", "deleteFindMax")));
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:167: characters 14-15
			$_g = $map->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:167: characters 17-18
			$_g = $map->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:167: characters 20-21
			$_g1 = $map->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:167: characters 23-24
			$_g2 = $map->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:167: characters 26-27
			$_g3 = $map->params[4];
			if ($_g3->index === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:165: characters 23-24
				$l = $_g2;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:165: characters 20-21
				$x = $_g1;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:165: characters 17-18
				$k = $_g;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:166: characters 7-30
				return new _HxAnon_Map_Impl_1($k, $x, $l);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:167: characters 26-27
				$r = $_g3;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:167: characters 23-24
				$l = $_g2;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:167: characters 20-21
				$x = $_g1;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:167: characters 17-18
				$k = $_g;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:168: characters 7-32
				$t = Map_Impl_::deleteFindMax($r);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:169: characters 13-16
				$t1 = $t->k;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:169: characters 22-25
				$t2 = $t->x;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:169: characters 7-54
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:154: lines 154-162
		$__hx__switch = ($map->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:161: characters 7-12
			throw Exception::thrown(new Error("can not return the minimal element of an empty map", null, new _HxAnon_Map_Impl_0("thx/fp/Map.hx", 161, "thx.fp._Map.Map_Impl_", "deleteFindMin")));
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:157: characters 14-15
			$_g = $map->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:157: characters 17-18
			$_g = $map->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:157: characters 20-21
			$_g1 = $map->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:157: characters 23-24
			$_g2 = $map->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:157: characters 26-27
			$_g3 = $map->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:157: characters 23-24
			if ($_g2->index === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:155: characters 20-21
				$x = $_g1;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:155: characters 17-18
				$k = $_g;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:155: characters 28-29
				$r = $_g3;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:156: characters 7-29
				return new _HxAnon_Map_Impl_1($k, $x, $r);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:157: characters 23-24
				$l = $_g2;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:157: characters 20-21
				$x = $_g1;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:157: characters 17-18
				$k = $_g;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:157: characters 26-27
				$r = $_g3;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:158: characters 7-32
				$t = Map_Impl_::deleteFindMin($l);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:159: characters 13-16
				$t1 = $t->k;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:159: characters 22-25
				$t2 = $t->x;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:159: characters 7-54
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:203: lines 203-207
		if ($rhs->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:204: characters 16-17
			$_g = $rhs->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:204: characters 27-49
			$_g = $rhs->params[3];
			if ($_g->index === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:204: characters 31-32
				$_g1 = $_g->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:204: characters 34-36
				$k3 = $_g->params[1];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:204: characters 38-40
				$x3 = $_g->params[2];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:204: characters 42-44
				$t2 = $_g->params[3];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:204: characters 46-48
				$t3 = $_g->params[4];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:204: characters 23-25
				$x2 = $rhs->params[2];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:204: characters 19-21
				$k2 = $rhs->params[1];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:204: characters 51-53
				$t4 = $rhs->params[4];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:205: characters 9-62
				$lhs = MapImpl::Bin(Map_Impl_::size($t1) + Map_Impl_::size($t2) + 1, $k1, $x1, $t1, $t2);
				$rhs = MapImpl::Bin(Map_Impl_::size($t3) + Map_Impl_::size($t4) + 1, $k2, $x2, $t3, $t4);
				return MapImpl::Bin(Map_Impl_::size($lhs) + Map_Impl_::size($rhs) + 1, $k3, $x3, $lhs, $rhs);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:206: characters 15-20
				throw Exception::thrown(new Error("damn it, this should never happen", null, new _HxAnon_Map_Impl_0("thx/fp/Map.hx", 206, "thx.fp._Map.Map_Impl_", "doubleLeft")));
			}
		} else {
			throw Exception::thrown(new Error("damn it, this should never happen", null, new _HxAnon_Map_Impl_0("thx/fp/Map.hx", 206, "thx.fp._Map.Map_Impl_", "doubleLeft")));
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:210: lines 210-214
		if ($lhs->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:211: characters 16-17
			$_g = $lhs->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:211: characters 31-53
			$_g = $lhs->params[4];
			if ($_g->index === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:211: characters 35-36
				$_g1 = $_g->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:211: characters 38-40
				$k3 = $_g->params[1];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:211: characters 42-44
				$x3 = $_g->params[2];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:211: characters 46-48
				$t2 = $_g->params[3];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:211: characters 50-52
				$t3 = $_g->params[4];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:211: characters 27-29
				$t1 = $lhs->params[3];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:211: characters 23-25
				$x2 = $lhs->params[2];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:211: characters 19-21
				$k2 = $lhs->params[1];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:212: characters 9-62
				$lhs = MapImpl::Bin(Map_Impl_::size($t1) + Map_Impl_::size($t2) + 1, $k2, $x2, $t1, $t2);
				$rhs = MapImpl::Bin(Map_Impl_::size($t3) + Map_Impl_::size($t4) + 1, $k1, $x1, $t3, $t4);
				return MapImpl::Bin(Map_Impl_::size($lhs) + Map_Impl_::size($rhs) + 1, $k3, $x3, $lhs, $rhs);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:213: characters 15-20
				throw Exception::thrown(new Error("damn it, this should never happen", null, new _HxAnon_Map_Impl_0("thx/fp/Map.hx", 213, "thx.fp._Map.Map_Impl_", "doubleRight")));
			}
		} else {
			throw Exception::thrown(new Error("damn it, this should never happen", null, new _HxAnon_Map_Impl_0("thx/fp/Map.hx", 213, "thx.fp._Map.Map_Impl_", "doubleRight")));
		}
	}

	/**
	 * @return MapImpl
	 */
	public static function empty () {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:13: characters 5-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:81: lines 81-86
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:83: characters 9-10
			return $b;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:84: characters 16-17
			$_g = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:84: characters 19-20
			$_g = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:84: characters 22-23
			$x = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:84: characters 25-26
			$l = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:84: characters 28-29
			$r = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:85: characters 9-46
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:105: lines 105-110
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:107: characters 9-10
			return $b;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:108: characters 16-17
			$_g = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:108: characters 19-21
			$kx = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:108: characters 23-24
			$x = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:108: characters 26-27
			$l = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:108: characters 29-30
			$r = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:109: characters 9-56
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:97: lines 97-102
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:99: characters 9-10
			return $b;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:100: characters 16-17
			$_g = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:100: characters 23-24
			$_g = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:100: characters 19-21
			$kx = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:100: characters 26-27
			$l = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:100: characters 29-30
			$r = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:101: characters 9-55
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:113: lines 113-118
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:115: characters 9-10
			return $b;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:116: characters 16-17
			$_g = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:116: characters 19-21
			$kx = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:116: characters 23-24
			$x = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:116: characters 26-27
			$l = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:116: characters 29-30
			$r = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:117: characters 48-64
			$this1 = new _HxAnon_Map_Impl_2($kx, $x);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:117: characters 9-73
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:20: characters 5-21
		$r = MapImpl::Tip();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:21: characters 16-26
		$key = $map->keys();
		while ($key->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:21: lines 21-22
			$key1 = $key->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:22: characters 7-50
			$r = Map_Impl_::insert($r, $key1, $map->get($key1), $comparator);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:23: characters 5-13
		return $r;
	}

	/**
	 * @param MapImpl $this
	 * @param MapImpl $that
	 * 
	 * @return MapImpl
	 */
	public static function glue ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:143: lines 143-152
		if ($this1->index === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:144: characters 20-24
			return $that;
		} else if ($that->index === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:145: characters 20-24
			return $this1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:146: characters 11-12
			$l = $this1;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:146: characters 14-15
			$r = $that;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:146: lines 146-151
			if (Map_Impl_::size($l) > Map_Impl_::size($r)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:147: characters 7-32
				$t = Map_Impl_::deleteFindMax($l);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:148: characters 7-32
				return Map_Impl_::balance($t->k, $t->x, $t->t, $r);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:149: characters 11-12
				$l = $this1;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:149: characters 14-15
				$r = $that;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:150: characters 7-32
				$t = Map_Impl_::deleteFindMin($r);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:151: characters 7-32
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:69: lines 69-78
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:71: characters 7-23
			return MapImpl::Bin(1, $kx, $x, MapImpl::Tip(), MapImpl::Tip());
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:72: characters 14-16
			$sz = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:72: characters 18-20
			$ky = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:72: characters 22-23
			$y = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:72: characters 25-28
			$lhs = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:72: characters 30-33
			$rhs = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:73: characters 14-32
			$__hx__switch = ($comparator($kx, $ky)->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:74: characters 18-68
				return Map_Impl_::balance($ky, $y, Map_Impl_::insert($lhs, $kx, $x, $comparator), $rhs);
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:75: characters 18-68
				return Map_Impl_::balance($ky, $y, $lhs, Map_Impl_::insert($rhs, $kx, $x, $comparator));
			} else if ($__hx__switch === 2) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:76: characters 18-42
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:27: lines 27-40
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:29: characters 9-20
			return Option::None();
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:30: characters 16-20
			$size = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:30: characters 22-26
			$xkey = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:30: characters 28-34
			$xvalue = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:30: characters 36-39
			$lhs = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:30: characters 41-44
			$rhs = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:31: characters 9-39
			$c = $comparator($key, $xkey);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:32: lines 32-39
			$__hx__switch = ($c->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:34: characters 13-47
				return Map_Impl_::lookup($lhs, $key, $comparator);
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:36: characters 13-47
				return Map_Impl_::lookup($rhs, $key, $comparator);
			} else if ($__hx__switch === 2) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:38: characters 13-32
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:43: lines 43-56
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:45: characters 7-18
			return Option::None();
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:46: characters 14-18
			$size = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:46: characters 20-24
			$xkey = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:46: characters 26-32
			$xvalue = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:46: characters 34-37
			$lhs = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:46: characters 39-42
			$rhs = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:47: characters 7-37
			$c = $comparator($key, $xkey);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:48: lines 48-55
			$__hx__switch = ($c->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:50: characters 11-50
				return Map_Impl_::lookupTuple($lhs, $key, $comparator);
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:52: characters 11-50
				return Map_Impl_::lookupTuple($rhs, $key, $comparator);
			} else if ($__hx__switch === 2) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:54: characters 23-46
				$this1 = new _HxAnon_Map_Impl_2($xkey, $xvalue);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:54: characters 11-47
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:88: lines 88-91
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:89: characters 15-18
			return MapImpl::Tip();
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:90: characters 14-16
			$sz = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:90: characters 18-20
			$ky = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:90: characters 22-23
			$y = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:90: characters 25-28
			$lhs = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:90: characters 30-33
			$rhs = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:90: characters 48-52
			$tmp = $f($y);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:90: characters 54-64
			$tmp1 = Map_Impl_::map($lhs, $f);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:90: characters 36-77
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:175: lines 175-180
		if ($rhs->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:176: characters 16-17
			$_g = $rhs->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:176: characters 19-20
			$_g = $rhs->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:176: characters 22-23
			$_g = $rhs->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:176: characters 25-27
			$ly = $rhs->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:176: characters 29-31
			$ry = $rhs->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:176: lines 176-179
			if (Map_Impl_::size($ly) < (2 * Map_Impl_::size($ry))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:177: characters 9-35
				return Map_Impl_::singleLeft($k, $x, $lhs, $rhs);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:179: characters 9-35
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:183: lines 183-188
		if ($lhs->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:184: characters 16-17
			$_g = $lhs->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:184: characters 19-20
			$_g = $lhs->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:184: characters 22-23
			$_g = $lhs->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:184: characters 25-27
			$ly = $lhs->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:184: characters 29-31
			$ry = $lhs->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:184: lines 184-187
			if (Map_Impl_::size($ry) < (2 * Map_Impl_::size($ly))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:185: characters 9-36
				return Map_Impl_::singleRight($k, $x, $lhs, $rhs);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:187: characters 9-36
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:191: lines 191-194
		if ($rhs->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:192: characters 16-17
			$_g = $rhs->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:192: characters 19-21
			$k2 = $rhs->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:192: characters 23-25
			$x2 = $rhs->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:192: characters 27-29
			$t2 = $rhs->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:192: characters 31-33
			$t3 = $rhs->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:192: characters 36-72
			$lhs = MapImpl::Bin(Map_Impl_::size($t1) + Map_Impl_::size($t2) + 1, $k1, $x1, $t1, $t2);
			return MapImpl::Bin(Map_Impl_::size($lhs) + Map_Impl_::size($t3) + 1, $k2, $x2, $lhs, $t3);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:193: characters 15-20
			throw Exception::thrown(new Error("damn it, this should never happen", null, new _HxAnon_Map_Impl_0("thx/fp/Map.hx", 193, "thx.fp._Map.Map_Impl_", "singleLeft")));
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:197: lines 197-200
		if ($lhs->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:198: characters 16-17
			$_g = $lhs->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:198: characters 19-21
			$k2 = $lhs->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:198: characters 23-25
			$x2 = $lhs->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:198: characters 27-29
			$t1 = $lhs->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:198: characters 31-33
			$t2 = $lhs->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:198: characters 36-72
			$rhs = MapImpl::Bin(Map_Impl_::size($t2) + Map_Impl_::size($t3) + 1, $k1, $x1, $t2, $t3);
			return MapImpl::Bin(Map_Impl_::size($t1) + Map_Impl_::size($rhs) + 1, $k2, $x2, $t1, $rhs);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:199: characters 15-20
			throw Exception::thrown(new Error("damn it, this should never happen", null, new _HxAnon_Map_Impl_0("thx/fp/Map.hx", 199, "thx.fp._Map.Map_Impl_", "singleRight")));
		}
	}

	/**
	 * @param mixed $k
	 * @param mixed $v
	 * 
	 * @return MapImpl
	 */
	public static function singleton ($k, $v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:15: characters 5-34
		return MapImpl::Bin(1, $k, $v, MapImpl::Tip(), MapImpl::Tip());
	}

	/**
	 * @param MapImpl $this
	 * 
	 * @return int
	 */
	public static function size ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:121: lines 121-124
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:122: characters 17-18
			return 0;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:123: characters 22-23
			$_g = $this1->params[1];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:123: characters 25-26
			$_g = $this1->params[2];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:123: characters 28-29
			$_g = $this1->params[3];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:123: characters 31-32
			$_g = $this1->params[4];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:123: characters 16-20
			$size = $this1->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:123: characters 35-39
			return $size;
		}
	}

	/**
	 * @param MapImpl $this
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function values ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:94: characters 5-71
		return Map_Impl_::foldLeft($this1, new \Array_hx(), function ($acc, $v) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:94: characters 44-55
			$acc->arr[$acc->length++] = $v;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/fp/Map.hx:94: characters 57-67
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
