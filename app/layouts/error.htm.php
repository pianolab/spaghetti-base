<?php echo $this->element('shared/header', $this->data); ?>
			<div class="hero-unit">
				<h1>Error.page.404</h1>
				<?php echo $this->contentForLayout; ?>
				<p><a href="<?php echo Mapper::url('/', true); ?>" class="btn btn-inverse btn-large">Go to HOME</a></p>
			</div>

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
			'modules/prompt.modal.js'
		)); ?>