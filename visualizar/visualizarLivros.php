<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Livros</title>
    <link rel="stylesheet" type="text/css" href="visualizarLivros.css" media="screen">
</head>
<body>
    <div class="container">
        <h1>Livros Cadastrados</h1>
        <table>
            <thead>
                <tr>
                    <th>Livro</th>
                    <th>Autor</th>
                    <th>Número de Páginas</th>
                    <th>Faixa Etária</th>
                    <th>Categoria</th>
                    <th>Situação</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php include('../services/consultarLivros.service.php') ?>
            </tbody>
        </table>
        <a class="btnvoltar" type="button" href='../index.html'>Voltar</a>
    </div>
</body>
</html>
