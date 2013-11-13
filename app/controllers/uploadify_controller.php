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

      $response = $this->UploadifyComponent->uploadify(array('path' => 'folder-name'));
      if ($response['success'] && !empty($response['data'])) {
        $attachment = new Attachment($response['data']);

        $attachment->parent_id = 0;
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