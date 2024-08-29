<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Autores Cadastrados</title>
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
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        button {
            margin: 0 10px;
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
        <div class="button-container">
            <button><a href="cadastrarAutor.php">Cadastrar Autor</a></button>
            <button><a href="ExcluirAutor.php">Excluir Autor</a></button>
            <button><a href="index.html">Voltar</a></button>
        </div>
    </div>
</body>
</html>
