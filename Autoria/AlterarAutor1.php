<!DOCTYPE html>
<html lang="en">

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
    <form name="cliente" method="POST" action="AlterarAutor2.php">
        <fieldset id="a">
            <legend><b>Informe o Codigo do Autor</b></legend>
            <p>Codigo: <input name="txtcod" type="text" size="40" maxlength="40" placeholder="Codigo do autor"></p>
        </fieldset>
        <div class="button-grid">
            <input name="btnenviar" type="submit" value="Consultar">
            <input name="limpar" type="reset" value="Limpar">
        </div>
        <br>
        <center><button><a href="index.html">Voltar</a></button></center>
    </form>
</body>

</html>