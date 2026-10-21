<?php

// excluir_livro.php
// Remove um livro do banco de dados pelo ID.
// Conceito: $_GET, MySQL, DELETE ( D DO CRUD)

// Protege a página: só usuário podem excluir livros
include("verificar_sessao.php");

// Inclui a conexão com o banco de dados.
include("conexao.php");

// Recebe o ID do livro pela URL (ex: excluir_livro.php?id=3)
$id = $_GET['id'];

// Monta o comando SQL DELETE para remover o livro 
$sql = "DELETE FROM livros WHERE id = $id";

// Executa o DELETE no banco de dados
mysqli_query($conexao, $sql);

// Redireciona para listagem de livro após a exclusão.
header("Location: listar_livro.php");
exit();