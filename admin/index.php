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
                <li><a class="nav" href="?layouts=categories">Категории</a></li>
                <li><a class="nav" href="?layouts=subcategories">Подкатегориии</a></li>
                <li><a class="nav" href="?layouts=products">Товары</a></li>
                <li><a class="nav" href="?layouts=promocodes">Промокоды</a></li>
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
                        case 'categories':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/layouts/categories.php';
                            break;
                        case 'subcategories':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/layouts/subcategories.php';
                            break;
                        case 'products':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/layouts/products.php';
                            break;
                        case 'promocodes':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/layouts/promocodes.php';
                            break;
                        case 'edit_category':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/module/edit/edit_category.php';
                            break;
                        case 'edit_subcategory':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/module/edit/edit_subcategory.php';
                            break;
                        case 'edit_product':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/module/edit/edit_product.php';
                            break;
                        case 'edit_promocode':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/module/edit/edit_promocode.php';
                            break;
                        case 'add_categories':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/module/add/add_category.php';
                            break;
                        case 'add_subcategories':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/module/add/add_subcategory.php';
                            break;
                        case 'add_products':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/module/add/add_product.php';
                            break;
                        case 'add_promocodes':
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/module/add/add_promocode.php';
                            break;
//                        case 'settings':
//                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/layouts/settings.php';
//                            break;
                        default:
                            include $_SERVER["DOCUMENT_ROOT"] . '/admin/layouts/categories.php';
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>