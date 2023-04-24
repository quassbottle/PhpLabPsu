<?php
//    $error = NULL;
//    if(!isset($_SESSION['sess']) and isset($_POST['password'])) $_SESSION['sess'] = hash('sha256', $_POST['password']);
//    if ($_POST['password'] !== $_POST['confirm_password']) $error = "Penis";
//    else{
//        $data = json_encode([
//            'login' => strval($_POST['login']),
//            'password' => hash('sha256', strval($_POST['password'])),
//            'name' => strval($_POST['name']),
//            'surname' => strval($_POST['surname']),
//            'sex' => strval($_POST['sex']),
//            'birthdate' => date(strval($_POST['birthdate']))
//        ], JSON_UNESCAPED_UNICODE);
//        if(isset($GLOBALS['id']))
//            $index = 1;
//        //file_put_contents('assets/data/users/'..'.json', $data);
//    }

    require_once '../src/connect.php';

    session_start();
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div id="form-container">
        <h2>Регистрация</h2>
        <?php
            if (isset($_SESSION['alert'])) {
                echo '<p class="alert">', $_SESSION['alert'], '</p>';
                unset($_SESSION['alert']);
            }
        ?>
        <form action="../src/vendor/signup.php" method="post">
            <label>Логин</label>
            <input name="login" type="text" placeholder="Введите свой логин" required>
            <label>Пароль</label>
            <input name="password" type="password" placeholder="Введите свой пароль" required>
            <label>Подтвердите пароль</label>
            <input name="confirm_password" type="password" placeholder="Подтвердите свой пароль" required>
            <label>Имя</label>
            <input name="name" type="text" placeholder="Введите свое имя" required>
            <label>Фамилия</label>
            <input name="surname" type="text" placeholder="Введите свой возраст" required>
            <label>Пол</label>
            <select name="sex">
                <option value="male" selected>Мужской</option>
                <option value="female">Женский</option>
            </select>
            <label>Дата рождения</label>
            <input name="birthdate" type="date" placeholder="Введите свою дату рождения" required>
            <button type="submit">Создать аккаунт</button>
        </form>
        <p id="create-account">
            <a href="login.php">Вернуться к авторизации</a>
        </p>
    </div>
</body>
</html>