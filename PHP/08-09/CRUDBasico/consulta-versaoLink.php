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

             echo "<table border='1px'>";
             echo "<tr>";
             echo "<th>RA</th>";
             echo "<th>Nome</th>";
             echo "<th>Curso</th>";
             echo "<th colspan=2></th>";
             echo "</tr>";

             while ($row = $stmt->fetch()) {
                 echo "<tr>";
                 echo "<td>" . $row['ra'] . "</td>";
                 echo "<td>" . $row['nome'] . "</td>";
                 echo "<td>" . $row['curso'] . "</td>";

                 // escrevendo dentro da td o link para -> remove.php?ra=3
                 echo "<td>";
                 
                 echo "<a href='remove.php?raAluno=";
                 echo $row['ra'];
                 echo "'><img src='excluir.png' width='16px'>";
                 echo "</a>";

                 echo "</td>";

                 echo "<td>";
                 
                 echo "<a href='edicao.php?raAluno=";
                 echo $row['ra'];
                 echo "'><img src='edicao.png' width='16px'>";
                 echo "</a>";

                 echo "</td>";
                 echo "</tr>";
             }

             echo "</table>";

         } catch (PDOException $e) {
             echo 'Error: ' . $e->getMessage();
         }

         $pdo = null;
     }// fechamento do if do post
?>