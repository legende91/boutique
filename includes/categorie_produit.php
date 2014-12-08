<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categories_produit
 *
 * @author sylvain
 */
class categorie_produit {

    private $id;
    private $propduit_id;
    private $article_id;

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

    public function getPropduit_id() {
        return $this->propduit_id;
    }

    public function getArticle_id() {
        return $this->article_id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setPropduit_id($propduit_id) {
        $this->propduit_id = $propduit_id;
    }

    public function setArticle_id($article_id) {
        $this->article_id = $article_id;
    }

    public function findAll() {
        $sql = "SELECT  a.*, b.id as categorie_id, b.nom as  categorie_nom, c.* FROM categorie_produit a JOIN categorie b ON a.categorie_id=b.id JOIN produit c ON a.produit_id=c.id";
        $data = $this->db->prepare($sql);
        $data->execute();

        $menu = $data->fetchAll(PDO::FETCH_OBJ);
        return $menu;
    }

    public function addCategorieProduit($categorie_id, $produit_id) {
        
        $sql = "INSERT INTO categorie_produit(categorie_id, produit_id) VALUES (:categorie_id, :produit_id)";
        $data = $this->db->prepare($sql);
        $data->execute(array(
            'categorie_id' => $categorie_id,
            'produit_id' => $produit_id
                )
        );
    }

    public function delCategorieProduit($id) {
        $sql = "DELETE FROM categorie_produit WHERE id=:id)";
        $data = $this->db->prepare($sql);
        $data->execute(array('id' => $id));
    }

    public function updateCategorieProduit($categorie_id, $produit_id, $id) {
        $sql = "UPDATE categorie_produit SET categorie_id=:categorie_id, produit_id=:produit_id WHERE id=:id)";
        $data = $this->db->prepare($sql);
        $data->execute(array(
            'id' => $id,
            'categorie_id' => $categorie_id,
            'produit_id' => $produit_id
                )
        );
    }

    public function findById($id) {
        $sql = "SELECT  a.*, b.id as categorie_id, b.nom as  categorie_nom, c.* FROM categorie_produit a JOIN categorie b ON a.categorie_id=b.id JOIN produit c ON a.produit_id=c.id WHERE b.id=:id";
        $data = $this->db->prepare($sql);
        $data->execute(array('id' => $id));

        $produit = $data->fetchAll(PDO::FETCH_OBJ);
        return $produit;
    }

}
