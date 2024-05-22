<?php

if (!isset($_SESSION)) {
    session_start();
}

require $_SERVER['DOCUMENT_ROOT'] .'/assets/sql/connexion.php';

$email = $_POST["email"];
$password = $_POST["password"];


$requete = $conexion->prepare(' SELECT * FROM user WHERE  email = ?');
$requete->execute([
    $email
]);
$user = $requete->fetch();

$id = $user["id"];
$prenom = $user["prenom"];
$nom = $user["nom"];
$email = $user["email"];

$hashSenhaArmazenada = $user["password"];

if(password_verify($password, $hashSenhaArmazenada)){

    // error_log("Login:   voce esta certo");

    $_SESSION['id'] = $id;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['nom'] = $nom;
    $_SESSION['email'] = $email;

    header('Location: /');
}else{
    // error_log("Login: voce esta errado");
    header('Location: /assets/pages/login');
}
?>