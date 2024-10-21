<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Autoria</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Montserrat:300&subset=latin-ext);

        body {
            font-family: Montserrat, sans-serif;
            background-color: #5a464c;
            color: #777;
            display: flex;
            flex-direction: column;
            margin: 0;
            min-height: 100vh;
            padding: 5%;
        }

        h1 {
            font-weight: 200;
            font-size: 2.2rem;
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
        }

        nav {
            margin: 0 auto;
            max-width: 1000px;
            background: #ffefbc;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, .15);
            padding: 10px;
        }

        nav::after {
            display: block;
            content: '';
            clear: both;
        }

        nav ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        nav ul li {
            float: left;
            position: relative;
        }

        nav ul li a {
            display: block;
            color: #333;
            text-decoration: none;
            padding: 1rem 2rem;
            border-top: 2px solid transparent;
            border-bottom: 2px solid transparent;
            transition: all .3s ease-in-out;
        }

        nav ul li a:hover,
        nav ul li a:focus {
            background: rgba(0, 0, 0, .15);
            color: white;
        }

        nav ul li a:not(:only-child)::after {
            padding-left: 4px;
            content: ' ▾';
        }

        nav ul li ul {
            display: none;
            position: absolute;
            background: #fff;
            box-shadow: 0 4px 10px rgba(10, 20, 30, .4);
            padding: 0;
            margin: 0;
            list-style: none;
            border-radius: 5px;
        }

        nav ul li ul li {
            min-width: 190px;
        }

        nav ul li ul li a {
            background: transparent;
            color: #555;
            border-bottom: 1px solid #DDE0E7;
            padding: 1rem 2rem;
        }

        nav ul li ul li a:hover,
        nav ul li ul li a:focus {
            background: #eee;
            color: #111;
        }

        nav ul li:hover > ul,
        nav ul li:focus-within > ul {
            display: block;
        }
    </style>
</head>

<body>
    <?php
    session_start();

    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
        exit();
    }
    ?>

    <h1>Autoria Menu</h1>

    <nav class="nav">
        <ul>
            <li class="has-submenu"><a href="#">Cadastrar</a>
                <ul class="submenu">
                    <li><a href="cadastrarLivro.php">Livro</a></li>
                    <li><a href="cadastrarAutor.php">Autor</a></li>
                    <li><a href="cadastrarAutoria.php">Autoria</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#">Alterar</a>
                <ul class="submenu">
                    <li><a href="AlterarLivro1.php">Livro</a></li>
                    <li><a href="AlterarAutor1.php">Autor</a></li>
                    <li><a href="AlterarAutoria1.php">Autoria</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#">Listar</a>
                <ul class="submenu">
                    <li><a href="ListarLivro.php">Livro</a></li>
                    <li><a href="ListarAutor.php">Autor</a></li>
                    <li><a href="ListarAutoria.php">Autoria</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#">Consultar</a>
                <ul class="submenu">
                    <li><a href="consultarLivro.php">Livro</a></li>
                    <li><a href="consultarAutor.php">Autor</a></li>
                    <li><a href="consultarAutoria.php">Autoria</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#">Excluir</a>
                <ul class="submenu">
                    <li><a href="ExcluirLivro.php">Livro</a></li>
                    <li><a href="ExcluirAutor.php">Autor</a></li>
                    <li><a href="ExcluirAutoria.php">Autoria</a></li>
                </ul>
            </li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</body>

</html>
