$(function () {

    $('#createRoleChild').click(function () {

        $('#modalCreateRoleChild').modal('show')
            .find('#modalCreateRoleChildContent')
            .load($(this).attr('value'));

    });

    $('.roleChild-delete-btn').click(function (e) {

        onclickRbacRoleChildDeleteBtn(e);
    });

});

function createRbacRoleChild() {
    var parent = document.getElementsByName('parent')[0].value;
    var child = document.getElementsByName('child')[0].value;
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