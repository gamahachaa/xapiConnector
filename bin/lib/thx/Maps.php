<?php
/**
 */

namespace thx;

use \php\_Boot\HxAnon;
use \haxe\ds\Option;
use \php\Boot;
use \haxe\IMap;
use \haxe\ds\StringMap;

/**
 * Extension methods for Maps
 */
class Maps {
	/**
	 * Copies all the key/values pairs from `src` to `dst`. It overwrites already existing
	 * keys in `dst` if needed.
	 * 
	 * @param IMap $src
	 * @param IMap $dst
	 * 
	 * @return IMap
	 */
	public static function copyTo ($src, $dst) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:23: characters 16-26
		$key = $src->keys();
		while ($key->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:23: lines 23-24
			$key1 = $key->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:24: characters 7-33
			$dst->set($key1, $src->get($key1));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:25: characters 5-15
		return $dst;
	}

	/**
	 * Unordered fold over key/value pairs in the map.
	 * 
	 * @param IMap $map
	 * @param \Closure $f
	 * @param mixed $acc
	 * 
	 * @return mixed
	 */
	public static function foldLeftWithKeys ($map, $f, $acc) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:73: lines 73-76
		return Iterators::reduce($map->keys(), function ($acc, $k) use (&$f, &$map) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:74: characters 24-52
			return $f($acc, $k, $map->get($k));
		}, $acc);
	}

	/**
	 * Creates a `Map<K, V>` from an `Array<T>` using key extractor `T -> K` and value extractor `T -> V` functions.
	 * `K` must be a string.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * @param \Closure $toKey
	 * @param \Closure $toVal
	 * 
	 * @return StringMap
	 */
	public static function fromArray ($array, $toKey, $toVal) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:64: lines 64-67
		return Arrays::reduce($array, function ($acc, $curr) use (&$toKey, &$toVal) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:65: characters 7-40
			$key = $toKey($curr);
			$value = $toVal($curr);
			$acc->data[$key] = $value;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:66: characters 7-17
			return $acc;
		}, new StringMap());
	}

	/**
	 * Given a `key` returns the associated value from `map`. If the key doesn't exist or the associated value is `null`,
	 * it returns the provided `alt` value instead.
	 * 
	 * @param IMap $map
	 * @param mixed $key
	 * @param mixed $alt
	 * 
	 * @return mixed
	 */
	public static function getAlt ($map, $key, $alt) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:99: characters 5-26
		$v = $map->get($key);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:100: characters 12-31
		if (null === $v) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:100: characters 24-27
			return $alt;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:100: characters 30-31
			return $v;
		}
	}

	/**
	 * Given a `key` returns the associated value from `map`. If the key doesn't exist or the associated value is `null`,
	 * it returns the provided `alt` value instead, and stores the `alt` value in the map.
	 * 
	 * @param IMap $map
	 * @param mixed $key
	 * @param mixed $alt
	 * 
	 * @return mixed
	 */
	public static function getAltSet ($map, $key, $alt) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:108: characters 5-26
		$v = $map->get($key);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:109: lines 109-114
		if ($v !== null) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:110: characters 7-8
			return $v;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:112: characters 7-24
			$map->set($key, $alt);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:113: characters 7-10
			return $alt;
		}
	}

	/**
	 * Null-safe get.
	 * 
	 * @param IMap $map
	 * @param mixed $key
	 * 
	 * @return Option
	 */
	public static function getOption ($map, $key) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:83: characters 12-41
		$value = $map->get($key);
		if (null === $value) {
			return Option::None();
		} else {
			return Option::Some($value);
		}
	}

	/**
	 * Returns true if the map is empty (no key/value pairs).
	 * 
	 * @param IMap $map
	 * 
	 * @return bool
	 */
	public static function isEmpty ($map) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:121: characters 5-37
		return !$map->iterator()->hasNext();
	}

	/**
	 * Returns true if a value is of any type of Map. Equivalent to `Std.is(v, IMap)`.
	 * 
	 * @param mixed $v
	 * 
	 * @return bool
	 */
	public static function isMap ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:127: characters 5-27
		return ($v instanceof IMap);
	}

	/**
	 * It maps values from one `Map` instance to another.
	 * 
	 * @param IMap $map
	 * @param \Closure $f
	 * @param IMap $acc
	 * 
	 * @return IMap
	 */
	public static function mapValues ($map, $f, $acc) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:40: lines 40-43
		return Maps::reduce($map, function ($m, $t) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:41: characters 7-27
			$m->set($t->_0, $f($t->_1));
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:42: characters 7-15
			return $m;
		}, $acc);
	}

	/**
	 * Merges 0 or more maps of the same type into a destination map.  Successive source maps will overwrite values for
	 * the same key from previous sources.  The destination map is modified in place, and the destination is also returned
	 * from the function.  To merge into an empty map, pass a new empty map as the dest argument.
	 * ```
	 * var result1 = map1.merge([map2, map3]); // result1 and map1 should be the same after this.  map2 and map3 are not modified.
	 * var result2 = (new Map() : Map<String, Int>).merge(map1, map2); // map1 and map2 not modified
	 * ```
	 * 
	 * @param IMap $dest
	 * @param IMap[]|\Array_hx $sources
	 * 
	 * @return IMap
	 */
	public static function merge ($dest, $sources) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:146: lines 146-151
		return Arrays::reduce($sources, function ($result, $source) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:147: lines 147-150
			return Iterators::reduce($source->keys(), function ($result, $key) use (&$source) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:148: characters 9-41
				$result->set($key, $source->get($key));
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:149: characters 9-22
				return $result;
			}, $result);
		}, $dest);
	}

	/**
	 * Applies the reduce function on every key/value pair in the map.
	 * 
	 * @param IMap $map
	 * @param \Closure $f
	 * @param mixed $acc
	 * 
	 * @return mixed
	 */
	public static function reduce ($map, $f, $acc) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:49: characters 5-38
		return Arrays::reduce(Maps::tuples($map), $f, $acc);
	}

	/**
	 * @param IMap $m
	 * 
	 * @return string
	 */
	public static function string ($m) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:130: lines 130-132
		$_this = Maps::tuples($m);
		$result = [];
		$data = $_this->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = ((Dynamics::string(Boot::dynamicField($item, '_0'))??'null') . " => " . (Dynamics::string(Boot::dynamicField($item, '_1'))??'null'));
		}
		return "[" . (\Array_hx::wrap($result)->join(", ")??'null') . "]";
	}

	/**
	 * `mapToObject` transforms a `Map<String, T>` into an anonymous object.
	 * 
	 * @param StringMap $map
	 * 
	 * @return object
	 */
	public static function toObject ($map) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:89: lines 89-92
		return Arrays::reduce(Maps::tuples($map), function ($o, $t) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:90: characters 7-38
			\Reflect::setField($o, $t->_0, $t->_1);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:91: characters 7-15
			return $o;
		}, new HxAnon());
	}

	/**
	 * Converts a Map<TKey, TValue> into an Array<Tuple2<TKey, TValue>>
	 * 
	 * @param IMap $map
	 * 
	 * @return object[]|\Array_hx
	 */
	public static function tuples ($map) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:32: lines 32-34
		return Iterators::map($map->keys(), function ($key) use (&$map) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:33: characters 14-43
			$this1 = new _HxAnon_Maps0($key, $map->get($key));
			return $this1;
		});
	}

	/**
	 * Extracts the values of a Map<TKey, TValue> into Array<TValue>
	 * 
	 * @param IMap $map
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function values ($map) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:55: lines 55-57
		return Iterators::map($map->keys(), function ($key) use (&$map) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Maps.hx:56: characters 7-26
			return $map->get($key);
		});
	}
}

class _HxAnon_Maps0 extends HxAnon {
	function __construct($_0, $_1) {
		$this->_0 = $_0;
		$this->_1 = $_1;
	}
}

Boot::registerClass(Maps::class, 'thx.Maps');
