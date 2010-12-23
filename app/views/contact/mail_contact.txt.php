<h1>Formulário de Contato</h1>
<p>
	<strong>Nome: </strong><?php echo $data['nome']; ?><br />
	<strong>E-mail: </strong><?php echo $data['email']; ?><br />
	<strong>Assunto: </strong><?php echo $data['assunto']; ?><br />
  <strong>Telefone: </strong><?php echo $data['fone']; ?><br />
  <strong>Mensagem: </strong><?php echo $data['message']; ?>
</p>
<p>Mensagem enviada ás: <?php echo date('d/n/Y H:i:s'); ?> diretamente do website.</p>