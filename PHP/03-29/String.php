<?php
    $turmas = array(
        "3DSD" => array("201171"=>"Catarina Fagotti Bonifácio",
                        "201286"=>"Raphael Parra",
                        "201282" =>"Matheus Figueiredo"),
        "2DSD" => array("123123" => "Marcos",
                        "134134" => "Cauã",
                        "654654" => "Livia"),
        "1DSD" => array("111222" => "Matheus", 
                        "951951" => "Menezes",
                        "876876" => "Xurrasco")
                    );

    if(!isset($_GET["turma"]) || (trim($_GET["turma"]) == "")){
        echo "Informe a turma";
    }

    $turmas = strtoupper($_GET["turma"]); //Por eunquanto via url
    echo "<hr>Alunos da turma " . $turma . "</h1>";
    echo "<table border='1px'>";

    //rsort($turmas[$turma]);

    foreach($turmas[$turma] as $aluno){
        echo "<tr><td>" . $aluno . "</td></tr>";
    }
    echo "</table>";
?>