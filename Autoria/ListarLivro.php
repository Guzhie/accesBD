<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Livros Cadastrados</title>
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
        <h1>Relação de Livros Cadastrados</h1>
        
        <?php
            include_once 'Livro.php';
            $livro = new Livro();
            $livros = $livro->listar();
        ?>
        <br><br>
        <table>
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Categoria</th>
                <th>ISBN</th>
                <th>Idioma</th>
                <th>Quantidade de Páginas</th>
            </tr>
            <?php
            foreach($livros as $livro) {
                echo "<tr>";
                echo "<td>" . $livro['codlivro'] . "</td>";
                echo "<td>" . $livro['titulo'] . "</td>";
                echo "<td>" . $livro['categoria'] . "</td>";
                echo "<td>" . $livro['isbn'] . "</td>";
                echo "<td>" . $livro['idioma'] . "</td>";
                echo "<td>" . $livro['qtdepag'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <button><a href="index.html">Voltar</a></button>
    </center>
</body>
</html>
