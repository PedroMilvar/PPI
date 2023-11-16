<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form action="" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required/><br><br>
        
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required/><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required/><br><br>

        <input type="submit" value="Cadastrar"/>
        <button onclick="location.href='login.php'">Voltar para página de Login</button>

    </form>

    <?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "conexao.php";
    require_once "UsuarioEntidade.php";

    $conn = new Conexao();

    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];

    // Verifica se o CPF já está cadastrado
    $sql_verificar = "SELECT cpf FROM usuarios WHERE cpf = ?";
    $stmt_verificar = $conn->conexao->prepare($sql_verificar);
    $stmt_verificar->bindParam(1, $cpf);
    $stmt_verificar->execute();
    

    if ($stmt_verificar->rowCount() > 0) {
        echo "CPF já cadastrado. Escolha outro CPF.";
    } else {
        // Insere o novo usuário no banco de dados
        $sql_cadastrar = "INSERT INTO usuarios (nome, cpf, senha) VALUES (?, ?, ?)";
        $stmt_cadastrar = $conn->conexao->prepare($sql_cadastrar);

        #$senha_hash = password_hash($_POST["senha"], PASSWORD_DEFAULT);

        $stmt_cadastrar->bindParam(1, $nome);
        $stmt_cadastrar->bindParam(2, $cpf);
        $stmt_cadastrar->bindParam(3, $senha);

        if ($stmt_cadastrar->execute()) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário.";
        }
    }
}
?>

</body>
</html>