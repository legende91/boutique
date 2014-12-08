<?php

session_start();
require '../config/configDev.php'; 
// require '../config/configProd.php';
require '../includes/db.php';
require '../includes/function.php';
require '../includes/categorie.php';
require '../includes/categorie_produit.php';
require '../includes/produit.php';

$flashMessage="";


 $action = (isset($_GET[ACTION]) && !empty($_GET[ACTION])) ? $_GET[ACTION] : 'defaut';
$fileControllers = '../controllers/' . $action . 'Controller.php';
$fileTemplates = '../templates/' . $action . '.phtml';
$fileLayout = '../layout/layout.phtml';
//$fileLayout2 = '../layout/layout2.phtml';
if (file_exists($fileControllers)) {
    $view = true;
    $layout = true;
    include_once $fileControllers;

    if ($layout) {
        
        include_once $fileLayout;
        
        
         
    } elseif (!$layout && $view) {
        include_once $fileTemplates;
    }
} else {
    
    include_once '../controllers/defautController.php';
    $fileTemplates= '../templates/defaut.phtml';
    include_once $fileLayout;
    
};