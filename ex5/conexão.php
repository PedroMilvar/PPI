<?php
    session_start();
    $conexao = new mysqli("localhost", "root", "admin", "meubanco", 3306);

    if ($conexao){
        echo "Conectei no BD!";
    } else {
        echo "Ops, deu erro! " .mysqli_connect_error();
    }

    $sql = "INSERT INTO usuarios(cpf, nome, senha)
            VALUES ($cpf, $nome, $senha);
    ";
    
    if (mysqli_query($conexao, $sql)) {
        echo "Nova tupla inserida com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conexao);
    }
?>