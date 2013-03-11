<?php
class VimeoHelper extends HtmlHelper {
  function thumb($url, $size = 'medium'){
    
    $id = $this->getId($url);
    if (isset($id)) {
      $request = json_decode(file_get_contents("http://vimeo.com/api/v2/video/" . $id . ".json"), true);
    }
    return (String) $request[0]['thumbnail_' . $size];
  }

  function image($url, $format = 'medium', $options = array())
  {
    return parent::image($this->thumb($url, $format), $options);
  }

  function getId($url){
    $exp = explode("/", $url);
    $id = end($exp);
    if ($id == '') { $id = $exp[count($exp)-1]; }
    
    return $id;
  }

  function getUrl($url)
  {
    return 'http://player.vimeo.com/video/' . $this->getId($url);
  }
}