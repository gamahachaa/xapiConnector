<?php
/**
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:266: characters 5-87
		return function ($a, $b, $c) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:266: characters 41-85
			return function ($d) use (&$f, &$c, &$b, &$a) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Functions.hx:266: characters 62-82
				return $f($a, $b, $c, $d);
			};
		};
	}
}

Boot::registerClass(Functions4::class, 'thx.Functions4');
