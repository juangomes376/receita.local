<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/head.php"  ?>

    <title>Home</title>
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/header.php"  ?>
<?php
    require $_SERVER['DOCUMENT_ROOT'] .'/assets/sql/connexion.php';
    $requete = $conexion->prepare('SELECT * FROM recettes LIMIT 20 ;');
    $requete->execute();
    $recettes = $requete->fetchAll();
?>

<main id="main-content" class="container mx-auto px-4 py-8">
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <?php foreach($recettes as $recette): ?>
      <a href="/assets/pages/details.php?id=<?php echo($recette["id"]) ?>" class="block bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition transform hover:scale-105">
        <img loading="lazy" class="w-full h-40 object-cover" src="<?php echo($recette["image"]) ?>" alt="<?php echo(htmlspecialchars($recette["nom"])); ?>">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-gray-800 truncate"><?php echo($recette["nom"]) ?></h3>
          <p class="text-sm text-gray-500"><?php echo($recette["categorie"]) ?></p>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</main> 
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/footer.php"  ?>
</body>
</html>