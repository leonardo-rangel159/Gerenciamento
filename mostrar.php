<?php
  error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
  echo ("<script>function marcardesmarcar(a){
    document.getElementById(a).checked = true;
  }</script>");
  /* Essa função ir mostrar os dados da tabela estoque */
  function mostrar_estoque($el){//el é o dado de qual tabela do estoque vai mudar
    include('conexao.php');
    $a = "SELECT * FROM `$el`";
    $resultado=mysqli_query($conexao, $a);
    $quant = mysqli_num_rows($resultado);
    echo ("
    <form method='post' action='adicionar.php'>
      <table class='table'>
        <thead class='table-dark'>
          <tr>
            <td scope='col'>#</td>
            <td scope='col'>Nome</td>
            <td scope='col'>Quantidade</td>
            <td scope='col'>Valor</td>
          </tr>
        </thead>
    ");
    for($i=0;$i<$quant;$i++){
      $rows=$resultado->fetch_assoc();
      echo ("
      <tr>
        <th scope='row'>
          <input type='checkbox' id='$i' name='caixas[]' value='$rows[iditem]'>
        </th>
        <td>
          <input type='text' onclick='marcardesmarcar($i)'id='nome' name='nome$rows[iditem]' 
          value='$rows[nome]'>
        </td>
        <td>
          <input type='number' onclick='marcardesmarcar($i)' id='quantidade' 
          name='quantidade$rows[iditem]' min='1' required pattern='[0-9]+$' 
          value='$rows[quantidade]'>
        </td>
        <td>
          <input type='number' onclick='marcardesmarcar($i)' id='valor$i' name='valor$rows[iditem]' 
          min='0.00' step='0.01' onKeyPress='return(moeda(this,'.',',',event))' value='$rows[valor]'>
        </td>
      </tr>
      ");
    }
    echo ("</table>");
    echo ("<div class='row col-12 justify-content-center justify-content-around'>");
    echo ("<button name='botao1'value='$el' class='btn btn-success  col-5'>Salvar</button>");
    echo ("<button name='botao2'value='$el' class='btn btn-danger col-5'>Excluir</button></form></div></div>");
  }
  
  /* Essa função ir mostrar os dados da tabela estoque com mais algumas funções*/
  function prato(){
    include('conexao.php');
    $a = "SELECT * FROM `item`";
    $resultado=mysqli_query($conexao, $a);
    $quant = mysqli_num_rows($resultado);
    echo ("<table class='table'>
    <thead class='table-dark'>
        <tr>
          <td>Select</td>
          <td>Nome</td>
          <td>Quantidade</td>
          <td>Valor</td>
          <td>No Estoque</td>
      </tr>
    </thead>
      ");
    for($i=0;$i<$quant;$i++){
      $rows=$resultado->fetch_assoc();
      echo ("
      <tr>
        <td>
          <input type='checkbox' id='$i$i' name='caixa[]' value='$rows[iditem]'>
        </td>
        <td>
          <label for='$i$i'>$rows[nome]</label>
        </td>
        <td>
          <input type='number' min='0' max='$rows[quantidade]' name='q$rows[iditem]' 
          onclick='marcardesmarcar($i$i)'>
        </td>
        <td>
          <label for='$i$i'>$rows[valor]</label>
        </td>
        <td>
          <label for='$i$i'>$rows[quantidade]</label>
        </td>
      </tr>
      ");
    }
    echo ("</table>");
  }

  /* Essa função ir mostrar os dados da tabela pratos */
  function prato_feito(){
    include('conexao.php');
    $a = "SELECT * FROM `prato`";
    $resultado=mysqli_query($conexao, $a);
    $quant = mysqli_num_rows($resultado);
    echo ("
    <form method='post' action='imprimir.php' target='_blank'>
      <table class='table'>
        <thead class='table-dark'>
          <tr>
            <td></td>
            <td>Nome</td>
            <td>Valor</td>
            <td>Igredientes</td>
            <td>Quantidade</td>
          </tr>
        </thead>
    ");
    for($i=0;$i<$quant;$i++){//para preencher a tabela
      $rows=$resultado->fetch_assoc();
      echo ("
      <tr>
        <td>
          <input type='checkbox' id='$i' name='caixa[]' value='$rows[idprato]'>
          </td>
        <td>
          <label for='$i'>$rows[nome]</label>
        </td>
        <td>
          <label for='$i'>$rows[valor]<label>
        </td>
        <td>
      ");
      /*Achar os igredientes */
        $b = "SELECT `item-iditem` FROM `item-do-prato` WHERE `prato-idprato`=$rows[idprato]";
        $resultado1=mysqli_query($conexao, $b);
        $quant1 = mysqli_num_rows($resultado1);
        for($j=0;$j<$quant1;$j++){//para encontar o parto e igredients desse prato
          $rows1=$resultado1->fetch_assoc();
          $id = $rows1['item-iditem'];
          $c = "SELECT  `nome` FROM `item` WHERE `iditem` = $id";
          $resultado2=mysqli_query($conexao, $c);
          $quant2 = mysqli_num_rows($resultado1);
          for($c=0;$c<$quant2;$c++){//escreve os ingredientes
            $rows2=$resultado2->fetch_assoc();
            echo("<label for='$i'>$rows2[nome]</label>");
          }
          if($j+1 !== $quant2){echo("<label for='$i'>, </label>");}
        }
      /*Fim achar os igredientes */
      echo("
        </td>
        <td>
          <input type='number' name='q$rows[idprato]' min='0' max='$rows[quantidade]' 
          value=0  onclick='marcardesmarcar($i)'>
        </td>
      </tr>
      ");
    }
    echo ("</table>");
    echo ("<div class='input-group mb-3 input-group-prepend'>");
    echo ("
    <label class='input-group-text' for='end'>Endereço: </label>
    <input class='form-control' type='text' id='end' name='en'>
    ");
    echo ("
    <div id='botao' class='row col-12'>
      <button class='btn btn-light btn btn-primary btn-lg btn-block' onClick='history.go(0)' 
      name='botao' value='0'>Imprimir</button>
    </div>
    </form>
    </div>
    ");
  }
?>