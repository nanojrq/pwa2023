<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horario_materia".
 *
 * @property int $id_materia
 * @property int $id_reserva
 * @property string|null $fh_desde
 * @property string|null $fh_hasta
 *
 * @property Materia $materia
 * @property ReservaAula $reserva
 */
class HorarioMateria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'horario_materia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_materia', 'id_reserva'], 'required'],
            [['id_materia', 'id_reserva'], 'default', 'value' => null],
            [['id_materia', 'id_reserva'], 'integer'],
            [['fh_desde', 'fh_hasta'], 'safe'],
            [['id_materia', 'id_reserva'], 'unique', 'targetAttribute' => ['id_materia', 'id_reserva']],
            [['id_materia'], 'exist', 'skipOnError' => true, 'targetClass' => Materia::class, 'targetAttribute' => ['id_materia' => 'id']],
            [['id_reserva'], 'exist', 'skipOnError' => true, 'targetClass' => ReservaAula::class, 'targetAttribute' => ['id_reserva' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_materia' => 'Id Materia',
            'id_reserva' => 'Id Reserva',
            'fh_desde' => 'Fh Desde',
            'fh_hasta' => 'Fh Hasta',
        ];
    }

    /**
     * Gets query for [[Materia]].
     *
     * @return \yii\db\ActiveQuery|MateriaQuery
     */
    public function getMateria()
    {
        return $this->hasOne(Materia::class, ['id' => 'id_materia']);
    }

    /**
     * Gets query for [[Reserva]].
     *
     * @return \yii\db\ActiveQuery|ReservaAulaQuery
     */
    public function getReserva()
    {
        return $this->hasOne(ReservaAula::class, ['id' => 'id_reserva']);
    }

    /**
     * {@inheritdoc}
     * @return HorarioMateriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HorarioMateriaQuery(get_called_class());
    }
}
