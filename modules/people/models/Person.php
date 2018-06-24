<?php

namespace app\modules\people\models;

use Yii;

/**
 * This is the model class for table "{{%res_person}}".
 *
 * @property int $id
 * @property string $state สถานะการจองคิว
 * @property string $date_queue วันที่จองคิว
 * @property string $prefixes คำนำหน้า
 * @property string $prefixes_en คำนำหน้าภาษาอังกฤษ
 * @property string $firstname
 * @property string $lastname
 * @property string $firstname_en
 * @property string $lastname_en
 * @property string $public_code รหัสบัตรประชาชน
 * @property string $career อาชีพ
 * @property string $blood_type หมู่เลือด
 * @property string $religion ศาสนา
 * @property string $status สถานภาพสมรส
 * @property string $birthday วันที่เกิด
 * @property int $age อายุ
 * @property string $nationality สัญชาติ
 * @property string $address ที่อยู่
 * @property int $district_id อำเภอ
 * @property int $subdistrict ตำบล
 * @property int $province_id จังหวัด
 * @property int $zip_code รหัสไปรษณีย์
 * @property string $tel โทรศัพท์บ้าน
 * @property string $mobile โทรศัพท์มือถือ
 * @property string $create_date
 * @property int $create_uid
 * @property int $write_uid
 * @property string $write_date
 */
class Person extends \yii\db\ActiveRecord
{
    const DRAFT = "draft";
    const CANCEL = "cancel";
    const CONFIRMED = "confirmed";
    const APPROVED = "approved";
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%res_person}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_queue', 'birthday', 'create_date', 'write_date'], 'safe'],
            [['age', 'district_id', 'subdistrict', 'province_id', 'zip_code', 'create_uid', 'write_uid'], 'integer'],
            [['state'], 'string', 'max' => 70],
            [['prefixes', 'prefixes_en', 'blood_type'], 'string', 'max' => 20],
            [['firstname', 'lastname', 'firstname_en', 'lastname_en', 'religion', 'nationality', 'tel', 'mobile'], 'string', 'max' => 50],
            [['public_code'], 'string', 'max' => 15],
            [['career'], 'string', 'max' => 200],
            [['status'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'state' => 'สถานะการจองคิว',
            'date_queue' => 'วันที่จองคิว',
            'prefixes' => 'คำนำหน้า',
            'prefixes_en' => 'คำนำหน้าภาษาอังกฤษ',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'firstname_en' => 'Firstname En',
            'lastname_en' => 'Lastname En',
            'public_code' => 'รหัสบัตรประชาชน',
            'career' => 'อาชีพ',
            'blood_type' => 'หมู่เลือด',
            'religion' => 'ศาสนา',
            'status' => 'สถานภาพสมรส',
            'birthday' => 'วันที่เกิด',
            'age' => 'อายุ',
            'nationality' => 'สัญชาติ',
            'address' => 'ที่อยู่',
            'district_id' => 'อำเภอ',
            'subdistrict' => 'ตำบล',
            'province_id' => 'จังหวัด',
            'zip_code' => 'รหัสไปรษณีย์',
            'tel' => 'โทรศัพท์บ้าน',
            'mobile' => 'โทรศัพท์มือถือ',
            'create_date' => 'Create Date',
            'create_uid' => 'Create Uid',
            'write_uid' => 'Write Uid',
            'write_date' => 'Write Date',
        ];
    }

    /**
     * {@inheritdoc}
     * @return PersonQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PersonQuery(get_called_class());
    }
}
