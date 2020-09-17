<?php require_once("sessao.php"); ?>

<?php require_once("conn/conexao.php"); ?>

<?php
  if (isset($_POST["id"])) {
	 $id = $_POST["id"];
     $query = "delete from produto where id = $id";
#    echo $query;
     $resultado = mysqli_query($conn, $query);
	 if (! $resultado) {
	   die("Erro na deleção do produto");
     } else {
	   header("location: produtos1.php");
	 }
  }
  
  if (isset($_GET["id"])) {
     $id = $_GET["id"];
	 $query = "select * from produto where id = $id";
#    echo $query;
     $resultado = mysqli_query($conn, $query);
	 if (! $resultado) {
	   die("Erro na deleção do produto");
     } else {
	   $row = mysqli_fetch_assoc($resultado);
	   $nome = $row["nome"];
	   $descricao = $row["descricao"];
	   $preco_unitario = $row["preco_unitario"];
	   $fabricante = $row["fabricante"];
           $imagem_arq = $row["imagem_arq"];
	 }
  }
?>
<html>
  <head>
    <title>Form</title>
    <?php include_once('header.html') ?>
  </head>
  <body>
  <main>
  <div id="login">
  <form method="post" action="deletar_produto1.php">
    <input type="hidden" id="id" name="id" value="<?php echo $id ?>" >
    <table style="border:1px solid gray;margin-left:auto;margin-right:auto; background-color: linen;">
    <tr><td colspan="2"><h1>Cadastro de Produtos</h1></td></tr>
    <tr><td><label>Nome:<label></td>
    <td><input type="text" id="nome" name="nome" value="<?php echo $nome ?>"></td></tr>
    <tr><td><label>Descricao:<label></td>
    <td><input type="text" id="descricao" name="descricao" value="<?php echo $descricao ?>"></td></tr>
    <tr><td><label>Preco Unit:</label></td>
    <td><input type="text" id="preco_unitario" name="preco_unitario" value="<?php echo $preco_unitario ?>"></td></tr>
    <tr><td><label>Fabricante:</label></td>
    <td><input type="text" id="fabricante" name="fabricante" value="<?php echo $fabricante ?>"></td></tr>
    <tr><td><label>Imagem:</label></td>
    <td><img src="<?php echo $imagem_arq ?>"></td></tr>
    <tr><td><input type="submit" value="Deletar" /></td>
    </table>
  </form>
  </div>
  </main>
  <?php include_once("footer.html") ?>
  </body>
</html>

<?php  
  mysqli_free_result($resultado);
  mysqli_close($conn);
?>
