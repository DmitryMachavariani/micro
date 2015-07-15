<!DOCTYPE html>
<html lang="<?= Rain::app()->get('app')->get('lang'); ?>">
<head>
    <title><?= Rain::app()->get('app')->get('name'); ?></title>
    <link rel="stylesheet" href="<?= Rain::app()->baseUrl(); ?>/css/material.css">
    <link rel="stylesheet" href="<?= Rain::app()->baseUrl(); ?>/css/style.css">
    <script src="<?= Rain::app()->baseUrl(); ?>/js/material.js"></script>

    <meta charset="<?= Rain::app()->get('app')->get('charset'); ?>">
</head>
<body>

<div class="mdl-layout mdl-js-layout mdl-layout--overlay-drawer-button">
    <header class="mdl-layout__header mdl-layout__header--waterfall">
        <!-- Top row, always visible -->
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title"><?= Rain::app()->get('app')->get('name'); ?></span>

            <div class="mdl-layout__header-row">
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation -->
                <nav class="waterfall-demo-header-nav mdl-navigation">
                    <a class="mdl-navigation__link" href="<?= Rain::app()->get('router')->createUrl('site'); ?>">Главная</a>
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
            <?= $content; ?>
        </div>
    </main>
</div>
</body>
</html>