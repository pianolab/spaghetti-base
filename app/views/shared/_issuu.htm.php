<?php $complement = 'mode=embed&layout=http://skin.issuu.com/v/light/layout.xml' ?>
<iframe 
  style="border:none" 
  width="<?php echo $width ?>" 
  src="<?php echo str_replace('mode=window', $complement, $source) ?>" 
  height="<?php echo $height ?>">
</iframe>