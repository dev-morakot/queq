<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\resource\models\ResGroup */

$this->title = Yii::t('app', 'กรอกประวัติและจองคิว');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'กรอกประวัติ'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="res-people-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
