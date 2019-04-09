
$(function(){

    $('#createUser').click(function (){

        $('#modalCreateUser').modal('show')
        .find('#modalCreateUserContent')
        .load($(this).attr('value'));
    
    });

    $('.user-edit-btn').click(function(e){

        $('#modalEditUser').modal('show')
        .find('#modalEditUserContent')
        .load($(this).attr('value'));

    });
    
    $('.user-delete-btn').click(function(e){
        onclickDeleteBtn(e);
    });

});

var onclickDeleteBtn = function(e){
    var $dom = $(e.currentTarget);
    var id = $dom.data('id');
    var username = $dom.data('name');
    var url = 'http://localhost/api/v1/users/' + id;
    if (confirm("確認刪除" + username + "?"))
    {
        ajaxRequest(url, '', function(){
            location.reload();
        }, 'DELETE');
    }
}

function createUser()
{
    var userName =  document.getElementsByName('UserForm[username]')[0].value;
    var passWord =  document.getElementsByName('UserForm[password]')[0].value;
    var email =  document.getElementsByName('UserForm[email]')[0].value;
    var data = {    
        'username' : userName,    
        'password' : passWord,
        'email' : email
    };
    var url = 'http://localhost/api/v1/users';
    if(userName != '' && passWord != '' && email != '')
    {
        ajaxRequest(url, data, function(){
            $('#modalCreateUser').modal('toggle');
            location.reload();
        }, 'POST');

    }
}

function updateUser(id)
{
    var email =  document.getElementsByName('email')[0].value;
    var data = {
        'email' : email
    };
    var url = 'http://localhost/api/v1/users/' + id;
    console.log(url);
    if(email != '')
    {
        ajaxRequest(url, data, function(){
            $('#modalEditUser').modal('toggle');
            location.reload();
        }, 'PUT');

    }
}

function deleteUser(id)
{

}