<?php
    include('conn.php');

    $id = $_GET['id'];
    $stmt = $pdo->prepare('DELETE FROM tbagenda WHERE id = ?');
    $stmt->execute([$id]);

    header('Location: acesso_completo.php');
?>