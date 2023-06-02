<?php
    try{
        $db = 'mysql:host=143.106.241.3;dbname=cl201286;charset=utf8';
        $user='cl201286';
        $passwd='cl*08082005';
        $pdo = new PDO($db, $user, $passwd);

        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        $output = 'Impossível connect BD: ' . $e . '<br>';
        echo $output;
    }
?>