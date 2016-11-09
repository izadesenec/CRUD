$(document).ready(function () {
    $('#createform').click(function () {
        $.ajax({
            url: 'layout/create.php',
            success: function (data) {
                $('#result').html(data);
                $('#formx').submit(function () {
                    var formData = new FormData($('#formx')[0]);
                    $.ajax({
                        url: 'index.php?action=create',
                        data: formData,
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            $('#table').empty();
                            $('#createform').empty();
                            $('#result').html(data);
                        },
                        error: function (xhr, str) {
                            alert('Возникла ошибка: ' + xhr.responseCode);
                        }
                    });
                   return false;
                });
            },
            error: function (xhr, str) {
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    });

});



