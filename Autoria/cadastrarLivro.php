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
        <legend><b>Dados do Livro</b></legend>
            <p>Titulo: <input name="txttitulo" type="text" size="40" maxlength="40" placeholder= "Titulo do Livro"></p>
            <p>Categoria: <input name="txtcateg" type="text" size="40" placeholder= "Categoria do livro"></p>
            <p>isbn: <input name="txtisbn" type="text" size="10" placeholder= "0"></p>
            <p>idioma: <input name="txtidiomas" type="text" size="10" placeholder= "Idioma em que está escrito"></p>
            <p>Quantidade de pagina: <input name="txtqtdpag" type="text" size="10" placeholder= "0"></p>

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
            include_once 'Livro.php';
            $p = new Livro();
            $p -> setTitulo($txttitulo);
            $p -> setCategoria($txtcateg);
            $p -> setIsbn($txtisbn);
            $p -> setIdioma($txtidiomas);
            $p -> setQtdepag($txtqtdpag);  
            echo "<h3><br><br>" . $p->criar(). "</h3>";
        }
    ?>
    <br>
    <center>
        <button><a href="index.html">Voltar</a></button>
    </center>
</body>
</html>