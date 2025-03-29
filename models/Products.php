<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int $category_id
 * @property string $product_name
 * @property string $product_img
 * @property int $product_sum
 * @property int $product_accent
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'product_name', 'product_img', 'product_sum', 'product_accent'], 'required'],
            [['category_id', 'product_sum', 'product_accent'], 'integer'],
            [['product_name', 'product_img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'product_name' => 'Product Name',
            'product_img' => 'Product Img',
            'product_sum' => 'Product Sum',
            'product_accent' => 'Product Accent',
        ];
    }
}
