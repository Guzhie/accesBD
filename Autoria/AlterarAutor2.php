<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Autor</title>
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
        .button-group {
            display: flex;
            justify-content: space-between;
        }
        input[type="submit"] {
            width: 48%;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            color: white;
        }
        input[name="btnAlterar"] {
            background-color: #4CAF50;
        }
        input[name="btnAlterar"]:hover {
            background-color: #45a049;
        }
        input[name="btnVoltar"] {
            background-color: #f44336;
        }
        input[name="btnVoltar"]:hover {
            background-color: #e53935;
        }
        h3 {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
    <fieldset>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $txtcod = $_POST['txtcod'];
            include_once 'Autor.php';
            $p = new Autor();
            $p->setCodautor($txtcod);
            $pro_bd = $p->alterar();
        
            if (isset($_POST['btnAlterar'])) {
                $p->setNomeautor($_POST['txtnome']);
                $p->setSobrenome($_POST['txtsobre']);
                $p->setEmail($_POST['txtemail']);
                $p->setNascimento($_POST['txtnasci']);
                echo "<br><br><h3>" . $p->alterar2() . "</h3>";
            }
        }
        ?>

        <form name="cliente2" action="" method="post">
            <?php if (!empty($pro_bd)) {
                foreach ($pro_bd as $pro_mostrar) { ?>
                    <input type="hidden" name="txtcod" value="<?php echo $pro_mostrar[0]; ?>">
                    <b>Código: <?php echo $pro_mostrar[0]; ?></b>
                    <br><br><b>Nome: </b>
                    <input type="text" name="txtnome" value="<?php echo $pro_mostrar[1]; ?>">
                    <br><br><b>Sobrenome: </b>
                    <input type="text" name="txtsobre" value="<?php echo $pro_mostrar[2]; ?>">
                    <br><br><b>Email: </b>
                    <input type="text" name="txtemail" value="<?php echo $pro_mostrar[3]; ?>">
                    <br><br><b>Data de Nascimento: </b>
                    <input type="date" name="txtnasci" value="<?php echo $pro_mostrar[4]; ?>">
                    <br><br>

                    <div class="button-group">
                        <input type="submit" value="Alterar" name="btnAlterar">
                        <input type="submit" value="Voltar" name="btnVoltar" formaction="AlterarAutor1.php">
                    </div>
                <?php }
            } ?>
        </form>
    </fieldset>
</body>
</html>
