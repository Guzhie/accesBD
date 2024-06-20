<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Autores Cadastrados</title>
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
        <h1>Relação de Autores Cadastrados</h1>
        
        <?php
            include_once 'Autor.php';
            $autor = new Autor();
            $autores = $autor->listar();
        ?>
        <br><br>
        <table>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Email</th>
                <th>Nascimento</th>
            </tr>
            <?php
            foreach($autores as $autor) {
                echo "<tr>";
                echo "<td>" . $autor['codautor'] . "</td>";
                echo "<td>" . $autor['nomeautor'] . "</td>";
                echo "<td>" . $autor['sobrenome'] . "</td>";
                echo "<td>" . $autor['email'] . "</td>";
                echo "<td>" . $autor['nascimento'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <button><a href="index.html">Voltar</a></button>
    </center>
</body>
</html>
