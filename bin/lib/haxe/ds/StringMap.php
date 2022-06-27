<?php
/**
 */

namespace haxe\ds;

use \php\Boot;
use \haxe\IMap;
use \php\_NativeIndexedArray\NativeIndexedArrayIterator;

/**
 * StringMap allows mapping of String keys to arbitrary values.
 * See `Map` for documentation details.
 * @see https://haxe.org/manual/std-Map.html
 */
class StringMap implements IMap {
	/**
	 * @var array
	 */
	public $data;

	/**
	 * Creates a new StringMap.
	 * 
	 * @return void
	 */
	public function __construct () {
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/StringMap.hx:35: characters 10-32
		$this1 = [];
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/StringMap.hx:35: characters 3-32
		$this->data = $this1;
	}

	/**
	 * See `Map.exists`
	 * 
	 * @param string $key
	 * 
	 * @return bool
	 */
	public function exists ($key) {
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/StringMap.hx:47: characters 3-44
		return \array_key_exists($key, $this->data);
	}

	/**
	 * See `Map.get`
	 * 
	 * @param string $key
	 * 
	 * @return mixed
	 */
	public function get ($key) {
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/StringMap.hx:43: characters 3-42
		return ($this->data[$key] ?? null);
	}

	/**
	 * See `Map.iterator`
	 * (cs, java) Implementation detail: Do not `set()` any new value while
	 * iterating, as it may cause a resize, which will break iteration.
	 * 
	 * @return object
	 */
	public function iterator () {
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/StringMap.hx:65: characters 10-25
		return new NativeIndexedArrayIterator(\array_values($this->data));
	}

	/**
	 * See `Map.keys`
	 * (cs, java) Implementation detail: Do not `set()` any new value while
	 * iterating, as it may cause a resize, which will break iteration.
	 * 
	 * @return object
	 */
	public function keys () {
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/StringMap.hx:60: characters 10-72
		return new NativeIndexedArrayIterator(\array_values(\array_map("strval", \array_keys($this->data))));
	}

	/**
	 * See `Map.remove`
	 * 
	 * @param string $key
	 * 
	 * @return bool
	 */
	public function remove ($key) {
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/StringMap.hx:51: lines 51-56
		if (\array_key_exists($key, $this->data)) {
			#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/StringMap.hx:52: characters 4-27
			unset($this->data[$key]);
			#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/StringMap.hx:53: characters 4-15
			return true;
		} else {
			#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/StringMap.hx:55: characters 4-16
			return false;
		}
	}

	/**
	 * See `Map.set`
	 * 
	 * @param string $key
	 * @param mixed $value
	 * 
	 * @return void
	 */
	public function set ($key, $value) {
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/StringMap.hx:39: characters 3-20
		$this->data[$key] = $value;
	}

	/**
	 * See `Map.toString`
	 * 
	 * @return string
	 */
	public function toString () {
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/StringMap.hx:78: characters 15-32
		$this1 = [];
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/StringMap.hx:78: characters 3-33
		$parts = $this1;
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/StringMap.hx:79: lines 79-81
		$collection = $this->data;
		foreach ($collection as $key => $value) {
			#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/StringMap.hx:80: characters 4-60
			\array_push($parts, "" . ($key??'null') . " => " . \Std::string($value));
		}
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/StringMap.hx:83: characters 3-49
		return "{" . (\implode(", ", $parts)??'null') . "}";
	}

	public function __toString() {
		return $this->toString();
	}
}

Boot::registerClass(StringMap::class, 'haxe.ds.StringMap');
