<?php
class UploadifyController extends AppController
{
  public $components = array('Upload', 'Uploadify');
  
  public function multiple() 
  {
    if ($this->is('post')) {
      $this->layout = false;

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
}