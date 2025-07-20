<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/protection.php"  ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/head.php"  ?>
<?php require $_SERVER['DOCUMENT_ROOT'] .'/assets/sql/connexion.php'; ?>
    <title>ingredients | Admin</title>
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/header.php"  ?>

<form action="/assets/scripts/addingredient.php" method="POST" enctype="multipart/form-data">

    <label for="img">Image:</label>
    <input type="file" name="img" id="img">

    <label for="nom">Nom:</label>
    <input type="text" name="nom" id="nom">

    <input type="submit" value="Ajouter">
</form>

<main>
<?php
        $requete = $conexion->prepare('SELECT * FROM ingredient;');
        $requete->execute();
        $ingredients = $requete->fetchAll();


        foreach($ingredients as $ingredient){

            $nom = $ingredient["nom"];
            $image = $ingredient["image"];

            ?>

            <div style=" display: flex;">
                <img src=<?php echo($image)?> style="height: 40px; width: 40px;" >
                <p><?php echo("&nbsp;&nbsp;".$nom) ?></p>
            </div>

            <?php
        }
?>
     
    
</main>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/footer.php"  ?>
</body>
</html>