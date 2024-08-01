<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form name="cliente" method="POST" action="">

    <fieldset id="a">
        <legend><b>Dados do Autor</b></legend>
            <p>Codigo do Autor: <input name="txtcodautor" type="text" size="40" maxlength="40" placeholder= "Codigo do cadastro do Autor"></p>
            <p>Codigo do Livro: <input name="txtcodlivro" type="text" size="40" maxlength="40" placeholder= "Codigo do cadastro do Livro"></p>
            <p>Data de Lançamento: <input name="txtdatalanc" type="date" size="10" ></p>
            <p>Nome da Editora <input name="txteditora" type="text" size="40" maxlength="40" placeholder= "Editora da publicação do livro"></p>
    </fieldset>
    <br>
    <fieldset id="b">
        <legend><b>Opções</b></legend>
            <br>
            <input name="btnenviar" type="submit" value="Cadastrar">
            <input name= "limpar" type="submit" value="Limpar"> 

    </fieldset>
    </form>

    <?php 
        extract($_POST, EXTR_OVERWRITE);
        if (isset ($btnenviar)) {
            include_once 'Autoria.php';
            $p = new Autoria();
            $p -> setCodautor($txtcodautor);
            $p -> setCodlivro($txtcodlivro);
            $p -> setDatalancamento($txtdatalanc);
            $p -> setEditora($txteditora);
            echo "<h3><br><br>" . $p->criar(). "</h3>";
        }
    ?>
    <br>
    <center>
        <button><a href="index.html">Voltar</a></button>
    </center>
</body>
</html>