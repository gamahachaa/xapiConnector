<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

class Functions11 {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function curry ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:301: characters 5-152
		return function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:301: characters 84-150
			return function ($k) use (&$f, &$g, &$c, &$e, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:301: characters 105-147
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k);
			};
		};
	}
}

Boot::registerClass(Functions11::class, 'thx.Functions11');
