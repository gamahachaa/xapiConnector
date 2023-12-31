<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Monoid.hx
 */

namespace thx\_Monoid;

use \php\Boot;

final class Monoid_Impl_ {

	/**
	 * @param object $this
	 * @param mixed $a0
	 * @param mixed $a1
	 * 
	 * @return mixed
	 */
	public static function append ($this1, $a0, $a1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Monoid.hx:18: characters 5-31
		return $this1->append($a0, $a1);
	}

	/**
	 * @param object $this
	 * 
	 * @return \Closure
	 */
	public static function get_semigroup ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Monoid.hx:12: characters 42-60
		return $this1->append;
	}

	/**
	 * @param object $this
	 * 
	 * @return mixed
	 */
	public static function get_zero ($this1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Monoid.hx:15: characters 23-39
		return $this1->zero;
	}
}

Boot::registerClass(Monoid_Impl_::class, 'thx._Monoid.Monoid_Impl_');
Boot::registerGetters('thx\\_Monoid\\Monoid_Impl_', [
	'zero' => true,
	'semigroup' => true
]);
