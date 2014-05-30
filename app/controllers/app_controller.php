<?php

App::import("Model", "ActiveRecordModel");

class AppController extends Controller
{
  public $layout = "default";
  public $logged = null;
  public $uri = array();
  public $uses = array();
  public $arrView = array();
  public $components = array("ImageResize", "Flash", "Upload", "Uploadify");
  public $helpers = array("Html", "Form", "Javascripts", "Lang", "Flash", "Pagination");

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

    // Page title default
    $this->pageTitle( empty($this->arrView["page_title"]) ? null : $this->arrView["page_title"] );
  }

  /**
   * Filtro antes de renderizar
   * a view do método
   *
   * @return void
   * @author Djalma Araújo
   */
  public function beforeRender()
  {
    // To we don"t have to repeat the set function with arrView variable.
    $this->set($this->arrView);
  }

  public function activeRecordConfig()
  {
    ActiveRecord\Config::initialize( function($cfg)
    {
      $database = Config::read("database");
      $db = $database[ Config::read("environment") ];

      $cfg->set_model_directory(APP . DS . "models");
      $cfg->set_connections(array("development" => $db["driver"] . "://" . $db["user"] . ":" . $db["password"] . "@" . $db["host"] . "/" . $db["prefix"] . $db["database"] . ";charset=utf8"));
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
    $compl = empty($title) ? null : $title . " | ";
    $this->set("page_title", $compl . APP_NAME);
  }

  /**
   * Seta a última URL acessada
   * na sessão
   *
   * @return void
   * @author Diogo Caetano
   */
  protected function setUrlHistory() {
    Session::write("uri.history.current", Mapper::here());

    $uri = Session::read("uri.history");
    $uri = is_array($uri) ? $uri : array($uri);

    if($uri[0] !== Mapper::here()) {
      array_unshift($uri , Mapper::here());
      Session::write("uri.history.previous", $uri[1]);
    }
    if(count($uri) > 2) array_pop($uri);

    Session::write("uri.history", $uri);

    // Histórico da última URL
    $this->uri["current"] = Session::read("uri.history.current");
    $this->uri["previous"] = Session::read("uri.history.previous");

    $this->arrView["uri"] = $this->uri;
  }

  /**
   * Seta a array de tradução
   * na sessão
   *
   * @return void
   * @author Walmir Neto
   */
  protected function arrayLang() {

    $path = APP . DS . "languages";

    $list = new RecursiveDirectoryIterator($path);
    $recursive = new RecursiveIteratorIterator($list);

    foreach($recursive as $folder){
      if (!in_array($folder->getFilename(), array(".", ".."))) {
        $key = str_replace($path . DS, "", $folder->getPathname());
        $key = str_replace(".php", "", $key);

        include_once $folder->getPathname();

        if (isset($language)) $array_lang[$key] = $language;

        unset($language);
      }
    }

    Session::write("array_lang", $array_lang);
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
    header("Content-Type: application/json");
    echo json_encode($response);
    exit;
  }

  /**
   * Checa se o request é post ou get
   *
   * @param string $method
   * @return void
   * @author Walmir Neto
   */
  protected function is($method)
  {
    $is_post = has_data($this->data);
    if (strtolower($method) == "post") return $is_post;
    if (strtolower($method) == "get") return !$is_post;
  }

  protected function authConfig()
  {
    $this->AuthComponent->loginAction = "/users/login";
    $this->AuthComponent->logoutAction = "/users/logout";
    $this->AuthComponent->userModel = "Users";
    $this->AuthComponent->loginError = "Seu nome de usuário ou senha estão incorretos";
    $this->AuthComponent->authError = "Você precisa estar autenticado para acessar essa área";
    $this->AuthComponent->hash = "md5";

    $this->AuthComponent->deny();

    if ($this->AuthComponent->loggedIn()) {
      $this->arrView["logged"] = User::find( $this->AuthComponent->user("id") );
    } # endif;
  }
}