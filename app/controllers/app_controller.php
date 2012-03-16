<?php
class AppController extends Controller {

	public $layout = 'default';
	public $arrView = null;
	public $components = array('Auth');
	public $helpers = array(
		'Html', 
		'Form', 
		'Date', 
		'Pagination', 
		'Text'
	);
	
	// Autoloading by Klawdyo
	public function __get($class) {
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

	public function beforeFilter() { $this->beforeFilterConfig(); }
	public function beforeRender() { $this->beforeRenderConfig(); }
	
	// Some defatuls settings 
	private function beforeRenderConfig() {
		// Page title default
		if (!$this->arrView['page_title'])	$this->pageTitle('');
		
		// set the history url
		$this->setUrlHistory();
		
		// To we don't have to repeat the set function with arrView variable.
		$this->set($this->arrView);
	}
	
	// Set the page title in controllers
	private function pageTitle($title = null) {
		$compl = ($title) ? ' » ' . $title : '';
		$this->arrView['page_title'] = Config::read('app.name') . $compl;
	}	
	
	// Actual Page
	private function actual_page() {
		$actual_page = explode('/',Mapper::here());
		$this->set('actual_page', end($actual_page));
		$this->set('url_params', $actual_page);
		$this->set('url_base', Config::read('app.url_base'));
	} 
	
	// Some defaults settings
	private function beforeFilterConfig() {
		// Document Root to upload and resize components
		$this->document_root = $_SERVER['DOCUMENT_ROOT'] . '/';
		$this->authConfig();
		$this->urlHistory = Session::read('urlHistory');
	}
	
	// Url history
	private function setUrlHistory() {
		$explode = explode('/', Mapper::here());
		if (Mapper::here() != $this->urlHistory) {
			Session::write('urlHistory', Mapper::here());
		}
	}
	
	// Auth Component Config
	private function authConfig() {
		/**
		$this->AuthComponent->loginAction = '/login';
		$this->AuthComponent->logoutAction = '/logout';
		$this->AuthComponent->loginError = "Seu nome de usuário ou senha estão incorretos";
		$this->AuthComponent->authError = "Você precisa estar autenticado para acessar essa área";
		$this->AuthComponent->hash = 'md5';
		$this->AuthComponent->deny();
		
		$this->AuthComponent->allow('/register');
		
		*/
	}
}