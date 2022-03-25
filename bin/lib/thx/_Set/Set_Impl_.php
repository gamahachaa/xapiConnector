<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:55: character 2
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:64: lines 64-67
		if ($this1->exists($v)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:64: characters 30-35
			return false;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:65: characters 4-21
			$this1->set($v, true);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:66: characters 4-8
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:73: characters 3-22
		$inst = Set_Impl_::empty($this1);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:74: characters 13-24
		$k = $this1->keys();
		while ($k->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:74: lines 74-75
			$k1 = $k->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:75: characters 4-16
			$inst->set($k1, true);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:76: characters 3-14
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:46: characters 3-32
		$map = new EnumValueMap();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:47: characters 13-28
		$this1 = $map;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:47: characters 3-29
		$set = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:48: lines 48-49
		if (null !== $arr) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:49: characters 4-21
			Set_Impl_::pushMany($set, $arr);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:50: characters 3-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:24: characters 3-34
		$map = new IntMap();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:25: characters 13-30
		$this1 = $map;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:25: characters 3-31
		$set = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:26: lines 26-27
		if (null !== $it) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:27: characters 4-20
			Set_Impl_::pushMany($set, $it);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:28: characters 3-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:35: characters 3-32
		$map = new ObjectMap();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:36: characters 13-28
		$this1 = $map;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:36: characters 3-29
		$set = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:37: lines 37-38
		if (null !== $it) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:38: characters 4-20
			Set_Impl_::pushMany($set, $it);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:39: characters 3-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:13: characters 3-37
		$map = new StringMap();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:14: characters 13-33
		$this1 = $map;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:14: characters 3-34
		$set = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:15: lines 15-16
		if (null !== $it) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:16: characters 4-20
			Set_Impl_::pushMany($set, $it);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:17: characters 3-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:92: characters 3-23
		$result = Set_Impl_::copy($this1);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:93: characters 16-19
		$item = Set_Impl_::iterator($set);
		while ($item->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:93: lines 93-94
			$item1 = $item->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:94: characters 4-23
			$result->remove($item1);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:95: characters 3-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:83: characters 3-72
		$inst = \Type::createInstance(\Type::getClass($this1), new \Array_hx());
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:84: characters 10-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:115: characters 3-24
		return $this1->exists($v);
	}

	/**
	 * @param IMap $this
	 * @param \Closure $predicate
	 * 
	 * @return IMap
	 */
	public static function filter ($this1, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:99: lines 99-103
		return Set_Impl_::reduce($this1, function ($acc, $v) use (&$predicate) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:100: lines 100-101
			if ($predicate($v)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:101: characters 5-15
				Set_Impl_::add($acc, $v);
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:102: characters 4-14
			return $acc;
		}, Set_Impl_::empty($this1));
	}

	/**
	 * @param IMap $this
	 * 
	 * @return int
	 */
	public static function get_length ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:186: characters 3-13
		$l = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:187: characters 13-17
		$i = $this1->iterator();
		while ($i->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:187: lines 187-188
			$i1 = $i->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:188: characters 4-7
			++$l;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:189: characters 3-11
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:124: characters 3-24
		$result = Set_Impl_::empty($this1);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:125: characters 16-26
		$item = Set_Impl_::iterator($this1);
		while ($item->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:125: lines 125-127
			$item1 = $item->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:126: lines 126-127
			if ($set->exists($item1)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:127: characters 5-22
				$result->set($item1, true);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:128: characters 3-16
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:155: characters 3-21
		return $this1->keys();
	}

	/**
	 * @param IMap $this
	 * @param \Closure $f
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function map ($this1, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:106: lines 106-109
		return Set_Impl_::reduce($this1, function ($acc, $v) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:107: characters 4-18
			$x = $f($v);
			$acc->arr[$acc->length++] = $x;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:108: characters 4-14
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:135: characters 3-20
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:141: characters 17-23
		$value = $values->iterator();
		while ($value->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:141: lines 141-142
			$value1 = $value->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:142: characters 4-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:145: characters 13-23
		$v = Set_Impl_::iterator($this1);
		while ($v->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:145: lines 145-147
			$v1 = $v->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:146: characters 4-25
			$acc = $handler($acc, $v1);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:148: characters 3-13
		return $acc;
	}

	/**
	 * @param IMap $this
	 * @param mixed $v
	 * 
	 * @return bool
	 */
	public static function remove ($this1, $v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:118: characters 3-24
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:172: characters 3-25
		$arr = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:173: characters 13-24
		$k = $this1->keys();
		while ($k->hasNext()) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:173: lines 173-174
			$k1 = $k->next();
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:174: characters 4-15
			$arr->arr[$arr->length++] = $k1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:175: characters 3-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:183: characters 3-42
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:161: characters 3-23
		$newset = Set_Impl_::copy($this1);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:162: characters 3-23
		Set_Impl_::pushMany($newset, Set_Impl_::toArray($set));
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Set.hx:163: characters 3-16
		return $newset;
	}
}

Boot::registerClass(Set_Impl_::class, 'thx._Set.Set_Impl_');
Boot::registerGetters('thx\\_Set\\Set_Impl_', [
	'length' => true
]);
