<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div id="form-container">
        <h2>Регистрация</h2>
        <form action="" method="">
            <label>Логин</label>
            <input type="text" placeholder="Введите свой логин" required>
            <label>Пароль</label>
            <input type="password" placeholder="Введите свой пароль" required>
            <label>Подтвердите пароль</label>
            <input type="password" placeholder="Подтвердите свой пароль" required>
            <label>Имя</label>
            <input type="text" placeholder="Введите свое имя" required>
            <label>Пол</label>
            <select>
                <option value="male" selected>Мужской</option>
                <option value="female">Женский</option>
            </select>
            <button>Создать аккаунт</button>
        </form>
        <p id="create-account">
            <a href="index.php">Вернуться к авторизации</a>
        </p>
    </div>
</body>
</html>