<div
    class="container"><?php
    session_start();
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
    }

    ?>
</div>
<section class="ad-banner">
    <div class="container">
        <img src="https://placehold.co/1200x800" alt="banner">
    </div>

</section>
<?php
// Подключение к базе данных
$db = new mysqli('localhost', 'root', '', 'stopik');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Запрос на получение всех курсов
$result = $db->query("SELECT courses.*, users.login FROM courses JOIN users ON courses.authors = users.user_id");

if ($result->num_rows > 0) {
    echo '<section class="course__catalog">';
    echo '<div class="container">';
    echo '<h2>Каталог курсов</h2>';
    echo '<ul class="course__catalog-list">';

    // Вывод информации о каждом курсе
    while($row = $result->fetch_assoc()) {
        echo '<li class="course__card">';
        echo '<img class="course__card-banner" src="' . $row['banner'] . '" alt="banner">';
        echo '<div class="course__card-wrapper">';
        echo '<h3 class="course__card-title">' . $row['title'] . '</h3>';
        echo '<p class="course__card-author">' . $row['login'] . '</p>';
        echo '<div class="course__card-inner">';
        echo '<b class="course__card-price">' . $row['price'] . ' ₽</b>';
        echo '<span class="course__card-duration">' . $row['duration'] . ' ч.</span>';
        echo '</div></div></li>';
    }

    echo '</ul></div></section>';
} else {
    echo '<section class="course__catalog">';
    echo '<div class="container">';
    echo "Нет доступных курсов";
    echo '</div></section>';
}

$db->close();
?>

<section class="authors">
    <div class="container">
        <h2>Авторы курсов</h2>
        <ul class="authors__list">
            <li class="authors__card">
                <img src="https://placehold.co/80x80" alt="author avatar" class="authors__card-avatar">
                <div>
                    <h3 class="authors__card-title">Лаврентий Берия</h3>
                    <p class="authors__card-count">Курсов:
                        <span>9999</span>
                    </p>
                    <p class="authors__card-rating">Рейтинг:
                        <span>4.8</span>
                    </p>
                </div>
            </li>
            <li class="authors__card">
                <img src="https://placehold.co/80x80" alt="author avatar" class="authors__card-avatar">
                <div>
                    <h3 class="authors__card-title">Лаврентий Берия</h3>
                    <p class="authors__card-count">Курсов:
                        <span>9999</span>
                    </p>
                    <p class="authors__card-rating">Рейтинг:
                        <span>4.8</span>
                    </p>
                </div>
            </li>

            <li class="authors__card">
                <img src="https://placehold.co/80x80" alt="author avatar" class="authors__card-avatar">
                <div>
                    <h3 class="authors__card-title">Лаврентий Берия</h3>
                    <p class="authors__card-count">Курсов:
                        <span>9999</span>
                    </p>
                    <p class="authors__card-rating">Рейтинг:
                        <span>4.8</span>
                    </p>
                </div>
            </li>
        </ul>
    </div>

</section>

