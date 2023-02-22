<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

class Functions8 {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function curry ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:286: characters 5-125
		return function ($a, $b, $c, $d, $e, $f0, $g) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:286: characters 66-123
			return function ($h) use (&$f, &$g, &$c, &$e, &$f0, &$b, &$d, &$a) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:286: characters 87-120
				return $f($a, $b, $c, $d, $e, $f0, $g, $h);
			};
		};
	}
}

Boot::registerClass(Functions8::class, 'thx.Functions8');
