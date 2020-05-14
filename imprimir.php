<?php
    $c =isset($_POST['caixa'])?$_POST['caixa']:"aaa";
    if($c != "aaa"){
        include('conexao.php');
        $Total=0;
        echo("<table><tr><td>Nome</td><td>Quantidade</td><td>Valor</td></tr>");
        for($i=1; $i <= count($c);$i++){
            $id = $c[$i-1];
            $q= $_POST["q$id"];
            if($q > 0){
            $a = $_POST['botao']==0?
            "SELECT * FROM `prato` WHERE `idprato`= $id":
            "SELECT * FROM `item` WHERE `iditem`= $id";
            $resultado=mysqli_query($conexao, $a);
            $rows=$resultado->fetch_assoc();
    
            echo("<tr>
                <td>$rows[nome]</td>
                <td>$q</td>
                <td>$rows[valor]</td>
            </tr>");
            $Total += ($rows['valor'] * $q);
        }
        }
        if($Total > 0){
            echo("</tr><tr><td>Total: </td><td>R$ "),
            number_format($Total,2,",","."),("</td></tr></table>");
            echo("<br>Endereço: $_POST[en]");
            $t = "<script type='text/javascript'>
            window.onload = function() { window.print(); };
            </script>";
            echo $t;
        }else{
            $var = "<script>javascript:window.close()</script>";
            echo $var;
        }
    }else{
        $var = "<script>javascript:window.close()</script>";
        echo $var;
    }
?>