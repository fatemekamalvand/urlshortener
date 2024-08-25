<?php

use common\models\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \common\models\searchUrl $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<div class="col-md-9">

<div class="url-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'original_url:url',
            'shortened_url',
            'created_at',
            [
                'attribute' => 'user_id',
                'value' => function($model) {
                    $user = \common\models\User::findOne($model->user_id);
                    return $user->username;
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function($url, $model, $key) {
                        return Html::a('نمایش', ['user/viewurl', 'id' => $model->id], [
                            'class' => 'btn btn-primary btn-sm',
                        ]);
                    },
                    'update' => function($url, $model, $key) {
                        return Html::a('ویرایش', ['user/updateurl', 'id' => $model->id], [
                            'class' => 'btn btn-warning btn-sm',
                        ]);
                    },
                    'delete' => function($url, $model, $key) {
                        return Html::a('حذف', ['user/deleteurl', 'id' => $model->id], [
                            'class' => 'btn btn-danger btn-sm',
                            'data-confirm' => Yii::t('app', 'آیا از حذف آیتم مورد نظر مطمئن هستید؟'),
                            'data-method' => 'post',
                        ]);
                    },
                ],
                'contentOptions' => ['class' => 'text-center'], // دکمه‌ها را در وسط قرار می‌دهد
            ],
        ],
    ]); ?>

    </div>
</div>
