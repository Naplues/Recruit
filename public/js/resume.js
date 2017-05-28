$(document).ready(function() {
  init();

  $('#button_basic').click(show_basic);
  $('#button_education').click(show_education);
  $('#button_contact').click(show_contact);
  $('#button_project').click(show_project);
  $('#button_work').click(show_work);
  $('#button_award').click(show_award);
  $('#button_job').click(show_job);
  $('#button_skill').click(show_skill);
  $('#button_comment').click(show_comment);
  $('#button_attach').click(show_attach);



  //Ajax请求保存简历信息条目

  $('#submit_basic').click(function(){
    $.get(
        '/student/post_resume_basic/' + $('#rid').val() + '/' + 
        $('#basic_name').val() + '/' +
        $('#basic_gender').val() + '/' +
        $('#basic_height').val() + '/' +
        $('#basic_weight').val() + '/' +
        $('#basic_birthday').val() + '/' +
        $('#basic_idnumber').val() + '/' +
        $('#basic_nation').val() + '/' +
        $('#basic_health').val() + '/' +
        $('#basic_status').val() + '/' +
        $('#basic_marriage').val() + '/' +
        $('#basic_origin').val() + '/' +
        $('#basic_permanen').val() + '/' +
        $('#basic_photo').val() ,
        {},
        function(data)
        {
            var str = '姓名： ' + data.basic.name + '<br>' +
                '性别：' + data.basic.gender  + '<br>' + 
                '身高：' + data.basic.height + '<br>' +
                '体重：' + data.basic.weight + '<br>' +
                '生日：' + data.basic.birthday + '<br>' + 
                '证件号码：' + data.basic.idnumber + '<br>' + 
                '民族：' + data.basic.nation + '<br>' +
                '健康状况：' + data.basic.health + '<br>' + 
                '政治面貌：' + data.basic.status + '<br>' + 
                '婚姻状况：' + data.basic.marriage + '<br>' + 
                '籍贯：' + data.basic.origin + '<br>' +
                '户口所在地：' + data.basic.permanen + '<br>' +
                '照片:' + data.basic.photo;

            $('#details_basic').html(str);
            $('#panel_basic').hide();
            $('#details_basic').show();
            $('#button_basic').attr('disabled', true);
            $('#complete').html(data.complete);
        }

    );

  });


  //AJAX请求
  $('#submit_contact').click(function(){

    $.get(
        '/student/post_resume_contact/'+ $('#rid').val() + '/' + 
            $('#phone').val() + '/' +
            $('#emergency').val() + '/' +
            $('#email').val() + '/' +
            $('#address').val() ,

        {},
        function(data)
        {
            /*optional stuff to do after success */

            var str = '电话：  ' + data.contact.phone + '<br>' + 
                    '紧急联系人：  ' + data.contact.emergency + '<br>' + 
                    '邮箱：  ' + data.contact.email + '<br>' + 
                    '地址：  ' + data.contact.address + '<br>';
            $('#details_contact').html(str);
            $('#panel_contact').hide();   //隐藏编辑面板
            $('#details_contact').show(); //显示信息面板
            $('#button_contact').attr('disabled', true);     //使切换按钮失效
            $('#complete').html(data.complete);
        }
    );  
  });

  //AJAX请求
  $('#submit_job').click(function(){

    $.get(
        '/student/post_resume_job/'+ $('#rid').val() + '/' + 
            $('#job_property').val() + '/' +
            $('#job_city').val() + '/' +
            $('#job_state').val() + '/' +
            $('#job_salary').val() + '/' +
            $('#job_arrival').val() ,

        {},
        function(data)
        {
            /*optional stuff to do after success */

            var str = '公司性质：  ' + data.job.property + '<br>' + 
                    '偏爱城市：  ' + data.job.city + '<br>' + 
                    '目前状态：  ' + data.job.state + '<br>' + 
                    '期望薪资： ' + data.job.salary + '<br>' + 
                    '到岗时间：  ' + data.job.arrival + '<br>';
            $('#details_job').html(str);
            $('#panel_job').hide();   //隐藏编辑面板
            $('#details_job').show(); //显示信息面板
            $('#button_job').attr('disabled', true);     //使切换按钮失效
            $('#complete').html(data.complete);
        }
    );  
  });


  $('#submit_comment').click(function(){
    alert('sa');
    $.get(
        '/student/post_resume_comment/' + $('#rid').val() + '/' +
            $('#comment_details').val() ,     //评价内容
        {},
        function(data)
        {
            var str = '自我评价： ' + data.comment.details + '<br>';
            $('#details_comment').html(str);
            $('#panel_comment').hide();
            $('#details_comment').show();
            $('#button_comment').attr('disabled', true);
            $('#complete').html(data.complete);
        }
    );
  });


});





