<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx
 */

namespace thx\_Tuple;

use \php\_Boot\HxAnon;
use \php\Boot;

final class Tuple6_Impl_ {
	/**
	 * Constructs an instance of `Tuple6` the 6 required value.
	 * 
	 * @param mixed $_0
	 * @param mixed $_1
	 * @param mixed $_2
	 * @param mixed $_3
	 * @param mixed $_4
	 * @param mixed $_5
	 * 
	 * @return object
	 */
	public static function _new ($_0, $_1, $_2, $_3, $_4, $_5) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:326: character 3
		$this1 = new _HxAnon_Tuple6_Impl_0($_0, $_1, $_2, $_3, $_4, $_5);
		return $this1;
	}

	/**
	 * @param mixed[]|\Array_hx $v
	 * 
	 * @return object
	 */
	public static function arrayToTuple6 ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:356: characters 12-58
		$this1 = new _HxAnon_Tuple6_Impl_0(($v->arr[0] ?? null), ($v->arr[1] ?? null), ($v->arr[2] ?? null), ($v->arr[3] ?? null), ($v->arr[4] ?? null), ($v->arr[5] ?? null));
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:340: characters 12-67
		$this2 = new _HxAnon_Tuple6_Impl_1($this1->_1, $this1->_2, $this1->_3, $this1->_4, $this1->_5);
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:347: characters 12-67
		$this2 = new _HxAnon_Tuple6_Impl_1($this1->_0, $this1->_1, $this1->_2, $this1->_3, $this1->_4);
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:333: characters 5-98
		return new _HxAnon_Tuple6_Impl_0($this1->_5, $this1->_4, $this1->_3, $this1->_2, $this1->_1, $this1->_0);
	}

	/**
	 * Static constructor, required to work around Haxe compiler bug.
	 * 
	 * @param mixed $_0
	 * @param mixed $_1
	 * @param mixed $_2
	 * @param mixed $_3
	 * @param mixed $_4
	 * @param mixed $_5
	 * 
	 * @return object
	 */
	public static function of ($_0, $_1, $_2, $_3, $_4, $_5) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:321: characters 12-46
		$this1 = new _HxAnon_Tuple6_Impl_0($_0, $_1, $_2, $_3, $_4, $_5);
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:353: characters 5-87
		return "Tuple6(" . \Std::string($this1->_0) . "," . \Std::string($this1->_1) . "," . \Std::string($this1->_2) . "," . \Std::string($this1->_3) . "," . \Std::string($this1->_4) . "," . \Std::string($this1->_5) . ")";
	}
}

class _HxAnon_Tuple6_Impl_0 extends HxAnon {
	function __construct($_0, $_1, $_2, $_3, $_4, $_5) {
		$this->_0 = $_0;
		$this->_1 = $_1;
		$this->_2 = $_2;
		$this->_3 = $_3;
		$this->_4 = $_4;
		$this->_5 = $_5;
	}
}

class _HxAnon_Tuple6_Impl_1 extends HxAnon {
	function __construct($_0, $_1, $_2, $_3, $_4) {
		$this->_0 = $_0;
		$this->_1 = $_1;
		$this->_2 = $_2;
		$this->_3 = $_3;
		$this->_4 = $_4;
	}
}

Boot::registerClass(Tuple6_Impl_::class, 'thx._Tuple.Tuple6_Impl_');
