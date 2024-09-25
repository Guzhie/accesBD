<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
</head>

<body>
    <form name="cliente" method="POST" action="alterar.php">

        <fieldset id="a">
            <legend><b>Informe o ID do produto desejado</b></legend>
            <p>Id: <input name="txtid" type="text" size="40" maxlength="40" placeholder="Id do Produto"></p>
            <br><br>
            <center>
                <input name="btnenviar" type="submit" value="Consultar">
                <input name="limpar" type="reset" value="Limpar">
            </center>
        </fieldset>
        <br>
        <center><button><a href="index.html">Voltar</a></button></center>
    </form>
</body>

</html>