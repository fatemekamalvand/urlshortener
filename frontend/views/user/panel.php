<?php

use yii\helpers\Html;

$this->title = 'User Panel';
?>


    <div class="col-md-9">

        <!-- محتوای صفحه -->
        <h1><?= Html::encode($this->title) ?></h1>
        <p>Welcome, <?= Html::encode($user->username) ?>!</p>
        <p>Email: <?= Html::encode($user->email) ?></p>
        <p>Number of URLs: <?= Html::encode($urlCount) ?></p>
        <p>Total Clicks: <?= Html::encode($clickCount) ?></p>
    </div>

