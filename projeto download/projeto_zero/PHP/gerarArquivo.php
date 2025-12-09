<?php
require "conexao.php"; // cria $pdo

function gerarXML(){
    global $pdo;
    $sql = "SELECT id, nome, sobrenome, email, data_cadastro FROM cadastro";
    $stmt = $pdo->query($sql);

    $xml = "<cadastros>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $xml .= "<cadastro>";
        $xml .= "<id>{$row['id']}</id>";
        $xml .= "<nome>{$row['nome']}</nome>";
        $xml .= "<sobrenome>{$row['sobrenome']}</sobrenome>";
        $xml .= "<email>{$row['email']}</email>";
        $xml .= "<data>{$row['data_cadastro']}</data>";
        $xml .= "</cadastro>";
    }
    $xml .= "</cadastros>";

    $caminho = "../Docs/cadastro.xml";
    file_put_contents($caminho, $xml);

    echo "Arquivo XML gerado com sucesso!";
}
function gerarTXT(){
    global $pdo;
    $sql = "SELECT id, nome, sobrenome, email FROM cadastro";
    $stmt = $pdo->query($sql);

    $txt = "";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $txt .= "{$row['id']} - {$row['nome']} {$row['sobrenome']} - {$row['email']}\n";
    }

     $caminho = "../Docs/cadastro.txt";
    file_put_contents($caminho, $txt);

    echo "Arquivo TXT gerado com sucesso!";
}


// 🚦 Central que decide o que rodar
if (isset($_POST['acao'])) {
    if ($_POST['acao'] == 'xml') {
        gerarXML();
    } elseif ($_POST['acao'] == 'txt') {
        gerarTXT();
    }
}
