<!-- Le base path
================================================== -->
<script type="text/javascript">var base_path = "<?php echo Mapper::url('/', true); ?>"</script>

<!-- Placed at the end of the document so the pages load faster -->
<?php echo $html->script(array(
	# jquery
  'vendors/jquery/jquery-1.8.2.min',
	# bootstrap
  'vendors/bootstrap/bootstrap.min', 
  'vendors/bootstrap/prompt.modal',
	# modernizr
  'vendors/modernizr-2.6.2.min',
	# meio.mask
  'vendors/meio.mask/jquery.meio.mask',
  'vendors/meio.mask/init.meio.mask',
)); ?>
<?php echo $this->scriptsForLayout; ?>