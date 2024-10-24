<?php
require __DIR__ . '/hash_password.php';

function check_credentials($conn, $email, $password)
{
    
    $hashedPassword = hash_password($password);

    $querry = "SELECT email, mot_de_passe FROM users where email = {$email} AND mot_de_passe = {$hashedPassword}";

    $result = $conn->query($querry);

    if ($result->num_rows == 1) {
        return true;
    } else {
        return false;
    } 
   
}

?>