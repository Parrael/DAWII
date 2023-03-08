<?php
if($_SERVER["REQUEST_METHOD"] == 'GET'){
    $msgN1 = "";
    $msgN2 = "";
}
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    function calcMedia($n1, $n2){
        $media = ($n1+$n2)/2;
        return $media;
    }

    $n1 = $_GET["nota1"];
    $n2 = $_GET["nota2"];

    if( trim($n1 == "") || trim($n2 == "") ){
        echo "<span id='warning'> Informe as duas notas! </span>";
    }else{
        $media = calcMedia($n1, $n2);
    
        echo "Média = " . $media . "<br>";

        if($media >= 6.0){
            echo "<span id='aprovado'> Aprovado! </span>";
        }else{
            echo "<span id='reprovado'> Reprovado! </span>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Média</title>
        <style>
            #warning{
                color: red;
            }
            #reprovado{
                background-color: red;
                color: white;
                font-weight: bold;
            }
            #aprovado{
                background-color: green;
                color: white;
                font-weight: bold;
            }
        </style>
</head>
<body>
    <form method="post">
        Nota 1: <br>
        <input type="text" name="nota1"><br>
        <span id="warning"><small><?= $msgN1; ?></small></span>

        <br><br>

        Nota 2: <br>
        <input type="text" name="nota2"><br>
        <span id="warning"><small><?= $msgN2; ?></small></span>

        <br><br>

        <input type="submit" value="Calcular">
    </form>
</body>
