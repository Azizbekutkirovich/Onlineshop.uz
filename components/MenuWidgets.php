<?php

namespace app\components;
use app\models\Category;
use app\models\Products;
use yii\helpers\Url;

class MenuWidgets extends \yii\base\Widget
{
    public static $menu = [];
    private $products;
    public static $product = [];

    public function __construct(){
        $model = Category::find()
            ->asArray()
            ->indexBy('id')
            ->limit(8)
            ->all();
        foreach ($model as $key => $r) {
            self::$menu[$key] = $r['category_name'];     
        }
    }

    protected function getShow(){
        $str = '<div class="catagories-menu">';
        foreach (self::$menu as $key => $val) {
            $model = Products::find()
                ->asArray()
                ->where(['category_id' => $key])
                ->limit(6)
                ->orderBy(['id' => SORT_DESC])
                ->all();
            $str .= '<ul>';
            $str .= '<li class="active" class="active"><a href="'.Url::to(['shop/category', 'id' => $key]).'">'.$val.'</a>';
            if (!empty($model)) {
                foreach ($model as $r) {
                    $str .= '<li><a href="'.Url::to(['shop/products', 'id' => $r['id']]).'">'.$r['product_name'].'</a></li>';
                }
                $str .= '</li></ul>';
            }
        }
        $str .= "</div>";
        $this->products = $str;
    }

    public function show(){
        $this->getShow();
        return $this->products;
    }
}