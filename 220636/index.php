<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inde.css">
    <title>Gestion de Stock</title>
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
            <h1>GESTION DE STOCK</h1>
            <?php
            include('connexion.php');

            function nombreCategorie(PDO $db) {
                $sqlQuery = $db->query("SELECT COUNT(*) FROM categorie");
                return $sqlQuery->fetchColumn();
            }

            function nombreProduit(PDO $db) {
                $sqlQuery = $db->query("SELECT COUNT(*) FROM produits");
                return $sqlQuery->fetchColumn();
            }
            ?>
            <a href='categorie.php' class="category"><p>CATEGORIES: <?php echo nombreCategorie($db); ?></p></a>
            <a href='produit.php' class="produit"><p >Produits: <?php echo nombreProduit($db); ?></p></a>
        </div>
    </div>
</body>
</html>
