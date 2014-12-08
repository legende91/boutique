<?php

if (isset ($_GET['id']) && !empty($_GET['id'])){
$id = (int) $_GET['id'];

$data = new produit();
$produits = $data->findById($id); 
}