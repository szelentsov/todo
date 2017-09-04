<?php

use yii\db\Migration;

/**
 * Handles the creation of table `projects`.
 */
class m170819_134649_create_projects_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('projects', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'user_name' => $this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('projects');
    }
}
