<?php   
    include("conexaoBD.php");
    try{
    $stmt = $pdo->prepare("select * from alunos order by ra");
    $stmt ->execute();

    $fp = fopen("testeIII", "m");

    $colunasTitulo = array("ra", "nome", "curso");

    fputcsv($fp, $colunasTitulo);

    while($row = $stmt->fetch()){
        $ra = $row["ra"];
        $nome = $row["nome"];
        $curso = $row["curso"];

        $lista = array(
            array($ra, $nome, $curso)
        );

        foreach ($lista as $linha){
            fputcsv($fp, $linha);
        }
    }

    //linha
    
    }catch(PDOException $e){
        echo 'Error: ' . $e.getMessage();
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listagem de Alunos em CSV</title>
    </head>
    <body>
        <h1>Listagem de ALunos em CSV</h1>
        //linha
    </body>
    </html>