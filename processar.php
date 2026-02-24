<?php
// Receber dados do formulário
$nome = $_POST['nome'] ?? '';
$senha = $_POST['pass'] ?? '';

$arquivo = fopen('dados.txt', 'a'); // 'a' = append (acrescentar)
    
$linha = $nome . ',' . $senha . "\n";
    
fwrite($arquivo, $linha);

fclose($arquivo);

// Aqui você poderia, por exemplo, validar os dados
if ($nome && $senha) {
    echo "Bem-vindo, " . htmlspecialchars($nome) . "!";
} else {
    echo "Por favor, preencha todos os campos.";
}

?>
