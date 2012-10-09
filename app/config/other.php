<?php
/**
 * Title of application
 */
Config::write('app.name', 'piano.base');

 
/**
 * records per page
 */
Config::write('app.conv.perpage', 10);

/**
 * upload dir and path
 */
Config::write('app.upload_url', BASE_URL . '/upload/client-');
Config::write('app.upload_path', $_SERVER['DOCUMENT_ROOT'] . '/upload/client-');


/**
 * Google analytics
 */
Config::write('analytics', false);

/**
 * Configurações para o HELPER 
 * de formato de moedas
 */
Config::write('app.currency', 'R$');
Config::write('app.currency_name', 'Real');
Config::write('app.currency_format_decimals', 2);
Config::write('app.currency_format_dec_point', ',');
Config::write('app.currency_format_thousands_sep', '.');

/**
 * Configurações para o helper de TAGS
 * do FACEBOOK
 */
Config::write('face.title', false); // Nome do site
Config::write('face.type', false); // article
Config::write('face.description', false); // Alguma descrição do site
Config::write('face.url', false); // http://www.meusite.com.br/
Config::write('face.image', false); // http://www.temqueporaurlcompleta.com.br/images/facebook.jpg
Config::write('face.site_name', false); // Nome do site