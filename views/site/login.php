<?php

use yii\helpers\Url;



?>
<p class="text-center">
    <?php echo  $username = \Yii::$app->user->identity->username ?>
    <a href="<?= Url::to(['site/logout'])?>" id="logout">Log out</a>
</p>
<div class="container">
    <div class="row">
        <?php foreach ($projects as $project): ?>
        <div class="col-lg-12 project">
            <div id="project-header" class="col-lg-10 col-lg-offset-1">
                <div class="input-group">
                    <span class="input-group-addon my-red">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    <input type="text" class="form-control my-red" value="<?= $project->name ?>" id="<?= $project->id ?>" readonly>
                    <div class="input-group-btn display-switc">
                        <button class="btn btn-default my-red head-but" type="button">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                        <button class="btn btn-default my-red head-but" type="button">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </div>
                </div>
            </div>
            <div id="addTask" class="col-lg-10 col-lg-offset-1">
                <div class="input-group">
                    <span class="input-group-addon my-red">
                        <span class="glyphicon glyphicon-plus"></span>
                    </span>
                    <input type="text" class="form-control" placeholder="Start typing here to create a task...">
                    <div class="input-group-btn">
                        <button class="btn btn-default add-task" type="button">Add Task</button>
                    </div>
                </div>
            </div>
            <div id="tasks" class="col-lg-10 col-lg-offset-1">
                <?php foreach ($tasks as $task): ?>
                    <?php if($task->project_id==$project->id): ?>
                <div class="input-group my-input-group" id="oneProject">
                    <span class="input-group-addon my-red">
                            <?php if(($task->status)=="done"):  ?>
                                <input type="checkbox" class="done-task" id="<?= $task->id ?>" disabled checked>
                            <?php else:  ?>
                               <input type="checkbox" class="done-task" id="<?= $task->id ?>">
                            <?php endif; ?>
                    </span>
                    <div class="modal fade" id="modal<?= $task->id ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Закрити</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Task editing</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-5 col-lg-offset-1">
                                                <span>Task</span>
                                                <input type="text" class="task-modal-value<?= $task->id ?>" value="<?= $task->name ?>">  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-5 col-lg-offset-1">            
                                                <span>Deadline</span>
                                                    <?php if(($task->status)=="done"):  ?>
                                                    <input type="date" class="task-modal-date-1<?= $task->id ?>">
                                                    <?php else:  ?>
                                                    <input type="date" value="<?= $task->status ?>" class="task-modal-date-2<?= $task->id ?>">
                                                    <?php endif; ?>
                                                <span>Done</span>
                                                    <?php if(($task->status)=="done"):  ?>
                                                    <input type="checkbox" class="done-task-modal-1<?= $task->id ?>" id="<?= $task->id ?>" checked>
                                                    <?php else:  ?>
                                                    <input type="checkbox" class="done-task-modal-2<?= $task->id ?>" id="<?= $task->id ?>">
                                                    <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary close-modal" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary save-modal" id="<?= $task->id ?>">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="text" class="form-control my-red tasks" value="<?= $task->name ?>" readonly>
                    <div class="input-group-btn display-switc-tasks">
                        <table border="0">
                            <tbody>
                                <tr>
                                    <td>
                                    <button class="btn btn-default my-red tasks tasks-but swap-up-task" id="<?= $task->id ?>" type="button">
                                        <span class="glyphicon glyphicon-chevron-up"></span>
                                    </button>
                                    </td>
                                    <td rowspan="2">
                                    <button class="btn btn-default my-red tasks tasks-but edit-task" id="<?= $task->id ?>" type="button">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    </td>
                                    <td rowspan="2">
                                        <button class="btn btn-default my-red tasks tasks-but del-task" id="<?= $task->id ?>" type="button">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <button class="btn btn-default my-red tasks tasks-but swap-down-task" id="<?= $task->id ?>" type="button">
                                        <span class="glyphicon glyphicon-chevron-down"></span>
                                    </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
       </div>
        <?php endforeach; ?>
        <div class="container">
            <div class="row">
                <button type="button" class="btn btn-default btn-lg col-lg-offset-5 col-xs-offset-4 col-sm-offset-5 add-todo-list" id="add-todo-list">
                    <span class="glyphicon glyphicon-plus"></span>
                    <span>Add TODO List</span>
                </button>
            </div>
        </div>
    </div>
</div>
