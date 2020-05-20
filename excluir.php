<?php
session_start();
require_once "config.php";
if(isset($_GET['id']) && empty($_GET['id']) == false){
    $id = addslashes($_GET['id']);

    $contato = new Contato();
    $excluir = $contato->excluir($id);

    header("Location: index.php");

}else{
    header("Location: index.php");
}
?>