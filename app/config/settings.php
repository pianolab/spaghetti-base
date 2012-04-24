<?php
/**
 * 
 * Definições de seguranção da aplicação
 * 
 */
Config::write("securitySalt", "5a65as56d4a65s4d6a5a654892");


/**
 * 
 * Definições comuns da aplicação
 * 
 */
 
Config::write('app.name', 'piano.base');
Config::write('app.conv.perpage', 10);
Config::write('app.upload_url', 'http://upload.projeto.com.br/');
Config::write('app.url_base', 'http://www.projeto.com.br/');
Config::write('app.hash', 'md5');
Config::write('analytics', false);
Config::write("defaultExtension", "htm");


/**
 * 
 * Definições de internacionalização (i18n)
 * 
 */
Config::write('multilang', false);
Config::write('default_language', 'br');


/**
 * 
 * Definições de AMBIENTE de desenvolvimento
 * 
 */ 
Config::write("environment", 'development'); # development, production


/**
 * 
 * Configurações para o HELPER 
 * de formato de moedas
 * 
 */
Config::write('app.currency', 'R$');
Config::write('app.currency_name', 'Real');
Config::write('app.currency_format_decimals', 2);
Config::write('app.currency_format_dec_point', ',');
Config::write('app.currency_format_thousands_sep', '.');


/**
 * 
 * Configurações para o helper de TAGS
 * do FACEBOOK
 * 
 */
Config::write('face.title', 'Nome do site');
Config::write('face.type', 'article');
Config::write('face.description', 'Alguma descrição do site');
Config::write('face.url', 'http://www.meusite.com.br/');
Config::write('face.image', 'http://www.temqueporaurlcompleta.com.br/images/facebook.jpg');
Config::write('face.site_name', 'Nome do site');