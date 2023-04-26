<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\xapi/git/xapi/activities/Definition.hx
 */

namespace xapi\activities;

use \php\Boot;
use \haxe\ds\StringMap;

/**
 * ...
 * @author bb
 */
class Definition {
	/**
	 * @var StringMap
	 */
	public $description;
	/**
	 * @var StringMap
	 */
	public $extensions;
	/**
	 * @var string
	 */
	public $moreInfo;
	/**
	 * @var StringMap
	 */
	public $name;
	/**
	 * @var string
	 */
	public $type;

	/**
	 * @return void
	 */
	public function __construct () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/activities/Definition.hx:20: characters 3-33
		$this->set_name(new StringMap());
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/activities/Definition.hx:21: characters 3-40
		$this->set_description(new StringMap());
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/activities/Definition.hx:22: characters 3-41
		$this->set_extensions(new StringMap());
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/activities/Definition.hx:23: characters 3-14
		$this->set_type(null);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/activities/Definition.hx:24: characters 3-18
		$this->set_moreInfo(null);
	}

	/**
	 * @return StringMap
	 */
	public function get_description () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/activities/Definition.hx:39: characters 3-21
		return $this->description;
	}

	/**
	 * @return StringMap
	 */
	public function get_extensions () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/activities/Definition.hx:70: characters 3-20
		return $this->extensions;
	}

	/**
	 * @return string
	 */
	public function get_moreInfo () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/activities/Definition.hx:59: characters 3-18
		return $this->moreInfo;
	}

	/**
	 * @return StringMap
	 */
	public function get_name () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/activities/Definition.hx:29: characters 3-14
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function get_type () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/activities/Definition.hx:49: characters 3-14
		return $this->type;
	}

	/**
	 * @param StringMap $value
	 * 
	 * @return StringMap
	 */
	public function set_description ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/activities/Definition.hx:44: characters 3-29
		return $this->description = $value;
	}

	/**
	 * @param StringMap $value
	 * 
	 * @return StringMap
	 */
	public function set_extensions ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/activities/Definition.hx:75: characters 3-28
		return $this->extensions = $value;
	}

	/**
	 * @param string $value
	 * 
	 * @return string
	 */
	public function set_moreInfo ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/activities/Definition.hx:64: characters 3-26
		return $this->moreInfo = $value;
	}

	/**
	 * @param StringMap $value
	 * 
	 * @return StringMap
	 */
	public function set_name ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/activities/Definition.hx:34: characters 3-22
		return $this->name = $value;
	}

	/**
	 * @param string $value
	 * 
	 * @return string
	 */
	public function set_type ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/activities/Definition.hx:54: characters 3-22
		return $this->type = $value;
	}
}

Boot::registerClass(Definition::class, 'xapi.activities.Definition');
Boot::registerGetters('xapi\\activities\\Definition', [
	'extensions' => true,
	'moreInfo' => true,
	'type' => true,
	'description' => true,
	'name' => true
]);
Boot::registerSetters('xapi\\activities\\Definition', [
	'extensions' => true,
	'moreInfo' => true,
	'type' => true,
	'description' => true,
	'name' => true
]);
