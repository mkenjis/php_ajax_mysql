<?php
  session_start();
  if (!isset($_SESSION["sessao"])) {
    header("location: login1.php");
  }
?>
