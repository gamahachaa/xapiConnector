<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

class Functions20 {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function curry ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:346: characters 5-240
		return function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:346: characters 145-238
			return function ($t) use (&$o, &$m, &$f, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$r, &$j, &$b, &$n, &$s, &$d, &$q, &$p, &$a, &$h) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:346: characters 166-235
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t);
			};
		};
	}
}

Boot::registerClass(Functions20::class, 'thx.Functions20');
