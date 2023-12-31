<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx
 */

namespace thx\_Tuple;

use \php\Boot;
use \thx\Nil;

final class Tuple0_Impl_ {
	/**
	 * Constructs an instance of `Tuple0`.
	 * 
	 * @return Nil
	 */
	public static function _new () {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:12: character 3
		$this1 = Nil::nil();
		return $this1;
	}

	/**
	 * Creates `Tuple0` from `Nil`.
	 * 
	 * @param Nil $v
	 * 
	 * @return Nil
	 */
	public static function nilToTuple ($v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:38: characters 12-24
		$this1 = Nil::nil();
		return $this1;
	}

	/**
	 * Cast to `Nil`.
	 * 
	 * @param Nil $this
	 * 
	 * @return Nil
	 */
	public static function toNil ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:32: characters 5-16
		return $this1;
	}

	/**
	 * Provides a string representation of the Tuple
	 * 
	 * @param Nil $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:26: characters 5-22
		return "Tuple0()";
	}

	/**
	 * Creates a new Tuple with the addition of the extra value `v`. The Tuple
	 * of course increase in size by one.
	 * 
	 * @param Nil $this
	 * @param mixed $v
	 * 
	 * @return mixed
	 */
	public static function with ($this1, $v) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Tuple.hx:20: characters 12-25
		$this1 = $v;
		return $this1;
	}
}

Boot::registerClass(Tuple0_Impl_::class, 'thx._Tuple.Tuple0_Impl_');
