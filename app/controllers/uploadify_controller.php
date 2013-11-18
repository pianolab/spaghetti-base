<?php
class UploadifyController extends AppController
{
  public function index() 
  {
    if (empty($this->data)) {
      $this->autoRender = false;
    }
    else {
      $this->layout = false;

      $attachment = new Attachment(array('parent_id' => $this->data['parent_id'], 
        'parent_name' => $this->data['parent_name']));

      $response = $this->UploadifyComponent->uploadify(array('path' => 'folder-name'));
      if ($response['success'] && !empty($response['data'])) {
        $attachment->set_attributes($response['data']);

        $attachment->save();

        $this->arrView['attachment'] = $attachment;
      }
    }
  }
  public function sample()
  {
    $this->pageTitle('Uploadify - upload multiplos de arquivos');
  }
}