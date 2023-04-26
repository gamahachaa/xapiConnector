<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx
 */

namespace thx\_Tuple;

use \php\_Boot\HxAnon;
use \php\Boot;

final class Tuple3_Impl_ {
	/**
	 * Constructs an instance of `Tuple3` the 3 required value.
	 * 
	 * @param mixed $_0
	 * @param mixed $_1
	 * @param mixed $_2
	 * 
	 * @return object
	 */
	public static function _new ($_0, $_1, $_2) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:161: character 3
		$this1 = new _HxAnon_Tuple3_Impl_0($_0, $_1, $_2);
		return $this1;
	}

	/**
	 * @param mixed[]|\Array_hx $v
	 * 
	 * @return object
	 */
	public static function arrayToTuple3 ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:198: characters 12-40
		$this1 = new _HxAnon_Tuple3_Impl_0(($v->arr[0] ?? null), ($v->arr[1] ?? null), ($v->arr[2] ?? null));
		return $this1;
	}

	/**
	 * `dropLeft` returns a new Tuple with one less element by dropping the first
	 * on the left.
	 * 
	 * @param object $this
	 * 
	 * @return object
	 */
	public static function dropLeft ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:175: characters 12-40
		$this2 = new _HxAnon_Tuple3_Impl_1($this1->_1, $this1->_2);
		return $this2;
	}

	/**
	 * `dropLeft` returns a new Tuple with one less element by dropping the last
	 * on the right.
	 * 
	 * @param object $this
	 * 
	 * @return object
	 */
	public static function dropRight ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:182: characters 12-40
		$this2 = new _HxAnon_Tuple3_Impl_1($this1->_0, $this1->_1);
		return $this2;
	}

	/**
	 * `flip` returns a new Tuple with the values in reverse order.
	 * 
	 * @param object $this
	 * 
	 * @return object
	 */
	public static function flip ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:168: characters 5-56
		return new _HxAnon_Tuple3_Impl_0($this1->_2, $this1->_1, $this1->_0);
	}

	/**
	 * @param object $this
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function map ($this1, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:201: characters 12-52
		$_0 = $this1->_0;
		$_1 = $this1->_1;
		$this2 = new _HxAnon_Tuple3_Impl_0($_0, $_1, $f($this1->_2));
		return $this2;
	}

	/**
	 * Static constructor, required to work around Haxe compiler bug.
	 * 
	 * @param mixed $_0
	 * @param mixed $_1
	 * @param mixed $_2
	 * 
	 * @return object
	 */
	public static function of ($_0, $_1, $_2) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:156: characters 12-34
		$this1 = new _HxAnon_Tuple3_Impl_0($_0, $_1, $_2);
		return $this1;
	}

	/**
	 * Provides a string representation of the Tuple
	 * 
	 * @param object $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:195: characters 5-54
		return "Tuple3(" . \Std::string($this1->_0) . "," . \Std::string($this1->_1) . "," . \Std::string($this1->_2) . ")";
	}

	/**
	 * Creates a new Tuple with the addition of the extra value `v`. The Tuple
	 * of course increase in size by one.
	 * 
	 * @param object $this
	 * @param mixed $v
	 * 
	 * @return object
	 */
	public static function with ($this1, $v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:189: characters 12-52
		$this2 = new _HxAnon_Tuple3_Impl_2($this1->_0, $this1->_1, $this1->_2, $v);
		return $this2;
	}
}

class _HxAnon_Tuple3_Impl_0 extends HxAnon {
	function __construct($_0, $_1, $_2) {
		$this->_0 = $_0;
		$this->_1 = $_1;
		$this->_2 = $_2;
	}
}

class _HxAnon_Tuple3_Impl_1 extends HxAnon {
	function __construct($_0, $_1) {
		$this->_0 = $_0;
		$this->_1 = $_1;
	}
}

class _HxAnon_Tuple3_Impl_2 extends HxAnon {
	function __construct($_0, $_1, $_2, $_3) {
		$this->_0 = $_0;
		$this->_1 = $_1;
		$this->_2 = $_2;
		$this->_3 = $_3;
	}
}

Boot::registerClass(Tuple3_Impl_::class, 'thx._Tuple.Tuple3_Impl_');
