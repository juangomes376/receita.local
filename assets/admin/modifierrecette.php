<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/protection.php"  ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/head.php"  ?>
<?php require $_SERVER['DOCUMENT_ROOT'] .'/assets/sql/connexion.php'; ?>
    <title>Modifier | Admin</title>
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/header.php"  ?>
<main id="main-content" class="container mx-auto px-4 py-8">
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
<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-4 py-2 text-left">Image</th>
        <th class="px-4 py-2 text-left">Nom</th>
        <th class="px-4 py-2 text-left">Quantité</th>
        <th class="px-4 py-2 text-left">Mesure</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
    <?php


    foreach($jsons as $json ){
        $requete = $conexion->prepare('SELECT * FROM ingredient WHERE nom = ?;');
        $requete->execute([$json["nom"]]);
        $ingredients = $requete->fetch();
        
        $ingredientImg = $ingredients["image"];
        ?>
            <tr>
                <td class="px-4 py-2"><img loading="lazy" src="<?php echo $ingredientImg ?>" alt="<?php echo htmlspecialchars($json["nom"]) ?>" class="h-8 w-8 object-cover rounded"></td>
                <td class="px-4 py-2"><?php echo($json["nom"]) ?></td>
                <td class="px-4 py-2"><?php echo($json["montant"]) ?></td>
                <td class="px-4 py-2"><?php echo($json["mesure"]) ?></td>
            </tr>
        <?php
    }
    ?>    
    </tbody>
</table></br>

<textarea name="description" id=""><?php echo($recingredients["description"])  ?></textarea></br>
<input type="number" value="<?php echo($recingredients["note"])  ?>" min="0" max="5"  name="note" id=""></br>


<input type="submit" value="Valider">
</form>

  

</main>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/footer.php"  ?>
</body>
</html>