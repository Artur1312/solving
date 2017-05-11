<?php

use yii\db\Migration;

/**
 * Handles the creation of table `reports`.
 */
class m170511_124234_create_reports_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('reports', [
            'id' => $this->primaryKey(),
            'employees' => $this->integer()->notNull(),
            'created_at' => $this->date()->notNull(),
            'creator' => $this->integer(),
            'work_date'=> $this->date(),
            'start_time'=> $this->date(),
            'end_time'=> $this->date(),
            'work_hours'=> $this->integer(),
            'lunch'=> $this->integer(),
            'comment'=>$this->string(255),
            'images'=>$this->string(200),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('reports');
    }
}
