<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="menu.css">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' media='screen' href='prato.css'>
    <script src="funcoes.js" type="text/javascript"></script>
    <?php 
        session_start(); 
        include "mostrar.php"; 
        if(isset($_SESSION['nao_autenticado'])):?>
            <script> alerta();</script>
           <?php endif; unset($_SESSION['nao_autenticado']);
    ?>
</head>
<body onload="limite()">
    <div class="container">
        <?php include'menu.html'?><br>
        <!-- Vai ter dois botões que mostrar duas funções um de 
        criar o prato e a outra de mostrar os platos prontos -->
        <div id="botoes" class="btn-group row col-12 justify-content-center" role="group" aria-label="Basic example">
            <button id="b1" class="btn btn-secondary col-2" onclick="mostrar('m','a')">Criação prato</button>
            <button class="btn btn-secondary col-2" onclick="mostrar('a','m')">Pratos prontos</button>
        </div>
        
        <div id="a" class="row justify-content-center table-responsive">
            <?php prato_feito(); ?>  
        </div>
        <div id="m" class="row d-flex justify-content-center">
            <form action="adicionar.php" method="post">
                <div class="form-group row">
                    <Label for="nome" class="col-6 col-form-label">Nome do Prato:</Label>
                    <input type="text" id="nome" class="col-6 form-control" name="nome" placeholder="Hamburguer" required>
                </div>

                <div class="form-group row">
                    <label for="valor" class="col-6 col-form-label">Valor:</label>
                    <input type="text" id="valor" name="valor" class="col-6 form-control"
                    onKeyPress="return(moeda(this,'.',',',event))" step="0.01" min="0,01" required>
                </div>

                <div class="row-col-12 justify-content-center table-responsive">
                        <?php prato(); ?>
                </div>

                <div id='botao' class='row col-12'>
                    <button name="botao" value="2" class='btn btn-light btn btn-primary btn-lg 
                    btn-block'>Criar</button>
                </div>
            </form>
        </div>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>