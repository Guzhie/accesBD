<?php
session_start(); // Iniciar a sessão

// Verificar se a sessão do usuário existe
if (!isset($_SESSION['usuario'])) {
    // Se a sessão não existir, redirecionar para a página de login
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Menu de Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Menu de Produtos</h1>

    <nav class="nav">
        <ul>
            <li><a href="criar.php">Criar</a></li>
            <li><a href="consult_alterar.php">Alterar</a></li>
            <li><a href="listar.php">Listar</a></li>
            <li><a href="consultar.php">Consultar</a></li>
            <li><a href="excluir.php">Exclusão</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</body>

</html>