<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Contatos</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
</head>
<body class="body-form">
    <?php 
    require_once "config.php";

    if(isset($_POST['nome']) && empty($_POST['nome']) == false){
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $telefone = addslashes($_POST['telefone']);

        $contato = new Contato();
        $dados = $contato->adicionar($email, $telefone, $nome);

        header("Location: index.php");
    }
    ?>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>


<div class="form">
    
    <form method="post">
        
        <h1 style="color:white;">Cadastre aqui</h1>
        
        <span>Nome:</span><br>
        <input type="text" name="nome" required><br><br>

        <span>E-mail:</span><br>
        <input type="email" name="email" required><br><br>

        <span>Telefone:</span><br>
        <input type="number" name="telefone" ><br><br>

        <input type="submit" value="Adicionar">

    </form>

</div>

<button class="btn-voltar"><a href="index.php">Voltar</a></button>


    
</body>
</html>