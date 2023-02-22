<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx
 */

namespace thx\_Set;

use \php\Boot;
use \haxe\ds\ObjectMap;
use \haxe\ds\IntMap;
use \haxe\IMap;
use \haxe\ds\StringMap;
use \haxe\ds\EnumValueMap;

final class Set_Impl_ {

	/**
	 * @param IMap $map
	 * 
	 * @return IMap
	 */
	public static function _new ($map) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:55: character 3
		$this1 = $map;
		return $this1;
	}

	/**
	 * `add` pushes a value into `Set` if the value was not already present.
	 * It returns a boolean value indicating if `Set` was changed by the operation or not.
	 * 
	 * @param IMap $this
	 * @param mixed $v
	 * 
	 * @return bool
	 */
	public static function add ($this1, $v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:64: lines 64-69
		if ($this1->exists($v)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:65: characters 7-12
			return false;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:67: characters 7-24
			$this1->set($v, true);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:68: characters 7-11
			return true;
		}
	}

	/**
	 * `copy` creates a new `Set` with copied elements.
	 * 
	 * @param IMap $this
	 * 
	 * @return IMap
	 */
	public static function copy ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:75: characters 5-24
		$inst = Set_Impl_::empty($this1);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:76: characters 14-25
		$k = $this1->keys();
		while ($k->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:76: lines 76-77
			$k1 = $k->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:77: characters 7-19
			$inst->set($k1, true);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:78: characters 5-16
		return $inst;
	}

	/**
	 * Creates a Set of EnumValue, with optional initial values.
	 * 
	 * @param object $arr
	 * 
	 * @return EnumValueMap
	 */
	public static function createEnum ($arr = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:46: characters 5-34
		$map = new EnumValueMap();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:47: characters 15-30
		$this1 = $map;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:47: characters 5-31
		$set = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:48: lines 48-49
		if (null !== $arr) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:49: characters 7-24
			Set_Impl_::pushMany($set, $arr);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:50: characters 5-15
		return $set;
	}

	/**
	 * Creates a Set of Ints with optional initial values.
	 * 
	 * @param object $it
	 * 
	 * @return IntMap
	 */
	public static function createInt ($it = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:24: characters 5-36
		$map = new IntMap();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:25: characters 15-32
		$this1 = $map;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:25: characters 5-33
		$set = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:26: lines 26-27
		if (null !== $it) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:27: characters 7-23
			Set_Impl_::pushMany($set, $it);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:28: characters 5-15
		return $set;
	}

	/**
	 * Creates a Set of anonymous objects with optional initial values.
	 * 
	 * @param object $it
	 * 
	 * @return ObjectMap
	 */
	public static function createObject ($it = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:35: characters 5-34
		$map = new ObjectMap();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:36: characters 15-30
		$this1 = $map;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:36: characters 5-31
		$set = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:37: lines 37-38
		if (null !== $it) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:38: characters 7-23
			Set_Impl_::pushMany($set, $it);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:39: characters 5-15
		return $set;
	}

	/**
	 * Creates a Set of Strings with optional initial values.
	 * 
	 * @param object $it
	 * 
	 * @return StringMap
	 */
	public static function createString ($it = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:13: characters 5-39
		$map = new StringMap();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:14: characters 15-35
		$this1 = $map;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:14: characters 5-36
		$set = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:15: lines 15-16
		if (null !== $it) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:16: characters 7-23
			Set_Impl_::pushMany($set, $it);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:17: characters 5-15
		return $set;
	}

	/**
	 * `difference` creates a new `Set` with elements from the first set excluding the elements
	 * from the second.
	 * 
	 * @param IMap $this
	 * @param IMap $set
	 * 
	 * @return IMap
	 */
	public static function difference ($this1, $set) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:94: characters 5-25
		$result = Set_Impl_::copy($this1);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:95: characters 17-20
		$item = Set_Impl_::iterator($set);
		while ($item->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:95: lines 95-96
			$item1 = $item->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:96: characters 7-26
			$result->remove($item1);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:97: characters 5-18
		return $result;
	}

	/**
	 * Creates an empty copy of the current set.
	 * 
	 * @param IMap $this
	 * 
	 * @return IMap
	 */
	public static function empty ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:85: characters 5-76
		$inst = \Type::createInstance(\Type::getClass($this1), new \Array_hx());
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:86: characters 12-25
		$this1 = $inst;
		return $this1;
	}

	/**
	 * `exists` returns `true` if it contains an element that is equals to `v`.
	 * 
	 * @param IMap $this
	 * @param mixed $v
	 * 
	 * @return bool
	 */
	public static function exists ($this1, $v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:117: characters 5-26
		return $this1->exists($v);
	}

	/**
	 * @param IMap $this
	 * @param \Closure $predicate
	 * 
	 * @return IMap
	 */
	public static function filter ($this1, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:101: lines 101-105
		return Set_Impl_::reduce($this1, function ($acc, $v) use (&$predicate) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:102: lines 102-103
			if ($predicate($v)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:103: characters 9-19
				Set_Impl_::add($acc, $v);
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:104: characters 7-17
			return $acc;
		}, Set_Impl_::empty($this1));
	}

	/**
	 * @param IMap $this
	 * 
	 * @return int
	 */
	public static function get_length ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:188: characters 5-15
		$l = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:189: characters 14-18
		$i = $this1->iterator();
		while ($i->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:189: lines 189-190
			$i1 = $i->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:190: characters 7-10
			++$l;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:191: characters 5-13
		return $l;
	}

	/**
	 * `intersection` returns a Set with elements that are presents in both sets
	 * 
	 * @param IMap $this
	 * @param IMap $set
	 * 
	 * @return IMap
	 */
	public static function intersection ($this1, $set) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:126: characters 5-26
		$result = Set_Impl_::empty($this1);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:127: characters 17-27
		$item = Set_Impl_::iterator($this1);
		while ($item->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:127: lines 127-129
			$item1 = $item->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:128: lines 128-129
			if ($set->exists($item1)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:129: characters 9-26
				$result->set($item1, true);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:130: characters 5-18
		return $result;
	}

	/**
	 * Iterates the values of the Set.
	 * 
	 * @param IMap $this
	 * 
	 * @return object
	 */
	public static function iterator ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:157: characters 5-23
		return $this1->keys();
	}

	/**
	 * @param IMap $this
	 * @param \Closure $f
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function map ($this1, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:108: lines 108-111
		return Set_Impl_::reduce($this1, function ($acc, $v) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:109: characters 7-21
			$x = $f($v);
			$acc->arr[$acc->length++] = $x;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:110: characters 7-17
			return $acc;
		}, new \Array_hx());
	}

	/**
	 * Like `add` but doesn't notify if the addition was successful or not.
	 * 
	 * @param IMap $this
	 * @param mixed $v
	 * 
	 * @return void
	 */
	public static function push ($this1, $v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:137: characters 5-22
		$this1->set($v, true);
	}

	/**
	 * Pushes many values to the set
	 * 
	 * @param IMap $this
	 * @param object $values
	 * 
	 * @return void
	 */
	public static function pushMany ($this1, $values) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:143: characters 18-24
		$value = $values->iterator();
		while ($value->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:143: lines 143-144
			$value1 = $value->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:144: characters 7-18
			$this1->set($value1, true);
		}
	}

	/**
	 * @param IMap $this
	 * @param \Closure $handler
	 * @param mixed $acc
	 * 
	 * @return mixed
	 */
	public static function reduce ($this1, $handler, $acc) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:147: characters 14-24
		$v = Set_Impl_::iterator($this1);
		while ($v->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:147: lines 147-149
			$v1 = $v->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:148: characters 7-28
			$acc = $handler($acc, $v1);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:150: characters 5-15
		return $acc;
	}

	/**
	 * @param IMap $this
	 * @param mixed $v
	 * 
	 * @return bool
	 */
	public static function remove ($this1, $v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:120: characters 5-26
		return $this1->remove($v);
	}

	/**
	 * Converts a `Set<T>` into `Array<T>`. The returned array is a copy of the internal
	 * array used by `Set`. This ensures that the set is not affected by unsafe operations
	 * that might happen on the returned array.
	 * 
	 * @param IMap $this
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function toArray ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:174: characters 5-29
		$arr = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:175: characters 14-25
		$k = $this1->keys();
		while ($k->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:175: lines 175-176
			$k1 = $k->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:176: characters 7-18
			$arr->arr[$arr->length++] = $k1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:177: characters 5-15
		return $arr;
	}

	/**
	 * Converts `Set` into `String`. To differentiate from normal `Array`s the output string
	 * uses curly braces `{}` instead of square brackets `[]`.
	 * 
	 * @param IMap $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:185: characters 5-44
		return "{" . (Set_Impl_::toArray($this1)->join(", ")??'null') . "}";
	}

	/**
	 * Union creates a new Set with elements from both sets.
	 * 
	 * @param IMap $this
	 * @param IMap $set
	 * 
	 * @return IMap
	 */
	public static function union ($this1, $set) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:163: characters 5-25
		$newset = Set_Impl_::copy($this1);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:164: characters 5-25
		Set_Impl_::pushMany($newset, Set_Impl_::toArray($set));
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Set.hx:165: characters 5-18
		return $newset;
	}
}

Boot::registerClass(Set_Impl_::class, 'thx._Set.Set_Impl_');
Boot::registerGetters('thx\\_Set\\Set_Impl_', [
	'length' => true
]);
