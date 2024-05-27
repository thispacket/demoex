<?php
    session_start();

if ($_SESSION['user']) header('Location: /index.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Создать</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Создать</a>
                </li>
            </ul>
					<?php if ($_SESSION['user']) { ?>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <div class="">
                      <img src="uploads/avatars/<?= $_SESSION['user']['avatar'] ?>" class="rounded-circle" alt="...">
                      <button class="btn text-primary"><?= $_SESSION['user']['login'] ?></button>
                  </div>
                  <form method="POST" action="/backend/user/logout.php">
                      <button type="submit" class="btn btn-danger">Выйти</button>
                  </form>
              </div>
					<?php }?>
        </div>
    </div>
</nav>

<form method="POST" action="/backend/user/auth.php" class="auth w-50 position-absolute top-50 start-50 translate-middle">
    <h1>Авторизация</h1>
    <div class="input-group mb-3">
        <span class="input-group-text">@</span>
        <input type="text" class="form-control" placeholder="login" aria-label="login"
               aria-describedby="basic-addon1" name="login">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Я не робот</label>
    </div>
    <p class="text-danger"><?= $_SESSION['error']?></p>
    <button type="submit" class="btn btn-primary">Войти</button>
    <a id="registerButton" href="/pages/registration.php" class="btn">Регистрация</a>
</form>
</body>
</html>