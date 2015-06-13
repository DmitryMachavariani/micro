<!DOCTYPE html>
<head>
    <title>Мой сайт</title>
    <link rel="stylesheet" href="<?php echo Sun::app()->baseUrl(); ?>/css/style.css">
    <meta charset="utf-8">
</head>
<body>
<div id="container">
    <center><h1>ЭТО ЗАГОЛОВОК</h1></center>
    <?php echo $content; ?>
</div>

Скрипт выполнен за <?php echo microtime(true) - START; ?> сек.
</body>
</html>