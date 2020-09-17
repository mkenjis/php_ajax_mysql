<?php
  # fecha sessao
  session_start();
  unset($_SESSION["sessao"]);

  # move para pagina login
  header("location: login1.php");
?>
