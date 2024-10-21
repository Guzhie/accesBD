<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
</head>

<body>
    <fieldset>
        <?php
        session_start();

        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php");
            exit();
        }
        ?>
        
        <?php
        $txtid = $_POST['txtid'];
        include_once './produto.php';
        $p = new Produto();
        $p->setId($txtid);
        $pro_bd = $p->alterar();

        extract($_POST, EXTR_OVERWRITE);
        if (isset($_POST['btnAlterar'])) {
            $p->setId($txtid);
            $p->setNome($_POST['txtnome']);
            $p->setEstoque($_POST['txtestoq']);
            echo "<br><br><h3>" . $p->alterar2() . "</h3>";
        }

        $p->setId($txtid);
        $pro_bd = $p->alterar();

        ?>
        <br>
        <form name="cliente2" action="" method="post">
            <?php

            foreach ($pro_bd as $pro_mostrar) {
                include_once './produto.php';
            ?>
                <input type="hidden" name="txtid" size="5" value='<?php echo $pro_mostrar[0] ?>'>
                <b><?php echo "ID:" . $pro_mostrar[0] //posição; 
                    ?></b>
                <br><br><b><?php echo "Nome: "; ?></b>
                <input type="text" name="txtnome" size="25" value='<?php echo $pro_mostrar[1] ?>'>
                <br><br><b><?php echo "Estoque :"; ?></b>
                <input type="text" name="txtestoq" size="10" value='<?php echo $pro_mostrar[2] ?>'>
                <br><br>

                <center>
                    <input type="submit" value="Alterar" name="btnAlterar">
                <?php
            }
                ?>
                </center>
        </form>
    </fieldset>
</body>

</html>