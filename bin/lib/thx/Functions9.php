<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

class Functions9 {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function curry ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:291: characters 5-134
		return function ($a, $b, $c, $d, $e, $f0, $g, $h) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:291: characters 72-132
			return function ($i) use (&$f, &$g, &$c, &$e, &$f0, &$b, &$d, &$a, &$h) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:291: characters 93-129
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i);
			};
		};
	}
}

Boot::registerClass(Functions9::class, 'thx.Functions9');
