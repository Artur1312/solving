<?php

use yii\db\Migration;

/**
 * Handles the creation of table `status`.
 */
class m170210_111819_create_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('status', [
            'id' => $this->primaryKey(),
            'status' => $this->string(50)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('status');
    }
}
