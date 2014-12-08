<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu
 *
 * @author sylvain
 */
class categorie {

    private $id;
    private $menu;
    private $db;

    function __construct() {
        try {
            // connection DB of charaters
            $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DBNAME, MYSQL_USER, MYSQL_PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            //IMPORTANT SI TU BOSS EN UTF 8 !!!
            $this->db->query('SET NAMES UTF8');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getMenu() {
        return $this->menu;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setMenu($menu) {
        $this->menu = $menu;
    }

    public function getDb() {
        return $this->db;
    }

    public function setDb($db) {
        $this->db = $db;
    }

    public function findAll() {
        $sql = "SELECT * FROM categorie";
        $data = $this->db->prepare($sql);
        $data->execute();
        
        $menu = $data->fetchAll(PDO::FETCH_OBJ);
        return $menu;           
    }
    public function addCategorie($cat){
         $sql = "INSERT INTO categorie(nom) VALUES (:cat)";
         $data = $this->db->prepare($sql);
         $data->execute(array('cat'=>$cat));     
    }
    public function delCategorie($id){
        $sql = "DELETE FROM categorie WHERE id=:id)";
        $data = $this->db->prepare($sql);
         $data->execute(array('id'=>$id));    
    }
    
    public function updateCategorie($id, $cat){
        $sql = "UPDATE categorie SET nom=:cat WHERE id=:id)";
        $data = $this->db->prepare($sql);
         $data->execute(array('id'=>$id, 'cat'=>$cat));    
    }

    public function findById($id) {
        $sql = "SELECT * FROM categorie WHERE id=:id";
        $data = $this->db->prepare($sql);
        $data->execute(array('id'=>$id));
        
        $categorie = $data->fetchAll(PDO::FETCH_OBJ);
        return $categorie;           
    }
}
