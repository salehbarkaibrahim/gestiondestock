
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enregistrer un produit</title>
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
    <h1>Enregistrer un nouveau produit</h1>
    <form action="scriptproduit.php" method="POST">
        <label for="nom_produit">Nom du produit:</label>
        <input type="text" name="nom_produit" required>
        <label for="categorie_id">ID de la catégorie correspondante:</label>
        <input type="number" name="categorie_id" required>
        <label for="qte">Quantité disponible:</label>
        <input type="number" name="qte" required>
        <label for="prix_unitaire">Prix unitaire:</label>
        <input type="number" name="prix_unitaire" required>
        <label for="description">Description du produit:</label>
        <textarea name="description" required></textarea>
        <button type="submit" name="submit">Enregistrer</button>
    </form>
    <a href="index.php">Retour à l'accueil</a>
    </div>
   
    </div>
</body>
</html>