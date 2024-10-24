<?php
    include("db.php");
    
    //Checks if the user with the email exists in the DB, returns TRUE or FALSE
    function check_credentials($email)
    {
        $stmt = $GLOBALS[$conn]->prepare("SELECT email, mot_de_passe FROM users where email = ?");
        $stmt->bind_param("s", $email);
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
function check_password($email, $password) {

    $hashedPassword = hash_password($password);

    $stmt = $GLOBALS[$conn]->prepare("SELECT mot_de_passe FROM users where email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "bad email $email";
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
