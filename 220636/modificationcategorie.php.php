<link rel="stylesheet" href="css/produit.css">

<?php
include('connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['modifier'])) {
        $idToModify = $_POST['id_to_modify'];
        $newNomCategorie = $_POST['new_nom_categorie'];
        $newDescription = $_POST['new_description'];

        $sql = "UPDATE categorie SET nom_categorie = :nom, description = :description WHERE idcategorie = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nom', $newNomCategorie, PDO::PARAM_STR);
        $stmt->bindParam(':description', $newDescription, PDO::PARAM_STR);
        $stmt->bindParam(':id', $idToModify, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Catégorie modifiée avec succès.";
            header('Location:categorie.php');
        } else {
            echo "Erreur lors de la modification de la catégorie.";
        }
    }
} else {
    if (isset($_GET['id'])) {
        $idToModify = $_GET['id'];

        $sql = "SELECT * FROM categorie WHERE idcategorie = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $idToModify, PDO::PARAM_INT);
        $stmt->execute();
        $categorie = $stmt->fetch();

        if (!$categorie) {
            echo "Catégorie non trouvée.";
            exit();
        }
    } else {
        echo "ID de la catégorie manquant.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/produit.css"> 
    <title>Modifier Catégorie</title>
</head>

<body>
    <form action="modificationcategorie.php" method="post">
        <table align="center" border="1">
           
            <tr class="entete">
                <td>Nom de Catégorie</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
            <tr>
                <td><input size='20'  value='<?php echo $categorie['nom_categorie']; ?>' name='new_nom_categorie'></td>
                <td><input size='20' value='<?php echo $categorie['description']; ?>' name='new_description'></td>
                <td>
                    <input type='hidden' name='id_to_modify' value='<?php echo $categorie['idcategorie']; ?>'>
                    <button type='submit' name='modifier'>Modifier</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
