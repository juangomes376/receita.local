<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/protection.php"  ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/head.php"  ?>
<?php require $_SERVER['DOCUMENT_ROOT'] .'/assets/sql/connexion.php'; ?>
    <title>Recettes | Admin</title>
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/header.php"  ?>

<form action="/assets/scripts/addnewrecette.php" method="POST" enctype="multipart/form-data" >

    <input type="file" name="img" id="img">

    <input type="text" name="id" value="<?php echo($_SESSION['iduser']); ?>" hidden >

    <select name="categorie" id="categorie">
        <option value="entrée">Entrée</option>
        <option value="plat">Plat</option>
        <option value="dessert">Dessert</option>
    </select>

    <label for="nom">Nom:</label>
    <input type="text" name="nom" id="nom">

    <input type="submit" value="Ajouter">
</form>
<main>
    <table>
        <tr>
            <th>Img</th>
            <th>Nom</th>
            <th>Categorie</th>
            <th>Note</th>
            <th>ingredients</th>
            <th>Modifier</th>
        </tr>
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
                    <td><img src=<?php echo($image)?> style="height: 40px; width: 40px;" ></td>
                    <td><?php echo($nom) ?></td>
                    <td><?php echo($categorie) ?></td>
                    <td><?php echo($note) ?></td>
                    <td><a href="/assets/admin/addingrédient?id=<?php echo($id) ?>"><img src="/assets/img/list.png" alt="" style="height: 25px; width: 25px;"></a></td> 
                    <td><a href="/assets/admin/modifierrecette?id=<?php echo($id) ?>"><img src="/assets/img/listedit.png" alt="" style="height: 25px; width: 25px;"></a></td>
                </tr>
                <?php
            }
    ?>
    </table>
</main>



<?php require $_SERVER['DOCUMENT_ROOT'] . "/assets/components/footer.php"  ?>
</body>
</html>