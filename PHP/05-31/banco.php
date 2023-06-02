<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de dados</title>
</head>
<body>
    
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] === 'POST'){
    include("conexao.php");

        if(isset($_POST["ra"]) && ($_POST["ra"] != "")){
            $ra = $_POST["ra"];
            $stmt = $pdo->prepare("select * from alunos where ra= :ra order by curso, nome");
            
        }


    try{
        $ra = $_POST["ra"];
        $nome = $_POST["nome"];
        $curso = $_POST["curso"];
        
        if((trim($ra) == "") || (trim($nome) == "")){
            echo "<span id='warning'> RA e nome são obrigatórios </span>";
        }

        if($rows <= 0){
            $stmt = $pdo->prepare("insert into alunos (ra, nome, curso) values (:ra, :nome, :curso)");
            $stmt -> bindParam(':ra' $ra);
            $stmt -> bindParam(':nome' $nome);
            $stmt -> bindParam(':nome' $nome);
            $stmt -> execute();

            echo "<span id='sucess'> Aluno cadastrado</span>";
        }else{
            echo "<span id='sucess'>Ra já existente </span>";
        }
    }catch(PDOException $e){
        echo 'Error' . $e -> getMessage();
    }
    $pdo = null;
    }catch{
        echo "<spam id='warning'> Erro de conexão </span>"
    }
?>