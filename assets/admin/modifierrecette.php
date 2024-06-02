<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/protection.php"  ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/head.php"  ?>
<?php require $_SERVER['DOCUMENT_ROOT'] .'/assets/sql/connexion.php'; ?>
    <title>Add ingredient | Admin</title>
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/header.php"  ?>
<main>
    <?php
            $requete = $conexion->prepare('SELECT * FROM recettes WHERE id = ?;');
            $requete->execute([$_GET["id"]]);
            $recingredients = $requete->fetch(); 
            $jsons = json_decode($recingredients["ingredients"], true);
            
    ?>
<form action="/assets/scripts/modifierrecette.php" method="POST" enctype="multipart/form-data">

<input type="number" value="<?php echo($_GET["id"])  ?>" name="id" hidden>

<input type="text" value="<?php echo($recingredients["nom"])  ?>"  name="nom" id=""></br>
<select name="categorie" id="categorie" value="<?php echo($recingredients["categorie"])  ?>">
        <option value="entrée" <?php echo $recingredients["categorie"] == 'entrée' ? 'selected' : ''; ?>>Entrée</option>
        <option value="plat" <?php echo $recingredients["categorie"] == 'plat' ? 'selected' : ''; ?>>Plat</option>
        <option value="dessert" <?php echo $recingredients["categorie"] == 'dessert' ? 'selected' : ''; ?>>Dessert</option>
</select></br>
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
</table></br>

<textarea name="description" id=""><?php echo($recingredients["description"])  ?></textarea></br>
<input type="number" value="<?php echo($recingredients["note"])  ?>" min="0" max="5"  name="note" id=""></br>


<input type="submit" value="Valider">
</form>

  

</main>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/footer.php"  ?>
</body>
</html>