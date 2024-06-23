<?php
require("../services/conecta.service.php");
include '../enum/situacao.enum.php';

if (isset($_GET['excluido']) && $_GET['excluido'] == 1) {
    echo "<p style='color: green;'>Livro excluído com sucesso!</p>";
}

$dados_select = mysqli_query($conn, "SELECT ID, NOME, AUTOR, PAGINAS, FAIXA, CATEGORIA, SITUACAO FROM LIVROS");
if ($dados_select->num_rows > 0) {
    while($row = $dados_select->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["NOME"] . "</td>
                <td>" . $row["AUTOR"] . "</td>
                <td>" . $row["PAGINAS"] . "</td>
                <td>" . $row["FAIXA"] . "</td>
                <td>" . $row["CATEGORIA"] . "</td>
                <td>" . $row["SITUACAO"] . "</td>
                <td class='action'> 
                    <a href='../cadastro/cadastroLivros.php?id=" . $row["ID"] ."'>&#x270E;</a> 
                    <a href='../services/excluirLivro.service.php?id=" . $row["ID"] ."'>&#10006;</a> 
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>Nenhum livro encontrado</td></tr>";
}
?>