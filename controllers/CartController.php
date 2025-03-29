<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Products;
use app\models\Cart;

class CartController extends Controller
{
    public function actionAddCart(){
        if (!Yii::$app->user->isGuest) {
            $product_name = Yii::$app->request->get("product_name");
            $count = Yii::$app->request->get("count");
            if (!empty($product_name) && !empty($count)) {
                $product_info = Products::findOne(['product_name' => $product_name]);
                if (!empty($product_info)) {
                    $history = Cart::findOne([
                        'user_id' => Yii::$app->user->id,
                        'product_id' => $product_info->id
                    ]);
                    // debug($history);
                    // echo Yii::$app->user->id;
                    // die;
                    if (!empty($history)) {
                        $history->product_count += $count;
                        $history->product_sum = $history->product_count * $history->product_sum;
                        if ($history->save()){
                            return true;
                        }
                    } else {
                        $model = new Cart();
                        $model->user_id = Yii::$app->user->id;
                        $model->product_id = $product_info->id;
                        $model->product_count = $count;
                        $model->product_sum = $product_info->product_sum * $count;
                        if ($model->save()) {
                            return true;
                        }
                    }
                } else {
                    return $this->redirect(['shop/index']);
                }
            } else {
                $id = Yii::$app->request->get("id");
                if (!empty($id)) {
                    $product = Products::findOne(['id' => $id]);
                    $history = Cart::findOne([
                        'user_id' => Yii::$app->user->id,
                        'product_id' => $id
                    ]);
                    if (!empty($history)) {
                        if (!empty($product)) {
                            $history->product_count += 1;
                            $history->product_sum += $product->product_sum;
                            if ($history->save()) {
                                return $this->redirect(['cart/korzinka', 'k' => 'y']);
                            } else {
                                ?>
                                <script>
                                    alert("Xatolik yuz berdi!");
                                </script>
                                <?php
                            }
                        }
                    } elseif (!empty($product)) {
                        $model = new Cart();
                        $model->user_id = Yii::$app->user->id;
                        $model->product_id = $id;
                        $model->product_count = 1;
                        $model->product_sum = $product->product_sum;
                        if ($model->save()) {
                            return $this->redirect(['cart/korzinka', 'k' => 'y']);
                        } else {
                            ?>
                            <script>
                                alert("Xatolik yuz berdi!");
                            </script>
                            <?php
                        }
                    }
                } else {
                    return $this->redirect(['shop/index']);
                }
            }
        } else {
            return $this->redirect(['shop/index']);
        }
    }

    public function actionKorzinka(){
        if (!Yii::$app->user->isGuest) {
            return $this->render("korzinka");
        } else {
            return $this->redirect(['shop/index']);
        }
    }

    public function actionDelItems(){
        $id = Yii::$app->request->get("id");
        if (!empty($id)) {
            $products = Cart::findOne([
                'user_id' => Yii::$app->user->id,
                'product_id' => $id
            ]);
            $sum = Products::findOne([
                'id' => $id
            ]);
            if (!empty($products)) {
                if ($products->product_count > 1) {
                    $products->product_count += -1;
                    if (!empty($sum)) {
                        $products->product_sum -= $sum->product_sum;
                    }                    
                    if ($products->save()) {
                        return $this->redirect(['cart/korzinka', 'k' => 'y']);
                    } else {
                        ?>
                        <script>
                            alert("Xatolik yuz berdi!");
                        </script>
                        <?php
                    }
                } else {
                    $products->delete();
                    return $this->redirect(['cart/korzinka', 'k' => 'y']);
                }
            } else {
                return $this->redirect(['shop/index']);
            }
        } else {
            return $this->redirect(['shop/index']);
        }
    }

    public function actionAllDelete(){
        $cart = Cart::find()
            ->asArray()
            ->where(['user_id' => Yii::$app->user->id])
            ->all();
        if (!empty($cart)) {
            foreach ($cart as $r) {
                $del = Cart::findOne($r['id']);
                $del->delete();
            }
            return $this->redirect(['cart/korzinka', 'k' => 'y']);
        } else {
            return $this->redirect(['cart/korzinka', 'k' => 'y']);
        }
    }
}