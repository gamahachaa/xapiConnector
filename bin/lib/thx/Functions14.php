<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

class Functions14 {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function curry ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:316: characters 5-180
		return function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:316: characters 103-178
			return function ($n) use (&$m, &$f, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:316: characters 124-175
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n);
			};
		};
	}
}

Boot::registerClass(Functions14::class, 'thx.Functions14');
