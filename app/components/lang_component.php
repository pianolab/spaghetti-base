<?php
/**
 * ################# Lang Component ##################
 * Helps you to work with multilang on your system
 * Need some configs on your Config settings
 * ###################################################
 *
 * ##### Usage #####
 * -> config/settings.php
 * 
  Config::write('multilang', true);
  Config::write('default_language', 'br');
  
  if (Config::read('multilang')):
 		switch (Session::read('language')):
 			case 'us':
 				Config::write('environment', 'us');
 				break;
 			default:
 				Config::write('environment', Config::read('default_language'));
 		endswitch;
 	else:
 		Config::write('environment', 'development'); //Change this if multilang is false
 	endif;
 *
 * PS: Don't forget to write session_start() on your webroot/index.php
 * PS: If you want on your controllers know what is actual lang, get $this->LangComponent->lang();
 *
 */
class LangComponent extends Component
{
	
	/**
	 * Lang variavel
	 */
	private $lang;

	/**
	 * Initialize Function
	 */
	public function initialize()
	{
		/**
		 * Auto Check and Set Language
		 */
		$this->setLang((Session::read('language')) ? Session::read('language') : Config::read('default_language'));
	}
	
	/**
	 * Sets langs on app
	 */
	public function setLang($lang)
	{
		$this->lang = $lang;
		Config::write('language', $this->lang);
		Session::write('language', $this->lang);
	}
	
	/**
	 * Return the actual lang
	 */
	public function lang()
	{
		return $this->lang;
	}
}
?>