<?php
require $_SERVER['DOCUMENT_ROOT'] .'/assets/sql/connexion.php';

$id = $_POST["id"];
$ingredient = $_POST["ingredient"];
$montant = $_POST["montant"];
$mesure = $_POST["mesure"];

$requete = $conexion->prepare('SELECT * FROM recettes WHERE id = ?;');
$requete->execute([$id]);
$recette = $requete->fetch();


$json = json_decode($recette['ingredients'], true);

// $json = $recette['ingredients'];

$novo_ingrediente = [
    'nom' => $ingredient,
    'montant' => $montant,
    'mesure' => $mesure
];

array_push($json, $novo_ingrediente);

$json = json_encode($json);

// 


$requete = $conexion->prepare('UPDATE recettes SET ingredients = ? WHERE id = ?');
$requete->execute([
    $json,
    $id
]);


header('Location: /assets/admin/addingrédient?id='.$id);
