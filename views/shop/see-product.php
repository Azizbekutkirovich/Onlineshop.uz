<?php
    use yii\helpers\Url;
    use app\models\Products;
    use app\models\Category;
    $products = Products::findOne(['id' => $id]);
    $category = Category::findOne(['id' => $products['category_id']]);
    $this->title = $products->product_name;
    // echo '<pre>';
    //     print_r($products);
    // echo '</pre>';
    // foreach ($products as $r) {
    //     echo $r;
    // }
    // die;
?>
 <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                                <li class="breadcrumb-item"><a href="#">Mahsulotlar</a></li>
                                <li class="breadcrumb-item"><a href="#"></a><?=$category['category_name']?></li>
                                <li class="breadcrumb-item active" aria-current="page"><?=$products['product_name']?></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <!-- <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(<?=Url::base()?>/img/product-img/pro-big-1.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(<?=Url::base()?>/img/product-img/pro-big-2.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(<?=Url::base()?>/img/product-img/pro-big-3.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(<?=Url::base()?>/img/product-img/pro-big-4.jpg);">
                                    </li>
                                </ol> -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="<?=Url::base()?>/img/real-img/<?=$products['product_img']?>">
                                            <img class="d-block w-100" src="<?=Url::base()?>/img/real-img/<?=$products['product_img']?>" alt="First slide">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price"><?= $products->product_sum ?>$</p>
                                <a>
                                    <h6><?= $products->product_name ?></h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="review">
                                        <a href="#">Admin tomonidan</a>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                <p class="avaibility"><i class="fa fa-circle"></i> Mavjud</p>
                            </div>

                            <div class="short_overview my-5">
                                <p><?= $products->product_name ?></p>     
                            </div>

                            <!-- Add to Cart Form -->
                            <form class="cart clearfix" method="post">
                                <div class="cart-btn d-flex mb-50" id="qty-div">
                                    <input style="display: none;" id="product_name" value="<?= $products->product_name ?>"></input>
                                    <p>Soni</p>
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <!-- <script type="text/javascript">
                                    let info = document.getElementById("qty").getAttribute("value");
                                    document.cookie = document.getElementById("qty").getAttribute("value");
                                </script> -->
                                <?php if (!Yii::$app->user->isGuest): ?>
                                    <button type="submit" name="addtocart" value="5" class="btn amado-btn" id="add-cart"><a style="font-size: 20px; color: white;" href="">Xarid savatchaga qo'shish</a></button>
                                <?php else: ?>
                                    <a href="<?=Url::to(['shop/login']);?>" type="submit" style="color: white;" name="addtocart" value="5" class="btn amado-btn">Tizimga kirib oling</a>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
    </div>