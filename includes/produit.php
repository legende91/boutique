<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of produit
 *
 * @author sylvain
 */
class produit {

    private $id;
    private $nom;
    private $image;
    private $description;
    private $date;
    private $quantite;
    private $prix;

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

    public function getPrix() {
        return $this->prix;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getImage() {
        return $this->image;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDate() {
        return $this->date;
    }

    public function getQuantite() {
        return $this->quantite;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

    public function findAll() {
        $sql = "SELECT * FROM produit";
        $data = $this->db->prepare($sql);
        $data->execute();

        $menu = $data->fetchAll(PDO::FETCH_OBJ);
        return $menu;
    }

    public function addProduit($nom, $image, $description, $quantite, $prix) {

        $sql = "INSERT INTO produit(nom, image, description, quantite, prix) VALUES (:nom, :image,:description, :quantite, :prix)";
        $data = $this->db->prepare($sql);
        $data->execute(
                array(
                    'nom' => $nom,
                    'image' => $image,
                    'description' => $description,
                    'quantite' => $quantite,
                    'prix' => $prix
                )
            );
        $id = $this->db->lastInsertId('produit');
        return $id;
    }

    public function delProduit($id) {
        $sql = "DELETE FROM produit WHERE id=:id)";
        $data = $this->db->prepare($sql);
        $data->execute(array('id' => $id));
    }

    public function updateProduit($id, $nom, $image, $description, $quantite) {
        $sql = "UPDATE produit SET nom=:nom, image=:image, description=:description,  quantite=:quantite, prix=:prix WHERE id=:id)";
        $data = $this->db->prepare($sql);
        $data->execute(array('id' => $id, 'nom' => $nom, 'image' => $image, 'description' => $description, 'quantite' => $quantite, 'prix' => $prix));
    }

    public function findById($id) {
        $sql = "SELECT * FROM produit WHERE id=:id";
        $data = $this->db->prepare($sql);
        $data->execute(array('id' => $id));
        $produit = $data->fetchAll(PDO::FETCH_OBJ);
        return $produit;
    }

    public function findByNumber($id) {
        $sql = "SELECT * FROM produit LIMIT 0, $id ";
        $data = $this->db->prepare($sql);
        $data->execute();
        $produit = $data->fetchAll(PDO::FETCH_OBJ);
        return $produit;
    }

}