//初始化情况
function init()
{
    $('#panel_basic').show();
    $('#panel_education').hide();
    $('#panel_contact').hide();
    $('#panel_project').hide();
    $('#panel_work').hide();
    $('#panel_award').hide();
    $('#panel_job').hide();
    $('#panel_skill').hide();
    $('#panel_comment').hide();
    $('#panel_attach').hide();

    $('#details_basic').hide();
    $('#details_education').hide();
    $('#details_contact').hide();
    $('#details_project').hide();
    $('#details_work').hide();
    $('#details_award').hide();
    $('#details_job').hide();
    $('#details_skill').hide();
    $('#details_comment').hide();
    $('#details_attach').hide();
}
function show_basic(){
    $('#panel_basic').show();
    $('#panel_education').hide();
    $('#panel_contact').hide();
    $('#panel_project').hide();
    $('#panel_work').hide();
    $('#panel_award').hide();
    $('#panel_job').hide();
    $('#panel_skill').hide();
    $('#panel_comment').hide();
    $('#panel_attach').hide();

}

function show_education(){
    $('#panel_basic').hide();
    $('#panel_education').show();
    $('#panel_contact').hide();
    $('#panel_project').hide();
    $('#panel_work').hide();
    $('#panel_award').hide();
    $('#panel_job').hide();
    $('#panel_skill').hide();
    $('#panel_comment').hide();
    $('#panel_attach').hide();
}

function show_contact(){
    $('#panel_basic').hide();
    $('#panel_education').hide();
    $('#panel_contact').show();
    $('#panel_project').hide();
    $('#panel_work').hide();
    $('#panel_award').hide();
    $('#panel_job').hide();
    $('#panel_skill').hide();
    $('#panel_comment').hide();
    $('#panel_attach').hide();
}

function show_project(){
    $('#panel_basic').hide();
    $('#panel_education').hide();
    $('#panel_contact').hide();
    $('#panel_project').show();
    $('#panel_work').hide();
    $('#panel_award').hide();
    $('#panel_job').hide();
    $('#panel_skill').hide();
    $('#panel_comment').hide();
    $('#panel_attach').hide();
}

function show_work(){
    $('#panel_basic').hide();
    $('#panel_education').hide();
    $('#panel_contact').hide();
    $('#panel_project').hide();
    $('#panel_work').show();
    $('#panel_award').hide();
    $('#panel_job').hide();
    $('#panel_skill').hide();
    $('#panel_comment').hide();
    $('#panel_attach').hide();
}
function show_award(){
    $('#panel_basic').hide();
    $('#panel_education').hide();
    $('#panel_contact').hide();
    $('#panel_project').hide();
    $('#panel_work').hide();
    $('#panel_award').show();
    $('#panel_job').hide();
    $('#panel_skill').hide();
    $('#panel_comment').hide();
    $('#panel_attach').hide();
}
function show_job(){
    $('#panel_basic').hide();
    $('#panel_education').hide();
    $('#panel_contact').hide();
    $('#panel_project').hide();
    $('#panel_work').hide();
    $('#panel_award').hide();
    $('#panel_job').show();
    $('#panel_skill').hide();
    $('#panel_comment').hide();
    $('#panel_attach').hide();
}
function show_skill(){
    $('#panel_basic').hide();
    $('#panel_education').hide();
    $('#panel_contact').hide();
    $('#panel_project').hide();
    $('#panel_work').hide();
    $('#panel_award').hide();
    $('#panel_job').hide();
    $('#panel_skill').show();
    $('#panel_comment').hide();
    $('#panel_attach').hide();
  }

function show_comment(){
    $('#panel_basic').hide();
    $('#panel_education').hide();
    $('#panel_contact').hide();
    $('#panel_project').hide();
    $('#panel_work').hide();
    $('#panel_award').hide();
    $('#panel_job').hide();
    $('#panel_skill').hide();
    $('#panel_comment').show();
    $('#panel_attach').hide();
  }
function show_attach(){
    $('#panel_basic').hide();
    $('#panel_education').hide();
    $('#panel_contact').hide();
    $('#panel_project').hide();
    $('#panel_work').hide();
    $('#panel_award').hide();
    $('#panel_job').hide();
    $('#panel_skill').hide();
    $('#panel_comment').hide();
    $('#panel_attach').show();
  }