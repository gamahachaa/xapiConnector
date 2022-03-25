<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx
 */

namespace thx;

use \php\_Boot\HxAnon;
use \haxe\ds\Option;
use \php\Boot;
use \haxe\ds\ObjectMap;
use \php\_Boot\HxString;
use \haxe\ds\StringMap;
use \haxe\NativeStackTrace;

/**
 * Helper methods for generic objects.
 */
class Objects {
	/**
	 * Copies the values from the fields of `from` to `to`. If `to` already contains those fields, then it replaces
	 * those values with the return value of the function `replacef`.
	 * If not set, `replacef` always returns the value from the `from` object.
	 * 
	 * @param object $to
	 * @param object $from
	 * @param \Closure $replacef
	 * 
	 * @return object
	 */
	public static function assign ($to, $from, $replacef = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:166: lines 166-167
		if (null === $replacef) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:167: characters 4-77
			$replacef = function ($field, $oldv, $newv) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:167: characters 66-77
				return $newv;
			};
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:168: lines 168-175
		$_g = 0;
		$_g1 = \Reflect::fields($from);
		while ($_g < $_g1->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:168: characters 8-13
			$field = ($_g1->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:168: lines 168-175
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:169: characters 4-42
			$newv = \Reflect::field($from, $field);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:170: lines 170-174
			if (\Reflect::hasField($to, $field)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:171: characters 5-81
				\Reflect::setField($to, $field, $replacef($field, \Reflect::field($to, $field), $newv));
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:173: characters 5-38
				\Reflect::setField($to, $field, $newv);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:176: characters 3-12
		return $to;
	}

	/**
	 * Clone the current object by creating a new object and using `copyTo` to clone each field.
	 * 
	 * @param mixed $src
	 * @param bool $cloneInstances
	 * 
	 * @return mixed
	 */
	public static function clone ($src, $cloneInstances = false) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:200: characters 3-45
		if ($cloneInstances === null) {
			$cloneInstances = false;
		}
		return Dynamics::clone($src, $cloneInstances);
	}

	/**
	 * Shallow, untyped merge of two anonymous objects.
	 * 
	 * @param object $first
	 * @param object $second
	 * 
	 * @return object
	 */
	public static function combine ($first, $second) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:127: characters 3-39
		return Objects::shallowCombine($first, $second);
	}

