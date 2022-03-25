<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx
 */

namespace thx;

use \php\Boot;

class Functions5 {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function curry ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:272: lines 272-276
		return function ($a, $b, $c, $d) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:273: lines 273-275
			return function ($e) use (&$f, &$c, &$b, &$d, &$a) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Functions.hx:274: characters 5-28
				return $f($a, $b, $c, $d, $e);
			};
		};
	}
}

Boot::registerClass(Functions5::class, 'thx.Functions5');
