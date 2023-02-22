<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

class Functions12 {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function curry ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:306: characters 5-161
		return function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:306: characters 90-159
			return function ($l) use (&$f, &$g, &$c, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:306: characters 111-156
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l);
			};
		};
	}
}

Boot::registerClass(Functions12::class, 'thx.Functions12');
