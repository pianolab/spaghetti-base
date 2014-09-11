<?php
/**
 *  Datasource é o reposnsável pela conexão com o banco de dados, gerenciando
 *  o estado da conexão com o banco de dados.
 *
 *  @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 *  @copyright Copyright 2008-2009, Spaghetti* Framework (http://spaghettiphp.org/)
 *
 */

abstract class Datasource extends Object {
    public function __construct($config = array()) {
        $this->config = $config;
    }
    abstract public function connect();
    abstract public function disconnect();
    abstract public function query($sql = null);
}

?>