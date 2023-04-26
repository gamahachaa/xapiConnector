<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\utils/utils/regex/ExpReg.hx
 */

namespace regex;

use \php\Boot;

/**
 * ...
 * @author bb
 */
class ExpReg {
	/**
	 * @var string
	 */
	const ADRESS_NUMBER = "^\\d+\\w?\$";
	/**
	 * @var string
	 */
	const ALL = "^[\\s\\S]+\$";
	/**
	 * @var string
	 */
	const BOX_SERIAL = "^(SFAA|GFAB)?[0-9]{8}\$";
	/**
	 * @var string
	 */
	const BOX_SERIAL_HEALTH = "^(SFAA[0-9]{8})|(GFAB[0-9]{8})\$";
	/**
	 * @var string
	 */
	const BOX_WHITE_SERIAL = "^SFAA[0-9]{8}\$";
	/**
	 * @var string
	 */
	const BREAKOUT_CABLE = "^(XMDF [0-9]\\.[0-9]{2}-[0-9]{6}-[A-Z][0-9]{4}|KP[0-9]{6}-[A-Z][0-9A-Z\\/]{1,6}|F-[0-9]\\.[0-9]{0,2}-[0-9]{0,2}-[0-9]{0,2})\$";
	/**
	 * @var string
	 */
	const CITY = "^\\w+[a-z 0-9.éàèüöäâêô!ï()\\/\\-']+\$";
	/**
	 * @var string
	 */
	const CN = "^(\\S+\\s\\S+)+\\S+\$";
	/**
	 * @var string
	 */
	const CONTRACTOR_EREG = "^(3\\d{7})\$";
	/**
	 * @var string
	 */
	const CONTRACTOR_PIPE_ARRAY_EREG = "^(3\\d{7})(\\|?(3\\d{7}))+\$";
	/**
	 * @var string
	 */
	const COUNTRY_LOOSE = "^\\w+[a-zéàèüöäâêô!ï &]+\$";
	/**
	 * @var string
	 */
	const DATE_REG = "([0-3]?[0-9]{1}[./]{1}(0|1)?[0-9]{1}[./]{1}20(1|2)[0-9]{1})";
	/**
	 * @var string
	 */
	const DATE_REG_START_END = "^(([0-3]?[0-9]{1}.(0|1)?[0-9]{1}.20(1|2)[0-9]{1})|([0-3]?[0-9]{1}/(0|1)?[0-9]{1}/20(1|2)[0-9]{1}))\$";
	/**
	 * @var string
	 */
	const EMAIL = "[a-z0-9!#\$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#\$%&'*+\\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?";
	/**
	 * @var string
	 */
	const INTL_CODE = "^(00|\\+)(9[976]\\d|8[987530]\\d|6[987]\\d|5[90]\\d|42\\d|3[875]\\d|2[98654321]\\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|4[987654310]|3[9643210]|2[70]|7|1)\$";
	/**
	 * @var string
	 */
	const INTL_NUMBER = "(\\(0\\))?\\d{4,14}";
	/**
	 * @var string
	 */
	const LEX_ID = "^[\\S\\s-.]+\$";
	/**
	 * @var string
	 */
	const MINIMAL_3WORDS = "^(\\S+)( \\S+){2,}[\\s\\S]*\$";
	/**
	 * @var string
	 */
	const MISIDN_INTL = "(41\\d{9})|(41\\s{0,1}\\d{2}\\s{0,1}\\d{3}\\s{0,1}\\d{4})";
	/**
	 * @var string
	 */
	const MISIDN_LOCAL = "(07\\d{8})|(0\\d{2}\\s?\\d{3}\\s?(\\d{4}|\\d{2}\\s?\\d{2}))";
	/**
	 * @var string
	 */
	const MISIDN_LOCAL_PIPE_ARRAY_ = "^(07\\d{8})|(0\\d{2}\\s?\\d{3}\\s?(\\d{4}|\\d{2}\\s?\\d{2}))(\\|?(07\\d{8})|(^0\\d{2}\\s?\\d{3}\\s?(\\d{4}|\\d{2}\\s?\\d{2})))\$";
	/**
	 * @var string
	 */
	const MISIDN_MOBILE = "(^07\\d{8}\$)|(^07\\d{1}\\s?\\d{3}\\s?(\\d{4}|\\d{2}\\s?\\d{2})\$)";
	/**
	 * @var string
	 */
	const MISIDN_MOBILE_SWISS_PREFIX = "(417\\d{8})|(417\\d{1}\\s?\\d{3}\\s?(\\d{4}|\\d{2}\\s?\\d{2}))";
	/**
	 * @var string
	 */
	const MSISDN_NO_CHEATING = "(?!0\\d{2}\\s?000\\s?00\\s?00|41\\s?\\d{2}\\s?000\\s?00\\s?00)";
	/**
	 * @var string
	 */
	const NAME_FULL = "^[\\w'\\-,. áéíóúäëïöüÄőŐűŰZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ]{2,}\$";
	/**
	 * @var string
	 */
	const NAME_MINIMAL = "^\\w{2,}\$";
	/**
	 * @var string
	 */
	const NUMBEB_ONLY = "^\\d+\$";
	/**
	 * @var string
	 */
	const OLT_NAME = "^[0-9]{1,2}\$";
	/**
	 * @var string
	 */
	const OLT_OBJECT = "^[0-9a-zA-Z_\\-:]+\$";
	/**
	 * @var string
	 */
	const OTO_PORT = "^[A-D1-4]\$";
	/**
	 * @var string
	 */
	const OTO_REG = "^(A|B|S)\\.[0-9]{3}\\.[0-9]{3}\\.[0-9]{3}(\\.[0-9X])?\$";
	/**
	 * @var string
	 */
	const PORTS_ID = "^[0-9]+\$";
	/**
	 * @var string
	 */
	const RX = "(^-[0-9]{1,2}((,|.)[0-9]{1,3})?\$)";
	/**
	 * @var string
	 */
	const SALT_NT = "^(sp_)?[a-z0-9]{3,8}\$";
	/**
	 * @var string
	 */
	const SAP_DEALER_CODE = "^[0-9]{5,6}\$";
	/**
	 * @var string
	 */
	const SO_TICKET = "^(1[2-9][0-9]{6})\$";
	/**
	 * @var string
	 */
	const SO_TICKET_PIPE_ARRAY = "^(1[2-9][0-9]{6})(\\|(1[2-9][0-9]{6}))+\$";
	/**
	 * @var string
	 */
	const STREET = "^.{2,}\$";
	/**
	 * @var string
	 */
	const SWISS_ZIP = "^[1-9][0-9][0-9][0-9]\$";
	/**
	 * @var string
	 */
	const TIME = "[012]?\\d(h\\s?|:|\\s)+[012]?\\d(m|')?";
	/**
	 * @var string
	 */
	const TX = "(^[-]?[0-9]{1,2}((,|.)[0-9]{1,3})?\$)";
	/**
	 * @var string
	 */
	const URL_START = "^(http|https)://";
	/**
	 * @var string
	 */
	const UUID = "[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}";
	/**
	 * @var string
	 */
	const VOIP_WITH_CHEATING = "^(?!41\\s?\\d{2}\\s?000\\s?00\\s?00)(41\\d{9})\$";
	/**
	 * @var string
	 */
	const VTI_LANG_PARSE = "^(PROD|SIT)(EN|FR|IT|DE)";
	/**
	 * @var string
	 */
	const VTI_VOIP_WITH_NOCHEATING = "^(?!41\\s?\\d{2}\\s?000\\s?00\\s?00)(41\\d{9}|00000000000)\$";
	/**
	 * @var string
	 */
	const ZIP = "^[1-9]{1}\\d{3}\$";

