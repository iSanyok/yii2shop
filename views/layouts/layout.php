<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <!--
    Design by TEMPLATED
    http://templated.co
    Released for free under the Creative Commons Attribution License

    Name       : Vestibule
    Description: A two-column, fixed-width design with dark color scheme.
    Version    : 1.0
    Released   : 20130406

    -->
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Категории', 'url' => ['/site/index']],
            ['label' => 'Корзина', 'url' => ['/site/about']],
            ['label' => 'Наши магазины', 'url' => ['/site/contact']],
//            Yii::$app->user->isGuest ? (
//            ['label' => 'Login', 'url' => ['/site/login']]
//            ) : (
//                '<li>'
//                . Html::beginForm(['/site/logout'], 'post')
//                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->username . ')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>'
//            )
        ],
    ]);
    NavBar::end();
    ?>
    <div style="padding-top: 5em">
    <?= $content ?>
    </div>
    <div id="footer">
        <p>© 2013 Untitled Inc. All rights reserved. Lorem ipsum dolor sit amet nullam blandit consequat phasellus etiam
            lorem. Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>. Photos by <a
                    href="http://fotogrph.com/">Fotogrph</a>.</p>
    </div>
    <!-- end #footer -->
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>