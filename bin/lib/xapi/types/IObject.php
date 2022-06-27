<?php
/**
 */

namespace xapi\types;

use \php\Boot;

/**
 * ...
 * @author bb
 */
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
