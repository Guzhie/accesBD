<head>
    <meta charset="UTF-8">
    <title>Poogers</title>
</head>

<body>
<center>
    <font face="Century Gothic" size="6"><b>Relação de Produtos Cadastrados</b><br><br><font size ="4">
<?php
    include_once'Produto.php';
    $p = new Produto();
    $pro_bd=$p->listar();
?>
<b>Id &nbsp;&nbsp;&nbsp;&nbsp; Nom &nbsp;&nbsp;&nbsp;&nbsp;Estoque</b>
<?php 
    foreach($pro_bd as $pro_mostrar){
            echo "<br><br><b>";
            echo $pro_mostrar[0]. "</b>";
            echo $pro_mostrar[1]. "</br>"; 
            echo $pro_mostrar[2]. "</br>";    
        
    }
    echo "<br><br><button><a href = 'index.html'>Voltar<a/></button>"?>
</body>