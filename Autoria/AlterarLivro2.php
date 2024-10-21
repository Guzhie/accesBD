<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

include_once 'Livro.php';
$p = new Livro();
$mensagem = '';
$pro_bd = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Se for alteração
    if (isset($_POST['btnAlterar'])) {
        $p->setCodlivro($_POST['codlivro']);
        $p->setTitulo($_POST['titulo']);
        $p->setCategoria($_POST['categoria']);
        $p->setIsbn($_POST['isbn']);
        $p->setIdioma($_POST['idioma']);
        $p->setQtdepag($_POST['qtdepag']);
        
        // Salvar a alteração
        $resultado = $p->alterar2();
        $mensagem = $resultado;

        // Recarregar os dados do livro atualizado
        $pro_bd = $p->alterar();
    } elseif (isset($_POST['codlivro'])) {
        // Buscar os dados do livro para exibir
        $p->setCodlivro($_POST['codlivro']);
        $pro_bd = $p->alterar(); // Busca os dados do livro pelo código
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Livro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #5a464c;
            margin: 0;
            padding: 0;
            color: #333;
        }

        fieldset {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffefbc;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        input[type="text"],
        input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        input[type="submit"] {
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            color: white;
            width: 48%;
        }

        input[name="btnAlterar"] {
            background-color: #4CAF50; /* Verde para o botão de alterar */
        }

        input[name="btnAlterar"]:hover {
            background-color: #45a049; /* Tom mais escuro ao passar o mouse */
        }

        input[name="btnVoltar"] {
            background-color: #f44336; /* Vermelho para o botão de voltar */
        }

        input[name="btnVoltar"]:hover {
            background-color: #e53935; /* Tom mais escuro ao passar o mouse */
        }

        h3 {
            text-align: center;
            color: #333;
        }

        .mensagem {
            text-align: center;
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <fieldset>
        <h2>Alterar Livro</h2>

        <?php if (!empty($mensagem)) { ?>
            <p class="mensagem"><?php echo $mensagem; ?></p>
        <?php } ?>

        <form name="livroForm" action="" method="post">
            <?php if (!empty($pro_bd)) {
                foreach ($pro_bd as $pro_mostrar) { ?>
                    <input type="hidden" name="codlivro" value="<?php echo $pro_mostrar['codlivro']; ?>">
                    <b>Código: <?php echo $pro_mostrar['codlivro']; ?></b><br><br>

                    <b>Título: </b>
                    <input type="text" name="titulo" value="<?php echo $pro_mostrar['titulo']; ?>"><br><br>

                    <b>Categoria: </b>
                    <input type="text" name="categoria" value="<?php echo $pro_mostrar['categoria']; ?>"><br><br>

                    <b>ISBN: </b>
                    <input type="text" name="isbn" value="<?php echo $pro_mostrar['isbn']; ?>"><br><br>

                    <b>Idioma: </b>
                    <input type="text" name="idioma" value="<?php echo $pro_mostrar['idioma']; ?>"><br><br>

                    <b>Quantidade de Páginas: </b>
                    <input type="number" name="qtdepag" value="<?php echo $pro_mostrar['qtdepag']; ?>"><br><br>

                    <div class="button-group">
                        <input type="submit" value="Alterar" name="btnAlterar">
                        <input type="submit" value="Voltar" name="btnVoltar" formaction="AlterarLivro1.php">
                    </div>
                <?php }
            } ?>
        </form>
    </fieldset>
</body>
</html>
