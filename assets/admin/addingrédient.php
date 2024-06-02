<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/protection.php"  ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/head.php"  ?>
<?php require $_SERVER['DOCUMENT_ROOT'] .'/assets/sql/connexion.php'; ?>
    <title>Add ingredient | Admin</title>
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/header.php"  ?>
<main>

<form action="/assets/scripts/add-new-ingre-rece.php" method="POST">

<input type="number" name="id" id="" value="<?php echo($_GET["id"])?>" hidden>

<select name="ingredient" id="">
    <?php
    $requete = $conexion->prepare('SELECT * FROM ingredient;');
    $requete->execute();
    $ingredients = $requete->fetchAll(); 

    foreach($ingredients as $ingredient){
        $nom = $ingredient["nom"];
    ?>
        <option value="<?php echo($nom)?>"><?php echo($nom)?></option>

    <?php
    }
    ?>
</select>

<input type="number" name="montant" id="" min="0" >

<select name="mesure" id="">
    <option value="ml">Millilitre (ml)</option>
    <option value="l">Litre (l)</option>
    <option value="g">Gramme (g)</option>
    <option value="kg">Kilogramme (kg)</option>
    <option value="cuil. à café">Cuillère à café (cuil. à café)</option>
    <option value="cuil. à soupe">Cuillère à soupe (cuil. à soupe)</option>
    <option value="pincée">Pincée</option>
    <option value="tasse">Tasse</option>
    <option value="verre">Verre</option>
    <option value="goutte">Goutte</option>
    <option value="poignée">Poignée</option>
    <option value="bol">Bol</option>
    <option value="pot">Pot</option>
    <option value="bouteille">Bouteille</option>
    <option value="douzaine">Douzaine</option>
    <option value="litre d'eau">Litre d'eau (l d'eau)</option>
    <option value="kg de farine">Kilogramme de farine (kg de farine)</option>
    <option value="carré">Carré (de chocolat, par exemple)</option>
    <option value="branche">Branche (d'herbes)</option>
    <option value="feuille">Feuille (de gélatine, de laurier)</option>
</select>

<input type="submit" value="Ajouter">
</form>

<table>
    <tr>
        <th>image</th>
        <th>Nom</th>
        <th>montant</th>
        <th>Mesure</th>
    </tr>
<?php

$requete = $conexion->prepare('SELECT * FROM recettes WHERE id = ?;');
$requete->execute([$_GET["id"]]);
$recingredients = $requete->fetch(); 

$jsons = json_decode($recingredients["ingredients"], true);

foreach($jsons as $json ){
    $requete = $conexion->prepare('SELECT * FROM ingredient WHERE nom = ?;');
    $requete->execute([$json["nom"]]);
    $ingredients = $requete->fetch();
     
    

    $ingredient = $ingredients["image"];

    $ingredient = '<img style="height: 30px; width: 30px;"  src="'.$ingredient.'">';
    ?>
        <tr>
            <td><?php echo($ingredient)?></td>
            <td><?php echo($json["nom"]) ?></td>
            <td><?php echo($json["montant"]) ?></td>
            <td><?php echo($json["mesure"]) ?></td>
        </tr>
    <?php
}
?>    
</table>  

</main>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/footer.php"  ?>
</body>
</html>