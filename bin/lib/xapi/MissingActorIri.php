<?php
/**
 * Generated by Haxe 4.1.5
 * Haxe source file: C:\_mesDocs\_git\_haxelibs\xapi\xapi/Agent.hx
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
		#C:\_mesDocs\_git\_haxelibs\xapi\xapi/Agent.hx:85: characters 3-21
		$this->agent = $agent;
		#C:\_mesDocs\_git\_haxelibs\xapi\xapi/Agent.hx:86: characters 3-29
		$this->msg = "Agent IRI is empty";
	}
}

Boot::registerClass(MissingActorIri::class, 'xapi.MissingActorIri');