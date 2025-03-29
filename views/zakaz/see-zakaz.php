<?php
use yii\helpers\Url;
use app\models\Products;
$this->title = "Zakazlar ro'yhati";
$count = 0;
$sum = 0;
?>
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <?php if (!empty($zakaz)): ?>
        <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="cart-title mt-50">
                        <h2>Buyurtmalar ro'yhati</h2>
                    </div>
                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Mahsulot nomi</th>
                                        <th>Narxi</th>
                                        <th>Soni</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($zakaz as $r): ?>
                                        <?php
                                            $model = Products::find()
                                                ->asArray()
                                                ->where(['id' => $r['product_id']])
                                                ->all();
                                            $count += $r['product_count'];
                                        ?>
                                        <?php foreach ($model as $v): ?>
                                            <?php
                                                $sum += $v['product_sum'] * $r['product_count'];
                                            ?>
                                            <tr>
                                                <td class="cart_product_img">
                                                    <a href="#"><img src="<?=Url::base()?>/img/real-img/<?=$v['product_img']?>"
                                                   alt="Product"></a>
                                                </td>
                                                <td class="cart_product_desc">
                                                    <h5><?= $v['product_name'] ?></h5>
                                                </td>
                                                <td class="price">
                                                    <span><?= $v['product_sum'] ?></span>
                                                </td>
                                                <td class="qty">
                                                    <div class="qty-btn d-flex">
                                                        <div class="quantity">
                                                            <input type="number" value="<?= $r['product_count'] ?>" readonly>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Umumiy ma'lumotlar</h5>
                            <ul class="summary-table">
                                <li><span>Jami soni:</span> <span><?=$count?></span></li>
                                <li><span>Umumiy summa:</span> <span>$<?=$sum?></span></li>
                            </ul>
                            <h4 style="color: yellow">Buyurtmalaringiz tez orada yetib boradi!</h4>
                        </div>
                    </div>
        </div>
        <?php else: ?>
            <div class="alert alert-danger">
                Buyurtmalar mavjud emas!
            </div>
        <?php endif; ?>
        </div>
    </div>
</div>
</div>