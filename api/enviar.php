<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $celular = htmlspecialchars(trim($_POST['celular']));
    $mensagem = htmlspecialchars(trim($_POST['mensagem']));


    if (empty($nome) || empty($email) || empty($mensagem)) {
        echo "Por favor, preencha todos os campos obrigatórios.";
        exit;
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, insira um endereço de e-mail válido.";
        exit;
    }


    $to = "wesley.coldyto@gmail.com"; 
    $subject = "Nova mensagem do formulário de contato";
    $body = "Nome: $nome\n";
    $body .= "E-mail: $email\n";
    $body .= "Celular: $celular\n";
    $body .= "Mensagem: $mensagem\n";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";


    if (mail($to, $subject, $body, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem. Por favor, tente novamente mais tarde.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>