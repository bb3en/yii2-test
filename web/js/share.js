var ajaxRequest = function (url, data, callback, method) {
    var token = 'qMcfUBbJvRrnl1BUowcMEPDzY8tTi8aD_1554710625';

    $.ajax({
        url: url,
        headers: {
            'Authorization': 'Bearer ' + token,
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        method: method,
        data: data,
        success: function (response) {
            if (typeof callback === 'function') {
                callback(response);
            }
        }
    });
}

var fillDropList = function (data, selectId, textName, valueName) {
    $("#" + selectId ).empty();
    $("#" + selectId ).append("<option value='-1'>--請選擇--</option>");
    $.each(data, function (index, item) {
        var value = data[index][valueName];
        var text = data[index][textName];
        $("#" + selectId ).append("<option value='" + value + "'>" + text + "</option>");
    });
};