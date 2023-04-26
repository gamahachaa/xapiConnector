<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:114: characters 3-27
		return $this1->concat(\Array_hx::wrap([$el]));
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * @param mixed[]|\Array_hx $that
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function concat ($this1, $that) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:79: characters 3-36
		return $this1->concat($that);
	}

	/**
	 * @return mixed[]|\Array_hx
	 */
	public static function empty () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:9: characters 3-12
		return new \Array_hx();
	}

	/**
	 * @param \Array_hx[]|\Array_hx $array
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function flatten ($array) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:15: characters 17-116
		return Arrays::reduce($array, function ($acc, $element) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:15: characters 85-111
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:43: characters 3-17
		return ($this1->arr[$i] ?? null);
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_length ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:39: characters 3-21
		return $this1->length;
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * 
	 * @return mixed
	 */
	public static function head ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:46: characters 3-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:18: lines 18-19
		if (null === $eq) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:19: characters 4-27
			$eq = Boot::getStaticClosure(Functions::class, 'equality');
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:20: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:20: characters 17-28
		$_g1 = $this1->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:20: lines 20-22
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:20: characters 13-28
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:21: lines 21-22
			if ($eq($el, ($this1->arr[$i] ?? null))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:22: characters 5-13
				return $i;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:23: characters 3-12
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:85: characters 3-30
		$pos = ReadonlyArray_Impl_::indexOf($this1, $ref, $eq);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:86: lines 86-87
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:87: characters 4-25
			$pos = $this1->length - 1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:88: characters 10-31
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:82: characters 3-65
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:92: characters 10-40
		$pos = ReadonlyArray_Impl_::indexOf($this1, $ref, $eq);
		return $this1->slice(0, $pos)->concat(\Array_hx::wrap([$el]))->concat($this1->slice($pos));
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * 
	 * @return object
	 */
	public static function iterator ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:151: characters 3-25
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:27: lines 27-28
		if (null === $eq) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:28: characters 4-27
			$eq = Boot::getStaticClosure(Functions::class, 'equality');
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:29: characters 3-25
		$len = $this1->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:30: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:30: characters 17-20
		$_g1 = $len;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:30: lines 30-32
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:30: characters 13-20
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:31: lines 31-32
			if ($eq($el, ($this1->arr[$len - $i - 1] ?? null))) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:32: characters 5-13
				return $i;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:33: characters 3-12
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:143: lines 143-144
		if ($this1->length === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:144: characters 11-32
			$this2 = new _HxAnon_ReadonlyArray_Impl_0(null, $this1);
			return $this2;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:145: characters 3-37
		$value = ($this1->arr[$this1->length - 1] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:146: characters 15-40
		$pos = $this1->length - 1;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:146: characters 3-41
		$array = $this1->slice(0, $pos)->concat($this1->slice($pos + 1));
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:147: characters 10-33
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:111: characters 3-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:137: characters 3-20
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:52: lines 52-53
		$_g = 0;
		while ($_g < $this1->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:52: characters 8-9
			$v = ($this1->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:52: lines 52-53
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:53: characters 4-27
			$initial = $f($initial, $v);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:54: characters 3-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:61: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:61: characters 17-28
		$_g1 = $this1->length;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:61: lines 61-62
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:61: characters 13-28
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:62: characters 4-36
			$initial = $f($initial, ($this1->arr[$i] ?? null), $i);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:63: characters 3-17
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:105: characters 10-35
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:108: characters 3-56
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:95: characters 3-30
		$pos = ReadonlyArray_Impl_::indexOf($this1, $ref, $eq);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:96: lines 96-97
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:97: characters 4-9
			throw Exception::thrown(new Error("unable to find reference element", null, new _HxAnon_ReadonlyArray_Impl_1("thx/ReadonlyArray.hx", 97, "thx._ReadonlyArray.ReadonlyArray_Impl_", "replace")));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:98: characters 3-28
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:102: characters 3-69
		return $this1->slice(0, $pos)->concat(\Array_hx::wrap([$el]))->concat($this1->slice($pos + 1));
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function reverse ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:67: characters 3-25
		$arr = (clone $this1);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:68: characters 3-16
		$arr->arr = \array_reverse($arr->arr);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:69: characters 3-13
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:126: lines 126-127
		if ($this1->length === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:127: characters 11-32
			$this2 = new _HxAnon_ReadonlyArray_Impl_0(null, $this1);
			return $this2;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:128: characters 3-23
		$value = ($this1->arr[0] ?? null);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:129: characters 3-27
		$array = $this1->slice(0, 0)->concat($this1->slice(1));
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:130: characters 10-33
		$this1 = new _HxAnon_ReadonlyArray_Impl_0($value, $array);
		return $this1;
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function tail ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:49: characters 3-23
		return $this1->slice(1);
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function toArray ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:73: characters 3-21
		return (clone $this1);
	}

	/**
	 * @param mixed[]|\Array_hx $this
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function unsafe ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:76: characters 3-14
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/ReadonlyArray.hx:120: characters 3-21
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
