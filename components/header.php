<header class="header" id="header">
    <div class="container">
        <div class="header__inner">
            <div class="logo">
                <a href="index.php?page=home">
                    <img src="assets/svg/logo.svg" alt="logo">
                    <span>stopik</span>
                </a>
            </div>

            <input class="searchbar" type="search" placeholder="Найти...">
            <a href="/index.php?page=add-course">Добавить курс</a>
            <?php
            if (isset($_COOKIE['login'])) {
                $login = htmlspecialchars($_COOKIE['login'], ENT_QUOTES, 'UTF-8');
                echo "<button type='button'>$login</button>";
            } else {
                echo "<button class='auth-btn' type='button'>Войти</button>";
            }
            ?>
        </div>
    </div>
</header>

