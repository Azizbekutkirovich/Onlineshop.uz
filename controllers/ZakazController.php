<?php

namespace app\controllers;
use yii\web\Controller;
use app\models\Cart;
use app\models\Zakaz;
use Yii;

class ZakazController extends Controller
{
    public function actionOneZakaz(){
        $id = Yii::$app->request->get("id");
        if (!empty($id)) {
            $cart = Cart::findOne(['id' => $id]);
            if (!empty($cart)) {
                $history = Zakaz::findOne([
                    'user_id' => Yii::$app->user->id,
                    'product_id' => $cart->product_id
                ]);
                // debug($cart);
                // die;
                if (!empty($history)) {
                    $history->product_count += $cart->product_count;
                    $history->product_sum += $cart->product_sum;
                    if ($cart->delete()) {
                        if ($history->save()) {
                            return $this->redirect(['zakaz/see-zakaz']);
                        }
                    }
                } else {
                    $model = new Zakaz();
                    $model->user_id = Yii::$app->user->id;
                    $model->product_id = $cart->product_id;
                    $model->product_count = $cart->product_count;
                    $model->product_sum = $cart->product_sum;
                    if ($cart->delete()) {
                        if ($model->save()) {
                            return $this->redirect(['zakaz/see-zakaz']);
                        }
                    }
                }
            } else {
                return $this->redirect(['shop/index']);
            }
        } else {
            return $this->redirect(['shop/index']);
        }
    }

    public function actionSeeZakaz(){
        if (!Yii::$app->user->isGuest) {
            $zakaz = Zakaz::find()
                ->asArray()
                ->where(['user_id' => Yii::$app->user->id])
                ->all();
            return $this->render("see-zakaz", compact("zakaz"));
        } else {
            return $this->redirect(['shop/login']);
        }
    }

    public function actionAllZakaz(){
        if (!Yii::$app->user->isGuest) {
            $cart = Cart::find()
                ->asArray()
                ->where(['user_id' => Yii::$app->user->id])
                ->all();
            if (!empty($cart)) {
                foreach ($cart as $r) {
                    $del = Cart::findOne([$r['id']]);
                    $zakaz = Zakaz::findOne([
                        'user_id' => Yii::$app->user->id,
                        'product_id' => $r['product_id']
                    ]);
                    if (!empty($zakaz)) {
                        $zakaz->product_count += $r['product_count'];
                        $zakaz->product_sum += $r['product_sum'];
                        $del->delete();
                        $zakaz->save();
                    } else {
                        $zakaz = new Zakaz();
                        $zakaz->user_id = Yii::$app->user->id;
                        $zakaz->product_id = $r['product_id'];
                        $zakaz->product_count = $r['product_count'];
                        $zakaz->product_sum = $r['product_sum'];
                        $del->delete();
                        $zakaz->save();
                    }
                }
                 return $this->redirect(['zakaz/see-zakaz']);
            } else {
                return $this->redirect(['shop/index']);
            }
        } else {
            return $this->redirect(['shop/login']);
        }
    }
}