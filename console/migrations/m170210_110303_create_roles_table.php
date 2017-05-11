<?php

use yii\db\Migration;

/**
 * Handles the creation of table `roles`.
 */
class m170210_110303_create_roles_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('roles', [
            'id' => $this->primaryKey(),
            'role' => $this->integer(25)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('roles');
    }
}
