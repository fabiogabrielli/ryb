<?php

include "../conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $data_cadastro = date('Y-m-d H:i:s');

    // Prepara e executa a inserção
    $stmt = $conn->prepare("INSERT INTO users (nome, email, password, data_cadastro) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $email, $password, $data_cadastro);

    if ($stmt->execute()) {
        // Redireciona para a página de login com mensagem de sucesso
        header("Location: ../login.php?message=success");
        exit();
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>