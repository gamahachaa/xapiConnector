<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/StatementRef.hx
 */

namespace xapi\types;

use \php\Boot;
use \haxe\Exception;

/**
 * @author bb
 */
class StatementRef implements IObject, IUnique {
	/**
	 * @var string
	 */
	public $id;
	/**
	 * @var string
	 */
	public $objectType;

	/**
	 * @param string $statementId
	 * 
	 * @return void
	 */
	public function __construct ($statementId) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/StatementRef.hx:13: characters 8-64
		$tmp = null;
		if (Standards::$UUID->match($statementId)) {
			$tmp = $statementId;
		} else {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/StatementRef.hx:13: characters 59-64
			throw Exception::thrown("EXCEPTION xapi.types.StatementRef :: invalid statementId : " . ($statementId??'null'));
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/StatementRef.hx:13: characters 3-64
		$this->id = $tmp;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/StatementRef.hx:14: characters 3-30
		$this->objectType = "StatementRef";
	}

	/**
	 * @return string
	 */
	public function get_id () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/StatementRef.hx:24: characters 3-12
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function get_objectType () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/StatementRef.hx:19: characters 3-20
		return $this->objectType;
	}
}

Boot::registerClass(StatementRef::class, 'xapi.types.StatementRef');
Boot::registerGetters('xapi\\types\\StatementRef', [
	'objectType' => true,
	'id' => true
]);
