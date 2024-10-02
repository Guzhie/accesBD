<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Autoria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #5a464c;
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        fieldset {
            width: 90%;
            max-width: 600px;
            margin: 20px;
            padding: 20px;
            background-color: #ffefbc;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            border: none;
        }

        h1 {
            font-family: "Century Gothic", sans-serif;
            text-align: center;
            font-size: 2.5rem;
            margin-top: 0;
            color: #333;
        }

        p {
            margin: 10px 0;
        }

        input[type="text"],
        input[type="date"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="text"]:focus,
        input[type="date"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        input[type="submit"],
        button {
            flex: 1;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            color: white;
            margin: 0 5px;
            transition: background-color 0.3s;
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

        a {
            color: white;
            text-decoration: none;
            display: block;
            text-align: center;
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
        $codLivro = $_POST['codLivro'];
        $codAutor = $_POST['codAutor'];

        include_once 'Autoria.php';
        $p = new Autoria();
        $p->setCodlivro($codLivro);
        $p->setCodautor($codAutor);

        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnAlterar)) {
            $pro = new Autoria();
            $pro->setCodautor($codAutor);
            $pro->setCodlivro($codLivro);
            $pro->setDatalancamento($txtLanca);
            $pro->setEditora($txtEdit);
            echo "<br><h3>" . $pro->alterar2() . "</h3>";
        }

        $pro_bd = $p->alterar();
        ?>
        <form name="autoria2" action="" method="post">
            <h1>Verifique os Dados da Autoria</h1>
            <?php
            foreach ($pro_bd as $pro_mostrar) {
            ?>
                <input type="hidden" name="codAutor" size="5" value='<?php echo ($pro_mostrar['codautor']) ?>'>
                <input type="hidden" name="codLivro" size="5" value='<?php echo ($pro_mostrar['codlivro']) ?>'>
                <b><?php echo "Código do Autor: " . ($pro_mostrar['codautor']) ?></b><br>
                <b><?php echo "Código do Livro: " . ($pro_mostrar['codlivro']) ?></b><br><br>
                <b><?php echo "Data de Lançamento: "; ?></b>
                <input type="date" name="txtLanca" value='<?php echo ($pro_mostrar['datalancamento']) ?>'><br>
                <b><?php echo "Editora: "; ?></b>
                <input type="text" name="txtEdit" value='<?php echo ($pro_mostrar['editora']) ?>'><br>
                <div class="button-group">
                    <input type="submit" value="Alterar" name="btnAlterar">
                    <input type="submit" value="Voltar" name="btnVoltar" formaction="AlterarAutoria1.php">
                </div>
            <?php
            }
            ?>
        </form>
    </fieldset>
</body>

</html>
