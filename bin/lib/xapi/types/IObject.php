<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/IObject.hx
 */

namespace xapi\types;

use \php\Boot;

interface IObject {
	/**
	 * @return string
	 */
	public function get_objectType () ;
}

Boot::registerClass(IObject::class, 'xapi.types.IObject');
Boot::registerGetters('xapi\\types\\IObject', [
	'objectType' => true
]);
