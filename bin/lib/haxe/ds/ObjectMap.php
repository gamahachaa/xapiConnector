<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx
 */

namespace haxe\ds;

use \php\Boot;
use \haxe\IMap;
use \php\_NativeIndexedArray\NativeIndexedArrayIterator;

/**
 * ObjectMap allows mapping of object keys to arbitrary values.
 * On static targets, the keys are considered to be strong references. Refer
 * to `haxe.ds.WeakMap` for a weak reference version.
 * See `Map` for documentation details.
 * @see https://haxe.org/manual/std-Map.html
 */
class ObjectMap implements IMap {
	/**
	 * @var array
	 */
	public $_keys;
	/**
	 * @var array
	 */
	public $_values;

	/**
	 * Creates a new ObjectMap.
	 * 
	 * @return void
	 */
	public function __construct () {
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx:33: characters 11-33
		$this1 = [];
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx:33: characters 3-33
		$this->_keys = $this1;
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx:34: characters 13-35
		$this1 = [];
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx:34: characters 3-35
		$this->_values = $this1;
	}

	/**
	 * See `Map.exists`
	 * 
	 * @param mixed $key
	 * 
	 * @return bool
	 */
	public function exists ($key) {
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx:49: characters 3-71
		return \array_key_exists(\spl_object_hash($key), $this->_values);
	}

	/**
	 * See `Map.get`
	 * 
	 * @param mixed $key
	 * 
	 * @return mixed
	 */
	public function get ($key) {
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx:44: characters 3-40
		$id = \spl_object_hash($key);
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx:45: characters 10-56
		if (isset($this->_values[$id])) {
			#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx:45: characters 38-49
			return $this->_values[$id];
		} else {
			#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx:45: characters 52-56
			return null;
		}
	}

	/**
	 * See `Map.iterator`
	 * (cs, java) Implementation detail: Do not `set()` any new value while
	 * iterating, as it may cause a resize, which will break iteration.
	 * 
	 * @return object
	 */
	public function iterator () {
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx:68: characters 10-28
		return new NativeIndexedArrayIterator(\array_values($this->_values));
	}

	/**
	 * See `Map.keys`
	 * (cs, java) Implementation detail: Do not `set()` any new value while
	 * iterating, as it may cause a resize, which will break iteration.
	 * 
	 * @return object
	 */
	public function keys () {
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx:63: characters 10-26
		return new NativeIndexedArrayIterator(\array_values($this->_keys));
	}

	/**
	 * See `Map.remove`
	 * 
	 * @param mixed $key
	 * 
	 * @return bool
	 */
	public function remove ($key) {
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx:53: characters 3-40
		$id = \spl_object_hash($key);
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx:54: lines 54-59
		if (\array_key_exists($id, $this->_values)) {
			#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx:55: characters 4-40
			unset($this->_keys[$id], $this->_values[$id]);
			#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx:56: characters 4-15
			return true;
		} else {
			#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx:58: characters 4-16
			return false;
		}
	}

	/**
	 * See `Map.set`
	 * 
	 * @param mixed $key
	 * @param mixed $value
	 * 
	 * @return void
	 */
	public function set ($key, $value) {
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx:38: characters 3-40
		$id = \spl_object_hash($key);
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx:39: characters 3-18
		$this->_keys[$id] = $key;
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/ds/ObjectMap.hx:40: characters 3-22
		$this->_values[$id] = $value;
	}
}

Boot::registerClass(ObjectMap::class, 'haxe.ds.ObjectMap');
