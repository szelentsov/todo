$( document ).ready(function() {
//////////////////// Login form  ///////////////////////////////////////////////
$('body').on('beforeSubmit', 'form#login-form', function () {
     var form = $(this);
    if (form.find('.has-error').length) {
          return false;
     }
     $.ajax({
          url: form.attr('action'),
          type: 'post',
          data: form.serialize(),
          success: function () {
                $('#pjax-container').load('site/login');
          }
     });
}).on('submit', function(e){
    e.preventDefault();
});
////////////////////////////////////////////////////////////////////////////////

//////////////////// Registr form  /////////////////////////////////////////////
$('body').on('beforeSubmit', 'form#form-signup', function () {
     var form = $(this);
     // submit form
     $.ajax({
          url: form.attr('action'),
          type: 'post',
          data: form.serialize(),
          success: function () {
                $('#pjax-container').load('site/login');
          }
     });
}).on('submit', function(e){
    e.preventDefault();
});
////////////////////////////////////////////////////////////////////////////////

//////////////////// Logout  ///////////////////////////////////////////////////
$('body').on('click', '#logout', function (e) {
    var form = $(this);
    $.ajax({
        url: form.attr('href'),
        type: 'post',
        data: form.serialize(),
        success: function () {
            $('#pjax-container').load('site/logout');
            $('#pjax-container').load('site/index');
            console.log("logout");
        }
    });
    e.preventDefault();
});

////////////////////////////////////////////////////////////////////////////////
    
$("#pjax-container").on("click",".display-switc >button:first-child", function(){
    var y = $(this);
    var x = $(this).parent('div').parent('div').children('input');
    x.prop('readOnly', false);
    x.focus();
    if(x.prop('readOnly')===false){
        y.children('span').removeClass('glyphicon-pencil');
        y.children('span').addClass('glyphicon-ok');
        y.click(function (e){
            e.preventDefault();
            var x = $(this).parent('div').parent('div').children('input');
            var name = x.val();
            if(name===""){
                name='You did not enter a name';
            }
            var ob = {
                id:x.attr('id'),
                name:name
            };
            var json_ob = JSON.stringify(ob);
            $.ajax({
                url:"site/setproject",
                type:'POST',
                data:json_ob,
                contentType: "application/json",
                success:function (){
                    $('#pjax-container').load('site/login');
                },
                error: function (jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    alert(msg);
                },
            });
        });
    }
});
$("#pjax-container").on("click",".display-switc >button:nth-child(2)", function(){
    var x = $(this).parent('div').parent('div').children('input').attr('id');
    var ob = {
        id:x
    };
    var json_ob = JSON.stringify(ob);
    $.ajax({
        url:"site/delproject",
        type:'POST',
        data:json_ob,
        contentType: "application/json",
        success:function (){
            $('#pjax-container').load('site/login');
        },
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            alert(msg);
        },
    });
});

$("#pjax-container").on("click",".add-task", function(){
    var value = $(this).parent('div').parent('div').children('input').val();
    if(value===''){
        value='You did not enter a name';
    }
    var id =$(this).parent('div').parent('div').parent('div').parent('div').children('div').children('div').children('input').attr('id');
    var ob = {
        id:id,
        value:value
    };
    var json_ob = JSON.stringify(ob);
    $.ajax({
        url:"site/addtask",
        type:'POST',
        data:json_ob,
        contentType: "application/json",
        success:function (){
            $('#pjax-container').load('site/login');
        },
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            alert(msg);
        }
    });   
});


$("#pjax-container").on("click",".del-task",function(){
    var id = $(this).attr("id");
    var ob = {
        id:id
    };
    var json_ob = JSON.stringify(ob);
    $.ajax({
        url:"site/deltask",
        type:'POST',
        data:json_ob,
        contentType: "application/json",
        success:function (){
            $('#pjax-container').load('site/login');
        },
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            alert(msg);
        }
    }); 
});

$("#pjax-container").on("click",".swap-up-task",function(){
    var id = $(this).attr("id");
    var id_prev = $(this).parents('#oneProject').prev().children(".display-switc-tasks").children('table').children('tbody').children('tr').children('td').children('.swap-up-task').attr("id");
    if(id_prev!==undefined){
        var ob = {
            id:id,
            id_prev:id_prev
        };
        var json_ob = JSON.stringify(ob);
        $.ajax({
        url:"site/swaptask",
        type:'POST',
        data:json_ob,
        contentType: "application/json",
        success:function (){
            $('#pjax-container').load('site/login');
        },
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            alert(msg);
        }
        });
    }
});

$("#pjax-container").on("click",".swap-down-task",function(){
    var id = $(this).attr("id");
    var id_next = $(this).parents('#oneProject').next().children(".display-switc-tasks").children('table').children('tbody').children('tr').children('td').children('.swap-up-task').attr("id");
    if(id_next!==undefined){
        var ob = {
            id:id,
            id_next:id_next
        };
        var json_ob = JSON.stringify(ob);
        $.ajax({
        url:"site/swapnexttask",
        type:'POST',
        data:json_ob,
        contentType: "application/json",
        success:function (){
            $('#pjax-container').load('site/login');
        },
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            alert(msg);
        }
        });
    }
});

$("#pjax-container").on("change",".done-task",function(){
    if(this.checked) {
      var id = $(this).attr("id");
      var isDone = confirm("Are you sure that the task is done?");
      if(isDone){
        var ob = {
            id:id,
        };
        var json_ob = JSON.stringify(ob);
        $.ajax({
            url:"site/downtask",
            type:'POST',
            data:json_ob,
            contentType: "application/json",
            success:function (){
                $('#pjax-container').load('site/login');
            },
            error: function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                alert(msg);
            }
            });
      }else{
          $(this).prop('checked', false);
      }
    }
});

$("#pjax-container").on("click",".edit-task",function(){
    var id = $(this).attr("id");
    var modal = $('#modal'+id);
    modal.modal('show');
});

$("#pjax-container").on("click",".save-modal",function(){
    var id = $(this).attr("id");
    var value = $(".task-modal-value"+id).val();
    var date;
    if($(".task-modal-date-1"+id).val()){
        date = $(".task-modal-date-1"+id).val();
    }else if($(".task-modal-date-2"+id).val()){
        date = $(".task-modal-date-2"+id).val();
    };
    if($(".done-task-modal-1"+id).is(':checked')){
        date="done";
    }else if($(".done-task-modal-2"+id).is(':checked')){
        date="done";
    };
    if(value===""){
        value = "you did not enter a message";
    }
    if(date===undefined){
        date = new Date();
        date=date.toISOString().substring(0, 10);
    };
    var ob = {
        id:id,
        value:value,
        date:date
    };
    var json_ob = JSON.stringify(ob);
    $.ajax({
        url:"site/datedonetask",
        type:'POST',
        data:json_ob,
        contentType: "application/json",
        success:function (){
            $('#pjax-container').load('site/login');
            $(".modal-backdrop").hide();
        },
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            alert(msg);
        }
    });
});

$("#pjax-container").on("click",".add-todo-list",function(){
    $.ajax({
        url:"site/addtodolist",
        type:'POST',
        success:function (){
            $('#pjax-container').load('site/login');
        },
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            alert(msg);
        }
    });
});

});