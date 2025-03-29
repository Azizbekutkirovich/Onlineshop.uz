<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\Signup;
use app\models\Products;

class ShopController extends Controller
{
    public function actionIndex(){
        return $this->render("index");
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = false;
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSeeProduct(){
        $id = Yii::$app->request->get("id");
        if (!empty($id)) {
            return $this->render("see-product", compact("id"));
        } else {
            return $this->redirect(['shop/index']);
        }
    }

    public function actionRegister(){
        if (Yii::$app->user->isGuest) {
            $this->layout = false;
            $model = new Signup();

            if ($model->load(Yii::$app->request->post())) {
                $post = Yii::$app->request->post();
                $ok = false;
                for ($i = 0; $i < strlen($model->email); $i++) {
                    if ($model->email[$i] == "@") {
                        $ok = true;
                    }
                }
                if ($ok == true) {
                    if (strlen($model->password) >= 4) {
                        if ($model->signup()) {
                            $login = new LoginForm();
                            $login->email = $model->email;
                            $login->password = $model->password;
                            if ($login->login()) {
                                return $this->redirect(['shop/index']);
                            }
                        } else {
                            Yii::$app->session->setFlash("error", "Ma'lumotlar saqlanmadi! Maydonlarni to'g'riligini tekshiring");
                            return $this->redirect(['shop/register']);
                        }
                    } else {
                        Yii::$app->session->setFlash("error", "Parol kamida 4ta belgidan iborat bo'lishi kerak");
                        return $this->redirect(['shop/register']);
                    }
                } else {
                    Yii::$app->session->setFlash("error", "Emailda xatolik mavjud!");
                    return $this->redirect(['shop/register']);
                }
            }

            return $this->render("register", compact("model"));
        } else {
            return $this->redirect(['shop/index']);
        }
    }

    public function actionCategory(){
        $id = Yii::$app->request->get("id");
        if (!empty($id)) {
            $products = Products::find()
                ->asArray()
                ->where(['category_id' => $id])
                ->all();
            return $this->render("category", compact("products"));
        } else {
            $products = Products::find()
                ->asArray()
                ->all();
            return $this->render("category", compact("products"));
        }
    }

    public function actionProducts(){
        $id = Yii::$app->request->get("id");
        if (!empty($id)) {
            $products = Products::find()
                ->asArray()
                ->where(['id' => $id])
                ->all();
            
            return $this->render("category", compact("products"));
        } else {
            return $this->redirect(['shop/index']);
        }
    }
}