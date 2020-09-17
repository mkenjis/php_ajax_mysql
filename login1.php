<?php require_once("conn/conexao.php"); ?>

<?php
  $ja_existe = false;

  if (isset($_POST["login"])) {

    $login = $_POST["login"];
    $senha = $_POST["senha"];

    $query  = "select login,nome,senha from usuario ";
    $query .= "where login='{$login}' and senha='{$senha}'";

    $res = mysqli_query($conn,$query);
    if (! $res) {
      die("Erro na consulta ao banco");
    }

    # echo $query;
    $row = mysqli_fetch_assoc($res);
    if (!empty($row)) {
      # inicia sessao
      session_start();
      $_SESSION["sessao"] = $login;

      $login = "";
      $senha = "";
      #$ja_existe = true;

      # redireciona para pagina principal
      header("location: inicial.php");
    }
    $ja_existe = true;
  } else {
    $login = "";
    $senha = "";
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
    <form action="login1.php" method="post">
      <table style="border:1px solid gray;margin-left:auto;margin-right:auto; background-color: linen;">
      <tr><td colspan="2"><h1>Tela de Login</h1></td></tr>
      <tr><td><label>login  :</label></td>
      <td><input type="text" id="login" name="login" value="<?php echo $login ?>" placeholder="Login"></td></tr>
      <tr><td><label>senha  :</label></td>
      <td><input type="password" id="senha" name="senha"></td></tr>
      <tr><td><input type="submit" value="Login"></td></tr>
      </table>
      <p></p>
      <table style="border:0px solid gray;margin-left:auto;margin-right:auto;">
      <tr><td style="background-color:#FF0000;">
      <?php
        if ($ja_existe) {
          echo "Login/senha invalidos";
        } else {
          echo "";
        }
      ?>
      </td></tr>
      </table>
    </form> 
    </div>
    <div id="novousuario">
    Clique aqui se <a href=novousuario1.php>Novo Usuario</a></br></br>
    <a href=esqueceusenha.php>Esqueceu a Senha ?</a>
    </div>
  </main>
  <?php include_once("footer.html") ?>
</body>
</html>

<?php
  if (isset($_POST["login"])) {
    mysqli_free_result($res);
  }
  // Fechar conexao
  mysqli_close($conn);
?>
