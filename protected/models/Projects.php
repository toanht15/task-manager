<?php

/**
 * This is the model class for table "projects".
 *
 * The followings are the available columns in table 'projects':
 * @property integer $id
 * @property string $name
 * @property integer $completed
 * @property integer $due_date
 * @property integer $created
 * @property integer $updated
 */
class Projects extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('completed, due_date, created, updated', 'numerical', 'integerOnly'=>true),
			array('name', 'safe'),
			array('name,completed','required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, completed, due_date, created, updated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'tasks'=>array(self::HAS_MANY,'Task','project_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'completed' => 'Completed',
			'due_date' => 'Due Date',
			'created' => 'Created',
			'updated' => 'Updated',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('completed',$this->completed);
		$criteria->compare('due_date',$this->due_date);
		$criteria->compare('created',$this->created);
		$criteria->compare('updated',$this->updated);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Projects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeDelete(){
		Tasks::model()->deleteAllByAttributes(array(
			'project_id'=>$this->id
			));
		return parent::beforeDelete();
	}

	public function getNumberOfTasks(){
		return Tasks::model()->countByAttributes(array(
			'project_id'=>$this->id
			));
	}

	public function getNumberOfCompletedTasks(){
		return Tasks::model()->countByAttributes(array(
			'project_id'=>$this->id,
			'completed'=>1
			));
	}

	public function getPercentCompleted(){
		$numberOfTasks=$this->getNumberOfTasks();
		$numberOfCompletedTasks=$this->getNumberOfCompletedTasks();

		if($numberOfTasks==0) return 100;
		return ($numberOfCompletedTasks/$numberOfTasks)*100;
	}

	public function beforeSave(){
		if($this->isNewRecord)
			$this->created=time();
		$this->updated=time();
		return parent::beforeSave();
	}
}
