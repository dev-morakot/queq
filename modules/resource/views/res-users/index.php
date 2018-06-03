<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\resource\models\ResUsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'ผู้ใช้ระบบ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin'), 'url' => ['/admin/default']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="res-users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'เพิ่มรายการ'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'code:text:รหัสพนักงาน',
//            'auth_key',
            //'password_hash',
            //'password_reset_token',
            // 'verifymail_token',
            'email:email',
            'firstname',
            'lastname',
            [
              'label'=>'สังกัด',
                'format'=>'html',
                'value'=>function($model){
                    return "<small>".$model->getGroupDisplay()."</small>";
                }
            ],
            //'groupDisplay:text:สังกัด',
            'active:boolean',
            // 'company_id',
            // 'default_section_id',
            // 'create_uid',
            // 'create_date',
            // 'write_uid',
            // 'write_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
