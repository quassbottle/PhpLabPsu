$("#register-btn").click((e) => {
    e.preventDefault();

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val(),
        confirm_password = $('input[name="confirm_password"]').val(),
        name = $('input[name="name"]').val(),
        surname = $('input[name="surname"]').val(),
        sex = $('input[name="sex"]').val(),
        birthdate = $('input[name="birthdate"]').val();

    $.ajax({
        url: "../src/vendor/signup.php",
        type: "POST",
        dataType: "text",
        data: {
            login: login,
            password: password,
            confirm_password: confirm_password,
            name: name,
            surname: surname,
            sex: sex,
            birthdate: birthdate
        },
        success: () => {
            console.log("Nice");
        },
        error: () => {
            console.log("PENIS!!!");
        }
    })
})