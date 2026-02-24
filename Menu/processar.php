<?php
// Recebe nome e senha do formulário
$nome = $_POST['nome'] ?? '';
$senha = $_POST['pass'] ?? '';

if ($nome && $senha) {
    $arquivo_path = 'dados.txt';

    if (!file_exists($arquivo_path)) {
        echo "Erro: nenhum usuário cadastrado ainda.";
        exit;
    }

    // Lê todos os usuários
    $usuarios = file($arquivo_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $login_valido = false;
    foreach ($usuarios as $usuario) {
        list($nome_salvo, $senha_salva) = explode(',', $usuario);
        if ($nome_salvo === $nome && $senha_salva === $senha) {
            $login_valido = true;
            break;
        }
    }

    if ($login_valido) {
        echo "Login realizado com sucesso!";
    } else {
        echo "Erro: usuário ou senha incorretos.";
    }
} else {
    echo "Por favor, preencha todos os campos.";
}
?>