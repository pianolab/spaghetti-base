<?php
/**
 *  DateHelper provê funções de auxílio ao website Youtube.com.
 *  Criado por Agência Pianolab - http://www.pianolab.com.br
 *  @license http://www.opensource.org/licenses/mit-license.php
 *  @copyright Copyright 2008-2009, Spaghetti* Framework http://spaghettiphp.org/
 *
 * Usage on views
 *  <?php 
 *  echo $this->element('shared/youtube', array(
 *    'width' => '970', 
 *    'height' => '475', 
 *    'url_video' => $youtube->getUrl($url_video)
 *  )); 
 *  ?>
 *
 */
class YoutubeHelper extends Helper {

  public $viewCount = false;

  function thumb($url)
  {
    return "http://img.youtube.com/vi/" .$this->returnId($url) . "/3.jpg";
  }
  
  function getId($url)
  {
    return $this->returnId($url);
  }

  function getUrl($url)
  {
    return 'http://www.youtube.com/v/' . $this->returnId($url) . '?version=3&amp;hl=pt_BR';
  }

  function getViewCount($url)
  {
    $json = file_get_contents('https://gdata.youtube.com/feeds/api/videos?q=' . $this->returnId($url) . '&alt=json');
    $json = json_decode($json);
    $this->viewCount = $json->{'feed'}->{'entry'}[0]->{'yt$statistics'}->{'viewCount'};

    return $this->viewCount;
  }

  private function returnId($url)
  {
    $arr = explode("?",$url);
    $strings = explode("&",$arr[1]);
    $return = false;
    foreach ($strings as $key => $string) {
      $aux = explode('=', $string);
      $return[$aux[0]] = $aux[1];
    } # endforeach;
    $return = $return['v'];

    if ($return) {
      return $return;
    } # endif
    else {
      $return = false;
      $arr = explode("/youtu.be/",$url);
      $aux = explode("/",$arr[1]);
      $return = $aux[0];
    } # endelse;

    if ($return) {
      return $return;
    } # endif
    else {
      $return = false;
      $arr = explode("/www.youtube.com/", $url);
      $strings = explode("/",$arr[1]);
      foreach ($strings as $key => $string) {
        if ($string == 'v') {
          $return = $strings[$key + 1];
          break;
        } # endif;
      } # endforeach;
    } # endelse;

    return $return;
  }

}
