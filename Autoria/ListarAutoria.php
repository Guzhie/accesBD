<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Autorias Cadastradas</title>
    <style>
        body {
            font-family: "Century Gothic", sans-serif;
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
        button {
            margin-top: 20px;
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
        <h1>Relação de Autorias Cadastradas</h1>
        
        <?php
            include_once 'Autoria.php';
            $autoria = new Autoria();
            $autorais = $autoria->listar();
        ?>
        <br><br>
        <table>
            <tr>
                <th>Id Autor</th>
                <th>Id Livro</th>
                <th>Data de Lançamento</th>
                <th>Editora</th>
            </tr>
            <?php
            foreach($autorais as $autoria) {
                echo "<tr>";
                echo "<td>" . $autoria['codautor'] . "</td>";
                echo "<td>" . $autoria['codlivro'] . "</td>";
                echo "<td>" . $autoria['datalancamento'] . "</td>";
                echo "<td>" . $autoria['editora'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <center>
            <button><a href="cadastrarAutoria.php">Cadastrar Autoria</a></button>
            <button><a href="index.html">Voltar</a></button>
        </center>
    </div>
</body>
</html>
