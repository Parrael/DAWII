<?php
    $nome = "COTIL";
    echo $nome;
    echo "<br> <br>";

    var_dump($nome); //exibe tipo de dado, tamanho usado e valor 
    echo "<br> <br>";

    $outronome = "UNICAMP";

    echo $nome . "" . $outronome;
    echo "<br> <br>";

   unset($nome); //Remove a variável. Se quiser limpar várias, basta separar por ","

   if(!isset($nome)){
        echo "a variável está vazia. <br> <br>";
   }else{
        echo $nome;
        echo "<br><br>";
   }

   $valor = 50.15;
   echo $valor;
   echo "<br><br>";

   $aprovado = true;
   echo $aprovado;
   echo "<br><br>";

   $disciplinas = array("BD", "LP", "DAW");
   echo $disciplinas[2];
   echo "<br><br>";


   //----------------Constantes------------
   define("PI", 3.14);
   define("NOME_ALUNO", "Maria");

   $resultado = 3 * PI;
   echo $resultado . "<br><br>";
   echo "Nome do aluno: " . NOME_ALUNO . "<br><br>";

   
?>

