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
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
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
					<?php } ?>
        </div>
    </div>
</nav>

<form method="POST" enctype="multipart/form-data" action="/backend/user/registration.php"
      class="register w-50 position-absolute top-50 start-50 translate-middle">
    <h1>Регистрация</h1>
    <div class="mb-3">
        <label for="formFile" class="form-label">Аватар профиля</label>
        <input name="avatar" class="form-control" type="file" id="formFile">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input name="login" type="text" class="form-control" placeholder="login" aria-label="Username"
               aria-describedby="basic-addon1">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Электронная почта</label>
        <input name="email" type="email" class="form-control" id="exampleFormControlInput1"
               placeholder="name@example.com">
    </div>
    <div class="mb-3">
        <label class="form-label">ФИО</label>
        <input name="fullname" class="form-control" type="text" placeholder="Default input"
               aria-label="default input example">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword2" class="form-label">Подтверждение пароля</label>
        <input name="password_confirm" type="password" class="form-control" id="exampleInputPassword2">
    </div>
    <p class="text-danger"><?= $_SESSION['error'] ?></p>
    <button type="submit" class="btn btn-primary">Регистрация</button>
    <a id="authButton" href="/pages/auth.php" class="btn">Войти</a>
</form>
</body>
</html>