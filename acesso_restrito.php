<?php

    //A Sessão precisa ser iniciada em cada página diferente
    if (!isset($_SESSION)) session_start();

    //Verifica se não há variaável da sessão que identifica o usuário
    if (!isset($_SESSION['login'])) {
        //Destrói a sessão por segurança
        session_destroy();
        //Redireciona o visitante de volta pro login
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso</title>
</head>
<body>
    <h1>Consulta de Clientes</h1><br>

    <form method="POST" action="processa_busca.php">
        <label for="buscarNome">Buscar Nome:</label>
        <input type="text" name="buscarNome" id="buscarNome" required>

        <button type="submit">Buscar</button><br><br>
    </form>

    <table>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Endereço</th>
            <th>E-mail</th>
        </tr>

        <?php
            include('conn.php');
            //busca todos os dados dos clientes cadastrados. query é pra fazer uma consulta com esses parametros na variável $pdo. * significa todos
            $stmt = $pdo->query('SELECT * FROM tbagenda');
            //laço de repetição para percorrer toda tabela e trazer todos os dados que encontrar
            while ($row = $stmt->fetch()) {
                echo "<tr>"; //tr cria uma linha na tabela e td cria uma coluna
                echo "<td>{$row['nome']}</td>";
                echo "<td>{$row['telefone']}</td>";
                echo "<td>{$row['celular']}</td>";
                echo "<td>{$row['endereco']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>