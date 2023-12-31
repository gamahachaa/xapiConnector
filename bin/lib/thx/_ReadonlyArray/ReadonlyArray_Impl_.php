<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx
 */

namespace thx\_ReadonlyArray;

use \php\_Boot\HxAnon;
use \php\Boot;
use \haxe\Exception;
use \thx\Functions;
use \thx\Error;
use \thx\Arrays;
use \haxe\iterators\ArrayIterator;

final class ReadonlyArray_Impl_ {

	/**
	 * @param mixed[]|\Array_hx $this
	 * @param mixed $el
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function append ($this1, $el) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:111: characters 5-29
		return $this1->concat(\Array_hx::wrap([$el]));
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * @param mixed[]|\Array_hx $that
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function concat ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:77: characters 5-38
		return $this1->concat($that);
	}

	/**
	 * @return mixed[]|\Array_hx
	 */
	public static function empty () {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:9: characters 5-14
		return new \Array_hx();
	}

	/**
	 * @param \Array_hx[]|\Array_hx $array
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function flatten ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:16: characters 7-108
		return Arrays::reduce($array, function ($acc, $element) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:16: characters 77-103
			return $acc->concat($element);
		}, new \Array_hx());
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * @param int $i
	 * 
	 * @return mixed
	 */
	public static function get ($this1, $i) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:41: characters 5-19
		return ($this1->arr[$i] ?? null);
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_length ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:37: characters 37-55
		return $this1->length;
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * 
	 * @return mixed
	 */
	public static function head ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:44: characters 5-19
		return ($this1->arr[0] ?? null);
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * @param mixed $el
	 * @param \Closure $eq
	 * 
	 * @return int
	 */
	public static function indexOf ($this1, $el, $eq = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:20: characters 5-43
		if (null === $eq) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:20: characters 20-43
			$eq = Boot::getStaticClosure(Functions::class, 'equality');
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:21: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:21: characters 18-29
		$_g1 = $this1->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:21: lines 21-23
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:21: characters 14-29
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:22: lines 22-23
			if ($eq($el, ($this1->arr[$i] ?? null))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:23: characters 9-17
				return $i;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:24: characters 5-14
		return -1;
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * @param mixed $ref
	 * @param mixed $el
	 * @param \Closure $eq
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function insertAfter ($this1, $ref, $el, $eq = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:83: characters 5-32
		$pos = ReadonlyArray_Impl_::indexOf($this1, $ref, $eq);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:84: lines 84-85
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:85: characters 7-28
			$pos = $this1->length - 1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:86: characters 12-31
		$pos1 = $pos + 1;
		return $this1->slice(0, $pos1)->concat(\Array_hx::wrap([$el]))->concat($this1->slice($pos1));
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * @param int $pos
	 * @param mixed $el
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function insertAt ($this1, $pos, $el) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:80: characters 5-67
		return $this1->slice(0, $pos)->concat(\Array_hx::wrap([$el]))->concat($this1->slice($pos));
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * @param mixed $ref
	 * @param mixed $el
	 * @param \Closure $eq
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function insertBefore ($this1, $ref, $el, $eq = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:90: characters 12-42
		$pos = ReadonlyArray_Impl_::indexOf($this1, $ref, $eq);
		return $this1->slice(0, $pos)->concat(\Array_hx::wrap([$el]))->concat($this1->slice($pos));
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * 
	 * @return object
	 */
	public static function iterator ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:146: characters 5-27
		return new ArrayIterator($this1);
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * @param mixed $el
	 * @param \Closure $eq
	 * 
	 * @return int
	 */
	public static function lastIndexOf ($this1, $el, $eq = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:28: characters 5-43
		if (null === $eq) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:28: characters 20-43
			$eq = Boot::getStaticClosure(Functions::class, 'equality');
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:29: characters 5-27
		$len = $this1->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:30: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:30: characters 18-21
		$_g1 = $len;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:30: lines 30-32
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:30: characters 14-21
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:31: lines 31-32
			if ($eq($el, ($this1->arr[$len - $i - 1] ?? null))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:32: characters 9-17
				return $i;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:33: characters 5-14
		return -1;
	}

	/**
	 * Removes and returns the value at the end of the array.  The original ReadonlyArray is unchanged.
	 * 
	 * @param mixed[]|\Array_hx $this
	 * 
	 * @return object
	 */
	public static function pop ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:139: characters 5-55
		if ($this1->length === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:139: characters 34-55
			$this2 = new _HxAnon_ReadonlyArray_Impl_0(null, $this1);
			return $this2;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:140: characters 5-39
		$value = ($this1->arr[$this1->length - 1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:141: characters 17-42
		$pos = $this1->length - 1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:141: characters 5-43
		$array = $this1->slice(0, $pos)->concat($this1->slice($pos + 1));
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:142: characters 12-35
		$this1 = new _HxAnon_ReadonlyArray_Impl_0($value, $array);
		return $this1;
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * @param mixed $el
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function prepend ($this1, $el) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:108: characters 5-29
		return (\Array_hx::wrap([$el]))->concat($this1);
	}

	/**
	 * Alias for append
	 * 
	 * @param mixed[]|\Array_hx $this
	 * @param mixed $el
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function push ($this1, $el) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:133: characters 5-22
		return $this1->concat(\Array_hx::wrap([$el]));
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * @param \Closure $f
	 * @param mixed $initial
	 * 
	 * @return mixed
	 */
	public static function reduce ($this1, $f, $initial) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:50: lines 50-51
		$_g = 0;
		while ($_g < $this1->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:50: characters 9-10
			$v = ($this1->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:50: lines 50-51
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:51: characters 7-30
			$initial = $f($initial, $v);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:52: characters 5-19
		return $initial;
	}

	/**
	 * It is the same as `reduce` but with the extra integer `index` parameter.
	 * 
	 * @param mixed[]|\Array_hx $this
	 * @param \Closure $f
	 * @param mixed $initial
	 * 
	 * @return mixed
	 */
	public static function reducei ($this1, $f, $initial) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:59: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:59: characters 18-29
		$_g1 = $this1->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:59: lines 59-60
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:59: characters 14-29
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:60: characters 7-39
			$initial = $f($initial, ($this1->arr[$i] ?? null), $i);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:61: characters 5-19
		return $initial;
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * @param mixed $el
	 * @param \Closure $eq
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function remove ($this1, $el, $eq = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:102: characters 12-37
		$pos = ReadonlyArray_Impl_::indexOf($this1, $el, $eq);
		return $this1->slice(0, $pos)->concat($this1->slice($pos + 1));
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * @param int $pos
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function removeAt ($this1, $pos) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:105: characters 5-58
		return $this1->slice(0, $pos)->concat($this1->slice($pos + 1));
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * @param mixed $ref
	 * @param mixed $el
	 * @param \Closure $eq
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function replace ($this1, $ref, $el, $eq = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:93: characters 5-32
		$pos = ReadonlyArray_Impl_::indexOf($this1, $ref, $eq);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:94: characters 5-22
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:94: characters 17-22
			throw Exception::thrown(new Error("unable to find reference element", null, new _HxAnon_ReadonlyArray_Impl_1("thx/ReadonlyArray.hx", 94, "thx._ReadonlyArray.ReadonlyArray_Impl_", "replace")));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:95: characters 5-30
		return $this1->slice(0, $pos)->concat(\Array_hx::wrap([$el]))->concat($this1->slice($pos + 1));
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * @param int $pos
	 * @param mixed $el
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function replaceAt ($this1, $pos, $el) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:99: characters 5-71
		return $this1->slice(0, $pos)->concat(\Array_hx::wrap([$el]))->concat($this1->slice($pos + 1));
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function reverse ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:65: characters 5-27
		$arr = (clone $this1);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:66: characters 5-18
		$arr->arr = \array_reverse($arr->arr);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:67: characters 5-15
		return $arr;
	}

	/**
	 * Removes and returns the value at the beginning of the array.  The original ReadonlyArray is unchanged.
	 * 
	 * @param mixed[]|\Array_hx $this
	 * 
	 * @return object
	 */
	public static function shift ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:123: characters 5-55
		if ($this1->length === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:123: characters 34-55
			$this2 = new _HxAnon_ReadonlyArray_Impl_0(null, $this1);
			return $this2;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:124: characters 5-25
		$value = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:125: characters 5-29
		$array = $this1->slice(0, 0)->concat($this1->slice(1));
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:126: characters 12-35
		$this1 = new _HxAnon_ReadonlyArray_Impl_0($value, $array);
		return $this1;
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function tail ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:47: characters 5-25
		return $this1->slice(1);
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function toArray ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:71: characters 5-23
		return (clone $this1);
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function unsafe ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:74: characters 5-16
		return $this1;
	}

	/**
	 * Alias for prepend
	 * 
	 * @param mixed[]|\Array_hx $this
	 * @param mixed $el
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function unshift ($this1, $el) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/ReadonlyArray.hx:117: characters 5-23
		return (\Array_hx::wrap([$el]))->concat($this1);
	}
}

class _HxAnon_ReadonlyArray_Impl_0 extends HxAnon {
	function __construct($_0, $_1) {
		$this->_0 = $_0;
		$this->_1 = $_1;
	}
}

class _HxAnon_ReadonlyArray_Impl_1 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(ReadonlyArray_Impl_::class, 'thx._ReadonlyArray.ReadonlyArray_Impl_');
Boot::registerGetters('thx\\_ReadonlyArray\\ReadonlyArray_Impl_', [
	'length' => true
]);
