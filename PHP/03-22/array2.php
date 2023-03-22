<?php
    $meuArray = array("Maçã", "Banana", "Uva");

    //echo($meuArray) não funciona - imprime string
    //echo($meuArray[0]) funciona - na posicao 0 tem String

    print_r($meuArray);

    //tira um valor da array
    unset($meuArray[1]);
    echo "<br>";
    print_r($meuArray);

    //add um valor a array
    $meuArray[1] = "Banana";
    echo "<br>";
    print_r($meuArray);

    //organiza valores
    sort($meuArray);
    echo "<br>";
    print_r($meuArray);

    echo count($meuArray);
    echo "<br>";
    echo sizeof($meuArray);

    for($i == 0; $i < sizeof($meuArray); $i++){
        echo $meuArray[$i] . ", ";
    }

    foreach($meuArray as $fruta){
        echo $fruta . ", ";
    }

    print_r($meuArray);
    echo "<br>";
?>

