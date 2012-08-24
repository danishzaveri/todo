<?php
class TodoDemo extends EMongoDocument
{
    public $id;
    public $title;
    public $content;
    public $timestamp;
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
   
    public function primaryKey() {
        
        return 'id';
      
    }
    public function getCollectionName()
    { 
        return 'todo';
    }
 
    public function rules()
    {
        return array(
            array('title,content', 'required'),
           
        );
    }
 
    public function attributeLabels()
    {
        return array(
            'title' => 'Title',
             'content' => 'Content',
        );
    }
    
    public function beforeSave() {
        
        if($this->isNewRecord)
            {
            $this->id=uniqid();
            $this->timestamp= new MongoDate();
        }
	            
       return parent::beforeSave();
    }   
}