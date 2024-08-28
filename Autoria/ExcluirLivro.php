<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Livro</title>
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

        fieldset {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
        }

        legend {
            color: #333;
            font-size: 18px;
            font-weight: bold;
        }

        p {
            color: #333;
            margin: 10px 0;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 10px 20px;
            border: none;
            background-color: #008CBA;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            margin: 0 10px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #007B9E;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        td {
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .button-row {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .left-buttons, .right-button {
            display: flex;
        }

        .left-buttons a,
        .right-button a {
            padding: 10px 20px;
            border: none;
            background-color: #008CBA;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 10px;
        }

        .left-buttons a:hover,
        .right-button a:hover {
            background-color: #007B9E;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Excluir Livro</h1>
        <form name="cliente" method="POST" action="">
            <fieldset id="a">
                <legend>Informe o Código do Livro Desejado</legend>
                <p>Código do Livro: <input name="txtcod" type="text" size="40" maxlength="40" placeholder="ID do Livro"></p>
                <div class="button-container">
                    <input name="btnenviar" type="submit" value="Excluir"> 
                    <input name="limpar" type="reset" value="Limpar">
                </div>
            </fieldset>

            <fieldset id="B">
                <legend>Resultado</legend>
                <?php 
                extract($_POST, EXTR_OVERWRITE);
                if (isset($btnenviar)) {
                    include_once 'Livro.php';
                    $livro = new Livro();
                    $livro->setCodlivro($txtcod.'%');
                    echo "<h3>" . $livro->excluir() . "</h3>";
                }
                ?>
            </fieldset>
        </form>
        <div class="button-row">
            <div class="left-buttons">
                <a href="cadastrarLivro.php">Cadastrar Livro</a>
                <a href="ListarLivro.php">Listar Livros</a>
            </div>
            <div class="right-button">
                <a href="index.html">Voltar ao Início</a>
            </div>
        </div>
    </div>
</body>
</html>
