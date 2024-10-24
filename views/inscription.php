<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>S’inscrire sur notre site</title>
</head>
<body>
<form method="post" action="">
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2>S’inscrire</h2><br><br>
                <div class="form-group mb-3">
                    <input type="text" name="nom" id="nom" placeholder="Nom" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="prenom" id="prenom" placeholder="Prénom" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <input type="date" name="date_naissance" id="date_naissance" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <input type="email" name="email" id="email" placeholder="Email" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password" id="password" placeholder="Mot de passe" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-dark">Inscription</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
require "../db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $date_naissance = $_POST['date_naissance'];
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (isset($conn)) {
        // Check if email already exists
        $checkEmail = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $checkEmail->bindValue(':email', $email);
        $checkEmail->execute();

        if ($checkEmail->rowCount() > 0) {
            echo("Cet e-mail est déjà utilisé.");
        } else {
            try {
                $sql = "INSERT INTO users (nom, prenom, email, date_naissance, password) VALUES (:nom, :prenom, :email, :date_naissance, :password)";
                $requete = $conn->prepare($sql);
                $requete->bindValue(':nom', $nom);
                $requete->bindValue(':prenom', $prenom);
                $requete->bindValue(':email', $email);
                $requete->bindValue(':date_naissance', $date_naissance);
                $requete->bindValue(':password', $password);

                if ($requete->execute()) {
                    echo("Votre compte a été créé.");
                } else {
                    echo("Erreur lors de la création du compte.");
                }
            } catch (PDOException $e) {
                echo("Erreur de connexion à la base de données: " . $e->getMessage());
            }
        }
    }
}
?>
</body>
</html>
