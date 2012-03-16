<h1>Formulário de Contato</h1>
<ul>
	<li><strong>Nome: </strong><?php echo $data['nome']; ?></li>
	<li><strong>E-mail: </strong><?php echo $data['email']; ?></li>
	<li><strong>Assunto: </strong><?php echo $data['assunto']; ?></li>
	<li><strong>Telefone: </strong><?php echo $data['fone']; ?></li>
	<li><strong>Mensagem: </strong><?php echo $data['message']; ?></li>
</ul>

<p>Mensagem enviada ás: <?php echo date('d/n/Y H:i:s'); ?> diretamente do website <?php echo Config::read('app.name'); ?>.</p>