$(function () {

    $('#role-childDataTable').DataTable({
        "ajax": "http://localhost/api/v1/rbac/role-child",
        "columns": [
            { "data": "parent" },
            { "data": "child" },
            {
                "data": "action", render: function (data, type, row) {
                    var editButton = '<button type="button" class="btn btn-xs btn-warning assignment-edit-btn" value="update-permission-popup?name=' + row.role + '" data-name="createPost">edit</button>';
                    var deleteButton = '<button type="button" class="btn btn-xs btn-danger role-child-delete-btn" data-parent="' + row.parent + '"  data-child="' + row.child + '">delete</button>';
                    return deleteButton;
                }
            },
        ],
        "initComplete": function (settings, json) {
            $('.role-child-delete-btn').click(function (e) {

                onclickRbacRoleChildDeleteBtn(e);
            });
        }
    });

    $('#createRoleChild').click(function () {

        $('#modalCreateRoleChild').modal('show')
            .find('#modalCreateRoleChildContent')
            .load($(this).attr('value'));
        fillRoleChildDropList();
    });

  

});

function createRbacRoleChild() {
    var parent = document.getElementById("roleChileParentSelect").value;
    var child = document.getElementById("roleChildChildSelect").value;
    var data = {
        'parent': parent,
        'child': child
    };
    var url = 'http://localhost/api/v1/rbac/role-child';
    if (parent != '' && child != '') {
        ajaxRequest(url, data, function () {
            $('#modalCreateRoleChild').modal('toggle');
            location.reload();
        }, 'POST');

    }
}

var onclickRbacRoleChildDeleteBtn = function (e) {
    var $dom = $(e.currentTarget);
    var parent = $dom.data('parent');
    var child = $dom.data('child');
    var data = {
        'parent': parent,
        'child': child
    };
    var url = 'http://localhost/api/v1/rbac/role-child/' + parent;

    if (confirm("確認刪除?")) {
        ajaxRequest(url, data, function () {
            location.reload();
        }, 'DELETE');
    }
}

function fillRoleChildDropList() {
    var url = "http://localhost/api/v1/rbac/item";
    
    ajaxRequest(url, '', function (res) {
        console.log(res);
        fillDropList(res.data, 'roleChileParentSelect', 'name', 'name');
        fillDropList(res.data, 'roleChildChildSelect', 'name', 'name');
    }, 'GET');

};

