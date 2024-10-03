<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #5a464c;
            margin: 0;
            padding: 0;
            color: #333;
        }
        h1 {
            font-family: "Century Gothic", sans-serif;
            text-align: center;
            font-size: 2.5rem;
            margin-top: 50px;
        }

        form {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffefbc;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        fieldset {
            border: 2px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }

        legend {
            font-weight: bold;
            font-size: 1.2em;
            padding: 0 10px;
        }

        p {
            margin: 10px 0;
        }

        input[type="text"] {
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
            margin-top: 20px;
        }

        input[type="submit"], input[type="reset"] {
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

        input[name="voltar"] {
            background-color: #008CBA;
        }
        input[name="voltar"]:hover {
            background-color: #007B9E;
        }

        button {
            background-color: #008CBA;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        button:hover {
            background-color: #007B9E;
        }

        a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <form name="cliente" method="POST" action="AlterarLivro2.php">
    <h1>Alteração de Livros Cadastrados</h1>
        <fieldset id="a">
            <legend><b>Informe o Código do Livro</b></legend>
            <p>Código: <input name="codlivro" type="text" size="40" maxlength="40" placeholder="Código do Livro"></p>
        </fieldset>
        <div class="button-grid">
            <input name="btnenviar" type="submit" value="Alterar">
            <input name="limpar" type="reset" value="Limpar">
            <input type="submit" name="voltar" value="Voltar ao inicio" formaction="index.html">
            <input type="submit" name="voltar" value="Consultar" formaction="consultarLivro.php">

            </div>
        <br>
    </form>
</body>

</html>
