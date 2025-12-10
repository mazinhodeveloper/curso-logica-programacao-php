<?php 
session_start(); // Inicia a sessão
session_unset(); // Remove as variáveis da sessão
session_destroy(); // Destroi a Sessão

// Invalidar o cookie da sessão
if (ini_get("session.use_cookies")) {
    $param = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
    $param["path"], $param["domain"],
    $param["secure"], $param["httponly"],
);
}

header("Location: index.php");
?>