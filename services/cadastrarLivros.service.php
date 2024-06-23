<style>
  a {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
            text-decoration: none;
            text-align: center;
            font-size: 16px;
        }
</style>

<?php
    require("conecta.service.php");

    $autor =  $_POST['nomeAutor'];
    $paginas = $_POST['numeroPaginas'];
    $faixa = $_POST['faixaEtaria'];
    $categoria = $_POST['categoria'];
    $situacao = $_POST['statusLivro'];
    if (isset($_GET['id']) && $_GET['id'] != 0) {
      $id = $_GET['id'];
      $mensagem = "Registro Alterado com Sucesso";
      $sql = "UPDATE livros 
        SET autor = '$autor', paginas = '$paginas', faixa = '$faixa', categoria = '$categoria', situacao = '$situacao'
        WHERE id = $id";
    } else {
      $nome = $_POST['nomeLivro'];
      $mensagem = "Registro Inserido com Sucesso";
      $sql = "INSERT INTO livros (nome, autor, paginas, faixa, categoria, situacao)
      VALUES ('$nome', '$autor', '$paginas', '$faixa', '$categoria', '$situacao')";
    }

    if ($conn->query($sql) === TRUE) {
      echo "<center><h1>$mensagem</h1>";
      echo "<a type='button' href='../index.html'>Voltar</a></center>";
    } else {
      echo "<h3>OCORREU UM ERRO: </h3>: " . $sql . "<br>" . $conn->error;
    }
?>