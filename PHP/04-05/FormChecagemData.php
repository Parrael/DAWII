<?php
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        
        $data = $_POST["data"];

        $v_data = explode("/", $data);

        $dia = $v_data[0];
        $mes = $v_data[1];
        $ano = $v_data[2];

        if(checkdate($mes, $dia, $ano))
            echo "Data válida! <br>";
        else
            echo "Data inválida! <br>";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checagem de Data</title>
</head>
<body>
    <<h2>Cadastro de evento</h2>
    <form method="post">
        Data do evento: <br>
        <input type="date" name="data" value="">

        <br><br>

        <input type="submit" name="submit" value="Ok">
    </form>
</body>
</html>