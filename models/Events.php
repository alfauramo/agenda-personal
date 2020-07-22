<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string $titulo
 * @property string|null $descripcion
 * @property string $inicio
 * @property string $fin
 * @property int $agenda_id
 *
 * @property Agenda $agenda
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'inicio', 'fin', 'agenda_id'], 'required'],
            [['descripcion'], 'string'],
            [['inicio', 'fin'], 'safe'],
            [['agenda_id'], 'integer'],
            [['titulo'], 'string', 'max' => 255],
            [['agenda_id'], 'exist', 'skipOnError' => true, 'targetClass' => Agenda::className(), 'targetAttribute' => ['agenda_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'inicio' => 'Inicio',
            'fin' => 'Fin',
            'agenda_id' => 'Agenda ID',
        ];
    }

    /**
     * Gets query for [[Agenda]].
     *
     * @return \yii\db\ActiveQuery|AgendaQuery
     */
    public function getAgenda()
    {
        return $this->hasOne(Agenda::className(), ['id' => 'agenda_id']);
    }

    /**
     * {@inheritdoc}
     * @return EventsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EventsQuery(get_called_class());
    }
}
