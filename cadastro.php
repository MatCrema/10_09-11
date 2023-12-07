<?php
    include('conn.php');

    //comando if para evitar que de erro assim que abrir a página.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $celular = $_POST['celular'];
        $endereco = $_POST['endereco'];
        $email = $_POST['email'];

        //adiciona os valores do html na variável em dois campos. ? números de informações que você está inserindo nos campos indicados
        $stmt = $pdo->prepare('INSERT INTO tbagenda(nome, telefone, celular, endereco, email) VALUES (?, ?, ?, ?, ?)');
        //adiciona os valores na tabela
        $stmt->execute([$nome, $telefone, $celular, $endereco, $email]);

        //volta para tela index.php
        header('Location: acesso_completo.php');        
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Cliente</title>
</head>
<body>
    <h2>Adicionar Cliente</h2>
    <form method="POST">
        <label for="nome">Nome do Cliente:</label>
        <input type="text" name="nome" required><br>

        <label for="telefone">Telefone do Cliente:</label>
        <input type="text" name="telefone" required><br>

        <label for="celular">Celular do Cliente:</label>
        <input type="text" name="celular" required><br>

        <label for="endereco">Endereço do Cliente:</label>
        <input type="text" name="endereco" required><br>

        <label for="email">Email do Cliente:</label>
        <input type="text" name="email" required><br>

        <input type="submit" value="Adicionar">
    </form>
</body>
</html>