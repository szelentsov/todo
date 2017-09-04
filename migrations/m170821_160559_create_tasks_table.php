<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks`.
 */
class m170821_160559_create_tasks_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'status' => $this->string()->notNull(),
            'project_id' => $this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tasks');
    }
}
