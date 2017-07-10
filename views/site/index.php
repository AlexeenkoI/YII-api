<?php
/* @var $this yii\web\View */

$this->title = 'Jumanji';

?>
<style>
body {
    /* background-image: url('http://ds.citrus24.com/app/images/individualpos.png'); */
    background-image: url(http://ds.citrus24.com/app/images/background.png);
    background-size: 100% 110%;
    background-repeat: no-repeat;
    color: #095764;
    font-weight: bold;
}
</style>
<body>
<!--<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>-->
<title>Джуманджи</title>
?>
<div class="jumbotron">
<h1>Панель Администратора</h1>
    <p><?= yii\helpers\Html::a('Пользователи', ['user/index'], ['class' => 'btn btn-primary'])?></p>
    <p><?= yii\helpers\Html::a('Записи на спикеров', ['user-morda/index'], ['class' => 'btn btn-primary'])?></p>
    <p><?= yii\helpers\Html::a('Спикеры', ['morda/index'], ['class' => 'btn btn-primary'])?></p>
    <p><?= yii\helpers\Html::a('Денежные логи', ['moneylog/index'], ['class' => 'btn btn-primary'])?></p>
    <p><?= yii\helpers\Html::a('Маршруты', ['route/index'], ['class' => 'btn btn-primary'])?></p>
    <p><?= yii\helpers\Html::a('Заезды', ['batch/index'], ['class' => 'btn btn-primary'])?></p>
    <p><?= yii\helpers\Html::a('Магазин', ['shop/index'], ['class' => 'btn btn-primary'])?></p>
    <p><?= yii\helpers\Html::a('Команды', ['group/index'], ['class' => 'btn btn-primary'])?></p>
    <p><?= yii\helpers\Html::a('Приоритет групп', ['grouppriority/index'], ['class' => 'btn btn-primary'])?></p>
    <p><?= yii\helpers\Html::a('Выбрать текущий заезд', ['currbatch/index'], ['class' => 'btn btn-primary'])?></p>
    <p><?= yii\helpers\Html::a('Активности', ['event/index'], ['class' => 'btn btn-primary'])?></p>
</div>
</body>