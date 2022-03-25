<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Group.hx
 */

namespace xapi;

use \php\Boot;
use \xapi\types\IActor;
use \xapi\types\IUnique;

/**
 * ...
 * @author bb
 */
class Group implements IActor, IUnique {
	/**
	 * @var string
	 */
	public $id;
	/**
	 * @var Agent[]|\Array_hx
	 */
	public $member;
	/**
	 * @var string
	 */
	public $objectType;
	/**
	 * @var string
	 */
	public $uri;

	/**
	 * @return void
	 */
	public function __construct () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Group.hx:16: characters 3-23
		$this->objectType = "Group";
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Group.hx:17: characters 3-30
		$this->member = new \Array_hx();
	}

	/**
	 * @return string
	 */
	public function get_id () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Group.hx:43: characters 3-12
		return $this->id;
	}

	/**
	 * @return Agent[]|\Array_hx
	 */
	public function get_member () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Group.hx:38: characters 3-16
		return $this->member;
	}

	/**
	 * @return string
	 */
	public function get_objectType () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Group.hx:33: characters 3-20
		return $this->objectType;
	}

	/**
	 * @return string
	 */
	public function get_uri () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Group.hx:28: characters 3-13
		return $this->uri;
	}
}

Boot::registerClass(Group::class, 'xapi.Group');
Boot::registerGetters('xapi\\Group', [
	'objectType' => true,
	'uri' => true,
	'id' => true,
	'member' => true
]);
