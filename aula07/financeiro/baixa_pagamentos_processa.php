<?php 
include 'conexao.php';
$id_pagamento = $_POST['id_pagamento'];
$data_pagto = $_POST['data_pagto'];
$valor_pago = $_POST['valor_pago'];

// tentar
try {
    $sql = "UPDATE pagamentos SET data_pagto = :data_pagto, valor_pago = :valor_pago where id_pagamento = :id_pagamento";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_pagamento', $id_pagamento, PDO::PARAM_INT);
    $stmt->bindParam(':data_pagto', $data_pagto);
    $stmt->bindParam(':valor_pago', $valor_pago);
    if ($stmt->execute()) {
        header("Location: pagamentos_main.php");
    } else {
        echo "Erro ao alterar o registro.";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>