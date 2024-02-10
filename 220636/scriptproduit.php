<link rel="stylesheet" href="css/produit.css">
<?php
include('connexion.php');

if (isset($_POST['submit'])) {
    $sqlQuery = 'INSERT INTO produits (nom_produit, categorie_id, qte, prix_unitaire, description) 
                 VALUES (:nom_produit, :categorie_id, :qte, :prix_unitaire, :description)';
    
    $inser = $db->prepare($sqlQuery);

    $success = $inser->execute([
        'nom_produit' => $_POST['nom_produit'],
        'categorie_id' => $_POST['categorie_id'],
        'qte' => $_POST['qte'],
        'prix_unitaire' => $_POST['prix_unitaire'],
        'description' => $_POST['description']
    ]);

    $inser->closeCursor();

    if ($success) {
        echo "<script>
                alert('Enregistrement réussi');
                window.location.href = 'enregistrer_Produit.php'; 
              </script>";
    } else {
        echo "<script>
                alert('Erreur lors de l\'enregistrement');
              </script>";
    }
}
?>

<?php
    for($i=1;$i<=$_GET['nb'];$i++){
        if(isset($_POST['sup'.$i])){
            include('connexion.php');
            $sqlQuery="DELETE FROM produits where idproduit='".$_POST['idproduit'.$i]."'";
            $sup=$db->prepare($sqlQuery);
            $sup->execute();
            header('Location:produit.php');
    }
    if(isset($_POST['mod'.$i])){
        echo "<form method='POST' action='scriptmodifier.php'>";
         echo "<table>";
            echo "<tr>";
            echo "<td>Nom du produit</td> ";
            echo "<td>prix unitaire </td>";
            echo "<td>categorie</td>";
            echo "<td>quantite</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td> <input type='text' name='nom_produit' value='".$_POST['nom_produit'.$i]."' > </td> ";
                echo "<td> <input type='text' name='prix_unitaire' value='".$_POST['prix_unitaire'.$i]."' > 
                <input hidden name='idproduit' value='".$_POST['idproduit'.$i]."' ></td> ";
                echo "<td> <input type='text' name='categorie_id' value='".$_POST['categorie_id'.$i]."' > </td> ";
                echo "<td> <input type='text' name='qte' value='".$_POST['qte'.$i]."' > </td> ";
                echo "<td><button type='submit' name='mod".$i."'>Modifier</button></td>"; 
            "</tr>";
          "</table>";
        echo "</form>";
    }
    }
    if(isset($_POST["Ajouter"])){
        include('enregistrer_Produit.php');
    }
?>

