<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Url $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Urls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="col-md-9">

    <div class="url-view">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'original_url:url',
                [
                    'attribute' => 'shortened_url',
                    'format' => 'raw', // این خط ضروری است تا لینک به صورت HTML رندر شود
                    'value' => function($model) {
                        $url = \yii\helpers\Url::to(['user/redirect', 'shortCode' => $model->shortened_url], true);
                        return Html::a($model->shortened_url, $url, [
                            'class' => 'btn btn-link',
                            'target' => '_blank',
                        ]);
                    }
                ],
                'created_at',
                [
                    'attribute' => 'user_id',
                    'value' => function($model) {
                        $user = \common\models\User::findOne($model->user_id);
                        return $user ? $user->username : 'Unknown User';
                    }
                ],
                'click_count'
            ],
        ]) ?>

    </div>

    <p>
        <?= Html::a('Update', ['updateurl', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['deleteurl', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
