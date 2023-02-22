<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx
 */

namespace xapi;

use \php\Boot;
use \haxe\Exception;
use \xapi\types\StatementRef;
use \xapi\types\IActor;
use \haxe\ds\StringMap;
use \xapi\types\Standards;
use \haxe\ds\EnumValueMap;

class Context {
	/**
	 * @var StringMap
	 */
	public $contextActivities;
	/**
	 * @var StringMap
	 */
	public $extensions;
	/**
	 * @var IActor
	 */
	public $instructor;
	/**
	 * @var string
	 */
	public $language;
	/**
	 * @var string
	 */
	public $platform;
	/**
	 * @var string
	 */
	public $registration;
	/**
	 * @var string
	 */
	public $revision;
	/**
	 * @var StatementRef
	 */
	public $statement;
	/**
	 * @var Group
	 */
	public $team;

	/**
	 * @param string $uuid
	 * @param IActor $instructor
	 * @param Group $team
	 * @param EnumValueMap $context_activities
	 * @param string $revision
	 * @param string $platform
	 * @param string $language
	 * @param StatementRef $statement
	 * @param StringMap $extensions
	 * 
	 * @return void
	 */
	public function __construct ($uuid = null, $instructor = null, $team = null, $context_activities = null, $revision = null, $platform = null, $language = null, $statement = null, $extensions = null) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:41: characters 3-27
		$this->set_language($language);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:42: characters 3-31
		$this->extensions = $extensions;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:43: characters 3-29
		$this->set_statement($statement);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:44: characters 3-27
		$this->set_platform($platform);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:45: characters 3-27
		$this->revision = $revision;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:46: characters 3-19
		$this->team = $team;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:52: characters 3-26
		$this->initContextActivities();
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:53: characters 3-31
		$this->set_instructor($instructor);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:54: characters 23-80
		$tmp = null;
		if (Standards::$UUID->match($uuid) || ($uuid === null)) {
			$tmp = $uuid;
		} else {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:54: characters 75-80
			throw Exception::thrown("Context.new :: uuid \"" . ($uuid??'null') . "\" is not valid UUID");
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:54: characters 3-80
		$this->registration = $tmp;
	}

