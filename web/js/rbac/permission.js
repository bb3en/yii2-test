$(function () {
    $('#permissionDataTable').DataTable({
        "ajax": "http://localhost/api/v1/rbac/permission",
        "columns": [
            { "data": "name" },
            { "data": "description" },
            { "data": "rule_name" },
            { "data": "created_at" },
            { "data": "updated_at" },
            {
                "data": "action", render: function (data, type, row) {
                    var editButton = '<button type="button" class="btn btn-xs btn-warning permission-edit-btn" value="update-permission-popup?name=' + row.name + '">edit</button> ';
                    var deleteButton = '<button type="button" class="btn btn-xs btn-danger permission-delete-btn" data-name="' + row.name + '" >delete</button>';
                    return editButton + deleteButton;
                }
            },
        ],
        "columnDefs": [{
            targets: [3,4], render: function (data) {
                return moment.unix(data).format("YYYY/MM/DD hh:mm:ss");
            }
        }],
        "initComplete": function (settings, json) {
            $('.permission-delete-btn').click(function (e) {
                onclickRbacPermissionDeleteBtn(e);
            });
            $('.permission-edit-btn').click(function (e) {
                $('#modalEditPermission').modal('show')
                    .find('#modalEditPermissionContent')
                    .load($(this).attr('value'));

            });
        }
    });

    $('#createPermission').click(function () {

        $('#modalCreatePermission').modal('show')
            .find('#modalCreatePermissionContent')
            .load($(this).attr('value'));
    });

});

function createRbacPermission() {
    var name = document.getElementsByName('createPermissionName')[0].value;
    var description = document.getElementsByName('createPermissionDescription')[0].value;
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