<object width="<?php echo $width ?>" height="<?php echo $height ?>">
  <param name="movie" value="<?php echo $url_video ?>"></param>
  <param name="allowFullScreen" value="true"></param>
  <param name="allowscriptaccess" value="always"></param>
  <embed 
    src="<?php echo $url_video ?>" 
    type="application/x-shockwave-flash" 
    width="<?php echo $width ?>" height="<?php echo $height ?>" 
    wmode="opaque" 
    allowscriptaccess="always" 
    allowfullscreen="true">
  </embed>
</object>
