<?php

/**
 * Definições de seguranção da aplicação
 */
Config::write('securitySalt', '5a65as56d4a65s4d6a5a654892');
Config::write('app.hash', 'md5');

/**
 * Extension default
 */
Config::write('defaultExtension', 'htm');

/**
 * Definições de internacionalização (i18n)
 */
Config::write('multilang', false);
Config::write('default_language', 'br');


/**
 * Definições de AMBIENTE de desenvolvimento
 */
$all_domains = array(
  'development' => array('0.0.0.0', '127.0.0.1', 'localhost', 'lvh.me'),
  'production' => array('production.com'),
  'staging' => array('staging.com'),
);
Config::write('environment', 'development'); # development, production
foreach ($all_domains as $key => $domains) {
  foreach ($domains as $k => $domain) {
    if (strpos($_SERVER['SERVER_NAME'], $domain) !== false) {
      Config::write('environment', $key);
    }
  }
}

# Debug
if (Config::read('environment') == 'production') {
	Config::write('debug', false);
} else {
	Config::write('debug', true);
}