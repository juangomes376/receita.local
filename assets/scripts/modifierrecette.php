<?php
require $_SERVER['DOCUMENT_ROOT'] .'/assets/sql/connexion.php';

$id = $_POST["id"];
$nom = $_POST["nom"];
$categorie = $_POST["categorie"];
$description = $_POST["description"];
$note = $_POST["note"];

$requete = $conexion->prepare('UPDATE `recettes` SET `nom` = ?, `categorie` = ?,`description` = ?, `note` = ? WHERE `recettes`.`id` = ?');
$requete->execute([
    $nom,
    $categorie,
    $description,
    $note,
    $id
]);

header('Location: /assets/admin/recettes');

?>