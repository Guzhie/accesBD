<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #5a464c;
            margin: 0;
            padding: 0;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: #ffefbc;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 28px;
            margin-bottom: 30px;
        }

        fieldset {
            border: none;
            padding: 0;
            margin: 0;
        }

        p {
            margin: 15px 0;
            font-size: 16px;
            color: black;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #008CBA;
            outline: none;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        input[type="submit"] {
            padding: 12px 30px;
            border: none;
            background-color: #008CBA;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #007B9E;
        }

        
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form name="cliente" action="" method="POST">
            <fieldset>
                <p>Usuário: <input name="txtUsuario" required type="text" placeholder="Digite seu usuário"></p>
                <p>Senha: <input name="txtSenha" required type="password" placeholder="Digite sua senha"></p>
            </fieldset>
            <div class="button-container">
                <input name="btnconsultar" type="submit" value="Acessar">
            </div>
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
    </div>
</body>

</html>
