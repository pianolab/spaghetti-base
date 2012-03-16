    	
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
		'application'
	)); ?>
	<?php echo $this->scriptsForLayout; ?>
	<?php echo $this->element('shared/analytics'); ?>
  </body>
</html>