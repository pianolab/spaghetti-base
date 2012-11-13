<ul>
	<?php foreach($navigation as $link => $item): ?>
	<?php if(is_object($item)): ?>
	<li>
		<?php echo $html->link($item->index, "{$base}/{$link}/index") ?>
		<?php unset($item->index); echo $this->element("docs/sidebar", array("navigation" => $item, "base" => "{$base}/{$link}")) ?>
	</li>
	<?php else: ?>
	<li>
		<?php echo $html->link($item, "{$base}/{$link}") ?>
	</li>
	<?php endif ?>
	<?php endforeach ?>
</ul>
