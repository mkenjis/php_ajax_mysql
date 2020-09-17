<?php require_once("conn/conexao.php"); ?>

<?php

$ja_existe = false;

if (isset($_POST["login"])) {

  $nome  = $_POST["nome"];
  $email = $_POST["email"];
  $login = $_POST["login"];
  $senha = $_POST["senha"];

  if ($login <> "") {
 
    $query = "select login from usuario where login = '{$login}'";
#    echo $query;

    $res   = mysqli_query($conn,$query);

    $row   = mysqli_fetch_assoc($res);
#    print_r($row);

    if (empty($row)) {

      $query = "insert into usuario(nome, email, login, senha, data_cadastro) ";
      $query .= "values ('{$nome}','{$email}','{$login}','{$senha}', now())";

      # echo $query;
      $res = mysqli_query($conn,$query);

      if (! $res) {
        echo "Erro na insercao do usuario no banco";
      } else {
        header("location: login1.php");
      }
    }
    else {
      $ja_existe = true;
    }
  }
}
?>

<html>
<head>
  <title>Login</title>
  <?php include_once("header.html") ?>
</head>
<body>
  <main>
    <div id="login">
    <form action="novousuario1.php" method="post">
      <table style="border:1px solid gray;margin-left:auto;margin-right:auto; background-color: linen;">
      <tr><td colspan="2"><h1>Cadastro de Usuario</h1></td></tr>
      <tr><td><label>Nome: </label></td>
      <td><input type="text" id="nome" name="nome" placeholder="Nome"></td></tr>
      <tr><td><label>Email: </label></td>
      <td><input type="text" id="email" name="email" placeholder="Email"></td></tr>
      <tr><td><label>Login: </label></td>
      <td><input type="text" id="login" name="login" placeholder="Login"></td></tr>
      <tr><td><label>Senha: </label></td>
      <td><input type="password" id="senha" name="senha"></td></tr>
      <tr><td><input type="submit" value="Submit"></td>
      </table>
      <p>
      <?php
      if ($ja_existe) {
        echo "Login já existente";
      } else {
        echo "";
      }
      ?>
      </p>
    </form> 
    </div>
  </main>
  <?php include_once("footer.html") ?>
</body>
</html>

<?php
  if (isset($_POST["login"])) {
    mysqli_free_result($res);
  }
  mysqli_close($conexao);
?>
