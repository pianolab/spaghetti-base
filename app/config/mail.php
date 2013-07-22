<?php

/**
 * Definições de AMBIENTE de desenvolvimento
 */
if (Config::read('environment') == 'production') {
  # email default
  define('MAILER_SEND_DEFAULT', 'agencia@pianolab.com.br');

  # config send
  define('MAILER_TRANSPORT', 'smtp'); 
  define('MAILER_SMTP_HOST', 'mail.domain.com'); 
  define('MAILER_SMTP_PORT', '587');
  define('MAILER_SMTP_ENCRYPTION', '');
  define('MAILER_SMTP_USERNAME', 'email@domain.com'); 
  define('MAILER_SMTP_PASSWORD', 'mailpassword'); 
} # endif
elseif (Config::read('environment') == 'development') {
  # email default
  define('MAILER_SEND_DEFAULT', 'agencia@pianolab.com.br');

  # config send
  define('MAILER_TRANSPORT', 'smtp'); 
  define('MAILER_SMTP_HOST', 'mail.domain.com'); 
  define('MAILER_SMTP_PORT', '587');
  define('MAILER_SMTP_ENCRYPTION', '');
  define('MAILER_SMTP_USERNAME', 'email@domain.com'); 
  define('MAILER_SMTP_PASSWORD', 'mailpassword'); 
} # endelseif