	/**
	 * Compares two objects assuming that the object with less fields will come first.
	 * If both objects have the same number of fields, each field value is compared
	 * using `thx.Dynamics.compare`.
	 * 
	 * @param object $a
	 * @param object $b
	 * 
	 * @return int
	 */
	public static function compare ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:21: characters 3-17
		$fields = \Reflect::fields($a);
		$v = Arrays::compare($fields, \Reflect::fields($b));
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:22: lines 22-23
		if ($v !== 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:23: characters 4-12
			return $v;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:24: lines 24-27
		$_g = 0;
		while ($_g < $fields->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:24: characters 8-13
			$field = ($fields->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:24: lines 24-27
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:25: characters 8-80
			$v = Dynamics::compare(\Reflect::field($a, $field), \Reflect::field($b, $field));
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:25: lines 25-26
			if ($v !== 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:26: characters 5-13
				return $v;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:28: characters 3-11
		return 0;
	}

	/**
	 * `copyTo` copies the fields from `src` to `dst` using `Reflect.setField()` and `Dynamics.clone()`.
	 * Anonymous objects are entered into and copied recursively.
	 * 
	 * @param object $src
	 * @param object $dst
	 * @param bool $cloneInstances
	 * 
	 * @return object
	 */
	public static function copyTo ($src, $dst, $cloneInstances = false) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:183: lines 183-194
		if ($cloneInstances === null) {
			$cloneInstances = false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:184: lines 184-192
		$_g = 0;
		$_g1 = \Reflect::fields($src);
		while ($_g < $_g1->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:184: characters 8-13
			$field = ($_g1->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:184: lines 184-192
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:185: characters 4-71
			$sv = Dynamics::clone(\Reflect::field($src, $field), $cloneInstances);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:186: characters 4-39
			$dv = \Reflect::field($dst, $field);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:187: characters 8-66
			$tmp = null;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:187: characters 8-35
			$v = $sv;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:187: characters 8-66
			if (\Reflect::isObject($v) && (null === \Type::getClass($v))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:187: characters 39-66
				$v1 = $dv;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:187: characters 8-66
				$tmp = \Reflect::isObject($v1) && (null === \Type::getClass($v1));
			} else {
				$tmp = false;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:187: lines 187-191
			if ($tmp) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:188: characters 5-19
				Objects::copyTo($sv, $dv);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:190: characters 5-37
				\Reflect::setField($dst, $field, $sv);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:193: characters 3-13
		return $dst;
	}

	/**
	 * Deep, typed merge of two objects.
	 * 
	 * @param object $first
	 * @param object $second
	 * 
	 * @return object
	 */
	public static function deepCombine ($first, $second) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:156: characters 3-37
		return Objects::copyTo($second, $first, true);
	}

	/**
	 * @param object $o
	 * @param bool $flattenArrays
	 * 
	 * @return object
	 */
	public static function deflate ($o, $flattenArrays = true) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:49: lines 49-98
		if ($flattenArrays === null) {
			$flattenArrays = true;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:50: lines 50-91
		$f = null;
		$f = function ($v) use (&$f, &$flattenArrays) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:51: lines 51-90
			if (($v instanceof \Array_hx)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:52: lines 52-71
				if ($flattenArrays) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:53: lines 53-68
					if (Boot::equal(Boot::dynamicField($v, 'length'), 0)) {
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:54: characters 7-22
						return Either::Left(new \Array_hx());
					} else {
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:56: characters 7-32
						$a = $v;
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:57: lines 57-67
						return Either::Right(Arrays::reducei($a, function ($map, $value, $i) use (&$f) {
							#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:58: characters 15-23
							$_g = $f($value);
							$__hx__switch = ($_g->index);
							if ($__hx__switch === 0) {
								#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:59: characters 19-20
								$v = $_g->params[0];
								#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:60: characters 10-26
								$map->data["" . ($i??'null')] = $v;
							} else if ($__hx__switch === 1) {
								#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:61: characters 20-21
								$m = $_g->params[0];
								#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:62: characters 20-28
								$data = \array_values(\array_map("strval", \array_keys($m->data)));
								$k_current = 0;
								$k_length = \count($data);
								$k_data = $data;
								while ($k_current < $k_length) {
									#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:62: lines 62-64
									$k = $k_data[$k_current++];
									#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:63: characters 11-37
									$value = ($m->data[$k] ?? null);
									$map->data["" . ($i??'null') . "." . ($k??'null')] = $value;
								}
							}
							#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:66: characters 8-18
							return $map;
						}, new StringMap()));
					}
				} else {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:70: characters 6-20
					return Either::Left($v);
				}
			} else if (\Reflect::isObject($v) && (null === \Type::getClass($v))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:73: lines 73-87
				return Either::Right(Arrays::reduce(\Reflect::fields($v), function ($map, $key) use (&$f, &$v) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:74: characters 13-37
					$_g = $f(\Reflect::field($v, $key));
					$__hx__switch = ($_g->index);
					if ($__hx__switch === 0) {
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:75: characters 17-18
						$v1 = $_g->params[0];
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:76: characters 8-26
						$map->data["" . ($key??'null')] = $v1;
					} else if ($__hx__switch === 1) {
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:77: characters 18-19
						$m = $_g->params[0];
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:78: characters 12-27
						$data = \array_values($m->data);
						$inlNativeIndexedArrayIterator_current = 0;
						$inlNativeIndexedArrayIterator_length = \count($data);
						$inlNativeIndexedArrayIterator_data = $data;
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:78: lines 78-84
						if ($inlNativeIndexedArrayIterator_current >= $inlNativeIndexedArrayIterator_length) {
							#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:79: characters 9-28
							$map->data["" . ($key??'null')] = new HxAnon();
						} else {
							#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:81: characters 19-27
							$data = \array_values(\array_map("strval", \array_keys($m->data)));
							$k_current = 0;
							$k_length = \count($data);
							$k_data = $data;
							while ($k_current < $k_length) {
								#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:81: lines 81-83
								$k = $k_data[$k_current++];
								#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:82: characters 10-38
								$value = ($m->data[$k] ?? null);
								$map->data["" . ($key??'null') . "." . ($k??'null')] = $value;
							}
						}
					}
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:86: characters 6-16
					return $map;
				}, new StringMap()));
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:89: characters 5-19
				return Either::Left($v);
			}
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:92: characters 17-21
		$_g = $f($o);
		$__hx__switch = ($_g->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:93: characters 14-15
			$v = $_g->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:94: characters 5-6
			return $v;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:95: characters 15-16
			$m = $_g->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:96: characters 5-21
			return Maps::toObject($m);
		}
	}

	/**
	 * `exists` returns true if `o` contains a field named `name`.
	 * 
	 * @param object $o
	 * @param string $name
	 * 
	 * @return bool
	 */
	public static function exists ($o, $name) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:41: characters 3-35
		return \Reflect::hasField($o, $name);
	}

	/**
	 * `fields` returns an array of string containing the field names of the argument object.
	 * 
	 * @param object $o
	 * 
	 * @return string[]|\Array_hx
	 */
	public static function fields ($o) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:47: characters 3-27
		return \Reflect::fields($o);
	}

	/**
	 * Gets a value from an object by a string path.  The path can contain object keys and array indices separated
	 * by ".".  Returns null for a path that does not exist.
	 * E.g. { key1: { key2: [1, 2, 3] } }.getPath("key1.key2.2") -> returns 3
	 * E.g. { key1: { key2: [1, 2, 3] } }.getPath("key1.key2[2]") -> returns 3
	 * 
	 * @param object $o
	 * @param string $path
	 * 
	 * @return mixed
	 */
	public static function getPath ($o, $path) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:294: characters 3-29
		$path = (new \EReg("\\[(\\d+)\\]", "g"))->replace($path, ".\$1");
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:295: characters 3-31
		$paths = HxString::split($path, ".");
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:296: characters 3-27
		$current = $o;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:297: lines 297-311
		$_g = 0;
		while ($_g < $paths->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:297: characters 8-19
			$currentPath = ($paths->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:297: lines 297-311
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:298: lines 298-310
			if ($current === null) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:299: characters 5-16
				return null;
			} else if (ctype_digit($currentPath)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:301: lines 301-302
				$index = \Std::parseInt($currentPath);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:302: characters 12-40
				$value = $current;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:301: lines 301-302
				$arr = (($value instanceof \Array_hx) ? $value : null);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:303: lines 303-304
				if (null === $arr) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:304: characters 6-17
					return null;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:305: characters 5-25
				$current = ($arr->arr[$index] ?? null);
			} else if (\Reflect::hasField($current, $currentPath)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:307: characters 5-50
				$current = \Reflect::field($current, $currentPath);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:309: characters 5-16
				return null;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:312: characters 3-17
		return $current;
	}

	/**
	 * Null-safe getPath
	 * 
	 * @param object $o
	 * @param string $path
	 * 
	 * @return Option
	 */
	public static function getPathOption ($o, $path) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:319: characters 10-43
		$value = Objects::getPath($o, $path);
		if (null === $value) {
			return Option::None();
		} else {
			return Option::Some($value);
		}
	}

	/**
	 * Gets a value from an object by a string path.  The path can contain object keys and array indices separated
	 * by ".".  Returns `alt` for a path that does not exist.
	 * ```
	 * E.g. { key1: { key2: [1, 2, 3] } }.getPath("key1.key2.2") -> returns 3
	 * E.g. { key1: { key2: [1, 2, 3] } }.getPath("key1.key2.5", 7) -> returns 7
	 * ```
	 * 
	 * @param object $o
	 * @param string $path
	 * @param mixed $alt
	 * 
	 * @return mixed
	 */
	public static function getPathOr ($o, $path, $alt) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:337: characters 3-56
		return Options::getOrElse(Objects::getPathOption($o, $path), $alt);
	}

