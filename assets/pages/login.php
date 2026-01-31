<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/head.php"  ?>
    <title>Connexion</title>
</head>
<body class="page_login">
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/header.php"  ?>

<main id="main-content" role="main" class="container mx-auto px-4 py-12">
  <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-semibold mb-4">Connexion</h2>
    <form action="/assets/scripts/login.php" method="post" class="space-y-4" role="form" aria-label="Formulaire de connexion" novalidate>
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" required aria-required="true" aria-label="Email" autocomplete="email" class="mt-1 block w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
      </div>
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
        <input type="password" name="password" id="password" required aria-required="true" aria-label="Mot de passe" autocomplete="current-password" class="mt-1 block w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
      </div>
      <div class="flex items-center justify-between">
        <button type="submit" class="bg-indigo-700 text-white px-4 py-2 rounded hover:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Connexion</button>
        <a href="/assets/pages/newcompte" class="text-sm link-primary hover:underline">Créer un compte</a>
      </div>
    </form>
  </div>
</main> 
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/footer.php"  ?>
</body>
</html>