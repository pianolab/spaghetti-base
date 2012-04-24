<?php
// Default app config
Config::write('app.name', 'piano.base');
Config::write('app.conv.perpage', 10);
Config::write('app.upload_url', 'http://upload.projeto.com.br/');
Config::write('app.url_base', 'http://www.projeto.com.br/');
Config::write('app.hash', 'md5');
Config::write('analytics', false);

// Security
Config::write("securitySalt", "5a65as56d4a65s4d6a5a654892");

// Other
Config::write("defaultExtension", "htm");

// Language
Config::write('multilang', false);
Config::write('default_language', 'br');

// Environment
Config::write("environment", 'development');

// Currency settings
Config::write('app.currency', 'R$');
Config::write('app.currency_name', 'Real');
Config::write('app.currency_format_decimals', 2);
Config::write('app.currency_format_dec_point', ',');
Config::write('app.currency_format_thousands_sep', '.');

// Mail settings
Config::write('Mailer.transport', false); // smtp 
Config::write('Mailer.smtp.host', false); //mail.domain.com
Config::write('Mailer.smtp.port', '25');
Config::write('Mailer.smtp.encryption', '');
Config::write('Mailer.smtp.username', false); //email
Config::write('Mailer.smtp.password', false); //password

// Debug mode
Config::write('debug', true);

// Facebook tags
Config::write('face.title', 'Nome do site');
Config::write('face.type', 'article');
Config::write('face.description', 'Alguma descrição do site');
Config::write('face.url', 'http://www.meusite.com.br/');
Config::write('face.image', 'http://www.temqueporaurlcompleta.com.br/images/facebook.jpg');
Config::write('face.site_name', 'Nome do site');