<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
          type="text/css"
          href="style.css" />
    <title>S’inscrire sur notre site</title>
</head>
    
<body>
<form method="post" action="">
<div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="col-5" >
            <h2>S’inscrire</h2><br><br>
            <div class="form-group mb-3">
                <input type="name" name="nom" id="nom" placeholder="Nom" class="form-control">
            </div>
            <div class="form-group mb-3">
                <input type="name" name="prenom" id="prenom" placeholder="Prénom" class="form-control">
            </div>
            <div class="form-group mb-3">
                <input type="date" name="date_naissance" id="date_naissance" placeholder="Date de naissance" class="form-control">
            </div>

            <div class="form-group mb-3">
                <input type="email" name="email" id="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group mb-3">
                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-dark">Inscription</button>
            </div>
        </div>
    </div>
</div>
</form>
</body>
</html>

<?php
require "db.php";
if (isset($_POST['nom']) && $_POST['nom'] != '' && isset($_POST['prenom']) && $_POST['prenom'] != '' &&isset($_POST['email']) && $_POST['email'] != '' && isset($_POST['date_naissance']) && $_POST['date_naissance'] != '' && isset($_POST['password']) && $_POST['password'] != '') {
    try {
        $sql = "INSERT INTO users (nom, prenom,email ,date_naissance, password) VALUES (:nom, :prenom, :email,:date_naissance, :password)";
        if (isset($conn)) {
            $requete = $conn->prepare($sql);
            $requete->bindValue(':nom', $_POST['nom']);
            $requete->bindValue(':prenom', $_POST['prenom']);
            $requete->bindValue(':email', $_POST['email']);
            $requete->bindValue(':date_naissance', $_POST['date_naissance']);
            $requete->bindValue(':password', $_POST['password']);
            if ($requete->execute()) {
                echo("Your account has been created");
            } else {
                echo("Account creation error");
            }
        }
    } catch (PDOException $e) {
        echo("Database connection error: " . $e->getMessage());
    }
}
?>
