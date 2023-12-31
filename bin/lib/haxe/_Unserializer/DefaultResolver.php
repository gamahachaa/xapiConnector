<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx
 */

namespace haxe\_Unserializer;

use \php\Boot;

class DefaultResolver {
	/**
	 * @return void
	 */
	public function __construct () {
	}

	/**
	 * @param string $name
	 * 
	 * @return Class
	 */
	public function resolveClass ($name) {
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:515: characters 3-33
		return \Type::resolveClass($name);
	}

	/**
	 * @param string $name
	 * 
	 * @return Enum
	 */
	public function resolveEnum ($name) {
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:518: characters 3-32
		return \Type::resolveEnum($name);
	}
}

Boot::registerClass(DefaultResolver::class, 'haxe._Unserializer.DefaultResolver');
