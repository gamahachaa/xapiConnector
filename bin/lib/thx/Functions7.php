<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

class Functions7 {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function curry ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:281: characters 5-116
		return function ($a, $b, $c, $d, $e, $f0) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:281: characters 60-114
			return function ($g) use (&$f, &$c, &$e, &$f0, &$b, &$d, &$a) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:281: characters 81-111
				return $f($a, $b, $c, $d, $e, $f0, $g);
			};
		};
	}
}

Boot::registerClass(Functions7::class, 'thx.Functions7');
