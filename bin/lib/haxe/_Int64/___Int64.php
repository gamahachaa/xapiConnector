<?php
/**
 */

namespace haxe\_Int64;

use \php\Boot;

class ___Int64 {
	/**
	 * @var int
	 */
	public $high;
	/**
	 * @var int
	 */
	public $low;

	/**
	 * @param int $high
	 * @param int $low
	 * 
	 * @return void
	 */
	public function __construct ($high, $low) {
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:474: characters 3-19
		$this->high = $high;
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:475: characters 3-17
		$this->low = $low;
	}
}

Boot::registerClass(___Int64::class, 'haxe._Int64.___Int64');
