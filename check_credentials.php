<?php
require __DIR__ . '/hash_password.php';
require __DIR__ . '/db.php';
function check_credentials($email, $password)
{
    
    $hashedPassword = hash_password($password);

    $stmt = $conn->prepare("SELECT email, mot_de_passe FROM users where email = ? AND mot_de_passe = ?");
    $stmt->bind_param("s", $email);
    $stmt->bind_param("s", $hashedPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        return true;
    } else {
        return false;
    } 

}
?>