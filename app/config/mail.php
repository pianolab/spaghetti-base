<?php

/**
 * Definições de AMBIENTE de desenvolvimento
 */
if (Config::read('environment') == 'production') {
  # email default
  Config::write('Mailer.send.default', 'agencia@pianolab.com.br');

  # config send
  Config::write('Mailer.transport', 'smtp'); 
  Config::write('Mailer.smtp.host', 'mail.domain.com'); 
  Config::write('Mailer.smtp.port', '25');
  Config::write('Mailer.smtp.encryption', '');
  Config::write('Mailer.smtp.username', 'email@domain.com'); 
  Config::write('Mailer.smtp.password', 'mailpassword'); 
} # endif
elseif (Config::read('environment') == 'development') {
  # email default
  Config::write('Mailer.send.default', 'agencia@pianolab.com.br');

  # config send
  Config::write('Mailer.transport', 'smtp'); 
  Config::write('Mailer.smtp.host', 'mail.domain.com'); 
  Config::write('Mailer.smtp.port', '25');
  Config::write('Mailer.smtp.encryption', '');
  Config::write('Mailer.smtp.username', 'email@domain.com'); 
  Config::write('Mailer.smtp.password', 'mailpassword'); 
} # endelseif
