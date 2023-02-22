<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

class Functions6 {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function curry ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:276: characters 5-107
		return function ($a, $b, $c, $d, $e) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:276: characters 53-105
			return function ($f0) use (&$f, &$c, &$e, &$b, &$d, &$a) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:276: characters 75-102
				return $f($a, $b, $c, $d, $e, $f0);
			};
		};
	}
}

Boot::registerClass(Functions6::class, 'thx.Functions6');
