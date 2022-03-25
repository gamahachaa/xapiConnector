<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

class Functions10 {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function curry ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:317: lines 317-321
		return function ($a, $b, $c, $d, $e, $f0, $g, $h, $i) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:318: lines 318-320
			return function ($j) use (&$f, &$g, &$c, &$e, &$f0, &$i, &$b, &$d, &$a, &$h) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:319: characters 5-44
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j);
			};
		};
	}
}

Boot::registerClass(Functions10::class, 'thx.Functions10');
