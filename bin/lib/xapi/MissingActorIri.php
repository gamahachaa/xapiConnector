<?php
/**
 */

namespace xapi;

use \php\Boot;

/**
 * Exception
 */
class MissingActorIri {
	/**
	 * @var Agent
	 */
	public $agent;
	/**
	 * @var string
	 */
	public $msg;

	/**
	 * @param Agent $agent
	 * 
	 * @return void
	 */
	public function __construct ($agent) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:98: characters 3-21
		$this->agent = $agent;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:99: characters 3-29
		$this->msg = "Agent IRI is empty";
	}
}

Boot::registerClass(MissingActorIri::class, 'xapi.MissingActorIri');
