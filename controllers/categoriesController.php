<?php
$categories = "";
$produits="";
if (isset ($_GET['id']) && !empty($_GET['id'])){
$id = (int) $_GET['id'];
$data = new categorie();
$categories = $data->findById($id);
$data = new categorie_produit();
$produits = $data->findById($id);
}
