<?php
    // Verifica se recebeu o ID do usuário
    if (!isset($_POST['id_usuario'])) {
        die("ID do usuário não informado.");
    }

    $id = intval($_POST['id_usuario']); // segurança

    // Verifica se um arquivo foi enviado
    if (!isset($_FILES['foto']) || $_FILES['foto']['error'] == UPLOAD_ERR_NO_FILE) {
        die("Nenhuma imagem enviada.");
    }

    $arquivo = $_FILES['foto'];

    // Lista de tipos permitidos
    $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];

    // Verificar tipo do arquivo
    if (!in_array($arquivo['type'], $tiposPermitidos)) {
        die("Formato inválido. Envie somente JPG, PNG ou GIF.");
    }

    // Criar diretório, se não existir
    $pasta = "uploads/";
    if (!is_dir($pasta)) {
        mkdir($pasta, 0755, true);
    }

    // Criar novo nome único para a imagem
    $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
    $novoNome = "user_" . $id . "_" . time() . "." . $extensao;

    $caminhoFinal = $pasta . $novoNome;

    // Mover arquivo
    if (move_uploaded_file($arquivo['tmp_name'], $caminhoFinal)) {

        // Aqui você colocaria o UPDATE no banco de dados
        // Exemplo:
        /*
        $sql = "UPDATE usuarios SET foto = ? WHERE id_usuario = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$novoNome, $id]);
        */

        echo "Imagem enviada com sucesso!<br>";
        echo "<img src='$caminhoFinal' width='150'>";
    } else {
        echo "Erro ao fazer upload da imagem.";
    }
        
?>
