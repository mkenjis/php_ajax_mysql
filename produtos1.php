<?php require_once("sessao.php"); 
?>

<html>
<head>
  <title>Lista de Produtos</title>
  <?php include_once("header.html"); ?>
</head>

<body>
  <script src="jquery.js"></script>
  <script>
    function carregarDados() {    
      $.getJSON('gerar_produtos.php', function(data) {
        var elemento;
        elemento = "<table border='1'>";
        elemento += "<tr><td>ID</td>";
        elemento += "<td>Nome</td>";
        elemento += "<td>Descricao</td>";
        elemento += "<td>Preco Unit</td>";
        elemento += "<td>Fabricante</td>";
        elemento += "<td>Imagem</td></tr>";

        $.each(data, function(i,valor) {
          elemento += "<tr>"
          elemento += "<td>" + valor.id + "</td>"
          elemento += "<td>" + valor.nome + "</td>"
          elemento += "<td>" + valor.descricao + "</td>"
          elemento += "<td>" + valor.preco_unitario + "</td>"
          elemento += "<td>" + valor.fabricante + "</td>"
          elemento += "<td><img src='" + valor.imagem_arq + "'></td>"
          elemento += "<td><a href='form_produto2.php?id=" + valor.id + "'>Editar</a> |  <a href='deletar_produto1.php?id=" + valor.id + "'>Deletar</a></td>"
          elemento += "</tr>"
        });

        elemento += "</table>";
        // console.log(data);
        $('div#lista_produtos').html(elemento);
      });
    };

    carregarDados();
  </script>

<main>
<div>
<h1>Lista de Produtos</h1>
</div>
<button type="button" onclick="carregarDados()">Refresh</button>
<div id="lista_produtos"></div>
<p>
<a href="form_produto2.php">Novo</a>
<a href="inicial.php">Sair</a>
</p>
</main>
<?php include_once("footer.html") ?>
</body>

</html>
