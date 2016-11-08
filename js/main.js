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
                            $('#showtable').remove();
                            //$('#createform').empty();
                            //$('#result').html(data);
							$('body').html(data);
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
	//$('#delete').submit(function (event) {
	//	event.preventDefault();	
	//	var m_data=$(this).serialize();
	//	$.ajax({
	//		url: 'index.php?action=delete',
	//		type: 'post',
	//		data: m_data,
	//		success: function (data) {
    //            $('#showtable').remove();
    //            //$('#createform').empty();
    //            //$('#result').html(data);
	//			$('body').html(data);
    //        },
    //        error: function (xhr, str) {
    //            alert('Возникла ошибка: ' + xhr.responseCode);
    //        }
    //        //    }); 
	//	});
	//	//return false;
	//});
	
});



