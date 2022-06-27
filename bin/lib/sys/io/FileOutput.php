<?php
/**
 */

namespace sys\io;

use \php\Boot;
use \haxe\Exception;
use \haxe\io\Output;
use \haxe\io\Eof;
use \haxe\io\Error;
use \haxe\io\Bytes;

/**
 * Use `sys.io.File.write` to create a `FileOutput`.
 */
class FileOutput extends Output {
	/**
	 * @var mixed
	 */
	public $__f;

	/**
	 * @param mixed $f
	 * 
	 * @return void
	 */
	public function __construct ($f) {
		#C:\HaxeToolkit\haxe\std/php/_std/sys/io/FileOutput.hx:34: characters 3-10
		$this->__f = $f;
	}

	/**
	 * @return void
	 */
	public function close () {
		#C:\HaxeToolkit\haxe\std/php/_std/sys/io/FileOutput.hx:60: characters 3-16
		parent::close();
		#C:\HaxeToolkit\haxe\std/php/_std/sys/io/FileOutput.hx:61: lines 61-62
		if ($this->__f !== null) {
			#C:\HaxeToolkit\haxe\std/php/_std/sys/io/FileOutput.hx:62: characters 4-15
			\fclose($this->__f);
		}
	}

	/**
	 * @param int $c
	 * 
	 * @return void
	 */
	public function writeByte ($c) {
		#C:\HaxeToolkit\haxe\std/php/_std/sys/io/FileOutput.hx:38: characters 3-31
		$r = \fwrite($this->__f, \chr($c));
		#C:\HaxeToolkit\haxe\std/php/_std/sys/io/FileOutput.hx:39: lines 39-40
		if ($r === false) {
			#C:\HaxeToolkit\haxe\std/php/_std/sys/io/FileOutput.hx:40: characters 4-9
			throw Exception::thrown(Error::Custom("An error occurred"));
		}
	}

	/**
	 * @param Bytes $b
	 * @param int $p
	 * @param int $l
	 * 
	 * @return int
	 */
	public function writeBytes ($b, $p, $l) {
		#C:\HaxeToolkit\haxe\std/php/_std/sys/io/FileOutput.hx:44: characters 3-29
		$s = null;
		#C:\HaxeToolkit\haxe\std/php/_std/sys/io/FileOutput.hx:44: characters 11-28
		if (($p < 0) || ($l < 0) || (($p + $l) > $b->length)) {
			throw Exception::thrown(Error::OutsideBounds());
		} else {
			#C:\HaxeToolkit\haxe\std/php/_std/sys/io/FileOutput.hx:44: characters 3-29
			$s = \substr($b->b->s, $p, $l);
		}
		#C:\HaxeToolkit\haxe\std/php/_std/sys/io/FileOutput.hx:45: lines 45-46
		if (\feof($this->__f)) {
			#C:\HaxeToolkit\haxe\std/php/_std/sys/io/FileOutput.hx:46: characters 4-9
			throw Exception::thrown(new Eof());
		}
		#C:\HaxeToolkit\haxe\std/php/_std/sys/io/FileOutput.hx:47: characters 3-29
		$r = \fwrite($this->__f, $s, $l);
		#C:\HaxeToolkit\haxe\std/php/_std/sys/io/FileOutput.hx:48: lines 48-49
		if ($r === false) {
			#C:\HaxeToolkit\haxe\std/php/_std/sys/io/FileOutput.hx:49: characters 4-9
			throw Exception::thrown(Error::Custom("An error occurred"));
		}
		#C:\HaxeToolkit\haxe\std/php/_std/sys/io/FileOutput.hx:50: characters 3-11
		return $r;
	}
}

Boot::registerClass(FileOutput::class, 'sys.io.FileOutput');
