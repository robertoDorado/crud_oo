<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.js">
    <link rel="stylesheet" href="bootstrap/jquery.min.js">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD OO</title>
</head>
<body>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<?php
require_once "config.php";


$contato = new Contato();
?>

<form method="post">
    <span>Pesquise aqui</span><br>
    <input type="text" autofocus name="buscar"><input type="submit" value="Buscar"><br><br>
</form>

<?php
if(isset($_POST['buscar']) && empty($_POST['buscar']) == false){
    $buscar = addslashes($_POST['buscar']);

    $contato = new Contato();
    $search = $contato->buscar($buscar);
    if($search == false){
        echo "Nenhum registro encontrado<br>";
        echo "<a href='index.php';>Voltar</a>";
        exit;
    }
    foreach($search as $pessoa):
    ?>
<table class="table" border="1" width="100%">
    <tr style="background:yellow;" border="1">
        <th>Id</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Telefone</th>
    </tr>
    <tr>
        <th><?php echo $pessoa['id'];?></th>
        <th><?php echo $pessoa['nome'];?></th>
        <th><?php echo $pessoa['email'];?></th>
        <th><?php echo "(11) ".$pessoa['telefone']."<br>";?></th>
    </tr>
</table>
        <?php echo "<a href='index.php'>Voltar</a>"?>
    <?php exit;?>
    <?php endforeach;

}
?>

<table border="1" width="100%" class="table-hover-header" style="text-align:center;">
    <tr class="header">

        <th>Id</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>Ação</th>
        <th>Ação</th>
    </tr>


<?php

    $lista = $contato->getAll();
    foreach($lista as $data):
    ?>
    <tr class="lista">

        <th><?php echo $data['id'];?></th>
        <th><?php echo $data['nome'];?></th>
        <th><?php echo $data['email'];?></th>
        <th><?php echo "(11) ".$data['telefone'];?></th>
        <th><a href="editar.php?id=<?php echo $data['id'];?>">Editar</a></th>
        <th><a href="excluir.php?id=<?php echo $data['id'];?>">Excluir</a></th>
    </tr>

    <?php endforeach; ?>

    
</table><br>
    <div class="add-contato">
        <button><a href="adicionar.php">Adicionar Contato</a></button><br><br>
    </div>
    
</body>
</html>