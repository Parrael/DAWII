<?php
    $n=11;
    $tabuada=7;

    echo "While";
    while($n<=10){
        echo $n. " x " . $tabuada . " = " . ($n * $tabuada) . "<br>";
        $n++;
    }

    echo "<br>";
    echo "Do while";
    $n=1;
    $tabuada=7;
    do{
        echo $n. " x " . $tabuada . " = " . ($n * $tabuada) . "<br>";
        $n++;
    }while($n<=10)

?>