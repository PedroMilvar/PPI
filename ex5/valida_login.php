<?php
session_start();

// Dados fixos para validação (substitua pelos seus dados reais)
$usuarioFixo = "usu";
$senhaFixa = "123";

// Obtenha os dados do formulário
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

// Validação
if ($usuario === $usuarioFixo && $senha === $senhaFixa) {
    // Usuário autenticado com sucesso
    $_SESSION['usuario'] = $usuario;
    header("Location: home.php");
    exit();
} else {
    // Usuário não encontrado, redirecione de volta para a página de login
    header("Location: index.php");
    exit();
}
?>
