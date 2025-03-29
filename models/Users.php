<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

class Users extends \yii\db\ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['fullname', 'email', 'password'], 'required'],
            [['fullname', 'email', 'password'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'fullname' => 'Fullname',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    public function create(){
        return $this->save();
    }

    public static function findIdentity($id)
    {
        return self::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    public static function findEmail($email)
    {
        return self::findOne(['email' => $email]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        // return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        // return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}