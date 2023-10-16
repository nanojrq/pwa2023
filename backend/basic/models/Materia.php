<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materia".
 *
 * @property int $id
 * @property string $nombre
 * @property int $cant_alumnos
 * @property int|null $id_carrera
 * @property int|null $id_profesor
 *
 * @property Carrera $carrera
 * @property HorarioMateria[] $horarioMaterias
 * @property Profesor $profesor
 * @property ReservaAula[] $reservas
 */
class Materia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'materia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['cant_alumnos', 'id_carrera', 'id_profesor'], 'default', 'value' => null],
            [['cant_alumnos', 'id_carrera', 'id_profesor'], 'integer'],
            [['nombre'], 'string', 'max' => 128],
            [['id_carrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::class, 'targetAttribute' => ['id_carrera' => 'id']],
            [['id_profesor'], 'exist', 'skipOnError' => true, 'targetClass' => Profesor::class, 'targetAttribute' => ['id_profesor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'cant_alumnos' => 'Cant Alumnos',
            'id_carrera' => 'Id Carrera',
            'id_profesor' => 'Id Profesor',
        ];
    }

    /**
     * Gets query for [[Carrera]].
     *
     * @return \yii\db\ActiveQuery|CarreraQuery
     */
    public function getCarrera()
    {
        return $this->hasOne(Carrera::class, ['id' => 'id_carrera']);
    }

    /**
     * Gets query for [[HorarioMaterias]].
     *
     * @return \yii\db\ActiveQuery|HorarioMateriaQuery
     */
    public function getHorarioMaterias()
    {
        return $this->hasMany(HorarioMateria::class, ['id_materia' => 'id']);
    }

    /**
     * Gets query for [[Profesor]].
     *
     * @return \yii\db\ActiveQuery|ProfesorQuery
     */
    public function getProfesor()
    {
        return $this->hasOne(Profesor::class, ['id' => 'id_profesor']);
    }

    /**
     * Gets query for [[Reservas]].
     *
     * @return \yii\db\ActiveQuery|ReservaAulaQuery
     */
    public function getReservas()
    {
        return $this->hasMany(ReservaAula::class, ['id' => 'id_reserva'])->viaTable('horario_materia', ['id_materia' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return MateriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MateriaQuery(get_called_class());
    }
}
