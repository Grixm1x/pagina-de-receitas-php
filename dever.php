<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'includes/header.php';


include 'includes/nav.php';


echo '<main id="content">';

$page = $_GET['page'] ?? 'home';
$item = $_GET['item'] ?? null;


switch ($page) {
    case 'home':
        $filePath = 'pages/home.php';
        break;

    case 'contato':
        $filePath = 'pages/contato.php';
        break;

    case 'receitas':
        if ($item) {
            $filePath = "pages/receitas/{$item}.php";
        } else {
            $filePath = null;
            echo "<p>Por favor, selecione uma receita. Ex: Bolo, Pizza, Salada.</p>";
        }
        break;

    case 'processa_contato':
        $filePath = 'pages/processa_contato.php';
        break;

    default:
        $filePath = 'pages/404.php';
        break;
}

if ($filePath && file_exists($filePath)) {
    if (strpos($filePath, '..') === false && strpos($filePath, './') === false) {
        include $filePath;
    } else {
        echo '<h1>Erro de segurança: Tentativa de acesso a diretório inválido.</h1>';
    }
} elseif ($filePath === null) {

} else {
    echo '<h1>Página não encontrada ou inexistente.</h1>';
}


echo '</main>';


include 'includes/footer.php';

?>