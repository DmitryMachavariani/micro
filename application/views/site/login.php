<?php if (Rain::app()->session->hasMessage('success')): ?>
    <div class="message-success"><b><?= Rain::app()->session->getMessage('success'); ?></b></div>
<?php endif; ?>

    <form action="<?= Rain::app()->router->createUrl('site/login'); ?>" method="post">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
            <input class="mdl-textfield__input" name="username" type="text" required/>
            <label class="mdl-textfield__label" for="sample1">Логин</label>
        </div>

        <br/>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
            <input class="mdl-textfield__input" name="password" type="password" required/>
            <label class="mdl-textfield__label" for="sample1">Пароль</label>
        </div>

        <br/>

        <span class="color">Например: admin - admin</span>

        <br/><br/>

        <input type="submit" class="mdl-button mdl-button--raised" name="send" value="Войти">
    </form>

<?php
if (Rain::app()->user->guest):
    echo 'Я гость';
else:
    echo 'Я пользователь ' . Rain::app()->user->name;
endif;
?>