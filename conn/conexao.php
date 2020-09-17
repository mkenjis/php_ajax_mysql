<?php
  $server = "db";
  $user   = "curso";
  $pwd    = "123456";
  $db     = "curso";

  $conn   = mysqli_connect($server, $user, $pwd, $db);

  if (mysqli_connect_errno()) {
    die("Connection failed. " . (mysqli_connect_errno()));
  }
?>
