<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = '404';
?>
<div class="site-error" style="margin-top: 100px;">

    <h1>Sahifa topilmadi</h1>

    <a href="<?=Url::home();?>" class="btn btn-info">Ortga qaytish</a>

</div>
