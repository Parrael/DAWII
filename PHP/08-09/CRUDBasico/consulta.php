<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD - Controle de alunos</title>
</head>

<body>
<a href="index.html">Home</a>
<hr>

<h2>Consulta de Alunos</h2>
    <form method="post">
        RA:<br>
        <input type="text" size="10" name="ra">
        <input type="submit" value="Consultar">
        <hr>
    </form>
</body>
</html>

<?php
     if ($_SERVER["REQUEST_METHOD"] === 'POST') {

        include("conexaoBD.php");

         if (isset($_POST["ra"]) && ($_POST["ra"] != "")) {
             $ra = $_POST["ra"];
             $stmt = $pdo->prepare("select * from alunos where ra= :ra order by curso, nome");
             $stmt->bindParam(':ra', $ra);
         } else {
             $stmt = $pdo->prepare("select * from alunos order by curso, nome");
         }

         try {
             //buscando dados
             $stmt->execute();

             echo "<form method='post'>";
             echo "<table border='1px'>";
             echo "<tr>";
             echo "<th></th>";
             echo "<th>RA</th>";
             echo "<th>Nome</th>";
             echo "<th>Curso</th>";
             echo "<th>Foto</th>";
             echo "</tr>";

             while ($row = $stmt->fetch()) {
                 echo "<tr>";
                 echo "<td><input type='radio' name='raAluno' 
                      value='" . $row['ra'] . "'>";
                 echo "<td>" . $row['ra'] . "</td>";
                 echo "<td>" . $row['nome'] . "</td>";
                 echo "<td>" . $row['curso'] . "</td>";

                if($row["foto"] == null){
                    echo "<td align='center'> - </td>";
                }else{
                    echo "<td align='center'><img src='data:image;base64," . base64_decode($row["foto"]) . "' width='50px' height='50px'></td>";
                }

                 echo "</tr>";
             }

             echo "</table><br>";

             echo "<button type='submit' formaction='remove.php'>Excluir Aluno</button>";
             echo "<button type='submit' formaction='edicao-versaoSemEcho.php'>Editar Aluno</button>";
             echo "</form>";

         } catch (PDOException $e) {
             echo 'Error: ' . $e->getMessage();
         }

         $pdo = null;
     }// fechamento do if do post
?>