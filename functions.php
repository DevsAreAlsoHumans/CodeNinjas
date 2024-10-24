<?php
require __DIR__ . '/db.php';

//Checks if the user with the email and password exists in the DB, returns TRUE or FALSE
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

//hashes the password 
function hash_password($input)
{
    return $hashedPassword = password_hash($input, PASSWORD_BCRYPT);
}
?>