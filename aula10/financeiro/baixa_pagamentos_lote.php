<?php 
include 'conexao.php';
$contador = $_POST["contador"];

for ($i=1; $i <= $contador; $i++) {
    $id_pagamento = $_POST["id_pagamento$i"];
    if (isset($_POST["check$i"]) && $_POST["check$i"] == 1) {
        $sql = "UPDATE pagamentos SET data_pagto = data_vcto, valor_pago = valor where id_pagamento = $id_pagamento";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

    }
}
header("Location: pagamentos_main.php")
?>