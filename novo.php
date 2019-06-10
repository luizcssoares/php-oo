<?php
require_once  'usuario.php';
require_once  'daousuario.php';
if (isset($_POST['cadastrar'])) {
    $usuario = new Usuario();
    $usuario->setId($_POST['id']);
    $usuario->setNome($_POST['nome']);
    $usuario->setCpf($_POST['cpf']);
    $usuario->setFone($_POST['fone']);
    $usuario->setEmail($_POST['email']);
    $usuario->setPerfil($_POST['perfil']);
    //var_dump($usuario);

    $dao = new DaoUsuario();
    if ($dao->create($usuario)) {
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
        <h1>Novo Usuario</h1>
    </div>

    <form method="post" action="novo.php">
        <div class="form-group">
            <label for="id"    class="">Id</label>
            <input type="text" class="form-control" name="id"    id="id">
            <label for="cpf"   class="">Cpf</label>
            <input type="text" class="form-control" name="cpf"   id="cpf">
            <label for="nome"  class="">Nome</label>
            <input type="text" class="form-control" name="nome"  id="nome">
            <label for="fone"  class="">Fone</label>
            <input type="text" class="form-control" name="fone"  id="fone">
            <label for="email" class="">Email</label>
            <input type="text" class="form-control" name="email" id="email">
            <label for="senha" class="">Senha</label>
            <input type="text" class="form-control" name="senha" id="senha">
            <label for="senha" class="">Perfil</label>
            <input type="text" class="form-control" name="perfil" id="perfil">
        </div>
        <button type=submit name="cadastrar" class="btn btn-primary">Adicionar</button>
    </form>

</div>

</body>
</html>

