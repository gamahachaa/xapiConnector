<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\std/haxe/Constraints.hx
 */

namespace haxe;

use \php\Boot;

interface IMap {
	/**
	 * @param mixed $k
	 * 
	 * @return bool
	 */
	public function exists ($k) ;

	/**
	 * @param mixed $k
	 * 
	 * @return mixed
	 */
	public function get ($k) ;

	/**
	 * @return object
	 */
	public function iterator () ;

	/**
	 * @return object
	 */
	public function keys () ;

	/**
	 * @param mixed $k
	 * 
	 * @return bool
	 */
	public function remove ($k) ;

	/**
	 * @param mixed $k
	 * @param mixed $v
	 * 
	 * @return void
	 */
	public function set ($k, $v) ;
}

Boot::registerClass(IMap::class, 'haxe.IMap');
