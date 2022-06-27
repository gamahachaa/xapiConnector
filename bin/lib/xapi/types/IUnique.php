<?php
/**
 */

namespace xapi\types;

use \php\Boot;

/**
 * @author bb
 */
interface IUnique {
	/**
	 * @return string
	 */
	public function get_id () ;
}

Boot::registerClass(IUnique::class, 'xapi.types.IUnique');
Boot::registerGetters('xapi\\types\\IUnique', [
	'id' => true
]);
