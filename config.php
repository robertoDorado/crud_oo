<meta charset="UTF-8">

<?php
class Contato{
    private $pdo;

    public function __construct(){
        try{
            $this->pdo = new PDO("mysql:dbname=projeto_crud;host=127.0.0.1", "root");
        }catch(PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
    }
    
    public function adicionar($email, $telefone, $nome){
        if($this->verificarEmail($email) == false && $this->verificarTelefone($telefone) == false && $this->verificarNome($nome) == false){
            $sql = ("INSERT INTO usuarios SET nome = :nome, email = :email, telefone = :telefone");
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':telefone', $telefone);
            $sql->execute();

            echo "cadastro realizado";
        }else{

            echo "Usuário já cadastrado ou não cadastrou com sucesso<br>";
        }
    }

    public function getNome($id){
        $sql = ("SELECT nome FROM usuarios WHERE id = :id");
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            return $data['nome'];
        }else{
            echo "getNome falhou";
        }
    }

    public function getEmail($id){
        $sql = ("SELECT email FROM usuarios WHERE id = :id");
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            return $data['email'];
        }else{
            echo "Erro no getEmail";
        }
    }

    public function getTelefone($id){
        $sql = ("SELECT telefone FROM usuarios WHERE id = :id");
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            return $data['telefone'];
        }else{
            echo "get Telefone falhou";
        }
    }

    public function getAll(){
        $sql = ("SELECT * FROM usuarios");
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){
             return $sql->fetchAll();
        }else{
            echo "Não selecionou";
        }
    }

    public function excluir($id){
        if($this->verificarId($id) == true){
            $sql = ("DELETE FROM usuarios WHERE id = :id");
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();

            echo "Usuario deletado";
        }else{
            echo "Erro no delete";
        }
    }

    public function editar($nome, $email, $telefone, $id){
        if($this->verificarEmail($email) == false && $this->verificarTelefone($telefone) == false && verificarNome($nome) == false){
            $sql = ("UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id");
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':telefone', $telefone);
            $sql->bindValue(':id', $id);
            $sql->execute();

            echo "Atualizado com sucesso";
        }else{
            echo "Erro na atualização";
        }
    }

    private function verificarEmail($email){
        $sql = ("SELECT * FROM usuarios WHERE email = :email");
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }
    }

    private function verificarNome($nome){
        $sql = ("SELECT * FROM usuarios WHERE nome = :nome");
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':nome', $nome);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }
    }

    private function verificarTelefone($telefone){
        $sql = ("SELECT * FROM usuarios WHERE telefone = :telefone");
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':telefone', $telefone);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }
    }

    private function verificarId($id){
        $sql = ("SELECT * FROM usuarios WHERE id = :id");
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }
    }
    
    
}


?>
