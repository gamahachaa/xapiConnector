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
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:40: characters 3-27
		$this->set_language($language);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:41: characters 3-31
		$this->extensions = $extensions;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:42: characters 3-29
		$this->statement = $statement;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:43: characters 3-27
		$this->set_platform($platform);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:44: characters 3-27
		$this->revision = $revision;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:50: characters 3-26
		$this->initContextActivities();
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:51: characters 3-31
		$this->set_instructor($instructor);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:52: characters 23-80
		$tmp = null;
		if (Standards::$UUID->match($uuid) || ($uuid === null)) {
			$tmp = $uuid;
		} else {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:52: characters 75-80
			throw Exception::thrown("Context.new :: uuid \"" . ($uuid??'null') . "\" is not valid UUID");
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:52: characters 3-80
		$this->registration = $tmp;
	}

	/**
	 * @param ContextActivity $type
	 * @param Activity $activity
	 * 
	 * @return StringMap
	 */
	public function addContextActivity ($type, $activity) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:84: characters 3-42
		$this1 = $this->get_contextActivities();
		$key = \Std::string($type);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:84: characters 3-70
		$_this = ($this1->data[$key] ?? null);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:84: characters 48-69
		$_g = new StringMap();
		$value = $activity->get_id();
		$_g->data["id"] = $value;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:84: characters 3-70
		$_this->arr[$_this->length++] = $_g;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:85: characters 3-27
		return $this->get_contextActivities();
	}

	/**
	 * @return StringMap
	 */
	public function get_contextActivities () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:116: characters 3-27
		return $this->contextActivities;
	}

	/**
	 * @return IActor
	 */
	public function get_instructor () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:140: characters 3-20
		return $this->instructor;
	}

	/**
	 * @return string
	 */
	public function get_language () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:131: characters 3-18
		return $this->language;
	}

	/**
	 * @return string
	 */
	public function get_platform () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:121: characters 3-18
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
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:111: characters 3-22
		return $this->registration;
	}

	/**
	 * @return StringMap
	 */
	public function initContextActivities () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:66: lines 66-67
		if ($this->get_contextActivities() === null) {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:67: characters 4-67
			$this->contextActivities = new StringMap();
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:68: lines 68-69
		if (!\array_key_exists("parent", $this->get_contextActivities()->data)) {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:69: characters 4-44
			$this->get_contextActivities()->data["parent"] = new \Array_hx();
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:71: lines 71-72
		if (!\array_key_exists("grouping", $this->get_contextActivities()->data)) {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:72: characters 4-41
			$this->get_contextActivities()->data["grouping"] = new \Array_hx();
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:74: lines 74-75
		if (!\array_key_exists("other", $this->get_contextActivities()->data)) {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:75: characters 4-38
			$this->get_contextActivities()->data["other"] = new \Array_hx();
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:76: lines 76-77
		if (!\array_key_exists("category", $this->get_contextActivities()->data)) {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:77: characters 4-41
			$this->get_contextActivities()->data["category"] = new \Array_hx();
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:79: characters 3-27
		return $this->get_contextActivities();
	}

	/**
	 * @return void
	 */
	public function reset () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:57: characters 3-23
		$this->set_language(null);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:58: characters 3-25
		$this->extensions = null;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:59: characters 3-24
		$this->statement = null;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:60: characters 3-23
		$this->set_platform(null);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:61: characters 3-23
		$this->revision = null;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:62: characters 3-71
		$this->contextActivities = new StringMap();
	}

	/**
	 * @param IActor $value
	 * 
	 * @return IActor
	 */
	public function set_instructor ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:145: characters 3-28
		return $this->instructor = $value;
	}

	/**
	 * @param string $value
	 * 
	 * @return string
	 */
	public function set_language ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:135: characters 3-26
		return $this->language = $value;
	}

	/**
	 * @param string $value
	 * 
	 * @return string
	 */
	public function set_platform ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Context.hx:126: characters 3-26
		return $this->platform = $value;
	}
}

Boot::registerClass(Context::class, 'xapi.Context');
Boot::registerGetters('xapi\\Context', [
	'registration' => true,
	'instructor' => true,
	'contextActivities' => true,
	'platform' => true,
	'language' => true
]);
Boot::registerSetters('xapi\\Context', [
	'instructor' => true,
	'platform' => true,
	'language' => true
]);
