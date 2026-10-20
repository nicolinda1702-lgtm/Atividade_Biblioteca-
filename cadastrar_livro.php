<?php

// Protege a página: só usuário logado podem cadastrar livros
include("verificar_sessao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro - Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Cadastrar Livro</h1>
        <p class="subtitulo">Preencha os dados do novo livro.</p>

        <!-- Formulário envia os dados para salvar_livro.php -->
        <form action="salvar_livro.php" method="post">
            <div class="form-group">
                <label for="Titilo">Título</label>
                <input type="text" id="titulo" name="titulo" placeholder="Digite o título do livro" required>
            </div>

            <div class="form-group">
                <label for="autor">Autor</label>
                <input type="text" id="autor" name="autor" placeholder="Digite o autor do livro" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <!-- Select permite escolher entre opções pré-definidas -->
                <select name="status" id="status" required>
                    <option value="Disponível">Disponível</option>
                    <option value="Emprestado">Emprestado</option>
                </select>
            </div>

            <button type="submit" class="btn btn-block btn-sucesso">
                Salvar Livro
            </button>
        </form>

        <!-- Botão de volta par4a o painel principal -->
        <a href="painel.php" class="btn btn-voltar">
            Voltar para o Painel.
        </a>
    </div>
</body>

</html>