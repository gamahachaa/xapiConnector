<?php
/**
 */

namespace xapi;

use \php\Boot;
use \php\_Boot\HxString;
use \haxe\ds\StringMap;
use \xapi\types\IUnique;

/**
 * ...
 * @author bb
 */
class Verb implements IUnique {
	/**
	 * @var string
	 */
	const SUBMITED = "http://activitystrea.ms/schema/1.0/submit";
	/**
	 * @var string
	 */
	const VERB_DISSMISSED = "http://id.tincanapi.com/verb/terminated-employment-with";
	/**
	 * @var string
	 */
	const VERB_MENTORED = "http://id.tincanapi.com/verb/mentored";
	/**
	 * @var string
	 */
	const VERB_RECIEVED = "http://activitystrea.ms/schema/1.0/receive";
	/**
	 * @var string
	 */
	const VERB_REVIEWD = "http://id.tincanapi.com/verb/reviewed";

	/**
	 * @var Verb
	 */
	static public $abandoned;
	/**
	 * @var Verb
	 */
	static public $aligned;
	/**
	 * @var Verb
	 */
	static public $answered;
	/**
	 * @var Verb
	 */
	static public $asked;
	/**
	 * @var Verb
	 */
	static public $attempted;
	/**
	 * @var Verb
	 */
	static public $attended;
	/**
	 * @var Verb
	 */
	static public $calibrated;
	/**
	 * @var Verb
	 */
	static public $commented;
	/**
	 * @var Verb
	 */
	static public $completed;
	/**
	 * @var Verb
	 */
	static public $dismissed;
	/**
	 * @var Verb
	 */
	static public $exited;
	/**
	 * @var Verb
	 */
	static public $experienced;
	/**
	 * @var Verb
	 */
	static public $failed;
	/**
	 * @var Verb
	 */
	static public $imported;
	/**
	 * @var Verb
	 */
	static public $initialized;
	/**
	 * @var Verb
	 */
	static public $interacted;
	/**
	 * @var Verb
	 */
	static public $launched;
	/**
	 * @var Verb
	 */
	static public $loggedIn;
	/**
	 * @var Verb
	 */
	static public $loggedOut;
	/**
	 * @var Verb
	 */
	static public $mastered;
	/**
	 * @var Verb
	 */
	static public $mentoored;
	/**
	 * @var Verb
	 */
	static public $passed;
	/**
	 * @var Verb
	 */
	static public $preferred;
	/**
	 * @var Verb
	 */
	static public $progressed;
	/**
	 * @var Verb
	 */
	static public $recalled;
	/**
	 * @var Verb
	 */
	static public $recieved;
	/**
	 * @var Verb
	 */
	static public $registered;
	/**
	 * @var Verb
	 */
	static public $replaced;
	/**
	 * @var Verb
	 */
	static public $resolved;
	/**
	 * @var Verb
	 */
	static public $responded;
	/**
	 * @var Verb
	 */
	static public $resumed;
	/**
	 * @var Verb
	 */
	static public $reviewed;
	/**
	 * @var Verb
	 */
	static public $satisfied;
	/**
	 * @var Verb
	 */
	static public $scored;
	/**
	 * @var Verb
	 */
	static public $shared;
	/**
	 * @var Verb
	 */
	static public $submitted;
	/**
	 * @var Verb
	 */
	static public $suspended;
	/**
	 * @var Verb
	 */
	static public $terminated;
	/**
	 * @var Verb
	 */
	static public $updated;
	/**
	 * @var Verb
	 */
	static public $voided;
	/**
	 * @var Verb
	 */
	static public $waived;

	/**
	 * @var StringMap
	 */
	public $display;
	/**
	 * @var string
	 */
	public $id;

