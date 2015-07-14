<!DOCTYPE html>
<head>
    <title>Мой сайт</title>
    <link rel="stylesheet" href="<?php echo Rain::app()->baseUrl(); ?>/css/material.css">
    <link rel="stylesheet" href="<?php echo Rain::app()->baseUrl(); ?>/css/style.css.css">
    <script src="<?= Rain::app()->baseUrl(); ?>/js/material.js"></script>

    <meta charset="utf-8">
</head>
<body>

<div class="mdl-layout mdl-js-layout mdl-layout--overlay-drawer-button">
    <header class="mdl-layout__header mdl-layout__header--waterfall">
        <!-- Top row, always visible -->
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">Title</span>

            <div class="mdl-layout__header-row">
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation -->
                <nav class="waterfall-demo-header-nav mdl-navigation">
                    <a class="mdl-navigation__link" href="">Главная</a>
                    <a class="mdl-navigation__link" href="">О проекте</a>
                    <a class="mdl-navigation__link" href="">Войти</a>
                    <a class="mdl-navigation__link" href="">Конакты</a>
                </nav>
            </div>
        </div>
        <!-- Bottom row, not visible on scroll -->

    </header>
    <main class="mdl-layout__content">
        <div class="page-content">
            <?php echo $content; ?>
            Скрипт выполнен за <?php echo microtime(true) - START; ?> сек.
        </div>
    </main>
</div>
</body>
</html>