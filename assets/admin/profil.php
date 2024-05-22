<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/protection.php"  ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/head.php"  ?>
    <title>Home | Admin</title>
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/header.php"  ?>
    
<h1><?php echo($_SESSION['prenom']."   ");   echo($_SESSION['nom']);   ?></h1>

<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/footer.php"  ?>
</body>
</html>