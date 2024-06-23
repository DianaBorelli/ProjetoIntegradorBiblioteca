<?php
if (isset($_GET['id'])) {
    require("../services/conecta.service.php");

    $id = $_GET['id'];
    $sql = "DELETE FROM livros WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../visualizar/visualizarLivros.php?excluido=1");
        exit();
    } else {
        echo "Erro ao excluir livro: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID do livro não fornecido.";
}
?>