<?php require_once("sessao.php"); ?>

<?php require_once("conn/conexao.php"); ?>

<html>
<head>
  <title>Lista de Produtos</title>
  <?php include_once("header.html"); ?>
</head>
<body>
<main>
<div>
<h1>Lista de Produtos</h1>
</div>
<div>
<table border="1">
<tr>
	<td width="50px"><b>ID</b></td>
	<td width="200px"><b>Nome</b></td>
	<td width="200px"><b>Descricao</b></td>
	<td width="100px"><b>Preco Unit</b></td>
	<td width="100px"><b>Fabricante</b></td>
        <td width="100px"><b>Imagem</b></td>
</tr>

<?php
  
  $query = "select id,nome,descricao,preco_unitario,fabricante,imagem_arq from produto order by id";
  $resultado = mysqli_query($conn, $query);
  while ($linha = mysqli_fetch_array($resultado)) {
  
?>

	<tr>
		<td><?php echo $linha['id']; ?></td>
		<td><?php echo $linha['nome']; ?></td>
		<td><?php echo $linha['descricao']; ?></td>
		<td><?php echo $linha['preco_unitario']; ?></td>
                <td><?php echo $linha['fabricante']; ?></td>
                <td><img src="<?php echo $linha['imagem_arq'];?>" ></td>
		<td><a href="form_produto2.php?id=<?php echo $linha['id']; ?>">Editar</a> | 
		    <a href="deletar_produto1.php?id=<?php echo $linha['id']; ?>">Deletar</a></td>
	</tr>
<?php
}
  mysqli_free_result($resultado);
  mysqli_close($conn);
?>
</table>
</div>
<p>
<a href="form_produto2.php">Novo</a>
<a href="inicial.php">Sair</a>
</p>
</main>
<?php include_once("footer.html") ?>
</body>
</html>
