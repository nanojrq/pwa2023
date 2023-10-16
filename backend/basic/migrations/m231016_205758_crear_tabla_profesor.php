<?php

use yii\db\Migration;

/**
 * Class m231016_205758_crear_tabla_profesor
 */
class m231016_205758_crear_tabla_profesor extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('profesor', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(128)->notNull(),
            'apellido' => $this->string(128)->notNull(),
            'mostrar' => $this->string(256)->notNull(),
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('profesor');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231016_205758_crear_tabla_profesor cannot be reverted.\n";

        return false;
    }
    */
}
