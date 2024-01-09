<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Progress;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
$totalPercentage = $this->params['totalPercentage'];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php
                NavBar::begin([
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                        'class' => 'navbar-inverse navbar-fixed-left',
                    ],
                ]);
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav'],
                    'items' => [
                        ['label' => 'Home', 'url' => ['/site/index']],
                        ['label' => 'About', 'url' => ['/site/about']],
                    ],
                ]);
                NavBar::end();
                ?>
            </div>
            <div class="col-md-6">
                <?= $content ?>
                <div class="progress" role="progressbar" style="width: <?= $totalPercentage ?>%;" aria-valuenow="<?= $totalPercentage ?>" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar" style="width: <?= $totalPercentage ?>%"><?= $totalPercentage ?>%</div>
                </div>
            </div>
            <div class="col-md-3">
                <h1>Kontakt</h1>
            </div>
        </div>
    </div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
