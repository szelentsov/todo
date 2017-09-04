<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed" rel="stylesheet">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="pjax-container">
    <div class="container-fluid">
        <div class="row">
            <header>
                <h1 class="text-center">simple todo lists</h1>
                <p class="text-center">from ruby garage</p>
            </header>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <section>
                <?= $content ?>
            </section>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <footer>
                <p class="text-center">&#169; SZelentsov</p>
            </footer>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
