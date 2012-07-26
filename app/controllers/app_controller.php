<?php
class AppController extends Controller {

  public $layout = 'default';
  public $arrView = null;
  public $components = array('Upload');
  public $logged = null;
  public $helpers = array(
    'Html', 
    'Form', 
    'Date', 
    'Pagination', 
    'Text',
    'Flash',
    'Lang'
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
    if (!$this->arrView['page_title'])  $this->pageTitle('');
    
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

  /**
   * Configura e faz upload de aquivos
   *
   * @param string $response 
   * @return void
   * @author Walmir Neto
   */
  protected function uploadFiles($params = array()) {
    /**
     * Upload Settings
     */
    $this->UploadComponent->allowedTypes = $params['allowed_types'] ? $params['allowed_types'] : array("jpg", "png", "gif", "jpeg");
    $this->UploadComponent->maxSize = $params['max_size'] ? $params['max_size'] : 1;
    $this->UploadComponent->path = $_SERVER["DOCUMENT_ROOT"] . DS;
    if (isset($params['path'])) $this->UploadComponent->setPath($params['path']);  
    

    /**
     * Upload
     */
    $files = $this->UploadComponent->files;
    
    foreach ($files as $key => $file) {
      unset($this->data[$key]);
      if ($file['error'] == 0) {
        $filename = isset($file['new_name']) ? $file['new_name'] . '.' . $this->UploadComponent->ext($file['name']) : $this->UploadComponent->uniqueName($file['name']);
        $is_upload = $this->UploadComponent->upload($file, null, $filename);
        $this->data[$key] = $is_upload ? $filename : null;
      } # endif;
    } # endforeach;
    return true;
  }
}