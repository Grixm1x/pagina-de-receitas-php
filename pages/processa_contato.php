<?php
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['Nome']);
    $email = trim($_POST['Email']);
    $mensagem = trim($_POST['Mensagem']);

    // Validação
    if (empty($nome))
        $erros[] = "O nome é obrigatório.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $erros[] = "Email inválido.";
    if (empty($mensagem))
        $erros[] = "A mensagem não pode estar vazia.";

    // Resultado
    if ($erros) {
        echo "<ul>";
        foreach ($erros as $erro) {
            echo "<li>$erro</li>";  
        }
        echo "</ul>";
    } else {
        echo "<p>Obrigado pelo contato, $nome! Responderemos para o email: $email.</p>";
    }
}
?>