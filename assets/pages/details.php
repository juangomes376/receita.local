<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/head.php"  ?>
<?php require $_SERVER['DOCUMENT_ROOT'] .'/assets/sql/connexion.php'; ?>
    <title>Détails</title>
</head>
<body >

<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/header.php"  ?>
<?php
    $requete = $conexion->prepare('SELECT * FROM recettes WHERE id = ?;');
    $requete->execute([$_GET["id"]]);
    $recingredients = $requete->fetch(); 

    $jsons = json_decode($recingredients["ingredients"], true);
?>
<main id="main-content" class="container mx-auto px-4 py-8">

<h2><?php echo($recingredients["nom"]); ?> Note: <?php echo($recingredients["note"]); ?></h2>

<p><?php echo($recingredients["categorie"]); ?>  </p>

<div class="overflow-x-auto mt-3">
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
      </table>
    </div>

<p><?php echo($recingredients["description"]); ?></p>

</main>  
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/footer.php"  ?>
</body>
</html>