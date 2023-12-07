<?php
    //Conexão com o banco de dados
    $dsn = 'mysql:host=localhost;dbname=bdlogin0911';
    $usuario = 'root';
    $senha = '';

    try {
        $pdo = new PDO($dsn, $usuario, $senha);
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }

    //Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Recebe os dados do formulário
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        //Prepara a consulta para buscar o usuário no banco de dados
        $stmt = $pdo->prepare('SELECT * FROM tbusuarios WHERE login = :login');
        $stmt->bindParam(':login', $login);
        $stmt->execute();

        //Verifica se o usuário existe e se a senha está correta
        if ($usuario = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuarioRec = $usuario['senha'];

            if ($senha==$usuarioRec) {

                session_start();
                $_SESSION['login'] = true;

                //Verifica se o tipo de usuário tem acesso completo ou restrito

                if ($usuario['tipo'] == '1') {
                    //Direciona para a página com acesso completo
                    header('Location: acesso_completo.php');
                } else {
                    //Direciona para a página com acesso restrito
                    header('Location: acesso_restrito.php');
                }
            } else {
                echo 'Senha incorreta.';
            }
        } else {
            echo 'Usuário não enconrado.';
        }
    }
?>