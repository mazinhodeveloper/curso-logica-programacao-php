<?php
// ver_foto.php
include 'conexao.php';

$id = 1;
if ($id <= 0) {
    http_response_code(400);
    exit('ID inválido.');
}

// Opcional: garanta erros visíveis do PDO (caso não esteja no conexao.php)
if (isset($pdo)) {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

try {
    // Buscar o BLOB
    $stmt = $pdo->prepare('SELECT foto FROM usuarios WHERE id_usuario = :id LIMIT 1');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $foto = $stmt->fetchColumn(); // retorna o conteúdo binário da coluna 'foto'

    if ($foto === false || $foto === null) {
        // Sem foto: 404 ou placeholder
        http_response_code(404);
        exit('Foto não encontrada.');
    }

    // Tenta detectar o MIME a partir do binário (fallback para JPEG)
    $mime = 'image/jpeg';
    if (function_exists('finfo_open')) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        if ($finfo) {
            $detected = finfo_buffer($finfo, $foto);
            if ($detected) {
                $mime = $detected;
            }
            finfo_close($finfo);
        }
    }

    // Envia headers e o binário
    header('Content-Type: ' . $mime);
    header('Content-Length: ' . strlen($foto));
    header('Cache-Control: public, max-age=86400'); // opcional

    echo $foto;
    exit;

} catch (PDOException $e) {
    http_response_code(500);
    exit('Erro no banco: ' . htmlspecialchars($e->getMessage()));
}
