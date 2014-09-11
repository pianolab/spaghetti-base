<?php
/**
 *  Geração automática dos elementos HTML para uso com a paginação.
 *
 *  @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 *  @copyright Copyright 2008-2009, Spaghetti* Framework (http://spaghettiphp.org/)
 *
 */

App::import("Helper", "html_helper");

class PaginationHelper extends HtmlHelper
{
  /**
   *  Model a ser utilizado na paginação.
   */
  public $model = false;

  /**
   *  Carrega o Model a ser utilizado na paginação.
   *
   *  @param string $model Model utilizado
   *  @return object
   */
  public function model($model) {
    return $this->model = new $model;
  }

  /**
   *  Gera uma lista de páginas.
   *
   *  @param array $options Opções da lista
   *  @return string Lista de páginas
   */
  public function numbers($options = array()) {
    $model = $this->model;

    $page = Mapper::getNamed("page") < 1 ? 1 : Mapper::getNamed("page");
    $pages = $model::$pagination["totalPages"];

    $options = array_merge(array(
      "tag" => "li",
      "modulus" => 3,
      "separator" => " ",
      "current" => "active"
    ), $options);

    $numbers = array();
    for($i = $page - $options["modulus"]; $i <= $page + $options["modulus"]; $i++):
      if($i > 0 && $i <= $pages):
        $attributes = ($i == $page) ? array("class" => $options["current"]) : array();
        $number = $this->link($i, Mapper::currentRoute() . "?" . $this->queryString($i));
        $numbers []= $this->tag($options["tag"], $number, $attributes);
      endif;
    endfor;

    return implode($glue, $numbers);
  }

  /**
   *  Gera o link para a página seguinte de acordo com os dados encontrados.
   *
   *  @param string $text Texto a ser expresso no link
   *  @param array $attr Atributos extras para o link
   *  @return string Link para a página seguinte
   */
  public function next($text, $attr = array()) {
    $model = $this->model;
    if($this->hasNext()):
      $page = $model::$pagination["page"] + 1;
      return $this->link($text, array("page" => $page), $attr);
    endif;
    return "";
  }

  /**
   *  Gera o link para a página anterior de acordo com os dados encontrados.
   *
   *  @param string $text Texto a ser expresso no link
   *  @param array $attr Atributos extras para o link
   *  @return string Link para a página anterior
   */
  public function previous($text, $attr = array()) {
    $model = $this->model;
    if($this->hasPrevious()):
      $page = $model::$pagination["page"] - 1;
      return $this->link($text, array("page" => $page), $attr);
    endif;
    return "";
  }

  /**
   *  Gera o link para a página inicial de acordo com os dados encontrados.
   *
   *  @param string $text Texto a ser expresso no link
   *  @param array $attr Atributos extras para o link
   *  @return string Link para a página inicial
   */
  public function first($text, $attr = array()) {
    if($this->hasPrevious()):
      $page = 1;
      return $this->link($text, array("page" => $page), $attr);
    endif;
    return "";
  }

  /**
   *  Gera o link para a página final de acordo com os dados encontrados.
   *
   *  @param string $text Texto a ser expresso no link
   *  @param array $attr Atributos extras para o link
   *  @return string Link para a página final
   */
  public function last($text, $attr = array()) {
    $model = $this->model;
    if($this->hasNext()):
      $page = $model::$pagination["totalPages"];
      return $this->link($text, array("page" => $page), $attr);
    endif;
    return "";
  }

  /**
   *  Verifica a existência da página seguinte caso não esteja na última página.
   *
   *  @return boolean Verdadeiro caso exista uma próxima página
   */
  public function hasNext() {
    $model = $this->model;
    if($this->model):
      return $model::$pagination["page"] < $model::$pagination["totalPages"];
    endif;
    return null;
  }

  /**
   *  Verifica a existência da página anterior caso não esteja na primeira página.
   *
   *  @return boolean Verdadeiro caso exista uma página anterior
   */
  public function hasPrevious() {
    $model = $this->model;
    if($this->model):
      return $model::$pagination["page"] > 1;
    endif;
    return null;
  }

  protected function queryString($i)
  {
    $current = array_merge(Mapper::getNamed(), array("page" => $i));
    return http_build_query($current);
  }
}