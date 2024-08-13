<?php
session_start(); // Inicia a sessão

include "../conn.php";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepara e executa a consulta
    $stmt = $conn->prepare("SELECT user_id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Login bem-sucedido, armazena informações na sessão e redireciona
            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $email;
            header("Location: ../dashboard.php?message=success");
            exit();
        } else {
            // Senha incorreta
            header("Location: ../login.php?error=wrong_password");
            exit();
        }
    } else {
        // Usuário não encontrado
        header("Location: ../login.php?error=user_not_found");
        exit();
    }
}

$conn->close();
?>
