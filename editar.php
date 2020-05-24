<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contatos</title>
</head>
<body class="body-form">
<?php
require_once "config.php";
session_start();

if(isset($_GET['id']) && empty($_GET['id']) == false){
    $id = addslashes($_GET['id']);
}else{
    header("Location: index.php");
}

?>

<?php

if(isset($_POST['nome']) && empty($_POST['nome']) == false){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $telefone = addslashes($_POST['telefone']);

    $contato = new Contato();
    $data = $contato->editar($nome, $email, $telefone, $id);

    header("Location: index.php");
}
?>

<?php

$nome = new Contato();
$data1 = $nome->getNome($id);

$email = new Contato();
$data2 = $email->getEmail($id);

$telefone = new Contato();
$data3 = $telefone->getTelefone($id);

?>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<div class="form">

    <form method="POST">

        <h1 style="color:white;">Atualize aqui</h1>
    
        <span>Nome:</span><br>
        <input type="text" name="nome" required value="<?php echo $data1;?>"><br><br>
    
        <span>E-mail:</span><br>
        <input type="email" name="email" required value="<?php echo $data2?>"><br><br>
    
        <span>Telefone:</span><br>
        <input type="number" name="telefone" value="<?php echo $data3?>"><br><br>
    
        <input type="submit" value="Atualizar"><br>
    
    </form>

</div>

<button class="btn-voltar"><a href="index.php">Voltar</a></button>

</body>
</html>