<h3>Добро пожаловать в <?= Rain::app()->app->get('name'); ?></h3>

На данный момент работает файл: <span class="color"><?= __FILE__; ?></span><br/><br/>

На данный момент работает контроллер: <span class="color"><?= $this->getController(); ?></span><br/>
И вызвано действие: <span class="color"><?= $this->getAction(); ?></span>

<br/>

<div class="main_image">
    <a href="http://github.com/DmitryMachavariani/micro" target="_blank"><img src="http://mentormate.com/wp-content/uploads/2014/06/GitHub.jpg" alt="image"></a>
</div>

<?php
//$query = Rain::app()->db->select()->from('tb_users')->where(['id' => 3, 'username' => 'angus123'])->getResult();
?>