<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="menu.css">
    <link rel="stylesheet" type="text/css" href="criar.css">
    <script src='funcoes.js' type="text/javascript"></script>
    <title>Pedido</title>
    <?php include "mostrar.php"; ?>
</head>
<body onload="limite()">
<div class="container">
    <?php include'menu.html'?>
    <form method='post' action='imprimir.php' target='_blank'>
        <div class="row justify-content-center table-responsive">
            <?php prato(); ?>
        </div>
        
        <div class='input-group mb-3 input-group-prepend'>
            <label class='input-group-text' for='end'>Endereço: </label>
            <input class='form-control' type='text' id='end' name='en'>
        </div>
        
        <div id='botao' class='row col-12'>
            <button class='btn btn-light btn btn-primary btn-lg btn-block' onClick='window.location.reload();' 
            name='botao' value='1'>Imprimir</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</form>
</body>
</html>