<?php
    use yii\helpers\Url;
    use app\components\MenuWidgets;
    $menu = new MenuWidgets();
    $this->title = "Mahsulotlar";
?>
<div class="shop_sidebar_area">

<!-- ##### Single Widget ##### -->
<div class="widget catagory mb-50">
    <!-- Widget Title -->
    <h6 class="widget-title mb-30">Kategoriyalar: </h6>

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
    <!-- <h6 class="widget-title mb-30">Brands</h6> -->

    <div class="widget-desc">
        <!-- Single Form Check -->
        <!-- <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="amado">
            <label class="form-check-label" for="amado">Amado</label>
        </div> -->
        <!-- Single Form Check -->
        <!-- <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="ikea">
            <label class="form-check-label" for="ikea">Ikea</label>
        </div> -->
        <!-- Single Form Check -->
        <!-- <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="furniture">
            <label class="form-check-label" for="furniture">Furniture Inc</label>
        </div> -->
        <!-- Single Form Check -->
        <!-- <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="factory">
            <label class="form-check-label" for="factory">The factory</label>
        </div> -->
        <!-- Single Form Check -->
        <!-- <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="artdeco">
            <label class="form-check-label" for="artdeco">Artdeco</label>
        </div> -->
    </div>
</div>

<!-- ##### Single Widget ##### -->
<div class="widget color mb-50">
    <!-- Widget Title -->
    <!-- <h6 class="widget-title mb-30">Color</h6> -->

    <div class="widget-desc">
        <!-- <ul class="d-flex">
            <li><a href="#" class="color1"></a></li>
            <li><a href="#" class="color2"></a></li>
            <li><a href="#" class="color3"></a></li>
            <li><a href="#" class="color4"></a></li>
            <li><a href="#" class="color5"></a></li>
            <li><a href="#" class="color6"></a></li>
            <li><a href="#" class="color7"></a></li>
            <li><a href="#" class="color8"></a></li>
        </ul> -->
    </div>
</div>

<!-- ##### Single Widget ##### -->
<div class="widget price mb-50">
    <!-- Widget Title -->
    <h6 class="widget-title mb-30">Narx</h6>

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
            <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                <!-- Total Products -->
                <div class="total-products">
                    <p>Barcha mahsulotlar: </p>
                    <!-- <div class="view d-flex">
                        <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    </div> -->
                </div>
                <!-- Sorting -->
                <div class="product-sorting d-flex">
                    <div class="sort-by-date d-flex align-items-center mr-15">
                        <!-- <p>Filtr</p>
                        <form action="#" method="get">
                            <select name="select" id="sortBydate">
                                <option value="value">Vaqt</option>
                                <option value="value">Yangilari</option>
                                <option value="value">Mashhurlari</option>
                            </select>
                        </form> -->
                    </div>
                    <!-- <div class="view-product d-flex align-items-center">
                        <p>View</p>
                        <form action="#" method="get">
                            <select name="select" id="viewProduct">
                                <option value="value">12</option>
                                <option value="value">24</option>
                                <option value="value">48</option>
                                <option value="value">96</option>
                            </select>
                        </form>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php foreach($products as $r): ?>
            <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                <div class="single-product-wrapper">
                    <!-- Product Image -->
                    <div class="product-img" style="text-align: center;">
                        <img style="width: 250px; height: 250px;" src="<?=Url::base()?>/img/real-img/<?=$r['product_img']?>" alt="">
                        <!-- Hover Thumb -->
                        <!-- <img class="hover-img" src="<?=Url::base()?>/img/product-img/product3.jpg" alt=""> -->
                    </div>

                    <!-- Product Description -->
                    <div class="product-description d-flex align-items-center justify-content-between">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price"><?= $r['product_sum'] ?>$</p>
                            <a href="<?=Url::to(['shop/see-product', 'id' => $r['id']])?>">
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
                            <div class="cart">
                            <?php if (!Yii::$app->user->isGuest): ?>
                                <a href="<?=Url::to(['cart/add-cart', 'id' => $r['id']])?>" data-toggle="tooltip" data-placement="left" title="Xarid savatchaga qo'shish"><img src="<?=Url::base()?>/img/core-img/cart.png" alt=""></a>
                            <?php else: ?>
                                <a href="<?=Url::to(['shop/login', 'id' => $r['id']])?>" data-toggle="tooltip" data-placement="left" title="Xarid savatchaga qo'shish"><img src="<?=Url::base()?>/img/core-img/cart.png" alt=""></a>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="row">
        <div class="col-12">
            <!-- Pagination -->
            <!-- <nav aria-label="navigation">
                <ul class="pagination justify-content-end mt-50">
                    <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                    <li class="page-item"><a class="page-link" href="#">02.</a></li>
                    <li class="page-item"><a class="page-link" href="#">03.</a></li>
                    <li class="page-item"><a class="page-link" href="#">04.</a></li>
                </ul>
            </nav> -->
        </div>
    </div>
</div>
</div>
</div>
<!-- ##### Main Content Wrapper End ##### -->