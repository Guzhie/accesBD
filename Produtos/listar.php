<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Poogers</title>
    <style>
        body {
            font-family: "Century Gothic", sans-serif;
        }

    </style>
</head>

<body>
    <center>
        <h1>Relação de Produtos Cadastrados</h1>
        <?php
            include_once 'Produto.php';
            $p = new Produto();
            $pro_bd = $p->listar();
            ?><br><br>

                <?php
                echo "<table>";
                echo "Id &nbsp&nbsp&nbsp Nome &nbsp&nbsp&nbsp&nbsp Estoque &nbsp&nbsp&nbsp&nbsp <br><br>";
                
                foreach($pro_bd as $pro_mostrar){
                    echo "<b>" . $pro_mostrar['id'] . "</b>"; 
                    echo $pro_mostrar['nome'] . "&nbsp&nbsp&nbsp&nbsp";
                    echo $pro_mostrar['estoque'] . "&nbsp&nbsp&nbsp&nbsp";;
                }

                echo "</table>";
            ?>
        <button><a href="index.html">Voltar</a></button>
    </center>
</body>
</html>
