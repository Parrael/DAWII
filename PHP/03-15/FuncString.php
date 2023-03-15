<?php
    $texto = "   cotil - unicamp";
    $senha = "senha123";
    $x = "";
    $salt = "";
    //trim - tira espaço
    echo "-" . trim($texto) . "-" . "<br>";

    //trim - tira espaço do inicio da String
    echo "-" . ltrim($texto) . "-" . "<br>";

    //trim - tira espaço do final da String
    echo "-" . rtrim($texto) . "-" . "<br><br>";

    //tudo maiusculo
    echo strtoupper($texto);

    //tudo minusculo
    echo strtolower($texto);

    //1a letra maiuscula
    echo "uc: " . ucfirst($texto) . "<br>";

    //1a letra minuscula
    echo "uc: " . ucwords($texto) . "<br>";
    
    //reversao da String 
    echo strrev($texto);

    //quebra a string a cada 3 caracteres
    $str = str_split($texto, 3);
    print_r($str);

    /*Criptografia de mão unica 
    problema: para a mesma string sempre o mesmo resultado.
    solução: concatenar um salt*/

    echo "<br> *** md5 ***";
    $x = md5($senha);
    echo ($x);
    echo "<br>";

    if(md5($senha) == $x){
        echo "Senha ok!<br><br>";
    }

    //Com salt - Uma string de salt para base de encriptação
    $salt = "c0tilUnicamp";
    $senha = $senha . $salt;
    echo "senha = " . $senha;
    echo "<br>";

    $x = md5($senha);
    echo ($x);
    echo "<br>";

    if(md5($senha) == $x){
        echo "Senha ok!<br><br>";
    }



    ?>