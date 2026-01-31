<?php
require $_SERVER['DOCUMENT_ROOT'] .'/assets/sql/connexion.php';
// Verifica se o formulário foi submetido e se o arquivo foi enviado corretamente
if (isset($_FILES["img"]["name"]) && $_FILES["img"]["tmp_name"] !== "") {
    // Obtém o nome do arquivo e o nome adicional a partir do formulário
    $file = $_FILES["img"];
    $nom = $_POST["nom"];

    // Define o diretório de destino
    $diretorioAlvo = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/ingredients/";
    $arquivoAlvo = $diretorioAlvo . basename($file["name"]);

    $adresses = "/assets/img/ingredients/".basename($file["name"]);
    
    // Tenta mover o arquivo enviado para o diretório de destino

        move_uploaded_file($file["tmp_name"], $arquivoAlvo);
        // Registra no log que o arquivo foi adicionado
        error_log("add new: ".$nom." adresses: ".$adresses);

        $requete = $conexion->prepare(' INSERT INTO ingredient (nom, Image) VALUES (?,?)');
        $requete->execute([
            $nom,
            $adresses
        ]);
        
        // Redireciona para a página desejada após o upload
        header('Location: /assets/admin/ingredients');
        
} else {
    echo "Nenhum arquivo foi enviado.";
    // Usando JavaScript para redirecionar após 5 segundos
    echo '<script type="text/javascript">
            setTimeout(function(){
                window.location.href = "/assets/admin/ingredients";
            }, 2000);
          </script>'; 
}
?>