<?php
/**
 */

use \php\Boot;

/**
 * ...
 * @author bb
 */
class Main {
	/**
	 * @return void
	 */
	public static function main () {
		#src/Main.hx:14: characters 3-21
		$a = new \App();
	}

	/**
	 * @return void
	 */
	public function __construct () {
	}
}

Boot::registerClass(Main::class, 'Main');
