    	
    </div> <!-- /container -->
	<footer class="row">
		<div class="span12 center">
			<p>piano.base <a href="http://www.pianolab.com.br/">@pianolabweb</a>. It's released under the MIT license.</p>
		</div>
	</footer>
	
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
	<?php echo $html->script(array(
		'jquery.min', 
		'bootstrap.min', 
		'jcheck-0.7.1.min.js',
		'jcheck.pt-br.js',
		'modules/prompt.modal.js'
	)); ?>
	<?php echo $this->scriptsForLayout; ?>
	<?php echo $this->element('shared/analytics'); ?>
	<?php echo $this->element('shared/alert_modal'); ?>
	<?php echo $flash->flash(); ?>
  </body>
</html>