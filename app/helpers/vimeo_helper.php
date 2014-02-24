<?php
class VimeoHelper extends HtmlHelper
{
  private function requestDataJSON ($url)
  {
    $urlHash = md5($url);

    if (isset($_SESSION[$urlHash])) {
      return $_SESSION[$urlHash];
    }
    else {
      $data = json_decode(file_get_contents($url), true);
      $_SESSION[$urlHash] = $data;
      return $data;
    }
  }

  public function thumb($url, $size = "medium")
  {
    $id = $this->getId($url);

    if (isset($id)) {
      $request = $this->requestDataJSON("http://vimeo.com/api/v2/video/" . $id . ".json");
    }

    return (String) $request[0]["thumbnail_" . $size];
  }

  public function image($url, $format = "medium", $options = array())
  {
    return parent::image($this->thumb($url, $format), $options);
  }

  public function imageLink($video, $link_url, $img_attr = array(), $attr = array(), $full = false)
  {
    $url = array_unset($video, "url");
    $format = array_unset($video, "format");
    return parent::link($this->image($url, $format), $link_url, $img_attr, $attr, $full);
  }

  public function show($url, $params = array())
  {
    $params = array_merge(array(
      "width" => 537,
      "height" => 361,
      "src" => $this->getUrl($url),
      "frameborder" => 0,
      "webkitAllowFullScreen", "mozallowfullscreen", "allowFullScreen"
    ), $params);

    return $this->tag("iframe", null, $params);
  }

  public function title($url)
  {
    $id = $this->getId($url);

    if (isset($id)) {
      $request = $this->requestDataJSON("http://vimeo.com/api/v2/video/" . $id . ".json");
    }

    return (String) $request[0]["title"];
  }

  public function description($url)
  {
    $id = $this->getId($url);

    if (isset($id)) {
      $request = $this->requestDataJSON("http://vimeo.com/api/v2/video/" . $id . ".json");
    }

    return (String) $request[0]["description"];
  }

  public function getId($url){
    $exp = explode("/", $url);
    $id = end($exp);

    if ($id == "") { $id = $exp[count($exp)-1]; }

    return $id;
  }

  public function getUrl($url)
  {
    return "http://player.vimeo.com/video/" . $this->getId($url);
  }

  public function duration($url)
  {
    $id = $this->getId($url);

    if (isset($id)) {
      $request = $this->requestDataJSON("http://vimeo.com/api/v2/video/" . $id . ".json");
    }

    $seconds = (String) $request[0]['duration'];

    return date('i:s',mktime(0,0,$seconds,date('d'),date('m'),date('Y')));

  }
}
