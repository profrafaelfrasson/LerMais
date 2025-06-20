<?php
require __DIR__ . '"/../config/config.php"';

class daoUsuario {

    private $conn;

    public function __construct(mysqli $driver){
        $this->conn = $driver;
    }

    public function insert(Usuario $u){
        $nome = $u->getNome();
        $email = $u->getEmail();
        $contato = $u->getContato();
        $senha = $u->getSenha();

        $stmt = $this->conn->prepare("INSERT into Usuario(nome_usuario,email_usuario,contato_usuario,senha_usuario) values (?,?,?,?)");
        $stmt->bind_param('ssss', $nome, $email, $contato, $senha);
        $stmt->execute(); 
        $stmt->close();
    }

    public function findByUsername($username) {
    $stmt = $this->conn->prepare("SELECT * FROM Usuario WHERE nome_usuario = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $dados = $result->fetch_assoc();

        $u = new Usuario();
        $u->setId($dados['id_usuario']);
        $u->setNome($dados['nome_usuario']);
        $u->setEmail($dados['email_usuario']);
        $u->setContato($dados['contato_usuario']);
        $u->setSenha($dados['senha_usuario']);

        return $u;
    }

        return false;
    }

    public function findByEmail($email) {
    $stmt = $this->conn->prepare("SELECT * FROM Usuario WHERE email_usuario = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $dados = $result->fetch_assoc();

        $u = new Usuario();
        $u->setId($dados['id_usuario']);
        $u->setNome($dados['nome_usuario']);
        $u->setEmail($dados['email_usuario']);
        $u->setContato($dados['contato_usuario']);
        $u->setSenha($dados['senha_usuario']);

        return $u;
    }

        return null;
    }
}
?>