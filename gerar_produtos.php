<?php require_once("conn/conexao.php"); ?>

<?php

  $query = "select id,nome,descricao,preco_unitario,fabricante,imagem_arq from produto order by id";
  $resultado = mysqli_query($conn, $query);

  $produto = array();
  while ($linha = mysqli_fetch_array($resultado)) {  
    $produto[] = $linha;
  }

  echo json_encode($produto);

  mysqli_close($conn);
?>
