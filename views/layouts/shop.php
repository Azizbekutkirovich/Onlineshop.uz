<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use app\assets\AppAsset;
    use app\models\Cart;
    use app\models\Zakaz;

    AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="icon" href="https://img.freepik.com/premium-vector/business-online-shop-computer-monitor-store-icon_24877-106.jpg?w=2000">
    <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="<?=Url::to(['search/search'])?>" method="get">
                            <input type="search" name="search" id="search" placeholder="Mahsulot qidirish...">
                            <button type="submit"><img src="<?=Url::base()?>/img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.html"><img src="<?=Url::base()?>/img/real-img/logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="<?=Url::home()?>"><img style="width: 100px; height: 100px;" src="<?=Url::base()?>/img/real-img/logo.png" alt=""></a>
                <p><span style="color: red;">Onlineshop</span>.<span style="color: blue;">uz</span></p>
            </div>
            <nav class="amado-nav">
                <ul>
                    <li id="home"><a href="<?=Url::to(['shop/index'])?>">Bosh sahifa</a></li>
                    <li id="category"><a href="<?=Url::to(['shop/category?p=c'])?>">Mahsulotlar</a></li>
                    <?php if (Yii::$app->user->isGuest): ?>
                      <li><a href="<?=Url::to(['shop/login'])?>">Kirish</a></li>
                    <?php else: ?>
                      <li><a href="<?=Url::to(['shop/logout'])?>">Chiqish(<?= Yii::$app->user->identity->fullname ?>)</a></li>
                    <?php endif; ?>
                  </ul>
            </nav>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
              <?php if (!Yii::$app->user->isGuest): ?>
                <?php
                    $cart = Cart::find()
                        ->asArray()
                        ->where(['user_id' => Yii::$app->user->id])
                        ->all();
                    $zakaz = Zakaz::find()
                        ->asArray()
                        ->where(['user_id' => Yii::$app->user->id])
                        ->all();
                    $count = 0;
                    $zakaz_count = 0;
                    foreach ($zakaz as $r) {
                        $zakaz_count += $r['product_count'];
                    }
                    foreach ($cart as $r) {
                        $count += $r['product_count'];
                    }
                ?>
                <a href="<?=Url::to(['zakaz/see-zakaz'])?>" class="cart-nav"><img src="<?=Url::base()?>/img/core-img/cart.png" alt="">Buyurtma<span>(<?= $zakaz_count ?>)</span></a>
                <a href="<?=Url::to(['cart/korzinka', 'k' => 'y'])?>" class="fav-nav"><img src="<?=Url::base()?>/img/core-img/favorites.png" alt="">Savatcha<span>(<?php echo $count; ?>)</span></a>
                <a href="#" class="search-nav"><img src="<?=Url::base()?>/img/core-img/search.png" alt="">Qidirish</a>
                <?php else: ?>
                <a href="#" class="search-nav"><img src="<?=Url::base()?>/img/core-img/search.png" alt="">Qidirish</a>
              <?php endif; ?>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="https://www.facebook.com/profile.php?id=100088713336950"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/safarovazizbek35/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="https://t.me/Azizbek_php"><i class="fa fa-telegram" aria-hidden="true"></i></a>
                <a href="https://www.linkedin.com/in/azizbek-safarov-743287222/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        <?= $content ?>
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="<?=Url::home()?>"><img style="width: 100px; height: 100px;" src="<?=Url::base()?>/img/real-img/logo.png" alt=""></a>
                        </div>
                        <!-- Copywrite Text -->
                        <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Barcha huquqlar himoyalangan | Bu platforma <span style="color: red;">Best_Developers</span> jamoasi tomonidan <a href="https://colorlib.com" target="_blank">ishlab chiqilgan</a> & Bosh dasturchi <a href="https://themewagon.com/" target="_blank">Safarov Azizbek</a></p>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="<?=Url::to(['shop/index'])?>">Bosh sahifa </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=Url::to(['shop/category', 'p' => 'c'])?>">Mahsulotlar</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>