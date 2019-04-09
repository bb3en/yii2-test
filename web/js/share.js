var ajaxRequest = function(url, data, callback, method){
    var token = 'qMcfUBbJvRrnl1BUowcMEPDzY8tTi8aD_1554710625';

    $.ajax({
        url: url,
        headers: {
            'Authorization': 'Bearer ' + token,
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        method: method,
        data: data,
        success: function(data){
            if (typeof callback==='function'){
                callback();
            }
        }
      });
}