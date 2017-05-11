<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m170210_102201_create_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(50)->notNull(),
            'last_name' => $this->string(50)->notNull(),
            'company' => $this->integer()->notNull(),
            'projects' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
            'roles' => $this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'last_report' => $this->integer(),
            'total_hours' => $this->integer(),
            'phone' => $this->integer()->notNull(),
            'whatsapp' => $this->integer(),
            'viber' => $this->integer(),
            'email' => $this->string()->notNull()->unique(),
            'description' => $this->string(),
            'password' => $this->string()->notNull()->unique(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('users');
    }
}
