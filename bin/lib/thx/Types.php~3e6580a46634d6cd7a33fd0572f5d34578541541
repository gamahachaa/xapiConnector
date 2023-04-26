<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx
 */

namespace thx;

use \php\Boot;
use \haxe\Exception;

/**
 * Helper methods to use on values, types and classes.
 */
class Types {
	/**
	 * Returns a string describing the type of any `value`.
	 * 
	 * @param mixed $value
	 * 
	 * @return string
	 */
	public static function anyValueToString ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:117: lines 117-118
		if (Boot::isOfType($value, Boot::getClass(\ValueType::class))) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:118: characters 4-26
			return Types::toString($value);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:119: lines 119-120
		if (Boot::isOfType($value, Boot::getClass('Class'))) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:120: characters 4-35
			return \Type::getClassName($value);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:121: lines 121-122
		if (Boot::isOfType($value, Boot::getClass('Enum'))) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:122: characters 4-34
			return \Type::getEnumName($value);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:123: characters 3-34
		return Types::toString(\Type::typeof($value));
	}

	/**
	 * Returns `true` if `cls` extends `sup` or one of its children.
	 * It also returns `true` if `cls` and `sup` are the same.
	 * 
	 * @param Class $cls
	 * @param Class $sup
	 * 
	 * @return bool
	 */
	public static function hasSuperClass ($cls, $sup) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:46: lines 46-50
		while (null !== $cls) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:47: lines 47-48
			if ($cls === $sup) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:48: characters 5-16
				return true;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:49: characters 4-33
			$cls = \Type::getSuperClass($cls);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:51: characters 3-15
		return false;
	}

	/**
	 * `isAnonymousObject` returns true if `v` is an object and it is not an instance of any custom class.
	 * 
	 * @param mixed $v
	 * 
	 * @return bool
	 */
	public static function isAnonymousObject ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:11: characters 10-57
		if (\Reflect::isObject($v)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:11: characters 33-57
			return null === \Type::getClass($v);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:11: characters 10-57
			return false;
		}
	}

	/**
	 * Returns `true` if `v` is an instance of any Enum type.
	 * 
	 * @param mixed $v
	 * 
	 * @return bool
	 */
	public static function isEnumValue ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:35: characters 17-31
		$_g = \Type::typeof($v);
		if ($_g->index === 7) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:36: characters 15-16
			$_g1 = $_g->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:36: characters 19-23
			return true;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:37: characters 12-17
			return false;
		}
	}

	/**
	 * Returns `true` if the passed value is an anonymous object or class instance but it is not any of the primitive types.
	 * 
	 * @param mixed $v
	 * 
	 * @return bool
	 */
	public static function isObject ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:17: characters 10-48
		if (\Reflect::isObject($v)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:17: characters 33-48
			return !Types::isPrimitive($v);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:17: characters 10-48
			return false;
		}
	}

	/**
	 * Returns `true` if `v` is any of the following types: Int, Float, Bool, Date or String.
	 * 
	 * @param mixed $v
	 * 
	 * @return bool
	 */
	public static function isPrimitive ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:23: characters 17-31
		$_g = \Type::typeof($v);
		$__hx__switch = ($_g->index);
		if ($__hx__switch === 1 || $__hx__switch === 2 || $__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:24: characters 30-34
			return true;
		} else if ($__hx__switch === 0 || $__hx__switch === 4 || $__hx__switch === 5 || $__hx__switch === 8) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:25: characters 56-61
			return false;
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:28: characters 16-17
			$_g1 = $_g->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:26: characters 16-17
			$c = $_g1;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:26: lines 26-28
			if (\Type::getClassName($c) === "String") {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:26: characters 58-62
				return true;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:27: characters 16-17
				$c = $_g1;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:27: lines 27-28
				if (\Type::getClassName($c) === "Date") {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:27: characters 56-60
					return true;
				} else {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:28: characters 20-25
					return false;
				}
			}
		} else if ($__hx__switch === 7) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:25: characters 33-34
			$_g1 = $_g->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:25: characters 56-61
			return false;
		}
	}

	/**
	 * `sameType` returns true if the arguments `a` and `b` share exactly the same type.
	 * 
	 * @param mixed $a
	 * @param mixed $b
	 * 
	 * @return bool
	 */
	public static function sameType ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:58: characters 3-54
		return Types::toString(\Type::typeof($a)) === Types::toString(\Type::typeof($b));
	}

	/**
	 * Returns a string representation of a `ValueType`.
	 * 
	 * @param \ValueType $type
	 * 
	 * @return string
	 */
	public static function toString ($type) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:87: lines 87-97
		$__hx__switch = ($type->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:88: characters 16-22
			return "Null";
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:89: characters 15-20
			return "Int";
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:90: characters 17-24
			return "Float";
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:91: characters 16-22
			return "Bool";
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:92: characters 18-22
			return "{}";
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:93: characters 20-30
			return "Function";
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:94: characters 16-17
			$c = $type->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:94: characters 20-40
			return \Type::getClassName($c);
		} else if ($__hx__switch === 7) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:95: characters 15-16
			$e = $type->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:95: characters 19-38
			return \Type::getEnumName($e);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:96: characters 12-17
			throw Exception::thrown("invalid type " . \Std::string($type));
		}
	}

	/**
	 * `typeInheritance` returns an array of string describing the entire inheritance
	 * chain of the passed `ValueType`.
	 * 
	 * @param \ValueType $type
	 * 
	 * @return string[]|\Array_hx
	 */
	public static function typeInheritance ($type) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:65: lines 65-80
		$__hx__switch = ($type->index);
		if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:66: characters 15-22
			return \Array_hx::wrap(["Int"]);
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:67: characters 17-26
			return \Array_hx::wrap(["Float"]);
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:68: characters 16-24
			return \Array_hx::wrap(["Bool"]);
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:69: characters 18-24
			return \Array_hx::wrap(["{}"]);
		} else if ($__hx__switch === 5) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:70: characters 20-32
			return \Array_hx::wrap(["Function"]);
		} else if ($__hx__switch === 6) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:71: characters 16-17
			$c = $type->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:72: characters 5-22
			$classes = new \Array_hx();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:73: lines 73-76
			while (null !== $c) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:74: characters 6-21
				$classes->arr[$classes->length++] = $c;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:75: characters 6-7
				$c = \Type::getSuperClass($c);
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:77: characters 5-35
			$f = Boot::getStaticClosure(\Type::class, 'getClassName');
			$result = [];
			$data = $classes->arr;
			$_g_current = 0;
			$_g_length = \count($data);
			$_g_data = $data;
			while ($_g_current < $_g_length) {
				$item = $_g_data[$_g_current++];
				$result[] = $f($item);
			}
			return \Array_hx::wrap($result);
		} else if ($__hx__switch === 7) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:78: characters 15-16
			$e = $type->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:78: characters 19-40
			return \Array_hx::wrap([\Type::getEnumName($e)]);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:79: characters 12-17
			throw Exception::thrown("invalid type " . \Std::string($type));
		}
	}

	/**
	 * `valueTypeInheritance` returns an array of string describing the entire inheritance
	 * chain of the passed `value`.
	 * 
	 * @param mixed $value
	 * 
	 * @return string[]|\Array_hx
	 */
	public static function valueTypeInheritance ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:105: characters 3-45
		return Types::typeInheritance(\Type::typeof($value));
	}

	/**
	 * Returns a string describing the type of any `value`.
	 * 
	 * @param mixed $value
	 * 
	 * @return string
	 */
	public static function valueTypeToString ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Types.hx:111: characters 3-38
		return Types::toString(\Type::typeof($value));
	}
}

Boot::registerClass(Types::class, 'thx.Types');
