<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Jimanji',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Командный зачет', 'url' => ['/cwinners/index']],
            ['label' => 'Промежуточный командный', 'url' => ['/cwinners/teampos']],
            ['label' => 'Индивидуальный зачет', 'url' => ['/cwinners/individual']],
            ['label' => 'Индивидуальный зачет женский', 'url' => ['/cwinners/individualm']],
            ['label' => 'Индивидуальный зачет мужской', 'url' => ['/cwinners/individualf']],
            ['label' => 'Промежуточный индивидуальный', 'url' => ['/cwinners/individualpos']],
            ['label' => 'Промежуточный индивидуальный женский', 'url' => ['/cwinners/individualposf']],
            ['label' => 'Промежуточный индивидуальный мужской', 'url' => ['/cwinners/individualposm']],
            ['label' => 'Маршруты', 'url' => ['/cwinners/routes']],
            ['label' => 'Кубики', 'url' => ['/cwinners/kubik']],
        ],
    ]);
    NavBar::end();
    ?>

    
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Jimanji <?= date('Y') ?></p>

        <p class="pull-right">Powered by VelorTeam</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
