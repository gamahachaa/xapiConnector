<?php
/**
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:296: characters 5-143
		return function ($a, $b, $c, $d, $e, $f0, $g, $h, $i) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:296: characters 78-141
			return function ($j) use (&$f, &$g, &$c, &$e, &$f0, &$i, &$b, &$d, &$a, &$h) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:296: characters 99-138
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j);
			};
		};
	}
}

Boot::registerClass(Functions10::class, 'thx.Functions10');
