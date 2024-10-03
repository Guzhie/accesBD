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
        }

        h1 {
            font-family: "Century Gothic", sans-serif;
            text-align: center;
            font-size: 2.5rem;
            margin-top: 50px;
        }

        form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffefbc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
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
        }

        input[type="submit"],
        input[type="reset"] {
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
            margin-top: 20px;
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
    <form name="cliente" action="AlterarAutoria2.php" method="post">
        <h1>Alteração de Autoria Cadastrados</h1>
        <fieldset>
            <legend><b>Informe o Código do Livro e do Autor desejado:</b></legend>
            <p><b>Código do Autor:</b> <input type="text" name="codAutor" size="20" maxlength="5" placeholder="Código do Autor"></p>
            <p><b>Código do Livro:</b> <input type="text" name="codLivro" size="20" maxlength="5" placeholder="Código do Livro"></p>
        </fieldset>
        <div class="button-grid">
            <input type="submit" value="Alterar" name="btnenviar">
            <input type="reset" value="Limpar" name="limpar">
            <input type="submit" name="voltar" value="Voltar ao inicio" formaction="index.html">
            <input type="submit" name="voltar" value="Consultar" formaction="consultarAutoria.php">

        </div>
        <br>
    </form>
</body>

</html>
