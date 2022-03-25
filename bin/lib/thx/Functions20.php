<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:415: lines 415-419
		return function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:416: lines 416-418
			return function ($t) use (&$o, &$m, &$f, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$r, &$j, &$b, &$n, &$s, &$d, &$q, &$p, &$a, &$h) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:417: characters 5-74
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t);
			};
		};
	}
}

Boot::registerClass(Functions20::class, 'thx.Functions20');
