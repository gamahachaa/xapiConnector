<?php
/**
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
	 * @param string $id
	 * @param string $uri
	 * @param Agent[]|\Array_hx $members
	 * 
	 * @return void
	 */
	public function __construct ($id = null, $uri = null, $members = null) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Group.hx:16: characters 3-16
		$this->id = $id;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Group.hx:17: characters 3-17
		$this->uri = $uri;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Group.hx:18: characters 3-23
		$this->objectType = "Group";
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Group.hx:19: characters 3-24
		$this->member = $members;
	}

	/**
	 * @return string
	 */
	public function get_id () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Group.hx:45: characters 3-12
		return $this->id;
	}

	/**
	 * @return Agent[]|\Array_hx
	 */
	public function get_member () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Group.hx:40: characters 3-16
		return $this->member;
	}

	/**
	 * @return string
	 */
	public function get_objectType () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Group.hx:35: characters 3-20
		return $this->objectType;
	}

	/**
	 * @return string
	 */
	public function get_uri () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Group.hx:30: characters 3-13
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
