<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:165: lines 165-166
		if (null === $replacef) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:166: characters 7-86
			$replacef = function ($field, $oldv, $newv) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:166: characters 75-86
				return $newv;
			};
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:167: lines 167-174
		$_g = 0;
		$_g1 = \Reflect::fields($from);
		while ($_g < $_g1->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:167: characters 9-14
			$field = ($_g1->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:167: lines 167-174
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:168: characters 7-45
			$newv = \Reflect::field($from, $field);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:169: lines 169-173
			if (\Reflect::hasField($to, $field)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:170: characters 9-85
				\Reflect::setField($to, $field, $replacef($field, \Reflect::field($to, $field), $newv));
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:172: characters 9-42
				\Reflect::setField($to, $field, $newv);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:175: characters 5-14
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:199: characters 5-47
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:125: characters 5-41
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:20: characters 5-19
		$fields = \Reflect::fields($a);
		$v = Arrays::compare($fields, \Reflect::fields($b));
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:21: lines 21-22
		if ($v !== 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:22: characters 7-15
			return $v;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:23: lines 23-26
		$_g = 0;
		while ($_g < $fields->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:23: characters 10-15
			$field = ($fields->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:23: lines 23-26
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:24: characters 11-83
			$v = Dynamics::compare(\Reflect::field($a, $field), \Reflect::field($b, $field));
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:24: lines 24-25
			if ($v !== 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:25: characters 9-17
				return $v;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:27: characters 5-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:182: lines 182-193
		if ($cloneInstances === null) {
			$cloneInstances = false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:183: lines 183-191
		$_g = 0;
		$_g1 = \Reflect::fields($src);
		while ($_g < $_g1->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:183: characters 10-15
			$field = ($_g1->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:183: lines 183-191
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:184: characters 7-74
			$sv = Dynamics::clone(\Reflect::field($src, $field), $cloneInstances);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:185: characters 7-42
			$dv = \Reflect::field($dst, $field);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:186: characters 11-69
			$tmp = null;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:186: characters 11-38
			$v = $sv;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:186: characters 11-69
			if (\Reflect::isObject($v) && (null === \Type::getClass($v))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:186: characters 42-69
				$v1 = $dv;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:186: characters 11-69
				$tmp = \Reflect::isObject($v1) && (null === \Type::getClass($v1));
			} else {
				$tmp = false;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:186: lines 186-190
			if ($tmp) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:187: characters 9-23
				Objects::copyTo($sv, $dv);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:189: characters 9-41
				\Reflect::setField($dst, $field, $sv);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:192: characters 5-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:155: characters 5-39
		return Objects::copyTo($second, $first, true);
	}

	/**
	 * @param object $o
	 * @param bool $flattenArrays
	 * 
	 * @return object
	 */
	public static function deflate ($o, $flattenArrays = true) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:48: lines 48-97
		if ($flattenArrays === null) {
			$flattenArrays = true;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:49: lines 49-90
		$f = null;
		$f = function ($v) use (&$f, &$flattenArrays) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:50: lines 50-89
			if (($v instanceof \Array_hx)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:51: lines 51-70
				if ($flattenArrays) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:52: lines 52-67
					if (Boot::equal(Boot::dynamicField($v, 'length'), 0)) {
						#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:53: characters 13-28
						return Either::Left(new \Array_hx());
					} else {
						#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:55: characters 13-39
						$a = $v;
						#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:56: lines 56-66
						return Either::Right(Arrays::reducei($a, function ($map, $value, $i) use (&$f) {
							#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:57: characters 22-30
							$_g = $f($value);
							$__hx__switch = ($_g->index);
							if ($__hx__switch === 0) {
								#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:58: characters 27-28
								$v = $_g->params[0];
								#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:59: characters 19-35
								$map->data["" . ($i??'null')] = $v;
							} else if ($__hx__switch === 1) {
								#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:60: characters 28-29
								$m = $_g->params[0];
								#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:61: characters 28-36
								$data = \array_values(\array_map("strval", \array_keys($m->data)));
								$k_current = 0;
								$k_length = \count($data);
								$k_data = $data;
								while ($k_current < $k_length) {
									#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:61: lines 61-63
									$k = $k_data[$k_current++];
									#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:62: characters 21-47
									$value = ($m->data[$k] ?? null);
									$map->data["" . ($i??'null') . "." . ($k??'null')] = $value;
								}
							}
							#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:65: characters 15-25
							return $map;
						}, new StringMap()));
					}
				} else {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:69: characters 11-25
					return Either::Left($v);
				}
			} else if (\Reflect::isObject($v) && (null === \Type::getClass($v))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:72: lines 72-86
				return Either::Right(Arrays::reduce(\Reflect::fields($v), function ($map, $key) use (&$f, &$v) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:73: characters 18-42
					$_g = $f(\Reflect::field($v, $key));
					$__hx__switch = ($_g->index);
					if ($__hx__switch === 0) {
						#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:74: characters 23-24
						$v1 = $_g->params[0];
						#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:75: characters 15-33
						$map->data["" . ($key??'null')] = $v1;
					} else if ($__hx__switch === 1) {
						#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:76: characters 24-25
						$m = $_g->params[0];
						#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:77: characters 18-33
						$data = \array_values($m->data);
						$inlNativeIndexedArrayIterator_current = 0;
						$inlNativeIndexedArrayIterator_length = \count($data);
						$inlNativeIndexedArrayIterator_data = $data;
						#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:77: lines 77-83
						if ($inlNativeIndexedArrayIterator_current >= $inlNativeIndexedArrayIterator_length) {
							#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:78: characters 17-36
							$map->data["" . ($key??'null')] = new HxAnon();
						} else {
							#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:80: characters 26-34
							$data = \array_values(\array_map("strval", \array_keys($m->data)));
							$k_current = 0;
							$k_length = \count($data);
							$k_data = $data;
							while ($k_current < $k_length) {
								#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:80: lines 80-82
								$k = $k_data[$k_current++];
								#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:81: characters 19-47
								$value = ($m->data[$k] ?? null);
								$map->data["" . ($key??'null') . "." . ($k??'null')] = $value;
							}
						}
					}
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:85: characters 11-21
					return $map;
				}, new StringMap()));
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:88: characters 9-23
				return Either::Left($v);
			}
		};
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:91: characters 19-23
		$_g = $f($o);
		$__hx__switch = ($_g->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:92: characters 17-18
			$v = $_g->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:93: characters 9-10
			return $v;
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:94: characters 18-19
			$m = $_g->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:95: characters 9-25
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:40: characters 5-37
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:46: characters 5-29
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:301: characters 5-31
		$path = (new \EReg("\\[(\\d+)\\]", "g"))->replace($path, ".\$1");
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:302: characters 5-33
		$paths = HxString::split($path, ".");
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:303: characters 5-31
		$current = $o;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:304: lines 304-317
		$_g = 0;
		while ($_g < $paths->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:304: characters 10-21
			$currentPath = ($paths->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:304: lines 304-317
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:305: lines 305-316
			if ($current === null) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:306: characters 9-20
				return null;
			} else if (ctype_digit($currentPath)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:308: lines 308-309
				$index = \Std::parseInt($currentPath);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:309: characters 19-47
				$value = $current;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:308: lines 308-309
				$arr = (($value instanceof \Array_hx) ? $value : null);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:310: characters 9-36
				if (null === $arr) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:310: characters 25-36
					return null;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:311: characters 9-29
				$current = ($arr->arr[$index] ?? null);
			} else if (\Reflect::hasField($current, $currentPath)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:313: characters 9-54
				$current = \Reflect::field($current, $currentPath);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:315: characters 9-20
				return null;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:318: characters 5-19
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:325: characters 12-45
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:344: characters 7-60
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:266: characters 5-31
		$path = (new \EReg("\\[(\\d+)\\]", "g"))->replace($path, ".\$1");
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:267: characters 5-33
		$paths = HxString::split($path, ".");
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:268: characters 5-31
		$current = $o;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:270: lines 270-281
		$_g = 0;
		while ($_g < $paths->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:270: characters 10-21
			$currentPath = ($paths->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:270: lines 270-281
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:271: lines 271-280
			if (ctype_digit($currentPath)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:272: lines 272-273
				$index = \Std::parseInt($currentPath);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:273: characters 19-47
				$value = $current;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:272: lines 272-273
				$arr = (($value instanceof \Array_hx) ? $value : null);
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:274: characters 9-60
				if ((null === $arr) || ($arr->length <= $index)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:274: characters 48-60
					return false;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:275: characters 9-29
				$current = ($arr->arr[$index] ?? null);
			} else if (\Reflect::hasField($current, $currentPath)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:277: characters 9-54
				$current = \Reflect::field($current, $currentPath);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:279: characters 9-21
				return false;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:282: characters 5-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:291: characters 5-36
		return Objects::getPath($o, $path) !== null;
	}

	/**
	 * @param object $o
	 * 
	 * @return object
	 */
	public static function inflate ($o) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:100: lines 100-102
		return Arrays::reduce(\Reflect::fields($o), function ($acc, $field) use (&$o) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:101: characters 5-56
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:34: characters 5-24
		return \Reflect::fields($o)->length === 0;
	}

	/**
	 * @param string $path
	 * 
	 * @return string
	 */
	public static function normalizePath ($path) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:436: characters 5-46
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:332: lines 332-333
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:407: characters 5-31
		$path = (new \EReg("\\[(\\d+)\\]", "g"))->replace($path, ".\$1");
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:408: characters 5-33
		$paths = HxString::split($path, ".");
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:411: characters 18-29
		if ($paths->length > 0) {
			$paths->length--;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:411: characters 5-30
		$target = \array_pop($paths->arr);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:415: lines 415-430
		try {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:416: lines 416-426
			$sub = Arrays::reduce($paths, function ($existing, $nextPath) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:417: lines 417-425
				if ($nextPath === "*") {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:418: characters 18-51
					$_this = $existing;
					if ($_this->length > 0) {
						$_this->length--;
					}
					return \array_pop($_this->arr);
				} else if (ctype_digit($nextPath)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:420: characters 11-44
					$current = $existing;
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:421: characters 11-46
					$index = \Std::parseInt($nextPath);
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:422: characters 11-32
					return $current[$index];
				} else {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:424: characters 11-51
					return \Reflect::field($existing, $nextPath);
				}
			}, $o);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:428: lines 428-429
			if (null !== $sub) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:429: characters 9-41
				\Reflect::deleteField($sub, $target);
			}
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:430: characters 14-15
			NativeStackTrace::saveStack($_g);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:432: characters 5-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:356: characters 5-31
		$path = (new \EReg("\\[(\\d+)\\]", "g"))->replace($path, ".\$1");
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:357: lines 357-358
		$paths = HxString::split($path, ".");
		$current = $o;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:360: characters 15-19
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:360: characters 19-37
		$_g1 = $paths->length - 1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:360: lines 360-388
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:360: characters 15-37
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:361: lines 361-362
			$currentPath = ($paths->arr[$i] ?? null);
			$nextPath = ($paths->arr[$i + 1] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:364: lines 364-387
			if (ctype_digit($currentPath) || ($currentPath === "*")) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:365: lines 365-369
				$index = ($currentPath === "*" ? $current->length : \Std::parseInt($currentPath));
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:370: lines 370-376
				if ($current[$index] === null) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:371: lines 371-375
					if (ctype_digit($nextPath) || ($nextPath === "*")) {
						#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:372: characters 13-32
						$current[$index] = new \Array_hx();
					} else {
						#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:374: characters 13-32
						$current[$index] = new HxAnon();
					}
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:377: characters 9-33
				$current = $current[$index];
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:379: lines 379-385
				if (!\Reflect::hasField($current, $currentPath)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:380: lines 380-384
					if (ctype_digit($nextPath) || ($nextPath === "*")) {
						#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:381: characters 13-55
						\Reflect::setField($current, $currentPath, new \Array_hx());
					} else {
						#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:383: characters 13-55
						\Reflect::setField($current, $currentPath, new HxAnon());
					}
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:386: characters 9-54
				$current = \Reflect::field($current, $currentPath);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:389: characters 5-26
		$p = ($paths->arr[$paths->length - 1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:390: lines 390-397
		if (ctype_digit($p)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:391: characters 7-35
			$index = \Std::parseInt($p);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:392: characters 7-27
			$current[$index] = $val;
		} else if ($p === "*") {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:394: characters 7-43
			$_this = $current;
			$_this->arr[$_this->length++] = $val;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:396: characters 7-40
			\Reflect::setField($current, $p, $val);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:398: characters 5-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:132: characters 5-17
		$to = new HxAnon();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:133: lines 133-135
		$_g = 0;
		$_g1 = \Reflect::fields($first);
		while ($_g < $_g1->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:133: characters 9-14
			$field = ($_g1->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:133: lines 133-135
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:134: characters 7-63
			\Reflect::setField($to, $field, \Reflect::field($first, $field));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:136: lines 136-138
		$_g = 0;
		$_g1 = \Reflect::fields($second);
		while ($_g < $_g1->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:136: characters 9-14
			$field = ($_g1->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:136: lines 136-138
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:137: characters 7-64
			\Reflect::setField($to, $field, \Reflect::field($second, $field));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:139: characters 5-14
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:216: characters 5-36
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:226: lines 226-235
		$_this = \Reflect::fields($o);
		$result = [];
		$data = $_this->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:228: characters 11-41
			$v = \Reflect::field($o, $item);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:229: lines 229-233
			$s = (is_string($v) ? Strings::quote($v) : Dynamics::string($v));
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:226: lines 226-235
			$result[] = ("" . ($item??'null') . " : " . ($s??'null'));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:225: lines 225-237
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:207: lines 207-210
		return Arrays::reduce(Objects::tuples($o), function ($map, $t) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:208: characters 7-26
			$map->data[$t->_0] = $t->_1;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:209: characters 7-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:255: lines 255-257
		$_this = \Reflect::fields($o);
		$result = [];
		$data = $_this->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:256: characters 14-52
			$this1 = new _HxAnon_Objects0($item, \Reflect::field($o, $item));
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:255: lines 255-257
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Objects.hx:248: characters 12-77
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
