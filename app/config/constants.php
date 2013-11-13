<?php

/**
 * Title of application
 */
define('APP_NAME', 'PianoLab Base');

/**
 * records per page
 */
define('PERPAGE_DEFAULT', 10);

/*
 Configurações para session
*/

define('SESSION_PATH', false); // / home/USUARIO_DO_HOST/tmp

/**
 * upload dir and path
 */
define('UPLOAD_FOLDER', 'upload');
define('UPLOAD_URL', Mapper::url('/' . UPLOAD_FOLDER));
define('UPLOAD_PATH', ROOT . DS . UPLOAD_FOLDER);

/**
 * Google analytics
 */
define('ANALYTICS', false);

/**
* Configurações para o HELPER de formato de moedas
*/
define('CURRENCY', 'R$');
define('CURRENCY_NAME', 'Real');
define('CURRENCY_DECIMAL_PLACE', 2);
define('CURRENCY_DECIMAL_SEPARATOR', ',');
define('CURRENCY_THOUSANDS_SEPARATOR', '.');

/**
 * Configurações para o e-mail
 */
define('MAILER_SEND_DEFAULT', 'agencia@pianolab.com.br');

# config send
define('MAILER_TRANSPORT', 'smtp'); 
define('MAILER_SMTP_HOST', 'mail.domain.com'); 
define('MAILER_SMTP_PORT', '587');
define('MAILER_SMTP_ENCRYPTION', '');
define('MAILER_SMTP_USERNAME', 'email@domain.com'); 
define('MAILER_SMTP_PASSWORD', 'mailpassword'); 

/**
 * Configurações para o helper de TAGS do FACEBOOK
 */
define('FACE_TITLE', false); // Nome do site
define('FACE_TYPE', false); // article
define('FACE_DESCRIPTION', false); // Alguma descrição do site
define('FACE_URL', false); // http://www.meusite.com.br/
define('FACE_IMAGE', false); // http://www.temqueporaurlcompleta.com.br/images/facebook.jpg
define('FACE_SITE_NAME', false); // Nome do site

/**
 * Configurações para o helper de TAGS do FACEBOOK
 */
define('UPLOADIFY_UNIQUE_SALT', '5asd5gvmds4d6afoya65as56d4a646wq55a654892'); // Nome do site
