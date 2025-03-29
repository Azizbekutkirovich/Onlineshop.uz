<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Products;

class SearchController extends Controller
{
    public function actionSearch(){
        $get = Yii::$app->request->get("search");
        if (!empty($get)) {
            $products = Products::find()
                ->asArray()
                ->where(['like', 'product_name', $get])
                ->orWhere(['like', 'product_sum', $get])
                ->all();
            return $this->render("search", compact("products"));
        } else {
            return $this->redirect(['shop/index']);
        }
    }
}