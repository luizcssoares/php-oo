<?php
class Usuario
{
    private $id;
    private $nome;
    private $cpf;
    private $fone;
    private $email;
    private $senha;
    private $perfil;

    public function __construct(){
        $this->id     = 0;
        $this->nome   = '';
        $this->cpf    = '';
        $this->fone   = '';
        $this->email  = '';
        $this->senha  = '';
        $this->perfil = 1;
    }

    public function getId()     { return $this->id; }
    public function getNome()   { return $this->nome; }
    public function getCpf()    { return $this->cpf; }
    public function getFone()   { return $this->fone; }
    public function getEmail()  { return $this->email; }
    public function getSenha()  { return $this->senha; }
    public function getPerfil() { return $this->perfil; }

    public function setId($id)         { $this->id     = $id; }
    public function setNome($nome)     { $this->nome   = $nome; }
    public function setCpf($cpf)       { $this->cpf    = $cpf; }
    public function setFone($fone)     { $this->fone   = $fone; }
    public function setEmail($email)   { $this->email  = $email; }
    public function setSenha($senha)   { $this->senha  = $senha; }
    public function setPerfil($perfil) { $this->perfil = $perfil; }
}
?>
