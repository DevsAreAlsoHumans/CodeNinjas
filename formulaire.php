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
global$conn;
require 'config.inc.php';
if (isset($_POST['nom']) && $_POST['nom'] != '' && isset($_POST['prenom']) && $_POST['prenom'] != '' && isset($_POST['email']) && $_POST['email'] != '' && isset($_POST['password']) && $_POST['password'] != '') {
    try {
        $db = new PDO($conn);
        $requete = $db->prepare();
        $requete->bindValue(':nom', $_POST['nom']);
        $requete->bindValue(':prenom', $_POST['prenom']);
        $requete->bindValue(':prenom', $_POST['prenom']);
        $requete->bindValue(':email', $_POST['email']);
        $requete->bindValue(':password', $_POST['password']);
        if ($requete->execute()) {
            print("Votre compte a bien été crée");
        } else {
            print("Erreur lors de la création du compte");
        }
    } catch (PDOException $e) {
        print("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}
?>
</body>
</html>