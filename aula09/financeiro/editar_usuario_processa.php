<?php
include 'conexao.php';

$id_usuario = $_POST['id_usuario'] ?? 0;

if ($id_usuario <= 0) {
    exit("ID inválido.");
}

if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {

    $foto = file_get_contents($_FILES['foto']['tmp_name']);

    $sql = "UPDATE usuarios SET foto = :foto WHERE id_usuario = :id_usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':foto', $foto, PDO::PARAM_LOB);
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: ver_foto.php");
        exit;
    } else {
        echo "Erro ao atualizar a foto.";
    }

} else {
    echo "Erro no upload: ";
    var_dump($_FILES);
}
