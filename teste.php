<?php
  $i = 2 ;
  if ($i == 0) {
    header("location: header.html");
    return;
  }
 
  if ($i == 1) {
    die("deu erro");
  }
 
  echo "passei do if";
 
?>
