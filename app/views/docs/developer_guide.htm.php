<?php
$this->pageTitle = $doc["title"];
$this->breadcrumb = $html->link("página inicial", "/") . " / " . $html->link("documentação", "/docs") . " / <strong>{$doc['title']}</strong>";
?>
<section id="content">
	<aside style="width: 250px; float: left;">
		<h3>Guia do Desenvolvedor</h3>
		<nav>
			<?php echo $this->element("docs/sidebar", array("navigation" => $navigation, "base" => "/docs/developer-guide")) ?>
		</nav>
	</aside>

	<article style="width: 880px; float: left;">
		<h1>Documentação / <?php echo $this->pageTitle ?></h1>
		<hr />
		<?php echo $textile->textileThis($doc["content"]) ?>
	</article>


	<span class="clear"></span>
</section>