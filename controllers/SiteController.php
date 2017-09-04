<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\Projects;
use app\models\Tasks;
use yii\web\Response;
use yii\widgets\ActiveForm;






class SiteController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        
        $login = new LoginForm();//форма логина      
        if (!Yii::$app->user->isGuest) {// если пользователь не гость
            //$projects = Projects::find()->where(['user_name' => \Yii::$app->user->identity->username])->all();
            $allp = new Projects();
            $projects = $allp->getProject();
            $allT = new Tasks();
            $tasks = $allT->getTasks();
            return $this->render('login',[
                'projects' => $projects,
                'tasks' => $tasks,
            ]);
        }else{
            if (Yii::$app->request->isAjax && $login->load(Yii::$app->request->post())) {//логиним гостя
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    $user = $login->login();
                    return ActiveForm::validate($login);
            }
        }
        
        
        $singup = new SignupForm(); //форма реги
        if (Yii::$app->request->isAjax && $singup->load(Yii::$app->request->post())) {//регистрация          
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($user=$singup->signup()){
                if(Yii::$app->getUser()->login($user)){
                    $allp = new Projects();
                    $projects = $allp->getProject();
                    $allT = new Tasks();
                    $tasks = $allT->getTasks();
                    return $this->render('login',[
                        'projects' => $projects,
                        'tasks' => $tasks,
                    ]);
                }
            }
            return ActiveForm::validate($singup);
        }
        
        
        return $this->render('index', [
            'singup' => $singup,
            'login' => $login,
        ]);

    }

    public function actionLogin(){

        if (!Yii::$app->user->isGuest) {
            $allp = new Projects();
            $projects = $allp->getProject();
            $allT = new Tasks();
            $tasks = $allT->getTasks();
            return $this->render('login',[
                'projects' => $projects,
                'tasks' => $tasks,
            ]);
        }else{
            return $this->redirect('/');
        }
    }
   
    public function actionLogout()
    {        
        Yii::$app->user->logout();
    }
    public function actionSetproject(){
        $request = Yii::$app->request;
        if ($request->isPost) {
            $data = $request->post();
            $id = $data['id'];
            $name = $data['name'];
            $alp = new Projects();
            $project = $alp->setProject($id,$name);
        }
    }
    public function actionAddtodolist(){
        $request = Yii::$app->request;
        if ($request->isPost) {
            $alp = new Projects();
            $project = $alp->addProject();
        }
    }
    public function actionDelproject(){
        $request = Yii::$app->request;
        if ($request->isPost) {
            $data = $request->post();
            $id = $data['id'];
            $alp = new Projects();
            $project = $alp->deleteProject($id);
            $alt = new Tasks();
            $task = $alt->deleteTasks($id);
        }
    }
    public function actionAddtask(){
        $request = Yii::$app->request;
        if ($request->isPost) {
            $data = $request->post();
            $id = $data['id'];
            $value = $data['value'];
            $addtasks = new Tasks();
            $addtask = $addtasks->addTasks($id, $value);
        }
    }
    public function actionDeltask(){
        $request = Yii::$app->request;
        if ($request->isPost) {
            $data = $request->post();
            $id = $data['id'];
            $deltasks = new Tasks();
            $deltask = $deltasks->delTask($id);
        }
    }
    public function actionSwaptask(){
        $request = Yii::$app->request;
        if ($request->isPost) {
            $data = $request->post();
            $id = $data['id'];
            $id_prev = $data['id_prev'];
            $swaptasks = new Tasks();
            $swaptask = $swaptasks->swapTasks($id,$id_prev);
        }
    }
    public function actionSwapnexttask(){
        $request = Yii::$app->request;
        if ($request->isPost) {
            $data = $request->post();
            $id = $data['id'];
            $id_next = $data['id_next'];
            $swaptasks = new Tasks();
            $swaptask = $swaptasks->swapNextTasks($id,$id_next);
        }
    }
    public function actionDowntask(){
        $request = Yii::$app->request;
        if ($request->isPost) {
            $data = $request->post();
            $id = $data['id'];
            $downtasks = new Tasks();
            $downtask = $downtasks->downTasks($id);
        }
    }
    public function actionDatedonetask(){
        $request = Yii::$app->request;
        if ($request->isPost) {
            $data = $request->post();
            $id = $data['id'];
            $value = $data['value'];
            $date = $data['date'];
            $datedonetasks = new Tasks();
            $datedonetask = $datedonetasks->datedonetask($id,$value,$date);
        }
    }
}
