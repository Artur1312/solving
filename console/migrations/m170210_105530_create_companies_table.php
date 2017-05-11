<?php

use yii\db\Migration;

/**
 * Handles the creation of table `companies`.
 */
class m170210_105530_create_companies_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('companies', [
            'id' => $this->primaryKey(),
            'company' => $this->string(50)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('companies');
    }
}
