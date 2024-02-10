<?php
     include('connexion.php');
     $sqlQuery="UPDATE produits SET nom_produit = :nom_produit, prix_unitaire = :prix_unitaire, categorie_id = :categorie_id, qte = :qte WHERE idproduit =:idproduit;";
     $mod=$db->prepare($sqlQuery);
     $mod->execute(
        array(
            'nom_produit'=>$_POST['nom_produit'],
            'prix_unitaire'=>$_POST['prix_unitaire'],
            'categorie_id'=>$_POST['categorie_id'],
            'qte'=>$_POST['qte'],
            'idproduit'=>$_POST['idproduit'],
        )
        );
        header('Location:produit.php');
?>