<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>excluir</title>
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
            <legend><b>Informe o ID do produto desejado</b></legend>
            <p>Id: <input name="txtid" type="text" size="40" maxlength="40" placeholder="Id do Produto"></p>
            <br><br>
            <center>
                <input name="btnenviar" type="submit" value="Excluir">
                <input name="limpar" type="reset" value="Limpar">
            </center>
        </fieldset>
        <br>
        <fieldset id="B">
            <legend><b>Resultado</b></legend>
            <?php
            extract($_POST, EXTR_OVERWRITE);
            if (isset($btnenviar)) {
                include_once 'Produto.php';
                $p = new Produto();
                $p->setId($txtid . '%');
                echo "<h3>" . $p->excluir() . "</h3>";
            }
            ?>
        </fieldset>
        <br><br>
        <center><button><a href="menu.html">Voltar</a></button></center>
    </form>
</body>

</html>