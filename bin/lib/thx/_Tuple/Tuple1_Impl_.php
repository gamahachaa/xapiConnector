<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx
 */

namespace thx\_Tuple;

use \php\_Boot\HxAnon;
use \php\Boot;

final class Tuple1_Impl_ {

	/**
	 * Constructs an instance of `Tuple1` passing a value T as an argument.
	 * 
	 * @param mixed $_0
	 * 
	 * @return mixed
	 */
	public static function _new ($_0) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:48: character 3
		$this1 = $_0;
		return $this1;
	}

	/**
	 * @param mixed[]|\Array_hx $v
	 * 
	 * @return mixed
	 */
	public static function arrayToTuple ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:67: characters 12-28
		$this1 = ($v->arr[0] ?? null);
		return $this1;
	}

	/**
	 * @param mixed $this
	 * 
	 * @return mixed
	 */
	public static function get__0 ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:51: characters 28-39
		return $this1;
	}

	/**
	 * Provides a string representation of the Tuple
	 * 
	 * @param mixed $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:64: characters 5-29
		return "Tuple1(" . \Std::string($this1) . ")";
	}

	/**
	 * Creates a new Tuple with the addition of the extra value `v`. The Tuple
	 * of course increase in size by one.
	 * 
	 * @param mixed $this
	 * @param mixed $v
	 * 
	 * @return object
	 */
	public static function with ($this1, $v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:58: characters 12-29
		$this2 = new _HxAnon_Tuple1_Impl_0($this1, $v);
		return $this2;
	}
}

class _HxAnon_Tuple1_Impl_0 extends HxAnon {
	function __construct($_0, $_1) {
		$this->_0 = $_0;
		$this->_1 = $_1;
	}
}

Boot::registerClass(Tuple1_Impl_::class, 'thx._Tuple.Tuple1_Impl_');
Boot::registerGetters('thx\\_Tuple\\Tuple1_Impl_', [
	'_0' => true
]);
