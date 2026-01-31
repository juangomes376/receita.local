<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/protection.php"  ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/head.php"  ?>
<?php require $_SERVER['DOCUMENT_ROOT'] .'/assets/sql/connexion.php'; ?>
    <title>Ajouter un ingrédient | Admin</title>
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/header.php"  ?>

<main class="container mx-auto px-4 py-8">
  <div class="bg-white rounded shadow p-6">
    <form action="/assets/scripts/add-new-ingre-rece.php" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end" role="form" aria-label="Formulaire d'ajout d'ingrédient" novalidate>
      <input type="number" name="id" value="<?php echo($_GET["id"])?>" hidden>
      <div class="md:col-span-1">
        <label class="block text-sm font-medium text-gray-700">Ingrédient</label>
        <select name="ingredient" required aria-required="true" class="mt-1 block w-full border rounded px-3 py-2">
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
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Quantité</label>
        <input type="number" name="montant" min="0" required aria-required="true" class="mt-1 block w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Mesure</label>
        <select name="mesure" required aria-required="true" class="mt-1 block w-full border rounded px-3 py-2">
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
      </div>
      <div class="md:col-span-3 text-right">
        <button type="submit" class="bg-indigo-700 text-white px-4 py-2 rounded hover:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Ajouter</button>
      </div>
    </form>

    <div class="overflow-x-auto mt-6">
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
        $requete = $conexion->prepare('SELECT * FROM recettes WHERE id = ?;');
        $requete->execute([$_GET["id"]]);
        $recingredients = $requete->fetch(); 
        $jsons = json_decode($recingredients["ingredients"], true);

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
  </div>
</main>

<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/footer.php"  ?>
</body>
</html>