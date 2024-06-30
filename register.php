<?php
$connect = new mysqli("localhost", "root", "", "stopik");

if ($connect->connect_error) {
    die("Подключение к базе данных не удалось" . $connect->connect_error);
}

if (isset($_POST["email"])) {
    $login = $_POST["login"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = "Пользователь";

    $query = "SELECT * FROM users WHERE email = ? LIMIT 1";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Пользователь с таким email уже существует!";
    } else {
        $query = "INSERT INTO users (login, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $connect->prepare($query);
        $stmt->bind_param("ssss", $login, $email, $password, $role);

        if ($stmt->execute()) {
            echo "Пользователь успешно зарегистрирован!";
        } else {
            echo "Ошибка регистрации пользователя: " . $stmt->error;
        }
    }

    $stmt->close();
}
