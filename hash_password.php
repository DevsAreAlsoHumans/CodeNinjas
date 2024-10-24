<?php
function hash_password($input)
{
    return $hashedPassword = password_hash($input, PASSWORD_BCRYPT);
}
?>