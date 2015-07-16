<form action="<?= Rain::app()->get('router')->createUrl('site/login'); ?>" method="post">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
        <input class="mdl-textfield__input" type="text" required/>
        <label class="mdl-textfield__label" for="sample1">Логин</label>
    </div>

    <br/>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
        <input class="mdl-textfield__input" type="password" required/>
        <label class="mdl-textfield__label" for="sample1">Пароль</label>
    </div>

    <br/>

    <span class="color">Например: admin - admin</span>

    <br/><br/>

    <input type="submit" class="mdl-button mdl-button--raised" value="Войти">
</form>