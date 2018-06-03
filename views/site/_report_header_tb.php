<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Settings;
?>
<?php
$setting = Settings::current();
$addr = $setting->defaultAddress;
?>

<table class="container">
    <tr>
        <td style="font-size:10px;">
            <div><?= Html::img(Yii::getAlias('@img_com') . '/' . $setting->logo, ['width' => 120]) ?></div>
            <div><span><?= $addr->company_name ?> เลขประจำตัวผู้เสียภาษี:<?= $setting->tax_no ?></span></div>
            <div><span><?= $addr->address1 ?> <?= $addr->address2 ?></span></div>
            <div><span>
                    <?php
                    if ($addr->district) {
                        echo 'อ.' . $addr->district->name . ', ';
                    }
                    if ($addr->province) {
                        echo 'จ.' . $addr->province->name . ', ';
                    }
                    if ($addr->postal_code) {
                        echo $addr->postal_code . ', ';
                    }
                    if ($addr->country) {
                        echo $addr->country->name;
                    }
                    ?>
                </span></div>
        </td>
        <td class="text-right">
            <div><h4><?= $docname ?></h4></div>
        </td>
    </tr>
</table>
