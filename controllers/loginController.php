<?php

if(isUserLoggedIn()){
        $flashMessage = 'Vous êtes déjà log';
    header('Location:?' . ACTION . '=defaut');

}
if(!empty($_POST['email']) && !empty($_POST['password'])){


$email = $_POST ['email'];
$password = $_POST['password'];

if(!VerifierEmail($email)){
    home();
}

$data = $db->prepare('SELECT * FROM user WHERE email=:email AND password=:password');
$data->execute(array(
'email'=>  $email,
'password'=> mod_password($email, $password),
    
));



if ($data->rowcount() == 1 ){
    setUserSession($data->fetch(PDO::FETCH_ASSOC));
    $data->closeCursor();
     setcookie('Ok', 'Welcome '.$_SESSION['name'].'!', (time() + 3));
    header('Location:?' . ACTION . '=defaut');
}else{
     setcookie('errMail', 'Aucun compte trouvé', (time() + 3));
    header('Location:?' . ACTION . '=login');
}
}
 