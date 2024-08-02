<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Autoria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #5a464c;
            margin: 0;
            padding: 0;
            color: #fff;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffefbc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            width: 100%;
            margin: 0 auto;
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
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            border: none;
            background-color: #008CBA;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        button a {
            color: white;
            text-decoration: none;
        }
        button:hover {
            background-color: #007B9E;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastro de Autoria</h1>
        <form name="cliente" method="POST" action="">
            <fieldset id="a">
                <legend><b>Dados da Autoria</b></legend>
                <p>Código do Autor: <input name="txtcodautor" type="text" size="40" maxlength="40" placeholder="Código do cadastro do Autor"></p>
                <p>Código do Livro: <input name="txtcodlivro" type="text" size="40" maxlength="40" placeholder="Código do cadastro do Livro"></p>
                <p>Data de Lançamento: <input name="txtdatalanc" type="date" size="10"></p>
                <p>Nome da Editora: <input name="txteditora" type="text" size="40" maxlength="40" placeholder="Editora da publicação do livro"></p>
            </fieldset>
            <fieldset id="b">
                <legend><b>Opções</b></legend>
                <div class="button-grid">
                <input name="btnenviar" type="submit" value="Cadastrar">
                <input type="submit" name="visualizar" value="Visualizar Autoria" formaction="ListarAutoria.php">
                <input name="limpar" type="submit" value="Limpar"> 
                <input type="submit" name="voltar" value="Voltar" formaction="index.html">
                </div>
            </fieldset>
        </form>

        <?php 
            extract($_POST, EXTR_OVERWRITE);
            if (isset($btnenviar)) {
                include_once 'Autoria.php';
                $p = new Autoria();
                $p->setCodautor($txtcodautor);
                $p->setCodlivro($txtcodlivro);
                $p->setDatalancamento($txtdatalanc);
                $p->setEditora($txteditora);
                echo "<h3><br><br>" . $p->criar(). "</h3>";
            }
        ?>
    </div>
</body>
</html>
