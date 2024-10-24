<?php
require __DIR__ . '/hash_password.php';

/**
 * Bas niveau -> directement connecté à la base
 */
function check_credentials($email, $password)
{
    
    $hashedPassword = hash_password($password);

    $querry = "SELECT email, mot_de_passe FROM users where email = {$email} AND mot_de_passe = {$hashedPassword}";

    // TODO Create connection or connect
    $conn 

    $result = $conn->query($querry);

    if ($result->num_rows == 1) {
        return true
    } else {
        return false
    } 
   
}

/** Hau niveau */
//TODO Verify user entries -> (SQL injection) replace htmlspecial
//                            -> Bads email format (regexp)
//                            -> Encrypt password ?
//TODO Check email/pass pair in db
//TODO React to check - if connected -> Return index page, else, return login page (with message1)
?>