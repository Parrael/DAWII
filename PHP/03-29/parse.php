<?php
    echo "<hr>Separando String em parse<br>";
    $str = "curso1=Informatica&curso2=Edificações&curso3=Enfermagem";
    parse_str($str, $cursos);
    print_r($cursos);

    echo "<hr>Separando String em explode<br>";
    $str2 = "Mathues Parra Ricardo";
    $nomes = explode(" ", $str2);
    print_r($nomes);

    echo "<hr>Juntando array em uma string <br>";
    $datas = array("29", "03", "2023");
    $datas2 = implode("/", $datas);
    echo $datas2;
?>