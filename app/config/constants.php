<?php

/**
 * Title of application
 */
define("APP_NAME", "PianoLab Base");

/**
 * records per page
 */
define("PERPAGE_DEFAULT", 10);

/*
 * Configurações para session
 */
define("SESSION_PATH", false); // / home/USUARIO_DO_HOST/tmp
define("SESSION_PREFIX", "project_prefix_session"); // / home/USUARIO_DO_HOST/tmp

/*
 * Configurações para session
 */

/**
 * upload dir and path
 */
define("UPLOAD_FOLDER", "upload");
define("UPLOAD_URL", Mapper::url("/" . UPLOAD_FOLDER));
define("UPLOAD_PATH", ROOT . DS . UPLOAD_FOLDER);

/**
 * Google analytics
 */
define("ANALYTICS_CODE", false);
define("ANALYTICS_URL", false);

/**
 * Configurações para o e-mail
 */
define("MAILER_SEND_DEFAULT", "suporte@pianolab.com.br");

# config send mail
define("MAILER_TRANSPORT", "smtp");
define("MAILER_SMTP_HOST", "mail.domain.com");
define("MAILER_SMTP_PORT", "587");
define("MAILER_SMTP_ENCRYPTION", "");
define("MAILER_SMTP_USERNAME", "email@domain.com");
define("MAILER_SMTP_PASSWORD", "mailpassword");

/**
 * Configurações para o helper de TAGS do FACEBOOK
 */
define("FACE_TITLE", false); // Nome do site
define("FACE_TYPE", false); // article
define("FACE_DESCRIPTION", false); // Alguma descrição do site
define("FACE_URL", false); // http://www.meusite.com.br/
define("FACE_IMAGE", false); // http://www.temqueporaurlcompleta.com.br/images/facebook.jpg
define("FACE_SITE_NAME", false); // Nome do site

/**
 * Salt of Uploadify
 */
define("UPLOADIFY_UNIQUE_SALT", "dasd55a654asdqwefzcxifoya65as56d4a646wq8925a5gas");
