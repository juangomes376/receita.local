<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/head.php"  ?>
    <title>Login</title>
</head>
<body class="page_login">
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/header.php"  ?>
<main>
    <form action="/assets/scripts/login.php" method="post" class="form_login">

        <label for="email">Email:</label>
        <input type="text" name="email" id="email">

        <label for="password">Password: </label>
        <input type="password" name="password" id="password" autocomplete="current-password" >
        <!-- <span id="toggle-password" class="toggle-password">Mostrar</span> -->

        </br>
        <input type="submit" value="login">

    </form>
</main>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/footer.php"  ?>
</body>
</html>