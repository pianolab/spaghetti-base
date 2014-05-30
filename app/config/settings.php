<?php

/**
 * Route application
 */
# javascripts helper
Mapper::connect("/javascripts/application(-:num)?.js", "/javascripts/application.js");

# lang helper
Mapper::connect("/br", "/lang/change/br");
Mapper::connect("/en", "/lang/change/en");

/**
 * Definições de seguranção da aplicação
 */
Config::write("securitySalt", "5a65as56d4a65s4d6a5a654892");
Config::write("app.hash", "md5");

/**
 * Extension default
 */
Config::write("defaultExtension", "htm");

/**
 * Definições de internacionalização (i18n)
 */
Config::write("multilang", false);
Config::write("default_language", "br");


/**
 * Definições de AMBIENTE de desenvolvimento
 */
Config::write("all_domains", array(
  "development" => array("localhost", "lvh.me"),
  "production" => array("production.com"),
  "staging" => array("staging.com"),
)); # development, production

Config::write("environment", get_current_env());

# Debug
if (Config::read("environment") == "production") {
	Config::write("debug", false);
} else {
	Config::write("debug", true);
}