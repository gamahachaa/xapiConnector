<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:424: lines 424-426
		return function ($a) use (&$f, &$this1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:425: characters 4-24
			return $f($this1($a))($a);
		};
	}
}

Boot::registerClass(Reader_Impl_::class, 'thx._Functions.Reader_Impl_');
