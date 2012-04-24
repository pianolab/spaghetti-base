<?php
/**
 * 
 * Definições de AMBIENTE de desenvolvimento
 * 
 */

switch (Config::read('environment')) {
	case 'production':
		
		Config::write('Mailer.send.default', 'agencia@pianolab.com.br');
		Config::write('Mailer.transport', false); // smtp 
		Config::write('Mailer.smtp.host', false); //mail.domain.com
		Config::write('Mailer.smtp.port', '25');
		Config::write('Mailer.smtp.encryption', '');
		Config::write('Mailer.smtp.username', false); //email
		Config::write('Mailer.smtp.password', false); //password
		Config::write('debug', false);
		
		break;

	default:
		Config::write('Mailer.send.default', 'agencia@pianolab.com.br');
		Config::write('Mailer.transport', false); // smtp 
		Config::write('Mailer.smtp.host', false); //mail.domain.com
		Config::write('Mailer.smtp.port', '25');
		Config::write('Mailer.smtp.encryption', '');
		Config::write('Mailer.smtp.username', false); //email
		Config::write('Mailer.smtp.password', false); //password
		Config::write('debug', true);
}
