<?php $minify->addUrl('http://pianolab.wfsneto.com.br/minify/script.js'); ?>

<?php $minify->addString("alert('asdsa'); \n"); ?>

<?php $minify->addUrl('http://admin.gruposucessoempresarial.com.br/scripts/modules/banner.js'); ?>

<?php $minify->min(); ?>