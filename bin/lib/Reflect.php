<?php
/**
 */

use \php\Boot;
use \php\_Boot\HxClass;
use \php\_Boot\HxClosure;
use \php\_Boot\HxEnum;

/**
 * The Reflect API is a way to manipulate values dynamically through an
 * abstract interface in an untyped manner. Use with care.
 * @see https://haxe.org/manual/std-reflection.html
 */
class Reflect {
	/**
	 * Call a method `func` with the given arguments `args`.
	 * The object `o` is ignored in most cases. It serves as the `this`-context in the following
	 * situations:
	 * (neko) Allows switching the context to `o` in all cases.
	 * (macro) Same as neko for Haxe 3. No context switching in Haxe 4.
	 * (js, lua) Require the `o` argument if `func` does not, but should have a context.
	 * This can occur by accessing a function field natively, e.g. through `Reflect.field`
	 * or by using `(object : Dynamic).field`. However, if `func` has a context, `o` is
	 * ignored like on other targets.
	 * 
	 * @param mixed $o
	 * @param mixed $func
	 * @param mixed[]|\Array_hx $args
	 * 
	 * @return mixed
	 */
	public static function callMethod ($o, $func, $args) {
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:113: characters 3-69
		return call_user_func_array($func, $args->arr);
	}

	/**
	 * Compares `a` and `b`.
	 * If `a` is less than `b`, the result is negative. If `b` is less than
	 * `a`, the result is positive. If `a` and `b` are equal, the result is 0.
	 * This function is only defined if `a` and `b` are of the same type.
	 * If that type is a function, the result is unspecified and
	 * `Reflect.compareMethods` should be used instead.
	 * For all other types, the result is 0 if `a` and `b` are equal. If they
	 * are not equal, the result depends on the type and is negative if:
	 * - Numeric types: a is less than b
	 * - String: a is lexicographically less than b
	 * - Other: unspecified
	 * If `a` and `b` are null, the result is 0. If only one of them is null,
	 * the result is unspecified.
	 * 
	 * @param mixed $a
	 * @param mixed $b
	 * 
	 * @return int
	 */
	public static function compare ($a, $b) {
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:128: lines 128-129
		if (Boot::equal($a, $b)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:129: characters 4-12
			return 0;
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:130: lines 130-134
		if (is_string($a)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:131: characters 4-40
			return strcmp($a, $b);
		} else if ($a > $b) {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:133: characters 34-35
			return 1;
		} else {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:133: characters 38-40
			return -1;
		}
	}

	/**
	 * Compares the functions `f1` and `f2`.
	 * If `f1` or `f2` are null, the result is false.
	 * If `f1` or `f2` are not functions, the result is unspecified.
	 * Otherwise the result is true if `f1` and the `f2` are physically equal,
	 * false otherwise.
	 * If `f1` or `f2` are member method closures, the result is true if they
	 * are closures of the same method on the same object value, false otherwise.
	 * 
	 * @param mixed $f1
	 * @param mixed $f2
	 * 
	 * @return bool
	 */
	public static function compareMethods ($f1, $f2) {
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:138: lines 138-142
		if (($f1 instanceof HxClosure) && ($f2 instanceof HxClosure)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:139: characters 4-24
			return $f1->equals($f2);
		} else {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:141: characters 4-19
			return Boot::equal($f1, $f2);
		}
	}

	/**
	 * Removes the field named `field` from structure `o`.
	 * This method is only guaranteed to work on anonymous structures.
	 * If `o` or `field` are null, the result is unspecified.
	 * 
	 * @param mixed $o
	 * @param string $field
	 * 
	 * @return bool
	 */
	public static function deleteField ($o, $field) {
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:158: lines 158-163
		if (Reflect::hasField($o, $field)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:159: characters 4-40
			unset($o->{$field});
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:160: characters 4-15
			return true;
		} else {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:162: characters 4-16
			return false;
		}
	}

	/**
	 * Returns the value of the field named `field` on object `o`.
	 * If `o` is not an object or has no field named `field`, the result is
	 * null.
	 * If the field is defined as a property, its accessors are ignored. Refer
	 * to `Reflect.getProperty` for a function supporting property accessors.
	 * If `field` is null, the result is unspecified.
	 * 
	 * @param mixed $o
	 * @param string $field
	 * 
	 * @return mixed
	 */
	public static function field ($o, $field) {
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:50: lines 50-52
		if (is_string($o)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:51: characters 24-45
			$tmp = Boot::dynamicString($o);
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:51: characters 4-53
			return $tmp->{$field};
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:53: lines 53-54
		if (!is_object($o)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:54: characters 4-15
			return null;
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:56: lines 56-58
		if (($field === "") && (PHP_VERSION_ID < 70100)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:57: characters 4-56
			return (((array)($o))[$field] ?? null);
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:60: lines 60-62
		if (property_exists($o, $field)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:61: characters 4-33
			return $o->{$field};
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:63: lines 63-65
		if (method_exists($o, $field)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:64: characters 4-44
			return Boot::getInstanceClosure($o, $field);
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:67: lines 67-78
		if (($o instanceof HxClass)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:68: characters 4-54
			$phpClassName = $o->phpClassName;
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:69: lines 69-71
			if (defined("" . ($phpClassName??'null') . "::" . ($field??'null'))) {
				#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:70: characters 5-52
				return constant("" . ($phpClassName??'null') . "::" . ($field??'null'));
			}
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:72: lines 72-74
			if (property_exists($phpClassName, $field)) {
				#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:73: characters 5-34
				return $o->{$field};
			}
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:75: lines 75-77
			if (method_exists($phpClassName, $field)) {
				#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:76: characters 5-54
				return Boot::getStaticClosure($phpClassName, $field);
			}
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:80: characters 3-14
		return null;
	}

	/**
	 * Returns the fields of structure `o`.
	 * This method is only guaranteed to work on anonymous structures. Refer to
	 * `Type.getInstanceFields` for a function supporting class instances.
	 * If `o` is null, the result is unspecified.
	 * 
	 * @param mixed $o
	 * 
	 * @return string[]|\Array_hx
	 */
	public static function fields ($o) {
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:117: lines 117-119
		if (is_object($o)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:118: characters 4-77
			return \Array_hx::wrap(array_keys(get_object_vars($o)));
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:120: characters 3-12
		return new \Array_hx();
	}

	/**
	 * Returns the value of the field named `field` on object `o`, taking
	 * property getter functions into account.
	 * If the field is not a property, this function behaves like
	 * `Reflect.field`, but might be slower.
	 * If `o` or `field` are null, the result is unspecified.
	 * 
	 * @param mixed $o
	 * @param string $field
	 * 
	 * @return mixed
	 */
	public static function getProperty ($o, $field) {
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:88: lines 88-97
		if (is_object($o)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:89: lines 89-96
			if (($o instanceof HxClass)) {
				#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:90: characters 5-55
				$phpClassName = $o->phpClassName;
				#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:91: lines 91-93
				if (Boot::hasGetter($phpClassName, $field)) {
					#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:92: characters 6-58
					return $phpClassName::{"get_" . ($field??'null')}();
				}
			} else if (Boot::hasGetter(get_class($o), $field)) {
				#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:95: characters 5-40
				return $o->{"get_" . ($field??'null')}();
			}
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:99: characters 3-33
		return Reflect::field($o, $field);
	}

	/**
	 * Tells if structure `o` has a field named `field`.
	 * This is only guaranteed to work for anonymous structures. Refer to
	 * `Type.getInstanceFields` for a function supporting class instances.
	 * If `o` or `field` are null, the result is unspecified.
	 * 
	 * @param mixed $o
	 * @param string $field
	 * 
	 * @return bool
	 */
	public static function hasField ($o, $field) {
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:34: lines 34-35
		if (!is_object($o)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:35: characters 4-16
			return false;
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:36: lines 36-37
		if (property_exists($o, $field)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:37: characters 4-15
			return true;
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:39: lines 39-44
		if (($o instanceof HxClass)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:40: characters 4-54
			$phpClassName = $o->phpClassName;
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:41: lines 41-43
			if (!(property_exists($phpClassName, $field) || method_exists($phpClassName, $field))) {
				#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:43: characters 8-47
				return defined("" . ($phpClassName??'null') . "::" . ($field??'null'));
			} else {
				#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:41: lines 41-43
				return true;
			}
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:46: characters 3-15
		return false;
	}

	/**
	 * Tells if `v` is an object.
	 * The result is true if `v` is one of the following:
	 * - class instance
	 * - structure
	 * - `Class<T>`
	 * - `Enum<T>`
	 * Otherwise, including if `v` is null, the result is false.
	 * 
	 * @param mixed $v
	 * 
	 * @return bool
	 */
	public static function isObject ($v) {
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:146: lines 146-150
		if (($v instanceof HxEnum)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:147: characters 4-16
			return false;
		} else if (!is_object($v)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:149: characters 28-41
			return is_string($v);
		} else {
			#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:149: characters 11-41
			return true;
		}
	}

	/**
	 * Sets the field named `field` of object `o` to value `value`.
	 * If `o` has no field named `field`, this function is only guaranteed to
	 * work for anonymous structures.
	 * If `o` or `field` are null, the result is unspecified.
	 * 
	 * @param mixed $o
	 * @param string $field
	 * @param mixed $value
	 * 
	 * @return void
	 */
	public static function setField ($o, $field, $value) {
		#C:\HaxeToolkit\haxe\std/php/_std/Reflect.hx:84: characters 3-35
		$o->{$field} = $value;
	}
}

Boot::registerClass(Reflect::class, 'Reflect');
