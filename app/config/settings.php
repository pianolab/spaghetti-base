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
 * Definições geral do site
 */
include_once 'other.php';

/**
 * Definições de internacionalização (i18n)
 */
Config::write('multilang', false);
Config::write('default_language', 'br');


/**
 * Definições de AMBIENTE de desenvolvimento
 */ 
Config::write('environment', 'development'); # development, production
if (in_array($_SERVER['SERVER_NAME'], array('domain.com'))):
	Config::write('environment', 'production');
endif;

# Debug
if (Config::read('environment') == 'production') {
	Config::write('debug', false);
} else {
	Config::write('debug', true);
}

/**
 * Definições email
 */
include_once 'mail.php';
