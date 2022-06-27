<?php
/**
 */

namespace xapi;

use \php\Boot;

class BadEmailFormat {
	/**
	 * @var string
	 */
	public $email;

	/**
	 * @param string $mail
	 * 
	 * @return void
	 */
	public function __construct ($mail) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:107: characters 3-20
		$this->email = $mail;
	}

	/**
	 * @return string
	 */
	public function get_email () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:111: characters 3-15
		return $this->email;
	}
}

Boot::registerClass(BadEmailFormat::class, 'xapi.BadEmailFormat');
Boot::registerGetters('xapi\\BadEmailFormat', [
	'email' => true
]);
