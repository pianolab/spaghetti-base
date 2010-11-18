<?php
/**
 *  AppController é o controller usado como base para todos os outros controllers
 *  da aplicação. Estando na biblioteca, é utilizado somente quando não há outro
 *  AppController definido pelo usuário.
 *
 *  @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 *  @copyright Copyright 2008-2009, Spaghetti* Framework (http://spaghettiphp.org/)
 *
 */

class AppController extends Controller {
	
	public $components = array('Auth');
	public $helpers = array("Html", "Form", "Date", 'Pagination','Text');
	public $layout = 'default';
	public $arrView = null;
	
	/**
	** Autoloading by Klawdyo
	**/
	public function __get($class){
      if(!isset($this->{$class})):
         $pattern = '(^[A-Z]+([a-z]+(Component)?))';
         if(preg_match($pattern, $class, $out)):
            $type = (isset($out[2])) ? 'Component' : 'Model';
            $this->{$class} = ClassRegistry::load($class, $type);
            if($type == 'Component') $this->{$class}->initialize($this);
            return $this->{$class};
         endif;
      endif;
   }

	public function beforeFilter()
	{
	
		if ($this->isXhr()):
			$this->layout = false;
		endif;
		
		/**
		 * Auth Component Conf.
		 *
		 
		$this->AuthComponent->loginAction = '/login';
		$this->AuthComponent->logoutAction = '/logout';
		$this->AuthComponent->loginError = "Seu nome de usuário ou senha estão incorretos";
		$this->AuthComponent->authError = "Você precisa estar autenticado para acessar essa área";
		$this->AuthComponent->hash = 'md5';
		$this->AuthComponent->deny();
		
		$this->AuthComponent->allow('/register');
		
		*/
	}
	
	/**
	 * Execute something before Render Views
	 */
	public function beforeRender()
	{
		
		// Get the actual Page
		$actual_page = explode('/',Mapper::here());
		$this->set('actual_page', end($actual_page));
		$this->set('url_params', $actual_page);
		$this->set('url_base', Config::read('app.url_base'));
				
		// Page title default
		if (!$this->arrView['page_title']):
			$this->page_title('');
		endif;
		
		// To we don't have to repeat the set function with arrView variable.
		$this->set($this->arrView);
	}
	
	/**
	 * Check if actual request is Ajax
	 */
	public function isXhr(){
		return array_key_exists('HTTP_X_REQUESTED_WITH', $_SERVER) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
	}

	/**
	 * Set the page title in controllers
	 */
	public function page_title($title = null)
	{
		$compl = ($title) ? ' » ' . $title : '';
		$this->arrView['page_title'] = Config::read('app.name') . $compl;
	}
}