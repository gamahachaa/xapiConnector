<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

class Functions19 {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function curry ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:341: characters 5-230
		return function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:341: characters 138-228
			return function ($s) use (&$o, &$m, &$f, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$r, &$j, &$b, &$n, &$d, &$q, &$p, &$a, &$h) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:341: characters 159-225
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s);
			};
		};
	}
}

Boot::registerClass(Functions19::class, 'thx.Functions19');
