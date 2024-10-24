<!doctype html>
<html lang="fr">
<body>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulate</title>
</head>
<?php
try {
    global$conn;
    require "db.php";
    $sql = "INSERT INTO users (nom, prenom,email ,date_naissance, password) VALUES (:nom, :prenom, :email,:date_naissance, :password)";
    $requete = $conn->prepare($sql);
    $requete->bindValue(':nom', $_POST['nom']);
    $requete->bindValue(':prenom', $_POST['prenom']);
    $requete->bindValue(':email', $_POST['email']);
    $requete->bindValue(':date_naissance', $_POST['date_naissance']);
    $requete->bindValue(':password', $_POST['password']);
    if ($requete->execute()) {
        print("Votre compte a bien été crée");
    } else {
        print("Erreur lors de la création du compte");
    }
} catch (PDOException $e) {
    print("Erreur de connexion à la base de données: " . $e->getMessage());

}
?>
</body>
</html>