	/**
	 * @param ContextActivity $type
	 * @param Activity $activity
	 * 
	 * @return StringMap
	 */
	public function addContextActivity ($type, $activity) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:108: characters 3-42
		$this1 = $this->get_contextActivities();
		$key = \Std::string($type);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:108: characters 3-70
		$_this = ($this1->data[$key] ?? null);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:108: characters 48-69
		$_g = new StringMap();
		$value = $activity->get_id();
		$_g->data["id"] = $value;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:108: characters 3-70
		$_this->arr[$_this->length++] = $_g;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:109: characters 3-27
		return $this->get_contextActivities();
	}

	/**
	 * @return Context
	 */
	public function clone () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:59: lines 59-64
		$instruc = null;
		if ($this->get_instructor()->get_objectType() === "Agent") {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:60: characters 14-42
			$instruc1 = (Boot::typedCast(Boot::getClass(Agent::class), $this->get_instructor()))->get_mbox();
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:59: lines 59-64
			$instruc = new Agent($instruc1, (Boot::typedCast(Boot::getClass(Agent::class), $this->get_instructor()))->get_name());
		} else {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:63: characters 14-40
			$instruc1 = (Boot::typedCast(Boot::getClass(Group::class), $this->get_instructor()))->get_id();
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:63: characters 42-69
			$instruc2 = (Boot::typedCast(Boot::getClass(Group::class), $this->get_instructor()))->get_uri();
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:59: lines 59-64
			$instruc = new Group($instruc1, $instruc2, (Boot::typedCast(Boot::getClass(Group::class), $this->get_instructor()))->get_member());
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:66: characters 4-21
		$tmp = $this->get_registration();
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:68: characters 4-67
		$tmp1 = null;
		if ($this->get_team() === null) {
			$tmp1 = null;
		} else {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:68: characters 36-43
			$tmp2 = $this->get_team()->get_id();
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:68: characters 45-53
			$tmp3 = $this->get_team()->get_uri();
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:68: characters 4-67
			$tmp1 = new Group($tmp2, $tmp3, $this->get_team()->get_member());
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:69: characters 4-34
		$tmp2 = (clone $this->get_contextActivities());
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:70: characters 4-12
		$tmp3 = $this->revision;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:71: characters 4-12
		$tmp4 = $this->get_platform();
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:72: characters 4-12
		$tmp5 = $this->get_language();
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:73: characters 4-60
		$tmp6 = ($this->get_statement() === null ? null : new StatementRef($this->get_statement()->get_id()));
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:65: lines 65-75
		return new Context($tmp, $instruc, $tmp1, $tmp2, $tmp3, $tmp4, $tmp5, $tmp6, (clone $this->extensions));
	}

	/**
	 * @return StringMap
	 */
	public function get_contextActivities () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:140: characters 3-27
		return $this->contextActivities;
	}

	/**
	 * @return IActor
	 */
	public function get_instructor () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:164: characters 3-20
		return $this->instructor;
	}

	/**
	 * @return string
	 */
	public function get_language () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:155: characters 3-18
		return $this->language;
	}

	/**
	 * @return string
	 */
	public function get_platform () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:145: characters 3-18
		return $this->platform;
	}

	/**
	 * @todo double check usage
	 * @param	map
	 * @param	Array<Map<String
	 * @param	String>>
	 * @return
	 * 
	 * @return string
	 */
	public function get_registration () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:135: characters 3-22
		return $this->registration;
	}

	/**
	 * @return StatementRef
	 */
	public function get_statement () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:179: characters 3-19
		return $this->statement;
	}

	/**
	 * @return Group
	 */
	public function get_team () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:169: characters 3-14
		return $this->team;
	}

	/**
	 * @return StringMap
	 */
	public function initContextActivities () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:90: lines 90-91
		if ($this->get_contextActivities() === null) {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:91: characters 4-67
			$this->contextActivities = new StringMap();
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:92: lines 92-93
		if (!\array_key_exists("parent", $this->get_contextActivities()->data)) {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:93: characters 4-44
			$this->get_contextActivities()->data["parent"] = new \Array_hx();
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:95: lines 95-96
		if (!\array_key_exists("grouping", $this->get_contextActivities()->data)) {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:96: characters 4-41
			$this->get_contextActivities()->data["grouping"] = new \Array_hx();
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:98: lines 98-99
		if (!\array_key_exists("other", $this->get_contextActivities()->data)) {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:99: characters 4-38
			$this->get_contextActivities()->data["other"] = new \Array_hx();
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:100: lines 100-101
		if (!\array_key_exists("category", $this->get_contextActivities()->data)) {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:101: characters 4-41
			$this->get_contextActivities()->data["category"] = new \Array_hx();
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:103: characters 3-27
		return $this->get_contextActivities();
	}

	/**
	 * @return void
	 */
	public function reset () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:81: characters 3-23
		$this->set_language(null);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:82: characters 3-25
		$this->extensions = null;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:83: characters 3-24
		$this->set_statement(null);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:84: characters 3-23
		$this->set_platform(null);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:85: characters 3-23
		$this->revision = null;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:86: characters 3-71
		$this->contextActivities = new StringMap();
	}

	/**
	 * @param IActor $value
	 * 
	 * @return IActor
	 */
	public function set_instructor ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:174: characters 3-28
		return $this->instructor = $value;
	}

	/**
	 * @param string $value
	 * 
	 * @return string
	 */
	public function set_language ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:159: characters 3-26
		return $this->language = $value;
	}

	/**
	 * @param string $value
	 * 
	 * @return string
	 */
	public function set_platform ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:150: characters 3-26
		return $this->platform = $value;
	}

	/**
	 * @param StatementRef $value
	 * 
	 * @return StatementRef
	 */
	public function set_statement ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:184: characters 3-27
		return $this->statement = $value;
	}
}

Boot::registerClass(Context::class, 'xapi.Context');
Boot::registerGetters('xapi\\Context', [
	'registration' => true,
	'instructor' => true,
	'contextActivities' => true,
	'team' => true,
	'platform' => true,
	'statement' => true,
	'language' => true
]);
Boot::registerSetters('xapi\\Context', [
	'instructor' => true,
	'platform' => true,
	'statement' => true,
	'language' => true
]);
