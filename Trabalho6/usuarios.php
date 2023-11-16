<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Usuários</title>

    <!-- Adicione os links para os estilos do Bootstrap e DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <p><a href="cadastro.php">Retornar Cadastro</a></p>
        <h2>Lista de Usuários</h2>

        <?php
        session_start();

        if (isset($_SESSION["login"]) && $_SESSION["login"] == "1") {
            require_once "conexao.php";

            $conn = new Conexao();

            $sql = "SELECT nome, cpf FROM usuarios";
            $stmt = $conn->conexao->prepare($sql);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($usuarios) {
                echo '<table id="tabelaUsuarios" class="table table-striped table-bordered" style="width:100%">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Nome</th>';
                echo '<th>CPF</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                foreach ($usuarios as $usuario) {
                    echo '<tr>';
                    echo '<td>' . $usuario['nome'] . '</td>';
                    echo '<td>' . $usuario['cpf'] . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>Nenhum usuário encontrado.</p>';
            }
        } else {
            echo '<p>Usuário não autenticado. Faça login <a href="login.php">aqui</a>.</p>';
        }
        ?>

    </div>

    <!-- Adicione os scripts do Bootstrap e DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabelaUsuarios').DataTable();
        });
    </script>
</body>
</html>