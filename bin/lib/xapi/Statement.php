<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx
 */

namespace xapi;

use \xapi\types\IObject;
use \php\Boot;
use \haxe\Exception;
use \xapi\types\IActor;
use \thx\_DateTime\DateTime_Impl_;
use \thx\_DateTimeUtc\DateTimeUtc_Impl_;
use \xapi\types\IUnique;

/**
 * ...
 * @author bb
 */
class Statement implements IUnique {
	/**
	 * @var IActor
	 */
	public $actor;
	/**
	 * @var mixed[]|\Array_hx
	 */
	public $attachments;
	/**
	 * @var Context
	 */
	public $context;
	/**
	 * @var string
	 */
	public $id;
	/**
	 * @var IObject
	 */
	public $object;
	/**
	 * @var Result
	 */
	public $result;
	/**
	 * @var string
	 */
	public $timestamp;
	/**
	 * @var Verb
	 */
	public $verb;

	/**
	 * @param IActor $actor
	 * @param Verb $verb
	 * @param IObject $object
	 * @param Result $result
	 * @param Context $context
	 * 
	 * @return void
	 */
	public function __construct ($actor, $verb, $object, $result = null, $context = null) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:24: characters 3-21
		$this->set_attachments(null);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:25: characters 15-29
		$dateTime = DateTimeUtc_Impl_::now();
		$this1 = \Array_hx::wrap([
			$dateTime,
			DateTime_Impl_::localOffset(),
		]);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:25: characters 3-40
		$this->timestamp = DateTime_Impl_::toString($this1);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:27: characters 3-25
		$this->set_context($context);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:28: characters 3-23
		$this->result = $result;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:29: characters 3-23
		$this->object = $object;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:30: characters 3-19
		$this->verb = $verb;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:31: characters 3-21
		$this->actor = $actor;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:32: lines 32-35
		if (($object->get_objectType() === "Agent") && ($context->get_platform() !== null)) {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:34: characters 4-9
			throw Exception::thrown("The context's \"platform\" property MUST only be used if the Statement's Object is an Activity objectType=" . ($object->get_objectType()??'null') . " context.platform = " . ($context->get_platform()??'null'));
		}
	}

	/**
	 * @return IActor
	 */
	public function get_actor () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:77: characters 3-15
		return $this->actor;
	}

	/**
	 * @return mixed[]|\Array_hx
	 */
	public function get_attachments () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:87: characters 3-21
		return $this->attachments;
	}

	/**
	 * @return Context
	 */
	public function get_context () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:54: characters 3-17
		return $this->context;
	}

	/**
	 * @return string
	 */
	public function get_id () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:49: characters 3-12
		return $this->id;
	}

	/**
	 * @return IObject
	 */
	public function get_object () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:67: characters 3-16
		return $this->object;
	}

	/**
	 * @return Result
	 */
	public function get_result () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:62: characters 3-16
		return $this->result;
	}

	/**
	 * @return string
	 */
	public function get_timestamp () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:82: characters 3-19
		return $this->timestamp;
	}

	/**
	 * @return Verb
	 */
	public function get_verb () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:72: characters 3-14
		return $this->verb;
	}

	/**
	 * Dirty but added here to prevent sending null objects
	 * 
	 * @return void
	 */
	public function initAttachement () {
	}

	/**
	 * @return void
	 */
	public function reset () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:39: characters 3-21
		$this->set_attachments(null);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:40: characters 15-29
		$dateTime = DateTimeUtc_Impl_::now();
		$this1 = \Array_hx::wrap([
			$dateTime,
			DateTime_Impl_::localOffset(),
		]);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:40: characters 3-40
		$this->timestamp = DateTime_Impl_::toString($this1);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:41: characters 3-22
		$this->set_context(null);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:42: characters 3-21
		$this->result = null;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:43: characters 3-21
		$this->object = null;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:44: characters 3-19
		$this->verb = null;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:45: characters 3-20
		$this->actor = null;
	}

	/**
	 * @param mixed[]|\Array_hx $value
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public function set_attachments ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:92: lines 92-93
		if ($this->get_attachments() === null) {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:93: characters 4-20
			$this->attachments = new \Array_hx();
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:94: characters 3-29
		return $this->attachments = $value;
	}

	/**
	 * @param Context $ctx
	 * 
	 * @return Context
	 */
	public function set_context ($ctx) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Statement.hx:58: characters 3-23
		return $this->context = $ctx;
	}
}

Boot::registerClass(Statement::class, 'xapi.Statement');
Boot::registerGetters('xapi\\Statement', [
	'id' => true,
	'actor' => true,
	'verb' => true,
	'object' => true,
	'result' => true,
	'context' => true,
	'timestamp' => true,
	'attachments' => true
]);
Boot::registerSetters('xapi\\Statement', [
	'context' => true,
	'attachments' => true
]);
