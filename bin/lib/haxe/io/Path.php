<?php
/**
 */

namespace haxe\io;

use \php\Boot;
use \php\_Boot\HxString;

/**
 * This class provides a convenient way of working with paths. It supports the
 * common path formats:
 * - `directory1/directory2/filename.extension`
 * - `directory1\directory2\filename.extension`
 */
class Path {
	/**
	 * Removes trailing slashes from `path`.
	 * If `path` does not end with a `/` or `\`, `path` is returned unchanged.
	 * Otherwise the substring of `path` excluding the trailing slashes or
	 * backslashes is returned.
	 * If `path` is `null`, the result is unspecified.
	 * 
	 * @param string $path
	 * 
	 * @return string
	 */
	public static function removeTrailingSlashes ($path) {
		#C:\HaxeToolkit\haxe\std/haxe/io/Path.hx:300: lines 300-307
		while (true) {
			#C:\HaxeToolkit\haxe\std/haxe/io/Path.hx:301: characters 12-44
			$_g = HxString::charCodeAt($path, mb_strlen($path) - 1);
			#C:\HaxeToolkit\haxe\std/haxe/io/Path.hx:301: lines 301-305
			if ($_g === null) {
				#C:\HaxeToolkit\haxe\std/haxe/io/Path.hx:305: characters 6-11
				break;
			} else {
				#C:\HaxeToolkit\haxe\std/haxe/io/Path.hx:301: characters 12-44
				if ($_g === 47 || $_g === 92) {
					#C:\HaxeToolkit\haxe\std/haxe/io/Path.hx:303: characters 6-31
					$path = \mb_substr($path, 0, -1);
				} else {
					#C:\HaxeToolkit\haxe\std/haxe/io/Path.hx:305: characters 6-11
					break;
				}
			}
		};
		#C:\HaxeToolkit\haxe\std/haxe/io/Path.hx:308: characters 3-14
		return $path;
	}
}

Boot::registerClass(Path::class, 'haxe.io.Path');
