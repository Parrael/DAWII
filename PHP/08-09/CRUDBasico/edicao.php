<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD - Controle de alunos</title>
</head>

<body>
    <a href="index.html">Home</a> | <a href="consulta.php">Consulta</a>
    <hr>
    <h2>Edição de Alunos</h2>
</body>
</html>

<?php

//if (!isset($_POST["raAluno"])) {
if (!isset($_GET["raAluno"])) {
    echo "Selecione o aluno a ser editado!";
} else {
    //$ra = $_POST["raAluno"];
    $ra = $_GET["raAluno"];

    try {
        include("conexaoBD.php");
        $stmt = $pdo->prepare('select * from alunos where ra = :ra');
        $stmt->bindParam(':ra', $ra);
        $stmt->execute();

        $edificacoes = "";
        $enfermagem = "";
        $geodesia = "";
        $informatica = "";
        $mecanica = "";
        $qualidade = "";        
  
        while ($row = $stmt->fetch()) {

            //para setar o curso correto no combo
            if ($row['curso'] == "Edificações") {
                $edificacoes = "selected";
            } else if ($row['curso'] == "Enfermagem") {
                $enfermagem = "selected";
            } else if ($row['curso'] == "GeoCart") {
                $geodesia = "selected";
            } else if ($row['curso'] == "Informática") {
                $informatica = "selected";
            } else if ($row['curso'] == "Mecânica") {
                $mecanica = "selected";
            } else if ($row['curso'] == "Qualidade") {
                $qualidade = "selected";
            }            

            echo "<form method='post' action='altera.php'>\n";
            echo "RA:<br>\n";
            echo "<input type='text' size='10' name='ra' value='$row[ra]' readonly><br><br>\n";
            echo "Nome:<br>\n";
            echo "<input type='text' size='30' name='nome' value='$row[nome]'><br><br>\n";
            echo "Curso:<br>\n";
            echo "<select name='curso'>\n
                    <option></option>\n
                    <option value='Edificações' $edificacoes>Edificações</option>\n
                    <option value='Enfermagem' $enfermagem>Enfermagem</option>\n
                    <option value='GeoCart' $geodesia>Geodésia e Cartografia</option>\n
                    <option value='Informática' $informatica>Informática</option>\n
                    <option value='Mecânica' $mecanica>Mecânica</option>\n
                    <option value='Qualidade' $qualidade>Qualidade</option>\n
                 </select><br><br>\n";
            echo "<input type='submit' value='Salvar Alterações'>\n";
            echo "<hr>\n";
            echo "</form>";
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

    $pdo = null;
}

?>