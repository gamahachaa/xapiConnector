<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

class Functions13 {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function curry ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:345: lines 345-349
		return function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:346: lines 346-348
			return function ($m) use (&$f, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:347: characters 5-53
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m);
			};
		};
	}
}

Boot::registerClass(Functions13::class, 'thx.Functions13');
