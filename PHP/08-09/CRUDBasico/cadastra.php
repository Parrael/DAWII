<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD - Controle de alunos</title>

    <style>
        #sucess {
            color: green;
            font-weight: bold;
        }

        #error {
            color: red;
            font-weight: bold;
        }

        #warning {
            color: orange;
            font-weight: bold;
        }

    </style>

</head>

<body>

<a href="index.html">Home</a>
<hr>

<h2>Cadastro de Alunos</h2>
<div>
    <form method="post" enctype="multipart/form-data">

        RA:<br>
        <input type="text" size="10" name="ra"><br><br>

        Nome:<br>
        <input type="text" size="30" name="nome"><br><br>

        Curso:<br>
        <select name="curso">
            <option></option>
            <option value="Edificações">Edificações</option>
            <option value="Enfermagem">Enfermagem</option>
            <option value="GeoCart">Geodésia e Cartografia</option>
            <option value="Informática">Informática</option>
            <option value="Mecânica">Mecânica</option>
            <option value="Qualidade">Qualidade</option>
        </select><br><br>

        Foto:<br>
        <input type="file" name="foto" accept="image/gif, image/png, image/jpg, image/jpeg"\><br><br>

        <input type="submit" value="Cadastrar">

        <hr>

    </form>
</div>

</body>
</html>

<?php

   //inserindo dados
        define('TAMANHO_MAXIMO', (2*1024*1024));
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {

        try {            
            $ra = $_POST["ra"];
            $nome = $_POST["nome"];
            $curso = $_POST["curso"];

            $foto = $_FILES["foto"];
            $nomeFoto = $foto["name"];
            $tipoFoto = $foto["type"];
            $tamanhoFoto = $foto["size"];


            if ((trim($ra) == "") || (trim($nome) == "")) {
                echo "<span id='warning'>RA e nome são obrigatórios!</span>";
            } else if(($nomeFoto != "") && (!preg_match('/^image\/(jpg|jpeg|png|gif)$/', $tipoFoto))){
                echo "<span id= 'error'>Não é uma imagem válida!</span>";
            } else if($tamanhoFoto > TAMANHO_MAXIMO){
                echo "<span id='error'>A imagem deve possuir no máximo 2MB</span>";
            }
            
            
            else {
                include("conexaoBD.php");
                //verificando se o RA informado já existe no BD para não dar exception
                    
                $stmt = $pdo->prepare("select * from alunos where ra = :ra");
                $stmt->bindParam(':ra', $ra);
                $stmt->execute();

                $rows = $stmt->rowCount();

                if ($rows <= 0) {

                    if($nomeFoto==""){
                        $fotoBinario = NULL;
                    } else {
                        $fotoBinario = file_get_contents($foto['tmp_name']);
                    }

                    $stmt = $pdo->prepare("insert into alunos (ra, nome, curso) values(:ra, :nome, :curso)");
                    $stmt->bindParam(':ra', $ra);
                    $stmt->bindParam(':nome', $nome);
                    $stmt->bindParam(':curso', $curso);
                    $stmt->bindParam(':foto', $fotoBinario);
                    $stmt->execute(); 

                    echo "<span id='sucess'>Aluno Cadastrado!</span>";
                } else {
                    echo "<span id='error'>Ra já existente!</span>";
                }
            }

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

        $pdo = null;
    }
?>