<?php

//Verificar_sessao.php
// Arquivo incluído nas páginas restritas do sistema.
// Garante que apenas usuários logados possam acessar o conteúdo.

// Inicia a sessão do usuário (ou retoma uma sessão já existente)
session_start();

// Cabeçalhos HTTP que impendem o navegados de guardar a página em cache.
// Isso evita que usuário volte ao painel após fazer o logout.
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Verifica se a variável de sessão 'nome' existe.
// Se não existir, significa que o usuário não está logado.

if (!isset($_SESSION['nome'])) {
    // header() Redireciona o navegados para a págin.
    header("Location: login.php");
    //exit() Encerra o script para garantir que nada mais seja executado.
    exit();
}