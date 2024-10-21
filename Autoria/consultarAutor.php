<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar</title>
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
            text-align: center;
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

        th,
        td {
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

        .return-button {
            margin-top: 20px;
            text-align: center;
        }

        .return-button a {
            padding: 10px 20px;
            border: none;
            background-color: #008CBA;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }

        .return-button a:hover {
            background-color: #007B9E;
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
    <div class="container">
        <h1>Consultar Autor</h1>
        <form name="cliente" method="POST" action="">
            <fieldset id="a">
                <legend>Informe o Nome do Autor Desejado</legend>
                <p>Título: <input name="txtnome" type="text" size="40" maxlength="40" placeholder="Título do Livro"></p>
                <div class="button-container">
                    <input name="btnenviar" type="submit" value="Consultar">
                    <input name="limpar" type="reset" value="Limpar">
                </div>
            </fieldset>
            <br>
            <fieldset id="B">
                <legend>Resultado</legend>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Email</th>
                        <th>Nascimento</th>
                    </tr>
                    <?php
                    extract($_POST, EXTR_OVERWRITE);
                    if (isset($btnenviar)) {
                        include_once 'Autor.php';
                        $autor = new Autor();
                        $autor->setNomeautor($txtnome . '%');
                        $autores = $autor->consultar();
                        foreach ($autores as $autor) {
                            echo "<tr>";
                            echo "<td>" . $autor['codautor'] . "</td>";
                            echo "<td>" . $autor['nomeautor'] . "</td>";
                            echo "<td>" . $autor['sobrenome'] . "</td>";
                            echo "<td>" . $autor['email'] . "</td>";
                            echo "<td>" . $autor['nascimento'] . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
            </fieldset>
        </form>
        <div class="return-button">
            <a href="menu.php">Voltar ao Início</a>
        </div>
    </div>
</body>

</html>