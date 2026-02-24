<?php
// Recebe nome e senha do formulário
$nome = $_POST['nome'] ?? '';
$senha = $_POST['pass'] ?? '';

if ($nome && $senha) {
    $arquivo_path = 'dados.txt';

    // Lê usuários existentes ou cria array vazio
    $usuarios = file_exists($arquivo_path) ? file($arquivo_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];

    // Verifica se o nome já existe
    $nome_existe = false;
    foreach ($usuarios as $usuario) {
        list($nome_salvo, ) = explode(',', $usuario);
        if ($nome_salvo === $nome) {
            $nome_existe = true;
            break;
        }
    }

    if ($nome_existe) {
        echo "Erro: usuário já cadastrado.";
    } else {
        // Acrescenta novo usuário
        $arquivo = fopen($arquivo_path, 'a');
        fwrite($arquivo, $nome . ',' . $senha . "\n");
        fclose($arquivo);
        echo "Cadastro realizado com sucesso!";
    }
} else {
    echo "Por favor, preencha todos os campos.";
}
?>