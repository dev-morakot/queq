<?php

namespace app\modules\people;
use Yii;
use app\modules\people\models\Person;
/**
 * people module definition class
 */
class People extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\people\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public static function State(){
        $arr = [
            ['id' => Person::DRAFT, 'name' => 'ดราฟ'],
            ['id' => Person::CONFIRMED, 'name'=> 'ยืนยัน'],
            ['id' => Person::APPROVED, 'name'=> 'อนุมัติ'],
            ['id' => Person::CANCEL, 'name' => 'ยกเลิก']

        ];

        return $arr;
    }
}
