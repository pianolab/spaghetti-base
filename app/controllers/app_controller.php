<?php

App::import('Model', 'active_record_model');

class AppController extends Controller {

  public $layout = 'default';
  public $arrView = array();
  public $uri = array();
  public $components = array('ImageResize', 'Flash');
  public $logged = null;
  public $helpers = array('Html', 'Form', 'Lang', 'Flash', 'Pagination', 'Youtube', 'Textile');

  /**
   * Filtro antes de executar
   * o método do controller
   *
   * @return void
   * @author Djalma Araújo
   */
  public function beforeFilter()
  {
    // set the history url
    $this->setUrlHistory();

    // config PHP active record
    $this->activeRecordConfig();

    // set the array lang
    $this->arrayLang();
    
    // Document Root para UPLOADS
    $this->document_root = $_SERVER['DOCUMENT_ROOT'] . '/';
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
    $this->pageTitle( empty($this->arrView['page_title']) ? null : $this->arrView['page_title'] ); 

    // To we don't have to repeat the set function with arrView variable.
    $this->set($this->arrView);
  }

  public function activeRecordConfig()
  {
    ActiveRecord\Config::initialize( function($cfg)
    {
      $database = Config::read('database');
      $db = $database[ Config::read('environment') ];
      
      $cfg->set_model_directory(APP . DS . 'models');
      $cfg->set_connections(array('development' => 'mysql://' . $db['user'] . ':' . $db['password'] . '@' . $db['host'] . '/' . $db['prefix'] . $db['database'] . ';charset=utf8'));
    });
  }
  
  /**
   * Define o título da página
   *
   * @param string $title 
   * @return void
   * @author Walmir Neto
   */
  protected function pageTitle($title = null) {
    $compl = empty($title) ? null : $title . ' » ';
    $this->set('page_title', $compl . APP_NAME);
  }
  
  /**
   * Seta a última URL acessada
   * na sessão
   *
   * @return void
   * @author Diogo Caetano
   */
  protected function setUrlHistory() {
    Session::write('uri.history.current', Mapper::here());
    
    $uri = Session::read('uri.history');
    $uri = is_array($uri) ? $uri : array($uri);

    if($uri[0] !== Mapper::here()) {
      array_unshift($uri , Mapper::here());
      Session::write('uri.history.previous', $uri[1]);
    }
    if(count($uri) > 2) array_pop($uri);
     
    Session::write('uri.history', $uri);

    // Histórico da última URL
    $this->uri['current'] = Session::read('uri.history.current');
    $this->uri['previous'] = Session::read('uri.history.previous');   

    $this->arrView['uri'] = $this->uri;
  }

  /**
   * Seta a array de tradução
   * na sessão
   *
   * @return void
   * @author Walmir Neto
   */
  protected function arrayLang() {

    $path = APP . DS . 'languages';

    $list = new RecursiveDirectoryIterator($path);
    $recursive = new RecursiveIteratorIterator($list);

    foreach($recursive as $folder){
      if (!in_array($folder->getFilename(), array('.', '..', 'alias.php'))) {
        $key = str_replace($path . DS, '', $folder->getPathname());
        $key = str_replace('.php', '', $key);

        include_once $folder->getPathname();
        
        if (isset($language)) $array_lang[$key] = $language;
        
        unset($language);
      }
    }

    Session::write('array_lang', $array_lang);
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
    $this->components[] = 'Upload';

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