<?php

class UploadifyController extends AppController
{
  // public $components = array('Upload', 'Uploadify');
  
  public function multiple() 
  {
    $this->layout = false;

    if ($this->is('post')) {
      $attachment = new Attachment(array('parent_id' => $this->data['parent_id'], 
        'parent_name' => $this->data['parent_name']));

      $folder = Inflector::pluralize($this->data['parent_name']);

      $response = $this->UploadifyComponent->multiple(array('path' => $folder));

      if ($response['success'] && has_data($response['data'])) {
        $attachment->set_attributes($response['data']);

        $attachment->save();

        $this->arrView['folder'] = $folder;
        $this->arrView['attachment'] = $attachment;
      }
    }
    else {
      $this->autoRender = false;
    }
  }
  public function sample()
  {
    $this->pageTitle('Uploadify - upload multiplos de arquivos');
  }
}