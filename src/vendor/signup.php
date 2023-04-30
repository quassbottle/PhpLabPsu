<?php

    require '../framework/UserRepository.php';

    use framework\UserRepository;

    session_start();

    $users = new UserRepository('resources/users');

    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $sex = $_POST['sex'];
    $birthdate = $_POST['birthdate'];

    try {
        $date = new DateTime($birthdate);
        $now = new DateTime();
        $age = $now->diff($date)->y;
        if ($age > 100 || $age < 14) {
            http_response_code(400);
            echo 'Неверный возраст';
            return;
        }
    }
    catch (Error) {
        http_response_code(400);
        echo 'Неверный формат даты';
        return;
    }
    if ($password !== $confirm_password) {
        http_response_code(400);
        echo 'Пароли не совпадают';
        return;
    }
    if ($users->getByUsername($login) != null) {
        http_response_code(400);
        echo 'Пользователь с таким логином уже существует';
        return;
    }
    if ($sex != 'male' && $sex != 'female') {
        http_response_code(400);
        echo 'Неизвестный гендер '.$sex;
        return;
    }
    if (!preg_match('/^[а-яё\s]+$|^[A-z\s]+$/i', $name.$surname)) {
        http_response_code(400);
        echo 'Неверно указано имя или фамилия';
        return;
    }

    $user = [
        'login' => strval($login),
        'password' => hash('sha256', strval($password)),
        'name' => strval($name),
        'surname' => strval($surname),
        'sex' => strval($sex),
        'birthdate' => date(strval($birthdate))
    ];

    $users->add($user);

    http_response_code(200);
    echo "Аккаунт был успешно создан";
