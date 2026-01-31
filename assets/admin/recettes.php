<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/protection.php"  ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/head.php"  ?>
<?php require $_SERVER['DOCUMENT_ROOT'] .'/assets/sql/connexion.php'; ?>
    <title>Recettes | Admin</title>
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/header.php"  ?>

<form action="/assets/scripts/addnewrecette.php" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end mb-6" role="form" aria-label="Formulaire d'ajout de recette" novalidate>

    <div>
      <label class="block text-sm font-medium text-gray-700">Image</label>
      <input type="file" name="img" id="img" class="mt-1 block w-full">
    </div>

    <input type="text" name="id" value="<?php echo($_SESSION['iduser']); ?>" hidden >

    <div>
      <label class="block text-sm font-medium text-gray-700">Catégorie</label>
      <select name="categorie" id="categorie" class="mt-1 block w-full border rounded px-3 py-2">
          <option value="entrée">Entrée</option>
          <option value="plat">Plat</option>
          <option value="dessert">Dessert</option>
      </select>
    </div>

    <div>
      <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
      <input type="text" name="nom" id="nom" required aria-required="true" class="mt-1 block w-full border rounded px-3 py-2">
    </div>

    <div class="md:col-span-3 text-right">
      <button type="submit" class="bg-indigo-700 text-white px-4 py-2 rounded hover:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Ajouter</button>
    </div>
</form>
<main>
  <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-4 py-2 text-left">Img</th>
            <th class="px-4 py-2 text-left">Nom</th>
            <th class="px-4 py-2 text-left">Catégorie</th>
            <th class="px-4 py-2 text-left">Note</th>
            <th class="px-4 py-2 text-left">Ingrédients</th>
            <th class="px-4 py-2 text-left">Modifier</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
    <?php
            $requete = $conexion->prepare('SELECT * FROM recettes;');
            $requete->execute();
            $ingredients = $requete->fetchAll();
            foreach($ingredients as $ingredient){
                $id = $nom = $ingredient["id"];
                $nom = $ingredient["nom"];
                $image = $ingredient["image"];
                $note = $ingredient["note"];
                $categorie = $ingredient["categorie"];
                ?>
                <tr>
                    <td class="px-4 py-2"><img loading="lazy" src="<?php echo $image ?>" alt="<?php echo htmlspecialchars($nom) ?>" class="h-10 w-10 object-cover rounded" ></td>
                    <td class="px-4 py-2"><?php echo($nom) ?></td>
                    <td class="px-4 py-2"><?php echo($categorie) ?></td>
                    <td class="px-4 py-2"><?php echo($note) ?></td>
                    <td class="px-4 py-2"><a href="/assets/admin/addingredient?id=<?php echo($id) ?>" class="link-primary hover:underline"><i class="fas fa-list"></i></a></td> 
                    <td class="px-4 py-2"><a href="/assets/admin/modifierrecette?id=<?php echo($id) ?>" class="text-indigo-600 hover:underline"><i class="fas fa-edit"></i></a></td>
                </tr>
                <?php
            }
    ?>
        </tbody>
    </table>
  </div>
</main>



<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/footer.php"  ?>
</body>
</html>