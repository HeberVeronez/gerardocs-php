<?php 
date_default_timezone_set('America/Sao_Paulo');
require "conexao.php";

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Email</th>
                    <th>Data de Cadastro</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            
                try {
                    $stmt = $pdo->query("SELECT * FROM cadastro");
                    while ($row = $stmt->fetch()) {
                    echo "<tr>";

                        echo "<td>{$row['nome']}</td>";
                        echo "<td>{$row['sobrenome']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>" . date('d/m/Y H:i:s', strtotime($row['5'])) . "</td>";
                    echo "</tr>";
                }
                } catch (PDOException $e) {
                    echo "Erro: " . $e->getMessage();
                }    
            ?>
            </tbody>
        </table>
        <button type="button" onclick="executar('xml')" class="btn btn-default btn-success">GERAR XML</button>
        <button type="button" onclick="executar('txt')" class="btn btn-default btn-primary">GERAR TXT</button>
        
        <div id="resultado"></div>

         <script src="../JS/script.js"></script>
        

    </div>    
</body>
</html>




