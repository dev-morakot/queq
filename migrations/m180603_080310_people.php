<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Class m180603_080310_people
 */
class m180603_080310_people extends Migration
{

    public function tableOptions(){
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        return $tableOptions;
    }
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // res_people
        $this->createTable('res_people', [
            'id'=>$this->primaryKey(),
            'state'=>$this->string(70)->comment('สถานะการจองคิว'),
            'date_queue'=>$this->dateTime()->comment('วันที่จองคิว'),
            'prefixes'=>$this->string(20)->comment('คำนำหน้า'),
            'prefixes_en'=>$this->string(20)->comment('คำนำหน้าภาษาอังกฤษ'),
            'firstname' => $this->string(50),
            'lastname' => $this->string(50),
            'firstname_en' => $this->string(50),
            'lastname_en' => $this->string(50),
            'public_code'=>$this->string(15)->comment("รหัสบัตรประชาชน"),
            'career'=>$this->string(200)->comment('อาชีพ'),
            'blood_type'=>$this->string(20)->comment('หมู่เลือด'),
            'religion'=>$this->string(50)->comment('ศาสนา'),
            'status'=>$this->string(100)->comment('สถานภาพสมรส'),
            'birthday'=>$this->date()->comment('วันที่เกิด'),
            'age'=>$this->integer(11)->comment('อายุ'),
            'nationality'=>$this->string(50)->comment('สัญชาติ'),

            'address'=>$this->string(255)->comment('ที่อยู่'),
            'district_id'=>$this->integer(11)->comment('อำเภอ'),
            'subdistrict'=>$this->integer(11)->comment('ตำบล'),
            'province_id'=>$this->integer(11)->comment('จังหวัด'),
            'zip_code'=>$this->integer(10)->comment('รหัสไปรษณีย์'),
            'tel'=>$this->string(50)->comment('โทรศัพท์บ้าน'),
            'mobile'=>$this->string(50)->comment('โทรศัพท์มือถือ'),
            'create_date'=>$this->dateTime()->comment('วันที่สร้าง'),

            //
            'create_uid' => $this->integer(), // Created by
            'create_date' =>$this->timestamp()->defaultValue(null), // Created on
            'write_uid'=> $this->integer(), // Last Updated by
            'write_date' => $this->timestamp()->defaultValue(null), // Last Updated on

        ],$this->tableOptions());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       
        $this->dropTable('res_people');   
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180603_080310_people cannot be reverted.\n";

        return false;
    }
    */
}
