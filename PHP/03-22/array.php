<?php 
    $aExemplo = array( "ra"=> 187125,
                        "serie" => 3,
                        "aluno"=>array(
                            "nome"=>"José A.",
                            "sobrenome"=>"Matioli"
                        )
                     );
    echo $aExemplo["ra"] . " - " . $aExemplo["aluno"]["sobrenome"];

?>
