<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #5a464c;
            margin: 0;
            padding: 0;
        }
        form {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffefbc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        fieldset {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
        }
        legend {
            font-weight: bold;
            padding: 0 10px;
        }
        p {
            margin: 10px 0;
        }
        input[type="text"], input[type="date"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .button-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            color: white;
        }
        input[name="btnenviar"] {
            background-color: #4CAF50;
        }
        input[name="btnenviar"]:hover {
            background-color: #45a049;
        }
        input[name="limpar"] {
            background-color: #f44336;
        }
        input[name="limpar"]:hover {
            background-color: #e53935;
        }
        input[name="visualizar"], input[name="voltar"] {
            background-color: #008CBA;
            color: white;
        }
        input[name="visualizar"]:hover, input[name="voltar"]:hover {
            background-color: #007B9E;
        }
        h3 {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
        exit();
    }
    ?>
    <form name="cliente" method="POST" action="">
        <fieldset id="a">
            <legend><b>Dados do Autor</b></legend>
            <p>Nome do Autor: <input name="txtprnome" type="text" size="40" maxlength="40" placeholder="Primeiro Nome"></p>
            <p>Sobrenome do Autor: <input name="txtsbrnome" type="text" size="40" placeholder="Sobrenome"></p>
            <p>Email: <input name="txtemail" type="text" size="40" placeholder="****@gmail.com"></p>
            <p>Nascimento: <input name="txtnasc" type="date" size="10"></p>
        </fieldset>
        
        <?php 
            extract($_POST, EXTR_OVERWRITE);
            if (isset($btnenviar)) {
                include_once 'Autor.php';
                $p = new Autor();
                $p->setNomeautor($txtprnome);
                $p->setSobrenome($txtsbrnome);
                $p->setEmail($txtemail);
                $p->setNascimento($txtnasc);
                echo "<h3><br><br>" . $p->criar(). "</h3>";
            }
        ?>
        
        <br>
        <fieldset id="b">
            <legend><b>Opções</b></legend>
            <div class="button-grid">
                <input name="btnenviar" type="submit" value="Cadastrar">
                <input type="submit" name="visualizar" value="Visualizar Autor" formaction="ListarAutor.php">
                <input name="limpar" type="submit" value="Limpar"> 
                <input type="submit" name="voltar" value="Voltar" formaction="menu.php">
            </div>
        </fieldset>
    </form>
    <br>
</body>
</html>
