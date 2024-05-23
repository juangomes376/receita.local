<?php
require $_SERVER['DOCUMENT_ROOT'] .'/assets/sql/connexion.php';
// Verifica se o formulário foi submetido e se o arquivo foi enviado corretamente
if (isset($_FILES["img"]["name"]) && $_FILES["img"]["tmp_name"] !== "") {
    // Obtém o nome do arquivo e o nome adicional a partir do formulário
    $file = $_FILES["img"];
    $idproprietaire = $_POST["id"];
    $nom = $_POST["nom"];
    $categorie = $_POST["categorie"];
    $ingredients = array();
    $ingredients = json_encode($ingredients);
    $note = 0;

    // Define o diretório de destino
    $diretorioAlvo = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/recettes/";
    $arquivoAlvo = $diretorioAlvo . basename($file["name"]);

    $adresses = "/assets/img/recettes/".basename($file["name"]);
    
    // Tenta mover o arquivo enviado para o diretório de destino

        move_uploaded_file($file["tmp_name"], $arquivoAlvo);
        // Registra no log que o arquivo foi adicionado
        error_log("add new: ".$nom." adresses: ".$adresses);

        $requete = $conexion->prepare(' INSERT INTO recettes (nom, categorie, ingredients, description, note, idproprietaire, image) VALUES (?,?,?,?,?,?,?)');
        $requete->execute([
            $nom,
            $categorie,
            $ingredients,
            "",
            $note,
            $idproprietaire,
            $adresses
        ]);
        
        // Redireciona para a página desejada após o upload
        header('Location: /assets/admin/recettes');
        
} else {
    echo "Nenhum arquivo foi enviado.";
    // Usando JavaScript para redirecionar após 5 segundos
    echo '<script type="text/javascript">
            setTimeout(function(){
                window.location.href = "/assets/admin/recettes";
            }, 2000);
          </script>';
}
?>