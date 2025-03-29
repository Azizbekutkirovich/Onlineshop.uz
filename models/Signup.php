<?php

namespace app\models;
use yii\base\Model;

class Signup extends Model
{
    public $fullname;
    public $email;
    public $password;

    public function rules(){
        return [
            [['fullname', 'email', 'password'], 'required', 'message' => "Maydonni to'ldirish shart"],
            [['fullname', 'email'], 'string'],
            ['email', 'email'],
            [['email'], 'unique', 'targetClass' => 'app\models\Users'],
            // [['password'], 'match']
        ];
    }

    public function attributeLabels(){
        return [
            'fullname' => 'FISH',
            'email' => 'Email adress',
            'password' => 'Parol'
        ];
    }

    protected function save(){
        if ($this->validate()) {
            // echo $this->fullname;
            // echo $this->email;
            // echo $this->password;
            $user = new Users();
            $user->fullname = $this->fullname;
            $user->email = $this->email;
            $user->password = $this->password;
            // $user->attributes = $this->attributes;
            return $user->create();
        }
    }

    public function signup() {
        return $this->save();
    }
}