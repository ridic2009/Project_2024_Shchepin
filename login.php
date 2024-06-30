<?php

session_start();

$connect = new mysqli("localhost","root","","stopik");

if ($connect->connect_error) {
    die("Подключение к базе данных не удалось". $connect->connect_error);
}

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";

    // Подготовка нужна для оптимизации запроса для бд
    $stmt = $connect->prepare($sql); 

    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        setcookie('user_id', $row['user_id'], time() + (86400 * 30)); // 1 день
        setcookie('login', $row['login'], time() + (86400 * 30));
        setcookie('email', $row['email'], time() + (86400 * 30));
        setcookie('role', $row['role'], time() + (86400 * 30));
        unset($_SESSION['error']);
        header("Location: index.php?page=home");
    } else {
        $_SESSION['error'] = "Неверный логин или пароль";
        header("Location: index.php?page=home");
    }
    $stmt->close();
}

$connect->close();