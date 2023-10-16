<?php

use yii\db\Migration;

/**
 * Class m231016_225141_crear_tabla_reserva_aula
 */
class m231016_225141_crear_tabla_reserva_aula extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('reserva_aula', [
            'id' => $this->primaryKey(),
            'id_aula' => $this->integer(),
            'fh_desde' => $this->dateTime(),
            'fh_hasta' => $this->dateTime(),
            'observacion' => $this->text(256),
        ]);
        $this->addForeignKey(
            'fk-materia-id_aula',
            'reserva_aula',
            'id_aula',
            'aula',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('reserva_aula');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231016_225141_crear_tabla_reserva_aula cannot be reverted.\n";

        return false;
    }
    */
}
