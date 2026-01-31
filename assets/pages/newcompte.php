<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/head.php"  ?>
    <title>Créer un compte</title>
</head>
<body class="page_login">
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/header.php"  ?> 
<main id="main-content" role="main" class="container mx-auto px-4 py-12">
  <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-semibold mb-4">Créer un compte</h2>
    <form action="/assets/scripts/newcompte.php" method="POST" class="space-y-4" role="form" aria-label="Formulaire de création de compte" novalidate>
      <div>
        <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
        <input type="text" name="nom" id="nom" required aria-required="true" class="mt-1 block w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
      </div>
      <div>
        <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
        <input type="text" name="prenom" id="prenom" required aria-required="true" class="mt-1 block w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
      </div>
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" required aria-required="true" autocomplete="email" class="mt-1 block w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
      </div>
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
        <input type="password" name="password" id="password" required aria-required="true" autocomplete="current-password" class="mt-1 block w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
      </div>
      <div class="flex justify-end">
        <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Créer un compte</button>
      </div>
    </form>
  </div>
</main> 

<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/footer.php"  ?>
</body>
</html>