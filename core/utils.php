<?php
/**
 *  Funções para uso geral, que ajudam no desenvolvimento do seu projeto com
 *  o Spaghetti, facilitando na vizualização e comparação dos dados.
 *
 *  @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 *  @copyright Copyright 2008-2009, Spaghetti* Framework (http://spaghettiphp.org/)
 *
 */

function env_is($environment)
{
  return get_current_env() == $environment;
}

function get_current_env()
{
  $all_domains = Config::read("all_domains");

  $environment = "development";

  foreach ($all_domains as $key => $domains) {
    foreach ($domains as $k => $domain) {
      if (strpos($_SERVER["SERVER_NAME"], $domain) !== false) { $environment = $key; }
    }
  }

  return $environment;
}

function t($string, $file_name = false)
{
  App::import("Helper", "lang_helper");
  $lang = new LangHelper();
  return $lang->_($string, $file_name);
}

function has_data($var)
{
  if (is_numeric($var) && $var == 0) return true;
  if (empty($var)) return false;
  if (isset($var)) return true;
  if ($var == false) return false;
}

function is_odd($number)
{
  return $number % 2 == 0;
}

function uuid() {
    list($timeMid, $timeLow) = explode(" ", microtime());
    return sprintf(
      "%08x-%04x-%04x-%02x%02x-%04x%08x", (int)$timeLow, (int)substr($timeMid, 2) & 0xffff,
      mt_rand(0, 0xfff) | 0x4000, mt_rand(0, 0x3f) | 0x80, mt_rand(0, 0xff), rand(1000, 9999), rand(100, 999)
    );
}

/**
 *  Exibe os dados repassados para processamento visual.
 *
 *  @param array $data Dados a serem observados
 *  @return void
 */
function pr($data) {
    echo "<pre>" . print_r($data, true) . "</pre>";
}

/**
 *  Retorna os dados enviados em forma de string para exibí-los no navegador.
 *
 *  @param array $data Dados a serem observados
 *  @return void
 */
function dump($data) {
    pr(var_export($data, true));
}

/**
 *  Limpa o valor de um índice do array repassado, retornando-o.
 *
 *  @param array $array Array a ser utilizado
 *  @param string $index Índice a ser utilizado
 *  @return array Item removido
 */
function array_unset(&$array = array(), $index = "") {
    $item = $array[$index];
    unset($array[$index]);
    return $item;
}

/**
 *  Verifica se um método é público para o objeto em questão.
 *
 *  @param object $object Objeto a ser analisado
 *  @param string $method Método a ser verificado
 *  @return boolean Verdadeiro para público
 */
function can_call_method(&$object, $method) {
    if(method_exists($object, $method)):
        $method = new ReflectionMethod($object, $method);
        return $method->isPublic();
    endif;
    return false;
}

/**
  *  Cria um array preenchido com uma sequência.
  *
  *  @param integer $min Valor mínimo
  *  @param integer $max Valor máximo
  *  @return array Sequência
  */
function array_range($min, $max) {
    $result = array();
    for($i = $min; $i < $max + 1; $i++):
        $result[$i] = $i;
    endfor;
    return $result;
}
