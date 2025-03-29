<?php
    use yii\helpers\Url;
    use app\components\MenuWidgets;
    $menu = new MenuWidgets();
?>
<div class="shop_sidebar_area">

<!-- ##### Single Widget ##### -->
<div class="widget catagory mb-50">
    <!-- Widget Title -->
    <h6 class="widget-title mb-30">Mahsulotlar</h6>

    <!--  Catagories  -->
    <!-- <div class="catagories-menu">
        <ul>
            <li class="active"><a href="#">Chairs</a></li>
            <li><a href="#">Beds</a></li>
            <li><a href="#">Accesories</a></li>
            <li><a href="#">Furniture</a></li>
            <li><a href="#">Home Deco</a></li>
            <li><a href="#">Dressings</a></li>
            <li><a href="#">Tables</a></li>

        </ul>
    </div> -->
    <?php
        echo $menu->show();
    ?>
</div>

<!-- ##### Single Widget ##### -->
<div class="widget brands mb-50">
    <!-- Widget Title -->
    <h6 class="widget-title mb-30">Brands</h6>

    <div class="widget-desc">
        <!-- Single Form Check -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="amado">
            <label class="form-check-label" for="amado">Amado</label>
        </div>
        <!-- Single Form Check -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="ikea">
            <label class="form-check-label" for="ikea">Ikea</label>
        </div>
        <!-- Single Form Check -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="furniture">
            <label class="form-check-label" for="furniture">Furniture Inc</label>
        </div>
        <!-- Single Form Check -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="factory">
            <label class="form-check-label" for="factory">The factory</label>
        </div>
        <!-- Single Form Check -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="artdeco">
            <label class="form-check-label" for="artdeco">Artdeco</label>
        </div>
    </div>
</div>

<!-- ##### Single Widget ##### -->
<div class="widget color mb-50">
    <!-- Widget Title -->
    <h6 class="widget-title mb-30">Color</h6>

    <div class="widget-desc">
        <ul class="d-flex">
            <li><a href="#" class="color1"></a></li>
            <li><a href="#" class="color2"></a></li>
            <li><a href="#" class="color3"></a></li>
            <li><a href="#" class="color4"></a></li>
            <li><a href="#" class="color5"></a></li>
            <li><a href="#" class="color6"></a></li>
            <li><a href="#" class="color7"></a></li>
            <li><a href="#" class="color8"></a></li>
        </ul>
    </div>
</div>

<!-- ##### Single Widget ##### -->
<div class="widget price mb-50">
    <!-- Widget Title -->
    <h6 class="widget-title mb-30">Price</h6>

    <div class="widget-desc">
        <div class="slider-range">
            <div data-min="10" data-max="1000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="10" data-value-max="1000" data-label-result="">
                <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
            </div>
            <div class="range-price">$10 - $1000</div>
        </div>
    </div>
</div>
</div>

<div class="amado_product_area section-padding-100">
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <!-- <div class="product-topbar d-xl-flex align-items-end justify-content-between"> -->
                <!-- Total Products -->
                <!-- <div class="total-products">
                    <div class="view d-flex">
                        <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    </div>
                </div> -->
                <!-- Sorting -->
                <!-- <div class="product-sorting d-flex">
                    <div class="sort-by-date d-flex align-items-center mr-15">
                        <p>Sort by</p>
                        <form action="#" method="get">
                            <select name="select" id="sortBydate">
                                <option value="value">Date</option>
                                <option value="value">Newest</option>
                                <option value="value">Popular</option>
                            </select>
                        </form>
                    </div>
                    <div class="view-product d-flex align-items-center">
                        <p>View</p>
                        <form action="#" method="get">
                            <select name="select" id="viewProduct">
                                <option value="value">12</option>
                                <option value="value">24</option>
                                <option value="value">48</option>
                                <option value="value">96</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    <div class="row">
        <?php if (!empty($products)): ?>
            <?php foreach($products as $r): ?>
                <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="<?=Url::base()?>/img/real-img/<?=$r['product_img']?>" alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="<?=Url::base()?>/img/real-img/<?=$r['product_img']?>" alt="">
                        </div>

                        <!-- Product Description -->
                        <div class="product-description d-flex align-items-center justify-content-between">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price"><?= $r['product_sum'] ?>$</p>
                                <a href="product-details.html">
                                    <h6><?= $r['product_name'] ?></h6>
                                </a>
                            </div>
                            <!-- Ratings & Cart -->
                            <div class="ratings-cart text-right">
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <?php if (!Yii::$app->user->isGuest): ?>
                                    <div class="cart">
                                        <a href="<?=Url::to(['cart/add-cart', 'id' => $r['id']])?>" data-toggle="tooltip" data-placement="left" title="Xarid savatchaga qo'shish"><img src="<?=Url::base()?>/img/core-img/cart.png" alt=""></a>
                                    </div>
                                <?php else: ?>
                                    <div class="cart">
                                        <a href="<?=Url::to(['shop/login'])?>" data-toggle="tooltip" data-placement="left" title="Xarid savatchaga qo'shish"><img src="<?=Url::base()?>/img/core-img/cart.png" alt=""></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-info">Bunday mahsulot topilmadi!</div>
        <?php endif; ?>
    </div>
</div>
</div>
</div>
<!-- ##### Main Content Wrapper End ##### -->

<!-- ##### Newsletter Area Start ##### -->
<section class="newsletter-area section-padding-100-0">
<div class="container">
<div class="row align-items-center">
    <!-- Newsletter Text -->
    <div class="col-12 col-lg-6 col-xl-7">
        <div class="newsletter-text mb-100">
            <h2>Subscribe for a <span>25% Discount</span></h2>
            <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
        </div>
    </div>
    <!-- Newsletter Form -->
    <div class="col-12 col-lg-6 col-xl-5">
        <div class="newsletter-form mb-100">
            <form action="#" method="post">
                <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                <input type="submit" value="Subscribe">
            </form>
        </div>
    </div>
</div>
</div>
</section>
<!-- ##### Newsletter Area End ##### -->
