<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar</title>
</head>

<body>
    <form name="cliente" method="POST" action="">

        <fieldset id="a">
            <legend><b>Informe o nome do produto desejado</b></legend>
            <p>Nome: <input name="txtnome" type="text" size="40" maxlength="40" placeholder="Nome do Produto"></p>
            <br><br><center>
                <input name="btnenviar" type= "submit" value="Consultar"> 
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
                $p -> setNome($txtnome.'%');
                $pro_bd = $p -> consultar();
                    foreach($pro_bd as $pro_mostrar){
                        echo "<b>" . $pro_mostrar['id'] .  "&nbsp&nbsp&nbsp&nbsp </b>"; 
                        echo $pro_mostrar['nome'] . "&nbsp&nbsp&nbsp&nbsp";
                        echo $pro_mostrar['estoque'] ;
                        echo "</br> </br>";
                    }
                }
            ?>
        </fieldset>
        </form>
</body>

</html>