	/**
	 * @var \EReg
	 */
	static public $FRONTMATTER_IN_MD;
	/**
	 * @var \EReg
	 *********************************************************************
	 * *********** PURE EREG ***********************************************
	 * *******************************************************************
	 */
	static public $MAJOR_INC_OPEN;
	/**
	 * @var \EReg
	 */
	static public $PARSABLE_DATE;
	/**
	 * @var \EReg
	 */
	static public $STICKY_INC_OPEN;
	/**
	 * @var \EReg
	 */
	static public $STICKY_INC_OPEN_FOLDER;

	/**
	 * @param string $tag
	 * 
	 * @return \EReg
	 */
	public static function ALL_INSIDE_TAG_REG ($tag) {
		#C:\HaxeToolkit\haxe\lib\utils/utils/regex/ExpReg.hx:83: characters 3-55
		return new \EReg("<" . ($tag??'null') . "\\S?.*?>(.*?)<\\/" . ($tag??'null') . ">", "gsm");
	}

	/**
	 * @param string $s
	 * @param string $opt
	 * 
	 * @return \EReg
	 */
	public static function STRING_TO_REG ($s, $opt = "gi") {
		#C:\HaxeToolkit\haxe\lib\utils/utils/regex/ExpReg.hx:79: characters 3-26
		if ($opt === null) {
			$opt = "gi";
		}
		return new \EReg($s, $opt);
	}

	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


		self::$MAJOR_INC_OPEN = new \EReg("^_[\\s\\S!_]+_{1}\$", "i");
		self::$STICKY_INC_OPEN = new \EReg("^_[0-8]{1}[0-9]{1}_incident_[0-9]-[0-9]_[a-z_0-9-]+\$", "i");
		self::$STICKY_INC_OPEN_FOLDER = new \EReg("^_[0-8]{1}[0-9]{1}_[a-z]+_[0-9]-[0-9]_[a-z_0-9-]+\$", "i");
		self::$FRONTMATTER_IN_MD = new \EReg("---[\\s\\S]+---", "gim");
		self::$PARSABLE_DATE = new \EReg("(20[0-9]{2}-[0-9]{1,2}-[0-9]{1,2} [0-9]{1,2}:[0-9]{1,2}:[0-9]{1,2})", "i");
	}
}

Boot::registerClass(ExpReg::class, 'regex.ExpReg');
ExpReg::__hx__init();
