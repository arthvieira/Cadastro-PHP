<?php
// Receber dados do formulário
$nome = $_POST['nome'] ?? '';
$senha = $_POST['pass'] ?? '';

// Aqui você poderia, por exemplo, validar os dados
if ($nome && $senha) {
    echo "Bem-vindo, " . htmlspecialchars($nome) . "!";
} else {
    echo "Por favor, preencha todos os campos.";
}
?>