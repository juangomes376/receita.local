<?php

require $_SERVER['DOCUMENT_ROOT'] .'/assets/sql/connexion.php';

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_BCRYPT);


$requete = $conexion->prepare(' INSERT INTO user (email, password, nom, prenom) VALUES (?,?,?,?)');
$requete->execute([
    $email,
    $password,
    $nom,
    $prenom
]);

// $to = "destinatario@exemplo.com";
// $subject = "Assunto do Email";
// $message = '

// Este é o conteúdo do email.



// ';
// $headers = "From: remetente@exemplo.com" . "\r\n" .
//            "Reply-To: remetente@exemplo.com" . "\r\n" .
//            "X-Mailer: PHP/" . phpversion();

// mail($to, $subject, $message, $headers);



header('Location: /');
?>