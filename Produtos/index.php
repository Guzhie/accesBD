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
session_start(); // Iniciar a sessão

extract($_POST, EXTR_OVERWRITE);
if (isset($btnconsultar)) {
    include_once 'Usuario.php';
    $u = new Usuario();
    $u->setUsuario($txtUsuario);
    $u->setSenha($txtSenha);
    $pro_bd = $u->logar();

    $exist = false;
    foreach ($pro_bd as $pro_mostrar) {
        $exist = true;
        // Cria a sessão para o usuário logado
        $_SESSION['usuario'] = $pro_mostrar[0];
        header("Location: menu.php"); // Redireciona para o menu após login bem-sucedido
        exit();
    }

    if (!$exist) {
        header("location: loginInvalido.html");
    }
}
?>


</body>

</html>