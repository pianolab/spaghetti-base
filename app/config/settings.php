<?php
/**
 *  Default app config
 */
Config::write('app.name','Projeto Base');
Config::write('app.conv.perpage', 10);
Config::write('app.upload_url', 'http://upload.projeto.com.br/');
Config::write('app.images_url', 'http://images.projeto.com.br/');
Config::write('app.url_base', 'http://www.projeto.com.br/');
Config::write('app.hash', 'md5');

// Security
Config::write("securitySalt", "5a65as56d4a65s4d6a5a654892");

// Other
Config::write("defaultExtension", "htm");

// Language
Config::write('multilang', false);
Config::write('default_language', 'br');

// Environment
if (Config::read('multilang')):
	if (Session::read('language')):
		Config::write("environment", Session::read('language'));
	else:
		Config::write("environment", Config::read('default_language'));
	endif;
else:
	Config::write("environment", 'development'); //Change here if there's no multilang
endif;

// Debug mode
Config::write('debug', true);