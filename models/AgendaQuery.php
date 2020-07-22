<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Agenda]].
 *
 * @see Agenda
 */
class AgendaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Agenda[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Agenda|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
