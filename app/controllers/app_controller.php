<?php
class AppController extends Controller {

	public $layout = 'default';
	public $arrView = null;
	public $components = array();
	public $logged = null;
	public $helpers = array(
		'Html', 
		'Form', 
		'Date', 
		'Pagination', 
		'Text',
		'Flash'
	);
	

	/**
	 * Filtro antes de executar
	 * o método do controller
	 *
	 * @return void
	 * @author Djalma Araújo
	 */
	public function beforeFilter() {
		
		// Document Root para UPLOADS
		$this->document_root = $_SERVER['DOCUMENT_ROOT'] . '/';
		
		// Auth config
		require_once APP . '/config/auth.php';
		
		// Histórico da última URL
		$this->urlHistory = Session::read('urlHistory');
	}

	
	/**
	 * Filtro antes de renderizar
	 * a view do método
	 *
	 * @return void
	 * @author Djalma Araújo
	 */
	public function beforeRender() {
		// Page title default
		if (!$this->arrView['page_title'])	$this->pageTitle('');
		
		// set the history url
		$this->setUrlHistory();
		
		// To we don't have to repeat the set function with arrView variable.
		$this->set($this->arrView);
	}
	
	
	/**
	 * Define o título da página
	 *
	 * @param string $title 
	 * @return void
	 * @author Djalma Araújo
	 */
	private function pageTitle($title = null) {
		$compl = ($title) ? ' » ' . $title : '';
		$this->set('page_title', Config::read('app.name') . $compl);
	}	
	
	
	/**
	 * Seta a última URL acessada
	 * na sessão
	 *
	 * @return void
	 * @author Djalma Araújo
	 */
	private function setUrlHistory() {
		$explode = explode('/', Mapper::here());
		if (Mapper::here() != $this->urlHistory) {
			Session::write('urlHistory', Mapper::here());
		}
	}
	

	/**
	 * Método utilitário para retorno
	 * em JSON
	 *
	 * @param string $response 
	 * @return void
	 * @author Djalma Araújo
	 */
	protected function JSONOutput($response) {
		header('Content-Type: application/json');
		echo json_encode($response);
		exit;
	}
}