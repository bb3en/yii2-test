$(function () {

    $('#roleDataTable').DataTable({
        "ajax": "http://localhost/api/v1/rbac/role",
        "columns": [
            { "data": "name" },
            { "data": "description" },
            { "data": "rule_name" },
            { "data": "created_at" },
            { "data": "updated_at" },
            {
                "data": "action", render: function (data, type, row) {
                    var editButton = '<button type="button" class="btn btn-xs btn-warning role-edit-btn" value="update-role-popup?name=' + row.name + '">edit</button> ';
                    var deleteButton = '<button type="button" class="btn btn-xs btn-danger role-delete-btn" data-name="' + row.name + '" >delete</button>';
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
            $('.role-delete-btn').click(function (e) {
                onclickRbacRoleDeleteBtn(e);
            });
            $('.role-edit-btn').click(function (e) {
                $('#modalEditRole').modal('show')
                    .find('#modalEditRoleContent')
                    .load($(this).attr('value'));
        
            });
        }
    });

    $('#createRole').click(function () {

        $('#modalCreateRole').modal('show')
            .find('#modalCreateRoleContent')
            .load($(this).attr('value'));

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