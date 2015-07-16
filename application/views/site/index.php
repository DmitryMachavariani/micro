<h3>Добро пожаловать в <?= Rain::app()->app->get('name'); ?></h3>

На данный момент работает файл: <span class="color"><?= __FILE__; ?></span><br/><br/>

На данный момент работает контроллер: <span class="color"><?= Controller::getController(); ?></span><br/>
И вызвано действие: <span class="color"><?= Controller::getAction(); ?></span>