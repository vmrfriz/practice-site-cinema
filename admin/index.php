<?php
    require($_SERVER["DOCUMENT_ROOT"] . '/admin/module/main.php');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <script src="js/main.js" type="module" async></script>

    <title>Admin Area</title>
</head>
<body>
    <header class="header">
        <div class="navbar d-flex justify-between">
            <div class="logo">
                <a href="/admin"><span>Admin</span><span>Area</span></a>
            </div>
            <div class="logout">
                <a href="/admin/module/auth/logout.php" class="btn btn_red">Logout</a>
            </div>
        </div>
    </header>
    <div class="d-flex page-wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Меню</h3>
            </div>
            <ul>
                <li><a class="nav" href="?layouts=movies">Фильмы</a></li>
                <li><a class="nav" href="?layouts=sessions">Сеансы</a></li>
                <li><a class="nav" href="?layouts=genres">Жанры</a></li>
                <li><a class="nav" href="?layouts=humans">Люди</a></li>
<!--                <li><a class="nav" href="?layouts=settings">Основные</a></li>-->
            </ul>
        </nav>
        <div class="page-container">
            <div class="page-header d-flex justify-between align-center">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="page-content">
                <?php
                    $current_page = 'categories';
                    if(array_key_exists('layouts', $_GET)) {
                        $current_page = $_GET['layouts'];
                    }
                    switch ($current_page) {
                        case 'movies':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/layouts/movies.php';
                            break;
                        case 'edit_movie':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/module/edit/edit_movie.php';
                            break;
                        case 'add_movie':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/module/add/add_movie.php';
                            break;
                        case 'sessions':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/layouts/sessions.php';
                            break;
                        case 'edit_session':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/module/edit/edit_session.php';
                            break;
                        case 'add_session':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/module/add/add_session.php';
                            break;
                        case 'genres':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/layouts/genres.php';
                            break;
                        case 'edit_genre':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/module/edit/edit_genre.php';
                            break;
                        case 'add_genre':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/module/add/add_genre.php';
                            break;
                        case 'humans':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/layouts/humans.php';
                            break;
                        case 'edit_human':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/module/edit/edit_human.php';
                            break;
                        case 'add_human':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/module/add/add_human.php';
                            break;
//                        case 'settings':
//                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/layouts/settings.php';
//                            break;
                        default:
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/layouts/movies.php';
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>