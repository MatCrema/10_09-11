<?php
    include('conn.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $celular = $_POST['celular'];
        $endereco = $_POST['endereco'];
        $email = $_POST['email'];

        $stmt = $pdo->prepare('UPDATE tbagenda SET nome = ?, telefone = ?, celular = ?, endereco = ?, email = ? WHERE id = ?');
        $stmt->execute([$nome, $telefone, $celular, $endereco, $email, $id]);

        header('Location: acesso_completo.php');
    }

    $id = $_GET['id'];
    $stmt = $pdo->prepare('SELECT * FROM tbagenda WHERE id = ?');
    $stmt->execute([$id]);
    $cliente = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>
<body>
    <h2>Editar Cliente</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">

        <label for="nome">Nome do Cliente:</label>
        <input type="text" name="nome" value="<?php echo $cliente['nome']; ?>" required><br>

        <label for="telefone">Telefone do Cliente:</label>
        <input type="text" name="telefone" value="<?php echo $cliente['telefone']; ?>" required><br>

        <label for="celular">Celular do Cliente:</label>
        <input type="text" name="celular" value="<?php echo $cliente['celular']; ?>" required><br>

        <label for="endereco">Endereço do Cliente:</label>
        <input type="text" name="endereco" value="<?php echo $cliente['endereco']; ?>" required><br>

        <label for="email">Email do Cliente:</label>
        <input type="text" name="email" value="<?php echo $cliente['email']; ?>" required><br>

        <input type="submit" value="Editar">
    </form>
</body>
</html>