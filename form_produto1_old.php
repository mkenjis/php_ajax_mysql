<?php require_once("sessao.php") ?>

<?php require_once("conn/conexao.php"); ?>

<?php
  $id = $_GET["id"];
#  $id = '10';
  
  $query = "select id,nome,descricao,preco_unitario,fabricante,imagem_arq ";
  $query .= "from produto where id = {$id}";

  $resultado = mysqli_query($conn, $query);
  
  $linha = mysqli_fetch_array($resultado);

  $nome = $linha['nome'];
  $descricao = $linha['descricao'];
  $preco_unitario = $linha['preco_unitario'];
  $fabricante = $linha['fabricante'];
  $imagem_arq = $linha['imagem_arq'];

?>
<html>
  <head>
    <title>Form</title>
    <?php include_once('header.html') ?>
  </head>
  <body>
  <main>
  <div id="login">
  <form method="post" action="salvar_produto1.php" enctype="multipart/form-data">
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
    <td><input type="file" id="imagem_arq" name="imagem_arq" value="<?php echo $imagem_arq ?>"></td></tr>
    <tr><td><img src="<?php echo $imagem_arq ?>"></td></tr>
    <tr><td><input type="submit" value="Salvar" /></td>
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
