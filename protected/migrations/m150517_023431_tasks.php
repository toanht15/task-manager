<?php

class m150517_023431_tasks extends CDbMigration
{
	public function up()
	{
		$this->createTable('tasks',array(
			'id'=>'INTEGER PRIMARY KEY',
			'title'=>'TEXT',
			'data'=>'TEXT',
			'project_id'=>'INTEGER',
			'completed'=>'INTEGER',
			'due_date'=>'INTEGER',
			'created'=>'INTEGER',
			'updated'=>'INTEGER'
			));
		$this->createTable('projects',array(
			'id'=>'INTEGER PRIMARY KEY',
			'name'=>'TEXT',
			'completed'=>'INTEGER',
			'due_date'=>'INTEGER',
			'created'=>'INTEGER',
			'updated'=>'INTEGER'
			));

	}

	public function down()
	{
		$this->dropTable('tasks');
		$this->dropTable('projects');
		return true;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}