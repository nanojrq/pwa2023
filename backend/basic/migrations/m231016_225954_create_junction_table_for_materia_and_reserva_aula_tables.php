<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%horario_materia}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%materia}}`
 * - `{{%reserva_aula}}`
 */
class m231016_225954_create_junction_table_for_materia_and_reserva_aula_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%horario_materia}}', [
            'id_materia' => $this->integer(),
            'id_reserva' => $this->integer(),
            'fh_desde' => $this->dateTime(),
            'fh_hasta' => $this->dateTime(),
            'PRIMARY KEY(id_materia, id_reserva)',
        ]);

        // creates index for column `id_materia`
        $this->createIndex(
            '{{%idx-horario_materia-id_materia}}',
            '{{%horario_materia}}',
            'id_materia'
        );

        // add foreign key for table `{{%materia}}`
        $this->addForeignKey(
            '{{%fk-horario_materia-id_materia}}',
            '{{%horario_materia}}',
            'id_materia',
            '{{%materia}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_reserva`
        $this->createIndex(
            '{{%idx-horario_materia-id_reserva}}',
            '{{%horario_materia}}',
            'id_reserva'
        );

        // add foreign key for table `{{%reserva_aula}}`
        $this->addForeignKey(
            '{{%fk-horario_materia-id_reserva}}',
            '{{%horario_materia}}',
            'id_reserva',
            '{{%reserva_aula}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%materia}}`
        $this->dropForeignKey(
            '{{%fk-horario_materia-id_materia}}',
            '{{%horario_materia}}'
        );

        // drops index for column `id_materia`
        $this->dropIndex(
            '{{%idx-horario_materia-id_materia}}',
            '{{%horario_materia}}'
        );

        // drops foreign key for table `{{%reserva_aula}}`
        $this->dropForeignKey(
            '{{%fk-horario_materia-id_reserva}}',
            '{{%horario_materia}}'
        );

        // drops index for column `id_reserva`
        $this->dropIndex(
            '{{%idx-horario_materia-id_reserva}}',
            '{{%horario_materia}}'
        );

        $this->dropTable('{{%horario_materia}}');
    }
}
