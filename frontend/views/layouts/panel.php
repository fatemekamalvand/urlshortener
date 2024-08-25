<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\BootstrapAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

BootstrapAsset::register($this);
$this->registerCssFile('@web/css/bootstrap-rtl.min.css', ['depends' => [BootstrapAsset::className()]]);

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100" dir="rtl">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        body {
            background-color: #ECF0F1;
            font-family: 'Vazir', sans-serif;
            direction: rtl;
            text-align: right;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            background-color: #2C3E50;
            color: #FFFFFF;
            padding: 15px;
            height: 100vh;
            position: fixed;
            width: 250px;
            top: 0;
            right: 0;
            margin: 0;
            z-index: 1000; /* Ensure the sidebar is above other content */
        }
        .sidebar h2 {
            font-size: 18px;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 20px;
            color: #1ABC9C;
        }
        .sidebar a {
            color: #FFFFFF;
            text-decoration: none;
            display: block;
            padding: 10px 0;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #1ABC9C;
            text-decoration: none;
        }
        .content {
            margin-left: 0; /* No margin-left for content */
            margin-right: 270px; /* Adjust this to make space for the sidebar */
            padding: 20px;
            background-color: #FFFFFF;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            min-height: 100vh; /* Ensure content stretches to full height */
        }
        .header {
            background-color: #1ABC9C;
            color: #FFFFFF;
            padding: 10px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .btn-primary, .btn-warning, .btn-danger {
            border-radius: 4px;
            padding: 8px 12px;
            font-size: 14px;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => 'urlshortener',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);

    $menuItems = [];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'ثبت نام', 'url' => ['/site/signup']];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);

    if (Yii::$app->user->isGuest) {
        echo Html::tag('div', Html::a('ورود', ['/site/login'], ['class' => 'btn btn-link login text-decoration-none']), ['class' => 'd-flex']);
    } else {
        $menuItems[] = ['label' => 'پنل کاربری', 'url' => ['/user/panel']]; // دکمه پنل کاربری
        $menuItems[] = '<li>';
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'خروج (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            )
            . Html::endForm();
        echo '</li>';
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => $menuItems,
    ]);

    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container-fluid"> <!-- Use container-fluid to extend the width -->
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <div class="row">
            <div class="col-md-10 content">
                <div class="header">
                    <h1><?= Html::encode($this->title) ?></h1>
                </div>
                <?= $content ?>
            </div>
            <div class="col-md-2">
                <!-- منوی سمت راست -->
                <div class="sidebar">
                    <h2>پنل کاربری</h2>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/user/panel']) ?>">پنل کاربری</a>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/user/shorten']) ?>">ایجاد لینک</a>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/user/url-management']) ?>">مدیریت لینک ها</a>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/site/logout']) ?>" data-method="post">خروج</a>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-end"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
