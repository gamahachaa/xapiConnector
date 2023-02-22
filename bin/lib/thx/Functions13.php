<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:311: characters 5-170
		return function ($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:311: characters 96-168
			return function ($m) use (&$f, &$g, &$c, &$l, &$e, &$k, &$f0, &$i, &$j, &$b, &$d, &$a, &$h) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:311: characters 117-165
				return $f($a, $b, $c, $d, $e, $f0, $g, $h, $i, $j, $k, $l, $m);
			};
		};
	}
}

Boot::registerClass(Functions13::class, 'thx.Functions13');
