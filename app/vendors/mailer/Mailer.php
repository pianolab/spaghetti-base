<?php

App::import("Vendor", "mailer" . DS . "Swift" . DS . "swift_required");

class Mailer
{
  protected $from;
  protected $to;
  protected $bcc;
  protected $subject;
  protected $attachments = array();
  protected $views = array();
  protected $data = array();
  protected $layout = "mail";

  public function __construct($data = array()) {
    foreach($data as $key => $value):
      $this->{$key} = $value;
    endforeach;
  }
  public function transport() {
    switch(MAILER_TRANSPORT):
      case "mail":
        $transport = Swift_MailTransport::newInstance();
        break;
      case "smtp":
        $host = MAILER_SMTP_HOST;
        $port = MAILER_SMTP_PORT;
        $encryption = MAILER_SMTP_ENCRYPTION;
        $transport = Swift_SmtpTransport::newInstance($host, $port, $encryption);

        if(has_data(MAILER_SMTP_USERNAME)):
          $username = MAILER_SMTP_USERNAME;
          $password = MAILER_SMTP_PASSWORD;
          $transport->setUsername($username)->setPassword($password);
        endif;
    endswitch;

    return $transport;
  }
  public function message() {
    $message = Swift_Message::newInstance($this->subject);
    $message->setFrom($this->from);
    $message->setTo($this->to);
    if(!empty($this->bcc)){
      $message->setBcc($this->bcc);
    }
    $message->setTo($this->to);

    $this->render($message);

    if(!empty($this->attachments)):
      $this->attachFiles($message);
    endif;

    return $message;
  }
  public function attachFiles($message) {
    foreach($this->attachments as $name => $file):
      $attachment = Swift_Attachment::fromPath($file);

      if(!is_numeric($name)):
        $attachment->setFilename($name);
      endif;

      $message->attach($attachment);
    endforeach;
  }
  public function render($message) {
    $view = new View();
    $view->data = $this->data;

    if (is_array($this->views)):
      $views = $this->views;
    else:
      $views = array(
        "text/plain" => $this->views . ".txt",
        "text/html" => $this->views . ".htm",
      );
    endif;

    foreach($views as $type => $path):
      $content = $view->render($path, $this->layout);
      $message->addPart($content, $type);
    endforeach;
  }
  public function send() {
    $mailer = Swift_Mailer::newInstance($this->transport());
    return $mailer->send($this->message());
  }
}