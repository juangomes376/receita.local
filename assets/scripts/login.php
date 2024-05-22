<?php

require $_SERVER['DOCUMENT_ROOT'] .'/assets/sql/connexion.php';

$email = $_POST["email"];
$password = $_POST["password"];


$requete = $conexion->prepare(' SELECT * FROM user WHERE  email = ?');
$requete->execute([
    $email
]);
$user = $requete->fetch();

$hashSenhaArmazenada = $user["password"];

if(password_verify($password, $hashSenhaArmazenada)){

    echo("voce esta certo");


}else{
    echo("voce esta errado");
}
?>