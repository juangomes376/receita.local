<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/head.php"  ?>
<?php require $_SERVER['DOCUMENT_ROOT'] .'/assets/sql/connexion.php'; ?>
    <title>Details</title>
</head>
<body >

<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/header.php"  ?>
<?php
    $requete = $conexion->prepare('SELECT * FROM recettes WHERE id = ?;');
    $requete->execute([$_GET["id"]]);
    $recingredients = $requete->fetch(); 

    $jsons = json_decode($recingredients["ingredients"], true);
?>
<main>

<h2><?php echo($recingredients["nom"]); ?> Note: <?php echo($recingredients["note"]); ?></h2>

<p><?php echo($recingredients["categorie"]); ?>  </p>

<table>
    <tr>
        <th>image</th>
        <th>Nom</th>
        <th>montant</th>
        <th>Mesure</th>
    </tr>
    <?php



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

<p><?php echo($recingredients["description"]); ?></p>

</main>  
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/footer.php"  ?>
</body>
</html>