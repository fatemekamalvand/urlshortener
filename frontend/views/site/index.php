<?php

use yii\helpers\Html;

$this->title = 'کوتاه کننده URL';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">

    <!-- Hero Section -->
    <div class="hero-section text-center text-white py-5" style="background: linear-gradient(to right, #1ABC9C, #16A085);">
        <h1 class="display-4">خوش آمدید!</h1>
        <p class="lead">با ابزار کوتاه‌کننده URL ما، لینک‌های طولانی خود را به لینک‌های کوتاه و منحصر به فرد تبدیل کنید. تجربه‌ای ساده و سریع برای اشتراک‌گذاری لینک‌ها.</p>
        <p>
            <?= Html::a('شروع', ['user/shorten'], ['class' => 'btn btn-light btn-lg']) ?>
        </p>
    </div>

    <!-- Features Section -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="feature-box text-center p-4 bg-white shadow-sm rounded">
                    <h2 class="h4">چرا استفاده کنیم؟</h2>
                    <p>با استفاده از این ابزار، لینک‌های طولانی خود را به آسانی مدیریت کنید و تجربه‌ای بهتر از اشتراک‌گذاری لینک‌ها داشته باشید.</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="feature-box text-center p-4 bg-white shadow-sm rounded">
                    <h2 class="h4">مدیریت لینک‌ها</h2>
                    <p>پس از ورود به سیستم، می‌توانید لیست URL‌های خود را مشاهده و مدیریت کنید. برای استفاده از این سرویس، ابتدا وارد حساب کاربری خود شوید.</p>
                    <p>اگر حساب کاربری ندارید، ابتدا ثبت نام کنید.</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="feature-box text-center p-4 bg-white shadow-sm rounded">
                    <h2 class="h4">راهنما</h2>
                    <p>ساده‌ترین روش برای استفاده از این سرویس، وارد کردن لینک و دریافت لینک کوتاه شده در کمترین زمان ممکن است.</p>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    .hero-section {
        background: linear-gradient(to right, #1ABC9C, #16A085);
    }
    .hero-section .btn {
        background-color: #FFFFFF;
        color: #1ABC9C;
        font-weight: bold;
    }
    .hero-section .btn:hover {
        background-color: #E8F5F0;
    }
    .feature-box {
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .feature-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .feature-box h2 {
        color: #1ABC9C;
    }
</style>
