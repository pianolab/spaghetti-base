<?php 
$minify->jsAddScript('var base_url = "' . Mapper::url('/', true) . '/";');

$minify->jsAddScript('var base_path = "' . Mapper::url('/', false) . '/";');

$minify->jsAddUrl(array(
  # jQuery v1.10.2 
  'vendors/jquery/jquery.min',
  # bootstrap
  'vendors/bootstrap/bootstrap.min', 
  'vendors/bootstrap/prompt.modal',
  # Modernizr 2.6.2 (Custom Build)
  'vendors/modernizr.min',
  # jquery.meio.mask 1.1.11
  'vendors/meio.mask/jquery.meio.mask.min',
  'vendors/meio.mask/jquery.meio.mask.init',
  # jQuery Validation Plugin 1.11.1
  'vendors/validate/jquery.validate.min',
  'vendors/validate/jquery.validate.init'
)); ?>

<?php echo $minify->jsMin(); ?>