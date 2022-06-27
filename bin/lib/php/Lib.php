<?php
/**
 */

namespace php;

use \haxe\ds\StringMap;

/**
 * Platform-specific PHP Library. Provides some platform-specific functions
 * for the PHP target, such as conversion from Haxe types to native types
 * and vice-versa.
 */
class Lib {
	/**
	 * @param array $arr
	 * 
	 * @return StringMap
	 */
	public static function hashOfAssociativeArray ($arr) {
		#C:\HaxeToolkit\haxe\std/php/Lib.hx:102: characters 3-32
		$result = new StringMap();
		#C:\HaxeToolkit\haxe\std/php/Lib.hx:103: characters 19-36
		$result->data = $arr;
		#C:\HaxeToolkit\haxe\std/php/Lib.hx:104: characters 3-16
		return $result;
	}
}

Boot::registerClass(Lib::class, 'php.Lib');
