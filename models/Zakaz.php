<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zakaz".
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int $product_count
 * @property int $product_sum
 */
class Zakaz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zakaz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id', 'product_count', 'product_sum'], 'required'],
            [['user_id', 'product_id', 'product_count', 'product_sum'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'product_id' => 'Product ID',
            'product_count' => 'Product Count',
            'product_sum' => 'Product Sum',
        ];
    }
}
