<?php
// 1. URL DÀNH CHO TRÌNH DUYỆT (Dùng cho HTML: href, src, link, script)
    define("BASE_URL", '/Projects/CTUMedic/Frontend');
    define("BASE_ASSETS", BASE_URL . '/assets');
    define("PATH_COMPONENTS", __DIR__ . '/Frontend/components');
    define("PATH_VIEWS", __DIR__ . '/Frontend/views');

    $page = $_GET['page'] ?? 'home';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTUMedic</title>

    <link rel="icon" href="<?php echo BASE_ASSETS; ?>/images/icons/IconCTUMedic.png">
    <link rel="stylesheet" href="<?php echo BASE_ASSETS; ?>/styles/icon.css">
    <link rel="stylesheet" href="<?php echo BASE_ASSETS; ?>/styles/font.css">
    <link rel="stylesheet" href="<?php echo BASE_ASSETS; ?>/styles/style.css">
    <link rel="stylesheet" href="<?php echo BASE_ASSETS; ?>/styles/index.css">
    <link rel="stylesheet" href="<?php echo BASE_ASSETS; ?>/styles/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_ASSETS; ?>/styles/main.css">
    <link rel="stylesheet" href="<?php echo BASE_ASSETS; ?>/styles/home.css">
    <link rel="stylesheet" href="<?php echo BASE_ASSETS; ?>/styles/login.css">
    <link rel="stylesheet" href="<?php echo BASE_ASSETS; ?>/styles/register.css">
    <link rel="stylesheet" href="<?php echo BASE_ASSETS; ?>/styles/fogotPassword.css">

    


</head>
<body>
    <div class="container">
        <?php include_once PATH_COMPONENTS . '/sidebar.php'; ?>
        <div class="main">
            <?php
                $views=[
                    'home' => PATH_VIEWS . '/home.php',
                    'login'=> PATH_VIEWS . '/DangNhap/login.php',
                    'register'=> PATH_VIEWS . '/DangNhap/register.php',
                    'fogotPassword'=> PATH_VIEWS . '/DangNhap/fogotPassword.php',

                ];

                if(isset($views[$page]) && file_exists($views[$page])){
                    include_once $views[$page];
                }else{
                    echo '404 - NOT FOUND <br/>';
                }
            ?>
        </div>
    </div>
</body>
</html>