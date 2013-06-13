<?php
class UploadHelper extends HtmlHelper 
{
  public function image($src, $attr = array(), $full = false) 
  {
    $link = array_unset($attr, "link");
    if (isset($link) && !empty($link)) {
      return parent::imagelink($src, $link, $attr, array(), $full);
    } else {
      return parent::image(UPLOAD_URL . $src, $attr, $full);
    }
  }

  public function imagelink($src, $url, $img_attr = array(), $attr = array(), $full = false) {
    $image = $this->image($src, $img_attr, $full);
    return parent::link($image, UPLOAD_URL . $url, $attr, $full);
  }
}