	/**
	 * Determines whether an object has fields represented by a string path.  The path
	 * can contain object keys and array indices separated by ".".
	 * E.g. { key1: { key2: [1, 2, 3] } }.hasPath("key1.key2.2") -> returns true
	 * 
	 * @param object $o
	 * @param string $path
	 * 
	 * @return bool
	 */
	public static function hasPath ($o, $path) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:258: characters 3-29
		$path = (new \EReg("\\[(\\d+)\\]", "g"))->replace($path, ".\$1");
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:259: characters 3-31
		$paths = HxString::split($path, ".");
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:260: characters 3-27
		$current = $o;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:262: lines 262-274
		$_g = 0;
		while ($_g < $paths->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:262: characters 8-19
			$currentPath = ($paths->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:262: lines 262-274
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:263: lines 263-273
			if (ctype_digit($currentPath)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:264: lines 264-265
				$index = \Std::parseInt($currentPath);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:265: characters 12-40
				$value = $current;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:264: lines 264-265
				$arr = (($value instanceof \Array_hx) ? $value : null);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:266: lines 266-267
				if ((null === $arr) || ($arr->length <= $index)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:267: characters 6-18
					return false;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:268: characters 5-25
				$current = ($arr->arr[$index] ?? null);
			} else if (\Reflect::hasField($current, $currentPath)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:270: characters 5-50
				$current = \Reflect::field($current, $currentPath);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:272: characters 5-17
				return false;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:275: characters 3-14
		return true;
	}

	/**
	 * Like `hasPath`, but will return `false` for null values, even if the key exists.
	 * E.g. { key1 : { key2: null } }.hasPathValue("key1.key2") -> returns false
	 * 
	 * @param object $o
	 * @param string $path
	 * 
	 * @return bool
	 */
	public static function hasPathValue ($o, $path) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:284: characters 3-34
		return Objects::getPath($o, $path) !== null;
	}

	/**
	 * @param object $o
	 * 
	 * @return object
	 */
	public static function inflate ($o) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:101: lines 101-103
		return Arrays::reduce(\Reflect::fields($o), function ($acc, $field) use (&$o) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:102: characters 4-55
			return Objects::setPath($acc, $field, \Reflect::field($o, $field));
		}, new HxAnon());
	}

