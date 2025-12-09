<?php 
date_default_timezone_set('America/Sao_Paulo');
require "conexao.php";   

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$dataHora = date("Y-m-d H:i:s");

try{

    $sql = "INSERT INTO cadastro (nome,sobrenome,email,senha, data_cadastro) VALUES (:nome,:sobrenome,:email,:senha,:datacadastro)";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nome' => $nome,
        ':sobrenome' => $sobrenome,
        ':email' => $email,
        ':senha' => $senha,
        ':datacadastro' => $dataHora
    ]);
    

    header("Location: listaUsuarios.php");

}catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}


?>
