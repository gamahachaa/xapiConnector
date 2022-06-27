<?php
/**
 */

namespace php\net;

use \php\Boot;
use \sys\net\Socket as NetSocket;
use \sys\net\Host;

class Socket extends NetSocket {
	/**
	 * @var bool
	 */
	public $connected;
	/**
	 * @var float
	 */
	public $timeout;

	/**
	 * @param bool $r
	 * @param int $code
	 * @param string $msg
	 * 
	 * @return void
	 */
	public static function checkError ($r, $code, $msg) {
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:163: characters 10-49
		NetSocket::checkError($r, $code, $msg);
	}

	/**
	 * @return void
	 */
	public function __construct () {
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:34: characters 28-32
		$this->timeout = null;
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:33: characters 18-23
		$this->connected = false;
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:37: characters 3-10
		parent::__construct();
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:38: characters 3-19
		$this->protocol = "tcp";
	}

	/**
	 * @return void
	 */
	public function assignHandler () {
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:46: characters 19-53
		$this->input->__f = $this->__s;
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:47: characters 19-55
		$this->output->__f = $this->__s;
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:48: characters 3-19
		$this->connected = true;
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:49: lines 49-51
		if ($this->timeout !== null) {
			#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:50: characters 4-23
			$this->setTimeout($this->timeout);
		}
	}

	/**
	 * @return void
	 */
	public function close () {
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:55: characters 3-20
		$this->connected = false;
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:56: characters 3-14
		\fclose($this->__s);
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:57: characters 19-54
		$this->input->__f = null;
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:58: characters 19-56
		$this->output->__f = null;
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:59: characters 3-16
		$this->input->close();
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:60: characters 3-17
		$this->output->close();
	}

	/**
	 * @param Host $host
	 * @param int $port
	 * 
	 * @return void
	 */
	public function connect ($host, $port) {
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:75: characters 3-19
		$errs = null;
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:76: characters 3-19
		$errn = null;
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:77: characters 3-87
		$r = \stream_socket_client(($this->protocol??'null') . "://" . ($host->host??'null') . ":" . ($port??'null'), $errn, $errs);
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:78: characters 3-28
		NetSocket::checkError($r, $errn, $errs);
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:79: characters 3-10
		$this->__s = $r;
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:80: characters 3-18
		$this->assignHandler();
	}

	/**
	 * @return void
	 */
	public function initSocket () {
	}

	/**
	 * @param float $timeout
	 * 
	 * @return void
	 */
	public function setTimeout ($timeout) {
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:138: lines 138-141
		if (!$this->connected) {
			#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:139: characters 4-26
			$this->timeout = $timeout;
			#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:140: characters 4-10
			return;
		}
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:142: characters 3-28
		$s = (int)($timeout);
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:143: characters 3-45
		$ms = (int)((($timeout - $s) * 1000000));
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:144: characters 3-42
		$r = \stream_set_timeout($this->__s, $s, $ms);
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:145: characters 3-44
		NetSocket::checkError($r, 0, "Unable to set timeout");
	}

	/**
	 * @param bool $read
	 * @param bool $write
	 * 
	 * @return void
	 */
	public function shutdown ($read, $write) {
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:92: characters 3-61
		$rw = ($read && $write ? 2 : ($write ? 1 : ($read ? 0 : 2)));
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:93: characters 3-43
		$r = \stream_socket_shutdown($this->__s, $rw);
		#C:\HaxeToolkit\haxe\std/php/net/Socket.hx:94: characters 3-41
		NetSocket::checkError($r, 0, "Unable to Shutdown");
	}
}

Boot::registerClass(Socket::class, 'php.net.Socket');