	/**
	 * `isEmpty` returns `true` if the object doesn't have any field.
	 * 
	 * @param object $o
	 * 
	 * @return bool
	 */
	public static function isEmpty ($o) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:35: characters 3-22
		return \Reflect::fields($o)->length === 0;
	}

	/**
	 * @param string $path
	 * 
	 * @return string
	 */
	public static function normalizePath ($path) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:427: characters 3-44
		return (new \EReg("\\[(\\d+)\\]", "g"))->replace($path, ".\$1");
	}

	/**
	 * Null-safe `getPath` that attempts to parse the result using the provided parse
	 * function. `thx.fp.Dynamics` has several functions that match this pattern.
	 * 
	 * @param object $o
	 * @param string $path
	 * @param \Closure $parse
	 * 
	 * @return Either
	 */
	public static function parsePath ($o, $path, $parse) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:326: characters 10-108
		$this1 = Options::toSuccessNel(Objects::getPathOption($o, $path), "Object does not contain path " . ($path??'null'));
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			$a = $this1->params[0];
			return Either::Left($a);
		} else if ($__hx__switch === 1) {
			$b = $this1->params[0];
			return $parse($b);
		}
	}

	/**
	 * Delete an object's property, given a string path to that property.
	 * E.g. { foo : 'bar' }.removePath('foo') -> returns {}
	 * 
	 * @param object $o
	 * @param string $path
	 * 
	 * @return object
	 */
	public static function removePath ($o, $path) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:398: characters 3-29
		$path = (new \EReg("\\[(\\d+)\\]", "g"))->replace($path, ".\$1");
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:399: characters 3-31
		$paths = HxString::split($path, ".");
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:402: characters 16-27
		if ($paths->length > 0) {
			$paths->length--;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:402: characters 3-28
		$target = \array_pop($paths->arr);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:406: lines 406-421
		try {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:407: lines 407-417
			$sub = Arrays::reduce($paths, function ($existing, $nextPath) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:408: lines 408-416
				if ($nextPath === "*") {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:409: characters 13-46
					$_this = $existing;
					if ($_this->length > 0) {
						$_this->length--;
					}
					return \array_pop($_this->arr);
				} else if (ctype_digit($nextPath)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:411: characters 6-37
					$current = $existing;
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:412: characters 6-41
					$index = \Std::parseInt($nextPath);
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:413: characters 6-27
					return $current[$index];
				} else {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:415: characters 6-46
					return \Reflect::field($existing, $nextPath);
				}
			}, $o);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:419: lines 419-420
			if (null !== $sub) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:420: characters 5-37
				\Reflect::deleteField($sub, $target);
			}
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:421: characters 12-13
			NativeStackTrace::saveStack($_g);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:423: characters 3-11
		return $o;
	}

	/**
	 * Sets a value in an object by a string path.  The path can contain object keys and array indices separated
	 * by ".".  Returns the original object, for optional chaining of other object methods.
	 * Inner objects and arrays will be created as needed when traversing the path.
	 * E.g. { key1: { key2: [1, 2, 3] } }.setPath("key1.key2.2", 4) -> returns { key1: { key2: [ 1, 2, 4 ] } }
	 * 
	 * @param object $o
	 * @param string $path
	 * @param mixed $val
	 * 
	 * @return object
	 */
	public static function setPath ($o, $path, $val) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:349: characters 3-29
		$path = (new \EReg("\\[(\\d+)\\]", "g"))->replace($path, ".\$1");
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:350: characters 3-52
		$paths = HxString::split($path, ".");
		$current = $o;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:352: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:352: characters 17-35
		$_g1 = $paths->length - 1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:352: lines 352-379
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:352: characters 13-35
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:353: characters 4-56
			$currentPath = ($paths->arr[$i] ?? null);
			$nextPath = ($paths->arr[$i + 1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:355: lines 355-378
			if (ctype_digit($currentPath) || ($currentPath === "*")) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:356: lines 356-360
				$index = ($currentPath === "*" ? $current->length : \Std::parseInt($currentPath));
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:361: lines 361-367
				if ($current[$index] === null) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:362: lines 362-366
					if (ctype_digit($nextPath) || ($nextPath === "*")) {
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:363: characters 7-26
						$current[$index] = new \Array_hx();
					} else {
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:365: characters 7-26
						$current[$index] = new HxAnon();
					}
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:368: characters 5-29
				$current = $current[$index];
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:370: lines 370-376
				if (!\Reflect::hasField($current, $currentPath)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:371: lines 371-375
					if (ctype_digit($nextPath) || ($nextPath === "*")) {
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:372: characters 7-49
						\Reflect::setField($current, $currentPath, new \Array_hx());
					} else {
						#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:374: characters 7-49
						\Reflect::setField($current, $currentPath, new HxAnon());
					}
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:377: characters 5-50
				$current = \Reflect::field($current, $currentPath);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:380: characters 3-24
		$p = ($paths->arr[$paths->length - 1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:381: lines 381-388
		if (ctype_digit($p)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:382: characters 4-32
			$index = \Std::parseInt($p);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:383: characters 4-24
			$current[$index] = $val;
		} else if ($p === "*") {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:385: characters 4-40
			$_this = $current;
			$_this->arr[$_this->length++] = $val;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:387: characters 4-37
			\Reflect::setField($current, $p, $val);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:389: characters 3-11
		return $o;
	}

	/**
	 * Shallow, untyped merge of two anonymous objects.
	 * 
	 * @param object $first
	 * @param object $second
	 * 
	 * @return object
	 */
	public static function shallowCombine ($first, $second) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:134: characters 3-15
		$to = new HxAnon();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:135: lines 135-137
		$_g = 0;
		$_g1 = \Reflect::fields($first);
		while ($_g < $_g1->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:135: characters 8-13
			$field = ($_g1->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:135: lines 135-137
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:136: characters 4-60
			\Reflect::setField($to, $field, \Reflect::field($first, $field));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:138: lines 138-140
		$_g = 0;
		$_g1 = \Reflect::fields($second);
		while ($_g < $_g1->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:138: characters 8-13
			$field = ($_g1->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:138: lines 138-140
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:139: characters 4-61
			\Reflect::setField($to, $field, \Reflect::field($second, $field));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:141: characters 3-12
		return $to;
	}

	/**
	 * `size` returns how many fields are present in the object.
	 * 
	 * @param object $o
	 * 
	 * @return int
	 */
	public static function size ($o) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:216: characters 3-34
		return \Reflect::fields($o)->length;
	}

	/**
	 * Returns a string representation of the object containing each field and value.
	 * The function is recursive so it might generate infinite loops if used with
	 * circular references.
	 * 
	 * @param object $o
	 * 
	 * @return string
	 */
	public static function string ($o) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:225: lines 225-233
		$_this = \Reflect::fields($o);
		$result = [];
		$data = $_this->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:226: characters 4-34
			$v = \Reflect::field($o, $item);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:227: lines 227-231
			$s = (is_string($v) ? Strings::quote($v) : Dynamics::string($v));
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:225: lines 225-233
			$result[] = ("" . ($item??'null') . " : " . ($s??'null'));
		}
		return "{" . (\Array_hx::wrap($result)->join(", ")??'null') . "}";
	}

	/**
	 * @param object $o
	 * @param ObjectMap $cache
	 * 
	 * @return void
	 */
	public static function stringImpl ($o, $cache) {
	}

	/**
	 * `objectToMap` transforms an anonymous object into an instance of `Map<String, Dynamic>`.
	 * 
	 * @param object $o
	 * 
	 * @return StringMap
	 */
	public static function toMap ($o) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:207: lines 207-210
		return Arrays::reduce(Objects::tuples($o), function ($map, $t) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:208: characters 4-23
			$map->data[$t->_0] = $t->_1;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:209: characters 4-14
			return $map;
		}, new StringMap());
	}

	/**
	 * Converts an object into an Array<Tuple2<String, Dynamic>> where the left value (_0) of the
	 * tuple is the field name and the right value (_1) is the field value.
	 * 
	 * @param object $o
	 * 
	 * @return object[]|\Array_hx
	 */
	public static function tuples ($o) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:249: characters 10-92
		$_this = \Reflect::fields($o);
		$result = [];
		$data = $_this->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:249: characters 53-91
			$this1 = new _HxAnon_Objects0($item, \Reflect::field($o, $item));
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:249: characters 10-92
			$result[] = $this1;
		}
		return \Array_hx::wrap($result);
	}

	/**
	 * `values` returns an array of dynamic values containing the values of each field in the argument object.
	 * 
	 * @param object $o
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function values ($o) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Objects.hx:242: characters 10-75
		$_this = \Reflect::fields($o);
		$result = [];
		$data = $_this->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = \Reflect::field($o, $item);
		}
		return \Array_hx::wrap($result);
	}
}

class _HxAnon_Objects0 extends HxAnon {
	function __construct($_0, $_1) {
		$this->_0 = $_0;
		$this->_1 = $_1;
	}
}

Boot::registerClass(Objects::class, 'thx.Objects');
