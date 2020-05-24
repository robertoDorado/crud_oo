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

            return true;
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
        }
    }

    public function getAll(){
        $sql = ("SELECT * FROM usuarios");
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){
             return $sql->fetchAll();
        }
    }

    public function excluir($id){
        if($this->verificarId($id) == true){
            $sql = ("DELETE FROM usuarios WHERE id = :id");
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();

            return true;
        }
    }

    public function editar($nome, $email, $telefone, $id){
            $sql = ("UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id");
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':telefone', $telefone);
            $sql->bindValue(':id', $id);
            $sql->execute();

            return true;
    
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

    public function verificarEmail2($email){
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

    public function verificarNome2($nome){
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

    public function verificarTelefone2($telefone){
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
