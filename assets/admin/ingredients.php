<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/protection.php"  ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/head.php"  ?>
<?php require $_SERVER['DOCUMENT_ROOT'] .'/assets/sql/connexion.php'; ?>
    <title>Ingrédients | Admin</title>
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/header.php"  ?>

<form action="/assets/scripts/addingredient.php" method="POST" enctype="multipart/form-data" class="max-w-md bg-white p-4 rounded shadow" role="form" aria-label="Formulaire d'ajout d'ingrédient" novalidate>

    <div>
      <label for="img" class="block text-sm font-medium text-gray-700">Image</label>
      <input type="file" name="img" id="img" required aria-required="true" class="mt-1 block w-full">
    </div>

    <div class="mt-3">
      <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
      <input type="text" name="nom" id="nom" required aria-required="true" class="mt-1 block w-full border rounded px-3 py-2">
    </div>

    <div class="mt-4 text-right">
      <button type="submit" class="bg-indigo-700 text-white px-4 py-2 rounded hover:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Ajouter</button>
    </div>
</form>
<main class="mt-6">
  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
  <?php
          $requete = $conexion->prepare('SELECT * FROM ingredient;');
          $requete->execute();
          $ingredients = $requete->fetchAll();


          foreach($ingredients as $ingredient){

              $nom = $ingredient["nom"];
              $image = $ingredient["image"];

              ?>

              <div class="flex items-center gap-3 bg-white p-3 rounded shadow">
                  <img loading="lazy" src="<?php echo $image ?>" alt="<?php echo htmlspecialchars($nom) ?>" class="h-10 w-10 object-cover rounded" >
                  <p class="text-gray-800"><?php echo($nom) ?></p>
              </div>

              <?php
          }
  ?>
  </div>
</main>

<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/footer.php"  ?>
</body>
</html>