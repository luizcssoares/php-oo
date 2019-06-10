<?php
  require_once 'daousuario.php';
  $dao = new DaoUsuario();
  $resultado = $dao->readAll();

  if (isset($_POST['excluir'])) {
     $id = $_POST['id'];
     if ($dao->delete($id)) {
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
</head>
<body>

 <div class="container">
    <div class="jumbotron">
        <h1>Usuarios</h1>
    </div>

    <a href="novo.php" class="btn btn-dark mb-2">Adicionar</a>
    <a href="relatorio.php" class="btn btn-primary mb-2">Imprimir</a>
    <table class="table table-striped">
        <thead>
         <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Cpf</td>
            <td>Email</td>
            <td>Fone</td>
            <td></td>
            <td></td>
         </tr>
        </thead>
        <tbody>
         <?php
         while ($usuario = $resultado->fetch(PDO::FETCH_OBJ))
         {
            ?>
            <tr>
                <td><?=$usuario->id?></td>
                <td><?=$usuario->nome?></td>
                <td><?=$usuario->cpf?></td>
                <td><?=$usuario->email?></td>
                <td><?=$usuario->fone?></td>
                <td>
                    <form action="edit.php" method="post">
                        <input type="hidden" name="id" value="<?=$usuario->id?>">
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                    </form>
                </td>
                <td>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="<?=$usuario->id?>">
                        <button type="submit" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </form>

                </td>
            </tr>
            <?php
         }
            ?>
        </tbody>
    </table>
 </div>

</body>
</html>
