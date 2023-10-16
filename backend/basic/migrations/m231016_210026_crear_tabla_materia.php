<?php

use yii\db\Migration;

/**
 * Class m231016_210026_crear_tabla_materia
 */
class m231016_210026_crear_tabla_materia extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('materia', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(128)->notNull(),
            'cant_alumnos' => $this->integer()->notNull()->defaultValue(5),
            'id_carrera' => $this->integer(),
            'id_profesor' => $this->integer(),
        ]);
        $this->addForeignKey(
            'fk-materia-id_carrera',
            'materia',
            'id_carrera',
            'carrera',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-materia-id_profesor',
            'materia',
            'id_profesor',
            'profesor',
            'id',
            'CASCADE'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('materia');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231016_210026_crear_tabla_materia cannot be reverted.\n";

        return false;
    }
    */
}
