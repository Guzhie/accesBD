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
            <p>Nome do Autor: <input name="txtprnome" type="text" size="40" maxlength="40" placeholder= "Primeiro Nome"></p>
            <p>Sobrenome do Autor: <input name="txtsbrnome" type="text" size="10" placeholder= "Sobrenome"></p>
            <p>Email: <input name="txtemail" type="text" size="10" placeholder= "****@gmail"></p>
            <p>Nascimento: <input name="txtnasc" type="date" size="10"></p>
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
            include_once 'Autor.php';
            $p = new Autor();
            $p -> setNomeautor($txtprnome);
            $p -> setSobrenome($txtsbrnome);
            $p -> setEmail($txtemail);
            $p -> setNascimento($txtnasc);
            echo "<h3><br><br>" . $p->criar(). "</h3>";
        }
    ?>
    <br>
    <center>
        <button><a href="index.html">Voltar</a></button>
    </center>
</body>
</html>