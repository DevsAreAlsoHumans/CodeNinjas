
<?php      
    define('USER', 'root');
    define('PASSWORD', '');
    define('HOST', 'localhost');
    define('DATABASE', 'code_ninjas');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }

    $email = $_POST['email'];  
    $password = $_POST['password'];  
  
    $email = stripcslashes($email);  
    $password = stripcslashes($password);  
    $email = mysqli_real_escape_string($con, $email);  
    $password = mysqli_real_escape_string($con, $password);  
  
    $sql = "select * from users where email = '$email' and password = '$password'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
      
    if($count == 1){  
        echo "<h1><center>Connexion réussie.</center></h1>";  
    }  
    else{  
        echo "<h1> Connexion refusée. Mot de passe ou email invalide.</h1>";  
    }     
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="connexion.css">
    <title>Connexion</title>
</head>
<form class="position-absolute top-50 start-50 translate-middle bg-warning p-5 rounded">
  <div class="mb-3">
    <label for="email" class="form-label text-light">Email</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label text-light">Mot de passe</label>
    <input type="password" class="form-control" id="password">
  </div>
  <div class="text-center">
  <button type="submit" class="btn bg-primary text-light my-1">Envoyer</button>
  </div>
</form>
</html>