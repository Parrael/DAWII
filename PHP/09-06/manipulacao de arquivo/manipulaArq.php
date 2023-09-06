<?php
    $filename = fopen("log.txt", 'a+');

    fwrite($filename, date("Y-m-d H:i:s"));
    fwrite($filename, "\n");
    
    fclose($filename);

    echo "Arquivo criado com sucesso";
?>