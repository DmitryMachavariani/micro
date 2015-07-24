<?php if (Rain::app()->session->hasMessage('success')): ?>
    <div class="message-success"><b><?= Rain::app()->session->getMessage('success'); ?></b></div>
<?php elseif (Rain::app()->session->hasMessage('error')): ?>
    <div class="message-error"><b><?= Rain::app()->session->getMessage('error'); ?></b></div>
<?php endif; ?>

<?= FormHelper::begin(); ?>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
        <?= FormHelper::input('username', '', ['class' => 'mdl-textfield__input', 'required' => true]); ?>
        <?= FormHelper::label('Логин', ['class' => 'mdl-textfield__label']); ?>
    </div>

    <br/>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
        <?= FormHelper::input('password', '', ['type' => 'password', 'class' => 'mdl-textfield__input', 'required' => true]); ?>
        <?= FormHelper::label('Пароль', ['class' => 'mdl-textfield__label']); ?>
    </div>

    <br/>

    <span class="color">Например: admin - admin</span>

    <br/><br/>

<?= FormHelper::submit('', ['class' => 'mdl-button mdl-button--raised']); ?>

<?= FormHelper::end(); ?>