<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx
 */

namespace xapi;

use \php\Boot;
use \haxe\Exception;
use \xapi\types\IActor;
use \php\_Boot\HxString;
use \xapi\types\Standards;

/**
 * ...
 * @author bb
 */
class Agent implements IActor {
	/**
	 * @var string
	 */
	public $mbox;
	/**
	 * @var string
	 */
	public $name;
	/**
	 * @var string
	 */
	public $objectType;

	/**
	 * @param mixed $json
	 * 
	 * @return Agent
	 */
	public static function FROM_JSON ($json) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:80: lines 80-85
		try {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:81: characters 16-43
			$tmp = \Reflect::field($json, "mbox");
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:81: characters 6-73
			return new Agent($tmp, \Reflect::field($json, "name"));
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:84: characters 4-8
			return null;
		}
	}

	/**
	 * @todo create function to create instance from JSON
	 * @param	email
	 * @param	name
	 * 
	 * @param string $email
	 * @param string $name
	 * 
	 * @return void
	 */
	public function __construct ($email, $name = "") {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:25: lines 25-43
		if ($name === null) {
			$name = "";
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:26: characters 3-23
		$this->objectType = "Agent";
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:27: characters 3-12
		$this->mbox = "";
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:31: lines 31-32
		if (HxString::indexOf($email, "mailto:") === -1) {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:32: characters 4-20
			$this->mbox = "mailto:";
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:33: characters 3-30
		$this->mbox = ($this->get_mbox()??'null') . (\mb_strtolower($email)??'null');
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:35: characters 3-50
		$this->name = ($name === "" ? $email : \mb_strtolower($name));
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:36: lines 36-37
		if ($this->get_mbox() === "mailto:") {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:37: characters 4-9
			throw Exception::thrown(new MissingActorIri($this));
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:38: lines 38-39
		if (!Standards::$EMAIL->match($this->get_mbox())) {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:39: characters 4-9
			throw Exception::thrown(new BadEmailFormat($this->get_mbox()));
		}
	}

	/**
	 * @return string
	 */
	public function getActorUrl () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:50: characters 3-78
		return "&actor=" . (\rawurlencode("{\"name\":\"" . ($this->get_name()??'null') . "\",\"mbox\":\"" . ($this->get_mbox()??'null') . "\"}")??'null');
	}

	/**
	 * @return string
	 */
	public function getFirstName () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:55: characters 3-62
		return \StringTools::replace((HxString::split($this->get_mbox(), ".")->arr[0] ?? null), "mailto:", "");
	}

	/**
	 * @return string
	 */
	public function getLastName () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:62: characters 3-42
		return (HxString::split((HxString::split($this->get_mbox(), ".")->arr[1] ?? null), "@")->arr[0] ?? null);
	}

	/**
	 * @return string
	 */
	public function getSimpleEmail () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:46: characters 3-49
		return \StringTools::replace($this->get_mbox(), "mailto:", "");
	}

	/**
	 * @return string
	 */
	public function get_mbox () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:71: characters 3-14
		return $this->mbox;
	}

	/**
	 * @return string
	 */
	public function get_name () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:66: characters 3-14
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function get_objectType () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Agent.hx:76: characters 3-20
		return $this->objectType;
	}
}

Boot::registerClass(Agent::class, 'xapi.Agent');
Boot::registerGetters('xapi\\Agent', [
	'objectType' => true,
	'name' => true,
	'mbox' => true
]);
