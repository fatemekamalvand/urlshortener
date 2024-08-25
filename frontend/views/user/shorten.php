<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="site-shorten">
    <div class="form-container">
        <h1 class="text-center">کوتاه‌کننده لینک</h1>

        <?php $form = ActiveForm::begin([
            'id' => 'shorten-form',
            'action' => ['user/shorten'], // مسیر اکشن
            'method' => 'post',
            'options' => ['class' => 'form-horizontal'],
        ]); ?>

        <div class="form-group">
            <?= $form->field($model, 'original_url')->textInput(['placeholder' => 'آدرس URL اصلی را وارد کنید', 'class' => 'form-control'])->label(false) ?>
        </div>

        <div class="form-group text-center">
            <?= Html::submitButton('ایجاد لینک کوتاه', ['class' => 'btn btn-primary btn-lg']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<style>
    .site-shorten {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f4f7f6;
        padding: 20px;
    }
    .form-container {
        padding: 30px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        width: 100%;
    }
    .site-shorten h1 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-control {
        border-radius: 4px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        height: 44px;
        font-size: 16px;
    }
    .btn {
        border-radius: 4px;
        padding: 10px 20px;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>

<!---->
<?php
//use yii\helpers\Html;
//use yii\widgets\ActiveForm;
//?>
<!---->
<!--<div class="site-shorten">-->
<!--    <div class="form-container">-->
<!--        <h1 class="text-center">کوتاه‌کننده لینک</h1>-->
<!---->
<!--        --><?php //$form = ActiveForm::begin([
//            'id' => 'shorten-form',
//            'action' => ['site/shorten'], // مسیر اکشن
//            'method' => 'post',
//            'options' => ['class' => 'form-horizontal'],
//        ]); ?>
<!---->
<!--        <div class="form-group">-->
<!--            --><?php //= $form->field($model, 'original_url')->textInput(['placeholder' => 'آدرس URL اصلی را وارد کنید', 'class' => 'form-control'])->label(false) ?>
<!--        </div>-->
<!---->
<!--        <div class="form-group text-center">-->
<!--            --><?php //= Html::submitButton('ایجاد لینک کوتاه', ['class' => 'btn btn-primary btn-lg']) ?>
<!--        </div>-->
<!---->
<!--        --><?php //ActiveForm::end(); ?>
<!--    </div>-->
<!--</div>-->
