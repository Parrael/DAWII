<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão</title>
</head>
<body>
    
</body>
</html>

<?php
    if(!isset($_POST["ra"])){
        echo "Selecione o aluno a ser excluído";
    }else{
        $ra = $_POST["raAluno"];

        try{
            include("connecton.php");
            $stmt = $pdo->prepare('DELETE FROM alunos WHERE ra = :ra');
            $stmt -> bindParam(':ra', $ra);
            $stmt -> execute(); 

        }catch(PDOExcepton){

        }
    }

?>