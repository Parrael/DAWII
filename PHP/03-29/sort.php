<?php
    $arrayExemplo  = array("Linguagem1" => "Php", "Linguagem 2" => "SQL",
    "Linguagem 3" => 100, "Linguagem 4" => "Assembly");

    print_r($arrayExemplo);

    //função para embaralhar
    //shuffle($arrayExemplo);     
    //echo "<hr>Após 'ordenar' com sort(array)<br>";

    //função para ordenar de forma decrescente
    rsort($arrayExemplo);
    echo "<hr>Após 'ordenar' com rsort(array)<br>";

    print_r($arrayExemplo);
?>