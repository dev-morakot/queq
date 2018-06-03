<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\web\View;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php $this->registerJs("
            numeral.language('th');
            bootbox.setDefaults({
                backdrop:true,
                closeButton:true,
                animage:true,
                className:'bic-modal'
            });
            ",View::POS_END)?>
</head>
<body>
<?php
    if(!isset($this->params['body_container'])){
        $this->params['body_container'] = "container";
    } 
?>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
        'innerContainerOptions'=>[
            'class'=>'container'
        ]
    ]);
   
    $menuItems = [
            [
                'label' => 'ตรวจสอบรายการจองคิว',
                'url'=>['/resource/default'],
               
            ],
            
            //['label' => 'About', 'url' => ['/site/about']],
            //['label' => 'Contact', 'url' => ['/site/contact']],
        ];
     
    if(Yii::$app->user->isGuest){
        $menuItems[] = ['label' => 'สำหรับเจ้าหน้าที่', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
          'label' => 'Me',
          'items'=>[
             ['label'=>'Profile ('.Yii::$app->user->identity->username.')', 'url'=>['/site/profile']],
             '<li class="divider"></li>',
             [
                 'label' => 'Logout',
                 'url' => ['/site/logout'],
                 'linkOptions' => ['data-method' => 'post']
             ],
          ],
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

<div class="<?=$this->params['body_container']?>">
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'homeLink'=>isset($this->params['homeLink'])? $this->params['homeLink']:false
]) ?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>
<?php if (Yii::$app->session->hasFlash('warning')): ?>
    <div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?= Yii::$app->session->getFlash('warning') ?>
    </div>
<?php endif; ?>
<?= $content ?>
</div>
</div>

<footer class="footer">
<div class="container">
    <p class="pull-left">&copy; <?=Yii::$app->params['companyLabel']?> <?= date('Y') ?></p>
    <p class="pull-right">
        <?php
            $dt = new \DateTime();
            $dbdt = Yii::$app->db->createCommand('SELECT NOW()')->queryScalar();
        ?>
        <span><b>Date/Time:</b> <?=$dt->format('Y-m-d H:i:s')?></span>
        <span><b>Timezone:</b> <?=$dt->getTimezone()->getName()?></span>
        <span><b>DB Date/Time:</b> <?=$dbdt?></span>
    </p>

    <p class="pull-right"><?php Yii::powered() ?></p>
</div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
