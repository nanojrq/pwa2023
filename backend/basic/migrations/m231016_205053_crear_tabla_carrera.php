<?php

use yii\db\Migration;

/**
 * Class m231016_205053_crear_tabla_carrera
 */
class m231016_205053_crear_tabla_carrera extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('carrera', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(128)->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('carrera');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231016_205053_crear_tabla_carrera cannot be reverted.\n";

        return false;
    }
    */
}
