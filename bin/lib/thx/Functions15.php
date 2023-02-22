<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

class Functions15 {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function curry ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:321: characters 5-190
		return function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:321: characters 110-188
			return function ($o) use (&$m, &$f, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$n, &$d, &$a, &$h) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:321: characters 131-185
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o);
			};
		};
	}
}

Boot::registerClass(Functions15::class, 'thx.Functions15');
