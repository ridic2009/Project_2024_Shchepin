<?php
session_start();

// Проверка, вошел ли пользователь в систему
if (!isset($_COOKIE['user_id'])) {
    die("Вы должны войти в систему, чтобы добавить курс");
}

$user_id = $_COOKIE['user_id']; // Получение ID пользователя из cookie
$title = $_POST['title'];
$desc = $_POST['description'];
$price = $_POST['price'];
$duration = $_POST['duration'];
$banner = 'https://placehold.co/600x400';


// Проверка, заполнены ли все обязательные поля
if (empty($title) || empty($desc) || empty($price)) {
    die("Пожалуйста, заполните все обязательные поля");
}

// Подключение к базе данных
$db = new mysqli('localhost', 'root', '', 'stopik');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Подготовка и выполнение запроса
$stmt = $db->prepare("INSERT INTO courses (title, authors, banner, price, duration, description) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssiis", $title, $user_id, $banner, $price, $duration, $desc);

if ($stmt->execute()) {
    echo "Курс успешно добавлен!";
    // Перенаправление пользователя на главную страницу
    header("Location: /index.php");
} else {
    echo "Ошибка: " . $stmt->error;
}

$stmt->close();
$db->close();

