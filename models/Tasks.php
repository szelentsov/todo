<?php

namespace app\models;

use yii\db\ActiveRecord;

class Tasks extends ActiveRecord {
    public static function tableName()
    {
        return '{{%tasks}}';
    }
    public function getTasks() {
        return $tasks = Tasks::find()->orderBy(['id' => SORT_ASC])->All();
    }
    public function addTasks($id,$value) {
        $tasks = new Tasks;
        $tasks->name = $value;
        $tasks->status = '';
        $tasks->project_id = $id;
        $tasks->save();
    }
    public function deleteTasks($id){
        return $tasks = Tasks::deleteAll(['project_id' => $id]);
    }
    public function delTask($id){
        return $tasks = Tasks::deleteAll(['id' => $id]);
    }
    public function swapTasks($id,$id_prev){
        $task = Tasks::find()->where(['id' => $id])->one();
        $task_prev = Tasks::find()->where(['id' => $id_prev])->one();
        $name = $task->name;
        $name_prev = $task_prev->name;
        
        $status = $task->status;
        $status_prev = $task_prev->status;
        
        $task->name = $name_prev;
        $task_prev->name = $name;
        
        $task->status = $status_prev;
        $task_prev->status = $status;
        
        $task->save();
        $task_prev->save();
    }
    public function swapNextTasks($id,$id_next){
        $task = Tasks::find()->where(['id' => $id])->one();
        $task_next = Tasks::find()->where(['id' => $id_next])->one();
        $name = $task->name;
        $name_next = $task_next->name;
        
        $status = $task->status;
        $status_next = $task_next->status;
        
        $task->name = $name_next;
        $task_next->name = $name;
        
        $task->status = $status_next;
        $task_next->status = $status;
        
        $task->save();
        $task_next->save();
    }
    public function downTasks($id){
        $task = Tasks::find()->where(['id' => $id])->one();
        $task->status='done';       
        $task->save();
    }
    public function datedonetask($id,$value,$date){
        $task = Tasks::find()->where(['id' => $id])->one();
        $task->name=$value;
        $task->status=$date; 
        $task->save();
    }
}
