<?php
$thisPageName = 'top';
$path = realpath(dirname(__FILE__) . '') . "/";
include_once($path . 'app_config.php');
include($path . 'libs/head.php');
?>
<style>
    main {
        padding: 0 0 100px;
    }
    @media only screen and (max-width: 767px) {
    main {
        padding: 65px 0 100px;
    }
    }
</style>
</head>

<body id="top" class="top">

    <?php include($path . 'libs/header.php'); ?>

    <main>
        <img src="<?php echo APP_ASSETS; ?>img/top/img.jpg" alt="">
    </main>

    <?php include($path . 'libs/footer.php'); ?>
</body>

</html>