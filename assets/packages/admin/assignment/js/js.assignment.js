$(function () {

    $('#assignmentTable').DataTable({
        "ajax": "http://localhost/api/v1/rbac/assignment",
        "columns": [
            { "data": "userId" },
            { "data": "userName" },
            { "data": "role" },
            {
                "data": "action", render: function (data, type, row) {
                    var editButton = '<button type="button" class="btn btn-xs btn-warning assignment-edit-btn" value="update-permission-popup?name=' + row.role + '" data-name="createPost">edit</button>';
                    var deleteButton = '<button type="button" class="btn btn-xs btn-danger assignment-delete-btn" data-id="' + row.userId + '" >delete</button>';
                    return deleteButton;
                }
            },
        ],
        "initComplete": function (settings, json) {
            $('.assignment-delete-btn').click(function (e) {
                onclickRbacAssignmentDeleteBtn(e);
            });
        }
    });

    $('#createAssignment').click(function () {

        $('#modalCreateAssignment').modal('show')
            .find('#modalCreateAssignmentContent')
            .load($(this).attr('value'));

        fillAssignmentUserNameDropList();
        fillAssignmentRoleDropList();
    });



});

function createAssignment() {
    var userId = document.getElementById("assignmentUserNameSelect").value;
    var role = document.getElementById("assignmentRoleSelect").value;
    var data = {
        'userId': userId,
        'role': role
    };
    var url = 'http://localhost/api/v1/rbac/assignment';

    if (userId != '' && role != '' && userId != '-1' && role != '-1') {
        ajaxRequest(url, data, function () {
            $('#modalCreateAssignment').modal('toggle');
            location.reload();
        }, 'POST');

    }
}

var onclickRbacAssignmentDeleteBtn = function (e) {
    var $dom = $(e.currentTarget);
    var userId = $dom.data('id');
    var url = 'http://localhost/api/v1/rbac/assignment/' + userId;

    if (confirm("確認刪除?")) {
        ajaxRequest(url, '', function () {
            location.reload();
        }, 'DELETE');
    }
}

function fillAssignmentUserNameDropList() {
    var url = "http://localhost/api/v1/users";
    
    ajaxRequest(url, '', function (res) {

        fillDropList(res.data, 'assignmentUserNameSelect', 'username', 'id');
    }, 'GET');

};

function fillAssignmentRoleDropList() {
    var url = "http://localhost/api/v1/rbac/role";
    ajaxRequest(url, '', function (res) {
        fillDropList(res.data, 'assignmentRoleSelect', 'name', 'name');
    }, 'GET');
};



