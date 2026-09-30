<?php 
$pastaDestino = "upload/";

if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] == 0) {
    $nomeArquivo = basename($_FILES['arquivo']['name']);
    $caminhoDestino = $pastaDestino . $nomeArquivo;

    // Verifica se é uma imagem
    $tipoArquivo = strtolower(pathinfo($caminhoDestino, PATHINFO_EXTENSION));
    $tiposPermitidos = ["jpg", "jpeg", "png", "gif"];

    if (in_array($tipoArquivo, $tiposPermitidos)) {
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminhoDestino)) {
            echo "Upload realizado com sucesso!<br>";
            echo "<a href='index.php'>Ver galeria</a>";
        } else {
            echo "X Erro ao salvar o arquivo";
    } 
    } else {
        echo "X tipo de arquivo não permitido. Envie apenas imagens (JPG, PNG, GIF).";
    } 
    } else {
        echo "Nenhum arquivo enviado.";
}
?>