	/**
	 * @param string $uri
	 * @param StringMap $display
	 * 
	 * @return void
	 */
	public function __construct ($uri, $display = null) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Verb.hx:87: characters 3-16
		$this->id = $uri;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Verb.hx:88: lines 88-94
		if (($display === null) || !\array_key_exists("en", $display->data) || (($display->data["en"] ?? null) === "")) {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Verb.hx:90: characters 4-26
			$this->initDefault($this->get_id());
		} else {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Verb.hx:93: characters 4-26
			$this->set_display($display);
		}
	}

	/**
	 * @return StringMap
	 */
	public function get_display () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Verb.hx:110: characters 3-17
		return $this->display;
	}

	/**
	 * @return string
	 */
	public function get_id () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Verb.hx:106: characters 3-12
		return $this->id;
	}

	/**
	 * @param string $s
	 * 
	 * @return void
	 */
	public function initDefault ($s) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Verb.hx:98: characters 3-27
		$temp = HxString::split($s, "/");
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Verb.hx:99: characters 3-86
		$d = (($temp->arr[$temp->length - 1] ?? null) === "" ? ($temp->arr[$temp->length - 2] ?? null) : ($temp->arr[$temp->length - 1] ?? null));
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Verb.hx:100: characters 3-41
		$this->set_display(new StringMap());
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Verb.hx:101: characters 3-28
		$this->get_display()->data["en"] = $d;
	}

	/**
	 * @param StringMap $value
	 * 
	 * @return StringMap
	 */
	public function set_display ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Verb.hx:115: characters 3-25
		return $this->display = $value;
	}

	/**
	 * @return string
	 */
	public function toString () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Verb.hx:119: characters 3-51
		return "xapi.Verb : {id:" . ($this->get_id()??'null') . ", display: " . \Std::string($this->get_display()) . "}";
	}

	public function __toString() {
		return $this->toString();
	}

	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


		self::$abandoned = new Verb("https://w3id.org/xapi/adl/verbs/abandoned");
		self::$answered = new Verb("http://adlnet.gov/expapi/verbs/answered");
		self::$aligned = new Verb("https://w3id.org/xapi/dod-isd/verbs/aligned");
		self::$asked = new Verb("http://adlnet.gov/expapi/verbs/asked");
		self::$attempted = new Verb("http://adlnet.gov/expapi/verbs/attempted");
		self::$attended = new Verb("http://adlnet.gov/expapi/verbs/attended");
		self::$commented = new Verb("http://adlnet.gov/expapi/verbs/commented");
		self::$completed = new Verb("http://adlnet.gov/expapi/verbs/completed");
		self::$calibrated = new Verb("https://w3id.org/xapi/dod-isd/verbs/calibrated");
		self::$dismissed = new Verb("http://id.tincanapi.com/verb/terminated-employment-with");
		self::$exited = new Verb("http://adlnet.gov/expapi/verbs/exited");
		self::$experienced = new Verb("http://adlnet.gov/expapi/verbs/experienced");
		self::$failed = new Verb("http://adlnet.gov/expapi/verbs/failed");
		self::$imported = new Verb("http://adlnet.gov/expapi/verbs/imported");
		self::$initialized = new Verb("http://adlnet.gov/expapi/verbs/initialized");
		self::$interacted = new Verb("http://adlnet.gov/expapi/verbs/interacted");
		self::$launched = new Verb("http://adlnet.gov/expapi/verbs/launched");
		self::$loggedIn = new Verb("https://w3id.org/xapi/adl/verbs/logged-in");
		self::$loggedOut = new Verb("https://w3id.org/xapi/adl/verbs/logged-out");
		self::$mastered = new Verb("http://adlnet.gov/expapi/verbs/mastered");
		self::$mentoored = new Verb("http://id.tincanapi.com/verb/mentored");
		self::$passed = new Verb("http://adlnet.gov/expapi/verbs/passed");
		self::$preferred = new Verb("http://adlnet.gov/expapi/verbs/preferred");
		self::$progressed = new Verb("http://adlnet.gov/expapi/verbs/progressed");
		self::$replaced = new Verb("http://activitystrea.ms/schema/1.0/replace");
		self::$registered = new Verb("http://adlnet.gov/expapi/verbs/registered");
		self::$responded = new Verb("http://adlnet.gov/expapi/verbs/responded");
		$_g = new StringMap();
		$_g->data["en"] = "resolved";
		self::$resolved = new Verb("http://activitystrea.ms/schema/1.0/resolve", $_g);
		self::$recieved = new Verb("http://activitystrea.ms/schema/1.0/receive");
		self::$reviewed = new Verb("http://id.tincanapi.com/verb/reviewed");
		self::$resumed = new Verb("http://adlnet.gov/expapi/verbs/resumed");
		self::$recalled = new Verb("https://w3id.org/xapi/dod-isd/verbs/recalled");
		self::$satisfied = new Verb("https://w3id.org/xapi/adl/verbs/satisfied");
		self::$scored = new Verb("http://adlnet.gov/expapi/verbs/scored");
		self::$shared = new Verb("http://adlnet.gov/expapi/verbs/shared");
		self::$suspended = new Verb("http://adlnet.gov/expapi/verbs/suspended");
		self::$submitted = new Verb("http://activitystrea.ms/schema/1.0/submit");
		self::$terminated = new Verb("http://adlnet.gov/expapi/verbs/terminated");
		self::$updated = new Verb("http://activitystrea.ms/schema/1.0/update");
		self::$voided = new Verb("http://adlnet.gov/expapi/verbs/voided");
		self::$waived = new Verb("https://w3id.org/xapi/adl/verbs/waived");
	}
}

Boot::registerClass(Verb::class, 'xapi.Verb');
Boot::registerGetters('xapi\\Verb', [
	'display' => true,
	'id' => true
]);
Boot::registerSetters('xapi\\Verb', [
	'display' => true
]);
Verb::__hx__init();
