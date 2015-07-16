<!DOCTYPE html>
<html lang="<?= Rain::app()->app->get('lang'); ?>">
<head>
    <title><?= Rain::app()->app->get('name'); ?></title>
    <link rel="stylesheet" href="<?= Rain::app()->baseUrl(); ?>/css/material.css">
    <link rel="stylesheet" href="<?= Rain::app()->baseUrl(); ?>/css/style.css">
    <script src="<?= Rain::app()->baseUrl(); ?>/js/material.js"></script>

    <meta charset="<?= Rain::app()->app->get('charset'); ?>">
</head>
<body>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header mdl-layout__header--waterfall">
        <!-- Top row, always visible -->
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title"><?= Rain::app()->app->get('name'); ?></span>

            <div class="mdl-layout__header-row">
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation -->
                <nav class="waterfall-demo-header-nav mdl-navigation">
                    <a class="mdl-navigation__link" href="<?= Rain::app()->router->createUrl('site/index'); ?>">Главная</a>
                    <a class="mdl-navigation__link" href="<?= Rain::app()->router->createUrl('site/about'); ?>">О проекте</a>
                    <a class="mdl-navigation__link" href="<?= Rain::app()->router->createUrl('site/login'); ?>">Войти</a>
                    <a class="mdl-navigation__link" href="<?= Rain::app()->router->createUrl('site/contact'); ?>">Конакты</a>
                    <?php if (!Rain::app()->user->guest): ?>
                        <a class="mdl-navigation__link" href="<?= Rain::app()->router->createUrl('site/logout'); ?>">Выход</a>
                    <?php endif; ?>
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