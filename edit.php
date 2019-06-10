<?php
require_once 'daousuario.php';
$dao = new DaoUsuario();
$id = (int) $_POST['id'];
//var_dump($id);
$usuario = $dao->read($id);
//var_dump($usuario);

if (isset($_POST['gravar'])) {
    $new_usu = new Usuario();

    $new_usu->setId($_POST['id']);
    $new_usu->setNome($_POST['nome']);
    $new_usu->setCpf($_POST['cpf']);
    $new_usu->setFone($_POST['fone']);
    $new_usu->setEmail($_POST['email']);
    $new_usu->setSenha($_POST['senha']);
    $new_usu->setPerfil($_POST['perfil']);

    if ($dao->update($new_usu)) {
        $homeURL = 'index.php';
        header('Location: ' . $homeURL);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="jumbotron">
        <h1>Altera Usuario</h1>
    </div>

    <form method="post" action="edit.php">
        <div class="form-group">
            <label for="id"    class="">Id</label>
            <input type="text" class="form-control" name="id"    value="<?=$usuario->getId() ?>" id="id">
            <label for="cpf"   class="">Cpf</label>
            <input type="text" class="form-control" name="cpf"   value="<?=$usuario->getCpf()?>" id="cpf">
            <label for="nome"  class="">Nome</label>
            <input type="text" class="form-control" name="nome"  value="<?=$usuario->getNome()?>" id="nome">
            <label for="fone"  class="">Fone</label>
            <input type="text" class="form-control" name="fone"  value="<?=$usuario->getFone()?>" id="fone">
            <label for="email" class="">Email</label>
            <input type="text" class="form-control" name="email" value="<?=$usuario->getEmail()?>" id="email">
            <label for="senha" class="">Senha</label>
            <input type="text" class="form-control" name="senha" value="<?=$usuario->getSenha()?>" id="senha">
            <label for="senha" class="">Perfil</label>
            <input type="text" class="form-control" name="perfil" value="<?=$usuario->getPerfil()?>" id="perfil">
        </div>
        <button type=submit name="gravar" class="btn btn-primary">Gravar</button>
    </form>

</div>

</body>
</html>
