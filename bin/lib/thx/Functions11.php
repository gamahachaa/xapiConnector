<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:326: lines 326-330
		return function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:327: lines 327-329
			return function ($k) use (&$f, &$g, &$c, &$e, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:328: characters 5-47
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k);
			};
		};
	}
}

Boot::registerClass(Functions11::class, 'thx.Functions11');
