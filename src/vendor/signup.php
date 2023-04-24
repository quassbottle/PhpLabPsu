<?php

    use framework\JsonRepository;

    //require_once 'src/connect.php';

    session_start();

    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $sex = $_POST['surname'];
    $birthdate = $_POST['birthdate'];

    if ($password !== $confirm_password) {
        $_SESSION['alert'] = 'Пароли не совпадают';
        header('Location: ../../public_html/register.php');
        return;
    }

    $json = json_encode([
            'login' => strval($login),
            'password' => hash('sha256', strval($password)),
            'name' => strval($name),
            'surname' => strval($surname),
            'sex' => strval($sex),
            'birthdate' => date(strval($birthdate))
        ], JSON_UNESCAPED_UNICODE);


    $users = new JsonRepository('resources/users.json', gettype(new User()));
    $users->add($json);

    $user = $users->getById(1);
