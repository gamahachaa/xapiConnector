<?php
/**
 */

namespace xapi\types;

use \php\Boot;

/**
 * @author bb
 */
interface IActor extends IObject {
}

Boot::registerClass(IActor::class, 'xapi.types.IActor');
