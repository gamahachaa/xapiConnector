<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

class Functions4 {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function curry ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:263: lines 263-267
		return function ($a, $b, $c) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:264: lines 264-266
			return function ($d) use (&$f, &$c, &$b, &$a) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:265: characters 5-25
				return $f($a, $b, $c, $d);
			};
		};
	}
}

Boot::registerClass(Functions4::class, 'thx.Functions4');
