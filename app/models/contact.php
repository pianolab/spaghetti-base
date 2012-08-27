<?php
class Contact extends AppModel {
  public $table = false;

  public $validates = array(
    'name' => array(
      'rule' => 'notEmpty',
      'message' => 'Nome é um campo obrigatório.',
    ),
    'email' => array(
      'rule' => 'email',
      'message' => 'Utilize um e-mail válido.',
    ),
  );
}