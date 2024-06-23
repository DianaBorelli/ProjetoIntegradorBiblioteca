<?php
include '../enum/situacao.enum.php';
include '../enum/categoria.enum.php';
include '../enum/faixa-etaria.enum.php';
include '../services/utils.service.php';

$estaEditando = false;
$idEditando = 0;
if (isset($_GET['id'])) {
    $idEditando = $_GET['id'];
    require("../services/conecta.service.php");

    $sql = "SELECT * FROM livros WHERE id = $idEditando";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $livro = $resultado->fetch_assoc();
        $id = $livro['id'];
        $nome = $livro['nome'];
        $autor = $livro['autor'];
        $paginas = $livro['paginas'];
        $faixa = $livro['faixa'];
        $categoria = $livro['categoria'];
        $situacao = $livro['situacao'];
        $estaEditando = true;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="cadastroLivros.css" media="screen">
    <title>Biblioteca</title>
</head>
<body>
    <div class="container">
        <h1><?php 
            if($estaEditando) {
                echo 'Edição de Livro';
            } else {
                echo 'Cadastro de Livros';
            }
        ?></h1>
        
        <form <?php echo 'action="../services/cadastrarLivros.service.php?id=' . $idEditando . '" method="POST"' ?>>
            <div class="form-group">
                <label for="nomeLivro">Nome:</label>
                <input type="text" id="nomeLivro" name="nomeLivro" 
                <?php 
                    if($estaEditando) {
                        echo 'value="' . $nome . '" disabled';
                    }
                ?>
                required>
            </div>
            <div class="form-group">
                <label for="nomeAutor">Autor:</label>
                <input type="text" id="nomeAutor" name="nomeAutor" required
                <?php 
                    if($estaEditando) {
                        echo 'value="' . $autor . '"';
                    }
                ?>
                >
            </div>
            <div class="form-group">
                <label for="numeroPaginas">Número de Páginas:</label>
                <input type="number" id="numeroPaginas" name="numeroPaginas" required
                <?php 
                    if($estaEditando) {
                        echo 'value="' . $paginas . '"';
                    }
                ?>
                >
            </div>
            <div class="form-group">
                <label for="faixaEtaria">Faixa Etária Recomendada:</label>
                <select id="faixaEtaria" name="faixaEtaria" required>
                    <option <?php if(!$estaEditando) echo 'selected' ?> disabled value="">Selecione</option>
                    <?php getOption($estaEditando, FaixaEtaria::Livre->value, $faixa ?? '') ?>
                    <?php getOption($estaEditando, FaixaEtaria::Faixa1a12->value, $faixa ?? '') ?>
                    <?php getOption($estaEditando, FaixaEtaria::Faixa13a18->value, $faixa ?? '') ?>
                    <?php getOption($estaEditando, FaixaEtaria::Faixa19a30->value, $faixa ?? '') ?>
                    <?php getOption($estaEditando, FaixaEtaria::Faixa31a59->value, $faixa ?? '') ?>
                    <?php getOption($estaEditando, FaixaEtaria::Faixa60mais->value, $faixa ?? '') ?>
                </select>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select id="categoria" name="categoria" required>
                <option <?php if(!$estaEditando) echo 'selected' ?> disabled value="">Selecione</option>
                    <?php getOption($estaEditando, Categoria::Historia->value, $categoria ?? '') ?>
                    <?php getOption($estaEditando, Categoria::Ficcao->value, $categoria ?? '') ?>
                    <?php getOption($estaEditando, Categoria::Drama->value, $categoria ?? '') ?>
                    <?php getOption($estaEditando, Categoria::Acao->value, $categoria ?? '') ?>
                    <?php getOption($estaEditando, Categoria::Ciencia->value, $categoria ?? '') ?>
                    <?php getOption($estaEditando, Categoria::Infantil->value, $categoria ?? '') ?>
                    <?php getOption($estaEditando, Categoria::Outros->value, $categoria ?? '') ?>
                </select>
            </div>
            <div class="form-group">
                <label>Situação do livro:</label>
                <div class="radio-group">
                    <label for="liberado">
                        <input type="radio" id="disponivel" name="statusLivro" value="<?php echo Situacao::Disponivel->value ?>" required
                        <?php if($estaEditando && $situacao == Situacao::Disponivel->value || !$estaEditando) echo 'checked' ?>> 
                        <p><?php echo Situacao::Disponivel->value ?></p>
                    </label>
                    <label for="alugado">
                        <input type="radio" id="alugado" name="statusLivro" value="<?php echo Situacao::Alugado->value ?>" required
                        <?php if($estaEditando && $situacao == Situacao::Alugado->value) echo 'checked' ?>> 
                        <p><?php echo Situacao::Alugado->value ?></p>
                    </label>
                </div>
            </div>
            <div class="form-group btn">
                <button type="submit">Salvar</button>
                <a type="button" 
                <?php if(!$estaEditando) echo 'href="../index.html"'; 
                    else echo 'href="../visualizar/visualizarLivros.php"' ?>
                href='../visualizar/visualizarLivros.php'
                >Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
