<?php
/**
 */

namespace thx\_Tuple;

use \php\_Boot\HxAnon;
use \php\Boot;

final class Tuple4_Impl_ {
	/**
	 * Constructs an instance of `Tuple4` the 4 required value.
	 * 
	 * @param mixed $_0
	 * @param mixed $_1
	 * @param mixed $_2
	 * @param mixed $_3
	 * 
	 * @return object
	 */
	public static function _new ($_0, $_1, $_2, $_3) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:218: character 3
		$this1 = new _HxAnon_Tuple4_Impl_0($_0, $_1, $_2, $_3);
		return $this1;
	}

	/**
	 * @param mixed[]|\Array_hx $v
	 * 
	 * @return object
	 */
	public static function arrayToTuple4 ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:255: characters 12-46
		$this1 = new _HxAnon_Tuple4_Impl_0(($v->arr[0] ?? null), ($v->arr[1] ?? null), ($v->arr[2] ?? null), ($v->arr[3] ?? null));
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:232: characters 12-49
		$this2 = new _HxAnon_Tuple4_Impl_1($this1->_1, $this1->_2, $this1->_3);
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:239: characters 12-49
		$this2 = new _HxAnon_Tuple4_Impl_1($this1->_0, $this1->_1, $this1->_2);
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:225: characters 5-70
		return new _HxAnon_Tuple4_Impl_0($this1->_3, $this1->_2, $this1->_1, $this1->_0);
	}

	/**
	 * Static constructor, required to work around Haxe compiler bug.
	 * 
	 * @param mixed $_0
	 * @param mixed $_1
	 * @param mixed $_2
	 * @param mixed $_3
	 * 
	 * @return object
	 */
	public static function of ($_0, $_1, $_2, $_3) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:213: characters 12-38
		$this1 = new _HxAnon_Tuple4_Impl_0($_0, $_1, $_2, $_3);
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:252: characters 5-65
		return "Tuple4(" . \Std::string($this1->_0) . "," . \Std::string($this1->_1) . "," . \Std::string($this1->_2) . "," . \Std::string($this1->_3) . ")";
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:246: characters 12-61
		$this2 = new _HxAnon_Tuple4_Impl_2($this1->_0, $this1->_1, $this1->_2, $this1->_3, $v);
		return $this2;
	}
}

class _HxAnon_Tuple4_Impl_0 extends HxAnon {
	function __construct($_0, $_1, $_2, $_3) {
		$this->_0 = $_0;
		$this->_1 = $_1;
		$this->_2 = $_2;
		$this->_3 = $_3;
	}
}

class _HxAnon_Tuple4_Impl_1 extends HxAnon {
	function __construct($_0, $_1, $_2) {
		$this->_0 = $_0;
		$this->_1 = $_1;
		$this->_2 = $_2;
	}
}

class _HxAnon_Tuple4_Impl_2 extends HxAnon {
	function __construct($_0, $_1, $_2, $_3, $_4) {
		$this->_0 = $_0;
		$this->_1 = $_1;
		$this->_2 = $_2;
		$this->_3 = $_3;
		$this->_4 = $_4;
	}
}

Boot::registerClass(Tuple4_Impl_::class, 'thx._Tuple.Tuple4_Impl_');
