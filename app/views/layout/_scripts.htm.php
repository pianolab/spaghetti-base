<!-- Le base path
================================================== -->
<script type="text/javascript">var base_path = "<?php echo Mapper::url('/', true); ?>"</script>

<!-- Placed at the end of the document so the pages load faster -->
<?php echo $html->script(array(
	# jquery
  'jquery/jquery-1.8.2.min',
	# bootstrap
  'bootstrap/bootstrap.min', 
  'bootstrap/prompt.modal',
	# modernizr
  'modernizr-2.5.3-respond-1.1.0.min',
	# meio.mask
  'meio.mask/jquery.meio.mask',
  'meio.mask/init.meio.mask',
	# jcheck
  'jcheck/jcheck-0.7.1.min',
  'jcheck/jcheck.pt-br',
	# general appliction
  // 'application',
)); ?>
<?php echo $this->scriptsForLayout; ?>