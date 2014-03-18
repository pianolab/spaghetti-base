<?php
/**
 *  DateHelper provê funções de auxílio ao website Youtube.com.
 *  Criado por Agência Pianolab - http://www.pianolab.com.br
 *  @license http://www.opensource.org/licenses/mit-license.php
 *  @copyright Copyright 2008-2009, Spaghetti* Framework http://spaghettiphp.org/
 */

/*
 * Usage on views
  <?php echo $youtube->show($video["url"], array('width' => '537', 'height' => '361')) ?>
*/
class YoutubeHelper extends HtmlHelper
{

  public $viewCount = false;

/**
 * @var String $url Link do youtube (http://www.youtube.com/watch?v=<id-do-video>, http://youtu.be/<id-do-video>)
 * @var String $format (0, 1, 2, 3, default, hqdefault, mqdefault, maxresdefault)
 */
  public function thumb($url, $format = 0)
  {
    return "http://img.youtube.com/vi/" . $this->returnId($url) . "/" . $format . ".jpg";
  }

  public function show($url, $params = array())
  {
    $params = array_merge(array(
      "width" => "537",
      "height" => "361",
      "src" => $this->getUrl($url),
      "frameborder" => 0,
      "allowfullscreen" => "allowfullscreen"
    ), $params);

    return $this->tag("iframe", null, $params);
  }

  public function title($url)
  {
    $youtube = simplexml_load_file('http://gdata.youtube.com/feeds/api/videos/' . $this->returnId($url) . '?v=2');
    return $youtube->title;
  }

  public function image($video, $attr = array(), $full = false)
  {
    $video_url = is_array($video) ? $this->thumb($video["url"], $video["format"]) : $this->thumb($video, 0);
    return parent::image($video_url, $attr, $full);
  }

  public function imageLink($video, $link_url, $img_attr = array(), $attr = array(), $full = false)
  {
    $video_url = is_array($video) ? $this->thumb($video["url"], $video["format"]) : $this->thumb($video, 0);
    return parent::imageLink($video_url, $link_url, $img_attr, $attr, $full);
  }

  public function getId($url)
  {
    return $this->returnId($url);
  }

  public function getUrl($url)
  {
    return "http://www.youtube.com/v/" . $this->returnId($url) . "?version=3&amp;hl=pt_BR";
  }

  public function getViewCount($url)
  {
    $json = file_get_contents("https://gdata.youtube.com/feeds/api/videos?q=" . $this->returnId($url) . "&alt=json");
    $json = json_decode($json);
    $this->viewCount = $json->{"feed"}->{"entry"}[0]->{"yt$statistics"}->{"viewCount"};

    return $this->viewCount;
  }

  private function returnId($url)
  {
    $arr = explode("?",$url);
    $strings = explode("&",$arr[1]);
    $return = false;
    foreach ($strings as $key => $string) {
      $aux = explode("=", $string);
      $return[$aux[0]] = $aux[1];
    } # endforeach;
    $return = $return["v"];

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
        if ($string == "v") {
          $return = current(explode("&", $strings[$key + 1]));
          break;
        } # endif;
      } # endforeach;
    } # endelse;

    return $return;
  }

  public function getDescription($url){
    $id = $this->getId($url);
    $content = file_get_contents("https://gdata.youtube.com/feeds/api/videos/" . $id . "?v=2&alt=json&prettyprint=true");
    $data = json_decode($content, true);
    return $data['entry']['media$group']['media$description']['$t'];
  }

  public function getDuration($url){
    $id = $this->getId($url);
    $content = file_get_contents("http://youtube.com/get_video_info?video_id=".$id);
    parse_str($content, $data);
    return date('i:s',mktime(0,0,$data['length_seconds'],date('d'),date('m'),date('Y')));
  }

    public function isHd($url)
  {
    $id = $this->getId($url);
    $content = file_get_contents("https://gdata.youtube.com/feeds/api/videos/" . $id . "?v=2&alt=json&prettyprint=true");
    $data = json_decode($content, true);
    if (is_null($data['entry']['yt$hd'])) {
      return false;
    } else {
      return true;
    } 
  }
}