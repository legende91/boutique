<?php

$data = new produit();
$data->findById(1);
$produits = $data->findByNumber(4);
