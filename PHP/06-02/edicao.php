<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Controle de Alunos</title>
</head>
<body>
    <a href="index.html">Home</a> | <a href="ex001.php">Consulta</a> | <a href="remove.php">Excluir</a>
    <hr>
    <h2>Edição de Alunos</h2>
</body>
</html>

<?php
    if(!isset($_POST["raAluno"])) {
        echo "Selecione o aluno a ser editado!";
    } else {
        $ra = $_POST["raAluno"];

        try {
            include("connection.php");
            $stmt = $pdo->prepare("select * from alunos where ra = :ra");
            $stmt->bindParam(':ra', $ra);
            $stmt->execute();

            while ($row = $stmt->fetch()) {
                echo "<form method='post' action='altera.php'>\n";
                echo "RA:<br>\n";
                echo "<input type='text' size='10' name='ra' value='$row[ra]' readonly><br><br>\n";
                echo "Nome:<br>\n";
                echo "<input type='text' size='30' name='nome' value='$row[nome]'><br><br>\n";
                echo "Curso:<br>\n";
                echo "<select name='curso'>\n
                <option></option>\n
                <option value='Edificações'>Edificações</option>\n
                <option value='Enfermagem'>Enfermagem</option>\n
                <option value='GeoCart'>Geodésia e Cartografia</option>\n
                <option value='Informatica'>Informática</option>\n
                <option value='Mecânica'>Mecânica</option>\n
                <option value='Qualidade>Qualidade</option>\n
                </select><br><br>\n";
                echo "<input type='submit' value='Salvar Alterações'>\n";
                echo "<hr>\n";
                echo "</form>";
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
?>