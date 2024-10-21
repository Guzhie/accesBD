<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();

    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
        exit();
    }
    ?>
    <form name="cliente" method="POST" action="">

        <fieldset id="a">
            <legend><b>Dados do produto</b></legend>
            <p>Nome: <input name="txtnome" type="text" size="40" maxlength="40" placeholder="Nome do Produto"></p>
            <p>Estoque: <input name="txtestoq" type="text" size="10" placeholder="0"></p>
        </fieldset>
        <br>
        <fieldset id="b">
            <legend><b>Opções</b></legend>
            <br>
            <input name="btnenviar" type="submit" value="Cadastrar">
            <input name="limpar" type="submit" value="Limpar">

        </fieldset>
    </form>

    <?php
    extract($_POST, EXTR_OVERWRITE);
    if (isset($btnenviar)) {
        include_once 'Produto.php';
        $p = new Produto();
        $p->setNome($txtnome);
        $p->setEstoque($txtestoq);
        echo "<h3><br><br>" . $p->criar() . "</h3>";
    }
    ?>
    <br>
    <center>
        <button><a href="menu.html">Voltar</a></button>
    </center>
</body>

</html>