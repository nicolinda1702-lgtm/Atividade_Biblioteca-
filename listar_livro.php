<?php
 
//listar_livro.php
// Exibe todos os livros cadastrados em uma tabela.
// Conceitos: MySQL, SELECT (READ DO CRUD), loop While.
 
// Protege a página: só usuários logados podem listar livros.
include("verificar_sessao.php");
 
//Inclui a conexão do banco de dados.
include("conexao.php");
 
// Consulta SQL que busca todos os livros da tabela.
$sql = "SELECT * FROM livros";
 
// Executa a consulta e guardar o resultado
$resultado = mysqli_query($conexao, $sql);
 
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Livro - Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>
 
<body>
    <!-- Container mais largo para acomodar a tabela -->
     <div class="container container-largo">
        <h1>Listagem de Livros</h1>
        <p class="subtitulo">
            Todos os livros scadastrados no sistema.
        </p>
 
        <!-- Tabela estilizada com os dados dos livros -->
         <table class="tabela-livros">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
            <?php
            // Loop While percorre cada linha retornada
            // Pela consulta SQL.
            while ($row = mysqli_fetch_array($resultado)) {
            ?>
            <tr>
                <td><?php echo $livro['id']; ?></td>
                <td><?php echo $livro['título']; ?></td>
                <td><?php echo $livro['autor']; ?></td>
                <td><?php echo $livro['status']; ?></td>
                <td><?php echo $livro['ações']; ?></td>
            </tr>
         </table>
     </div>
</body>
</html>
 