
<?php
include('connexion.php');

if (isset($_POST['sup'])) {
    $idToDelete = $_POST['sup'];
    $sql = "DELETE FROM categorie WHERE idcategorie = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $idToDelete, PDO::PARAM_INT);
    if ($stmt->execute()) {
        echo "Catégorie supprimée avec succès.";

    } else {
        echo "Erreur lors de la suppression de la catégorie.";
    }
} elseif (isset($_POST['mod'])) {
    $idToModify = $_POST['mod'];

    header("Location: modificationcategorie.php?id=$idToModify");
    exit(); 
}

$sql = "SELECT * FROM categorie ORDER BY idcategorie";
$liste = $db->query($sql)->fetchAll();
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
    <form action="scriptcategorie.php" method="post">
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
                        <button type='submit' name='sup" . $i . "' value='" . $categorie['idcategorie'] . "'>Supprimer</button>
                        <button type='submit' name='mod' value='" . $categorie['idcategorie'] . "'>Modifier</button>
                    </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </form>
</body>

</html>
