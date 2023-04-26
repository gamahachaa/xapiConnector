<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx
 */

namespace thx;

use \php\_Boot\HxAnon;
use \php\Boot;
use \haxe\Exception;
use \haxe\IMap;
use \php\_Boot\HxClosure;
use \php\_NativeIndexedArray\NativeIndexedArrayIterator;

/**
 * `Dynamics` provides additional extension methods on any type.
 */
class Dynamics {
	/**
	 * Clone the object.
	 * Null values, strings, dates, numbers, enums and functions are immutable so will be returned as is.
	 * Anonymous objects will be created and each field cloned recursively.
	 * Arrays will be recreated and each object cloned recursively.
	 * Class instances will either be cloned, or the reference copied, depending on the value of `cloneInstances`.
	 * @param v The object which will be cloned.
	 * @param cloneInstances If true, class instances will be cloned using `Type.createEmptyInstance` and `Reflect.setField`. If false, class instances will be re-used, not cloned. Default is false.
	 * 
	 * @param mixed $v
	 * @param bool $cloneInstances
	 * 
	 * @return mixed
	 */
	public static function clone ($v, $cloneInstances = false) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:166: lines 166-190
		if ($cloneInstances === null) {
			$cloneInstances = false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:166: characters 11-25
		$_g = \Type::typeof($v);
		$__hx__switch = ($_g->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:168: characters 5-16
			return null;
		} else if ($__hx__switch === 1 || $__hx__switch === 2 || $__hx__switch === 3 || $__hx__switch === 5 || $__hx__switch === 8) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:170: characters 5-13
			return $v;
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:172: characters 5-33
			return Objects::copyTo($v, new HxAnon());
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:173: characters 16-17
			$c = $_g->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:174: characters 5-37
			$name = \Type::getClassName($c);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:175: lines 175-189
			if ($name === "Array") {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:177: characters 14-83
				$result = [];
				$data = $v->arr;
				$_g_current = 0;
				$_g_length = \count($data);
				$_g_data = $data;
				while ($_g_current < $_g_length) {
					$item = $_g_data[$_g_current++];
					$result[] = Dynamics::clone($item, $cloneInstances);
				}
				return \Array_hx::wrap($result);
			} else if ($name === "Date" || $name === "String") {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:179: characters 7-15
				return $v;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:181: lines 181-188
				if ($cloneInstances) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:182: characters 8-44
					$o = \Type::createEmptyInstance($c);
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:183: lines 183-184
					$_g1 = 0;
					$_g2 = \Type::getInstanceFields($c);
					while ($_g1 < $_g2->length) {
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:183: characters 13-18
						$field = ($_g2->arr[$_g1] ?? null);
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:183: lines 183-184
						++$_g1;
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:184: characters 9-83
						\Reflect::setField($o, $field, Dynamics::clone(\Reflect::field($v, $field), $cloneInstances));
					}
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:185: characters 8-16
					return $o;
				} else {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:187: characters 8-16
					return $v;
				}
			}
		} else if ($__hx__switch === 7) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:169: characters 36-37
			$_g1 = $_g->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:170: characters 5-13
			return $v;
		}
	}

	/**
	 * Compares two runtime values trying to match values.
	 * 
	 * @param mixed $a
	 * @param mixed $b
	 * 
	 * @return int
	 */
	public static function compare ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:197: lines 197-198
		if ((null === $a) && (null === $b)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:198: characters 4-12
			return 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:199: lines 199-200
		if (null === $a) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:200: characters 4-13
			return -1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:201: lines 201-202
		if (null === $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:202: characters 4-12
			return 1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:203: lines 203-204
		if (!Types::sameType($a, $b)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:204: characters 11-82
			$a1 = Types::toString(\Type::typeof($a));
			$b1 = Types::toString(\Type::typeof($b));
			if (strcmp($a1, $b1) < 0) {
				return -1;
			} else if (strcmp($a1, $b1) > 0) {
				return 1;
			} else {
				return 0;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:205: characters 11-25
		$_g = \Type::typeof($a);
		$__hx__switch = ($_g->index);
		if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:207: characters 5-30
			return Ints::compare($a, $b);
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:209: characters 12-32
			$a1 = $a;
			$b1 = $b;
			if ($a1 < $b1) {
				return -1;
			} else if ($a1 > $b1) {
				return 1;
			} else {
				return 0;
			}
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:211: characters 5-31
			return Bools::compare($a, $b);
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:213: characters 5-33
			return Objects::compare($a, $b);
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:214: characters 16-17
			$c = $_g->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:215: characters 5-37
			$name = \Type::getClassName($c);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:216: lines 216-227
			if ($name === "Array") {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:218: characters 7-34
				return Arrays::compare($a, $b);
			} else if ($name === "Date") {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:222: characters 7-33
				return Dates::compare($a, $b);
			} else if ($name === "String") {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:220: characters 14-35
				$a1 = $a;
				$b1 = $b;
				if (strcmp($a1, $b1) < 0) {
					return -1;
				} else if (strcmp($a1, $b1) > 0) {
					return 1;
				} else {
					return 0;
				}
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:223: lines 223-226
				if (\Reflect::hasField($a, "compare")) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:224: characters 7-69
					return \Reflect::callMethod($a, \Reflect::field($a, "compare"), \Array_hx::wrap([$b]));
				} else {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:226: characters 14-59
					$a1 = \Std::string($a);
					$b1 = \Std::string($b);
					if (strcmp($a1, $b1) < 0) {
						return -1;
					} else if (strcmp($a1, $b1) > 0) {
						return 1;
					} else {
						return 0;
					}
				}
			}
		} else if ($__hx__switch === 7) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:228: characters 15-16
			$e = $_g->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:229: characters 5-31
			return Enums::compare($a, $b);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:231: characters 5-13
			return 0;
		}
	}

	/**
	 * Structural and recursive equality.
	 * 
	 * @param mixed $a
	 * @param mixed $b
	 * 
	 * @return bool
	 */
	public static function equals ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:17: lines 17-18
		if (!Types::sameType($a, $b)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:18: characters 4-16
			return false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:21: lines 21-22
		if (Boot::equal($a, $b)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:22: characters 4-15
			return true;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:24: characters 10-24
		$_g = \Type::typeof($a);
		$__hx__switch = ($_g->index);
		if ($__hx__switch === 0 || $__hx__switch === 1 || $__hx__switch === 2 || $__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:26: characters 5-17
			return false;
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:115: characters 5-56
			$fa = \Reflect::fields($a);
			$fb = \Reflect::fields($b);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:116: lines 116-126
			$_g1 = 0;
			while ($_g1 < $fa->length) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:116: characters 10-15
				$field = ($fa->arr[$_g1] ?? null);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:116: lines 116-126
				++$_g1;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:117: characters 6-22
				$fb->remove($field);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:118: lines 118-119
				if (!\Reflect::hasField($b, $field)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:119: characters 7-19
					return false;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:120: characters 6-39
				$va = \Reflect::field($a, $field);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:121: characters 10-32
				$f = $va;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:121: lines 121-122
				if (($f instanceof \Closure) || ($f instanceof HxClosure)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:122: characters 7-15
					continue;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:123: characters 6-39
				$vb = \Reflect::field($b, $field);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:124: lines 124-125
				if (!Dynamics::equals($va, $vb)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:125: characters 7-19
					return false;
				}
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:127: lines 127-128
			if ($fb->length > 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:128: characters 6-18
				return false;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:131: characters 5-19
			$t = false;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:132: characters 9-38
			$t = Iterators::isIterator($a);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:132: lines 132-146
			if ($t || Iterables::isIterable($a)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:133: lines 133-134
				if ($t && !Iterators::isIterator($b)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:134: characters 7-19
					return false;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:135: lines 135-136
				if (!$t && !Iterables::isIterable($b)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:136: characters 7-19
					return false;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:138: characters 6-73
				$aa = ($t ? Iterators::toArray($a) : Iterators::toArray($a->iterator()));
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:139: characters 6-73
				$ab = ($t ? Iterators::toArray($b) : Iterators::toArray($b->iterator()));
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:140: lines 140-141
				if ($aa->length !== $ab->length) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:141: characters 7-19
					return false;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:142: characters 16-20
				$_g1 = 0;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:142: characters 20-29
				$_g2 = $aa->length;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:142: lines 142-144
				while ($_g1 < $_g2) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:142: characters 16-29
					$i = $_g1++;
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:143: lines 143-144
					if (!Dynamics::equals(($aa->arr[$i] ?? null), ($ab->arr[$i] ?? null))) {
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:144: characters 8-20
						return false;
					}
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:145: characters 6-17
				return true;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:147: characters 5-16
			return true;
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:28: characters 5-40
			return \Reflect::compareMethods($a, $b);
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:29: characters 16-17
			$c = $_g->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:30: lines 30-31
			$ca = \Type::getClassName($c);
			$cb = \Type::getClassName(\Type::getClass($b));
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:32: lines 32-33
			if ($ca !== $cb) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:33: characters 6-18
				return false;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:36: lines 36-37
			if (is_string($a)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:37: characters 6-18
				return false;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:40: lines 40-48
			if (($a instanceof \Array_hx)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:41: characters 6-65
				$aa = $a;
				$ab = $b;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:42: lines 42-43
				if ($aa->length !== $ab->length) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:43: characters 7-19
					return false;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:44: characters 16-20
				$_g1 = 0;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:44: characters 20-29
				$_g2 = $aa->length;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:44: lines 44-46
				while ($_g1 < $_g2) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:44: characters 16-29
					$i = $_g1++;
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:45: lines 45-46
					if (!Dynamics::equals(($aa->arr[$i] ?? null), ($ab->arr[$i] ?? null))) {
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:46: characters 8-20
						return false;
					}
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:47: characters 6-17
				return true;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:51: lines 51-52
			if (($a instanceof \Date)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:52: characters 6-47
				return $a->getTime() === $b->getTime();
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:55: lines 55-66
			if (($a instanceof IMap)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:56: lines 56-57
				$ha = $a;
				$hb = $b;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:58: lines 58-59
				$ka = Iterators::toArray(new NativeIndexedArrayIterator(\array_values(\array_map("strval", \array_keys($ha->data)))));
				$kb = Iterators::toArray(new NativeIndexedArrayIterator(\array_values(\array_map("strval", \array_keys($hb->data)))));
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:60: lines 60-61
				if ($ka->length !== $kb->length) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:61: characters 7-19
					return false;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:62: lines 62-64
				$_g1 = 0;
				while ($_g1 < $ka->length) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:62: characters 11-14
					$key = ($ka->arr[$_g1] ?? null);
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:62: lines 62-64
					++$_g1;
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:63: lines 63-64
					if (!\array_key_exists($key, $hb->data) || !Dynamics::equals(($ha->data[$key] ?? null), ($hb->data[$key] ?? null))) {
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:64: characters 8-20
						return false;
					}
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:65: characters 6-17
				return true;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:69: characters 5-19
			$t = false;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:70: characters 9-38
			$t = Iterators::isIterator($a);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:70: lines 70-80
			if ($t || Iterables::isIterable($a)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:71: lines 71-72
				$va = ($t ? Iterators::toArray($a) : Iterators::toArray($a->iterator()));
				$vb = ($t ? Iterators::toArray($b) : Iterators::toArray($b->iterator()));
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:73: lines 73-74
				if ($va->length !== $vb->length) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:74: characters 7-19
					return false;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:76: characters 16-20
				$_g1 = 0;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:76: characters 20-29
				$_g2 = $va->length;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:76: lines 76-78
				while ($_g1 < $_g2) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:76: characters 16-29
					$i = $_g1++;
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:77: lines 77-78
					if (!Dynamics::equals(($va->arr[$i] ?? null), ($vb->arr[$i] ?? null))) {
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:78: characters 8-20
						return false;
					}
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:79: characters 6-17
				return true;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:83: characters 5-18
			$f = null;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:84: characters 9-92
			$tmp = null;
			if (\Reflect::hasField($a, "equals")) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:84: characters 61-91
				$f = \Reflect::field($a, "equals");
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:84: characters 42-92
				$f1 = $f;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:84: characters 9-92
				$tmp = ($f1 instanceof \Closure) || ($f1 instanceof HxClosure);
			} else {
				$tmp = false;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:84: lines 84-85
			if ($tmp) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:85: characters 6-42
				return \Reflect::callMethod($a, $f, \Array_hx::wrap([$b]));
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:88: characters 5-59
			$fields = \Type::getInstanceFields(\Type::getClass($a));
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:89: lines 89-96
			$_g1 = 0;
			while ($_g1 < $fields->length) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:89: characters 10-15
				$field = ($fields->arr[$_g1] ?? null);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:89: lines 89-96
				++$_g1;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:90: characters 6-39
				$va = \Reflect::field($a, $field);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:91: characters 10-32
				$f = $va;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:91: lines 91-92
				if (($f instanceof \Closure) || ($f instanceof HxClosure)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:92: characters 7-15
					continue;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:93: characters 6-39
				$vb = \Reflect::field($b, $field);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:94: lines 94-95
				if (!Dynamics::equals($va, $vb)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:95: characters 7-19
					return false;
				}
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:97: characters 5-16
			return true;
		} else if ($__hx__switch === 7) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:98: characters 15-16
			$e = $_g->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:99: lines 99-101
			$ea = \Type::getEnumName($e);
			$teb = \Type::getEnum($b);
			$eb = \Type::getEnumName($teb);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:102: lines 102-103
			if ($ea !== $eb) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:103: characters 6-18
				return false;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:105: lines 105-106
			if ($a->index !== $b->index) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:106: characters 6-18
				return false;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:107: lines 107-108
			$pa = \Array_hx::wrap($a->params);
			$pb = \Array_hx::wrap($b->params);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:109: characters 15-19
			$_g = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:109: characters 19-28
			$_g1 = $pa->length;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:109: lines 109-111
			while ($_g < $_g1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:109: characters 15-28
				$i = $_g++;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:110: lines 110-111
				if (!Dynamics::equals(($pa->arr[$i] ?? null), ($pb->arr[$i] ?? null))) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:111: characters 7-19
					return false;
				}
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:112: characters 5-16
			return true;
		} else if ($__hx__switch === 8) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:149: characters 12-17
			throw Exception::thrown("Unable to compare two unknown types");
		}
	}

	/**
	 * Convert any value into a `String`.
	 * 
	 * @param mixed $v
	 * 
	 * @return string
	 */
	public static function string ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:239: characters 10-24
		$_g = \Type::typeof($v);
		$__hx__switch = ($_g->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:241: characters 5-18
			return "null";
		} else if ($__hx__switch === 1 || $__hx__switch === 2 || $__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:243: characters 5-16
			return "" . \Std::string($v);
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:245: characters 5-29
			return Objects::string($v);
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:262: characters 5-24
			return "<function>";
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:246: characters 16-17
			$c = $_g->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:247: characters 12-32
			$__hx__switch = (\Type::getClassName($c));
			if ($__hx__switch === "Array") {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:249: characters 7-30
				return Arrays::string($v);
			} else if ($__hx__switch === "Date") {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:253: characters 7-35
				return $v->toString();
			} else if ($__hx__switch === "String") {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:251: characters 7-15
				return $v;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:255: characters 7-74
				if (($v instanceof IMap)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:255: characters 26-47
					return Maps::string($v);
				} else {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:255: characters 54-74
					return \Std::string($v);
				}
			}
		} else if ($__hx__switch === 7) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:257: characters 15-16
			$e = $_g->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:258: characters 5-27
			return Enums::string($v);
		} else if ($__hx__switch === 8) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:260: characters 5-23
			return "<unknown>";
		}
	}
}

Boot::registerClass(Dynamics::class, 'thx.Dynamics');
