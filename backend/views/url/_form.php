<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Url $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="url-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'original_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shortened_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
