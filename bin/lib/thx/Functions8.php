<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:299: lines 299-303
		return function ($a, $b, $c, $d, $e, $f0, $g) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:300: lines 300-302
			return function ($h) use (&$f, &$g, &$c, &$e, &$f0, &$b, &$d, &$a) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:301: characters 5-38
				return $f($a, $b, $c, $d, $e, $f0, $g, $h);
			};
		};
	}
}

Boot::registerClass(Functions8::class, 'thx.Functions8');
