$(function () {

    $('#createRole').click(function () {

        $('#modalCreateRole').modal('show')
            .find('#modalCreateRoleContent')
            .load($(this).attr('value'));

    });

    $('.role-edit-btn').click(function (e) {
        $('#modalEditRole').modal('show')
            .find('#modalEditRoleContent')
            .load($(this).attr('value'));

    });

    $('.role-delete-btn').click(function (e) {
        onclickRbacRoleDeleteBtn(e);
    });

});

function createRbacRole() {
    var name = document.getElementsByName('name')[0].value;
    var description = document.getElementsByName('description')[0].value;
    var data = {
        'name': name,
        'description': description
    };
    var url = 'http://localhost/api/v1/rbac/role';
    if (name != '' && description != '') {
        ajaxRequest(url, data, function () {
            $('#modalCreateRole').modal('toggle');
            location.reload();
        }, 'POST');

    }
}

function updateRbacRole(name) {
    var newName = document.getElementsByName('name')[0].value;
    var description = document.getElementsByName('description')[0].value;
    var data = {
        'newName': newName,
        'description': description
    };
    var url = 'http://localhost/api/v1/rbac/role/' + name;

    if (newName != '' && description != '') {
        ajaxRequest(url, data, function () {
            $('#modalEditRole').modal('toggle');
            location.reload();
        }, 'PUT');

    }
}

var onclickRbacRoleDeleteBtn = function (e) {
    var $dom = $(e.currentTarget);
    var name = $dom.data('name');
    var url = 'http://localhost/api/v1/rbac/role/' + name;

    console.log(url);
    if (confirm("確認刪除" + name + "?")) {
        ajaxRequest(url, '', function () {
            location.reload();
        }, 'DELETE');
    }
}