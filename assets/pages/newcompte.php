<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/head.php"  ?>
    <title>Login</title>
</head>
<body class="page_login">
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/header.php"  ?>
<main>
    <form action="/assets/scripts/newcompte.php" method="POST" class="form_sign">

        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom">

        <label for="prenom">Prenom:</label>
        <input type="text" name="prenom" id="prenom">

        <label for="email">Email:</label>
        <input type="text" name="email" id="email">

        <label for="password">Password: </label>
        <input type="password" name="password" id="password" autocomplete="current-password" >

        </br>
        <input type="submit" value="new compte">
        
    </form>
</main>  

<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/footer.php"  ?>
</body>
</html>