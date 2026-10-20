<?php

//salvar_livro.php
// Recebe os dados do formulário e insere um novo livro no banco
// Conceitos: PHP, MySQL, INSERT (CREATE DO CRUD)

// Protege a página: Só usuários logados podem salvar livros.
include("verificar_sessao.php");

// Incluir a conexão com o banco de dados (MySQL)
include ("conexao.php");

// Recebe os dados enviados pelo formulário via POST
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$status = $_POST['status'];

// Monta o comando SQL INSERT para cadastrar o livro:
$sql = "INSERT INTO livros (título, autor, status)
VALORES ('$titulo', '$autor', '$status')";
 
//Executa o INSERT no banco de dados
mysqli_query($conexao, $sql);
 
// Redirecionamento para a lista de livros após salvar
header("Location: listar_livro.php");
exit();