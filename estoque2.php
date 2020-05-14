<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='estoque.css'>
    <link rel="stylesheet" type="text/css" href="menu.css">
    <title>Document</title>
    <script src='funcoes.js' type="text/javascript"></script>
</head>
<body onload="limite()">
    <div class="container">
        <?php include'menu.html'?><!-- Incluindo o menu -->
        <div class="row justify-content-center">
            <h1>Estoque de Consumo</h1>
        </div>
    <!-- É o formulario para adicionar o item no estoque-->
        <div class="row justify-content-center">
            <form id="b1" method="post" action="adicionar.php">
                <input type="text" id="nome" name="nome" required placeholder="Escreva o nome do produto">
                <input type="number" id="quantidade" name="quantidade" min="1"  required pattern="[0-9]+$" 
                    placeholder="Quantidade do item">
                <input type="text" id="valor" name="valor" min="0,01" required step="0,01" 
                    placeholder="Valor em R$" onKeyPress="return(moeda(this,'.',',',event))">
                <button name="botão" value="item-consumo" class="btn btn-primary">Adicionar</button>
            </form>
        </div>
    <!-- Esse botão vai deixa visivel o estoque ou invisivel -->
        <div id="a1" class="row justify-content-center"> 
            <button type="button" class="btn btn-secondary" onclick="Mudarestado('m')">Mostrar / Esconder</button> </div>
            <div id="m" class="row justify-content-center table-responsive">
                <?php include'mostrar.php'; mostrar_estoque("item-consumo"); ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>