<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Autorias Cadastradas</title>
    <style>
        body {
            font-family: "Century Gothic", sans-serif;
        }
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <center>
        <h1>Relação de Autorias Cadastradas</h1>
        
        <?php
            include_once 'Autoria.php';
            $autoria = new Autoria();
            $autorias = $autoria->listar();
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
            foreach($autorias as $autoria) {
                echo "<tr>";
                echo "<td>" . $autoria['codautor'] . "</td>";
                echo "<td>" . $autoria['codlivro'] . "</td>";
                echo "<td>" . $autoria['datalancamento'] . "</td>";
                echo "<td>" . $autoria['editora'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <button><a href="index.html">Voltar</a></button>
    </center>
</body>
</html>
