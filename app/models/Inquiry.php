<?php

App::import("Vendor", "mailer" . DS . "Mailer");

class Inquiry extends ActiveRecordModel
{
  static $validates_presence_of = array(
    array("name", "message" => "Não pode ficar em branco"),
    array("email", "message" => "Não pode ficar em branco"),
    array("message", "message" => "Não pode ficar em branco"),
  );

  static $validates_format_of = array(
    array("email", "with" => "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/", "message" => "Email não é válido"),
  );

  static $validates_size_of = array(
    array("name", "minimum" => 10, "too_long" => "No mínimo 10 caracteres"),
  );

  public function send_mail()
  {
    $config = array(
      "to" => MAILER_SEND_DEFAULT,
      "from" => array(MAILER_SMTP_USERNAME => "Contato"),
      "subject" => "Formulário de Contato :: " . APP_NAME,
      "views" => "inquiries/mail",
      "data" => array("inquiry" => $this),
    );

    $mailer = new Mailer($config);

    return $mailer->send();
  }
}