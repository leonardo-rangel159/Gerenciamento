<?php
    session_start();
    /* Esse codigo vai ser usado para duas chamadas diferentes que são para 
    inserir dados nas tabelas estoque e na tabela prato, escluir da lista*/
    include_once('conexao.php');
    $n = isset($_POST["nome"])?$_POST["nome"]:"aaa";
    $v = isset($_POST["valor"])?$_POST["valor"]:"aaa";
    $q = isset($_POST["quantidade"])?$_POST["quantidade"]:"abc";
    $sele = isset($_POST["caixas"])?$_POST["caixas"]:"abc";
    $checkbox = isset($_POST["caixa"])?$_POST["caixa"]:"abc";

    /* Adicionar ao estoque um item */
    if ($q != "abc" && $sele == "abc") {
        $v = str_replace(',','.',str_replace('.','',$v)); 
        $teste = "INSERT INTO `".$_POST["botão"]."` (nome, quantidade, valor) VALUES ";
        $teste .= "('$n', '$q', '$v')";
        if (mysqli_query($conexao, $teste)) {
            mysqli_close($conexao);
        }
        if($_POST["botão"] == "item"){
            header('Location: estoque.php');
        }else{header('Location: estoque2.php');}
    }
    /* Alterar do estoque ou excluir do estoque item*/
    else if($sele != "abc" && isset($_POST["botao1"])){
        for($i=1;$i<=count($sele);$i++){
            $id = $sele[$i-1];
            $n = $_POST["nome$id"];
            $v = $_POST["valor$id"];
            $q = $_POST["quantidade$id"];
            $teste = "UPDATE `".$_POST["botao1"]."` SET `nome` = '$n', `quantidade` = '$q', `valor` = '$v' ";
            $teste .= "WHERE `".$_POST["botao1"]."`.`iditem` = $id";
            if (mysqli_query($conexao, $teste)) {}
        }
        mysqli_close($conexao);
        
        if($_POST["botao1"] == "item"){
            header('Location: estoque.php');
        }else{header('Location: estoque2.php');}

    }else if($sele != "abc" && isset($_POST["botao2"])){
        $sele = $_POST["caixas"];
        for($i=1;$i<=count($sele);$i++){
            $id = $sele[$i-1];
            $teste = "DELETE FROM `".$_POST["botao2"]."` WHERE `".$_POST["botao2"]."`.`iditem` = $id";
            if (mysqli_query($conexao, $teste)) {}
        }
        mysqli_close($conexao);
        
        if($_POST["botao2"] == "item"){
            header('Location: estoque.php');
        }else{header('Location: estoque2.php');}
    }

    /* Adicionar ao estoque prato */
    else if($checkbox != "abc"){
        $v = str_replace(',','.',str_replace('.','',$v)); 
        $teste = "INSERT INTO `prato` (nome, valor) VALUES ";
        $teste .= "('$n', '$v')";
        if (mysqli_query($conexao, $teste)) {
        $teste = "SELECT `idprato` FROM `prato` WHERE nome like '%$n%'" ;
        $resultado=mysqli_query($conexao, $teste);
        $rows=$resultado->fetch_assoc();
        $id=$rows['idprato'];
        for ($i=0; $i < count($checkbox); $i++) { 
            $teste = "INSERT INTO `item-do-prato` (`item-iditem`, `prato-idprato`) VALUES ";
            $teste .= "('$checkbox[$i]', '$id')";
            echo($teste);
            if (mysqli_query($conexao, $teste)) {}
        }
        mysqli_close($conexao);
        header('Location: prato.php');
        }else{
            $_SESSION['nao_autenticado'] = true;
			header('Location: prato.php');
			exit();
        }
    
    }
    
    /*Para não permitir que entre nessa pagina*/
    if(isset($_POST["botao"])){
        $var = "<script>javascript:history.back(-2)</script>";
        echo $var;
    }
?>