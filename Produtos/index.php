<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form name="cliente" action="" method="POST">
        <fieldset id='S'>
            <p>Usuario: <input name="txtUsuario" required type="text" placeholder="Digite seu usuario"></p>
            <p>Senha: <input name="txtSenha" required type="text" maxlength="" placeholder="Digite sua Senha"></p>
        </fieldset>
        <br>
        <fieldset id='b'>
        <legend><b>Opções</b></legend>
            <br>
            <input name="btnconsultar" type="submit" value="Acessar">
        </fieldset>
    </form>

    <?php
    extract($_POST, EXTR_OVERWRITE);
    if (isset($btnconsultar)) {
        include_once 'Usuario.php';
        $u = new Usuario();
        $u->setUsuario($txtUsuario);
        $u->setSenha($txtSenha);
        $pro_bd=$u->logar();

        $exist = false;
        foreach ($pro_bd as $pro_mostrar) {
            $exist = true;
            ?>
            <br><b><?php echo "Bem vindo Usuario: " . $pro_mostrar[1];?></b><br><br>
            <center><a href="menu.html"><input type="button" name="btnentrar" value="Entrar"></a></center>
            <?php
        }
        if ($exist==false) {
            header("location:loginInvalido.html");
        }
    }
    ?>
</body>

</html>