<?php

if (!isUserAdminIn()) {
    home();
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']);

    if ($id === 01) {
        $nom = $_POST['nom'];
        $image = $_POST['image'];
        $description = $_POST['description'];
        $quantite = intval($_POST['quantite']);
        $prix = intval($_POST['prix']);
        
        $data = new produit();
        $produit_id = $data->addProduit($nom, $image, $description, $quantite, $prix);
        
        $categorie_id = intval($_POST['categorie']);
        
        $categorie_produit= new categorie_produit();
        $categorie_produit->addCategorieProduit($categorie_id, $produit_id);
        header('location:?action=admin');
    } elseif ($id === 02) {
         $nom = $_POST['nom'];
         $data= new categorie();
        $data->addCategorie($nom);
        header('location:?action=admin');
    }
}


$data = new categorie();
$categories = $data->findAll();

