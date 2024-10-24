<?php
require __DIR__. '/db.php';

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

?>