<?php
    session_start();
    include('../db.php');
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = $conn->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            $erreur_form = '<p class="text-danger">L\'adresse ou le mot de passe est incorrect</p>';
        } else {
            if (password_verify($password, $result['password'])) {
                $_SESSION['user_id'] = $result['id'];
                header("Location: accueil.php");
            } else {
                $erreur_form = '<p class="text-danger">L\'adresse ou le mot de passe est incorrect</p>';
            }
        }
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
<form action="connexion.php" method="POST" class="position-absolute top-50 start-50 translate-middle bg-warning p-5 rounded">
  <div class="mb-3">
    <label for="email" class="form-label text-light">Email</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label text-light">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="text-center">
  <button type="submit" class="btn bg-primary text-light my-1" name="login">Envoyer</button>
  <?php if(isset($erreur_form)) { echo $erreur_form;}?>
  </div>
</form>
</html>