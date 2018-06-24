<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\people\assets\HistoryFormAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model app\modules\resource\models\ResGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
   HistoryFormAsset::register($this, View::POS_READY)

?>
<div ng-app="MyApp" class="history-form">
    <div ng-controller="FormController as ctrl">
    {{33+2}}
    </div>
</div>