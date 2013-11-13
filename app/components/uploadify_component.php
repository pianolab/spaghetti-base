<?php

class UploadifyComponent extends UploadComponent
{
  protected $uniqueSalt;

  public function makeToken($timestamp)
  {
    $this->uniqueSalt = md5(UPLOADIFY_UNIQUE_SALT . $timestamp);
  }

  public function verifyToken($token)
  {
    return $this->uniqueSalt == $token;
  }

  public function uploadify($params = array())
  {
    $this->allowedTypes = empty($params['allowed_types']) ? $this->allowedTypes : $params['allowed_types'];
    $this->maxSize = empty($params['max_size']) ? $this->maxSize : $params['max_size'];

    if (isset($params['path'])) $this->setPath($params['path']);  
    
    $file = $this->files['Filedata'];
    $is_upload = false;

    if ($file['error'] == 0) {
      $this->uniqueName($file['name']);
      $is_upload = $this->upload($file, null, $this->filename);
    } # endif;

    if (!$is_upload) header('HTTP/1.1 406', true, 406);

    return array('success' => $is_upload, 'data' => $this->preparingToSave());
  }

  public function preparingToSave()
  {
    return array(
      'file_name' => $this->filename,
      'origin_name' => $this->files['Filedata']['name'],
      'type' => $this->files['Filedata']['type'],
      'size' => $this->files['Filedata']['size'],
    );
  }
}