<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo ao seu Dashboard</h1>
    <p>Olá, <?php echo htmlspecialchars($_SESSION['email']); ?>!</p>
    <a href="cruds/logout.php">Sair</a>
</body>
</html>
