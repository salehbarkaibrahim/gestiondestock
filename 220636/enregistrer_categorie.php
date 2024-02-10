<?php
if (isset($_POST['submit'])) {
    $nom_categorie = $_POST['nom_categorie'];
    $description = $_POST['description'];

    include('connexion.php');
    $sqlQuery = 'INSERT INTO categorie(nom_categorie, description) VALUES (:nom_categorie, :description)';
    $inser = $db->prepare($sqlQuery);

    $success = $inser->execute([
        'nom_categorie' => $nom_categorie,
        'description' => $description
    ]);

    $inser->closeCursor();

    if ($success) {
        echo "<script>
                alert('Enregistrement réussi');
                window.location.href = 'enregistrer_categorie.php';
              </script>";
    } else {
        echo "<script>
                alert('Erreur lors de l\'enregistrement');
              </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enregistrer une catégorie</title>
    <link rel="stylesheet" href="css/enregistrer_produit.css">
</head>
<body>
<div class="container">
        <div class="sidebar">
            <h2>Menu</h2>
            <div class="links">
                <a href='enregistrer_categorie.php'>Ajouter Une Catégorie</a>
                <a href='enregistrer_produit.php'>Ajouter un produit</a>
                <a href='produit.php'>Afficher la liste des produits</a>
                <a href='categorie.php'>Afficher la liste de categorie</a>
            </div>
        </div>
        <div class="content">
    <h1>Enregistrer une nouvelle catégorie</h1>
    <form action="enregistrer_categorie.php" method="POST">
        <label for="nom_categorie">Nom de la catégorie:</label>
        <input type="text" name="nom_categorie" required>
        <label for="description">Description de la catégorie:</label>
        <textarea name="description" required></textarea>
        <button type="submit" name="submit">Enregistrer</button>
    </form>
    <a href="index.php">Retour à l'accueil</a>
    </div>
</body>
</html>
