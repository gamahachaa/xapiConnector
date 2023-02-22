<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

class Functions5 {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function curry ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:271: characters 5-96
		return function ($a, $b, $c, $d) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:271: characters 47-94
			return function ($e) use (&$f, &$c, &$b, &$d, &$a) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:271: characters 68-91
				return $f($a, $b, $c, $d, $e);
			};
		};
	}
}

Boot::registerClass(Functions5::class, 'thx.Functions5');
