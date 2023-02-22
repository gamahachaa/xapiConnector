<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx
 */

namespace thx\_Functions;

use \php\Boot;

final class Reader_Impl_ {
	/**
	 * @param \Closure $this
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function flatMap ($this1, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:351: lines 351-353
		return function ($a) use (&$f, &$this1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:352: characters 7-27
			return $f($this1($a))($a);
		};
	}
}

Boot::registerClass(Reader_Impl_::class, 'thx._Functions.Reader_Impl_');
