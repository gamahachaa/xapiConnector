<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:281: lines 281-285
		return function ($a, $b, $c, $d, $e) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:282: lines 282-284
			return function ($f0) use (&$f, &$c, &$e, &$b, &$d, &$a) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:283: characters 5-32
				return $f($a, $b, $c, $d, $e, $f0);
			};
		};
	}
}

Boot::registerClass(Functions6::class, 'thx.Functions6');
