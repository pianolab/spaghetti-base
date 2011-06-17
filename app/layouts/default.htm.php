<?php echo Benchmark::start(); ?>

<?php echo $this->element('shared/header'); ?>
	<div id="content"><?php echo $this->contentForLayout; ?></div>

<?php echo Benchmark::resume(); ?>	
<?php echo $this->element('shared/footer'); ?>