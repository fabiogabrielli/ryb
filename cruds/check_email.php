<?php
include "../conn.php";

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Verifica se o e-mail já está cadastrado
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo json_encode(["exists" => true]);
    } else {
        echo json_encode(["exists" => false]);
    }

    $stmt->close();
}

$conn->close();
?>
