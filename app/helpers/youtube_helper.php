<?php
/**
 *  DateHelper provê funções de auxílio ao website Youtube.com.
 *  Criado por Agência Pianolab - http://www.pianolab.com.br
 *  @license http://www.opensource.org/licenses/mit-license.php
 *  @copyright Copyright 2008-2009, Spaghetti* Framework http://spaghettiphp.org/
 *
 */
class YoutubeHelper extends Helper {

  function thumb($url){
      $arr = explode("watch?v=",$url);
                      
      if(count($arr) == 2) {
        $resp = explode("&", $arr[1]);
        if(count($resp) == 0) {
          $link = $arr[1];
        } else {
          $link = $resp[0];
        } 
      } else {
        $arr = explode("/v/", $url);
        $resp = explode("&", $arr[1]);
        if(count($resp) == 0) {
          $link = $arr[1];
        } else {
          $link = $resp[0];
        }
      }
      
      return "http://img.youtube.com/vi/" . $link . "/3.jpg";
  }
  
  function getId($url){
      $arr = explode("watch?v=",$url);
      //$resp = explode("&", $arr[1]);
                      
      if(count($arr) == 2) {  
        $resp = explode("&", $arr[1]);
        if(count($resp) == 2) {
          $link = $arr[1];
        } else {
          $link = $resp[0];
        } 
      } else {
        $arr = explode("/v/", $url);
        $resp = explode("&", $arr[1]);
        if(count($resp) == 0) {
          $link = $arr[1];
        } else {
          $link = $resp[0];
        }
      }
      
      return $link;
  }

}

?>