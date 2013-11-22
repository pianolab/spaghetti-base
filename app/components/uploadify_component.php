<?php

class UploadifyComponent extends UploadComponent
{
  protected $uniqueSalt;
  public $inputName = 'Filedata';
  public $columns = array(
    'file_name' => 'file_name',
    'origin_name' => 'origin_name',
    'type' => 'type',
    'size' => 'size',
  );

  public function makeToken($timestamp)
  {
    $this->uniqueSalt = md5(UPLOADIFY_UNIQUE_SALT . $timestamp);
  }

  public function verifyToken($token)
  {
    return $this->uniqueSalt == $token;
  }

  protected function sendFile($params)
  {
    $this->allowedTypes = empty($params['allowed_types']) ? $this->allowedTypes : $params['allowed_types'];
    $this->maxSize = empty($params['max_size']) ? $this->maxSize : $params['max_size'];

    $file = $this->files[ $this->inputName ];
    $is_upload = false;

    if ($file['error'] == 0) {
      $this->uniqueName($file['name'], $params['path']);
      $is_upload = $this->upload($file, null, $this->filename);
    } # endif;
    return $is_upload;
  }

  public function multiple($params = array())
  {    
    $is_upload = $this->sendFile($params);
    
    if (!$is_upload) {
      header('HTTP/1.1 406', true, 406);
      throw new Exception('File Not Acceptable');
    }

    return array('success' => $is_upload, 'data' => $this->preparingToSave());
  }

  public function preparingToSave()
  {
    return array(
      $this->columns['file_name'] => $this->filename,
      $this->columns['origin_name'] => $this->files[ $this->inputName ]['name'],
      $this->columns['type'] => $this->files[ $this->inputName ]['type'],
      $this->columns['size'] => $this->files[ $this->inputName ]['size'],
    );
  }
}