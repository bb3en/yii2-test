$(function () {

    $('#createPermission').click(function () {

        $('#modalCreatePermission').modal('show')
            .find('#modalCreatePermissionContent')
            .load($(this).attr('value'));

    });

    $('.permission-edit-btn').click(function (e) {
        $('#modalEditPermission').modal('show')
            .find('#modalEditPermissionContent')
            .load($(this).attr('value'));

    });

    $('.permission-delete-btn').click(function (e) {
        onclickRbacPermissionDeleteBtn(e);
    });

});

function createRbacPermission() {
    var name = document.getElementsByName('name')[0].value;
    var description = document.getElementsByName('description')[0].value;
    var data = {
        'name': name,
        'description': description
    };
    var url = 'http://localhost/api/v1/rbac/permission';
    if (name != '' && description != '') {
        ajaxRequest(url, data, function () {
            $('#modalCreatePermission').modal('toggle');
            location.reload();
        }, 'POST');

    }
}

function updateRbacPermission(name) {
    var newName = document.getElementsByName('name')[0].value;
    var description = document.getElementsByName('description')[0].value;
    var data = {
        'newName': newName,
        'description': description
    };
    var url = 'http://localhost/api/v1/rbac/permission/' + name;

    if (newName != '' && description != '') {
        ajaxRequest(url, data, function () {
            $('#modalEditPermission').modal('toggle');
            location.reload();
        }, 'PUT');

    }
}

var onclickRbacPermissionDeleteBtn = function (e) {
    var $dom = $(e.currentTarget);
    var name = $dom.data('name');
    var url = 'http://localhost/api/v1/rbac/permission/' + name;

    if (confirm("確認刪除" + name + "?")) {
        ajaxRequest(url, '', function () {
            location.reload();
        }, 'DELETE');
    }
}