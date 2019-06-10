<?php
require_once 'conexao.php';
require_once 'usuario.php';
require_once 'ifaceUsuario.php';

class DaoUsuario implements ifaceUsuario
{
    private $instanciaConexao;
    private $tabela;

    public function __construct() {
        $this->instanciaConexao = Conexao::getInstancia();
        $this->tabela = 'usuario';
    }

    public function create( $objeto ) {
        $id       = $objeto->getId();
        $cpf      = $objeto->getCpf();
        $nome     = $objeto->getNome();
        $fone     = $objeto->getFone();
        $email    = $objeto->getEmail();
        $senha    = $objeto->getSenha();
        $perfil   = $objeto->getPerfil();
        $sqlStmt = 'INSERT INTO '.$this->tabela.' (ID, CPF, NOME, EMAIL, FONE, SENHA, PERFIL) VALUES (:id, :cpf, :nome, :email, :fone, :senha, :perfil)';
       try {
           $operacao = $this->instanciaConexao->prepare($sqlStmt);
           $operacao->bindValue(':id',     $id,     PDO::PARAM_INT);
           $operacao->bindValue(':cpf',    $cpf,    PDO::PARAM_STR);
           $operacao->bindValue(':nome',   $nome,   PDO::PARAM_STR);
           $operacao->bindValue(':fone',   $fone,   PDO::PARAM_STR);
           $operacao->bindValue(':email',  $email,  PDO::PARAM_STR);
           $operacao->bindValue(':senha',  $senha,  PDO::PARAM_STR);
           $operacao->bindValue(':perfil', $perfil, PDO::PARAM_INT);

           if($operacao->execute()){
               if($operacao->rowCount() > 0) {
                   return true;
               } else {
                   return false;
               }
           } else {
               return false;
           }
       } catch( PDOException $excecao ) {
           echo $excecao->getMessage();
       }
    }

    public function read( $id ) {
        $sqlStmt = 'SELECT * from '.$this->tabela.' WHERE id=:id';

        try {
            $operacao = $this->instanciaConexao->prepare($sqlStmt);
            $operacao->bindValue(':id', $id, PDO::PARAM_INT);
            $operacao->execute();
            $getRow   = $operacao->fetch(PDO::FETCH_OBJ);
            $id       = $getRow->id;
            $cpf      = $getRow->cpf;
            $nome     = $getRow->nome;
            $fone     = $getRow->fone;
            $email    = $getRow->email;
            $senha    = $getRow->senha;
            $perfil   = $getRow->perfil;

            $objeto   = new Usuario();
            $objeto->setId($id);
            $objeto->setCpf($cpf);
            $objeto->setNome($nome);
            $objeto->setFone($fone);
            $objeto->setEmail($email);
            $objeto->setSenha($senha);
            $objeto->setPerfil($perfil);

            return $objeto;
        } catch( PDOException $excecao ){
            echo $excecao->getMessage();
        }
    }

    public function readAll( ) {
        $sqlStmt = 'SELECT * from '.$this->tabela;
        try {
            //$consulta = $pdo->query("SELECT nome, usuario FROM login;"
            $consulta = $this->instanciaConexao->query($sqlStmt);
            //$operacao->execute();
            //return $operacao->fetchAll();
            return $consulta;
        } catch( PDOException $excecao ){
            echo $excecao->getMessage();
        }
    }

    public function update( $objeto ) {
        $id      = $objeto->getId();
        $cpf     = $objeto->getCpf();
        $nome    = $objeto->getNome();
        $fone    = $objeto->getFone();
        $email   = $objeto->getEmail();
        $senha   = $objeto->getSenha();
        $perfil  = $objeto->getPerfil();

        $sqlStmt = 'UPDATE '.$this->tabela.' SET NOME=:nome, CPF=:cpf, FONE=:fone, EMAIL=:email, SENHA=:senha, PERFIL=:perfil WHERE ID=:id';
        try {
            $operacao = $this->instanciaConexao->prepare($sqlStmt);
            $operacao->bindValue(':id',     $id,     PDO::PARAM_INT);
            $operacao->bindValue(':nome',   $nome,   PDO::PARAM_STR);
            $operacao->bindValue(':cpf',    $cpf,    PDO::PARAM_STR);
            $operacao->bindValue(':fone',   $fone,   PDO::PARAM_STR);
            $operacao->bindValue(':email',  $email,  PDO::PARAM_STR);
            $operacao->bindValue(':senha',  $senha,  PDO::PARAM_STR);
            $operacao->bindValue(':perfil', $perfil, PDO::PARAM_INT);

            if($operacao->execute()){
                if($operacao->rowCount() > 0){
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch ( PDOException $excecao ) {
            echo $excecao->getMessage();
        }
    }

    public function delete( $id ) {
        $sqlStmt = 'DELETE FROM '.$this->tabela.' WHERE ID=:id';
        try {
            $operacao = $this->instanciaConexao->prepare($sqlStmt);
            $operacao->bindValue(':id', $id, PDO::PARAM_INT);
            if($operacao->execute()){
                if($operacao->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch ( PDOException $excecao ) {
            echo $excecao->getMessage();
        }
    }
}
?>
