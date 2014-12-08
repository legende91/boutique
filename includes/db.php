<?php

try
{
    // connection DB of charaters
    $db = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DBNAME, MYSQL_USER, MYSQL_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    //IMPORTANT SI TU BOSS EN UTF 8 !!!
    $db->query('SET NAMES UTF8');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

