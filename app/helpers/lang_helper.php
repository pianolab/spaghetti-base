<?php

App::import("Core", array("view"));

/**
 * LangHelper provê conversão de texto em multilínguas
 * por wfsneto
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 */
class LangHelper extends HtmlHelper
{
  /**
   * Attributes public
   */
  public $array;
  public $lang;
  public $file;
  public $files = array("default");
  public $langs = array("br", "en");
  /**
   * Attributes private
   */
  private $lang_default = "br";
  private $file_default = "default";

  public function __construct()
  {
    $this->lang = Session::read("language") ? Session::read("language") : $this->lang_default;

    $this->file = !empty($this->file) ? $this->file : $this->file_default;

    $this->array = Session::read("array_lang") ? Session::read("array_lang") : array();
  }

  /**
   * Utilização da conversão na view
   */
  public function _($string, $file_name = false)
  {
    return $this->output($this->translate($string, $file_name));
  }

  /**
   * Tradução da string procurada no array
   */
  private function translate($string, $file_name)
  {
    $current_file = !empty($file_name) ? $file_name : $this->file;
    $translate = $this->array[$this->lang . DS . $current_file][$string];

    if (!isset($translate)) {
      return $string;
    } else {
      if (is_array($translate)) {
        $return = array();
        foreach ($translate["itens"] as $item) {
          $return[] = $this->html($translate["tag"], $item);
        }
        $translate = implode(null, $return);
      }

      return $translate;
    }
  }

  /**
   *  Renderiza um elemento.
   *
   *  @param string $element Elemento a ser renderizado
   *  @param array $params Dados as serem extraídos na renderização
   *  @return string Resultado da renderização
   */
  public function element($element, $params = array()) {
    $view = new View();
    $element = dirname($element) . DS . basename($element) . "." . $this->lang;

    return $view->renderView(App::path("View", $element), $params);
  }
}