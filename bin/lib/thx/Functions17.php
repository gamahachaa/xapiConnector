<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

class Functions17 {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function curry ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:385: lines 385-389
		return function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:386: lines 386-388
			return function ($q) use (&$o, &$m, &$f, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$n, &$d, &$p, &$a, &$h) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:387: characters 5-65
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q);
			};
		};
	}
}

Boot::registerClass(Functions17::class, 'thx.Functions17');
