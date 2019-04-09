$(function(){

    $('#createPermission').click(function (){

        $('#modalCreatePermission').modal('show')
        .find('#modalCreatePermissionContent')
        .load($(this).attr('value'));
    
    });

    $('.permission-edit-btn').click(function(e){
        console.log('XD');
        $('#modalEditPermission').modal('show')
        .find('#modalEditPermissionContent')
        .load($(this).attr('value'));

    });
    
    $('.permission-delete-btn').click(function(e){
        onclickDeleteBtn(e);
    });

});

function createRbacPermission()
{
    var name =  document.getElementsByName('name')[0].value;
    var description =  document.getElementsByName('description')[0].value;
    var data = {    
        'name' : name,    
        'description' : description
    };
    var url = 'http://localhost/rbac/create-permission';
    if(name != '' && description != '')
    {
        ajaxRequest(url, data, function(){
            $('#modalCreatePermission').modal('toggle');
            //location.reload();
        }, 'POST');

    }
}