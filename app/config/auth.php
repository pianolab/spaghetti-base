<?php
/**
 * 
 * Configuração do componente de autenticação
 *
 */
if ($this->AuthComponent) {
	$this->AuthComponent->loginAction = '/login';
	$this->AuthComponent->logoutAction = '/logout';
	$this->AuthComponent->loginError = "Seu nome de usuário ou senha estão incorretos";
	$this->AuthComponent->authError = "Você precisa estar autenticado para acessar essa área";
	$this->AuthComponent->hash = 'md5';
	$this->AuthComponent->deny();
	$this->AuthComponent->allow('/register');

	if ($this->AuthComponent->loggedIn()) {
		$this->logged = $this->AuthComponent->user('id');
		$this->set('logged', $this->logged);
	}
}
