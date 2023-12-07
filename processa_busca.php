<?php
    // Conexão com o banco de dados (semelhante ao que você já tem)
    $dsn = 'mysql:host=localhost;dbname=bdlogin0911';
    $usuario = 'root';
    $senha = '';

    try {
        $pdo = new PDO($dsn, $usuario, $senha);
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recebe o nome digitado pelo usuário
        $nome = $_POST['buscarNome'];

        // Prepara a consulta para buscar a pessoa no banco de dados
        $stmt = $pdo->prepare('SELECT * FROM tbagenda WHERE nome LIKE :nome');
        $stmt->bindValue(':nome', "%$nome%"); // Usamos LIKE para buscar parcialmente

        // Executa a consulta
        $stmt->execute();

        // Exibe os resultados
        while ($pessoa = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Exibe as informações da pessoa
            echo "Nome: {$pessoa['nome']}<br>";
            echo "Telefone: {$pessoa['telefone']}<br>";
            echo "Celular: {$pessoa['celular']}<br>";
            echo "Endereço: {$pessoa['endereco']}<br>";
            echo "Email: {$pessoa['email']}<br>";
            // ... adicione outros campos conforme necessário
            echo "<hr>";
        }

        // Verifica se houve algum resultado
        if (!$stmt->rowCount()) {
            echo "Usuário não encontrado.";
        }
    }
?>