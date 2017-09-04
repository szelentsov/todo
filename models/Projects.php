<?php

namespace app\models;

use yii\db\ActiveRecord;

class Projects extends ActiveRecord {
    public static function tableName()
    {
        return '{{%projects}}';
    }
    public function getProject() {
        return $projects = Projects::find()->where(['user_name' => \Yii::$app->user->identity->username])->orderBy(['id' => SORT_ASC])->all();
    }
    public function setProject($id,$name){
        $projects = Projects::findOne($id);
        $projects->name = $name;
        return $projects->update();
    }
    public function addProject(){
        $project = new Projects;
        $project->name = 'Write here the name of the project';
        $project->user_name = \Yii::$app->user->identity->username;
        $project->save();
    }
    public function deleteProject($id){
        $projects = Projects::findOne($id);
        return $projects->delete();
    }
}
