<?php

namespace app\modules\people\models;

/**
 * This is the ActiveQuery class for [[People]].
 *
 * @see People
 */
class PeopleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return People[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return People|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
