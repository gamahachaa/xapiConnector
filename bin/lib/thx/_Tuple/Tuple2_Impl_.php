<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Tuple.hx
 */

namespace thx\_Tuple;

use \php\_Boot\HxAnon;
use \php\Boot;

final class Tuple2_Impl_ {

	/**
	 * Constructs an instance of `Tuple2` the 2 required value.
	 * 
	 * @param mixed $_0
	 * @param mixed $_1
	 * 
	 * @return object
	 */
	public static function _new ($_0, $_1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Tuple.hx:88: character 2
		$this1 = new _HxAnon_Tuple2_Impl_0($_0, $_1);
		return $this1;
	}

	/**
	 * @param mixed[]|\Array_hx $v
	 * 
	 * @return object
	 */
	public static function arrayToTuple2 ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Tuple.hx:150: characters 10-32
		$this1 = new _HxAnon_Tuple2_Impl_0(($v->arr[0] ?? null), ($v->arr[1] ?? null));
		return $this1;
	}

	/**
	 * `dropLeft` returns a new Tuple with one less element by dropping the first
	 * on the left.
	 * 
	 * @param object $this
	 * 
	 * @return mixed
	 */
	public static function dropLeft ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Tuple.hx:118: characters 10-29
		$this2 = $this1->_1;
		return $this2;
	}

	/**
	 * `dropLeft` returns a new Tuple with one less element by dropping the last
	 * on the right.
	 * 
	 * @param object $this
	 * 
	 * @return mixed
	 */
	public static function dropRight ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Tuple.hx:125: characters 10-29
		$this2 = $this1->_0;
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Tuple.hx:111: characters 3-36
		return new _HxAnon_Tuple2_Impl_0($this1->_1, $this1->_0);
	}

	/**
	 * @param object $this
	 * 
	 * @return mixed
	 */
	public static function get_left ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Tuple.hx:102: characters 3-17
		return $this1->_0;
	}

	/**
	 * @param object $this
	 * 
	 * @return mixed
	 */
	public static function get_right ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Tuple.hx:105: characters 3-17
		return $this1->_1;
	}

	/**
	 * @param object $this
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function map ($this1, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Tuple.hx:141: characters 10-41
		$_0 = $this1->_0;
		$this2 = new _HxAnon_Tuple2_Impl_0($_0, $f($this1->_1));
		return $this2;
	}

	/**
	 * Constructs an instance of `Tuple2` the 2 required value. This is required
	 * because Tuple2.new.bind(...) crashes the compiler.
	 * 
	 * @param mixed $_0
	 * @param mixed $_1
	 * 
	 * @return object
	 */
	public static function of ($_0, $_1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Tuple.hx:83: characters 10-28
		$this1 = new _HxAnon_Tuple2_Impl_0($_0, $_1);
		return $this1;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function squeeze ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Tuple.hx:144: lines 144-146
		return function ($tp) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Tuple.hx:145: characters 4-26
			return $f($tp->_0, $tp->_1);
		};
	}

	/**
	 * Provides a string representation of the Tuple
	 * 
	 * @param object $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Tuple.hx:138: characters 3-41
		return "Tuple2(" . \Std::string($this1->_0) . "," . \Std::string($this1->_1) . ")";
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Tuple.hx:132: characters 10-41
		$this2 = new _HxAnon_Tuple2_Impl_1($this1->_0, $this1->_1, $v);
		return $this2;
	}
}

class _HxAnon_Tuple2_Impl_0 extends HxAnon {
	function __construct($_0, $_1) {
		$this->_0 = $_0;
		$this->_1 = $_1;
	}
}

class _HxAnon_Tuple2_Impl_1 extends HxAnon {
	function __construct($_0, $_1, $_2) {
		$this->_0 = $_0;
		$this->_1 = $_1;
		$this->_2 = $_2;
	}
}

Boot::registerClass(Tuple2_Impl_::class, 'thx._Tuple.Tuple2_Impl_');
Boot::registerGetters('thx\\_Tuple\\Tuple2_Impl_', [
	'right' => true,
	'left' => true
]);
