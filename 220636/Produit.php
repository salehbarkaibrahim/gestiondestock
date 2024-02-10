<?php
include('connexion.php');

class Produit
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function tousLesProduits()
    {
        $sql = "SELECT * FROM stock.produits ORDER BY idproduit";
        return $this->db->query($sql)->fetchAll();
    }

    public function nombreDeProduits()
    {
        $sqlQuery = 'SELECT * FROM produits';
        $stmt = $this->db->prepare($sqlQuery);
        $stmt->execute();
        $tabAss = $stmt->fetchAll();
        return count($tabAss);
    }
}

$produitManager = new Produit($db);
$liste = $produitManager->tousLesProduits();
$taille = $produitManager->nombreDeProduits();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/produit.css">
    <title>Document</title>
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
    <form action=<?php echo "'scriptproduit.php?nb=" . $taille . "'"; ?> method="post">
        <table align="center" border="1">
          
            <tr class="entete">
                <td>Nom de produit</td>
                <td>Prix unitaire </td>
                <td>Catégorie</td>
                <td>Quantité disponible</td>
                <td>Action</td>
            </tr>

            <?php
            $i = 0;
            foreach ($liste as $produit) {
                $i++;
                echo "<tr>";
                echo "<td><input size='20' readonly value='" . $produit['nom_produit'] . "' name='nom_produit" . $i . "'</td>";
                echo "<td><input size='20' readonly  value='" . $produit['prix_unitaire'] . "' name='prix_unitaire" . $i . "'</td>";
                echo "<td><input size='20' readonly value='" . $produit['categorie_id'] . "' name='categorie_id" . $i . "'>
                      <input hidden value='" . $produit['idproduit'] . "' name='idproduit" . $i . "'></td>";
                echo "<td><input size='20' readonly value='" . $produit['qte'] . "' name='qte" . $i . "'</td>";

                echo "<td>
                        <button type='submit' name='sup".$i."' value='sup'>Supprimer</button>
                        <button type='submit' name='mod".$i."' value='mod'>Modifier</button>
                      </td>";

                echo "</tr>";
            }
            ?>

        </table>
    </form>
    </div>
</body>

</html>
