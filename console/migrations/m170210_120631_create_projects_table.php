<?php

use yii\db\Migration;

/**
 * Handles the creation of table `projects`.
 */
class m170210_120631_create_projects_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('projects', [
            'id' => $this->primaryKey(),
            'project_name' => $this->string(100)->notNull()->unique(),
            'company_id' => $this->integer()->notNull(),
            'description' => $this->string(255),
            'status_id' => $this->integer(),
        ]);

        $this->createIndex(
          'idx-projects-company_id',
            'projects',
            'company_id'
        );

        $this->addForeignKey(
            'fk-projects-company_id',
            'projects',
            'company_id',
            'companies',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-projects-status_id',
            'projects',
            'status_id'
        );

        $this->addForeignKey(
            'fk-projects-status_id',
            'projects',
            'status_id',
            'status',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey(
            'fk-projects-company_id',
            'projects'
        );

        $this->dropIndex(
            'idx-projects-company_id',
            'projects'
        );

        $this->dropForeignKey(
            'fk-projects-status_id',
            'projects'
        );

        $this->dropIndex(
            'idx-projects-status_id',
            'projects'
        );


        $this->dropTable('projects');
    }
}
