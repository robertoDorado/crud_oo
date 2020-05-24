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

<?php 
require_once "config.php";

    if(isset($_POST['nome']) && empty($_POST['nome']) == false){
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $telefone = addslashes($_POST['telefone']);

        $contato = new Contato();
        $verificarnome = $contato->verificarNome2($nome);
        $verificaremail = $contato->verificarEmail2($email);
        $verificartelefone = $contato->verificarTelefone2($telefone);
        $adicionar = $contato->adicionar($email, $telefone, $nome);

    if($verificarnome == true && $verificaremail == true && $verificartelefone == true):
        ?>
        <style>
            .erro{
            height:30px;
            width:200px;
            background-color:rgba(255, 0, 0, 0.5);
            border:solid 1px red;
            margin-top:5%;
            }
            .erro label{
            color:white;
            text-align:center;
            padding-left:5%;
            padding-top:1%;
            }
        </style>
        <div class="erro"><label>Usuário já foi cadastrado</label></div>
        <?php endif;

            if($verificarnome == true):
            ?>
        <style>
            .erro{
            height:30px;
            width:250px;
            background-color:rgba(255, 0, 0, 0.5);
            border:solid 1px red;
            margin-top:5%;
            }
            .erro label{
            color:white;
            text-align:center;
            padding-left:5%;
            padding-top:1%;
            }
        </style>
        <div class="erro"><label>Já existe esse nome no cadastro</label></div>
            <?php endif;

            if($verificaremail == true):
            ?>
        <style>
            .erro{
            height:30px;
            width:250px;
            background-color:rgba(255, 0, 0, 0.5);
            border:solid 1px red;
            margin-top:5%;
            }
            .erro label{
            color:white;
            text-align:center;
            padding-left:5%;
            padding-top:1%;
            }
        </style>
        <div class="erro"><label>Já existe esse email no cadastro</label></div>
            <?php endif;

            if($verificartelefone == true):
            ?>
        <style>
            .erro{
            height:30px;
            width:280px;
            background-color:rgba(255, 0, 0, 0.5);
            border:solid 1px red;
            margin-top:5%;
            }
            .erro label{
            color:white;
            text-align:center;
            padding-left:5%;
            padding-top:1%;
            }
        </style>
        <div class="erro"><label>Já existe esse telefone no cadastro</label></div>
            <?php endif;

            if($adicionar == true){
                header("Location: index.php");
            }

        }

?>

    </form>

</div>

<button class="btn-voltar"><a href="index.php">Voltar</a></button>
    
</body>
</html>