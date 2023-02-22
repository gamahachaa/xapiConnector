<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx
 */

namespace xapi;

use \xapi\types\IObject;
use \php\Boot;
use \php\_Boot\HxString;
use \xapi\activities\Definition;
use \xapi\types\IUnique;

/**
 * ...
 * @author bb
 */
class Activity implements IUnique, IObject {
	/**
	 * @var Definition
	 */
	public $definition;
	/**
	 * @var string
	 */
	public $id;
	/**
	 * @var string
	 */
	public $objectType;

	/**
	 * @param string $uri
	 * @param Definition $definition
	 * 
	 * @return void
	 */
	public function __construct ($uri, $definition = null) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:19: characters 3-26
		$this->objectType = "Activity";
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:20: characters 3-16
		$this->id = $uri;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:21: characters 3-31
		$this->set_definition($definition);
	}

	/**
	 * @return Definition
	 */
	public function get_definition () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:58: characters 3-20
		return $this->definition;
	}

	/**
	 * @return string
	 */
	public function get_id () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:27: characters 3-12
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function get_objectType () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:31: characters 3-20
		return $this->objectType;
	}

	/**
	 * @todo put in helper
	 * 
	 * @param int $urlLevels
	 * 
	 * @return void
	 */
	public function makeBasicDefinintion ($urlLevels = 1) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:37: lines 37-54
		if ($urlLevels === null) {
			$urlLevels = 1;
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:38: characters 3-17
		$index = 0;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:39: lines 39-53
		if ($this->get_definition() === null) {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:41: characters 4-33
			$this->set_definition(new Definition());
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:42: characters 4-30
			$split = HxString::split($this->get_id(), "/");
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:43: lines 43-44
			if (($split->arr[$split->length - 1] ?? null) === "") {
				#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:44: characters 5-36
				$split->splice($split->length - 1, 1);
			}
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:45: characters 4-36
			$index = $split->length - $urlLevels;
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:46: characters 4-26
			$split->splice(0, $index);
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:47: characters 4-28
			$a = $split->join("/");
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:49: characters 4-32
			$this->get_definition()->get_name()->data["en"] = $a;
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:50: characters 4-32
			$this->get_definition()->get_name()->data["fr"] = $a;
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:51: characters 4-32
			$this->get_definition()->get_name()->data["de"] = $a;
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:52: characters 4-32
			$this->get_definition()->get_name()->data["it"] = $a;
		}
	}

	/**
	 * @param Definition $value
	 * 
	 * @return Definition
	 */
	public function set_definition ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Activity.hx:63: characters 3-28
		return $this->definition = $value;
	}
}

Boot::registerClass(Activity::class, 'xapi.Activity');
Boot::registerGetters('xapi\\Activity', [
	'objectType' => true,
	'id' => true,
	'definition' => true
]);
Boot::registerSetters('xapi\\Activity', [
	'definition' => true
]);
