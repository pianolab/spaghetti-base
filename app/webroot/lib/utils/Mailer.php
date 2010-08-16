<?php

require_once 'lib/utils/Swift/swift_required.php';

class Mailer {
    protected $from;
    protected $to;
    protected $subject;
    protected $attachments = array();
    protected $views = array();
    protected $data = array();
    protected $layout = false;
    
    public function __construct($data = array()) {
        foreach($data as $key => $value):
            $this->{$key} = $value;
        endforeach;
    }
    public function transport() {
        switch(Config::read('Mailer.transport')):
            case 'mail':
                $transport = Swift_MailTransport::newInstance();
                break;
            case 'smtp':
                $host = Config::read('Mailer.smtp.host');
                $port = Config::read('Mailer.smtp.port');
                $encryption = Config::read('Mailer.smtp.encryption');
                $transport = Swift_SmtpTransport::newInstance($host, $port, $encryption);
                
                if(Config::read('Mailer.smtp.username')):
                    $username = Config::read('Mailer.smtp.username');
                    $password = Config::read('Mailer.smtp.password');
                    $transport->setUsername($username)->setPassword($password);
                endif;
        endswitch;
        
        return $transport;
    }
    public function message() {
        $message = Swift_Message::newInstance($this->subject);
        $message->setFrom($this->from);
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
        foreach($this->views as $type => $path):
            $content = $view->render($path, $this->layout);
            $message->addPart($content, $type);
        endforeach;
    }
    public function send() {
        $mailer = Swift_Mailer::newInstance($this->transport());
        return $mailer->send($this->message());
    }
}