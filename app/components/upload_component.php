<?php
/**
 * UploadComponent facilita a tarefa de enviar arquivos do cliente para o servidor,
 * provendo funções para mover e apagar o arquivo, validação, controle de erros,
 * entre outros.
 *
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 * @copyright Copyright 2008-2009, Spaghetti* Framework (http://spaghettiphp.org/)
 *
 */

class UploadComponent extends Component {
  /**
   * Tipos de arquivo permitidos.
   */
  public $allowedTypes = array('jpeg', 'jpg', 'png');
  /**
   * Tamanho máximo permitido (em MB).
   */
  public $maxSize = 10;
  /**
   * Caminho padrão dos arquivos enviados a partir de /app
   */
  public $path = '/';
  /**
   * Arquivos enviados pelo cliente.
   */
  public $files = array();
  /**
   * Erros gerados durante o upload.
   */
  public $errors = array();
  /**
   * Inicializa o componente, padronizando o componente de $_FILES.
   *
   * @return void
   */
  public function initialize(Controller $controller) {
    foreach($_FILES as $key => $content) {
      if(is_array($content['name'])) {
        foreach ($content as $k => $file) {
          $files = current($file);
          if (is_array($files)) {
            foreach ($files as $kf => $f) {
              $this->files[$kf][$k] = $f;
            }
          }
        }
      }
    }
  }
  /**
   * Valida determinado arquivo.
   *
   * @param array $file Arquivo a ser validado
   * @return boolean Verdadeiro quando o arquivo é válido
   */
  public function validates($file = array()) {
    if(empty($file) && !isset($file['name'])):
      return $this->error('<p style="font-weight:bold;color:#F00C2A;letter-spacing:0pt;word-spacing:0pt;font-size:17px;text-align:left;font-family:arial, helvetica, sans-serif;line-height:1;">Arquivo não enviado!</p>');
    endif;
    if($file['size'] > $this->maxSize * 1024 * 1024):
    endif;
    if(!in_array($this->ext($file['name']), $this->allowedTypes)):
      return $this->error('<p style="font-weight:bold;color:#F00C2A;letter-spacing:0pt;word-spacing:0pt;font-size:17px;text-align:left;font-family:arial, helvetica, sans-serif;line-height:1;">Tipo de arquivo não aceito!</p>');
    endif;
    if($uploadError = $this->UploadError($file['error'])):
      return $this->error($uploadError);
    endif;
    return true;
  }
  /**
   * Move um arquivo enviado pelo cliente para determinado local na aplicação,
   * fazendo as validações necessárias.
   *
   * @param array $file Arquivo a ser movido
   * @param string $path Caminho para enviar o arquivo
   * @param string $name Novo nome do arquivo
   * @return boolean Verdadeiro se o arquivo foi movido
   */
  public function upload($file = array(), $path = null, $name = null) {
    $path = is_null($path) ? $this->path : $path;
    $name = is_null($name) ? $file['name'] : $name;
    if($this->validates($file)):
      $path = $path;
      if(!is_dir($path)):
        mkdir($path, 0777, true);
      endif;
      if(move_uploaded_file($file['tmp_name'], $path . DS . $name)):
        return array('status' => true, 'message' => '');
      else:
        return array('status' => false, 'message' => $this->error('CantMoveFile'));
      endif;
    else:
      return array('status' => false, 'message' => $this->errors);
    endif;
  }
  /**
   * Apaga um arquivo.
   *
   * @param string $filename Nome do arquivo a ser apagado
   * @param string $path Caminho onde reside o arquivo
   * @return boolean Verdadeiro se o arquivo foi apagado.
   */
  public function delete($filename = '', $path = null) {
    $path = is_null($path) ? $this->path : $path;
    $file = $path . DS . $filename;
    if(file_exists($file)):
      if(@unlink($file)):
        return true;
      else:
        return $this->error('CantDeleteFile');
      endif;
    else:
      return $this->error('CantFindFile');
    endif;
  }
  /**
   * Retorna a extensão de um arquivo.
   *
   * @param string $filename Nome do arquivo
   * @return string Extensão do arquivo
   */
  public function ext($filename = '') {
    return strtolower(trim(substr($filename, strrpos($filename, '.') + 1, strlen($filename))));
  }
  /**
   * Generate a unique name for the file
   *
   * @param string $filename Nome do arquivo
   * @return string Extensão do arquivo
   */
  public function uniqueName($filename = '') {
    $extension = $this->ext($filename);
    $filename = String::uuid();
    settype($filename, 'string');
    return $filename .= '.' . $extension;
  }
  /**
   * Setting name for the folder
   *
   * @param string $folder Name of the folder
   * @return string Extensão do arquivo
   */
  public function setPath($folder = '') {
    $this->path = WWW_ROOT . 'attachments' . DS;
    $this->path .= isset($folder) ? $folder : null;
  }
  /**
   * Adiciona um novo erro ao componente.
   *
   * @param string $message Mensagem de erro
   * @return false
   */
  public function error($message = '') {
    $this->errors []= $message;
    return false;
  }
  /**
   * Limpa os erros gerados pelo componente.
   *
   * @return true
   */
  public function clear() {
    $this->errors = array();
    return true;
  }
  /**
   * Reconhece erros de upload através de $_FILES.
   *
   * @param int $error Código de erro
   * @return mixed Mensagem de erro, ou falso caso não hajam erros.
   */
  public function uploadError($error = 0) {
    $message = false;
    switch($error):
      case UPLOAD_ERR_OK: break;
      case UPLOAD_ERR_INI_SIZE: $message = '<p style="font-weight:bold;color:#F00C2A;letter-spacing:0pt;word-spacing:0pt;font-size:17px;text-align:left;font-family:arial, helvetica, sans-serif;line-height:1;">Erro no tamanho do arquivo!</p>'; break;
      case UPLOAD_ERR_FORM_SIZE: $message = '<p style="font-weight:bold;color:#F00C2A;letter-spacing:0pt;word-spacing:0pt;font-size:17px;text-align:left;font-family:arial, helvetica, sans-serif;line-height:1;">Erro no tamanho do arquivo!</p>'; break;
      case UPLOAD_ERR_PARTIAL: $message = '<p style="font-weight:bold;color:#F00C2A;letter-spacing:0pt;word-spacing:0pt;font-size:17px;text-align:left;font-family:arial, helvetica, sans-serif;line-height:1;">Parcialmente gravado!</p>'; break;
      case UPLOAD_ERR_NO_FILE: $message = '<p style="font-weight:bold;color:#F00C2A;letter-spacing:0pt;word-spacing:0pt;font-size:17px;text-align:left;font-family:arial, helvetica, sans-serif;line-height:1;">Sem arquivo!</p>'; break;
      case UPLOAD_ERR_NO_TMP_DIR: $message = '<p style="font-weight:bold;color:#F00C2A;letter-spacing:0pt;word-spacing:0pt;font-size:17px;text-align:left;font-family:arial, helvetica, sans-serif;line-height:1;">Pasta temporária não encontrada!</p>'; break;
      case UPLOAD_ERR_CANT_WRITE: $message = '<p style="font-weight:bold;color:#F00C2A;letter-spacing:0pt;word-spacing:0pt;font-size:17px;text-align:left;font-family:arial, helvetica, sans-serif;line-height:1;">Não pode gravar o arquivo!</p>'; break;
      default: $message = '<p style="font-weight:bold;color:#F00C2A;letter-spacing:0pt;word-spacing:0pt;font-size:17px;text-align:left;font-family:arial, helvetica, sans-serif;line-height:1;">Erro desconhecido!</p>';
    endswitch;
    return $message;
  }
}