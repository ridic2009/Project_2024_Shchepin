<!DOCTYPE html>
<html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/index.css">
        <title>stopik</title>
    </head>

    <body id="page">
        <div
            class="wrapper">
            <?php include 'components/header.php'; ?>
            <main>
                <?php if (isset($_GET['page'])) {
                    switch ($_GET['page']) {
                        case '':
                            include 'pages/home.php';
                            break;
                        case 'home':
                            include 'pages/home.php';
                            break;

                        case 'add-course':
                            include 'pages/add-course-template.php';
                            break;

                        default:
                            include 'pages/404.php';
                            break;
                    }
                } else {
                    include 'pages/home.php';
                } ?>
            </main>
            <?php include 'components/footer.php'; ?>
        </div>

        <script src='js/index.js'></script>
    </body>

</html>

