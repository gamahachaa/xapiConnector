<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

class Functions18 {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function curry ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:336: characters 5-220
		return function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:336: characters 131-218
			return function ($r) use (&$o, &$m, &$f, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$n, &$d, &$q, &$p, &$a, &$h) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:336: characters 152-215
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r);
			};
		};
	}
}

Boot::registerClass(Functions18::class, 'thx.Functions18');
