<?php
// salvar_usuario.php 
// Recebe os dados do formulário de cadastro e salva o usuáriono banco.
// Conceitos: POST, password-hash, MySQL, INSERT, verificação de E-mail duplicado.

//Inclui o aequivo de conexão com o banco de dados.
include('conexao.php');

// Recebe os dados enviados pelo formulário vvia metodo POST.
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

//============================================================
// VERFICAÇÃO DE E-MAIL DUPLICADO
// Antes de cadastrar, verifica se o email já existe no banco
//============================================================

//Monta a consulta SQL (SELECT) para buscar o email
$sqlVerifica = "SELECT id FROM usuarios WHERE email = '$email'";

//Executa a consulta no MySQL
$resultadoVerificar = mysqli_query($conexao, $sqlVerifica);

//Validação: myqli_num_rows() conta quantos registros foram enconrados.
if (mysqli_num_rows($resultadoVerificar) > 0) {
    //Se o email já existe, redireciona de volta ao cadastro com mensagem de erro.
    header("Location: cadastro.php?erro=email_duplicado");
    exit();
}

//==============================================================
// CRIPTOGRAFIA DA SENHA
// Nunca armazenar senhas em texto puro no banco
//==============================================================
// password_hash() gera um hash seguro da senha
// PASSWORD_DEFAULT usa um algoritmo bcrypt (padrão PHP)

$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

//==============================================================
//INSERÇÃO NO BANCO (CREATE DO CRUD)
//==============================================================

$sql = "INSERT INTO usuarios (nome, email, senha) VALUES
('$nome', '$email', '$senhaCriptografada')";

// Executa o INSERT no banco de dados
mysqli_query($conexao, $sql);

//Redireciona o usuario para a página de login após um cadastro
// bem-sucedido.
header("Location: login.php");
exit();
