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

//Check if the mail is valid
function is_valid($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

//Check if the mail exist in the db
function mail_exist($email, $db, $tablename) {
    $sql = "SELECT * FROM ". $tablename. "WHERE email='". $email."'";
    $results = $db->query($sql);
    $row = $results->fetch_assoc();
    
    return (is_array($row) && count($row)>0);
    
    if(!is_valid($email)):
        $result['has_error'] = 1;
        $result['response'] = "Email address is invalid.";
    elseif(mail_exist($db, "employees", $email)):
        $result['has_error'] = 1;
        $result['response'] = "Email address is already exists.";
    endif;
}

//checks if password match. Returns true if password match
function check_password($user_id, $password) {

    $hashedPassword = hash_password($password);

    $stmt = $conn->prepare("SELECT mot_de_passe FROM users where id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "bad user_id $user_id";
        return false;
    } else {
        $row = $result->fetch_assoc();
        if($row["mot_de_passe"] == $hashedPassword) {
            return true;
        } else {
            return false;
        }
    } 
}
?>
