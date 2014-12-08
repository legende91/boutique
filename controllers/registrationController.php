<?php 

if(isUserLoggedIn()){
    home();
}



if(isset($_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['password'],  $_POST['email']) && !empty($_POST['nom'])&& !empty($_POST['password']) && !empty($_POST['email'])){
    $user = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];
    if(!VerifierEmail($email)){
        setcookie('errMail', 'Mail invalide', (time() + 3));
         header('location:?action=registration');
         die();
    }
    
    if(strlen($user)<4 || strlen($user)>12){
       setcookie('errUser', 'Pseudo trop court / trop long', (time() + 3));
        header('location:?action=registration');
        die();
    }
    if(strlen($_POST['password'])<6){
        setcookie('errPass', 'Password trop court', (time() + 3));
        header('location:?action=registration');
        die();
    }
    

       $data = $db->prepare('SELECT * FROM user WHERE nom=:nom OR email=:email ');
       $data->execute(array('nom' => $user, 'email'=>$email));
       $data->rowcount();
    
    
    if(!$data->rowcount()){
        $data =$db->prepare('INSERT INTO user(nom, prenom, password, email, adresse, admin) VALUES (:nom,:prenom ,:password, :email , :adresse, 0)');
        $data->execute(array(
        'nom' => $user,
        'prenom' => $prenom,
        'password' => mod_password($email, $password),
        'email' => $email,
        'adresse' => $adresse,
        ));
        
        $data = $db->prepare('SELECT id FROM account WHERE email=:email');
        $data->execute(array('email' => $email,));
        $id =$data->fetch(PDO::FETCH_OBJ);
        
        setcookie("Ok", "Votre enregistrement est bien effectué", time()+3);
        home();
        die();
    }
   
    
    
}