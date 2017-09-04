<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Todo_Lists';
?>


<div class="col-lg-4 col-lg-offset-4">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="active"><a href="#login" data-toggle="tab" class="text-center">Sign in</a></li>
      <li><a href="#registr" data-toggle="tab" class="text-center">Sign up</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="login">
            <div class="site-signup">
                <div class="row">
                    <div class="col-lg-12">
                        <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'enableAjaxValidation' => true,
                            ]); ?>

                            <?= $form->field($login, 'username')->textInput(['autofocus' => true]) ?>
                            <?= $form->field($login, 'password')->passwordInput() ?>
                            <div class="form-group">
                                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="registr">
            <div class="site-signup">
                <div class="row">
                    <div class="col-lg-12">
                        <?php $form = ActiveForm::begin([
                            'id' => 'form-signup',
                            'enableAjaxValidation' => true,
                            ]); ?>
                            <?= $form->field($singup, 'username')->textInput(['autofocus' => true]) ?>
                            <?= $form->field($singup, 'password')->passwordInput() ?>
                            <div class="form-group">
                                <?= Html::submitButton('Create account', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'signup-button']) ?>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

