<?php
    use yii\helpers\Url;
    use app\models\Products;
    
    $products = Products::find()
        ->asArray()
        ->all();
    // debug(Yii::$app->request->get());
    // die;
    $this->title = "Bosh sahifa";
?>
<!-- Product Catagories Area Start -->
<div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">

                <!-- Single Catagory -->
                <?php foreach ($products as $r): ?>
                    <div class="single-products-catagory clearfix">
                        <a href="<?=Url::to(['shop/see-product', 'id' => $r['id']])?>">
                            <img style="width: 350px; height: 350px;" src="<?=Url::base()?>/img/real-img/<?=$r['product_img']?>" alt="">
                            <div class="hover-content">
                                <div class="line"></div>
                                <p style="color: red;"><?= $r['product_sum'] ?>$</p>
                                <h4 style="color: red;"><?= $r['product_name'] ?></h4>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->