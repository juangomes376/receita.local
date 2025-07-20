<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/head.php"  ?>

    <title>Home</title>
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/header.php"  ?>
<div class="recettes">
    <?php
        require $_SERVER['DOCUMENT_ROOT'] .'/assets/sql/connexion.php';
        $requete = $conexion->prepare('SELECT * FROM recettes LIMIT 20 ;');
        $requete->execute();
        $recettes = $requete->fetchAll();
        foreach($recettes as $recette){
            ?>
            <a href="/assets/pages/details.php?id=<?php echo($recette["id"]) ?>" class="recette" >  
                <img style="height: 60px; width: auto;"  src="<?php echo($recette["image"]) ?>" alt="">
                <div>
                    <h3><?php echo($recette["nom"]) ?></h3>
                    
                </div>
            </a>
            <?php
        }
    ?>
</div>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/footer.php"  ?>
</body>
</html>