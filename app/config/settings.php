<?php
/**
 *  Default app config
 */
Config::write("securitySalt", "5a65as56d4a65s4d6a5a654892");
Config::write('app.name','Projeto Base');
Config::write('app.conv.perpage', 10);
Config::write('app.upload_url', 'http://upload.projeto.com.br/');
Config::write('app.images_url', 'http://images.projeto.com.br/');
Config::write('app.url_base', 'http://www.projeto.com.br/');

/**
 *  defaultExtension
 */
Config::write("defaultExtension", "htm");

/**
 * Multilang Options and Config
 * Set multilang on your app.
 */
Config::write('multilang', false);
Config::write('default_language', 'br');

/**
 *  Com o environment, você pode escolher qual ambiente de desenvolvimento está
 *  utilizando. É principalmente utilizado na configuração de banco de dados,
 *  evitando que você tenha que redefiní-las a cada deploy.
 */
if (Config::read('multilang')):
	if (Session::read('language')):
		Config::write("environment", Session::read('language'));
	else:
		Config::write("environment", Config::read('default_language'));
	endif;
else:
	Config::write("environment", 'development'); //Change here if there's no multilang
endif;

/**
 *  DEBUG MODE
 */
Config::write('debug', true);
?>