<?php
include('connexion.php');

class Categorie
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function obtenirListeCategories()
    {
        $sql = "SELECT * FROM categorie ORDER BY idcategorie";
        return $this->db->query($sql)->fetchAll();
    }

    public function obtenirTailleCategories()
    {
        $sqlQuery = 'SELECT * FROM categorie';
        $stmt = $this->db->prepare($sqlQuery);
        $stmt->execute();
        $tabAss = $stmt->fetchAll();
        return count($tabAss);
    }
}

$categorieManager = new Categorie($db);
$liste = $categorieManager->obtenirListeCategories();
$taille = $categorieManager->obtenirTailleCategories();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/produit.css"> 
    <title>Liste des Catégories</title>
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
    <form action=<?php echo "'scriptcategorie.php?nb=" . $taille . "'"; ?> method="post">
        <table align="center" border="1">
            
            <tr class="entete">
                <td>Nom de Catégorie</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
            <?php
            $i = 0;
            foreach ($liste as $categorie) {
                $i++;
                echo "<tr>";
                echo "<td><input size='20' readonly value='" . $categorie['nom_categorie'] . "' name='nom_categorie" . $i . "'</td>";
                echo "<td><input size='20' readonly value='" . $categorie['description'] . "' name='description" . $i . "'</td>";
                echo "<td>
                        <button type='submit' name='sup' value='" . $categorie['idcategorie'] . "'>Supprimer</button>
                        <button type='submit' name='mod" . $i . "' value='" . $categorie['idcategorie'] . "'>Modifier</button>
                    </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </form>
    </div>
</body>

</html>
