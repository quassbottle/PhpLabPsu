<?php
    require '../framework/UserRepository.php';

    use framework\UserRepository;

    session_start();

    $users = new UserRepository('resources/users');

    $login = $_POST['login'];
    $password = hash('sha256', $_POST['password']);

    $user = $users->getByUsername($login);
    if ($user == null) {
        http_response_code(400);
        echo 'Пользователь с таким логином не найден';
        return;
    }
    if ($user->password != $password) {
        http_response_code(400);
        echo 'Неверный пароль';
        return;
    }

    $_SESSION['user_id'] = $user->id;
    http_response_code(200);
    echo "Авторизация прошла успешно";

