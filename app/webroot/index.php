<?php
/**
 *  Esse é o arquivo de entrada para todas as requisições do Spaghetti*. A partir
 *  daqui todos os arquivos necessários são carregados e a mágica começa.
 *
 *  @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 *  @copyright Copyright 2008-2009, Spaghetti* Framework (http://spaghettiphp.org/)
 *
 */
/**
 * Alterando error_reporting: Ocultando notices
 */
error_reporting(E_ALL ^ E_NOTICE);
/**
 *  O Spaghetti suporta apenas a versão 5 do PHP. Um erro é gerado caso a versão
 *  seja anterior a 5.0.
 */
if(version_compare(PHP_VERSION, "5.0") < 0):
    trigger_error("Spaghetti only works with PHP 5.0 or newer", E_USER_ERROR);
endif;

/**
  *  Versão atual do Spaghetti*.
  */
define("SPAGHETTI_VERSION", "0.2");

/**
 *  Alias para DIRECTORY_SEPARATOR. Use para separar diretórios em definições de
 *  constantes.
 */
define("DS", DIRECTORY_SEPARATOR);

/**
 *  Caminho completo para a instalação do Spaghetti.
 */
define("ROOT", dirname(dirname(dirname(__FILE__))));

/**
 *  URL do domínio em que a aplicação está instalada.
 */
define("BASE_URL", "http" . (isset($_SERVER["HTTPS"]) ? "s" : "") . "://" . $_SERVER["HTTP_HOST"]);

/**
 *  Definições dos caminhos do Spaghetti. Essas definições só precisam ser editadas
 *  apenas se você está usando uma estrutura de diretórios diferente da distribuição.
 */

/**
 *  Caminho completo para a pasta onde se encontram os arquivos do núcleo do Spaghetti.
 */
define("CORE", ROOT . DS . "core");
/**
 *  Caminho completo para a biblioteca do Spaghetti.
 */
define("LIB", CORE . DS . "lib");
/**
 *  Caminho completo para a pasta da aplicação do Spaghetti.
 */
define("APP", ROOT . DS . "app");
/**
 *  Caminho completo para a pasta webroot do Spaghetti.
 */
define("WEBROOT", APP . DS . "webroot");
/**
 *  Caminho completo para a pasta de scripts javascripts do Spaghetti.
 */
define("SCRIPTS_PATH", WEBROOT . DS . "scripts");
/**
 *  Caminho completo para a pasta do estilos css do Spaghetti.
 */
define("STYLES_PATH", WEBROOT . DS . "styles");

/**
 *  Inclui o arquivo de inicialização de todos os arquivos necessários para o
 *  funcionamento de sua aplicação.
 */
require_once CORE . DS . "bootstrap.php";

$dispatcher = new Dispatcher;
$dispatcher->dispatch();

?>